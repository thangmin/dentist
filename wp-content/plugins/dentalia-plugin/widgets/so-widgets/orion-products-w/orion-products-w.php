<?php

/*
Widget Name: @OrionThemes Products
Description: Display WooCommerce products
Author: OrionThemes
Author URI: http://orionthemes.com
*/
if(!function_exists('orion_get_product_categories')) {
	function orion_get_product_categories() {
		
		if(!taxonomy_exists ('product_cat')) {
			/*This prevents term does not exist error, if Woo hasn't loaded yet*/
			register_taxonomy( 'product_cat', array('product'), array() );
		}
		$cat_args = array(
		    'taxonomy'   => 'product_cat',
		    'orderby'    => 'name',
		    'order'      => 'asc',
		    'hide_empty' => 'true',
		);
		$product_categories = get_terms( $cat_args );
		$p_category_array = array( 'all' => 'All');
		foreach ($product_categories as $p_category) {
			$t_slug = $p_category->slug;
			$t_name = $p_category->name;
			$p_category_array[$t_slug] = $t_name;
		}
		return $p_category_array;
	}
}
if(!function_exists('orion_get_product_tags')) {
	function orion_get_product_tags() {
		
		if(!taxonomy_exists ('product_tag')) {
			/*This prevents term does not exist error, if Woo hasn't loaded yet*/
			register_taxonomy( 'product_tag', array('product'), array() );
		}
		$cat_args = array(
		    'taxonomy'   => 'product_tag',
		    'orderby'    => 'name',
		    'order'      => 'asc',
		    'hide_empty' => 'true',
		);
		$product_tags = get_terms( $cat_args );
		$p_tag_array = array( 'all' => 'All');
		foreach ($product_tags as $p_tag) {
			$t_slug = $p_tag->slug;
			$t_name = $p_tag->name;
			$p_tag_array[$t_slug] = $t_name;
		}
		return $p_tag_array;
	}
}
class orion_products_w extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'orion_products_w',
			esc_html__('@Orion Products', 'dentalia'),
			array(
				'description' => esc_html__('Display Products.', 'dentalia'),
				'panels_groups' => array('dentalia'),
				'panels_icon' => 'orion dashicons dashicons-admin-page',
			),
			array(

			),
			array(
			    'title' => array(
			        'type' => 'text',
			        'label' => esc_html__('Widget Title', 'dentalia'),
			    ),						
		        'per_row' => array(
					'type' => 'select',
					'label' => esc_html__('Products per row', 'dentalia'),	
				    'options' => array(
						'1'	=> '1',
				    	'2'	=> '2',
			            '3'	=> '3',
			            '4'	=> '4',
			            '5'	=> '5',
			            '6'	=> '6',
		       		),
				    'default' => 3,		
		       	),
				'limit' => array(
			        'type' => 'number',
			        'label' => esc_html__('Maximum number of products to display', 'dentalia'),
			        'description' => esc_html__( 'choose "-1" to display all', 'dentalia' ),
			        'default' => '-1'
				),
				'orderby' => array(
					'type' => 'select',
					'label' => esc_html__( 'Sort by', 'dentalia' ),
					'default' => 'title',
					'options' => array(
						'title' => esc_html__( 'Title', 'dentalia' ),
						'rating' => esc_html__( 'Rating', 'dentalia' ),
						'rand' => esc_html__( 'Random', 'dentalia' ),
						'popularity' => esc_html__( 'Popularity', 'dentalia' ),
						'menu_order' => esc_html__( 'Menu order', 'dentalia' ),
						'id' => esc_html__( 'ID', 'dentalia' ),
						'date' => esc_html__( 'Date', 'dentalia' ),
					),					
				),
		       	'order' => array(
					'type' => 'select',
					'label' => esc_html__( 'Order', 'dentalia' ),
					'default' => 'ASC',
					'options' => array(
						'ASC' => esc_html__( 'Ascending', 'dentalia' ),
						'DESC' => esc_html__( 'Descending', 'dentalia' ),
					),					
				),
				'display_only' => array(
					'type' => 'select',
					'label' => esc_html__( 'Display only', 'dentalia' ),
					'default' => 'all',
					'options' => array(
						'all' => esc_html__( 'All', 'dentalia' ),
						'on_sale' => esc_html__( 'On sale products', 'dentalia' ),
						'best_selling' => esc_html__( 'Best selling products', 'dentalia' ),
						'top_rated' => esc_html__( 'top rated', 'dentalia' ),
					),					
				),
			    'p_categories' => array(
			        'type' => 'select',
			        'label' => esc_html__( 'Categories', 'dentalia' ),
			        'description' => esc_html__( 'Press Ctrl key to select multiple values', 'dentalia' ),
			        'multiple' => true,
					'default' => 'all',
					'options' => orion_get_product_categories()	
			    ),
			    'p_tags' => array(
			        'type' => 'select',
			        'label' => esc_html__( 'Tags', 'dentalia' ),
			        'description' => esc_html__( 'Press Ctrl key to select multiple values', 'dentalia' ),
			        'multiple' => true,
					'default' => 'all',
					'options' => orion_get_product_tags()	
			    ),
			),		    				
			plugin_dir_path(__FILE__)
		);
	}

    function get_template_name($instance) {
         return 'orion_products_w-template';
    }
	function get_template_dir($instance) {
	    return 'tpl';
	}
    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('orion_products_w', __FILE__, 'orion_products_w');