<?php

/*
Widget Name: (OrionThemes) Heading
Description: Displays Heading
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_heading_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_heading_w',
			__('(OrionThemes) Heading', 'dentalia'),
			array(
				'description' => esc_html__('Display headings in different styles.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-editor-bold',
			),
			array(

			),
			array(

			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Text', 'dentalia'),
			    ),
		        'size' => array(
					'type' => 'select',
					'label' => esc_html__('HTML Tag', 'dentalia'),	
				    'options' => array(
						'h1'	=> esc_html__('H1', 'dentalia'),
				    	'h2'	=> esc_html__('H2', 'dentalia'),
				    	'h3'	=> esc_html__('H3', 'dentalia'),
				    	'h4'	=> esc_html__('H4', 'dentalia'),
				    	'h5'	=> esc_html__('H5', 'dentalia'),
				    	'h6'	=> esc_html__('H6', 'dentalia'),
		       		),
				    'default' => '',		
		       	),			    
		        'text_color' => array(
					'type' => 'select',
					'label' => esc_html__('Color', 'dentalia'),	
				    'options' => array(
				    	'text-default'	=> esc_html__('Default', 'dentalia'),
				    	'text-dark'	=> esc_html__('Dark', 'dentalia'),
				    	'text-light'	=> esc_html__('Light', 'dentalia'),
				    	'primary-color'	=> esc_html__('Main theme color', 'dentalia'),
				    	'secondary-color'	=> esc_html__('Secondary theme color', 'dentalia'),
				    	'tertiary-color'	=> esc_html__('Tertiary theme color', 'dentalia'),				    	
		       		),
				    'default' => 'text-default',		
		       	),
		        'text_align' => array(
					'type' => 'select',
					'label' => esc_html__('Align', 'dentalia'),	
				    'options' => array(
						'text-left'	=> esc_html__('Left', 'dentalia'),
				    	'text-right'	=> esc_html__('Right', 'dentalia'),						
				    	'text-center'	=> esc_html__('Center', 'dentalia'),
		       		),
				    'default' => 'left',		
		       	),
			    'case' => array(
			        'type' => 'checkbox',
			        'label' => esc_html__('Uppercase', 'dentalia'),
			        'default' => false,
			    ),
		        'separator_style' => array(
					'type' => 'select',
					'label' => esc_html__('Divider', 'dentalia'),	
				    'options' => array(
						''	=> esc_html__('None', 'dentalia'),
				    	'separator-style-1'	=> esc_html__('Style 1', 'dentalia'),
				    	'separator-style-2'	=> esc_html__('Style 2', 'dentalia'),			    	
		       		),
				    'default' => '',		
		       	),
			    'heading_margin' => array(
			        'type' => 'number',
			        'label' => esc_html__( 'Add bottom margin (px)', 'dentalia' ),
			        'default' => '',
			    ),
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_heading_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_heading_w', __FILE__, 'orion_heading_w');