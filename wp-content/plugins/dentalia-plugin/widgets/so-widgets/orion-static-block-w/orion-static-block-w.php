<?php

/*
Widget Name: @OrionThemes Static Block
Description: Add Static block content
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_static_block_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_static_block_w',
			esc_html__('@Orion Static blocks', 'dentalia'),
			array(
				'description' => esc_html__('Display Static block content.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-admin-page',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),						
			    'static_block' => array(
			        'type' => 'link',
			        'label' => __('Choose a static block', 'dentalia'),
			        'default' => '',
			        'post_types' => array('static_blocks'),
			    )					 
			),		    				
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_static_block_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_static_block_w', __FILE__, 'orion_static_block_w');