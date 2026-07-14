<?php
/**
 * NovaPress functions and definitions
 *
 * @package NovaPress
 */

if ( ! function_exists( 'novapress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function novapress_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'novapress' ),
			)
		);

		// Add theme support for HTML5 markup.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// WooCommerce support.
		add_theme_support(
			'woocommerce',
			array(
				'thumbnail_image_width' => 150,
				'single_image_width'    => 300,
				'product_grid'          => array(
					'default_rows'    => 3,
					'min_rows'        => 2,
					'max_rows'        => 8,
					'default_columns' => 4,
					'min_columns'     => 2,
					'max_columns'     => 5,
				),
			)
		);
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'novapress_setup' );

/**
 * Enqueue scripts and styles for frontend.
 */
function novapress_frontend_scripts() {
	wp_enqueue_style( 'novapress-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_enqueue_style( 'novapress-frontend-style', get_template_directory_uri() . '/assets/dist/css/frontend/main.min.css', array(), '1.0.0' );
	wp_enqueue_script( 'novapress-frontend-script', get_template_directory_uri() . '/assets/dist/js/frontend/frontend.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'novapress_frontend_scripts' );

/**
 * Enqueue scripts and styles for backend.
 */
function novapress_backend_scripts() {
	wp_enqueue_style( 'novapress-backend-style', get_template_directory_uri() . '/assets/dist/css/backend/backend.min.css', array(), '1.0.0' );
	wp_enqueue_script( 'novapress-backend-script', get_template_directory_uri() . '/assets/dist/js/backend/backend.min.js', array(), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'novapress_backend_scripts' );
