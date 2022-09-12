<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "dentalia";
    require_once dirname(__FILE__).'/sections/general-layout.php';


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $theme_version = $theme->get( 'Version' );
    
    $args = array(
        'opt_name' => 'dentalia',
        'dev_mode' => false,
        'display_name' => 'Theme Options',
        'display_version' => '2.2.0',
        'page_slug' => 'orion-theme-options',
        'page_title' => 'Theme Options',
        'intro_text' => 'Dentalia ' . $theme_version. ' Theme Options',
        'footer_text' => 'Thank you for using Dentalia theme',
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Theme options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => 1,
        'customizer' => false,
        'default_show' => TRUE,
        'default_mark' => '*',
        'class' => 'orion-options',
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'global_variable' => 'orion_options',
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => true,
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'system_info' => TRUE,
        'show_options_object' => false,
        'templates_path' => dirname(__FILE__) ."/redux-templates/panel",
        'menu_icon'        => ORION_PLUGIN_PATH ."/img/orion-logo-l20.png",
        'admin_bar_icon' => "orion-icon",
        'footer_credit'  => "OrionThemes.com",
    );


    Redux::setArgs( $opt_name, $args );


