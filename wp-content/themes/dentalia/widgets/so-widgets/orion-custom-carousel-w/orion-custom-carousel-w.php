<?php
 
/*
Widget Name: (OrionThemes) Custom carousel
Description: Create Custom Carousel
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_custom_carousel_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_custom_carousel_w',
			esc_html__('(OrionThemes) Custom Carousel', 'dentalia'),
			array(
				'description' => esc_html__('Create custom carousel.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-format-gallery',
			),
			array(

			),
			array(
				'slide_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Slide' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to edit', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='slide_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
		        		
					    'slide_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Title', 'dentalia'),
					        'default' => ''
					    ),
					    'navigation_label' => array(
					        'type' => 'text',
					        'label' => esc_html__('Navigation label', 'dentalia'),
					        'default' => ''
					    ),
						'subtitle' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Subtitle', 'dentalia' ),
					        'rows' => 4
					    ),
					    'description' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Description', 'dentalia' ),
					        'rows' => 4
					    ),
					    'btn_text' => array(
					        'type' => 'text',
					        'label' => esc_html__('Button Text', 'dentalia'),
					        'default' => 'Read more',
					    ),					    
					    'url' => array(
					        'type' => 'link',
					        'label' => esc_html__('Destination URL', 'dentalia'),
					        'default' => esc_html__('#', 'dentalia'),
					    ),
					    'image' => array(
					        'type' => 'media',
					        'label' => esc_html__( 'Slide image', 'dentalia'  ),
					        'choose' => esc_html__( 'Choose image', 'dentalia' ),
					        'update' => esc_html__( 'Upload image', 'dentalia' ),
					        'fallback' => true
					    ),						    				    
					),
		        ),
				'option_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Widget Style' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
				        'text_style' => array(
							'type' => 'select',
							'label' => esc_html__('Text color', 'dentalia'),	
							'default' => 'text-default',
							'options' => array(
								'text-default' => esc_html__( 'Default', 'dentalia' ),
								'text-light' => esc_html__( 'Light', 'dentalia' ),
								'text-dark' => esc_html__( 'Dark', 'dentalia' ),
							)		
				       	),
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
					        'default' => 'btn-sm',
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
					        	'' => esc_html__( 'None', 'dentalia' ),
					            'btn-round-2' => esc_html__( 'Slightly Rounded', 'dentalia' ),
					            'btn-round' => esc_html__( 'Completely Rounded', 'dentalia' ),
					        ),
					    ),    
					),
				),					
				'option_carousel' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Carousel' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'autoplay' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Enable autoplay', 'dentalia' ),
							'default' => false,
						), 								
			        ),		
				),	    
			),
			plugin_dir_path(__FILE__)
		);
	}
    function get_template_name($instance) {
         return 'orion_custom_carousel_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_custom_carousel_w', __FILE__, 'orion_custom_carousel_w');