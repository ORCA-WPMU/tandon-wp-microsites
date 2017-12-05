<?php

/**
 * Template Name: Custom
 */

/**
 * Get Context
 */
$context = Timber::get_context();

$context['hometitle'] = get_field('orient_section_title');
$context['news'] = get_field('orient_homepage_news');


Timber::render( 'custom.twig', $context );