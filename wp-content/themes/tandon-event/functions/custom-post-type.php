<?php

// An array of post types to be used in the filter below
$post_type_array = array(
    'artists',
);

/**
 * Make custom post types available to tag archive pages
 *
 * @param   $query The default WordPress query
 * @param   $post_type_array An array of post types 
 * @return  $query The query augmented by the post types from our array
 */
add_filter( 'pre_get_posts', function ( $query ) use ( $post_type_array ) {

    // @jproctor fixes bricked main menu on tag archive http://wordpress.stackexchange.com/questions/142439/main-menu-not-appearing-on-category-pages
    if( is_archive() && ( is_category() || is_tag() ) && empty( $query->query_vars['suppress_filters'] ) ) {

        $query->set( 'post_type', $post_type_array );

    }

    return $query;

} );

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
add_action( 'init', function () {


    // Artists
    $labels = array(
        'name'                => __( 'Artists', 'text-domain' ),
        'singular_name'       => __( 'Artist', 'text-domain' ),
        'add_new'             => _x( 'Add New Artist', 'text-domain', 'text-domain' ),
        'add_new_item'        => __( 'Add New Artist', 'text-domain' ),
        'edit_item'           => __( 'Edit Artist', 'text-domain' ),
        'new_item'            => __( 'New Artist', 'text-domain' ),
        'view_item'           => __( 'View Artist', 'text-domain' ),
        'search_items'        => __( 'Search Artists', 'text-domain' ),
        'not_found'           => __( 'No Artists found', 'text-domain' ),
        'not_found_in_trash'  => __( 'No Artists found in Trash', 'text-domain' ),
        'parent_item_colon'   => __( 'Parent Artist:', 'text-domain' ),
        'menu_name'           => __( 'Artists', 'text-domain' ),
    );

    $args = array(
        'labels'              => $labels,
        'taxonomies'          => array( 'post_tag' ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 
            'slug'            => 'artists',
            'with_front'      => true,
        ),
        'supports'            => array(
            'title', 'excerpt', 'editor' ,'page-attributes', 'thumbnail', 
        ),
    );

    register_post_type( 'artists', $args );



} );
