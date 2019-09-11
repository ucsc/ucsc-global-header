<?php

/**
 * Plugin Name: UCSC Universal Navigation
 * Plugin URI: https://github.com/Herm71/blackbird-starter-plugin
 * Description: UCSC Universal Navigation WordPress plugin.
 * Version: 0.1.0
 * Author: Jason Chafin, UC Santa Cruz
 * Author URI: https://github.com/Herm71/
 * License: GPL2
 * Text Domain: ucsc-universal-nav
 * GitHub Plugin URI: https://github.com/Herm71/blackbird-starter-plugin
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
define('UCSC_OMNI_DIR', dirname(__FILE__));

// Plugin Settings
/** commented out until we need to add a settings page */
// include_once(UCSC_OMNI_DIR . '/functions/admin.php');

// Plugin Functions
include_once(UCSC_OMNI_DIR . '/functions/functions.php');


//Add link to Plugin Settings Page
function ucsc_omnibar_add_settings_link($links)
{
  $settings_link = '<a href="options-general.php?page=bb-starter-plugin">' . __('Settings') . '</a>';
  array_push($links, $settings_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);
// add_filter("plugin_action_links_$plugin", 'ucsc_omnibar_add_settings_link');