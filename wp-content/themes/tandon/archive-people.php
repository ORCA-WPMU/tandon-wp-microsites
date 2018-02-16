<?php


/**
 * Archive People Template
 */

$context = Timber::get_context();

$context['posts'] = Timber::get_posts();

$context['title_post_type'] = get_post_type();

$context['slug'] = get_queried_object();

//$context['taxterms'] = Timber::get_terms('roles');

$context['title_term'] = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );

global $paged;

if (!isset($paged) || !$paged){

    $paged = 1;

}

$journals = array(
    'post_type' => 'people',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => array(
        'date' => 'DESC'
));

$context['posting'] = new Timber\PostQuery($journals);

$templates = array( 'archive.twig' );

Timber::render( $templates , $context );
