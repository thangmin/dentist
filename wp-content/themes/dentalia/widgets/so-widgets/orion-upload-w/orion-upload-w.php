<?php
 
/*
Widget Name: (OrionThemes) Document Download
Description: Displays Document Download button
Author: OrionThemes
Author URI: http://orionthemes.com
*/

class orion_upload_w extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'orion_upload_w',
			__('(OrionThemes) Document Download', 'dentalia'),
			array(
				'description' => esc_html__('A customizable document download widget.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-paperclip',
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
			        'label' => esc_html__( 'Add Document' , 'dentalia' ),
			        'item_name'  => esc_html__( 'Click to add a document', 'dentalia' ),
			        'item_label' => array(
			            'selector'     => "[id*='document_name']",
			            'update_event' => 'change',
			            'value_method' => 'val'
			        ),
		        	'fields' => array(
					    'document_name' => array(
					        'type' => 'text',
					        'label' => esc_html__('Document Title', 'dentalia'),
					        'default' => ''
					    ),
						'document_icon' => array(
						    'type' => 'icon',
						    'label' => esc_html__('Icon', 'dentalia'),
						),					    
						'document_upload' => array(
					        'type' => 'media',
					        'label' => esc_html__( 'Upload a document', 'dentalia' ),
					        'choose' => esc_html__( 'Choose a document', 'dentalia' ),
					        'update' => esc_html__( 'Upload a document', 'dentalia' ),
					        'library' => 'application',
					        'fallback' => true
						),
					),
		        ),	        
			    'btn_color' => array(
			        'type' => 'select',
			        'label' => esc_html__( 'Button Color', 'dentalia' ),
			        'default' => 'btn',
			        'options' => array(
			            'btn' => esc_html__( 'Default', 'dentalia' ),
			            'btn btn-c1' => esc_html__( 'Main Theme Color', 'dentalia' ),
			            'btn btn-c2' => esc_html__( 'Secondary Theme Color', 'dentalia' ),
			            'btn btn-c3' => esc_html__( 'Tertiary Theme Color', 'dentalia' ),
			            'btn btn-blue' => esc_html__( 'Blue', 'dentalia' ),
			            'btn btn-green' => esc_html__( 'Green', 'dentalia' ),
			            'btn btn-pink' => esc_html__( 'Pink', 'dentalia' ),
			            'btn btn-orange' => esc_html__( 'Orange', 'dentalia' ),
			            'btn btn-black' => esc_html__( 'Black', 'dentalia' ),
			            'btn btn-white' => esc_html__( 'White', 'dentalia' ),
			        ),
			    ),
		        'text_color' => array(
					'type' => 'select',
					'label' => esc_html__('Widget Title Color', 'dentalia'),	
				    'options' => array(
				    	'text-default'	=> esc_html__('Default', 'dentalia'),
				    	'text-dark'	=> esc_html__('Dark', 'dentalia'),
				    	'text-light'	=> esc_html__('Light', 'dentalia'),			    	
		       		),
				    'default' => 'text-default',		
		       	),			    		    
			    'btn_type' => array(
			        'type' => 'select',
			        'label' => esc_html__( 'Button Style', 'dentalia' ),
			        'default' => 'btn-flat',
			        'options' => array(
			            'btn-flat' => esc_html__( 'Flat', 'dentalia' ),
			            'btn-wire' => esc_html__( 'Wire', 'dentalia' ),
			        ),
			    ),
			),
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_upload_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_upload_w', __FILE__, 'orion_upload_w');