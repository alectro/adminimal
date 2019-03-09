<?php
/**
* Adminimal Styles and scripts
*/

// Styles
function adminimal_styles() {
  wp_register_style( 'adminimal',  plugin_dir_url( __FILE__ ) . '../css/adminimal.css', '1', true );
  wp_enqueue_style( 'adminimal' );
}
add_action( 'wp_enqueue_scripts', 'adminimal_styles' );

// Scripts
function adminimal_scripts() {
 wp_enqueue_script( 'adminimal-fx',  plugin_dir_url( __FILE__ ) . '../js/adminimal-fx.js', array('jquery'), '1', true );
}
add_action( 'wp_enqueue_scripts', 'adminimal_scripts' );
 ?>
