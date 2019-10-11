<?php

/**
 * Enqueue scripts and styles.
 */
function ucsc_global_header_scripts()
{
    $file_url = plugins_url('assets/css/plugin.css', dirname(__FILE__));
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
    $logo = plugin_dir_url(__FILE__) . '../assets/img/uc-santa-cruz.svg';
    $search_btn = plugin_dir_url(__FILE__) . '../assets/img/search.svg';
    $custom_title = '<a class="ucsc-global-home-link" href="https://www.ucsc.edu"><img src="' . $logo . '" alt="UC Santa Cruz" /></a>';
    
    echo '<div class="ucsc-global-container">';
    echo '<div class="ucsc-global-row wrap">';
    echo '<div class="ucsc-global-left">';
    
    echo '&nbsp;';
    
    echo '</div>';

    echo '<div class="ucsc-global-right">';

    echo '<ul class="ucsc-global-menu">';
    echo '<li><a href="https://www.ucsc.edu">UCSC Home</a></li>';
    echo '<li><a href="https://my.ucsc.edu">MyUCSC</a></li>';
    echo '<li><a href="https://www.ucsc.edu/tools/people.html">People</a></li>';
    echo '<li><a href="https://www.ucsc.edu/tools/calendars.html">Calendars</a></li>';
    echo '<li><a href="https://www.ucsc.edu/visit/maps-directions.html">Maps</a></li>';
    echo '<li><a href="https://www.ucsc.edu/tools/azindex.html">A-Z Index</a></li>';
    echo '</ul>';

    //get_search_form($args = ["echo" => true, "aria_label" => "something"]);

    // $q = the_search_query();

    echo '<form class="ucsc-global-search-form" action="/" method="get">';
    echo '<label for="search" class="screen-reader-text">Search this site</label>';
    echo '<input type="text" name="s" id="search" value="" />';
    echo '<input type="image" alt="Search" src="'. $search_btn .'" />';
    echo '</form>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
}