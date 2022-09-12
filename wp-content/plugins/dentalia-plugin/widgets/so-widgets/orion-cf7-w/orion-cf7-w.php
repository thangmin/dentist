<?php

/*
Widget Name: @OrionThemes Contact Form 7
Description: Display a Contact Form.
Author: OrionThemes
Author URI: http://orionthemes.com
*/

function orion_get_cf7_forms() {
	$cf7args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'wpcf7_contact_form',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'author_name'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts_array = get_posts( $cf7args ); 

	$all_forms = array();
	foreach ($posts_array as $contact_form) {
		$id = $contact_form->ID;
		$name = $contact_form->post_title;
		$all_forms[$id] = $name;
	}
	return $all_forms;
}

class orion_cf7_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_cf7_w',
			__('@Orion Contact Form 7', 'dentalia'),
			array(
				'description' => esc_html__('Display a Contact form.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-email-alt',
			),
			array(

			),
			array(
				'cf7_option' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose a contact form', 'dentalia' ),
					'description' => esc_html__( 'Select a contact form.', 'dentalia' ),
					'default' => 'all',
					'options' => orion_get_cf7_forms()		
				),			 
			),		    				
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_cf7_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_cf7_w', __FILE__, 'orion_cf7_w');