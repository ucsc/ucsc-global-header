<?php

/**
 * Plugin Name: UCSC Global Header
 * Plugin URI: https://github.com/ucsc/ucsc-global-header
 * Description: UCSC Global Header WordPress plugin.
 * Version: 0.1.0
 * Author: Jason Chafin, UC Santa Cruz
 * Author URI: https://github.com/Herm71/
 * License: GPL2
 * Text Domain: ucsc-global-header
 * GitHub Plugin URI: https://github.com/ucsc/ucsc-global-header
 * GitHub Branch: master
 *
 *
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

// Plugin Directory
define('UCSC_GLOBAL_HEADER_DIR', plugin_dir_path(__FILE__));

// Plugin Settings** commented out until we need to add a settings page */
// include_once(UCSC_GLOBAL_HEADER_DIR . '/functions/admin.php');

// Plugin Functions
include_once(UCSC_GLOBAL_HEADER_DIR . '/functions/functions.php');

// Link to Plugin Settings Page
function ucsc_omnibar_add_settings_link($links)
{
  $settings_link = '<a href="options-general.php?page=ucsc-global-header">' . __('Settings') . '</a>';
  array_push($links, $settings_link);
  return $links;
}

$plugin = plugin_basename(__FILE__);
// add_filter("plugin_action_links_$plugin", 'ucsc_global_header_add_settings_link');