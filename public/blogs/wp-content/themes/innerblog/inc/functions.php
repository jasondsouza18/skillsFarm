<?php
/**
 * InnerBlog functions and definitions
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

/**
 * Customizer additions.
 */
require INNERBLOG_THEME_FUNCTIONS_DIR . '/customizer/kirki-fallback.php';
require INNERBLOG_THEME_FUNCTIONS_DIR . '/customizer/panels.php';
require INNERBLOG_THEME_FUNCTIONS_DIR . '/customizer/sections.php';
require INNERBLOG_THEME_FUNCTIONS_DIR . '/customizer/fields.php';


/**
 * Include recommended plugins.
 */
include( INNERBLOG_THEME_FUNCTIONS_DIR . '/admin/tgm/tgm-init.php' );


// Check if theme is live preview
function innerblog_live_preview() {
	$theme    	  = wp_get_theme();
	$theme_name   = $theme->get( 'TextDomain' );
	$active_theme = innerblog_get_raw_option( 'template' );
	return apply_filters( 'innerblog_live_preview', ( $active_theme != strtolower( $theme_name ) && ! is_child_theme() ) );
}

// Get Raw Options
function innerblog_get_raw_option( $opt_name ) {
	$alloptions = wp_cache_get( 'alloptions', 'options' );
	$alloptions = maybe_unserialize( $alloptions );
	return isset( $alloptions[ $opt_name ] ) ? maybe_unserialize( $alloptions[ $opt_name ] ) : false;
}



/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function innerblog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'innerblog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function innerblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'innerblog_pingback_header' );

if ( ! function_exists( 'innerblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function innerblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on InnerBlog, use a find and replace
		 * to change 'innerblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'innerblog', INNERBLOG_THEME_DIR . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('innerblog-large', 1920, 800, array('center', 'top') );
		add_image_size('innerblog-medium', 900, 600, array('center', 'center') );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'innerblog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'innerblog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-width'  => false,
			'flex-height' => false,
		) );
	}
endif;
add_action( 'after_setup_theme', 'innerblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function innerblog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'innerblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'innerblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function innerblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'innerblog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'innerblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	if ( function_exists( 'is_woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'innerblog' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => esc_html__( 'Sidebar for Woocommerce.', 'innerblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'innerblog_widgets_init' );

function innerblog_homepage_slides(){
	
	get_template_part( 'section/carousel', 'small' );

}

//Display Post Next/Prev buttons if enabled.
function innerblog_next_prev_post() { ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php 
				previous_post_link( '<div class="nav-previous"> %link</div>', '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>'. __(' Previous Post','innerblog'));
				next_post_link( '<div class="nav-next">%link</div>', __('Next Post ','innerblog'). '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>' );
			?>
		</div><!-- .next_prev_post -->
	</nav>
	<div class="clearfix"></div>
<?php } 

// Excerpt Length
function innerblog_custom_excerpt_length($length) {
	if ( is_admin() ) 
	{
		return $length;
	}

	//$length =  get_theme_mod('innerblog_excerpt_length', 30 );
	$length =  30;

	return $length;
}
add_filter( 'excerpt_length', 'innerblog_custom_excerpt_length', 999 );

// Excerpt More
function innerblog_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	if( get_theme_mod('innerblog_readmore_display', true ) == true ){

		$readmore = get_theme_mod('innerblog_readmore_txt', 'Read More' );

		$link = sprintf( '<div class="read-more"><a href="%1$s" class="more-link">%2$s</a></div>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __(  ' %s ', 'innerblog' ), $readmore )
		);

		return ' &hellip; ' . $link;

	} else {

		return ' &hellip; ';

	}

}
add_filter( 'excerpt_more', 'innerblog_excerpt_more' );

function innerblog_social_cb(){ 	
	$facebook = get_theme_mod('innerblog_social_facebook','');
	$twitter = get_theme_mod('innerblog_social_twitter','');
	$gplus = get_theme_mod('innerblog_social_gplus','');
	$youtube = get_theme_mod('innerblog_social_youtube','');
	$instagram = get_theme_mod('innerblog_social_instagram','');
	$pinterest = get_theme_mod('innerblog_social_pinterest','');
	$rssfeed = get_theme_mod('innerblog_social_rssfeed','');
	?>
	<?php if ( $facebook || $twitter || $gplus || $youtube || $instagram || $pinterest || $rssfeed ) : ?>

		<p><?php esc_html_e( 'Social Media Follow', 'innerblog' ); ?></p>

		<ul class="social-follow">

			<?php if (!empty($facebook)) { ?>
				<li><a href="<?php echo esc_url($facebook)?>" class="facebook" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<?php 
			} 
			if (!empty($twitter)) {
			?>		
				<li><a href="<?php echo esc_url($twitter)?>" class="twitter" title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<?php 
			} 
			if (!empty($gplus)) {
			?>	
				<li><a href="<?php echo esc_url($gplus)?>" class="google-plus" title="Google Plus" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<?php 
			} 
			if (!empty($youtube)) {
			?>	
				<li><a href="<?php echo esc_url($youtube)?>" class="youtube" title="YouTube" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
			<?php 
			} 
			if (!empty($instagram)) {
			?>	
				<li><a href="<?php echo esc_url($instagram)?>" class="instagram" title="Instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<?php 
			} 
			if (!empty($pinterest)) {
			?>	
				<li><a href="<?php echo esc_url($pinterest)?>" class="pinterest" title="Pinterest" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
			<?php 
			} 
			if (!empty($rssfeed)) {
			?>	
				<li><a href="<?php echo esc_url($rssfeed)?>" class="rss" title="RSS Feed" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
			<?php 
			} 
			?>	
		</ul>
	<?php

	endif; 
} 
add_action( 'innerblog_social_follow', 'innerblog_social_cb' );
