<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

get_header();

?>
	<?php get_template_part( 'section/header', 'image' ); ?>

	<div class="blog-area pt-90">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div><!-- .col-md-8 -->

				<?php get_sidebar();?>

			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .blog-area -->

<?php
get_footer();
