<?php

add_action( 'cmb2_admin_init', 'dentalia_metaboxes' );
/**
 * Define the metabox and field configurations.
 */

function dentalia_metaboxes() {
    global $orion_options; 
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_dentalia_';

/* Post formats */
    $quote = new_cmb2_box( array(
        'id'            => 'dentalia_post_format_quote',
        'title'         => esc_html__( 'Quote Post Format', 'dentalia' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );


    $status = new_cmb2_box( array(
        'id'            => 'dentalia_post_format_status',
        'title'         => esc_html__( 'Status Post Format', 'dentalia' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );
    // Status text field
    $status->add_field( array(
          'name' => esc_html__('Status', 'dentalia'),
          'desc' => '',
          'id'   => $prefix.'status',
          'type' => 'textarea_small',
        )
    );

    // Quote text field
    $quote->add_field( array(
          'name' => esc_html__('Quote', 'dentalia'),
          'desc' => '',
          'id'   => $prefix.'quote',
          'type' => 'textarea_small',
        )
    );
    $quote->add_field( array(
          'name' => esc_html__('Source Name', 'dentalia'),
          'desc' => '',
          'id'   => $prefix.'quote_source_name',
          'type' => 'text',
        )
    );

    $video = new_cmb2_box( array(
        'id'            => 'dentalia_post_format_video',
        'title'         => esc_html__( 'Video Post Format', 'dentalia' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $video->add_field( array(
        'name' => esc_html__( 'oEmbed', 'dentalia' ),
        'desc' => esc_html__( 'Enter a youtube, Vimeo, or TED URL. Supports services listed at http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds', 'dentalia' ),
        'id'   => $prefix . 'video_embed',
        'type' => 'oembed',
        )
    );

    $link = new_cmb2_box( array(
        'id'            => 'dentalia_post_format_link',
        'title'         => esc_html__( 'Link Post Format', 'dentalia' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );
    $link->add_field( array(
        'name' => esc_html__( 'link title', 'dentalia' ),
        'desc' => esc_html__( 'Text displayed', 'dentalia' ),
        'id'   => $prefix . 'link_title',
        'type' => 'text',
        )
    ); 
    $link->add_field( array(
        'name' => esc_html__( 'URL', 'dentalia' ),
        'desc' => esc_html__( 'Paste a link', 'dentalia' ),
        'id'   => $prefix . 'url',
        'type' => 'text_url',
        )
    );
    $link->add_field( array(
          'name' => esc_html__('Link description', 'dentalia'),
          'desc' => '',
          'id'   => $prefix.'link_desc',
          'type' => 'textarea_small',
        )
    );    
    $audio = new_cmb2_box( array(
        'id'            => 'dentalia_post_format_audio',
        'title'         => esc_html__( 'Audio Post Format', 'dentalia' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $audio->add_field( array(
        'name' => esc_html__( 'oEmbed', 'dentalia' ),
        'desc' => esc_html__( 'Enter a SoundCloud, Spotify, or similar URL. Supports services listed at http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds', 'dentalia' ),
        'id'   => $prefix . 'audio_embed',
        'type' => 'oembed',
        )
    );   
    $audio->add_field( array(
        'name'         => esc_html__( 'Multiple Files', 'dentalia' ),
        'desc'         => esc_html__( 'Upload or add multiple audio files. Accepts mp3, ogg, and wav formats', 'dentalia' ),
        'id'           => $prefix . 'audio_file',
        'type'         => 'file_list',
        'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );

    // gallery
    $gallery = new_cmb2_box( array(
        'id'            => 'dentalia_post_format_gallery',
        'title'         => esc_html__( 'Gallery Post Format', 'dentalia' ),
        'object_types'  => array('post'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

   $gallery->add_field( array(
        'name' => esc_html__( 'Gallery', 'dentalia' ),
        'desc' => '',
        'id'   => $prefix .'mutiple_img_upload',
        'type' => 'file_list',
        'object_types'  => array('post'), // Post type
    ) );
    $gallery->add_field( array(
        'name'             => 'Display gallery images in header as:',
        'id'   => $prefix .'gallery_display',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'carousel',
        'options'          => array(
            'carousel'    => esc_html__( 'Carousel', 'dentalia' ),
            'col-sm-12'   => esc_html__( '1 column', 'dentalia' ),
            'col-sm-6'   => esc_html__( '2 column grid', 'dentalia' ),
            'col-sm-4'   => esc_html__( '3 column grid', 'dentalia' ),
            'col-md-3 col-sm-6'   => esc_html__( '4 column grid', 'dentalia' ),
            'hide'   => esc_html__( 'Hide', 'dentalia' ),
        )
    ) );     

/*********************************** O.o ***********************************/
/*                            Header Settings                              */ 
/***************************************************************************/

    $header_settings = new_cmb2_box( array(
        'id'            => 'header_settings',
        'title'         => esc_html__( 'Header Settings', 'dentalia' ),
        'object_types'  => array( 'post', 'page', 'team-member', 'orion_portfolio' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) ); 

    $header_settings->add_field( array( 
        'name' => esc_html__( 'Enable transparent header', 'dentalia' ),
        'id'   => $prefix .'transparent_header',
        'type' => 'select',
        'default' => '0',
        'options' => array(
            '1'  => esc_html__( 'On', 'dentalia' ),
            '0' => esc_html__( 'Off', 'dentalia' ),      
        ),     
    ) );

    $header_settings->add_field( array(
        'name'             => 'Header overlay',
        'id'   => $prefix .'header_overlay',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '',
        'options'          => array(
            ''    => esc_html__( 'None', 'dentalia' ),
            'overlay-dark' => esc_html__( 'Dark Overlay', 'dentalia' ),
            'overlay-light' => esc_html__( 'Light Overlay', 'dentalia' ),
            'overlay-c1' => esc_html__( 'Main theme color', 'dentalia' ),
            'overlay-c2' => esc_html__( 'Secondary theme color', 'dentalia' ),
            'overlay-c3' => esc_html__( 'Tertiary theme color', 'dentalia' ),
            'overlay-c2-c1' => esc_html__( 'Gradient 1', 'dentalia' ),                  
            'overlay-c1-c2' => esc_html__( 'Gradient 2', 'dentalia' ),
            'overlay-c1-t' => esc_html__( 'Primary to Transparent', 'dentalia' ),
            'overlay-c2-t' => esc_html__( 'Secondary to Transparent', 'dentalia' ),
            'overlay-c3-t' => esc_html__( 'Tertiary to Transparent', 'dentalia' ),      
        )
    ) );
    
    $header_settings->add_field( array(
        'name'             => 'Set header text color',
        'id'   => $prefix .'transparent_header_text_color',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '',
        'options'          => array(
            ''    => esc_html__( 'Default', 'dentalia' ),
            'text-light'   => esc_html__( 'Light', 'dentalia' ),
            'text-dark' => esc_html__( 'Dark', 'dentalia' ),    
        )
    ) );
    $header_settings->add_field( array(
        'name'             => 'Desktop Logo color',
        'id'   => $prefix .'desktop_logo_color',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '',
        'options'          => array(
            ''    => esc_html__( 'Default', 'dentalia' ),
            'text-light'   => esc_html__( 'Light Logo', 'dentalia' ),
            'text-dark' => esc_html__( 'Dark Logo', 'dentalia' ),    
        ),
    ) );     
    $header_settings->add_field( array(
        'name'             => 'Mobile Logo color',
        'id'   => $prefix .'mobile_logo_color',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '',
        'options'          => array(
            ''    => esc_html__( 'Default', 'dentalia' ),
            'mobile-text-light'   => esc_html__( 'Light Logo', 'dentalia' ),
            'mobile-text-dark' => esc_html__( 'Dark Logo', 'dentalia' ),    
        ),
        'desc'    => esc_html__( 'Default mobile logo color can be set in Theme Options', 'dentalia' ),
    ) );     
    $header_settings->add_field( array(
        'name'    => 'Header Button custom text',
        'desc'    => esc_html__( 'Header button text', 'dentalia' ),
        'default' => '',
        'id'      => $prefix .'button_text',
        'type'    => 'text',
    ) );
    $header_settings->add_field( array(
        'name'    => 'Header Button custom link',
        'desc'    => esc_html__( 'Header button link', 'dentalia' ),
        'default' => '',
        'id'      => $prefix .'button_link',
        'type'    => 'text',
    ) );   

/*********************************** O.o ***********************************/
/*                              Page Title                                 */ 
/***************************************************************************/
    if(orion_get_theme_option_css('title_single_post_onoff', '0' ) == '1') {
        $post_heading = new_cmb2_box( array(
            'id'            => 'post_heading',
            'title'         => esc_html__( 'Page Title Settings', 'dentalia' ),
            'object_types'  => array( 'post', 'page', 'team-member', 'orion_portfolio', 'product' ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        ) ); 
    } else {
        $post_heading = new_cmb2_box( array(
            'id'            => 'post_heading',
            'title'         => esc_html__( 'Page Title Settings', 'dentalia' ),
            'object_types'  => array( 'page', 'team-member', 'orion_portfolio' ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        ) );       
    }

    $post_heading->add_field( array(
        'name' => esc_html__( 'Hide Page Heading?', 'dentalia' ),
        'id'   => $prefix .'hide_heading',
        'type' => 'checkbox',
    ) );


    $default_heading = orion_get_option('post_heading_type', false);
    $post_heading->add_field( array(
        'name'             => 'Page title',
        'id'   => $prefix .'heading_type',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => $default_heading,
        'options'          => array(
            'classic'    => esc_html__( 'Classic', 'dentalia' ),
            'centered'   => esc_html__( 'Centered', 'dentalia' ),
            'left' => esc_html__( 'Left', 'dentalia' ),    
        )
    ) ); 

    $post_heading->add_field( array(
        'name'             => 'Text color',
        'id'   => $prefix .'heading_text_color',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'text-default',
        'options'          => array(
            'text-default'    => esc_html__( 'Default color', 'dentalia' ),
            'text-light'   => esc_html__( 'Light color', 'dentalia' ),
            'text-dark' => esc_html__( 'Dark color', 'dentalia' ),    
        )
    ) );

    $post_heading->add_field( array(
        'name'    => 'Change background image',
        'id'      => $prefix . 'heading_bg_image',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add image' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $post_heading->add_field( array(
        'name'             => 'Overlay',
        'id'   => $prefix .'orion_overlay',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'default',
        'options'          => array(
            'default' => esc_html__( 'Default', 'dentalia' ),
            'none' => esc_html__( 'None', 'dentalia' ),            
            'overlay-dark' => esc_html__( 'Dark Overlay', 'dentalia' ),
            'overlay-light' => esc_html__( 'Light Overlay', 'dentalia' ),
            'overlay-c1' => esc_html__( 'Main theme color', 'dentalia' ),
            'overlay-c2' => esc_html__( 'Secondary theme color', 'dentalia' ),
            'overlay-c3' => esc_html__( 'Tertiary theme color', 'dentalia' ),
            'overlay-c2-c1' => esc_html__( 'Gradient 1', 'dentalia' ),                  
            'overlay-c1-c2' => esc_html__( 'Gradient 2', 'dentalia' ),
            'overlay-c1-t' => esc_html__( 'Primary to Transparent', 'dentalia' ),
            'overlay-c2-t' => esc_html__( 'Secondary to Transparent', 'dentalia' ),
            'overlay-c3-t' => esc_html__( 'Tertiary to Transparent', 'dentalia' ),       
        )
    ) );

    $post_heading->add_field( array(
        'name'             => 'Background image behaviour',
        'id'   => $prefix .'orion_parallax',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'default',
        'options'          => array(
            'default' => esc_html__( 'Default', 'dentalia' ),
            'bg-fixed' => esc_html__( 'Fixed', 'dentalia' ),
            'vertical_up' => esc_html__( 'Parallax Top to bottom', 'dentalia' ),
            'vertical_down' => esc_html__( 'Parallax Bottom to top', 'dentalia' ),
            'horizontal_left' => esc_html__( 'Parallax Right to left', 'dentalia' ),
            'horizontal_right' => esc_html__( 'Parallax Left to right', 'dentalia' ),
        )
    ) ); 

    $post_heading->add_field( array(
        'name'    => 'Top Padding',
        'desc'    => esc_html__( 'Value in px', 'dentalia' ),
        'default' => '',
        'id'      => $prefix .'top_padding',
        'type'    => 'text_small',
    ) );

    $post_heading->add_field( array(
        'name'    => 'Bottom Padding',
        'desc'    => esc_html__( 'Value in px', 'dentalia' ),
        'default' => '',
        'id'      => $prefix .'bottom_padding',
        'type'    => 'text_small',
    ) );
     
/* END Page heading */

/* post paddings */

    $post_paddings = new_cmb2_box( array(
        'id'            => 'post_paddings',
        'title'         => esc_html__( 'Page Spacing', 'dentalia' ),
        'object_types'  => array( 'post', 'page', 'team-member' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $post_paddings->add_field( array(
        'name' => esc_html__( 'Remove Top Spacing?', 'dentalia' ),
        'id'   => $prefix .'remove_padding_top',
        'type' => 'checkbox',
    ) );

    $post_paddings->add_field( array(
        'name' => esc_html__( 'Remove Bottom Spacing?', 'dentalia' ),
        'id'   => $prefix .'remove_padding_bottom',
        'type' => 'checkbox',
    ) );     

/*sidebars*/

/* Sidebars (posts) */
    $post_sidebars = new_cmb2_box( array(
        'id'            => 'post_sidebars',
        'title'         => esc_html__( 'Choose sidebars', 'dentalia' ),
        'object_types'  => array( 'post', 'team-member'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

/*get sidebars from wp_registered_sidebars*/
    $sidebar_options = array();
    $empty = "no_sidebar";
    $sidebar_options[$empty] = "-- None --";
    
    $allsidebars = $GLOBALS['wp_registered_sidebars'];

    foreach ($allsidebars as $key => $sidebar) {
        $s_name = $sidebar['name'];
        $s_slug = $sidebar['id'];
        $sidebar_options[$s_slug] = $s_name;
    }      

/*check if there are any defaults in theme options */
    if (isset($orion_options['post-sidebar-left-defauts']) && ($orion_options['post-sidebar-left-defauts'] != "")) {
        $default_left = $orion_options['post-sidebar-left-defauts'];
    } else {
        $default_left = array('no_sidebar');
    }

    if (isset($orion_options['post-sidebar-right-defauts']) && ($orion_options['post-sidebar-right-defauts'] != "")) {
        $default_right = $orion_options['post-sidebar-right-defauts'];
    } else {
        $default_right = array('no_sidebar');
    }
/* add sidebar metaboxes (posts) */
    $post_sidebars->add_field( array(
        'name'             => esc_html__( 'Left sidebar', 'dentalia' ),
        'id'               => $prefix . 'post_sidebar_select_left',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => $default_left,
        'options'          => $sidebar_options 
    ) );

    $post_sidebars->add_field( array(
        'name'             => esc_html__( 'Right sidebar', 'dentalia' ),
        'id'               => $prefix . 'post_sidebar_select_right',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => $default_right,
        'options'          => $sidebar_options 

    ) );    

/* Sidebars (pages) */
    $page_sidebars = new_cmb2_box( array(
        'id'            => 'pages_sidebars',
        'title'         => esc_html__( 'Sidebars', 'dentalia' ),
        'object_types'  => array( 'page', 'product'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    if (isset($orion_options['page-sidebar-left-defauts']) && ($orion_options['page-sidebar-left-defauts'] != "")) {
        $page_default_left = $orion_options['page-sidebar-left-defauts'];
    } else {
        $page_default_left = array('no_sidebar');
    }

    if (isset($orion_options['page-sidebar-right-defauts']) && ($orion_options['page-sidebar-right-defauts'] != "")) {
        $page_default_right = $orion_options['page-sidebar-right-defauts'];
    } else {
        $page_default_right = array('no_sidebar');
    }

    $page_sidebars->add_field( array(
        'name'             => esc_html__( 'Left sidebar', 'dentalia' ),
        'id'               => $prefix . 'page_sidebar_select_left',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => $page_default_left,
        'options'          => $sidebar_options 
    ) );

    $page_sidebars->add_field( array(
        'name'             => esc_html__( 'Right sidebar', 'dentalia' ),
        'id'               => $prefix . 'page_sidebar_select_right',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => $page_default_right,
        'options'          => $sidebar_options 

    ) ); 
   
/*********************************** O.o ***********************************/
/*                             Other Widget areas                          */ 
/***************************************************************************/

    $sidebars_and_widget_areas = new_cmb2_box( array(
        'id'            => 'sidebars_and_widget_areas',
        'title'         => esc_html__( 'Widget areas', 'dentalia' ),
        'object_types'  => array( 'post', 'page', 'team-member', 'orion_portfolio' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) ); 

    $sidebars_and_widget_areas->add_field( array(
        'name' => esc_html__( 'Hide the top bar?', 'dentalia' ),
        'id'   => $prefix .'hide_top-bar',
        'type' => 'checkbox',
    ) );

    $sidebars_and_widget_areas->add_field( array(
        'name' => esc_html__( 'Hide header widget area?', 'dentalia' ),
        'id'   => $prefix .'hide_header_widget',
        'type' => 'checkbox',
    ) );  
    $sidebars_and_widget_areas->add_field( array(
        'name' => esc_html__( 'Hide Prefooter widget area (if active)?', 'dentalia' ),
        'id'   => $prefix .'hide_prefooter',
        'default' => false,
        'type' => 'checkbox',
    ) );  



/* team-members */
    //contacts
    $team_info = new_cmb2_box( array(
        'id'            => 'team_members_info',
        'title'         => esc_html__( 'About', 'dentalia' ),
        'object_types'  => array( 'team-member', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ));
    $team_info->add_field( array(
        'name'    => esc_html__( 'Medical title', 'dentalia' ),
        'id'      => 'medical_title',
        'type'    => 'text',
    ));        
    $team_info -> add_field( array(
        'name'    => esc_html__( 'Intro text', 'dentalia' ),
        'id'      => 'short_about',
        'type'    => 'wysiwyg',
        'options' => array(),
    ) );

    $team_contact = new_cmb2_box( array(
        'id'            => 'team_members_contact_metabox',
        'title'         => esc_html__( 'Social info', 'dentalia' ),
        'object_types'  => array( 'team-member', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ));

    $team_contact -> add_field( array(
        'id'          => 'member_social_icons',
        'type'        => 'group',
        'description' => esc_html__( 'Add social links', 'dentalia' ),
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => esc_html__( 'Entry {#}', 'dentalia' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Entry', 'dentalia' ),
            'remove_button' => esc_html__( 'Remove Entry', 'dentalia' ),
            'sortable'      => true, // beta
            'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    $team_contact->add_group_field( 'member_social_icons', array(
        'name'             => 'Add social icons',
        'id'               => 'social_icons',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => '',
        'options'          => array(
            'fa fa-linkedin'    => esc_html__( 'LinkedIn', 'dentalia' ),
            'fa-google-plus'   => esc_html__( 'Google +', 'dentalia' ),
            'fa-facebook' => esc_html__( 'Facebook', 'dentalia' ),
            'fa-twitter'    => esc_html__( 'Twitter', 'dentalia' ),
            'fa-youtube'   => esc_html__( 'Youtube', 'dentalia' ),
            'fa-snapchat' => esc_html__( 'SnapChat', 'dentalia' ),      
            'fa-envelope-o' => esc_html__( 'Email', 'dentalia' ),      
        )
    ) );

    $team_contact->add_group_field( 'member_social_icons', array(
    'name' => esc_html__( 'Link to social profile', 'dentalia' ),
    'id'   => 'social_links',
    'type' => 'text_url',
    // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );


/* static blocks */
    function get_sb_shortcode() {
        if( is_string($_GET['post'])) {
            $shortcode = '[staticblock block="' . $_GET['post'].'"]';
            return $shortcode;
        }
    }  
    if (isset($_GET['post'])) {
        $static_blocks = new_cmb2_box( array(
            'id'            => 'static_blocks_meta',
            'title'         => esc_html__( 'Static block shortcode', 'dentalia' ),
            'object_types'  => array( 'static_blocks', ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => false, // Show field names on the left
        ));        
        $static_blocks->add_field( array(
            'name' => 'Copy shortcode',
            'desc' => get_sb_shortcode(),
            'type' => 'title',
            'id'   => 'static_block_title'
        ) );    
    }
}
