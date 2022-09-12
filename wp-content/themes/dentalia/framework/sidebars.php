<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
* Register widget areas
*/

add_action( 'widgets_init', 'orion_register_sidebars' );
 
function orion_register_sidebars() {
global $orion_options;
    
    register_sidebar( 
        array(
            'name' => esc_html__( 'default sidebar', 'dentalia' ),
            'id' => 'sidebar-default',
            'class' => 'default',
            'description' => esc_html__( 'This is default sidebar. ', 'dentalia' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar( 
        array(
            'name' => esc_html__( 'Top-bar-left', 'dentalia' ),
            'id' => 'sidebar-top-bar-left',
            'class' => 'top-bar-widgets', 'left-top-bar',
            'description' => esc_html__( 'This is left top-bar sidebar. It is displayed on top of the header. ', 'dentalia' ),
            'before_widget' => '<div id="%1$s" class="section widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    ); 

    register_sidebar( 
        array(
            'name' => esc_html__( 'Top-bar-right', 'dentalia' ),
            'id' => 'sidebar-top-bar-right',
            'class' => 'top-bar-widgets', 'right-top-bar',
            'description' => esc_html__( 'This is right top-bar sidebar. It is displayed on top of the header. ', 'dentalia' ),
            'before_widget' => '<div id="%1$s" class="section widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );    


if ($orion_options == null){
    require_once( get_template_directory() . '/framework/admin/admin-init.php' );
    if ($orion_options == null) {
       $orion_options = array(); 
    }
}

// header widgets: 

    if(array_key_exists('orion_header_type', $orion_options)) {
        $orion_header_type = $orion_options['orion_header_type'];
    } else {
        $orion_header_type = 'classic';      
    }
    if(array_key_exists('classicheader_widgets_switch', $orion_options)) {
        $classicheader_widgets_switch = $orion_options['classicheader_widgets_switch'];
    } else {
        $classicheader_widgets_switch = false;
    }

    if(array_key_exists('widgetsfluid_widgets_switch', $orion_options)) {
        $widgetsfluid_widgets_switch = $orion_options['widgetsfluid_widgets_switch'];
    } else {
        $widgetsfluid_widgets_switch = false;
    }

    if ($orion_header_type == 'classic' && $classicheader_widgets_switch != false) {
        $classicheader_sidebars = 'col-md-12';
        register_sidebar( 
            array(
                'name' => esc_html__( 'Classic header widget area', 'dentalia' ),
                'id' => 'sidebar-header',
                'class' => 'sidebar-header','top-bar',
                'description' => esc_html__( 'This is widget area, which is displayed in header. ', 'dentalia' ),
                'before_widget' => '<div id="%1$s" class="section '.$classicheader_sidebars.' widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
    if ($orion_header_type == 'widgetsfluid' && $widgetsfluid_widgets_switch != false) {
        $widgetsfluid_sidebars = 'col-md-12';
        register_sidebar( 
            array(
                'name' => esc_html__( 'Header 2 widget area', 'dentalia' ),
                'id' => 'sidebar-widgetsfluid-header',
                'class' => 'sidebar-header','top-bar',
                'description' => esc_html__( 'This is widget area, which is displayed in header with bottom menu. ', 'dentalia' ),
                'before_widget' => '<div id="%1$s" class="section '.$widgetsfluid_sidebars.' widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }  
    
    //prefooter widgets
    $sidebar_number="4";
    if (isset($orion_options['prefooter-sidebars'])) {
        $sidebar_number = $orion_options['prefooter-sidebars']; 
    }
    for($i='1'; $i <= $sidebar_number; $i++) {
        $sidebar_id = "prefooter-".$i;
        $sidebar_name = "Prefooter ".$i;
        register_sidebar( 
            array(
                'name' => $sidebar_name,
                'id' => $sidebar_id,
                'class' => 'sidebar-prefooter',
                'description' => esc_html__( 'This is widget area, which is displayed before footer. ', 'dentalia' ),
                'before_widget' => '<div id="%1$s" class="section widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
   
    // footer widgets
    $sidebar_number_f="4";
    if (isset($orion_options['mainfooter-sidebars'])) {
        $sidebar_number_f = $orion_options['mainfooter-sidebars']; 
    }
    for($i='1'; $i <= $sidebar_number_f; $i++) {
        $sidebar_id = "sidebar-footer-".$i;
        $sidebar_name = "Footer ".$i;
        register_sidebar( 
            array(
                'name' => $sidebar_name,
                'id' => $sidebar_id,
                'class' => 'sidebar-footer',
                'description' => esc_html__( 'This is widget area, which is displayed in footer. ', 'dentalia' ),
                'before_widget' => '<div id="%1$s" class="section widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }

    //copyright footer
    if (isset($orion_options['copyrightfooter-sidebars']) && orion_get_option('copyrightarea_switch', false) == true) {
        $sidebar_number_cf = "2";
        $sidebar_number_cf = $orion_options['copyrightfooter-sidebars']; 

        for($i='1'; $i <= $sidebar_number_cf; $i++) {
            $sidebar_id = "copyright-footer-".$i;
            $sidebar_name = "Copyright Footer ".$i;
            register_sidebar( 
                array(
                    'name' => $sidebar_name,
                    'id' => $sidebar_id,
                    'class' => 'sidebar-copyright-footer',
                    'description' => esc_html__( 'This is widget area, which is displayed in Copyright footer. ', 'dentalia' ),
                    'before_widget' => '<div id="%1$s" class="section widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
        } 
    }                 
}


add_action( 'widgets_init', 'orion_register_custom_sidebars' );
/**
 * create sidebars in Theme Options
 * @return sidebars
 */

function orion_register_custom_sidebars() {

    global $orion_options;   

    if (isset($orion_options['add-sidebars']) && (!$orion_options['add-sidebars']=='')) {
        $orion_sidebars = $orion_options['add-sidebars'];

        foreach($orion_sidebars as $sidebar_name) {
            $sidebar_slug = sanitize_title($sidebar_name);
            
            register_sidebar( 
                array(
                  'name' => $sidebar_name,
                  'id' => $sidebar_slug,
                  'class' => 'orion-widgets orion-custom-widget',
                  'description' => esc_html__( 'This is dynamicly generated widget. You can add more in theme options. ', 'dentalia' ),
                  'before_widget' => '<section id="%1$s" class="widget %2$s">',
                  'after_widget'  => '</section>',
                  'before_title'  => '<h2 class="widget-title">',
                  'after_title'   => '</h2>',
                )
            );
        }         
    }
}
