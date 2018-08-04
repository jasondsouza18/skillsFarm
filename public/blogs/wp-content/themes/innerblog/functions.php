<?php
/**
 * InnerBlog Constants Declarations
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

 //Constants
define ('INNERBLOG_THEME_DIR_URI', get_template_directory_uri() );
define ('INNERBLOG_THEME_DIR', get_template_directory() );
define ('INNERBLOG_THEME_FUNCTIONS_DIR', INNERBLOG_THEME_DIR . '/inc' );
 
//Include other PHP files
require (INNERBLOG_THEME_FUNCTIONS_DIR . '/scripts/scripts.php');



/**
 * Implement the Custom Header feature.
 */
require INNERBLOG_THEME_FUNCTIONS_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require INNERBLOG_THEME_FUNCTIONS_DIR . '/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require INNERBLOG_THEME_FUNCTIONS_DIR . '/functions.php';

/**
 * Customizer additions.
 */
require INNERBLOG_THEME_FUNCTIONS_DIR . '/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require INNERBLOG_THEME_FUNCTIONS_DIR . '/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require INNERBLOG_THEME_FUNCTIONS_DIR . '/woocommerce.php';
}
