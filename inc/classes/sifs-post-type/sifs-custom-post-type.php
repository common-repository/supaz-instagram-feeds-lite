<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* 
 * Supaz Instagram Feeds - Custom Post Type 
 */

$singular = __( 'Supaz Instagram Feed Lite', 'supaz-instagram-feeds-lite' );
$plural = __( 'Supaz Instagram Feeds Lite', 'supaz-instagram-feeds-lite' );
//Used for the rewrite slug below.
$plural_slug = str_replace( ' ', '_', $plural );

//Setup all the labels to accurately reflect this post type.
$labels = array(
	'name' => $plural,
	'singular_name' => $singular,
	'add_new' => __( 'Add New ', 'supaz-instagram-feeds-lite' ),
	'add_new_item' => __( 'Add New ', 'supaz-instagram-feeds-lite' ) . $singular,
	'edit' => __( 'Edit ', 'supaz-instagram-feeds-lite' ),
	'edit_item' => __( 'Edit ', 'supaz-instagram-feeds-lite' ) . $singular,
	'new_item' => __( 'New ', 'supaz-instagram-feeds-lite' ) . $singular,
	'view' => __( 'View ', 'supaz-instagram-feeds-lite' ) . $singular,
	'view_item' => __( 'View ', 'supaz-instagram-feeds-lite' ) . $singular,
	'search_term' => __( 'Search ', 'supaz-instagram-feeds-lite' ) . $plural,
	'parent' => __( 'Parent ', 'supaz-instagram-feeds-lite' ) . $singular,
	'not_found' => __( 'No ', 'supaz-instagram-feeds-lite' ) . $plural . __( ' found', 'supaz-instagram-feeds-lite' ),
	'not_found_in_trash' => __( 'No ', 'supaz-instagram-feeds-lite' ) . $plural . __( ' in Trash', 'supaz-instagram-feeds-lite' )
);

//Define all the arguments for this post type.
$args = array(
	'labels' => $labels,
	'public' => false,	
	'publicly_queryable' => false,
	'exclude_from_search' => true,
	'show_in_nav_menus' => false,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_admin_bar' => true,
	'menu_position' => 70,
	'menu_icon' => 'dashicons-format-image',
	'can_export' => true,
	'delete_with_user' => false,
	'hierarchical' => false,
	'has_archive' => false,
	'query_var' => false,
	'capability_type' => 'page',
	'map_meta_cap' => true,
	// 'capabilities' => array(),
	'rewrite' => array(
		'slug' => strtolower( $plural_slug ),
		'with_front' => true,
		'pages' => true,
		'feeds' => false,
	),
	'supports' => array(
		'title'
	)
);
register_post_type( 'sifs_posts', $args );

