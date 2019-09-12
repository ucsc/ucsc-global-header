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
// add_action('ucsc_before_header', 'display_text_before_header', 5);

/**
 * Customize Site Header
 */
//Add top row
add_action('ucsc_before_header', 'bb_add_top_row');
function bb_add_top_row()
{
    $logo = plugin_dir_url(__FILE__) . '../assets/img/logo-abbr.png';
    // Change $custom_title text as you wish
    $custom_title = '<a href="/"><img class="header-logo" src="' . $logo . '" alt="UCSC Logo" ></a>';
    echo '<div class="page-top">';
    echo '<div class="row">';
    // echo '<div class="top-row-wrap">';
    echo '<div class="page-top-left">';
    // echo '<div class="top-row-left-wrap">';
    echo $custom_title;
    // echo '</div>';
    echo '</div>';
    echo '<div class="page-top-right">';
    ?><ul id="topNav" class="menu">
    <li id="menu-item-2776" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2776"><a
            href="http://my.ucsc.edu/" itemprop="url">MyUCSC</a></li>
    <li id="menu-item-2777" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2777"><a
            href="https://www.ucsc.edu/tools/people.html" itemprop="url">People</a></li>
    <li id="menu-item-2778" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2778"><a
            href="https://www.ucsc.edu/tools/calendars.html" itemprop="url">Calendars</a></li>
    <li id="menu-item-2779" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2779"><a
            href="https://www.ucsc.edu/tools/azindex.html" itemprop="url">A-Z Index</a></li>
</ul>
<aside><?php get_search_form('true', 'walter') ?></aside><?php
                                                                    // genesis_widget_area('top-row-search');
                                                                    //  wp_nav_menu(array(
                                                                    //     'menu' => 'Top Row Menu'
                                                                    // ));
                                                                    echo '</div>';
                                                                    // echo '</div>';
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                }