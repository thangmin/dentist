<?php
// Add custom Theme Functions here

function load_stylesheets() {
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/themify-icons/themify-icons.css', array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function append_html_portfolio() {
	echo '<script language="javascript">';
	echo 'jQuery(function($){';
	echo '$( ".portfolio-box .box-text" ).append(`';
	echo '<div class="box-text-icon"><i class="ti-arrow-right"></i></div>';
	echo '`);';
	echo '});';
	echo '</script>';
}
add_action('wp_head', 'append_html_portfolio');

include 'AjaxPagination/ajax_pagination_wp.php';

add_action('wp_enqueue_scripts', 'devvn_useAjaxPagination', 1);
function devvn_useAjaxPagination() {
	/** Thêm js vào website */
	wp_enqueue_script('devvn-ajax', esc_url(trailingslashit(get_stylesheet_directory_uri()) . 'AjaxPagination/ajax_pagination.js'), array('jquery'), '1.0', true);
	$php_array = array(
		'admin_ajax' => admin_url('admin-ajax.php'),
	);
	wp_localize_script('devvn-ajax', 'svl_array_ajaxp', $php_array);

	/*Thêm css vào website*/
	// wp_enqueue_style('ajaxp', esc_url(trailingslashit(get_stylesheet_directory_uri())) . 'AjaxPagination/Ajax_pagination.css', false);
}