<?php

function ninja_form_header($form_id){
  //Define our global variables
  global $post, $wpdb, $ninja_forms_fields, $ninja_forms_loading, $ninja_forms_processing;
  //Get the settings telling us whether or not we should clear/hide the completed form.
  //Check to see if the form_id has been sent.
  $function = true;
  // Instantiate our loading global singleton.
  if ( !isset ( $ninja_forms_processing ) or ( isset ( $ninja_forms_processing ) and $ninja_forms_processing->get_form_ID() != $form_id ) ) {
    $ninja_forms_loading = new Ninja_Forms_Loading( $form_id );
  }
  // Run our two loading action hooks.
  do_action( 'ninja_forms_display_pre_init', $form_id );
  do_action( 'ninja_forms_display_init', $form_id );
  if ( isset ( $ninja_forms_loading ) ) {
    $ajax = $ninja_forms_loading->get_form_setting( 'ajax' );
  } else {
    $ajax = $ninja_forms_processing->get_form_setting( 'ajax' );
  }
  if ( !$ajax ) {
    $ajax = 0;
  }

  if($ajax == 1){
    $url = admin_url( 'admin-ajax.php' );
    $url = add_query_arg('action', 'ninja_forms_ajax_submit', $url);
  }else{
    $url = '';
  }

  do_action('ninja_forms_before_form_display', $form_id);
  do_action('ninja_forms_display_before_form_wrap', $form_id);
  do_action('ninja_forms_display_open_form_wrap', $form_id);
  do_action('ninja_forms_display_before_form_title', $form_id);
  do_action('ninja_forms_display_form_title', $form_id);
  do_action('ninja_forms_display_after_form_title', $form_id);
  do_action('ninja_forms_display_before_form', $form_id);
  do_action('ninja_forms_display_open_form_tag', $form_id);
  do_action('ninja_forms_display_after_open_form_tag', $form_id);
  do_action('ninja_forms_display_before_fields', $form_id);

  $field_results = ninja_forms_get_fields_by_form_id($form_id);
  return apply_filters('ninja_forms_display_fields_array', $field_results, $form_id);
}

function ninja_form_footer($form_id) {
  global $post, $wpdb, $ninja_forms_fields, $ninja_forms_loading, $ninja_forms_processing;

  do_action('ninja_forms_display_after_fields', $form_id);
  do_action('ninja_forms_display_close_form_tag', $form_id);
  do_action('ninja_forms_display_after_form', $form_id);
  do_action('ninja_forms_display_close_form_wrap', $form_id);
  do_action('ninja_forms_display_after_form_wrap', $form_id);
  do_action('ninja_forms_after_form_display', $form_id);
  do_action('ninja_forms_display_js', $form_id);
  do_action('ninja_forms_display_css', $form_id);
}

function ninja_form_field($field, $form_id) {
  global $ninja_forms_fields, $ninja_forms_loading, $ninja_forms_processing;

  if ( isset ( $ninja_forms_loading ) && $ninja_forms_loading->get_form_ID() == $form_id ) {
    $field = $ninja_forms_loading->get_field_settings( $field['id'] );
  } else if ( isset ( $ninja_forms_processing ) && $ninja_forms_processing->get_form_ID() == $form_id ) {
    $field = $ninja_forms_processing->get_field_settings( $field['id'] );
  }
  $field_id = $field['id'];
  $data = $field['data'];
  $data = apply_filters( 'ninja_forms_field', $data, $field_id );
  $type = $ninja_forms_fields[$field['type']];
  $display_function = $type['display_function'];
  $arguments['field_id'] = $field_id;
  $arguments['data'] = $data;
  $arguments['form_id'] = $form_id;
  call_user_func_array($display_function, $arguments);
}
