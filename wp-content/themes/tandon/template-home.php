<?php

/**
 * Template Name: Home
 */

/**
 * Get Context
 */
$context = Timber::get_context();

$context['post'] = new TimberPost();

$context['title_post_type'] = get_post_type();

$context['slug'] = get_queried_object();

$context['categories'] = Timber::get_terms('categories', array(
    'orderby'   => 'title',
    'parent'    => 0,
    'order'     => 'ASC'
));

$context['title_term'] = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );


$args = array(
// Get post type project
'post_type' => 'lectures',
// Get all posts
'posts_per_page' => -1,
// Gest post by "graphic" category
'meta_query' => array(
    array(
        // 'key' => 'project_category',
        // 'value' => 'graphic',
        // 'compare' => 'LIKE'
    )
),
// Order by post date
'orderby' => array(
    'date' => 'ASC'
));

$context['lectures'] = Timber::get_posts( $args );
$context['aboutheader'] = get_field('about_header');
$context['abouttext'] = get_field('about_text');



$context['lecturetitle'] = get_field('lecture_title');

$context['flexblock'] = get_field('nyu_flexible_content');

$context['herotitle'] = get_field('hero_title', 'option');
$context['heroimage'] = get_field('hero_image', 'option');
$context['herotrue'] = get_field('hero_true', 'option');
$context['fullheight'] = get_field('full_height', 'option');


$context['aboutus'] = get_field('about_us');
$context['aboutcybersecurity'] = get_field('about_cybersecurity');

$context['speaker'] = get_field('speakers_current');

$context['footerleftblock'] = get_field('footer_left_block', 'option');
$context['footercenterblock'] = get_field('footer_center_block', 'option');
$context['footerrightblock'] = get_field('footer_right_block', 'option');

$context['agenda'] = get_field('agenda_blocks');
$context['agendaintro'] = get_field('agenda_intro');
$context['agendafooter'] = get_field('agenda_footer');

$context['registrationurl'] = get_field('registration_url');
$context['headshot'] = get_field('speaker_image');

$context['job'] = get_field('job_title');


Timber::render( 'home.twig', $context );