<?php
/*
Widget Name: @OrionThemes Featured Pages
Description: Displays Featured pages
Author: OrionThemes
Author URI: http://orionthemes.com
Widget URI: http://orionthemes.com
*/

function orion_return_pages_array() {
	$pages = get_pages();
	$all_pages = array();
	foreach ( $pages as $page ) {
		$id = $page->ID;
		$page_title = $page->post_title;
		$all_pages[$id] = $page_title;
	}
	return  $all_pages;
}


class orion_featured_pages extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_featured_pages',
			__('@Orion Featured Pages', 'dentalia'),
			array(
				'description' => esc_html__('Displays selected pages in a grid or carousel.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-screenoptions'
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),				
				'pages_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add pages' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to select a page', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='page_id'] option:selected",
			            'update_event' => 'change',
			            'value_method' => 'text'
			        ),
		        	'fields' => array(
						'page_id' => array(
							'type' => 'select',
							'label' => esc_html__( 'Choose page by title.', 'dentalia' ),
							'description' => esc_html__( 'Add excerpt and featured image on page edit screen, to display it inside widget.', 'dentalia' ),
							'default' => '',
							'options' => orion_return_pages_array(),
						),
						'page_icon' => array(
					        'type' => 'icon',
					        'label' => esc_html__('Select an icon', 'dentalia'),
					    ),
						'icon_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon color', 'dentalia' ),
					        'default' => '#fff'
					    ),					    
						'icon_bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon Background color', 'dentalia' ),
					        'default' => orion_get_option('main_theme_color', false, '#00b2ca' ),

					    ),
						'overrides' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Override Content' , 'dentalia' ),
					        'hide' => true,
					        'fields' => array(
								'custom_image' => array (
									'type' => 'media',
									'label' => esc_html__( 'Custom image', 'dentalia' ),
									'description' => esc_html__( 'Replaces the featured image.', 'dentalia' ),
									'library' => 'image',
									'fallback' => false,
								),
							    'custom_title' => array(
							        'type' => 'text',
							        'label' => esc_html__('Custom title', 'dentalia'),
							        'description' => esc_html__( 'Overwrites the page title.', 'dentalia' ),
							        'default' => ''
							    ),							    
							    'custom_excerpt' => array(
							        'type' => 'textarea',
							        'label' => esc_html__('Custom excerpt', 'dentalia'),
							        'description' => esc_html__( 'Overwrites the page excerpt.', 'dentalia' ),
							        'default' => '',
							    ),	
							),
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
					'label' => esc_html__( 'Text color', 'dentalia' ),
					'default' => 'text-default',
					'options' => array(
						'text-default' => esc_html__( 'Default', 'dentalia' ),
						'text-light' => esc_html__( 'Light', 'dentalia' ),
						'text-dark' => esc_html__( 'Dark', 'dentalia' ),
					)
				),
				'text_align' => array(
					'type' => 'select',
					'label' => esc_html__( 'Align elements', 'dentalia' ),
					'default' => 'text-left',
					'options' => array(
						'text-center' => esc_html__( 'Center', 'dentalia' ),
						'text-left' => esc_html__( 'Left', 'dentalia' ),
						'text-right' => esc_html__( 'Right', 'dentalia' ),
					),
				),
				'option_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings & Layout' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'display_feeatured' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Display featured image', 'dentalia' ),
							'default' => true,
						),					
						'display_excerpt' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Display excerpt', 'dentalia' ),
							'default' => true,
						),						       	
						'display_readmore' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Display read more button', 'dentalia' ),
							'default' => true,
						),
					    'readmore_text' => array(
					        'type' => 'text',
					        'label' => esc_html__('Button text', 'dentalia'),
					        'default' => 'Read more'
					    ),
						'display_icon' => array(
							'type' => 'select',
							'label' => esc_html__( 'Icon position', 'dentalia' ),
							'default' => 'on-image',
							'options' => array(
								'on-image' => esc_html__( 'On featured image', 'dentalia' ),
								'in_title' => esc_html__( 'Next to title', 'dentalia' ),
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
								'carousel_navigation_text_color' => array(
									'type' => 'select',
									'label' => esc_html__( 'Navigation color', 'dentalia' ),
									'default' => 'default',
									'options' => array(
										'default' => esc_html__( 'Default', 'dentalia' ),
										'text-light' => esc_html__( 'Light', 'dentalia' ),
										'text-dark' => esc_html__( 'Dark', 'dentalia' ),
									)
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
			    'style_section'  => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Widget Style' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(			        	
						'bg_color' => array(
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
						'divider_001' => array(
		            		'type' => 'oriondivider',
		            	),	
					    'image_size' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Image size', 'dentalia' ),
					        'default' => 'default',
					        'options' => array(
					            'default' => esc_html__( 'Default', 'dentalia' ),
					        	'orion_carousel' => esc_html__( '3:2', 'dentalia' ),				        	
					            'orion_square' => esc_html__( 'Square', 'dentalia' ),
					        	'full' => esc_html__( 'Original image size', 'dentalia' ),
					        ),
					    ),		            					    
						'divider_01' => array(
		            		'type' => 'oriondivider',
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
					    'btn_style' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Rounding', 'dentalia' ),
					        'default' => '',
					        'options' => array(
					            '' => esc_html__( 'Slightly Rounded', 'dentalia' ),
					            'btn-round' => esc_html__( 'Completely Rounded', 'dentalia' ),
					        ),
					    ),
						'title_hover_color' => array(
							'type' => 'select',
							'label' => esc_html__( 'Title hover and button color', 'dentalia' ),
							'default' => 'primary',
							'options' => array(
								'primary' => esc_html__( 'Main theme color', 'dentalia' ),
								'secondary' => esc_html__( 'Secondary theme color', 'dentalia' ),
								'tertiary' => esc_html__( 'Tertiary theme color', 'dentalia' ),	
								'black' => esc_html__( 'Dark', 'dentalia' ),	
								'white' => esc_html__( 'Light', 'dentalia' ),
							),					
						),
						'divider_02' => array(
		            				'type' => 'oriondivider',
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
							'label' => esc_html__( 'Image Hover Overlay', 'dentalia' ),
							'default' => 'overlay-hover-none',
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
							'label' => esc_html__( 'Scale Image on Hover', 'dentalia' ),
							'default' => 'scale-none',
							'options' => array(
								'scale-none' => esc_html__( 'None', 'dentalia' ),
								'scale-zoomin' => esc_html__( 'Zoom in', 'dentalia' ),	
								'scale-zoomout' => esc_html__( 'Zoom out', 'dentalia' ),
							),					
						),
						'divider_03' => array(
		            				'type' => 'oriondivider',
		            	),	
						'hover_resize' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Enlarge elements on hover', 'dentalia' ),
							'default' => false,
						),	
					),
			    ),
				'text_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Typography' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'title_size' => array(
							'type' => 'select',
							'label' => esc_html__( 'Title Size', 'dentalia' ),
							'default' => 'h5',
							'options' => array(
								'h1' => esc_html__( 'H1', 'dentalia' ),
								'h2' => esc_html__( 'H2', 'dentalia' ),
								'h3' => esc_html__( 'H3', 'dentalia' ),
								'h4' => esc_html__( 'H4', 'dentalia' ),
								'h5' => esc_html__( 'H5', 'dentalia' ),
								'h6' => esc_html__( 'H6', 'dentalia' ),
							),					
						),						
					    'title_bold' =>  array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Bold Title', 'dentalia' ),
					        'default' => false,
					    ),
					    'title_uppercase' =>  array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Uppercase Title', 'dentalia' ),
					        'default' => false,
					    ),								
			        ),
			    ),			    
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_featured_pages-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_featured_pages', __FILE__, 'orion_featured_pages');