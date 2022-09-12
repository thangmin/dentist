<?php
/*
Widget Name: @OrionThemes Logos
Description: Displays Logos
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_logos_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_logos_w',
			__('@Orion Logos', 'dentalia'),
			array(
				'description' => esc_html__('Display logos in a grid or carousel.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-awards',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),    
				'repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Logo' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a Logo', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='logo-title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
					    'logo-title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Logo title', 'dentalia'),
					        'default' => '',
					    ),  
						'logo' => array(		        		
					        'type' => 'media',
					        'label' => esc_html__( 'Choose a Logo', 'dentalia'),
					        'choose' => esc_html__( 'Choose logo', 'dentalia'),
					        'update' => esc_html__( 'Set logo', 'dentalia'),
					        'library' => 'image',
					        'fallback' => true,
						),			        		
					    'link' => array(
					        'type' => 'text',
					        'label' => esc_html__('Logo Link', 'dentalia'),
					        'default' => '',
					    ),
						'option_link' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Link Settings' , 'dentalia' ),
					        'hide' => true,
					        'fields' => array(
								'new_tab' => array(
									'type' => 'checkbox',
									'label' => esc_html__( 'Open in new tab', 'dentalia' ),
									'default' => false,
								),
								'no_follow' => array(
									'type' => 'checkbox',
									'label' => esc_html__( 'Add nofollow attribute', 'dentalia' ),
									'default' => false,
								),
							),
						),
						'advanced_settings' => array(
					        'type' => 'section',
					        'label' => esc_html__( 'Advanced Settings' , 'dentalia' ),
							'fields' => array(					
								'html_class' => array(
							        'type' => 'text',
							        'label' => esc_html__('Custom HTML class', 'dentalia'),
							        'description' => 'Use to style element with CSS.',
							    ),
							),
						),
					),
		        ),
		        'display_as' => array(
					'type' => 'select',
					'label' => esc_html__('Display as', 'dentalia'),	
				    'options' => array(
						'grid'	=> 'Grid',
				    	'carousel'	=> 'Carousel',		            			            
		       		),
				    'default' => 'carousel',
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
			            '12' => '12'		            			            
		       		),
				    'default' => 4,
		       	),

				'text_color' => array(
					'type' => 'select',
					'label' => esc_html__( 'Light or dark color', 'dentalia' ),
					'default' => 'text-default',
					'options' => array(
					'text-default' => esc_html__( 'Default', 'dentalia' ),
					'text-light' => esc_html__( 'Light text', 'dentalia' ),
					'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
					)
				),

				'border_color' => array(
			        'type' => 'color',
			        'label' => esc_html__( 'Grid border color', 'dentalia' ),
			        'default' => '#f2f2f2'
			    ),

			    'logo_height' => array(
			        'type' => 'slider',
			        'label' => esc_html__( 'Row height (px)', 'dentalia' ),
			        'default' => 180,
			        'min' => 60,
			        'max' => 360,
			        'integer' => true
			    ),

				'logo_img_size' => array(
			        'type' => 'slider',
			        'label' => esc_html__( 'Logo size (%)', 'dentalia' ),
			        'default' => 80,
			        'min' => 40,
			        'max' => 100,
			        'integer' => true,
			    ),

				'logo_img_hover_size' => array(
			        'type' => 'slider',
			        'label' => esc_html__( 'Logo size on hover (%)', 'dentalia' ),
			        'default' => 90,
			        'min' => 40,
			        'max' => 100,
			        'integer' => true,
			    ),
				'add_opacy' => array(
			        'type' => 'checkbox',
			        'label' => esc_html__( 'Add Opacity', 'dentalia' ),
			    ),			    
				'option_carousel' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Carousel Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'navigation_carousel' => array(
							'type' => 'select',
							'label' => esc_html__( 'Navigation', 'dentalia' ),
							'default' => 'none',
							'options' => array(
								'arrows_aside' => esc_html__( 'Arrows', 'dentalia' ),
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
							'label' => esc_html__( 'Enable autoplay', 'dentalia' ),
							'default' => false,
						),
						'autoplay_timeout' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Autoplay Transition Delay', 'dentalia' ),
					        'default' => 5000,
					        'min' => 1000,
					        'max' => 7000,
					        'integer' => true,
					    ),
			        ),
			    ),  
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_logos_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_logos_w', __FILE__, 'orion_logos_w');