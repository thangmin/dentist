<?php 


/* Post types */
// check if post_types are disabled:
$use_team_post_type = orion_get_option('use_team_post_type', false, '1');
if ($use_team_post_type != '0') {
	add_action( 'init', 'dentalia_register_team_post_type' );
	add_action( 'init', 'dentalia_register_team_department_taxonomy', 0 );
}

add_action( 'init', 'orion_register_static_blocks_post_type', 0 );

/*********************************** O.o ***********************************/
/*                              Static Blocks                              */ 
/***************************************************************************/
if ( ! function_exists('orion_register_static_blocks_post_type') ) {
    function orion_register_static_blocks_post_type() {

      $labels = array(
        'name'                  => esc_html__( 'Static Blocks', 'Post Type General Name', 'dentalia' ),
        'singular_name'         => esc_html__( 'Static Block', 'Post Type Singular Name', 'dentalia' ),
        'menu_name'             => esc_html__( 'Static Blocks', 'dentalia' ),
        'name_admin_bar'        => esc_html__( 'Static Blocks', 'dentalia' ),
        'archives'              => esc_html__( 'Item Archives', 'dentalia' ),
        'attributes'            => esc_html__( 'Item Attributes', 'dentalia' ),
        'parent_item_colon'     => esc_html__( 'Parent Item:', 'dentalia' ),
        'all_items'             => esc_html__( 'All Items', 'dentalia' ),
        'add_new_item'          => esc_html__( 'Add New Item', 'dentalia' ),
        'add_new'               => esc_html__( 'Add New', 'dentalia' ),
        'new_item'              => esc_html__( 'New Item', 'dentalia' ),
        'edit_item'             => esc_html__( 'Edit Item', 'dentalia' ),
        'update_item'           => esc_html__( 'Update Item', 'dentalia' ),
        'view_item'             => esc_html__( 'View Item', 'dentalia' ),
        'view_items'            => esc_html__( 'View Items', 'dentalia' ),
        'search_items'          => esc_html__( 'Search Item', 'dentalia' ),
        'not_found'             => esc_html__( 'Not found', 'dentalia' ),
        'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'dentalia' ),
        'featured_image'        => esc_html__( 'Featured Image', 'dentalia' ),
        'set_featured_image'    => esc_html__( 'Set featured image', 'dentalia' ),
        'remove_featured_image' => esc_html__( 'Remove featured image', 'dentalia' ),
        'use_featured_image'    => esc_html__( 'Use as featured image', 'dentalia' ),
        'insert_into_item'      => esc_html__( 'Insert into item', 'dentalia' ),
        'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'dentalia' ),
        'items_list'            => esc_html__( 'Items list', 'dentalia' ),
        'items_list_navigation' => esc_html__( 'Items list navigation', 'dentalia' ),
        'filter_items_list'     => esc_html__( 'Filter items list', 'dentalia' ),
      );

      $args = array(
        'label'                 => esc_html__( 'Static Block', 'dentalia' ),
        'description'           => esc_html__( 'Content blocks, which can be loaded anywhere.', 'dentalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-screenoptions',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => true,    
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
      );
      register_post_type( 'static_blocks', $args );
    }
}

/*********************************** O.o ***********************************/
/*                                  Team                                   */ 
/***************************************************************************/

// Create team post type

function dentalia_register_team_post_type() {
	$labels = array(
		"name" => esc_html__( 'Team', 'dentalia' ),
		"singular_name" => esc_html__( 'Team member', 'dentalia' ),
		"menu_name" => esc_html__( 'Team', 'dentalia' ),
		"all_items" => esc_html__( 'Team', 'dentalia' ),
		"add_new_item" => esc_html__( 'Add new member', 'dentalia' ),
		"edit_item" => esc_html__( 'Edit Team Member', 'dentalia' ),
		"new_item" => esc_html__( 'New Team Member', 'dentalia' ),
		"view_item" => esc_html__( 'View Team Member', 'dentalia' ),
		"search_items" => esc_html__( 'Search Team Members', 'dentalia' ),
		"not_found" => esc_html__( 'No Team Members found', 'dentalia' ),
		);

	$args = array(
		"label" => esc_html__( 'Team', 'dentalia' ),
		"labels" => $labels,
		"description" => "Team members",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => get_option( 'orion_base_slug', 'team-member' ), "with_front" => false ),
		"query_var" => true,
		"menu_icon" => "dashicons-admin-users",		
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),				
	);
	register_post_type( "team-member", $args );
}

// Create department taxonomy

function dentalia_register_team_department_taxonomy() {
	$labels = array(
		"name" => esc_html__( 'Department or Specialization', 'dentalia' ),
		"singular_name" => esc_html__( 'Department', 'dentalia' ),
		"separate_items_with_commas" => esc_html__( 'Separate multiple departments with comma.', 'dentalia' ),
		"choose_from_most_used" => esc_html__( 'Choose from the most used.', 'dentalia' ),
	);

	$args = array(
		"label" => esc_html__( 'Departments', 'dentalia' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( "slug" => get_option( 'orion_department_base_slug', 'department' ), "with_front" => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "department", array( "team-member" ), $args );
}
