<?php
/*
Plugin Name: Design Action - Custom post types and taxonomies
Description: Contains all code to create custom post types and taxonomies/
Version:     0.0.1
Author:      Design Action
Author URI:  http://designaction.org
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Register Custom Post Type
function resource() {

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'custom_template' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'custom_template' ),
		'menu_name'             => __( 'Resources', 'custom_template' ),
		'name_admin_bar'        => __( 'Resources', 'custom_template' ),
		'archives'              => __( 'Resource Archives', 'custom_template' ),
		'attributes'            => __( 'Resource Attributes', 'custom_template' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'custom_template' ),
		'all_items'             => __( 'All Resources', 'custom_template' ),
		'add_new_item'          => __( 'Add New Resource', 'custom_template' ),
		'add_new'               => __( 'Add New Resource', 'custom_template' ),
		'new_item'              => __( 'New Resource', 'custom_template' ),
		'edit_item'             => __( 'Edit Resource', 'custom_template' ),
		'update_item'           => __( 'Update Resource', 'custom_template' ),
		'view_item'             => __( 'View Resource', 'custom_template' ),
		'view_items'            => __( 'View Resources', 'custom_template' ),
		'search_items'          => __( 'Search Resources', 'custom_template' ),
		'not_found'             => __( 'Not found', 'custom_template' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'custom_template' ),
		'featured_image'        => __( 'Featured Image', 'custom_template' ),
		'set_featured_image'    => __( 'Set featured image', 'custom_template' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom_template' ),
		'use_featured_image'    => __( 'Use as featured image', 'custom_template' ),
		'insert_into_item'      => __( 'Insert into item', 'custom_template' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'custom_template' ),
		'items_list'            => __( 'Items list', 'custom_template' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom_template' ),
		'filter_items_list'     => __( 'Filter items list', 'custom_template' ),
	);
	$args = array(
		'label'                 => __( 'Resource', 'custom_template' ),
		'description'           => __( 'Resources', 'custom_template' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'resource', $args );

}
add_action( 'init', 'resource', 0 );

// Register Custom Post Type
function news() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'custom_template' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'custom_template' ),
		'menu_name'             => __( 'News', 'custom_template' ),
		'name_admin_bar'        => __( 'News', 'custom_template' ),
		'archives'              => __( 'News Archives', 'custom_template' ),
		'attributes'            => __( 'News Attributes', 'custom_template' ),
		'parent_item_colon'     => __( 'Parent News:', 'custom_template' ),
		'all_items'             => __( 'All News', 'custom_template' ),
		'add_new_item'          => __( 'Add New News', 'custom_template' ),
		'add_new'               => __( 'Add New News', 'custom_template' ),
		'new_item'              => __( 'New News', 'custom_template' ),
		'edit_item'             => __( 'Edit News', 'custom_template' ),
		'update_item'           => __( 'Update News', 'custom_template' ),
		'view_item'             => __( 'View News', 'custom_template' ),
		'view_items'            => __( 'View News', 'custom_template' ),
		'search_items'          => __( 'Search News', 'custom_template' ),
		'not_found'             => __( 'Not found', 'custom_template' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'custom_template' ),
		'featured_image'        => __( 'Featured Image', 'custom_template' ),
		'set_featured_image'    => __( 'Set featured image', 'custom_template' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom_template' ),
		'use_featured_image'    => __( 'Use as featured image', 'custom_template' ),
		'insert_into_item'      => __( 'Insert into item', 'custom_template' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'custom_template' ),
		'items_list'            => __( 'Items list', 'custom_template' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom_template' ),
		'filter_items_list'     => __( 'Filter items list', 'custom_template' ),
	);
	$args = array(
		'label'                 => __( 'News', 'custom_template' ),
		'description'           => __( 'News', 'custom_template' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-rss',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'news', 0 );