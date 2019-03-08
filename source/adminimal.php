<?php
/**
* Plugin Name: Adminimal
* Plugin URI: https://wordpress.org/plugins/adminimal/
* Description: A minimalist front-end admin toolbar for Administrators that includes: Dashboard, Edit, Profile, New post, New Page, New Attachment, and New Custom Post Types.
* Version: 0.4.3
* Author: Alejandro Urrutia
* Author URI: https://www.colorale.com
* License: GPLv2 or later
* Text Domain: adminimal
* Domain Path: /languages
*/
function adminimal_textdomain() {
	$domain = 'adminimal';
	load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'adminimal_textdomain' );

// Styles
function adminimal_styles() {
  wp_register_style( 'adminimal',  plugin_dir_url( __FILE__ ) . 'css/adminimal.css', '1', true );
  wp_enqueue_style( 'adminimal' );
}
add_action( 'wp_enqueue_scripts', 'adminimal_styles' );

// Scripts
function adminimal_scripts() {
 wp_enqueue_script( 'adminimal-fx',  plugin_dir_url( __FILE__ ) . 'js/adminimal-fx.js', array('jquery'), '1', true );
}
add_action( 'wp_enqueue_scripts', 'adminimal_scripts' );


// Get all WordPress post types
function getPosts(){

  $argsPosts          = array('public' => true, '_builtin' => true);
  $argsCPT            = array('public' => true, '_builtin' => false);

	$output             = 'objects';
	$operator           = 'and';

  // Posts Pages
  $types = get_post_types( $argsPosts, $output, $operator );
  foreach ( $types as $type ) {

		echo '<div class="button primary"><a href="' . get_site_url() . '/wp-admin/post-new.php?post_type=' . $type->name . '">' . __($type->labels->singular_name	, 'default') . '</a></div>';
  }

	// Custom Post Types
	$typesCPT = get_post_types( $argsCPT, $output, $operator );
  foreach ( $typesCPT as $typeCPT ) {

		echo '<div class="button primary"><a href="' . get_site_url() . '/wp-admin/post-new.php?post_type=' . $typeCPT->name . '">' . __($typeCPT->labels->singular_name	, 'default') . '</a></div>';
  }
}

// Custom toolbar
function adminDash() {

  if ( is_user_logged_in() && current_user_can('administrator')) {

    // Hide WordPress front end toolbar
    show_admin_bar( false );

    // Create new Adminimal toolbar
    $menuNew      = '<a class="button primary mainmenubtn">' . __('New', 'adminimal') . '</a>';
    $menuDash     = '<a class="button secondary" href="' . get_dashboard_url() . '">' . __( 'Admin', 'adminimal' ) . '</a>';
    $menuDashEdit = '<a class="button tertiary" href="' . get_edit_post_link() . '">' . __( 'Edit', 'adminimal' ) . '</a>';
    $menuDashUser = '<a class="button secondary" href="' . get_edit_user_link() . '">' . __( 'Me', 'adminimal' ) . '</a>';

    echo '<div class="adminimal hide-mobile dropdown adminimal-left">';
      echo '<div id="adminimal">';
        echo $menuNew;
          echo '<div class="dropdown-submenu" id="new-posts">';
            getPosts();
          echo '</div>';
        echo $menuDash;
        echo $menuDashEdit;
        echo $menuDashUser;
      echo '</div>';
    echo '<div id="adminimal-toggle" class="adminimal-right"><a class="secondary button adminimal-open" id="adminimal-icon"></a></div>';
    echo '</div>';

  }
}
add_action( 'wp_footer', 'adminDash');
?>
