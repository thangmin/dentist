<?php

/*
Widget Name: @OrionThemes Team members
Description: With optional department filter.
Author: OrionThemes
Author URI: http://orionthemes.com
Widget URI: http://orionthemes.com
*/

function orion_get_department_array() { 
	$all_departments = array();
	$all_departments['all'] = 'All';
	$taxonomy = 'department';
	$terms = get_terms();
	foreach ($terms as $key => $term) {
		if ($term->taxonomy == 'department') {
			$slug = $term->slug;
			$cat_title = $term->name;
			$all_departments[$slug] = $cat_title;
		}
	}
	return  $all_departments;
}

function orion_team_limit_array(){
	$select = array();
    for($i=1; $i < 25; $i++) { 
		$select[$i] = $i;
	}
	return $select;
}

class orion_team_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_team_w',
			__('@Orion Team Members', 'dentalia'),
			array(
				'description' => esc_html__('Displays team members in a grid or carousel with multiple options.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-groups'
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
					'label' => esc_html__( 'Choose a department', 'dentalia' ),
					'description' => esc_html__( 'Select a department.', 'dentalia' ),
					'default' => 'all',
					'options' => orion_get_department_array()		
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
					'label' => esc_html__('Elements per row', 'dentalia'),	
				    'options' => array(
						'1'	=> '1',
				    	'2'	=> '2',
			            '3'	=> '3',
			            '4'	=> '4',
		       		),
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
						'order_by' => array(
							'type' => 'select',
							'label' => esc_html__( 'Order members by', 'dentalia' ),
							'default' => 'title',
							'options' => array(
								'title' => esc_html__( 'Name', 'dentalia' ),								
								'date' => esc_html__( 'Date', 'dentalia' ),
								'modified' => esc_html__( 'Modified', 'dentalia' ),
								'rand' => esc_html__( 'Random', 'dentalia' ),
							),					
						),
						'order' => array(
							'type' => 'select',
							'label' => esc_html__( 'Order members by', 'dentalia' ),
							'default' => 'ASC',
							'options' => array(
								'ASC' => esc_html__( 'Ascending', 'dentalia' ),
								'DESC' => esc_html__( 'Descending', 'dentalia' ),
							),					
						),				        				
						'display_department' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Display department', 'dentalia' ),
							'default' => true,
						),	
						'display_about' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Display intro text', 'dentalia' ),
							'default' => false,
						),
						'display_social' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Display social links', 'dentalia' ),
							'default' => true,
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
									'default' => 'arrows_top',
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
						'image_style' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image style', 'dentalia' ),
							'default' => 'portrait',
							'options' => array(
								'orion_portrait' => esc_html__( 'Portrait', 'dentalia' ),								
								'orion_circle' => esc_html__( 'Circle', 'dentalia' ),
								'orion_square' => esc_html__( 'Square', 'dentalia' ),
								'orion_carousel' => esc_html__( '3:2 ratio', 'dentalia' ),
								'orion_tablet' => esc_html__( 'Original image ratio', 'dentalia' ),
							),					
						),				        	
						'hover_color' => array(
							'type' => 'select',
							'label' => esc_html__( 'Hover color', 'dentalia' ),
							'default' => 'primary',
							'options' => array(
								'primary' => esc_html__( 'Main theme color', 'dentalia' ),
								'secondary' => esc_html__( 'Secondary theme color', 'dentalia' ),
								'tertiary' => esc_html__( 'Tertiary theme color', 'dentalia' ),	
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
						'display_border' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Display border', 'dentalia' ),
							'default' => true,
						),
					),
			    ),
			),	    	
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_team_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_team_w', __FILE__, 'orion_team_w');