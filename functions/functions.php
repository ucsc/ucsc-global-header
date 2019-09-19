<?php

/**
 * Enqueue scripts and styles.
 */
function ucsc_global_header_scripts()
{
    $file_url = plugins_url('style.css', dirname(__FILE__));
    wp_enqueue_style('ucsc_global_header', $file_url);
}

add_action('wp_enqueue_scripts', 'ucsc_global_header_scripts');

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
// add_action('ucsc_before_header', 'display_text_before_header', 5);

/**
 * Add UCSC global header
 */

add_action('ucsc_before_header', 'ucsc_add_global_header');

function ucsc_add_global_header()
{
    $logo = plugin_dir_url(__FILE__) . '../assets/img/logo-abbr.png';
    $custom_title = '<a class="ucsc-global-home-link" href="https://www.ucsc.edu">UC Santa Cruz</a>';
    
    echo '<div class="ucsc-global-container">';
    echo '<div class="ucsc-global-row">';
    echo '<div class="ucsc-global-left">';
    
    echo $custom_title;
    
    echo '</div>';

    echo '<div class="ucsc-global-right">';

    echo '<ul class="ucsc-global-menu">';
    echo '<li><a href="https://my.ucsc.edu" title="The student portal">MyUCSC</a></li>';
    echo '<li><a href="https://www.ucsc.edu/tools/people.html">People</a></li>';
    echo '<li><a href="https://www.ucsc.edu/tools/calendars.html">Calendars</a></li>';
    echo '<li><a href="https://www.ucsc.edu/visit/maps-directions.html">Maps</a></li>';
    echo '<li><a href="https://www.ucsc.edu/tools/azindex.html">A-Z Index</a></li>';
    echo '</ul>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
}