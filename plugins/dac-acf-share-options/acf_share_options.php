<?php
/*
Plugin Name: Design Action - Social Media Share Options
Description: Adds options at the bottom of each post for controlling what is shown on Facebook and Twitter when sharing. <strong>Requires Advanced Custom Fields Pro.</strong>
Version:     0.0.2
Author:      Design Action
Author URI:  http://designaction.org
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Add settings link on plugin page
function dac_shareoptions_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=acf-options-share-options">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'dac_shareoptions_settings_link' );

// Add options page for site-wide tags
add_action('plugins_loaded', 'create_options_page');
function create_options_page() {
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Share Options',
			'capability' 	=> 'manage_options',
			'parent_slug' => 'options-general.php',
		));
	}
}

// change options page to show all public post types
function acf_replace_post_type_options( $field ) {
	// reset choices
    $field['choices'] = array();
    
    // get post types
	$post_types = get_post_types( array('public' => true), 'names', 'and' );
	
	foreach ( $post_types as $choice ) {
		$field['choices'][ $choice ] = $choice;
	}
	$field['default_value'][0] = 'post';
	return $field;
}
add_filter( 'acf/load_field/name=show_on_post_types', 'acf_replace_post_type_options', 10, 3 );


// Register Share Options fields
function dac_acf_add_local_field_groups() {
	acf_add_local_field_group(array (
		'key' => 'group_56f055ae724d4',
		'title' => 'Global Share Options',
		'fields' => array (
			array (
				'key' => 'field_56f0567893ed5',
				'label' => 'Site Name',
				'name' => 'site_name',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => get_bloginfo('name'),
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f05f46246d2',
				'label' => 'Show on Post Types:',
				'name' => 'show_on_post_types',
				'type' => 'checkbox',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'post' => 'post',
					'page' => 'page',
				),
				'default_value' => array (
					0 => 'post',
					1 => 'page',
				),
				'layout' => 'horizontal',
				'toggle' => 0,
			),
			array (
				'key' => 'field_56f19cf4693ae',
				'label' => 'Facebook Page Name',
				'name' => 'facebook_page_name',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'facebook.com/',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f2c6c37f25c',
				'label' => 'Enable Insights for Facebook?',
				'name' => 'enable_insights_for_facebook',
				'type' => 'true_false',
				'instructions' => '<a href="https://developers.facebook.com/docs/platforminsights/domains" target="_blank">Learn More</a>',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Yes',
				'default_value' => 0,
			),
			array (
				'key' => 'field_56f2c74e7f25d',
				'label' => 'Facebook App ID',
				'name' => 'facebook_app_id',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f2c6c37f25c',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '&lt;meta property="fb:app_id" content="',
				'append' => '" &#47;&gt;',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f2c99f85758',
				'label' => 'Facebook Admin',
				'name' => 'facebook_admin',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f2c6c37f25c',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '&lt;meta property="fb:admins" content="',
				'append' => '" &#47;&gt;',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f06770dd662',
				'label' => 'Twitter Username',
				'name' => 'twitter_username',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '@',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f06880dd663',
				'label' => 'YouTube Channel ',
				'name' => 'youtube_channel',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'youtube.com/channel/',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f055ae782f6',
				'label' => 'Home Page',
				'name' => 'home_page',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_56f055ae7830d',
				'label' => 'Facebook Title',
				'name' => 'facebook_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f055ae78325',
				'label' => 'Facebook Description',
				'name' => 'facebook_description',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f055ae7833c',
				'label' => 'Facebook Image',
				'name' => 'facebook_image',
				'type' => 'image',
				'instructions' => 'Must be at least 200&times;200 pixels (shows as square thumbnail). For large display, minimum size is 600&times;315 pixels. Ideal minimum size 1200&times;630 pixels.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => 200,
				'min_height' => 200,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 8,
				'mime_types' => '',
			),
			array (
				'key' => 'field_56f055ae7836a',
				'label' => 'Use same values for Twitter?',
				'name' => 'same_as_facebook',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Yes',
				'default_value' => 1,
			),
			array (
				'key' => 'field_56f055ae78382',
				'label' => 'Twitter Title',
				'name' => 'twitter_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f055ae7836a',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f055ae78399',
				'label' => 'Twitter Description',
				'name' => 'twitter_description',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f055ae7836a',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f055ae783b3',
				'label' => 'Twitter Image',
				'name' => 'twitter_image',
				'type' => 'image',
				'instructions' => 'Must be at least 120&times;120 pixels (shows as square thumbnail). For large display, minimum size is 280&times;150 pixels.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f055ae7836a',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => 120,
				'min_height' => 120,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 1,
				'mime_types' => '',
			),
			array (
				'key' => 'field_56f055ae78353',
				'label' => 'Default Values',
				'name' => 'default',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_56f058d293ed6',
				'label' => 'Use Home Page Values?',
				'name' => 'use_home_page_values',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Yes',
				'default_value' => 1,
			),
			array (
				'key' => 'field_56f0592493ed7',
				'label' => 'Facebook Title',
				'name' => 'facebook_title_default',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f058d293ed6',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f059ce2f155',
				'label' => 'Facebook Description',
				'name' => 'facebook_description_default',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f058d293ed6',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f059ed2f156',
				'label' => 'Facebook Image',
				'name' => 'facebook_image_default',
				'type' => 'image',
				'instructions' => 'Must be at least 200&times;200 pixels (shows as square thumbnail). For large display, minimum size is 600&times;315 pixels. Ideal minimum size 1200&times;630 pixels.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f058d293ed6',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => 200,
				'min_height' => 200,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 8,
				'mime_types' => '',
			),
			array (
				'key' => 'field_56f05a172f157',
				'label' => 'Use same values for Twitter?',
				'name' => 'same_as_facebook_default',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f058d293ed6',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Yes',
				'default_value' => 1,
			),
			array (
				'key' => 'field_56f05a382f158',
				'label' => 'Twitter Title',
				'name' => 'twitter_title_default',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f05a172f157',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f05a9a2f159',
				'label' => 'Twitter Description',
				'name' => 'twitter_description_default',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f05a172f157',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56f05acb2f15a',
				'label' => 'Twitter Image',
				'name' => 'twitter_image_default',
				'type' => 'image',
				'instructions' => 'Must be at least 120&times;120 pixels (shows as square thumbnail). For large display, minimum size is 280&times;150 pixels.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56f05a172f157',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => 120,
				'min_height' => 120,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 1,
				'mime_types' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-share-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	// Create an array for registering the field groups that loads all the chosen post types
	$post_types = get_field('show_on_post_types', 'option');
	$post_types_array = array(array());
	$i = 0;
	if ($post_types) {
		foreach ( $post_types as $post_type ) {
			$post_types_array[$i][0]['param'] = 'post_type';
			$post_types_array[$i][0]['operator'] = '==';
			$post_types_array[$i][0]['value'] = $post_type;
			$i++;
		}
	}
	acf_add_local_field_group(array (
		'key' => 'group_56ec629072f50',
		'title' => 'Share Options',
		'fields' => array (
			array (
				'key' => 'field_56ec63028647c',
				'label' => 'Customize share data?',
				'name' => 'customize_share_data',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Yes',
				'default_value' => 0,
			),
			array (
				'key' => 'field_56ec634e8647d',
				'label' => 'Facebook',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56ec63028647c',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_56ec63878647e',
				'label' => 'Facebook Title',
				'name' => 'facebook_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56ec63028647c',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56ec63ab8647f',
				'label' => 'Facebook Description',
				'name' => 'facebook_description',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56ec63028647c',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56ec646f26133',
				'label' => 'Facebook Image',
				'name' => 'facebook_image',
				'type' => 'image',
				'instructions' => 'If not set, defaults to featured image. Must be at least 200&times;200 pixels (shows as square thumbnail). For large display, minimum size is 600&times;315 pixels. Ideal minimum size 1200&times;630 pixels.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => 200,
				'min_height' => 200,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 8,
				'mime_types' => '',
			),
			array (
				'key' => 'field_56f19ec29d143',
				'label' => 'Facebook Author',
				'name' => 'facebook_author',
				'type' => 'text',
				'instructions' => 'Facebook link for author (user, <em>not</em> page)',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'facebook.com/',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56ec63c686480',
				'label' => 'Twitter',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56ec63028647c',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_56ec64fa26135',
				'label' => 'Same as Facebook?',
				'name' => 'same_as_facebook',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Yes',
				'default_value' => 1,
			),
			array (
				'key' => 'field_56ec63df86481',
				'label' => 'Twitter Title',
				'name' => 'twitter_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56ec64fa26135',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56ec63f586482',
				'label' => 'Twitter Description',
				'name' => 'twitter_description',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56ec64fa26135',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_56ec64ce26134',
				'label' => 'Twitter Image',
				'name' => 'twitter_image',
				'type' => 'image',
				'instructions' => 'If not set, defaults to featured image. Must be at least 120&times;120 pixels (shows as square thumbnail). For large display, minimum size is 280&times;150 pixels.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56ec64fa26135',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => 120,
				'min_height' => 120,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 1,
				'mime_types' => '',
			),
		),
		'location' => $post_types_array,
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
}
add_action('acf/init', 'dac_acf_add_local_field_groups');


// Add Open Graph to <HTML> tag
function dac_html_tag_opengraph($output) {
    return $output . ' prefix="og: http://ogp.me/ns#"';
}
add_filter('language_attributes', 'dac_html_tag_opengraph');

// Add Open Graph <META> tags and Twitter Card 
function dac_add_open_graph_meta() {
	// define the values
	$site_name = (get_field('site_name', 'option') ?: get_bloginfo('name'));
	if (get_field('site_name', 'option') == 'Mother Theme') {
		$site_name = get_bloginfo('name');
	}
	$facebook_account = (get_field('facebook_page_name', 'option') ?: false);
	$twitter_account = (get_field('twitter_username', 'option') ?: false);
	$enable_facebook_insights = get_field('enable_insights_for_facebook', 'option');
	$facebook_app_id = get_field('facebook_app_id', 'option');
	$facebook_admin = get_field('facebook_admin', 'option');
	$facebook_author = (get_field('facebook_author') ?: false);
	
	// if posts types are set check which singulars to display on. otherwise, show on posts and pages.
	$post_types = (get_field('show_on_post_types', 'option') ?: array('post', 'page'));
	
	// Get values for home, or all non-singular pages (if use_home_page_values is true). If option is unfilled defaults to site info.		
	if (is_front_page() || (!is_singular($post_types) && get_field('use_home_page_values', 'option'))) : 
		// facebook
		$title = (get_field('facebook_title', 'option') ?: get_bloginfo('name'));
		$description = (get_field('facebook_description', 'option') ?: get_bloginfo('description'));
		$type = 'website';
		$url = get_bloginfo('url');
		// There is no fallback for not having a home or default image
		$image = (get_field('facebook_image', 'option') ?: false);
		
		// twitter
		// each variable checks to see if it should be the same value as the Facebook value, and if not grabs the Twitter field
		$twitter_title = (get_field('same_as_facebook', 'option') ? $title : get_field('twitter_title', 'option'));
		$twitter_description = (get_field('same_as_facebook', 'option') ? $description : get_field('twitter_description', 'option'));
		$twitter_image = (get_field('same_as_facebook', 'option') ? $image : get_field('twitter_image', 'option'));
		
	// Get values for singular
	elseif (is_singular($post_types)) : 
		// facebook
		$title = ((get_field('customize_share_data') && get_field('facebook_title')) ? get_field('facebook_title') : get_the_title());
		$description = ((get_field('customize_share_data') && get_field('facebook_description')) ? get_field('facebook_description') : substr(strip_tags(strip_shortcodes(get_post_field('post_content', get_the_ID()))), 0, 300) );
		$type = 'article';
		$url = get_permalink();
		// Check whether featured image is overrided, otherwise get the featured image
		$image = (get_field('facebook_image') ?: get_post_thumbnail_id(get_the_ID()) );
		
		// twitter
		$twitter_title = ((get_field('same_as_facebook') || !get_field('customize_share_data')) ? $title : get_field('twitter_title'));
		$twitter_description = ((get_field('same_as_facebook') || !get_field('customize_share_data')) ? $description : get_field('twitter_description'));
		$twitter_image = ((get_field('same_as_facebook') || !get_field('customize_share_data')) ? $image : get_field('twitter_image'));
	
	// Set default values if not home or singular, and defaults are not set to mirror home values
	else :
		// facebook
		$title = (get_field('facebook_title_default', 'option') ?: get_bloginfo('name'));
		$description = (get_field('facebook_description_default', 'option') ?: get_bloginfo('description'));
		$type = 'website';
		$url = "http" . (isset($_SERVER['HTTPS']) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// no fallback if image not set
		$image = (get_field('facebook_image_default', 'option') ?: false);
		
		// twitter
		$twitter_title = (get_field('same_as_facebook_default', 'option') ? $title : get_field('twitter_title_default', 'option'));
		$twitter_description = (get_field('same_as_facebook_default', 'option') ? $description : get_field('twitter_description_default', 'option'));
		$twitter_image = (get_field('same_as_facebook_default', 'option') ? $image : get_field('twitter_image_default', 'option'));

	endif;
	
	// some additional checks to set up the image properties
	
	// if $image is numeric, it's an ID and needs to have its array values set.
	// if it isn't numeric, it's probably because there is no fallback set
	if (is_numeric($image)) :
		$image = wp_get_attachment_image_src($image, 'full');
	endif;
	
	// if $twitter_image is numeric, it's an ID and needs to have its array values set
	if (is_numeric($twitter_image)) :
		$twitter_image = wp_get_attachment_image_src($twitter_image, 'full');
	endif; 
	
	// check image size to determine which Twitter card to use
	if ($twitter_image) :
		$twitter_card_size = (($twitter_image[1] >= 280 && $twitter_image[2] >= 150) ? 'summary_large_image' : 'summary');
	else :
		// no image, so no card size either
		$twitter_card_size = false;
	endif;

	// output Open Graph tags
	echo '<meta property="og:title"', 		' content="'.$title.'" />', 				PHP_EOL,
    	 '<meta property="og:description"',	' content="'.$description.'" />', 			PHP_EOL,
    	 '<meta property="og:type"',		' content="'.$type.'" />', 					PHP_EOL,
    	 '<meta property="og:url"', 		' content="'.$url.'" />', 					PHP_EOL,
    	 '<meta property="og:site_name"', 	' content="'.$site_name.'" />', 			PHP_EOL;
    if ($image) :
    echo '<meta property="og:image"', 		' content="'.$image[0].'" />',  			PHP_EOL,
    	 '<meta property="og:image:width"',	' content="'.$image[1].'" />',  			PHP_EOL,
    	 '<meta property="og:image:height"',' content="'.$image[2].'" />',  			PHP_EOL;
    endif;
    
    // only show these tags if user has Facebook page and we're on a single
	if ($facebook_account && $type === 'article') echo '<meta property="article:publisher" content="https://www.facebook.com/'.$facebook_account.'" />', PHP_EOL;
	if ($facebook_author && $type === 'article') echo '<meta property="article:author" content="https://www.facebook.com/'.$facebook_author.'" />', PHP_EOL;
	
	// Show these options if user has enabled Facebook Insights
	if ($enable_facebook_insights && $facebook_app_id) echo '<meta property="fb:app_id" content="'.$facebook_app_id.'" />', PHP_EOL;
	if ($enable_facebook_insights && $facebook_admin) echo '<meta property="fb:admins" content="'.$facebook_admin.'" />', PHP_EOL;
    
    // output Twitter Card tags
    if ($twitter_card_size) 	echo '<meta name="twitter:card" content="'.$twitter_card_size.'"/>', 			PHP_EOL;
    if ($twitter_title) 		echo '<meta name="twitter:title" content="'.$twitter_title.'" />', 				PHP_EOL;
    if ($twitter_description) 	echo '<meta name="twitter:description" content="'.$twitter_description.'" />', 	PHP_EOL;
    if ($twitter_image) 		echo '<meta name="twitter:image" content="'.$twitter_image[0].'" />',			PHP_EOL;
    if ($twitter_account) : // only show these tags if user has a Twitter account
    							echo '<meta name="twitter:site"',	' content="@'.$twitter_account.'" />', 		PHP_EOL,
    								 '<meta name="twitter:creator"',' content="@'.$twitter_account.'" />', 		PHP_EOL;
    endif;
}
add_action('wp_head', 'dac_add_open_graph_meta', 5);

