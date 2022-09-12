<?php

/*
Widget Name: @OrionThemes Button Group
Description: Add multiple buttons
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_button_group_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_button_group_w',
			esc_html__('@Orion Button Group', 'dentalia'),
			array(
				'description' => esc_html__('Add multiple buttons.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-arrow-right-alt',
			),
			array(

			),
			array(
				'btn_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add buttons' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a button', 'dentalia' ),
			        'item_label' => array(
 			            'selector'     => "[id*='button']",
 			            'update_event' => 'change',
 			            'value_method' => 'val'
			        ),
		        	'fields' => array(
					    'button' => array(
					        'type' => 'text',
					        'label' => esc_html__( 'Button Text', 'dentalia' ),
							'default' => esc_html__('Button', 'dentalia'),
					    ),
					    'url' => array(
					        'type' => 'link',
					        'label' => esc_html__('Destination URL', 'dentalia'),
					        'default' => esc_html__('#', 'dentalia'),
					    ),
					    'new_tab' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Open in a new window', 'dentalia' ),
					        'default' => false,
					    ),
						'icon_section' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Icon' , 'dentalia' ),
					        'hide' => true,
					        'fields' => array(	
							    'icon' => array(
							        'type' => 'icon',
							        'label' => esc_html__('Select Icon', 'dentalia'),
							    ),
								'icon_color' => array(
							        'type' => 'color',
							        'label' => esc_html__( 'Icon Color', 'dentalia' ),
							        'default' => '',
							    ),					    		    
							    'icon_position' => array(
							        'type' => 'select',
							        'label' => esc_html__( 'Icon Position', 'dentalia' ),
							        'default' => '',
							        'options' => array(
							            'icon-left' => esc_html__( 'Left', 'dentalia' ),
							            'icon-right' => esc_html__( 'Right', 'dentalia' ),
							            'inset-left' => esc_html__( 'Inset Left', 'dentalia' ),
							            'inset-right' => esc_html__( 'Inset Right', 'dentalia' ),
							        ),
							    ),

							),
						), 
						'style_section' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Style & Layout' , 'dentalia' ),
					        'hide' => true,
					        'fields' => array(	
							    'btn_type' => array(
							        'type' => 'select',
							        'label' => esc_html__( 'Button Style', 'dentalia' ),
							        'default' => '',
							        'options' => array(
							            'btn-flat' => esc_html__( 'Flat', 'dentalia' ),
							            'btn-wire' => esc_html__( 'Wire', 'dentalia' ),
							            'btn-empty' => esc_html__( 'Empty', 'dentalia' ),
							        ),
							    ),
							    'button_color' => array(
							        'type' => 'select',
							        'label' => esc_html__( 'Button Color', 'dentalia' ),
							        'default' => 'btn',
							        'options' => array(
							            'btn' => esc_html__( 'Default', 'dentalia' ),
							            'btn btn-c1' => esc_html__( 'Main Theme Color', 'dentalia' ),
							            'btn btn-c2' => esc_html__( 'Secondary Theme Color', 'dentalia' ),
							            'btn btn-c3' => esc_html__( 'Tertiary Theme Color', 'dentalia' ),
							            'btn btn-blue' => esc_html__( 'Blue', 'dentalia' ),
							            'btn btn-green' => esc_html__( 'Green', 'dentalia' ),
							            'btn btn-pink' => esc_html__( 'Pink', 'dentalia' ),
							            'btn btn-orange' => esc_html__( 'Orange', 'dentalia' ),
							            'btn btn-black' => esc_html__( 'Black', 'dentalia' ),
							            'btn btn-white' => esc_html__( 'White', 'dentalia' ),
							        ),
							    ),
							    'btn_size' => array(
							        'type' => 'select',
							        'label' => esc_html__( 'Button Size', 'dentalia' ),
							        'default' => 'btn-md',
							        'options' => array(
							        	'btn-xs' => esc_html__( 'Tiny', 'dentalia' ),
							            'btn-sm' => esc_html__( 'Small', 'dentalia' ),
							            'btn-md' => esc_html__('Normal', 'dentalia'),
							            'btn-lg' => esc_html__('Large', 'dentalia'),
							        ),
							    ),				    
							    'btn_style' => array(
							        'type' => 'select',
							        'label' => esc_html__( 'Rounding', 'dentalia' ),
							        'default' => '',
							        'options' => array(
							            '' => esc_html__( 'Slightly Rounded', 'dentalia' ),
							            'btn-round' => esc_html__( 'Completely Rounded', 'dentalia' ),
							        ),
							    ),
							),
						),						
					),
		        ),	    
		        'style_section' => array( 
		        	'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(			        	
					    'btn_alignment' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Align buttons', 'dentalia' ),
					        'default' => 'align-default',
					        'options' => array(
					        	'align-default' => esc_html__( 'Default', 'dentalia' ),
					            'text-left' => esc_html__( 'Left', 'dentalia' ),
					            'text-right' => esc_html__( 'Right', 'dentalia' ),
					            'text-center' => esc_html__( 'Center', 'dentalia' ),
					        ),
					    ),
					    'btn_gutter' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Space between buttons', 'dentalia' ),
					        'default' => 'gutter-normal',
					        'options' => array(
					        	'gutter-normal' => esc_html__( 'Normal', 'dentalia' ),
					            'gutter-small' => esc_html__( 'Small', 'dentalia' ),
					            'gutter-none' => esc_html__( 'None', 'dentalia' ),
					        ),
					    ),					    
					),
		        ),	    		    
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_button_group_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_button_group_w', __FILE__, 'orion_button_group_w');