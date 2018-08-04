<?php
/**
 * The template for displaying all single posts
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

get_header();
?>

<div class="single-blog ptb-80">
	<div class="container">                    
		<div class="row">                       
			<div class="col-md-8 col-sm-8 col-xs-12">
				<?php
				while ( have_posts() ) :

					the_post();

					get_template_part( 'template-parts/content', 'single' );

					innerblog_next_prev_post();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>

			<?php
				get_sidebar();
			?>
		</div>
	</div>
</div>
	
<?php
get_footer();
