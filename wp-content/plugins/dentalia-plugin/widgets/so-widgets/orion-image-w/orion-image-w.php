<?php

/*
Widget Name: @OrionThemes Image
Description: Add an image
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_image_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_image_w',
			__('@Orion Image', 'dentalia'),
			array(
				'description' => esc_html__('Add an image.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-format-image',
			),
			array(

			),
			array(
				'image' => array (
					'type' => 'media',
					'label' => esc_html__( 'Add image', 'dentalia' ),
					'library' => 'image',
					'fallback' => true,
				),				
			    'hovertext' => array(
			        'type' => 'textarea',
			        'label' => esc_html__( 'Hover description Text', 'dentalia' ),
					'default' => esc_html__('', 'dentalia'),
			    ),
			    'url' => array(
			        'type' => 'link',
			        'label' => esc_html__('Destination URL', 'dentalia'),
			        'default' => esc_html__('', 'dentalia'),
			    ),
				'onclick' => array(
					'type' => 'select',
					'label' => esc_html__( 'On click', 'dentalia' ),
					'default' => 'link',
					'options' => array(
						'link' => esc_html__( 'Open a link', 'dentalia' ),
						'lightbox' => esc_html__( 'Open image in lightbox', 'dentalia' ),
						'nothing' => esc_html__( 'Do nothing', 'dentalia' ),
					),
				),			    
				'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Style & Layout' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'image_style' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image Shape', 'dentalia' ),
							'default' => 'orion_carousel',
							'options' => array(
								'orion_portrait' => esc_html__( 'Portrait', 'dentalia' ),								
								'orion_circle' => esc_html__( 'Circle', 'dentalia' ),
								'orion_square' => esc_html__( 'Square', 'dentalia' ),
								'orion_carousel' => esc_html__( '3:2 ratio', 'dentalia' ),
								'orion_tablet' => esc_html__( '750px width', 'dentalia' ),
								'' => esc_html__( 'Original image ratio', 'dentalia' ),
							),					
						),
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
					    'text_color' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Hover text color', 'dentalia' ),
					        'default' => 'text-light',
							'options' => array(
								'primary-color' => esc_html__( 'Main theme color', 'dentalia' ),
								'secondary-color' => esc_html__( 'Secondary theme color', 'dentalia' ),
								'tertiary-color' => esc_html__( 'Tertiary theme color', 'dentalia' ),	
								'text-dark' => esc_html__( 'Dark', 'dentalia' ),	
								'text-light' => esc_html__( 'Light', 'dentalia' ),
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
							'default' => 'overlay-none',
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
						'image_align' => array(
							'type' => 'select',
							'label' => esc_html__( 'Image Align', 'dentalia' ),
							'default' => '',
							'options' => array(
								'' => esc_html__( 'Default', 'dentalia' ),
								'align-flex-start' => esc_html__( 'Left', 'dentalia' ),
								'align-flex-center' => esc_html__( 'Center', 'dentalia' ),
								'align-flex-end' => esc_html__( 'Right', 'dentalia' ),
							),					
						),
					),
				),		    		    
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_image_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_image_w', __FILE__, 'orion_image_w');