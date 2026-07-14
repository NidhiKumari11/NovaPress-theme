<?php
/**
 * Enqueue scripts and styles.
 */

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
