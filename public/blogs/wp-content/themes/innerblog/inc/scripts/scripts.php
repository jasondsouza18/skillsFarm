<?php
/**
 * InnerBlog Scripts
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

function innerblog_fonts_url() {
	$fonts_url = '';
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Oswald and Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$Lato = _x( 'on', 'Lato font: on or off', 'innerblog' );

	if (  'off' !== $Lato  ) {
		$font_families = array();

		$font_families[] = 'Lato:400,400i,700,700i,900';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function innerblog_scripts() {

	wp_enqueue_style( 'innerblog-fonts', innerblog_fonts_url(), array(), null );
	
	wp_enqueue_style( 'bootstrap', INNERBLOG_THEME_DIR_URI . '/assets/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'innerblog-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'animate', INNERBLOG_THEME_DIR_URI . '/assets/css/animate.css' );
	wp_enqueue_style( 'owl-carousel', INNERBLOG_THEME_DIR_URI . '/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'meanmenu', INNERBLOG_THEME_DIR_URI . '/assets/css/meanmenu.css' );
	wp_enqueue_style( 'innerblog-breadcrumb', INNERBLOG_THEME_DIR_URI . '/assets/css/breadcrumb.css' );
	wp_enqueue_style( 'innerblog-responsive', INNERBLOG_THEME_DIR_URI . '/assets/css/responsive.css' );
	wp_enqueue_style( 'innerblog-header', INNERBLOG_THEME_DIR_URI . '/assets/css/header.css' );
	wp_enqueue_style( 'innerblog-default', INNERBLOG_THEME_DIR_URI . '/assets/css/default.css' );
	wp_enqueue_style( 'innerblog-slider', INNERBLOG_THEME_DIR_URI . '/assets/css/slider.css' );
	wp_enqueue_style( 'hamburgers-min', INNERBLOG_THEME_DIR_URI . '/assets/css/hamburgers.min.css' );
	wp_enqueue_style( 'font-awesome', INNERBLOG_THEME_DIR_URI .'/assets/css/font-awesome.min.css' );


	/*JS*/
	wp_enqueue_script( 'modernizr-min', INNERBLOG_THEME_DIR_URI . '/assets/js/modernizr-2.8.3.min.js', array(), '', false );
	wp_enqueue_script( 'bootstrap-min', INNERBLOG_THEME_DIR_URI . '/assets/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'isotope-pkgd-min', INNERBLOG_THEME_DIR_URI . '/assets/js/isotope.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'bootstrap-min', INNERBLOG_THEME_DIR_URI . '/assets/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'owl-carousel-min', INNERBLOG_THEME_DIR_URI . '/assets/js/owl.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'imagesloaded-pkgd-min', INNERBLOG_THEME_DIR_URI . '/assets/js/imagesloaded.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'jquery-meanmenu', INNERBLOG_THEME_DIR_URI . '/assets/js/jquery.meanmenu.js', array(), '', true );
	wp_enqueue_script( 'innerblog-plugins-js', INNERBLOG_THEME_DIR_URI . '/assets/js/plugins-min.js', array(), '', true );
	wp_enqueue_script( 'headroom-active', INNERBLOG_THEME_DIR_URI . '/assets/js/headroom-active.js', array(), '', true );
	wp_enqueue_script( 'innerblog-main-js', INNERBLOG_THEME_DIR_URI . '/assets/js/main.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'innerblog-navigation', INNERBLOG_THEME_DIR_URI . '/assets/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'innerblog-skip-link-focus-fix', INNERBLOG_THEME_DIR_URI . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'innerblog_scripts' );


?>