<?php

/*
Widget Name: @OrionThemes Small Team
Description: Team widget, independent of Team post type.
Author: OrionThemes
Author URI: http://orionthemes.com
Widget URI: http://orionthemes.com
*/

class orion_simple_team_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_simple_team_w',
			__('@Orion Team (small)', 'dentalia'),
			array(
				'description' => esc_html__('Add team members manually, without using the Team post type.', 'dentalia'),
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
				'team_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Team Member' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to create a new Team member', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='team_name']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
			        'fields' => array(
						'image' => array (
							'type' => 'media',
							'label' => esc_html__( 'Add image', 'dentalia' ),
							'library' => 'image',
							'fallback' => false,
						),				        	
						'team_name' => array(
							'type' => 'text',
							'label' => esc_html__( 'Name', 'dentalia' ),
							'description' => esc_html__( 'Team member Name', 'dentalia' ),
						),					
						'medical_titles' => array(
							'type' => 'text',
							'label' => esc_html__( 'Text below name', 'dentalia' ),
							'description' => esc_html__( 'For example: Medical title', 'dentalia' ),
						),						
						'team_department' => array(
							'type' => 'text',
							'label' => esc_html__( 'Text above name', 'dentalia' ),
							'description' => esc_html__( 'For example: Job position, Department etc.', 'dentalia' ),
						),
					    'team_description' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Short description', 'dentalia' ),
					    ),
						'link_page' => array(
							'type' => 'link',
							'label' => esc_html__( 'Link to a page', 'dentalia' ),
							'description' => esc_html__( 'Link team member to a page', 'dentalia' ),
						),	
					    'icon_repeater' => array(
					        'type' => 'repeater',
					        'label' => esc_html__( 'Add Social Icons' , 'dentalia' ),
					        'item_name'  => esc_html__( 'Click to add an Icon', 'dentalia' ),
					        'item_label' => array(
					            'selector'     => "[id*='admin_label']",
					            'update_event' => 'change',
					            'value_method' => 'val'
					        ),
					        'fields' => array(				

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
							    'admin_label' => array(
							        'type' => 'text',
							        'label' => esc_html__('Admin Label', 'dentalia'),
							        'description' => esc_html__('Optional, does not appear on the front-end.', 'dentalia'),
							    ),								
							),
						),
						'html_class' => array(
					        'type' => 'text',
					        'label' => esc_html__('Custom HTML class', 'dentalia'),
					        'description' => 'Use to style element with CSS.',
					    ),						
			        ),		    
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
							'label' => esc_html__( 'Image shape', 'dentalia' ),
							'default' => 'portrait',
							'options' => array(
								'orion_portrait' => esc_html__( 'Portrait', 'dentalia' ),								
								'orion_circle' => esc_html__( 'Circle', 'dentalia' ),
								'orion_square' => esc_html__( 'Square', 'dentalia' ),
								'orion_carousel' => esc_html__( '3:2 ratio', 'dentalia' ),
								'orion_tablet' => esc_html__( 'Original image ratio', 'dentalia' ),
								'hide_images' => esc_html__( 'None', 'dentalia' ),
							),					
						),				        	
						'hover_color' => array(
							'type' => 'select',
							'label' => esc_html__( 'Accent color', 'dentalia' ),
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
         return 'orion_simple_team_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_simple_team_w', __FILE__, 'orion_simple_team_w');