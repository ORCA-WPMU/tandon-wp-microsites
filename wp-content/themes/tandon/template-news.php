<?php

/**
 * Template Name: News
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

    'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $paged
);

$context['posting'] = new Timber\PostQuery($args);

Timber::render('page-news.twig', $context);