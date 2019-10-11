<?php
/*
 * UCSC Global Header Settings Admin Area
 * 
 * Adds custom theme setting admin area
 * These Theme Settings were created with the help
 * of Otto's tutorial and many references to the WordPress Codex
 * http://ottopress.com/2009/wordpress-settings-api-tutorial/
 * 
 * Author: Blackbird Consulting
 * Author URI: http://www.blackbirdconsult.com
 * 
 */

/*
 * Add Settings Area
 * 
 * // add_options_page adds a sub-menu under the Settings Menu
 * 
 * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
 * 
 *  
 * $capability = 'manage_options'; allows admins only
 * $menu_slug = needs to be something only you will use
 * link to page will be /wp-admin/options-general.php?page=$menu_slug
 * $function = callback function name
 * 
 * 
 * // add_menu_page is similar to add_options page except
 * 
 * it adds a new top-level menu
 * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
 * 
 */

function plugin_admin_add_page() {
    // Change the names of these options to reflect the actual name
    add_menu_page('UCSC Global Header Settings', 'UCSC Global Header Settings', 'administrator', 'ucsc-global-header-plugin', 'ucsc_global_header_settings_page','dash-icons-generic');
}

add_action('admin_menu', 'plugin_admin_add_page');

/*
 * Register settings
 * 
 * register_setting( $option_group, $option_name, $sanitize_callback
 * 
 */
// add_action( 'admin_init', 'ucsc_global_header_settings' );

// function ucsc_global_header_settings() {
//     register_setting( 'ucsc-global-header-settings-group', 'ucsc_max_width' );
//     register_setting( 'ucsc-global-header-settings-group', 'ucsc_show_logo' );
// 	register_setting( 'ucsc-global-header-settings-group', 'ucsc_show_search' );
// }

/*
 * 
 * Settings Sections
 * 
 * Note: Call back function should be the value you added 
 * for add_settings_section($callback)
 * 
 */


function ucsc_global_header_settings_page() {
?>

<div class="pagespeed-wrap">     
<h2>UCSC Global Header Options</h2>
<form method="post" action="options.php">
    <?php settings_fields('ucsc-global-header-settings-group'); ?>
    <?php do_settings_sections('ucsc-global-header-settings-group'); ?>
    <?php submit_button(); ?>
</form>
</div>

<?php
}


function display_ucsc_max_width()
{
	?>
		<input type="number" name="ucsc_max_width" value="<?php get_option('ucsc_max_width'); ?>" /> 
	<?php
}


function display_ucsc_search()
{
	?>
		<input type="checkbox" name="ucsc_show_search" value="0" <?php checked(0, get_option('ucsc_show_search'), true); ?> /> 
	<?php
}

function display_ucsc_logo()
{
	?>
		<input type="checkbox" name="ucsc_show_logo" value="0" <?php checked(0, get_option('ucsc_show_logo'), true); ?> /> 
	<?php
}

function display_theme_panel_fields()
{
	add_settings_section("ucsc-global-header-settings-group", "Toggle Elements", null, "ucsc-global-header-settings-group");
	
	add_settings_field("ucsc_max_width", "Max width of the global header", "display_ucsc_max_width", "ucsc-global-header-settings-group", "ucsc-global-header-settings-group");
    add_settings_field("ucsc_show_logo", "Show UCSC logo in upper left", "display_ucsc_logo", "ucsc-global-header-settings-group", "ucsc-global-header-settings-group");
    add_settings_field("ucsc_show_search", "Show the search box", "display_ucsc_search", "ucsc-global-header-settings-group", "ucsc-global-header-settings-group");

    register_setting( 'ucsc-global-header-settings-group', 'ucsc_max_width' );
    register_setting( 'ucsc-global-header-settings-group', 'ucsc_show_logo' );
	register_setting( 'ucsc-global-header-settings-group', 'ucsc_show_search' );

}

add_action("admin_init", "display_theme_panel_fields");




