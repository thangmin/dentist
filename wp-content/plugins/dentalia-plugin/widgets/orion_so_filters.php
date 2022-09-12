<?php

/*
define widget folder
 */
function orion_plugin_add_so_widgets($folders){

	/*check if function orion_add_so_widgets exists used in Dentalia 1.6 and older. */
	if (!function_exists('orion_add_so_widgets')) {
	 	$widget_dir = dirname( __FILE__ ) . '/so-widgets/';
		if ( file_exists( $widget_dir ) && is_dir($widget_dir) ) {
			$folders[] = $widget_dir;
		}
	}
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'orion_plugin_add_so_widgets');