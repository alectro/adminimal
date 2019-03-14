=== Adminimal ===
Contributors: alectro
Tags: toolbar, settings, dashboard, administrator, theme
Requires at least: 3.3
Tested up to: 5.1
Requires PHP: 5.2.4
Stable tag: 0.7.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A toolbar for WordPress front-end.

== Description ==

A minimalist front-end admin toolbar for Administrators, Editors and Authors that includes: Dashboard, Edit, Profile, New post, New Page, and New Custom Post Types.

== Supported roles ==

- Administrator
- Editor
- Author

== Features ==
- Automatically hide front-end WordPress Toolbar for supported roles.
- Adds a floating minimalist toolbar at the bottom right corner of the browser.
- Create new posts, pages, and registered custom post types.
- Access the Dashboard.
- Edit the content you are viewing.
- Access logged user profile page.
- Plugin settings page.
- Optionally choose to concurrently show the WordPress Toolbar.

== Installation ==

= From your WordPress dashboard =

1. Visit 'Plugins > Add New'
2. Search for 'adminimal'
3. Activate adminimal from your Plugins page.
4. Visit Settings page for options.
5. Visit your website, you can see the toolbar on the bottom right corner of the browser.

= From WordPress.org =

1. Download adminimal.
2. Upload the 'adminimal' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate adminimal from your Plugins page. (You'll be greeted with a Welcome page.)
4. Visit Settings page for options.
5. Visit your website, you can see the toolbar on the bottom right corner of the browser.

== Changelog ==

= 0.7.1 =
* CSS transitions on :hover.

= 0.7 =
* Simplified function to get all post types.
* Adminimal toolbar available for Administrator, Editor and Author user roles.
* Removed Attachment post type.

= 0.6.1 =
* Fixed an issue where adminimal.php wasn't added to the plugin.
* Show toolbar on all screen sizes.

= 0.6 =
* Adminimal toolbar available for Administrator and Editor user roles.
* Accessibility improvements: AA and AA+ score for color contrast, pixel values changed to rem to respect users default font settings.
* Removed body class 'admin-bar' when WordPress Toolbar is set to 'Hide' to prevent empty space on top for navigation and headers.
* Added body class 'adminimal'.
* Removed redundant CSS classes and properties.

= 0.5 =
* Settings page added.
* Update for Spanish (es_ES) and Portuguese (pt_BR) languages.

= 0.4.3 =
* Changed css classes.
* Improved positioning and visual style across Themes.
* Added Portuguese (pt_BR) and Chinese (zh_CN) translations.

= 0.4.2 =
* Correct path for css.
* Improved function to create new contents.

= 0.4.1 =
* Fixed js path.

= 0.4 =
* Updated Spanish (es_ES) language translation.
* Small style changes to improve consistency across Themes.

= 0.3.1 =
* Fixed an issue where styles folder wasn't added to the plugin release.

= 0.3 =
* Keep scroll position when opening and closing the toolbar menu.

= 0.2 =
* Added px values to improve consistency across Themes.

= 0.1 =
* Initial release.
