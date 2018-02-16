<?php


/**
 * Archive Template
 */

$context = Timber::get_context();

$context['posts'] = Timber::get_posts();

$context['title_post_type'] = get_post_type();

$context['slug'] = get_queried_object();

//$context['cpt'] = post_type();

$context['title_term'] = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );

$context['posts'] = new Timber\PostQuery();

Timber::render('archive.twig', $context);
