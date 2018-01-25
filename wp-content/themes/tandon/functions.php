<?php

require_once( __DIR__ . '/functions/acf.php' );

require_once( __DIR__ . '/functions/enqueue.php' );

Timber::$dirname = array('templates', 'views');

/**
 * Filter hook function monkey patching form classes
 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
 *
 * @param string $args Form attributes.
 * @param string $key Not in use.
 * @param null   $value Not in use.
 *
 * @return mixed
 */
function wc_form_field_args( $args, $key, $value = null ) {
  // Start field type switch case.
  switch ( $args['type'] ) {
    /* Targets all select input type elements, except the country and state select input types */
    case 'select' :
      // Add a class to the field's html element wrapper - woocommerce
      // input types (fields) are often wrapped within a <p></p> tag.
      $args['class'][] = 'form-group';
      // Add a class to the form input itself.
      $args['input_class']       = array( 'form-control', 'input-lg' );
      $args['label_class']       = array( 'control-label' );
      $args['custom_attributes'] = array(
        'data-plugin'      => 'select2',
        'data-allow-clear' => 'true',
        'aria-hidden'      => 'true',
        // Add custom data attributes to the form input itself.
      );
      break;
    // By default WooCommerce will populate a select with the country names - $args
    // defined for this specific input type targets only the country select element.
    case 'country' :
      $args['class'][]     = 'form-group single-country';
      $args['label_class'] = array( 'control-label' );
      break;
    // By default WooCommerce will populate a select with state names - $args defined
    // for this specific input type targets only the country select element.
    case 'state' :
      // Add class to the field's html element wrapper.
      $args['class'][] = 'form-group';
      // add class to the form input itself.
      $args['input_class']       = array( '', 'input-lg' );
      $args['label_class']       = array( 'control-label' );
      $args['custom_attributes'] = array(
        'data-plugin'      => 'select2',
        'data-allow-clear' => 'true',
        'aria-hidden'      => 'true',
      );
      break;
    case 'password' :
    case 'text' :
    case 'email' :
    case 'tel' :
    case 'number' :
      $args['class'][]     = 'form-group';
      $args['input_class'] = array( 'form-control', 'input-lg' );
      $args['label_class'] = array( 'control-label' );
      break;
    case 'textarea' :
      $args['input_class'] = array( 'form-control', 'input-lg' );
      $args['label_class'] = array( 'control-label' );
      break;
    case 'checkbox' :
      $args['label_class'] = array( 'custom-control custom-checkbox' );
      $args['input_class'] = array( 'custom-control-input', 'input-lg' );
      break;
    case 'radio' :
      $args['label_class'] = array( 'custom-control custom-radio' );
      $args['input_class'] = array( 'custom-control-input', 'input-lg' );
      break;
    default :
      $args['class'][]     = 'form-group';
      $args['input_class'] = array( 'form-control', 'input-lg' );
      $args['label_class'] = array( 'control-label' );
      break;
  } // end switch ($args).
  return $args;
}

add_filter( 'gform_field_container', 'add_bootstrap_container_class', 10, 6 );
function add_bootstrap_container_class( $field_container, $field, $form, $css_class, $style, $field_content ) {
  $id = $field->id;
  $field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";
  return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
}

/*
  Feature supported by this theme
*/
function my_theme_support() {
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  add_theme_support('custom-logo');
  add_theme_support('title_tag');
  add_theme_support('widgets');
  add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption') );
  add_theme_support('jetpack-responsive-videos');
  add_theme_support('automatic-feed-links');
  add_theme_support('woocommerce');

  add_post_type_support('page', 'excerpt');

  // Jetpack's Infinite scroll
  add_theme_support('infinite-scroll', array(
    'footer' => false,
    'render' => function() {
      $context = array('posts' => Timber::get_posts() );
      Timber::render('partials/_posts.twig', $context);
    },
    'posts_per_page' => false
  ) );

  // Blog post width, used by Jetpack's Gallery
  $GLOBALS['content_width'] = 600;
}


class TopekaSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

new TopekaSite();
