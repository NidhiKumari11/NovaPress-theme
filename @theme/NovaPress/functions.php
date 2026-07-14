<?php
/**
 * NovaPress functions and definitions
 *
 * @package NovaPress
 */

// Include theme setup.
require get_template_directory() . '/inc/setup.php';

// Include enqueue scripts.
require get_template_directory() . '/inc/enqueue.php';

// Include WooCommerce compatibility.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
