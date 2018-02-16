<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
add_action( 'init', function () {

	//////////////////////////////////////////////////////////////////////////////////////

	// Peoples
	$labels = array(
		'name'                => __( 'People', 'text-domain' ),
		'singular_name'       => __( 'people', 'text-domain' ),
		'add_new'             => _x( 'Add New People', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New People', 'text-domain' ),
		'edit_item'           => __( 'Edit People', 'text-domain' ),
		'new_item'            => __( 'New People', 'text-domain' ),
		'view_item'           => __( 'View People', 'text-domain' ),
		'search_items'        => __( 'Search People', 'text-domain' ),
		'not_found'           => __( 'No people found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No people found in trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent people:', 'text-domain' ),
		'menu_name'           => __( 'People', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'taxonomies'          => array( 'post_tag' ),
		'public'              => true,
		'rewrite'             => true,
		'with_front'          => true,
		'feeds'         	  => false,
		'pages'         	  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		// 'rewrite'			  => array( 
		// 	'slug' 			  => 'special-collections/manuscript',
		// 	'with_front'	  => false,
		// ),
		// 'supports'            => array(
		// 	'title'
		// ),
	);

	register_post_type( 'people', $args );


	//////////////////////////////////////////////////////////////////////////////////////


	// Instruments
	$labels = array(
		'name'                => __( 'Instruments', 'text-domain' ),
		'singular_name'       => __( 'Instrument', 'text-domain' ),
		'add_new'             => _x( 'Add New Instrument', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Instrument', 'text-domain' ),
		'edit_item'           => __( 'Edit Instrument', 'text-domain' ),
		'new_item'            => __( 'New Instrument', 'text-domain' ),
		'view_item'           => __( 'View Instrument', 'text-domain' ),
		'search_items'        => __( 'Search Instrument', 'text-domain' ),
		'not_found'           => __( 'No Instrument found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Instrument found in trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Instrument:', 'text-domain' ),
		'menu_name'           => __( 'Instrument', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'taxonomies'          => array( 'post_tag' ),
		'public'              => true,
		'rewrite'             => true,
		'with_front'          => true,
		'feeds'         	  => false,
		'pages'         	  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		// 'rewrite'			  => array( 
		// 	'slug' 			  => 'special-collections/manuscript',
		// 	'with_front'	  => false,
		// ),
		// 'supports'            => array(
		// 	'title'
		// ),
	);

	register_post_type( 'instruments', $args );


	//////////////////////////////////////////////////////////////////////////////////////

	// Courses
	$labels = array(
		'name'                => __( 'Courses', 'text-domain' ),
		'singular_name'       => __( 'Course', 'text-domain' ),
		'add_new'             => _x( 'Add New Course', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Course', 'text-domain' ),
		'edit_item'           => __( 'Edit Course', 'text-domain' ),
		'new_item'            => __( 'New Course', 'text-domain' ),
		'view_item'           => __( 'View Course', 'text-domain' ),
		'search_items'        => __( 'Search Course', 'text-domain' ),
		'not_found'           => __( 'No Course found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Course found in trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Course:', 'text-domain' ),
		'menu_name'           => __( 'Course', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'taxonomies'          => array( 'post_tag' ),
		'public'              => true,
		'rewrite'             => true,
		'with_front'          => true,
		'feeds'         	  => false,
		'pages'         	  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		// 'rewrite'			  => array( 
		// 	'slug' 			  => 'special-collections/manuscript',
		// 	'with_front'	  => false,
		// ),
		// 'supports'            => array(
		// 	'title'
		// ),
	);

	register_post_type( 'courses', $args );


	//////////////////////////////////////////////////////////////////////////////////////

	// Publications
	$labels = array(
		'name'                => __( 'Publications', 'text-domain' ),
		'singular_name'       => __( 'Publication', 'text-domain' ),
		'add_new'             => _x( 'Add New Publication', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Publication', 'text-domain' ),
		'edit_item'           => __( 'Edit Publication', 'text-domain' ),
		'new_item'            => __( 'New Publication', 'text-domain' ),
		'view_item'           => __( 'View Publication', 'text-domain' ),
		'search_items'        => __( 'Search Publication', 'text-domain' ),
		'not_found'           => __( 'No Publication found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Publication found in trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Publication:', 'text-domain' ),
		'menu_name'           => __( 'Publication', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'taxonomies'          => array( 'post_tag' ),
		'public'              => true,
		'rewrite'             => true,
		'with_front'          => true,
		'feeds'         	  => false,
		'pages'         	  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		// 'rewrite'			  => array( 
		// 	'slug' 			  => 'special-collections/manuscript',
		// 	'with_front'	  => false,
		// ),
		// 'supports'            => array(
		// 	'title'
		// ),
	);

	register_post_type( 'publications', $args );


	//////////////////////////////////////////////////////////////////////////////////////
} );