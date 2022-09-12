<?php
/*
Widget Name: @OrionThemes Price List
Description: Displays Pricelist
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_pricelist_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_pricelist_w',
			__('@Orion Price List', 'dentalia'),
			array(
				'description' => esc_html__('A customizable price list widget.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-list-view',
			),
			array(

			),
			array(

			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),	    
				'widget_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Service' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a service', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='service_name']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
					    'service_name' => array(
					        'type' => 'text',
					        'label' => esc_html__('Service', 'dentalia'),
					        'default' => ''
					    ),
					    'description' => array(
					        'type' => 'tinymce',
					        'label' => esc_html__( 'Description (optional)', 'dentalia' ),
					        'rows' => 6
					    ),			    					    
					    'service_price' => array(
					        'type' => 'text',
					        'label' => esc_html__('Price', 'dentalia'),
					        'default' => ''
					    ),
					    'highlight' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__('Highlight Price', 'dentalia'),
					        'default' => false,
					    ),
					),
		        ),
				'text_color' => array(
					'type' => 'select',
					'label' => esc_html__( 'Text color style', 'dentalia' ),
					'default' => 'text-default',
					'options' => array(
						'text-default' => esc_html__( 'Default', 'dentalia' ),
						'text-light' => esc_html__( 'Light text', 'dentalia' ),
						'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
					)
				),
				'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'service_name_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Service color', 'dentalia' ),
					        'default' => ''
					    ),	
						'service_desc_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Description color', 'dentalia' ),
					        'default' => ''
					    ),							    				    
						'service_price_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Price color', 'dentalia' ),
					        'default' => ''
					    ),	
			        ),
			     ),
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_pricelist_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_pricelist_w', __FILE__, 'orion_pricelist_w');