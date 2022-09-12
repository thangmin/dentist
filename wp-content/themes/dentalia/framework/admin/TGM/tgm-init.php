<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/framework/admin/TGM/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'orion_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function orion_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
        array(
            'name'      => esc_html__('Page Builder by SiteOrigin', 'dentalia'),
            'source' => esc_url('https://downloads.orionthemes.com/dentalia/thirdparty/siteorigin-panels.zip'), 
            'slug'      => 'siteorigin-panels',
            'required'  => true,
            'force_activation' => false,
            'force_deactivation' => false,
        ),        	        	
        array(
            'name'      => esc_html__('SiteOrigin Widgets Bundle', 'dentalia'),
            'slug'      => 'so-widgets-bundle',
            'required'  => true,
        ),
        array(
            'name' => esc_html__('Dentalia theme plugin', 'dentalia'),
            'slug' => 'dentalia-plugin', 
            'source' => esc_url('https://orionthemes.com/downloads/dentalia/dentalia_plugin/dentalia-plugin.zip'), 
            'required' => true,
            'force_activation' => false, 
            'force_deactivation' => false, 
            'external_url' => 'https://orionthemes.com/',
        ),        
        array(
            'name' => esc_html__('Contact form 7', 'dentalia'),
            'slug' => 'contact-form-7', 
        ),
        array(
            'name' => esc_html__('Revolution Slider WP', 'dentalia'),
            'slug' => 'revslider', 
            'source' => esc_url('https://orionthemes.com/downloads/dentalia/thirdparty/revslider.zip'), 
            'required' => false,
            'force_activation' => false, 
            'force_deactivation' => false, 
        ),       
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'dentalia',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'menu'         => 'install-required-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
	);

	tgmpa( $plugins, $config );
}
