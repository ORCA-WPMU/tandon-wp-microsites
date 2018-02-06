<?php


/**
 * Archive People Template
 */

$context = Timber::get_context();

$context['posts'] = Timber::get_posts();

$context['title_post_type'] = get_post_type();

$context['slug'] = get_queried_object();

$context['taxterms'] = Timber::get_terms('publication-types');

global $paged;

if (!isset($paged) || !$paged){

    $paged = 1;

}

$journals = array(
    'post_type' => 'publications',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => array(
        'date' => 'DESC'
));

$context['posting'] = new Timber\PostQuery($journals);

$templates = array( 'archive.twig' );

Timber::render( $templates , $context );
