<?php
/**
* Adminimal Settigns page
*/

// Call settings pages
function adminimal_settings_page() {
	// Adminimal Settings
  require_once __DIR__ . ('/../pages/adminimal-settings.php');
}


// Create custom plugin settings menu
add_action('admin_menu', 'adminimal_create_menu');

function adminimal_create_menu() {
	// Create new top-level menu
	add_menu_page(
    __('Adminimal settings', 'adminimal'),
    __('Adminimal', 'adminimal'), 'administrator',
    __FILE__,
    'adminimal_settings_page',
    plugins_url('../images/icon.svg',
    __FILE__)
  );
	// Call register settings function
	add_action( 'admin_init', 'register_adminimal_settings' );
}

// Register settings
function register_adminimal_settings() {
	register_setting( 'adminimal-settings-group', 'adm_hideshow' );
}
?>
