<?php

/**
 * Template Name: People
 */

/**
 * Get Context
 */

$context['posts'] = Timber::get_posts();

global $paged;

if (!isset($paged) || !$paged){

    $paged = 1;

}

$context = Timber::get_context();

$args = array(

    'post_type' => 'people',
    'posts_per_page' => 6,
    'paged' => $paged
);

$context['people_posts'] = new Timber\PostQuery($args);

Timber::render('page-people.twig', $context);