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

$context['title_post_type'] = get_post_type();



// Get all categories assigned to post
$instrumentcat = $post->terms( 'instrument-types' );

// Get only the first category from the array
$context['instrumenttype'] = reset( $instrumentcat );

// Get all categories assigned to post
$publicationcat = $post->terms( 'publication-types' );

// Get only the first category from the array
$context['publicationtype'] = reset( $publicationcat );

// Get all categories assigned to post
$rolecat = $post->terms( 'roles' );

// Get only the first category from the array
$context['roletype'] = reset( $rolecat );









$context['term_page'] = new TimberTerm();

// $context['taxterms'] = Timber::get_terms('roles');

$args = array(
'post_type' => 'people',
'orderby' => 'menu_order',
'order' => 'ASC',
'posts_per_page' => -1
);

$context['people'] = Timber::get_posts( $args );

$context['featuredimage'] = get_field('feat_image');

$context['instrumentdocs'] = get_field('instrument_docs');

$context['instrumentpointofcontact'] = get_field('instrument_point_of_contact');

$context['instrumenturl'] = get_field('url');

$context['instrumentvideos'] = get_field('instrument_videos');

$context['instrumentpicture'] = get_field('instrument_picture');

$context['emailer'] = get_field('team_email');

$context['cvupload'] = get_field('cv_upload');

$template = 'single.twig';

if ( 'people' === get_post_type() ) {
    $template = 'single-people.twig';
}

if ( 'instruments' === get_post_type() ) {
    $template = 'single-instruments.twig';
}
if ( 'publications' === get_post_type() ) {
    $template = 'single-publication.twig';
}


Timber::render( $template, $context );
