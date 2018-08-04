<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

get_header();
?>

<?php get_template_part( 'section/header', 'image' ); ?>

<div class="not-found-area text-center ptb-50">
    <div class="container">
        <img src="<?php echo esc_url( INNERBLOG_THEME_DIR_URI ); ?>/assets/images/404.png" alt="<?php esc_html_e( '404', 'innerblog' ) ?>">
        <div class="common-btn"> <a class="btn-def bnt-2 big" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return to Home', 'innerblog' ) ?></a> </div>
    </div>
</div>

<?php
get_footer();
