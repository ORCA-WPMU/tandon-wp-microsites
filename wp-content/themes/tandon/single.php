<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();

$post = Timber::query_post();

$context['post'] = $post;

$context['term_page'] = new TimberTerm();

$context['taxterms'] = Timber::get_terms('roles');

$args = array(
'post_type' => 'people',
'orderby' => 'menu_order',
'order' => 'ASC',
'posts_per_page' => -1
);

$context['people'] = Timber::get_posts( $args );

$context['emailer'] = get_field('team_email');

$context['cvupload'] = get_field('cv_upload');

$template = 'single.twig';

if ( 'people' === get_post_type() ) {
    $template = 'single-people.twig';
}


Timber::render( $template, $context );
