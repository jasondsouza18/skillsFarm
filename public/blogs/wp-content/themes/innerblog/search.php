<?php
/**
 * The template for displaying search results pages
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

get_header();
?>
    <?php get_template_part( 'section/header', 'image' ); ?>

<div class="blog-area pt-90 pb-60">
		<div class="container">
				<div class="row">
					<div class="total-blog">
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="row">
                      <div class="post-masonry blog-mar">
                               
                          <?php
                            if ( have_posts() ) :

                                    /* Start the Loop */
                                    while ( have_posts() ) :
                                        the_post();

                                        /*
                                         * Include the Post-Type-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/content', 'search' );

                                    endwhile;

                                else :

                                    get_template_part( 'template-parts/content', 'none' );

                                endif;
                         ?>

                      </div>  
                  </div>  

                            <?php 
                             //the_posts_navigation();
                                the_posts_pagination( 
                                    array(
                                        'mid_size' => 3,
                                        'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i> ',
                                        'next_text' => ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i> ',
                                    ) 
                                );
                            ?>

              </div> <!-- col-md-8 -->
                        
              <?php get_sidebar();?>

					</div>
				</div>
		</div>
</div>
<!-- Blog Area End-->

<?php
get_footer();
