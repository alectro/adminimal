<?php
/**
* Adminimal Functions
*/

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

    // Settings for show hide (settings.php)
    $hideShow = get_option('adm_hideshow');

    // Hide WordPress front end toolbar
    show_admin_bar( $hideShow );

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
