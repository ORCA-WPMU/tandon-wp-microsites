<?php


/**
 * Taxonomy Roles Template
 */

$context = Timber::get_context();

$context['posts'] = Timber::get_posts();

$context['title_post_type'] = get_post_type();

$queried_object['slug'] = get_queried_object();

$context['taxterms'] = Timber::get_terms('types');

$context['title_term'] = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );

global $paged;

if (!isset($paged) || !$paged){

    $paged = 1;

}

$queried_object = get_queried_object () ;

$journals = array(
    'post_type' => 'people',
    'tax_query' => array(
        array (
            'taxonomy' => $queried_object->taxonomy,
            'field' => 'slug',
            'terms' => $queried_object->slug,
        )
    ),
    'posts_per_page' => 3,
    'paged' => $paged,
    'orderby' => array(
        'date' => 'DESC'
));

$context['posting'] = new Timber\PostQuery($journals);

$templates = array( 'archive.twig' );

Timber::render( $templates , $context );
