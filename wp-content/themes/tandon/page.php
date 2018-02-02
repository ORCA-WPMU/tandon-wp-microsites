<?php

/**
 * The default page template
 */

/**
 * Get Context
 */
$context = Timber::get_context();

$context['post'] = new TimberPost();

$args = array(
'post_type' => 'team',
'orderby' => 'menu_order',
'order' => 'ASC',
'posts_per_page' => -1
);

$context['people'] = Timber::get_posts( $args );

$context['sidebarnavrepeater'] = get_field('sidebar_nav_repeater');

Timber::render( 'page.twig', $context );