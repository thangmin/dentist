<?php

/*
Widget Name: @OrionThemes Google Maps Embed
Description: Add a responsive embeded Google Maps
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_responsive_map_w extends SiteOrigin_Widget {
 
	function __construct() {

		parent::__construct(
			'orion_responsive_map_w',
			__('@Orion Google Map Embed', 'dentalia'),
			array(
				'description' => esc_html__('Add a Google map.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-admin-site-alt3',
			),
			array(

			),
			array(

				'embedcode' => array (
					'type' => 'code',
					'label' => esc_html__( 'Add Google Maps embed code', 'dentalia' ),
					'description' => 'How to use: Visit <a href="https://www.google.com/maps" target="_blank">Google Maps</a>, select a location, click Share to get the Google maps embed code and paste it into the textarea. No API key required.',
					'placeholder' => '<iframe src="https://www.google.com/maps/embed? ... </iframe>',
				),
			    'map_height' => array(
			        'type' => 'slider',
			        'label' => esc_html__( 'Map height in pixels.', 'dentalia' ),
			        'default' => 300,
			        'min' => 1,
			        'max' => 1200,
			        'integer' => true
			    ),	    		    
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_responsive_map_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_responsive_map_w', __FILE__, 'orion_responsive_map_w');