<?php
/**
 * The template for displaying Woocommerce pages
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

get_header(); 

?>

	<div class="blog-area pt-90">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php
							woocommerce_content();
						?>
					</article>
				</div><!-- .col-md-8 -->
				
				<aside id="secondary" class="widget-area">
    				<div class="col-md-4 col-sm-4 col-xs-12">
						<?php
							 if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
						 	// Sidebar for Woocommerce if installed
				            if ( is_active_sidebar( 'woocommerce-sidebar' ) ) {
				                dynamic_sidebar( 'woocommerce-sidebar' );
				        	} 
				    	}
						?>
					</div>
				</aside>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .main-content -->

<?php
get_footer();
