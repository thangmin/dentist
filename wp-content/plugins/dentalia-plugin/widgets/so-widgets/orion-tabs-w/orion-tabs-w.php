<?php

/*
Widget Name: @OrionThemes Tabs
Description: Displays tabs
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_tabs_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_tabs_w',
			__('@Orion Tabs', 'dentalia'),
			array(
				'description' => esc_html__('Display tabbed content in different styles.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-index-card',
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
			        'label' => esc_html__( 'Add Tab' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a new tab', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='tab_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(		        		
					    'tab_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Tab Title', 'dentalia'),
					        'default' => '',
					        'description' => esc_html__('All Tab titles must be unique', 'dentalia'),
					    ),						    
						'tab_content' => array(
					        'type' => 'tinymce',
					        'label' => esc_html__( 'Tab content', 'dentalia' ),
					        'rows' => 10
					    ),
						'the_icon' => array(
						    'type' => 'icon',
						    'label' => esc_html__('Select an icon (optional)', 'dentalia'),
						),
						'tab_title_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon color', 'dentalia' ),
					        'default' => '#212121'
					    ),
					    'tab_custom_id' => array(
					        'type' => 'text',
					        'label' => esc_html__('Tab Custom ID (optional)', 'dentalia'),
					        'default' => '',
					        'description' => esc_html__('Must be unique or empty. Assigning a custom-id will allow linking to the specific tab from external pages (link: domain.com/page-slug#custom-id). Do not use spaces or non-ASCII characters', 'dentalia'),
					    ), 
					),
		        ),
		        'style' => array(
					'type' => 'select',
					'label' => esc_html__('Choose style', 'dentalia'),	
				    'options' => array(
						'tabs-top'	=> 'tabs top',
				    	'tabs-left'	=> 'Tabs left ',
				    	'tabs-right' => 'Tabs right ',
		       		),
				    'default' => 'short',		
		       	),	        
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_tabs_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_tabs_w', __FILE__, 'orion_tabs_w');