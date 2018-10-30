<?php
/*
Plugin Name: Design Action - Menu Shortcode
Description: Creates a shortcode, [menu name=""], for inserting a menu in a post. Useful for sitemaps.
Version:     0.0.1
Author:      Design Action
Author URI:  http://designaction.org
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');