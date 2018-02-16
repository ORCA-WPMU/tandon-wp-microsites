<?php

/**
 * Create taxonomies.
 *
 * @param  string        $taxonomy    Name of taxonomy object
 * @param  array|string  $object_type Name of the object type for the taxonomy object.
 * @param  array|string  $args        Taxonomy arguments
 * @return null|WP_Error              WP_Error if errors, otherwise null.
 */
add_action( 'init', function () {

	register_taxonomy(
		$taxonomy    = 'roles',
		$object_type = 'people',
		$args        = array(
			'hierarchical' => false,
			'query_var'    => true,
			'show_ui'      => true,
			'labels'       => array(
				'name'              => _x( 'Roles', 'taxonomy general name' ),
				'singular_name'     => _x( 'Roles', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Roles' ),
				'all_items'         => __( 'All Roles' ),
				'parent_item'       => __( 'Parent Roles' ),
				'parent_item_colon' => __( 'Parent Roles:' ),
				'edit_item'         => __( 'Edit Roles' ),
				'update_item'       => __( 'Update Roles' ),
				'add_new_item'      => __( 'Add New Roles' ),
				'new_item_name'     => __( 'New Roles' ),
				'menu_name'         => __( 'Roles' ),
			),
		)
	);

	register_taxonomy(
		$taxonomy    = 'instrument-types',
		$object_type = 'instruments',
		$args        = array(
			'hierarchical' => false,
			'query_var'    => true,
			'show_ui'      => true,
			'labels'       => array(
				'name'              => _x( 'Instrument Types', 'taxonomy general name' ),
				'singular_name'     => _x( 'Instrument Types', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Instrument Types' ),
				'all_items'         => __( 'All Instrument Types' ),
				'parent_item'       => __( 'Parent Instrument Types' ),
				'parent_item_colon' => __( 'Parent Instrument Types:' ),
				'edit_item'         => __( 'Edit Instrument Types' ),
				'update_item'       => __( 'Update Instrument Types' ),
				'add_new_item'      => __( 'Add New Instrument Types' ),
				'new_item_name'     => __( 'New Instrument Types' ),
				'menu_name'         => __( 'Instrument Types' ),
			),
		)
	);

	register_taxonomy(
		$taxonomy    = 'publication-types',
		$object_type = 'publications',
		$args        = array(
			'hierarchical' => false,
			'query_var'    => true,
			'show_ui'      => true,
			'labels'       => array(
				'name'              => _x( 'Publication Types', 'taxonomy general name' ),
				'singular_name'     => _x( 'Publication Types', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Publication Types' ),
				'all_items'         => __( 'All Publication Types' ),
				'parent_item'       => __( 'Parent Publication Types' ),
				'parent_item_colon' => __( 'Parent Publication Types:' ),
				'edit_item'         => __( 'Edit Publication Types' ),
				'update_item'       => __( 'Update Publication Types' ),
				'add_new_item'      => __( 'Add New Publication Types' ),
				'new_item_name'     => __( 'New Publication Types' ),
				'menu_name'         => __( 'Publication Types' ),
			),
		)
	);

	register_taxonomy(
		$taxonomy    = 'course-types',
		$object_type = 'courses',
		$args        = array(
			'hierarchical' => false,
			'query_var'    => true,
			'show_ui'      => true,
			'labels'       => array(
				'name'              => _x( 'Course Types', 'taxonomy general name' ),
				'singular_name'     => _x( 'Course Types', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Course Types' ),
				'all_items'         => __( 'All Course Types' ),
				'parent_item'       => __( 'Parent Course Types' ),
				'parent_item_colon' => __( 'Parent Course Types:' ),
				'edit_item'         => __( 'Edit Course Types' ),
				'update_item'       => __( 'Update Course Types' ),
				'add_new_item'      => __( 'Add New Course Types' ),
				'new_item_name'     => __( 'New Course Types' ),
				'menu_name'         => __( 'Course Types' ),
			),
		)
	);

} );