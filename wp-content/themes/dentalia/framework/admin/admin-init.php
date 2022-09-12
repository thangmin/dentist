<?php

    // Load the TGM init if it exists
    if ( file_exists( get_template_directory() . '/framework/admin/TGM/tgm-init.php' ) ) {
        require_once get_template_directory() . '/framework/admin/TGM/tgm-init.php';
    }

    // Load Orion custom css generator
    if ( file_exists( get_template_directory() . '/framework/css/custom-styles.php' ) ) {
        require_once get_template_directory() . '/framework/css/custom-styles.php';
    } 

function orion_add_redux_css() {
    wp_enqueue_style( 'orion-redux-css', get_template_directory_uri(). '/framework/css/redux.css', array( 'redux-admin-css' ));  
}
add_action( 'redux/page/dentalia/enqueue', 'orion_add_redux_css' );
