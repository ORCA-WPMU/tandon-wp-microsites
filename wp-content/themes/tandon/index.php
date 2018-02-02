<?php

namespace JDG\Topeka;

use Timber;

$context = Timber::get_context();

$context['title_post_type'] = get_post_type();

$context['slug'] = get_queried_object();

$context['categories'] = Timber::get_terms('categories', array(
    'orderby'   => 'title',
    'parent'    => 0,
    'order'     => 'ASC'
));
$context['title_term'] = get_term_by( 'slug', get_query_var('term'),get_query_var('taxonomy') );

$args = array(
    'post_type' => 'lectures',
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['lectures'] = Timber::get_posts( $args );

$personargs = array(
    'post_type' => 'people',
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['people'] = Timber::get_posts( $personargs );

$conferenceposts = array(
    'post_type' => 'publications',
    'tax_query' => array(
        array (
            'taxonomy' => 'types',
            'field' => 'slug',
            'terms' => 'conferences',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['conferenceposts'] = Timber::get_posts( $conferenceposts );

$journalposts = array(
    'post_type' => 'publications',
    'tax_query' => array(
        array (
            'taxonomy' => 'types',
            'field' => 'slug',
            'terms' => 'journals',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['journalposts'] = Timber::get_posts( $journalposts );


$get_tax = get_field('taxonomy', 'option');
$context['taxpost'] = Timber::get_terms($get_tax);

$context['personurl'] = get_field('people_url');

$context['aboutheader'] = get_field('about_header');
$context['abouttext'] = get_field('about_text');
$context['aboutus'] = get_field('about_us');
$context['aboutcybersecurity'] = get_field('about_cybersecurity');

$context['lecturetitle'] = get_field('lecture_title');

$context['speaker'] = get_field('speakers_current');

$context['registrationurl'] = get_field('registration_url');

$context['job'] = get_field('job_title');

Timber::render('index.twig', $context);
