<?php

namespace Athletics\UCD;

class Enqueue {

	/**
	 * @var string $version
	 */
	public $version = '1.0.5';

	/**
	 * @var string $url
	 */
	public $url = '';

	/**
	 * @var string $css
	 */
	public $css = 'min.css';

	/**
	 * @var string $js
	 */
	public $js = 'min.js';

	/**
	 * @var string $namespace
	 */
	public $namespace = null;

	/**
	 * Public constructor
	 */
	public function __construct( $namespace ) {

		$this->namespace = $namespace;

		$this->url = get_stylesheet_directory_uri();

		if ( $this->is_development() ) {
			$this->version = time();
			$this->css = 'css';
			$this->js = 'js';
		}

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		// add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'site_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'site_scripts' ) );
		// add_action( 'wp_enqueue_scripts', array( $this, 'print_styles' ) );

	}

	/**
	 * Is development environment?
	 *
	 * @return boolean
	 */
	public function is_development() {

		if ( defined( 'MNFST_TM_STMP' ) && MNFST_TM_STMP ) {
			return true;
		}

		return false;

	}

	/**
	 * Admin Styles
	 */
	public function admin_styles() {

		wp_enqueue_style(
			"{$this->namespace}-admin",
			"{$this->url}/dist/css/admin.{$this->css}",
			false,
			$this->version,
			'screen'
		);

	}

	/**
	 * Admin Scripts
	 */
	public function admin_scripts() {

		wp_enqueue_script(
			"{$this->namespace}-admin",
			"{$this->url}/js/app/admin.js",
			array(
				'jquery',
			),
			$this->version,
			true
		);

	}

	/**
	 * Site Styles
	 */
	public function site_styles() {

		wp_enqueue_style( 'bs_css', get_template_directory_uri() . '/public/css/bootstrap.css' );
		wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/public/css/app.css' );

	}

	/**
	 * Site Scripts
	 */
	public function site_scripts() {

		wp_enqueue_script( 'bs_js', get_template_directory_uri() . '/public/bootstrap.bundle.js', array('jquery'), '', true );
		wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/public/app.bundle.js', array('jquery'), '', true );

	}

	/**
	 * Print Styles
	 */
	public function print_styles() {

		wp_enqueue_style(
			"{$this->namespace}-print",
			"{$this->url}/dist/css/{$this->namespace}-print.css",
			false,
			$this->version,
			'print'
		);

	}

}
new Enqueue( 'app' );