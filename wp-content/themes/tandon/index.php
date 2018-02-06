<?php

namespace JDG\Topeka;

use Timber;

$context = Timber::get_context();

// $context['title_post_type'] = get_post_type();

// $context['slug'] = get_queried_object();

// $context['categories'] = Timber::get_terms('categories', array(
//     'orderby'   => 'title',
//     'parent'    => 0,
//     'order'     => 'ASC'
// ));
// $context['title_term'] = get_term_by( 'slug', get_query_var('term'),get_query_var('taxonomy') );


$context['personurl'] = get_field('people_url');

$context['aboutheader'] = get_field('about_header');
$context['abouttext'] = get_field('about_text');
$context['aboutus'] = get_field('about_us');
$context['aboutcybersecurity'] = get_field('about_cybersecurity');

$context['lecturetitle'] = get_field('lecture_title');

$context['speaker'] = get_field('speakers_current');

$context['registrationurl'] = get_field('registration_url');

$context['job'] = get_field('job_title');





$get_tax = get_field('taxonomy', 'option');

$context['taxpost'] = Timber::get_terms($get_tax);





$personargs = array(
    'post_type' => 'people',
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['people'] = Timber::get_posts( $personargs );


// *************************************************************** //
// *************************************************************** //
// ********************  Publication Queries  ******************** //
// *************************************************************** //
// *************************************************************** //

$conferenceposts = array(
    'post_type' => 'publications',
    'tax_query' => array(
        array (
            'taxonomy' => 'publication-types',
            'field' => 'slug',
            'terms' => 'conferences',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['conferenceposts'] = Timber::get_posts( $conferenceposts );

// *************************************************************** //

$journalposts = array(
    'post_type' => 'publications',
    'tax_query' => array(
        array (
            'taxonomy' => 'publication-types',
            'field' => 'slug',
            'terms' => 'journals',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['journalposts'] = Timber::get_posts( $journalposts );

// *************************************************************** //
// *************************************************************** //
// ******************  Instrumentation Queries  ****************** //
// *************************************************************** //
// *************************************************************** //

$depositionanddryetchingposts = array(
    'post_type' => 'instruments',
    'tax_query' => array(
        array (
            'taxonomy' => 'instrument-types',
            'field' => 'slug',
            'terms' => 'deposition-and-dry-etching',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['deposition-and-dry-etching-posts'] = Timber::get_posts( $depositionanddryetchingposts );

// *************************************************************** //

$lithographyandwaferbondingposts = array(
    'post_type' => 'instruments',
    'tax_query' => array(
        array (
            'taxonomy' => 'instrument-types',
            'field' => 'slug',
            'terms' => 'lithography-and-wafer-bonding',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['lithography-and-wafer-bonding-posts'] = Timber::get_posts( $lithographyandwaferbondingposts );

// *************************************************************** //

$metrologyposts = array(
    'post_type' => 'instruments',
    'tax_query' => array(
        array (
            'taxonomy' => 'instrument-types',
            'field' => 'slug',
            'terms' => 'metrology',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['metrologyposts'] = Timber::get_posts( $metrologyposts );

// *************************************************************** //


$substratecleaningposts = array(
    'post_type' => 'instruments',
    'tax_query' => array(
        array (
            'taxonomy' => 'instrument-types',
            'field' => 'slug',
            'terms' => 'substrate-cleaning',
        )
    ),
    'posts_per_page' => -1,
    'orderby' => array(
    'date' => 'ASC'
));
$context['substrate-cleaning-posts'] = Timber::get_posts( $substratecleaningposts );


// *************************************************************** //

Timber::render('index.twig', $context);
