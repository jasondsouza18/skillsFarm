<?php
/**
 * Template part for displaying posts
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

?>

<!-- blog content start -->
<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>

		<?php innerblog_post_thumbnail(); ?>

	<div class="post-content">    
		<div class="blog-title">
			<?php   the_title( '<h3 class="entry-title">', '</h3>' );?>
		</div>
		<?php if( get_theme_mod('innerblog_single_posts_date', 'on' ) == 'on' || get_theme_mod('innerblog_single_posts_author', 'on' ) == 'on' || get_theme_mod('innerblog_single_posts_comments', 'on' ) == 'on' ){ ?>
		<div class="post-category">
			
			<ul>
				<li>
					<?php if(get_theme_mod('innerblog_single_posts_date', 'on' ) == 'on' ){ ?>
                	<i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo esc_attr( get_the_date() ) ; ?>
		            <?php } ?>
		        </li>

                <li>
                	<?php if(get_theme_mod('innerblog_single_posts_author', 'on' ) == 'on' ){ ?>
                	<i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author(); ?>
                	<?php } ?>
                </li>

                <li>
                	<?php if(get_theme_mod('innerblog_single_posts_comments', 'on' ) == 'on' ){ ?>
                            <span class="comment-count"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php comments_popup_link( '0 Comment', '1 Comment', '% Comments', 'comments-link', 'Comments are off'); ?></span>
                    <?php } ?>
                </li>
			</ul>
		</div>
		<?php } ?>
        <div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'innerblog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'innerblog' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<div class="category-list">
            <?php innerblog_category_list(); ?>
        </div>
	</div>    

</article>
