<?php

require_once( __DIR__ . '/functions/enqueue.php' );

Timber::$dirname = array('templates', 'views');

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'Hero' );
}

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'Homepage' );
}

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
  acf_add_options_sub_page( 'Global' );
}

if ( function_exists( 'acf_set_options_page_menu' ) ) {
  acf_set_options_page_menu( __( 'NYU Settings' ) );
}

add_action( 'after_setup_theme', 'woocommerce_support' );
if ( ! function_exists( 'woocommerce_support' ) ) {
  /**
   * Declares WooCommerce theme support.
   */
  function woocommerce_support() {
    add_theme_support( 'woocommerce' );

    // Add New Woocommerce 3.0.0 Product Gallery support
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Gallery slider needs Flexslider - https://woocommerce.com/flexslider/
    //add_theme_support( 'wc-product-gallery-slider' );

    // hook in and customizer form fields.
    add_filter( 'woocommerce_form_field_args', 'wc_form_field_args', 10, 3 );
  }
}
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

// add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
// function woo_new_product_tab( $tabs ) {

//   // Adds the new tab

//   $tabs['test_tab'] = array(
//     'title'   => __( 'New Product Tab', 'woocommerce' ),
//     'priority'  => 50,
//     'callback'  => 'woo_new_product_tab_content'
//   );

//   return $tabs;

// }
// function woo_new_product_tab_content() {

//   // The new tab content

//   echo '<h2>New Product Tab</h2>';
//   echo '<p>Here\'s your new product tab.</p>';

// }



// add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );
// /**
//  * custom_woocommerce_template_loop_add_to_cart
// */
// function custom_woocommerce_product_add_to_cart_text() {
// 	global $product;

// 	$product_type = $product->product_type;

// 	switch ( $product_type ) {
// 		case 'external':
// 			return __( 'Buy product', 'woocommerce' );
// 		break;
// 		case 'grouped':
// 			return __( 'View products', 'woocommerce' );
// 		break;
// 		case 'simple':
// 			return __( 'Add to cart', 'woocommerce' );
// 		break;
// 		case 'variable':
// 			return __( 'Select options', 'woocommerce' );
// 		break;
// 		default:
// 			return __( 'Read more', 'woocommerce' );
// 	}

// }

// require_once 'classes/timber.php';
// require_once 'classes/timber-woo.php';
// require_once 'functions/addon-woo.php';
// require_once 'functions/custom-post-type.php';

// add_action('init', 'my_init', 1);
// add_action('widgets_init', 'my_widgets');
// add_action('after_setup_theme', 'my_theme_support');
//add_action('wp_enqueue_scripts', 'my_enqueue_script', 100);

/////

// allow shop manager to edit theme
// $role_object = get_role('shop_manager');
// $role_object->add_cap('edit_theme_options');

// function my_init() {
//   /*
//     Register Custom Post Type and Taxonomy
//     https://github.com/hrsetyono/edje-wp/wiki/Custom-Post-Type
//   */
//   // H::register_post_type('product');
//   // H::remove_menu(array('Comments', 'Media') );

//   // Create Menu position checkbox
//   register_nav_menu('main-menu', 'Main Menu');
//   register_nav_menu('blog-menu', 'Blog Menu');
//   register_nav_menu('social-menu', 'Social Menu');

//   // Allow EDTIOR to edit Theme and Menu
//   $role_object = get_role('editor');
//   $role_object->add_cap('edit_theme_options');

//   // ACF Option page
//   if(function_exists('acf_add_options_page') ) {
//     acf_add_options_sub_page(array(
//   		'page_title' 	=> 'Theme Options',
//   		'parent_slug' 	=> 'themes.php',
//   	));
//   }
// }

// /*
//   Register widgets
// */
// function my_widgets() {
//   register_sidebar(array('name' => 'My Sidebar', 'id' => 'my-sidebar'));
// }

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

// /*
//   Register all your CSS and JS here
// */
// function my_enqueue_script() {
//   $css_dir = get_template_directory_uri() . '/public/css';
//   $js_dir = get_template_directory_uri() . '/public/js';

//   // Stylesheet
//   wp_enqueue_style('my-framework', $css_dir . '/bootstrap.css');
//   wp_enqueue_style('my-app', $css_dir . '/app.css');
//   wp_enqueue_style('dashicons', get_stylesheet_uri(), 'dashicons'); // WP native icons

//   // JavaScript
//   // wp_enqueue_script('my-fastclick', $js_dir . '/vendor/fastclick.min.js', false, false, true);
//   // wp_enqueue_script('my-fancybox', $js_dir . '/vendor/fancybox.min.js', array('jquery'), false, true);
//   // wp_enqueue_script('my-slick', $js_dir . '/vendor/slick.min.js', array('jquery'), false, true);
//   wp_enqueue_script('my-app', $js_dir . '/app.js', array('jquery'), false, true);

//   // Enable comment's reply form
//   if (is_singular() && comments_open() && get_option('thread_comments') ) {
//     wp_enqueue_script('comment-reply');
//   }
// }



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



	// add_action('wp_enqueue_scripts', 'override_woo_frontend_styles');
	// function override_woo_frontend_styles(){
	//     $file_general = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/TOPEKA/public/css/app.css';
	//     if( file_exists($file_general) ){
	//         wp_dequeue_style('woocommerce-general');
	//         wp_enqueue_style('woocommerce-general-custom', get_template_directory_uri() . '/public/css/app.css');
	//     }
	// }

}

new TopekaSite();
