<?php


/**
 * Archive Template
 */

$context = Timber::get_context();

$context['posts'] = Timber::get_posts();

$context['title_post_type'] = get_post_type();

$context['slug'] = get_queried_object();

$journals = array(
    'post_type' => 'publications',
    'posts_per_page' => -1,
    'orderby' => array(
        'date' => 'DESC'
));
$context['publication_list'] = Timber::get_posts( $journals );

$context['title_term'] = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );

$templates = array( 'archive.twig' );

Timber::render( $templates , $context );
