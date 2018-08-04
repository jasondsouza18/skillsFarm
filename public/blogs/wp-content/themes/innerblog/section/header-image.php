<?php 
/**
 * The template for header image
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

$innerblog_bg = INNERBLOG_THEME_DIR_URI . '/assets/images/default-background-3061483.jpg';

if ( has_header_image() ){
	$innerblog_bg = get_header_image();
}

?>
<!-- breadcrumbs start -->
<section class="breadcrumbs-area breadcrumb-opacity" style="background: url('<?php echo esc_url( $innerblog_bg ); ?>') no-repeat fixed;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="breadcrumbs">
                	<?php if ( is_page() ) { ?>
                    <?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
                    <?php 
                		} elseif ( is_archive() ){ 
							the_archive_title( '<h2 class="page-title">', '</h2>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
					?>
					<?php } elseif (is_search()) { ?>
                        <h2 class="page-title">
                            <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Search Results for: %s', 'innerblog' ), '<span>' . get_search_query() . '</span>' );
                            ?>
                        </h2>     
				<?php } elseif ( is_404() ) {?>
					<h2 class="page-title">
                        <?php esc_html_e( '404', 'innerblog' ) ?>
                    </h2>
				<?php }	?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->