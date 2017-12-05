<?php

/**
 * The default page template
 */

/**
 * Get Context
 */
$context = Timber::get_context();

$context['post'] = new TimberPost();

$context['footerleftblock'] = get_field('footer_left_block');
$context['footercenterblock'] = get_field('footer_center_block');
$context['footerrightblock'] = get_field('footer_right_block');

Timber::render( 'page.twig', $context );