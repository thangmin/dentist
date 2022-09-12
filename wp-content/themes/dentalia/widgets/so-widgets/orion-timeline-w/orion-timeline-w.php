<?php

/*
Widget Name: (OrionThemes) Timeline
Description: Displays Timeline (ie: company history)
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_timeline_w extends SiteOrigin_Widget {

	function __construct() {
		$main_theme_color = orion_get_theme_option_css('main_theme_color', '#22AA86' );

		parent::__construct(
			'orion_timeline_w',
			__('(OrionThemes) Timeline', 'dentalia'),
			array(
				'description' => esc_html__('Displays timeline.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-exerpt-view',
			),
			array(

			),
			array(
    
				'repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Timeline item' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add an item', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='timeline-title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
					    'date' => array(
					        'type' => 'text',
					        'label' => esc_html__('Date', 'dentalia'),
					        'default' => ''
					    ),		        		
					    'timeline-title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Event Title', 'dentalia'),
					        'default' => ''
					    ),
				    
						'description' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Event Description', 'dentalia' ),
					        'rows' => 4
					    ),		    
					    'highlight' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Highlight?', 'dentalia' ),
					        'default' => false
					    ),
					),
		        ),
		        'widget_style' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Widget Style' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
				        'skin' => array(
							'type' => 'select',
							'label' => esc_html__('Skin', 'dentalia'),	
						    'options' => array(
								'text-light'	=> esc_html__('Light', 'dentalia'),
						    	'text-dark'	=> esc_html__('Dark', 'dentalia'),
				       		),
						    'default' => 'text-dark',		
				       	),
				    ),    		
			    ),   		       			       		       			        
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_timeline_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_timeline_w', __FILE__, 'orion_timeline_w');