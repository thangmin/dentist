<?php
/*
Widget Name: (OrionThemes) Recent Posts
Description: With optional category filter.
Author: OrionThemes
Author URI: http://orionthemes.com
Widget URI: http://orionthemes.com
*/

function get_category_array() { 
	$categories = get_categories( 
		array(
			'taxonomy' => 'category',
		    'orderby' => 'name',
		) 
	);
	$all_categories = array();
	$all_categories['All'] = 'all';
	foreach ( $categories as $category ) {
		$id = $category->term_id;
		$cat_title = $category->name;
		// fill array
		$all_categories[$id] = $cat_title;
	}

	return  $all_categories;
}

function post_limit_array(){
	$select = array();
    for($i=1; $i < 25; $i++) { 
		$select[$i] = $i;
	}
	return $select;
}


class orion_recent_posts_carousel extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_recent_posts_carousel',
			__('(OrionThemes) Recent Posts', 'dentalia'),
			array(
				'description' => esc_html__('Highly coustomizable with category filter.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-edit'
			),
			array(

			),
			array(	
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),
				'category_option' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose a category', 'dentalia' ),
					'description' => esc_html__( 'Select a category.', 'dentalia' ),
					'default' => 'all',
					'options' => get_category_array()		
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
		        'number_of_posts' => array(
					'type' => 'select',
					'label' => esc_html__('Number of posts', 'dentalia'),	
				    'options' => post_limit_array(),
				    'default' => 3,		
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
							'label' => esc_html__( 'Display post excerpt', 'dentalia' ),
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
						'display_date' => array(
							'type' => 'select',
							'label' => esc_html__( 'Display date', 'dentalia' ),
							'default' => 'on-image',
							'options' => array(
								'on-image' => esc_html__( 'On featured image', 'dentalia' ),
								'in-meta' => esc_html__( 'Above post title', 'dentalia' ),
								'hide' => esc_html__( 'Do not display', 'dentalia' ),	
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
						'readmore_color' => array(
							'type' => 'select',
							'label' => esc_html__( 'Button & hover color', 'dentalia' ),
							'default' => 'primary',
							'options' => array(
								'primary' => esc_html__( 'Main theme color', 'dentalia' ),
								'secondary' => esc_html__( 'Secondary theme color', 'dentalia' ),
								'tertiary' => esc_html__( 'Tertiary theme color', 'dentalia' ),	
								'black' => esc_html__( 'Dark', 'dentalia' ),	
								'white' => esc_html__( 'Light', 'dentalia' ),
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
						'bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Background color', 'dentalia' ),
					        'default' => '',
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
								// 'overlay-blur' => esc_html__( 'Blur', 'dentalia' ),
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
								// 'overlay-hover-blur' => esc_html__( 'Blur', 'dentalia' ),
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
					),
			    ),
			),	    	
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_recent_posts_carousel-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_recent_posts_carousel', __FILE__, 'orion_recent_posts_carousel');