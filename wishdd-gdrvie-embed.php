<?php
/*
Plugin Name: Wishdd GDrive Embed
Description: A wordpress plugin to Embed Google Drive Documents.
Version: 1.0
Author: Waqas Yousaf / Tehmina Aslam
Author URI: http://wishdd.com/
Author Email: support@wishdd.com
License: GPLv2
*/

// Exit if not logged-in
if (!defined('ABSPATH')) {
	exit;
}

// Load Shortcodes Page
require_once ( plugin_dir_path(__FILE__) . "wishdd-shortcodes.php");



//Adding Resouces
function wishdd_add_resources()
{
		wp_enqueue_style("wishdd_style", plugins_url('css/wishdd-custom.css', __FILE__));
}

add_action('wp_enqueue_scripts' , 'wishdd_add_resources');


// Filter Functions with Hooks
function wishdd_mce_button() {
  // Check if user have permission
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // Check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
    add_filter( 'mce_external_plugins', 'wishdd_tinymce_plugin' );
    add_filter( 'mce_buttons', 'wishdd_register_mce_button' );
  }
}
add_action('admin_head', 'wishdd_mce_button');

// Function for new button
function wishdd_tinymce_plugin( $plugin_array ) {
 
  $plugin_array['wishdd_mce_button'] =   plugin_dir_url( __FILE__ ) . '/js/wishdd-custom.js';
  return $plugin_array;
}

// Register new button in the editor
function wishdd_register_mce_button( $buttons ) {
  array_push( $buttons, 'wishdd_mce_button' );
  return $buttons;
}