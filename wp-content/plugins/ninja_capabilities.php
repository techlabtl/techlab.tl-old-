<?php
/**
 * @package Ninja_Capabilities
 * @version 1.6
 */
/*
Plugin Name: Ninja Capabilities
*/

function my_custom_change_ninja_forms_capabilities_filter( $capabilities ) {
	$capabilities = "edit_others_posts";
	return $capabilities;
}
add_filter( 'ninja_forms_admin_menu_capabilities', 'my_custom_change_ninja_forms_capabilities_filter' );
add_filter( 'ninja_forms_admin_submissions_capabilities', 'my_custom_change_ninja_forms_capabilities_filter' );

?>
