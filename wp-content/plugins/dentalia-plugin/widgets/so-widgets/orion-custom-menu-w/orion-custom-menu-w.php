<?php

/*
Widget Name: @OrionThemes Custom Menu
Description: Add a stylized custom menu widget
Author: OrionThemes
Author URI: http://orionthemes.com
*/

function orion_get_all_wordpress_menus(){
	$all_menus = array();
	$term_args = array('taxonomy' => 'nav_menu');
	$term_query = new WP_Term_Query( $term_args );
	if ( ! empty( $term_query->terms ) ) {
	    foreach ( $term_query ->terms as $term ) {
	        $id = $term->term_id;
	        $name = $term->name;
	        $all_menus[$id] = $name;
	    }
	}
	return $all_menus;
}
class orion_custom_menu_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_custom_menu_w',
			esc_html__('@Orion Custom Menu', 'dentalia'),
			array(
				'description' => esc_html__('Add a Menu.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-email-alt',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),						
				'menu_option' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose a menu', 'dentalia' ),
					'description' => esc_html__( 'Select a menu.', 'dentalia' ),
					'default' => 'all',
					'options' => orion_get_all_wordpress_menus()
				),			 
			   'style_section' => array(
			        'type' => 'section',
			        'label' => esc_html__( 'Settings' , 'dentalia' ),
			        'hide' => true,
			        'fields' => array(
						'text_color_class' => array(
							'type' => 'select',
							'label' => esc_html__( 'Text color style', 'dentalia' ),
							'default' => 'text-light',
							'options' => array(
							'text-light' => esc_html__( 'Light text', 'dentalia' ),
							'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
							)
						),
						'bg_color' => array(
					        'type' => 'color',
					        'label' => esc_html__( 'Background color', 'dentalia' ),
					        'default' => '',
					    ),
					    'bg_opacy' => array(
					        'type' => 'slider',
					        'label' => esc_html__( 'Background color opacity', 'dentalia' ),
					        'default' => 100,
					        'min' => 1,
					        'max' => 100,
					        'integer' => true,
					    ),
					),
				), 				
			),		    				
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_custom-menu_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_custom_menu_w', __FILE__, 'orion_custom_menu_w');