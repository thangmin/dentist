<?php

/*
Widget Name: (OrionThemes) Tabs
Description: Displays tabs
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_tabs_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_tabs_w',
			__('(OrionThemes) Tabs', 'dentalia'),
			array(
				'description' => esc_html__('Display tabs in different styles.', 'dentalia'),
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
			        'item_name'  => esc_html__( 'Click to add a tab', 'dentalia' ),
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
						'the_icon' => array(
						    'type' => 'icon',
						    'label' => esc_html__('Select an icon (optional)', 'dentalia'),
						),						    
						'tab_content' => array(
					        'type' => 'tinymce',
					        'label' => esc_html__( 'Tab content', 'dentalia' ),
					        'rows' => 10
					    ),
						'tab_title_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon color', 'dentalia' ),
					        'default' => '#212121'
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