<?php

/**
 * Enqueue scripts and styles.
 */
function ucsc_omnibar_scripts()
{
    wp_enqueue_style('ucsc-omnibar-style', UCSC_OMNI_DIR . 'style.css');
    wp_enqueue_style('ucsc-static-style', 'https://static.ucsc.edu/_responsive/css/ucsc.css?t=20190909121100');
    // wp_enqueue_script('ucsc-pbsci-navigation-2', get_template_directory_uri() . '/js/navigation2.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'ucsc_omnibar_scripts');

/**
 * Add to hooks already set up in theme.
 * See theme's functions.php file
 *
 * @return void
 * Description
 * @package
 * @since
 * @author Jason Chafin
 * @link http://www.blackbirdconsult.com
 * @license GNU General Public License 2.0+
 */

function display_text_before_header()
{
    echo '<div class="add-text">Add Your Own Text or HTML Here</div>';
};
add_action('ucsc_before_header', 'display_text_before_header', 5);