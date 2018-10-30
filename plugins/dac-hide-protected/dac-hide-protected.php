<?php
/*
Plugin Name: Design Action - Hide Password Protected Posts
Description: Active this plugin to hide password protected posts from blog roll
Version:     0.0.1
Author:      Design Action
Author URI:  http://designaction.org
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function wpb_password_post_filter( $where = '' ) {
    if (!is_single() && !is_admin()) {
        $where .= " AND post_password = ''";
    }
    return $where;
}
add_filter( 'posts_where', 'wpb_password_post_filter' );