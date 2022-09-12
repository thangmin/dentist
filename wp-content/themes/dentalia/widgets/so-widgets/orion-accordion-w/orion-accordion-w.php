<?php

/*
Widget Name: (OrionThemes) Accordion
Description: Displays accordion
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_accordion_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_accordion_w',
			esc_html__('(OrionThemes) Accordion', 'dentalia'),
			array(
				'description' => esc_html__('A customizable accordion widget.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-menu',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),		    
				'icon_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Panel' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a panel', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='panel_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(		        		
					    'panel_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Panel Title', 'dentalia'),
					        'default' => '',
					        'description' => esc_html__('All Panel titles must be unique.', 'dentalia'),
					    ),					    
						'panel_content' => array(
					        'type' => 'tinymce',
					        'label' => esc_html__( 'Panel content', 'dentalia' ),
					        'rows' => 10
					    ),	
					    'the_icon' => array(
						    'type' => 'icon',
						    'label' => esc_html__('Select an icon (optional)', 'dentalia'),
						),	
						'icon_title_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon color', 'dentalia' ),
					        'default' => ''
					    ),
					    'collapse' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Open', 'dentalia' ),
					        'default' => false
					    ),		    
					),
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
			   'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Background color', 'dentalia' ),
					        'default' => 'transparent',
					    ),				    
					    'bg_opacy' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Background color opacity', 'dentalia' ),
					        'default' => 100,
					        'min' => 1,
					        'max' => 100,
					        'integer' => true,
					    ),
						'border_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Border color', 'dentalia' ),
					        'default' => '#f2f2f2',
					    ),
					    'border_opacy' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Border color opacity', 'dentalia' ),
					        'default' => 100,
					        'min' => 1,
					        'max' => 100,
					        'integer' => true,
					    ),					    
					    'hover_color' => array(
							'type' => 'select',
							'label' => esc_html__( 'Title hover color', 'dentalia' ),
							'default' => 'primary-hover',
							'options' => array(
								'primary-hover' => esc_html__( 'Main theme color', 'dentalia' ),
								'secondary-hover' => esc_html__( 'Secondary theme color', 'dentalia' ),
								'tertiary-hover' => esc_html__( 'Tertiary theme color', 'dentalia' ),
								'black-hover' => esc_html__( 'Black', 'dentalia' ),
							)
					    ),
			        )
			    )			    			    		    	                
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_accordion_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_accordion_w', __FILE__, 'orion_accordion_w');