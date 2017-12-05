<?php


/**
 * Archive Template
 */

$context = Timber::get_context();

$context['posts'] = Timber::get_posts();

$context['title_post_type'] = get_post_type();

$context['slug'] = get_queried_object();

$context['categories'] = Timber::get_terms('categories', array(
    'orderby'   => 'title',
    'parent'    => 0,
    'order'     => 'ASC'
));
$context['footerleftblock'] = get_field('footer_left_block');
$context['footercenterblock'] = get_field('footer_center_block');
$context['footerrightblock'] = get_field('footer_right_block');
$context['title_term'] = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );

$templates = array( 'archive.twig' );

Timber::render( $templates , $context );
