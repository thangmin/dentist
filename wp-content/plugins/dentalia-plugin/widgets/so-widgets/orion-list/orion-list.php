<?php

/*
Widget Name: @OrionThemes Icon List
Description: Displays a list
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_list_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_list_w',
			__('@Orion Icon List', 'dentalia'),
			array(
				'description' => esc_html__('Display a list with custom icons.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-editor-alignleft',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),	    
				'widget_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add list' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a list', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='list_name']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
					    'list_name' => array(
					        'type' => 'text',
					        'label' => esc_html__('List Item Description', 'dentalia'),
					        'default' => ''
					    ),
						'list_icon' => array(
						    'type' => 'icon',
						    'label' => esc_html__('Icon', 'dentalia'),
						),					    							
					),
		        ),
				'text_color' => array(
					'type' => 'select',
					'label' => esc_html__( 'Text color style', 'dentalia' ),
					'default' => 'text-default',
					'options' => array(
					'text-default' => esc_html__( 'Default', 'dentalia' ),						
					'text-light' => esc_html__( 'Light text', 'dentalia' ),
					'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
					)
				),		        
			   'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'icon_size' => array(
							'type' => 'select',
							'label' => esc_html__( 'List item size', 'dentalia' ),
							'default' => 'size-normal',
							'options' => array(
							'size-small' => esc_html__( 'Small', 'dentalia' ),								
							'size-normal' => esc_html__( 'Normal', 'dentalia' ),
							'size-large' => esc_html__( 'Large', 'dentalia' ),							
							)
						),
					    'list_padding' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'List item padding', 'dentalia' ),
					        'default' => 12,
					        'min' => 0,
					        'max' => 100,
					        'integer' => true,
					    ),
						'list_text_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Custom Text color', 'dentalia' ),
					        'default' => ''
					    ),			        	
						'list_icon_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon color', 'dentalia' ),
					        'default' => ''
					    ),						    
						'list_bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Background color', 'dentalia' ),
					        'default' => ''
					    ),
					    'bg_opacy' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Background color opacity', 'dentalia' ),
					        'default' => 100,
					        'min' => 1,
					        'max' => 100,
					        'integer' => true,
					    ),
			        ),
			    ),    
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_list_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_list_w', __FILE__, 'orion_list_w');