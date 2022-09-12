<?php 
/*
Widget Name: @OrionThemes Gallery
Description: Displays images in grid or carousel
Author: OrionThemes
Author URI: http://orionthemes.com
Widget URI: http://orionthemes.com
*/

class orion_simple_gallery extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_simple_gallery',
			__('@Orion Gallery', 'dentalia'),
			array(
				'description' => esc_html__('Display images in a grid or carousel.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-format-gallery'
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),				
				'images_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add images' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add image', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='image_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
						'image' => array(
							'type' => 'media',
							'label' => esc_html__( 'Upload an image.', 'dentalia' ),
							'choose' => __( 'Choose image', 'dentalia' ),
							'fallback' => true,
						),
					    'hovertext' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Text on Hover', 'dentalia' ),
					        'rows' => 1,
							'default' => esc_html__('', 'dentalia'),
					    ),
		        		'image_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Admin Label', 'dentalia'),
					        'description' => esc_html__('Optional, does not appear on the front-end.', 'dentalia'),
					    ),							
					),
				
		        ),
		        'per_row' => array(
					'type' => 'select',
					'label' => esc_html__('Elements per row', 'dentalia'),	
				    'options' => array(
						'1'	=> '1',
				    	'2'	=> '2',
			            '3'	=> '3',
			            '4'	=> '4',
			            '6'	=> '6',
		       		),
				    'default' => 3,		
		       	),	 		        
				'display_layout' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose Layout', 'dentalia' ),
					'default' => 'grid',
					'options' => array(
			            'carousel' => esc_html__( 'Carousel', 'dentalia' ),
			            'grid' => esc_html__( 'Grid', 'dentalia' ),
					)			            					
				),
			    'text_color' => array(
			        'type' => 'select',
			        'label' => esc_html__( 'Widget Title Color', 'dentalia' ),
			        'default' => 'text-dark',
					'options' => array(					
						'text-dark' => esc_html__( 'Dark', 'dentalia' ),	
						'text-light' => esc_html__( 'Light', 'dentalia' ),
						'primary-color' => esc_html__( 'Main theme color', 'dentalia' ),
						'secondary-color' => esc_html__( 'Secondary theme color', 'dentalia' ),
						'tertiary-color' => esc_html__( 'Tertiary theme color', 'dentalia' ),
					),	
			    ),						
				'option_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'onclick' => array(
						'type' => 'select',
						'label' => esc_html__( 'On click', 'dentalia' ),
						'default' => 'nothing',
						'options' => array(
							'lightbox' => esc_html__( 'Open image in lightbox', 'dentalia' ),
							'nothing' => esc_html__( 'Do nothing', 'dentalia' ),
							),
						),						    
						'option_carousel' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Carousel Settings' , 'dentalia' ),
					        'hide' => true,
					        'fields' => array(
								'autoplay' => array(
									'type' => 'checkbox',
									'label' => esc_html__( 'Enable autoplay', 'dentalia' ),
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
								'navigation_carousel' => array(
									'type' => 'select',
									'label' => esc_html__( 'Navigation', 'dentalia' ),
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
					        ),
					    ),    
			        ),
			    ),
				'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Style & Layout' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'image_style' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image Shape', 'dentalia' ),
							'default' => 'orion_carousel',
							'options' => array(
								'orion_portrait' => esc_html__( 'Portrait', 'dentalia' ),								
								'orion_circle' => esc_html__( 'Circle', 'dentalia' ),
								'orion_square' => esc_html__( 'Square', 'dentalia' ),
								'orion_carousel' => esc_html__( '3:2 ratio', 'dentalia' ),
								'orion_tablet' => esc_html__( '750px width', 'dentalia' ),
								'' => esc_html__( 'Original ratio', 'dentalia' ),
							),					
						),
					    'text_hover_color' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Hover Text Color', 'dentalia' ),
					        'default' => 'text-light',
							'options' => array(
								'primary-color' => esc_html__( 'Main theme color', 'dentalia' ),
								'secondary-color' => esc_html__( 'Secondary theme color', 'dentalia' ),
								'tertiary-color' => esc_html__( 'Tertiary theme color', 'dentalia' ),	
								'text-dark' => esc_html__( 'Dark', 'dentalia' ),	
								'text-light' => esc_html__( 'Light', 'dentalia' ),
							),	
					    ),
						'image_overlay' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image Overlay', 'dentalia' ),
							'default' => 'overlay-none',
							'options' => array(
								'overlay-none' => esc_html__( 'None', 'dentalia' ),
								'overlay-black' => esc_html__( 'Darken', 'dentalia' ),	
								'overlay-white' => esc_html__( 'Lighten', 'dentalia' ),
								'overlay-primary' => esc_html__( 'Main theme color', 'dentalia' ),	
								'overlay-secondary' => esc_html__( 'Secondary theme color', 'dentalia' ),	
								'overlay-tertiary' => esc_html__( 'Tertiary theme color', 'dentalia' ),
								'overlay-greyscale' => esc_html__( 'Greyscale', 'dentalia' ),
							),					
						),
						'image_overlay_hover' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image Overlay on Hover', 'dentalia' ),
							'default' => 'overlay-none',
							'options' => array(
								'overlay-hover-none' => esc_html__( 'None', 'dentalia' ),
								'overlay-hover-black' => esc_html__( 'Darken', 'dentalia' ),	
								'overlay-hover-white' => esc_html__( 'Lighten', 'dentalia' ),
								'overlay-hover-primary' => esc_html__( 'Main theme color', 'dentalia' ),	
								'overlay-hover-secondary' => esc_html__( 'Secondary theme color', 'dentalia' ),	
								'overlay-hover-tertiary' => esc_html__( 'Tertiary theme color', 'dentalia' ),
								'overlay-hover-greyscale' => esc_html__( 'Greyscale', 'dentalia' ),
							),					
						),
						'scale_efect' => array(
							'type' => 'select',
							'label' => esc_html__( 'Scale image on hover', 'dentalia' ),
							'default' => 'scale-none',
							'options' => array(
								'scale-none' => esc_html__( 'None', 'dentalia' ),
								'scale-zoomin' => esc_html__( 'Zoom in', 'dentalia' ),	
								'scale-zoomout' => esc_html__( 'Zoom out', 'dentalia' ),
							),					
						),
					),
				),				    
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_simple_gallery-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_simple_gallery', __FILE__, 'orion_simple_gallery');