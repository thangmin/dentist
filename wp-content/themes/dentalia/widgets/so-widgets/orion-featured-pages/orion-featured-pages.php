<?php
/*
Widget Name: (OrionThemes) Featured Pages
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
			__('(OrionThemes) Featured Pages', 'dentalia'),
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
					        'default' => orion_get_option('main_theme_color', false, '#00BCD4' ),

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
				'option_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
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
								'in_title' => esc_html__( 'Next to page title', 'dentalia' ),
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
			        'label' => esc_html__( 'Style' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'title_hover_color' => array(
							'type' => 'select',
							'label' => esc_html__( 'Title hover color', 'dentalia' ),
							'default' => 'primary',
							'options' => array(
								'primary' => esc_html__( 'Main theme color', 'dentalia' ),
								'secondary' => esc_html__( 'Secondary theme color', 'dentalia' ),
								'tertiary' => esc_html__( 'Tertiary theme color', 'dentalia' ),	
								'black' => esc_html__( 'Dark', 'dentalia' ),	
								'white' => esc_html__( 'Light', 'dentalia' ),
							),					
						),			        	
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
						'image_overlay' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image overlay', 'dentalia' ),
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
							'label' => esc_html__( 'Image overlay on hover', 'dentalia' ),
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
							'label' => esc_html__( 'Scale image on hover', 'dentalia' ),
							'default' => 'scale-zoomin',
							'options' => array(
								'scale-none' => esc_html__( 'None', 'dentalia' ),
								'scale-zoomin' => esc_html__( 'Zoom in', 'dentalia' ),	
								'scale-zoomout' => esc_html__( 'Zoom out', 'dentalia' ),
							),					
						),
						'hover_resize' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Enlarge on hover', 'dentalia' ),
							'default' => false,
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