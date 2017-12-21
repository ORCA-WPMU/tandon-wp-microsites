<?php

namespace NYU\Tandon;

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


$personargs = array(
// Get post type project
'post_type' => 'people',
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

$context['people'] = Timber::get_posts( $personargs );

$context['agendacontent'] = get_field('agenda_repeater', 'option');
$context['agendaintro'] = get_field('agenda_intro', 'option');
$context['agendafooter'] = get_field('agenda_footer', 'option');

$context['aboutsection'] = get_field('about_section', 'option');
$context['aboutprimarytitle'] = get_field('primary_title', 'option');
$context['aboutsecondarytitle'] = get_field('secondary_title', 'option');
$context['aboutwysiwyg'] = get_field('about_wysiwyg', 'option');
$context['centercontent'] = get_field('center_content', 'option');

$context['istherebackgroundimage'] = get_field('is_there_background_image', 'option');
$context['backgroundcoloropacity'] = get_field('background_color_opacity', 'option');
$context['backgroundfixed'] = get_field('fixed', 'option');
$context['aboutbackgroundimage'] = get_field('about_background_image', 'option');
$context['aboutbackgroundcolor'] = get_field('about_background_color', 'option');
$context['abouttextcolor'] = get_field('about_text_color', 'option');

$context['flexblock'] = get_field('nyu_flexible_content', 'option');

$context['peronsheadshot'] = get_field('headshot', 'option');
$context['peronstitle'] = get_field('job_title', 'option');
$context['peronsbio'] = get_field('bio', 'option');
$context['personurl'] = get_field('people_url');

$context['aboutheader'] = get_field('about_header');
$context['abouttext'] = get_field('about_text');

$context['alerttrue'] = get_field('nyu_an_alert', 'option');
$context['alert'] = get_field('nyu_alert', 'option');

$context['lecturetitle'] = get_field('lecture_title');

$context['herotitle'] = get_field('hero_title', 'option');
$context['heroimage'] = get_field('hero_image', 'option');
$context['herotrue'] = get_field('hero_true', 'option');
$context['fullheight'] = get_field('full_height', 'option');
$context['ifherobackgroundimage'] = get_field('is_hero_background_image', 'option');
$context['herobackgroundcolor'] = get_field('hero_background_color', 'option');
$context['herotextcolor'] = get_field('hero_text_color', 'option');
$context['herofixed'] = get_field('hero_fixed', 'option');
$context['herobackgroundcoloropacity'] = get_field('hero_background_color_opacity', 'option');

$context['upcomingevent'] = get_field('upcoming_event', 'option');
$context['eventdate'] = get_field('event_date', 'option');
$context['eventtitle'] = get_field('event_title', 'option');
$context['heroregistration'] = get_field('registration', 'option');
$context['heroagenda'] = get_field('agenda', 'option');
$context['backgroundcolor'] = get_field('background_color', 'option');

$context['eventbackgroundcolor'] = get_field('event_background_color', 'option');
$context['eventtextcolor'] = get_field('event_text_color', 'option');
$context['eventfixed'] = get_field('event_fixed', 'option');

$context['aboutus'] = get_field('about_us');
$context['aboutcybersecurity'] = get_field('about_cybersecurity');

$context['speaker'] = get_field('speakers_current');

$context['footerleftblock'] = get_field('footer_left_block', 'option');
$context['footercenterblock'] = get_field('footer_center_block', 'option');
$context['footerrightblock'] = get_field('footer_right_block', 'option');



$context['registrationurl'] = get_field('registration_url');
$context['headshot'] = get_field('speaker_image', 'option');

$context['job'] = get_field('job_title');


Timber::render('index.twig', $context);
