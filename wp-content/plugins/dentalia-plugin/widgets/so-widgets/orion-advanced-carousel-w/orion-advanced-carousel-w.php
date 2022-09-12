<?php
 
/*
Widget Name: @OrionThemes Advanced Tabs
Description: Build tabbed content with Page Builder.
Author: OrionThemes
Author URI: http://orionthemes.com
*/ 

class orion_advanced_carousel_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_advanced_carousel_w',
			esc_html__('@Orion Advanced Tabs', 'dentalia'),
			array(
				'description' => esc_html__('Build tabbed content with Page Builder.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-editor-table',
			),
			array(
			),
			array(
				'slide_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Slide' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to edit', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='navigation_label']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(   		
					    'navigation_label' => array(
					        'type' => 'text',
					        'label' => esc_html__('Navigation label', 'dentalia'),
					        'default' => ''
					    ),
						'layoutbuilder' => array(
							'type' => 'builder',
							'builder_type' => 'layout_slider_builder',
							'label' => esc_html__( 'Create Layout', 'dentalia' ),
						),						    				    				    
					    'tab_custom_id' => array(
					        'type' => 'text',
					        'label' => esc_html__('Tab Custom ID (optional)', 'dentalia'),
					        'default' => '',
					        'description' => esc_html__('Must be unique or empty. Assigning a custom-id will allow linking to the specific tab from external pages (link: domain.com/page-slug#custom-id). Do not use spaces or non-ASCII characters', 'dentalia'),
					    ),
					),					
		        ),
				'option_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Widget Style' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
				        'nav_align' => array(
							'type' => 'select',
							'label' => esc_html__('Tab Navigation alignment', 'dentalia'),
							'default' => 'text-center',
							'options' => array(
								'text-left' => esc_html__( 'Left align', 'dentalia' ),
								'text-center' => esc_html__( 'Center align', 'dentalia' ),
								'text-right' => esc_html__( 'Right align', 'dentalia' ),
							)		
				       	),
					    'space_below_nav' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Space below navigation', 'dentalia' ),
					        'min' => 0,
					        'max' => 120,
					        'integer' => true
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
         return 'orion_advanced_carousel_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_advanced_carousel_w', __FILE__, 'orion_advanced_carousel_w');