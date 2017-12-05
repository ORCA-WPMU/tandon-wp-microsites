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
$context['lectures'] = Timber::get_posts( $args );
$post = Timber::query_post();


$context["acf"] = get_field_objects($data["post"]->ID);

$context['speaker'] = get_field('speakers_relationship');
$context['news'] = get_field('news_relationship');
$context['sponsor'] = get_field('sponsors_relationship');
$context['co_sponsor'] = get_field('co_sponsors_relationship');

$context['footerleftblock'] = get_field('footer_left_block', 'option');
$context['footercenterblock'] = get_field('footer_center_block', 'option');
$context['footerrightblock'] = get_field('footer_right_block', 'option');


$context['video'] = get_field('video');
$context['gallery'] = get_field('gallery');
$context['job'] = get_field('job_title');
$context['type'] = get_field('lecturer_type');
$context['lecturetitle'] = get_field('lecture_title');
$context['lectureheroimage'] = get_field('lecture_hero_image');
$context['aboutheader'] = get_field('about_header');
$context['abouttext'] = get_field('about_text');
$context['heroimage'] = get_field('hero_image');

//$context['agenda'] = get_field('agenda_blocks');
//$context['headshot'] = get_field('speaker_image');

$context['linktype'] = new TimberPost(get_field('link_type'));



$context['post'] = $post;

$template = 'single.twig';

if ( 'lectures' === get_post_type() ) {
	$template = 'single-lecture.twig';
}


Timber::render( $template, $context );
