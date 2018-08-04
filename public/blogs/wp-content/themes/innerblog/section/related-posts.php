<?php
/**
 * Template part for single related posts
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */


	$related = innerblog_related_posts(); 
?>

<?php if ( $related->have_posts() ): ?>

<!--slider blog area start-->
<div class="slider-blog-area">
    <div class="related-heading">
		<h3 class="text-left"><?php esc_html_e( 'You May Like', 'innerblog' ); ?></h3>
	</div>
    <div class="row">
        <div class="slider-blog related-slider-blog full-carsoule blog-mar">
            <?php while( $related->have_posts() ) { $related->the_post(); ?> 
                <div class="col-xs-12">
                    <div class="single-blog ">

                        <div class="blog-img">
                            <?php if (has_post_thumbnail()) { ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
							        <img src="<?php the_post_thumbnail_url('innerblog-medium') ; ?>" alt="<?php the_title_attribute();?>">
							    </a>
							<?php } else { ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                    <img src="<?php echo esc_url( INNERBLOG_THEME_DIR_URI ); ?>/img/blog/8.jpg" alt="">
                                </a>
                            <?php }?>
                        </div>

                        <div class="blog-content">
                            <div class="blog-title">
                                <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );?>
                            </div>
                            <div class="author-date">
                                <ul>
                                    <li><i class="icon-calendar"></i><?php the_date(); ?></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                 <?php } ?>
	        <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<!--slider blog area start-->

<?php 
	endif; //end if $related->have_posts()

	wp_reset_query(); 

?>