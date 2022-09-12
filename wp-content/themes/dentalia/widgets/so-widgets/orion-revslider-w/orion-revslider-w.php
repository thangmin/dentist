<?php

/*
Widget Name: (OrionThemes) Revolution slider
Description: Add slider
Author: OrionThemes
Author URI: http://orionthemes.com
*/

function orion_return_slider_array() {
	$sliderlist['none'] = 'None';

	if ( class_exists( 'RevSlider' ) ) {
	    $rev_slider = new RevSlider();
	    $sliders = $rev_slider->getAllSliderAliases();
	} else {
	    $sliders = array();
	}
	foreach ( $sliders as $slide ) {
		$sliderlist[$slide] = $slide;
	}
	return $sliderlist;
}

class orion_revslider_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_revslider_w',
			__('(OrionThemes) Revolution slider', 'dentalia'),
			array(
				'description' => esc_html__('Add a slider.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-slides',
			),
			array(
				    
			),				
			array(
				'listsliders' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose a slider.', 'dentalia' ),
					'description' => esc_html__( 'Add slider.', 'dentalia' ),
					'default' => 'none',
					'options' => orion_return_slider_array(),
				),			
			),
	    				
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_revslider_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_revslider_w', __FILE__, 'orion_revslider_w');