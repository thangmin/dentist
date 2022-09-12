<?php

/*
Widget Name: @OrionThemes Before/After Slider
Description: Compare two images
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_before_after_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_before_after_w',
			__('@Orion Before/After Slider', 'dentalia'),
			array(
				'description' => esc_html__('Horizontal & Vertical Orientation.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-image-flip-horizontal',
			),
			array(

			),
			array(
			    'before_image' => array(
			        'type' => 'media',
			        'label' => esc_html__( 'Before image', 'dentalia' ),
			        'choose' => esc_html__( 'Choose Before image', 'dentalia' ),
			        'update' => esc_html__( 'Set Before image', 'dentalia' ),
			        'library' => 'image',
			        'fallback' => true
			    ),
			    'after_image' => array(
			        'type' => 'media',
			        'label' => esc_html__( 'After image', 'dentalia' ),
			        'choose' => esc_html__( 'Choose After image', 'dentalia' ),
			        'update' => esc_html__( 'Set After image', 'dentalia' ),
			        'library' => 'image',
			        'fallback' => true
			    ),		    
			    'after_visibility' => array(
			        'type' => 'slider',
			        'label' => esc_html__( 'After image visibility', 'dentalia' ),
			        'default' => 50,
			        'min' => 1,
			        'max' => 100,
			        'integer' => true,
			    ),
			    'before_text' => array(
			        'type' => 'text',
			        'label' => esc_html__('Before text', 'dentalia'),
			        'default' => ''
			    ),
			    'after_text' => array(
			        'type' => 'text',
			        'label' => esc_html__('After text', 'dentalia'),
			        'default' => ''
			    ),
				'orientation' => array(
					'type' => 'select',
					'label' => esc_html__( 'Orientation', 'dentalia' ),
					'default' => 'horizontal',
					'options' => array(
						'horizontal' => esc_html__( 'Horizontal', 'dentalia' ),
						'vertical' => esc_html__( 'Vertical', 'dentalia' ),
					),					
				),
			    'style_section'  => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Style' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'image_add_style' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image Style', 'dentalia' ),
							'default' => '',
							'options' => array(
								'' => esc_html__( 'Default', 'dentalia' ),
								'shadow-4' => esc_html__( 'Shadow', 'dentalia' ),
								'img-frame shadow-4' => esc_html__( 'Frame', 'dentalia' ),
							),					
						),
						'handle_style' => array(
							'type' => 'select',
							'label' => esc_html__( 'Handle background color', 'dentalia' ),
							'default' => 'transparent',
							'options' => array(
								'transparent' => esc_html__( 'Transparent', 'dentalia' ),
								'c-1' => esc_html__( 'Primary', 'dentalia' ),
								'c-2' => esc_html__( 'Secondary', 'dentalia' ),
								'c-3' => esc_html__( 'Tertiary', 'dentalia' ),
							),					
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
							),					
						),							
					),
				),
			),		    				
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_before_after_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_before_after_w', __FILE__, 'orion_before_after_w');