<?php

/*
Widget Name: @OrionThemes Icon With Text
Description: Displays Icon with some text
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_icon_text_w extends SiteOrigin_Widget {

	function __construct() {
		$main_theme_color = orion_get_theme_option_css('main_theme_color', '#00b2ca' );

		parent::__construct(
			'orion_icon_text_w',
			esc_html__('@Orion Icon With Text', 'dentalia'),
			array(
				'description' => esc_html__('A customizable icon with text widget.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-visibility',
			),
			array(

			),
			array(
    
				'icon_repeater' => array(
			        'type' => 'repeater',
			        'label' => esc_html__( 'Add Icon with text' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add an Icon', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='icon_title']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
						'the_icon' => array(
						    'type' => 'icon',
						    'label' => esc_html__('Select an icon', 'dentalia'),
						),
					    'custom_image_file' => array(
					        'type' => 'media',
					        'label' => esc_html__( 'Or choose an image', 'dentalia' ),
					        'choose' => esc_html__( 'Choose image', 'dentalia' ),
					        'update' => esc_html__( 'Set image', 'dentalia' ),
					         'description' => esc_html__('setting the image will override the icon field', 'dentalia'),
					        'library' => 'image',
					        'fallback' => false
					    ),					    
					    'icon_title' => array(
					        'type' => 'text',
					        'label' => esc_html__('Icon Title', 'dentalia'),
					        'default' => ''
					    ),				    				    					    
						'description' => array(
					        'type' => 'textarea',
					        'label' => esc_html__( 'Description', 'dentalia' ),
					        'rows' => 4
					    ),
					    'icon_link' => array(
					        'type' => 'link',
					        'label' => esc_html__('Destination URL', 'dentalia'),
					        'description' => esc_html__('Optionally add a link', 'dentalia'),
					    ),
				    	'link_new_tab' => array(
					        'type' => 'checkbox',
					        'label' => esc_html__( 'Open in new tab', 'dentalia' ),
					        'default' => false,
					    ),
						'icon_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon color', 'dentalia' ),
					        'default' => '#fff'
					    ),			    
						'icon_bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Icon container background', 'dentalia' ),
					        'default' => $main_theme_color,
					    ),		    		    
					),
		        ),
		        'per_row' => array(
					'type' => 'select',
					'label' => esc_html__('Elements per row', 'dentalia'),	
				    'options' => array(
						'1'	=> '1',
				    	'2'	=> '2',
			            '3'	=> '3',
			            '4'	=> '4',
		       		),
				    'default' => 1,
		       	),
		        'style' => array(
					'type' => 'select',
					'label' => esc_html__('Widget Style', 'dentalia'),	
				    'options' => array(
						'short'	=> esc_html__('Icon Aside', 'dentalia'),
				    	'long'	=> esc_html__('Title on top', 'dentalia'),
				    	'icon-top'	=> esc_html__('Large icon on top', 'dentalia'),
				    	'icon-top-small'	=> esc_html__('Icon on top', 'dentalia'),
		       		),
				    'default' => 'short',
		       	),
		        'icon_style' => array(
					'type' => 'select',
					'label' => esc_html__('Icon Container', 'dentalia'),	
				    'options' => array(
						'circle' => esc_html__('Circle', 'dentalia'),
				    	'square'	=> esc_html__('Square', 'dentalia'),
				    	'simple'	=> esc_html__('none', 'dentalia'),
		       		),
				    'default' => 'square',		
		       	),	
		        'text_style' => array(
					'type' => 'select',
					'label' => esc_html__('Text color', 'dentalia'),	
				    'options' => array(
				    	'text-default'	=> esc_html__('Default', 'dentalia'),
						'text-light'	=> esc_html__('Light', 'dentalia'),
				    	'text-dark'	=> esc_html__('Dark', 'dentalia'),
		       		),
				    'default' => 'text-default',		
		       	),
		        'alignment' => array(
					'type' => 'select',
					'label' => esc_html__('Alignment', 'dentalia'),	
				    'options' => array(
				    	''	=> esc_html__('Default', 'dentalia'),
						'text-left'	=> esc_html__('Left', 'dentalia'),
						'text-center'	=> esc_html__('Center', 'dentalia'),
						'text-right'	=> esc_html__('Right', 'dentalia'),
		       		),
				    'default' => '',		
		       	),
			    'bottom_margin' => array(
			        'type' => 'slider',
			        'label' => esc_html__( 'Bottom Margin', 'dentalia' ),
			        'default' => 36,
			        'min' => 0,
			        'max' => 120,
			        'integer' => true
			    ),
			    'align_icons_center_mobile' =>  array(
			        'type' => 'checkbox',
			        'label' => esc_html__( 'Center on mobile', 'dentalia' ),
			        'default' => false
			    ),
			    'align_icons_center_tablet' =>  array(
			        'type' => 'checkbox',
			        'label' => esc_html__( 'Center on tablet', 'dentalia' ),
			        'default' => false
			    ),
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_icon_text_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_icon_text_w', __FILE__, 'orion_icon_text_w');