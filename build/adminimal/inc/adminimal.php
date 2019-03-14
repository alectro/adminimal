<?php
/**
* Adminimal Functions
*/

// Global variables
require_once __DIR__ . '/../var.php';

// Add body class
add_filter( 'body_class', function( $classes ) {
   return array_merge( $classes, array( 'adminimal' ) );
} );

// Remove admin-bar class from body if 'Hide'
// Show
if (esc_attr( get_option('adm_hideshow') ) == 1) {

	// Hide
} else {
		// remove body classes
		add_filter('body_class', function (array $classes) {
				if (in_array('logged-in', $classes)) {
					unset( $classes[array_search('admin-bar', $classes)] );
				}
			return $classes;
		});
}


// Get all WordPress post types
function getPosts(){

  function listAllPosts($exclude = array( 'attachment' )) {

    $args     = array('public' => true, '_builtin' => false);
  	$output   = 'objects';
  	$operator = 'or';

  	$types = get_post_types( $args, $output, $operator );

    foreach ( $types as $type ) {
      if( TRUE === in_array( $type->name, $exclude ) )
          continue;

      echo '<div class="button primary"><a href="' . get_site_url() . '/wp-admin/post-new.php?post_type=' . $type->name . '">' . __($type->labels->singular_name	, 'default') . '</a></div>';
    }
  }

  $user = wp_get_current_user();
  if ( in_array( 'author', (array) $user->roles ) ) {
    listAllPosts(array( 'attachment', 'page' ));


  } else {
    listAllPosts(array( 'attachment' ));
  }
}

// Custom toolbar
function adminDash() {

  global $post, $current_user;
  $user = $current_user;
  $allowed_roles = array('administrator', 'editor', 'author');


  if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles )) {

    // Settings for show hide (settings.php)
    $hideShow = get_option('adm_hideshow');

    // Hide WordPress front end toolbar
    show_admin_bar( $hideShow );

    // Create new Adminimal toolbar
    $menuNew      = '<a class="button primary mainmenubtn">' . __('New', 'adminimal') . '</a>';
    $menuDash     = '<a class="button secondary" href="' . get_dashboard_url() . '">' . __( 'Admin', 'adminimal' ) . '</a>';
    $menuDashEdit = '<a class="button tertiary" href="' . get_edit_post_link() . '">' . __( 'Edit', 'adminimal' ) . '</a>';
    $menuDashUser = '<a class="button secondary" href="' . get_edit_user_link() . '">' . __( 'Me', 'adminimal' ) . '</a>';

    echo '<div class="adminimal-toolbar hide-mobile dropdown adminimal-toolbar-left">';
      echo '<div id="adminimal">';
        echo $menuNew;
          echo '<div class="dropdown-submenu" id="new-posts">';
            getPosts();
          echo '</div>';
        echo $menuDash;
        if(current_user_can( 'edit_others_posts', $post->ID ) || ($post->post_author == $current_user->ID))  {
          echo $menuDashEdit;
        }
        echo $menuDashUser;
      echo '</div>';
    echo '<div id="adminimal-toggle" class="adminimal-toolbar-right"><a class="secondary button adminimal-toolbar-open" id="adminimal-icon"></a></div>';
    echo '</div>';

  }
}
add_action( 'wp_footer', 'adminDash');


// Remove margin-top 32px from html tag
function remove_admin_login_header() {
  // Show
  if (esc_attr( get_option('adm_hideshow') ) == 1) {
  	// Hide
  } else {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }
}
add_action('get_header', 'remove_admin_login_header');

 ?>
