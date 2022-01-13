<?php

// Register Custom Post Type
function register_posttype_newsitem() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'New', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'News Items', 'text_domain' ),
		'name_admin_bar'        => __( 'News Items', 'text_domain' ),
		'archives'              => __( 'News Archives', 'text_domain' ),
		'attributes'            => __( 'New Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'News Item:', 'text_domain' ),
		'all_items'             => __( 'All News', 'text_domain' ),
		'add_new_item'          => __( 'Add New News Item', 'text_domain' ),
		'add_new'               => __( 'Add News Item', 'text_domain' ),
		'new_item'              => __( 'New News Item', 'text_domain' ),
		'edit_item'             => __( 'Edit News Item', 'text_domain' ),
		'update_item'           => __( 'Update News Item', 'text_domain' ),
		'view_item'             => __( 'View News Item', 'text_domain' ),
		'view_items'            => __( 'View News Items', 'text_domain' ),
		'search_items'          => __( 'Search News Items', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'News Item list', 'text_domain' ),
		'items_list_navigation' => __( 'News Item list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter News Items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'New', 'text_domain' ),
		'description'           => __( 'News item', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => false,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'register_posttype_newsitem', 0 );

?>