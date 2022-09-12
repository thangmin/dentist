<?php

/*
Widget Name: @OrionThemes Responsive video
Description: Add Video from Youtube, Vimeo, ...
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_responsive_video_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_responsive_video_w',
			__('@Orion Responsive Video', 'dentalia'),
			array(
				'description' => esc_html__('Add Video from Youtube or Vimeo.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-format-video',
			),
			array(

			),
			array(
			    'video_url' => array(
			        'type' => 'link',
			        'label' => esc_html__('Paste a link from Youtube or Vimeo:', 'dentalia'),
			        'default' => '',
			    ),
				'video_add_style' => array(
					'type' => 'select',
					'label' => esc_html__( 'Video Style', 'dentalia' ),
					'default' => '',
					'options' => array(
						'' => esc_html__( 'Default', 'dentalia' ),
						'shadow-4' => esc_html__( 'Shadow', 'dentalia' ),
						'img-frame shadow-4' => esc_html__( 'Frame', 'dentalia' ),
					),					
				),
				'lightbox_options' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Lightbox Options' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'lightbox' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Open in lightbox', 'dentalia' ),
							'default' => false,
						), 
					    'image' => array(
					        'type' => 'media',
					        'label' => esc_html__( 'Video image', 'dentalia'  ),
					        'choose' => esc_html__( 'Choose image', 'dentalia' ),
					        'update' => esc_html__( 'Upload image', 'dentalia' ),
					        'fallback' => true
					    ),
					    'play_icon' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Display a play icon on the image?', 'dentalia' ),
					        'default' => 'text-light',
					        'options' => array(
					        	'text-light' => esc_html__( 'Light', 'dentalia' ),
					            'text-dark' => esc_html__( 'Dark', 'dentalia' ),
					            'primary-color' => esc_html__( 'Main Theme Color', 'dentalia' ),
					            'secondary-color' => esc_html__( 'Secondary Theme Color', 'dentalia' ),
					            'tertiary-color' => esc_html__( 'Tertiary Theme Color', 'dentalia' ),
					            '' => esc_html__('No Icon', 'dentalia'),
					        ),
					    ),
					    'play_icon_style' => array(
					        'type' => 'select',
					        'label' => esc_html__( 'Play Icon Style', 'dentalia' ),
					        'default' => 'play_style_1',
					        'options' => array(
					        	'play_style_1' => esc_html__( 'Style 1', 'dentalia' ),
					            'play_style_2' => esc_html__( 'Style 2', 'dentalia' ),
					        ),
					    ),
			        ),	
				),			        
			),	    				
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_responsive_video_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_responsive_video_w', __FILE__, 'orion_responsive_video_w');