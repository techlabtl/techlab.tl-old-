<?php

function retrieve_jumbo_left_pages() {
  $args = array(
    'sort_order' => 'ASC',
    'sort_column' => 'menu_order',
    // 'hierarchical' => 1,
    // 'exclude' => '',
    // 'include' => '',
    // 'meta_key' => '',
    // 'meta_value' => '',
    // 'authors' => '',
    // 'child_of' => 0,
    // 'parent' => -1,
    // 'exclude_tree' => '',
    // 'number' => '',
    // 'offset' => 0,
    'post_type' => 'page',
    'post_status' => 'publish'
  ); 
  $pages = get_pages($args); 

  return $pages;
}



