<?php

/*
Widget Name: @OrionThemes Icons
Description: Display social media and other icons.
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_icon_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_icon_w',
			esc_html__('@Orion Icons', 'dentalia'),
			array(
				'description' => esc_html__('Display social media and other icons.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-twitter',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),	
				'icon_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Icon' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add an Icon', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='icon_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
			        'fields' => array(				
					    'icon' => array(
					        'type' => 'text',
					        'label' => esc_html__( 'Icon Title', 'dentalia' ),
							'default' => esc_html__('Icon', 'dentalia'),
					    ),
		        		'icon_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Label', 'dentalia'),
					        'description' => esc_html__('Does not appear on front-end', 'dentalia'),
					    ),					    
					    'url' => array(
					        'type' => 'link',
					        'label' => esc_html__('Destination URL', 'dentalia'),
					    ),
					    'new_tab' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Open in a new window', 'dentalia' ),
					        'default' => false,
					    ),

					    'icon' => array(
					        'type' => 'icon',
					        'label' => esc_html__('Select Icon', 'dentalia'),
					    ),
						'icon_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon Color', 'dentalia' ),
					        'default' => '',
						),					
					),
				),

				'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Style' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(	
					    'icon_color' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Icon Color', 'dentalia' ),
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
					            'btn btn-red' => esc_html__( 'Red', 'dentalia' ),
					            'btn btn-yellow' => esc_html__( 'Yellow', 'dentalia' ),
					            'btn btn-black' => esc_html__( 'Black', 'dentalia' ),
					            'btn btn-white' => esc_html__( 'White', 'dentalia' ),
					        ),
					    ),
					    'icons_type' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Icon Style', 'dentalia' ),
					        'default' => 'btn-empty',
					        'options' => array(
					            'btn-flat' => esc_html__( 'Flat', 'dentalia' ),
					            'btn-wire' => esc_html__( 'Wire', 'dentalia' ),
					            'btn-empty' => esc_html__( 'Empty', 'dentalia' ),
					        ),
					    ),
					    'icon_style' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Rounding', 'dentalia' ),
							'default' => '',
					        'options' => array(
					        	'' => esc_html__( 'Slightly Rounded', 'dentalia' ),
					            'btn-round' => esc_html__( 'Completely Rounded', 'dentalia' ),
					        ),
					    ),
					    'icon_size' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Icon Size', 'dentalia' ),
					        'default' => 'btn-md',
					        'options' => array(
					        	'btn-xs' => esc_html__( 'Tiny', 'dentalia' ),
					            'btn-sm' => esc_html__( 'Small', 'dentalia' ),
					            'btn-md' => esc_html__('Normal', 'dentalia'),
					            'btn-lg' => esc_html__('Large', 'dentalia'),
					        ),
					    ),
			 			'divider_iw_01' => array(
		           				'type' => 'oriondivider',
		            	),
					    'space_between_icons' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Space between the icons', 'dentalia' ),
					        'min' => 0,
					        'max' => 60,
					        'integer' => true
					    ),
					    'icons_align' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Align icons', 'dentalia' ),
					        'default' => '',
					        'options' => array(
					            '' => esc_html__( 'Default', 'dentalia' ),
					            'text-left' => esc_html__( 'Left', 'dentalia' ),
					            'text-center' => esc_html__( 'Center', 'dentalia' ),
					            'text-right' => esc_html__( 'Right', 'dentalia' ),
					            'md-text-left' => esc_html__( 'Left on desktop', 'dentalia' ),
					            'md-text-right' => esc_html__( 'Right on desktop', 'dentalia' ),
					        ),
					    ),					    
					),
				),
			),	
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_icon_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_icon_w', __FILE__, 'orion_icon_w');