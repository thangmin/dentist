<?php
/*
Widget Name: (OrionThemes) Testimonials
Description: Displays testimonials
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_testimonial_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_testimonial_w',
			__('(OrionThemes) Testimonials', 'dentalia'),
			array(
				'description' => esc_html__('Display your testimonials in a carousel.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-format-quote',
			),
			array(
			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			        'default' => ''
			    ),	    
				'widget_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Testimonial' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a testimonial', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='item_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
					    'item_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Testimonial Title (optional)', 'dentalia'),
					    ),
					    'description' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Testimonial', 'dentalia' ),
					        'rows' => 6,
					        'default' => 'Testimonial quote.'
					    ),			    					    
					    'name' => array(
					        'type' => 'text',
					        'label' => esc_html__('Name', 'dentalia'),
					        'default' => 'Mr. Orion'
					    ),
						'image' => array(
					        'type' => 'media',
					        'label' => esc_html__( 'Upload Image (optional)', 'dentalia'),
					        'choose' => esc_html__( 'Choose image', 'dentalia'),
					        'update' => esc_html__( 'Set image', 'dentalia'),
					        'library' => 'image',
					        'fallback' => true
					    ),
					),
		        ),
				'display_layout' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose Layout', 'dentalia' ),
					'default' => 'carousel',
					'options' => array(
			            'carousel' => esc_html__( 'Carousel', 'dentalia' ),
			            'grid' => esc_html__( 'Grid', 'dentalia' ),
					)			            					
				),
		        'per_row' => array(
					'type' => 'select',
					'label' => esc_html__('Elements per Row', 'dentalia'),	
				    'options' => array(
						'1'	=> '1',
				    	'2'	=> '2',
				    	'3'	=> '3',
		       		),
				    'default' => '1',		
		       	),	
				'text_color' => array(
					'type' => 'select',
					'label' => esc_html__( 'Text Color', 'dentalia' ),
					'default' => 'text-default',
					'options' => array(
						'text-default' => esc_html__( 'Default', 'dentalia' ),
						'text-light' => esc_html__( 'Light text', 'dentalia' ),
						'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
					)
				),			
				'option_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(

						'bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Background Color', 'dentalia' ),
					        'default' => ''
					    ),
					    'bg_opacy' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Background Opacity', 'dentalia' ),
					        'default' => 100,
					        'min' => 1,
					        'max' => 100,
					        'integer' => true,
					    ),
						'border_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Border Color', 'dentalia' ),
					        'default' => ''
					    ),
						'text_size' => array(
							'type' => 'select',
							'label' => esc_html__( 'Text Size', 'dentalia' ),
							'default' => '',
							'options' => array(
								'small' => esc_html__( 'Small', 'dentalia' ),
								'' => esc_html__( 'Normal', 'dentalia' ),
								'lead' => esc_html__( 'Large', 'dentalia' ),
							)
						),
					    'border-radius' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Rounded Corners', 'dentalia' ),
					        'default' => true
					    ),
					    'hide_image' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Hide Image', 'dentalia' ),
					        'default' => false
					    ),
						'option_carousel' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Carousel Settings' , 'dentalia' ),
					        'hide' => true,
					        'fields' => array(
								'navigation_carousel' => array(
									'type' => 'select',
									'label' => esc_html__( 'Navigation Style', 'dentalia' ),
									'default' => 'dots',
									'options' => array(
										'dots' => esc_html__( 'Dots', 'dentalia' ),
										'arrows_top' => esc_html__( 'Arrows on top', 'dentalia' ),
										'arrows_bottom' => esc_html__( 'Arrows on bottom', 'dentalia' ),
										'arrows_aside' => esc_html__( 'Arrows on side', 'dentalia' ),
										'none' => esc_html__( 'None', 'dentalia' ),
									),					
								),
								'display_mobile_nav' => array(
									'type' => 'checkbox',
									'label' => esc_html__( 'Display carousel navigation on mobile devices', 'dentalia' ),
									'default' => true,
								),
								'autoplay' => array(
									'type' => 'checkbox',
									'label' => esc_html__( 'Enable Autoplay', 'dentalia' ),
									'default' => false,
								),
								'autoplay_timeout' => array(
							        'type' => 'slider',
							        'label' => esc_html__( 'Autoplay Transition Delay', 'dentalia' ),
							        'default' => 5000,
							        'min' => 1000,
							        'max' => 10000,
							        'integer' => true,
							    ),

					        ),
					    ),   
			        ),
			    ),			    
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_testimonial_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_testimonial_w', __FILE__, 'orion_testimonial_w');