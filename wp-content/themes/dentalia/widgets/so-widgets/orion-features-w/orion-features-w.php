<?php
 
/*
Widget Name: (OrionThemes) Features
Description: Displays features
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_features_w extends SiteOrigin_Widget {

	function __construct() {
		$main_theme_color = orion_get_theme_option_css('main_theme_color', '#00BCD4' );
		parent::__construct(
			'orion_features_w',
			esc_html__('(OrionThemes) Features', 'dentalia'),
			array(
				'description' => esc_html__('Displays animated features in a grid.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-star-filled',
			),
			array(

			),
			array(
	    
				'icon_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Feature' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to edit', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='icon_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
						'the_icon' => array(
						    'type' => 'icon',
						    'label' => esc_html__('Icon', 'dentalia'),
						),
					    'custom_image_file' => array(
					        'type' => 'media',
					        'label' => esc_html__( 'Or choose an image', 'dentalia' ),
					        'choose' => esc_html__( 'Choose image', 'dentalia' ),
					        'update' => esc_html__( 'Set image', 'dentalia' ),
					         'description' => esc_html__('setting the image will override the icon field', 'dentalia'),
					        'library' => 'image',
					        'fallback' => false
					    ),
					    'icon_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Title', 'dentalia'),
					        'default' => ''
					    ),
				    
						'description' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Description', 'dentalia' ),
					        'rows' => 4
					    ),
					    'read_more' => array(
					        'type' => 'text',
					        'label' => esc_html__('Button Text', 'dentalia'),
					        'default' => 'Read more',
					    ),					    
					    'url' => array(
					        'type' => 'link',
					        'label' => esc_html__('Destination URL', 'dentalia'),
					        'default' => esc_html__('#', 'dentalia'),
					    ),					    
						'style' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Element Style' , 'dentalia' ),
					        'hide' => true,
					        'fields' => array(
								'icon_color' => array(
							        'type' => 'color',
							        'label' => esc_html__( 'Icon color', 'dentalia' ),
							        'default' => $main_theme_color,
							    ),
							    'bg_image' => array(
							        'type' => 'media',
							        'label' => esc_html__( 'Background image', 'dentalia'  ),
							        'choose' => esc_html__( 'Choose image', 'dentalia' ),
							        'update' => esc_html__( 'Upload image', 'dentalia' ),
							        'fallback' => true
							    ),					    		
								'bg_color' => array(
							        'type' => 'color',
							        'label' => esc_html__( 'Background Color Overlay', 'dentalia' ),
							        'default' => 'transparent',
							    ),
							    'bg_opacy' => array(
							        'type' => 'slider',
							        'label' => esc_html__( 'Overlay opacity', 'dentalia' ),
							        'description' => esc_html__('Values from 0 (transparent) to 100 (no opacity)', 'dentalia'),
							        'default' => 100,
							        'min' => 0,
							        'max' => 100,
							        'integer' => true
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
							    'title_hover_color' => array(
							        'type' => 'select',
							        'label' => esc_html__( 'Title Hover Color', 'dentalia' ),
							        'default' => 'primary-hover',
							        'options' => array(
							            'primary-hover' => esc_html__( 'Main Theme Color', 'dentalia' ),
							            'secondary-hover' => esc_html__( 'Secondary Theme Color', 'dentalia' ),
							            'tertiary-hover' => esc_html__( 'Tertiary Theme Color', 'dentalia' ),
							            'blue-hover' => esc_html__( 'Blue', 'dentalia' ),
							            'green-hover' => esc_html__( 'Green', 'dentalia' ),
							            'pink-hover' => esc_html__( 'Pink', 'dentalia' ),
							            'orange-hover' => esc_html__( 'Orange', 'dentalia' ),
							            'black-hover' => esc_html__( 'Black', 'dentalia' ),
							            'white-hover' => esc_html__( 'White', 'dentalia' ),
							        ),
							    ),							    
							),
						),
					),
		        ),

				'option_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Style & layout' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
				        'per_row' => array(
							'type' => 'select',
							'label' => esc_html__('Elements per row', 'dentalia'),	
						    'options' => array(
								'1'	=> '1',
						    	'2'	=> '2',
					            '3'	=> '3',
					            '4'	=> '4',
				       		),
						    'default' => 3,		
				       	),
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
				        'text_alignment' => array(
							'type' => 'select',
							'label' => esc_html__('Text alignment', 'dentalia'),	
							'default' => 'text-center',
							'options' => array(
								'text-center' => esc_html__( 'Center', 'dentalia' ),
								'text-left' => esc_html__( 'Left', 'dentalia' ),
							),
				       	),					       	
				        'icon_size' => array(
							'type' => 'select',
							'label' => esc_html__('Icon size', 'dentalia'),	
							'default' => 'normal',
							'options' => array(
								'normal' => esc_html__( 'Normal', 'dentalia' ),
								'large' => esc_html__( 'Large', 'dentalia' ),
							),
				       	),				       	
					    'feature_height' => array(
					        'type' => 'number',
					        'label' => esc_html__( 'Height in pixels', 'dentalia' ),
					        'default' => 336,
					    ),
						'always_open' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Always show description?', 'dentalia' ),
					        'default' => false
					    ),
						'add_borders' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Add borders', 'dentalia' ),
					        'default' => false
					    ),
						'border_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Border color', 'dentalia' ),
					        'default' => ''
					    ),						    
						'option_button' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Button' , 'dentalia' ),
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
							        	'' => esc_html__( 'Slightly Rounded', 'dentalia' ),
							            'btn-round' => esc_html__( 'Completely Rounded', 'dentalia' ),
							        ),
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
         return 'orion_features_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_features_w', __FILE__, 'orion_features_w');