<?php
/**
 * Template part for displaying results in search pages
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-block'); ?>>
    <!--single-blog Default start-->
    <div class="col-md-6 col-sm-12 col-xs-12 post-metonary-item">
        <div class="single-blog ">
             <?php if ( has_post_thumbnail() ) { ?>
                <div class="blog-img">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <img src="<?php the_post_thumbnail_url('innerblog-medium'); ?>" alt="<?php the_title_attribute();?>">
                    </a>
                </div>
            <?php } ?>
            <div class="blog-content">
                <div class="blog-title">
                    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );?>
                </div>
                <?php if ( 'post' === get_post_type() ) : ?>
                <?php if(get_theme_mod('innerblog_posts_cats', 'on' ) == 'on' ){ ?>
                    <div class="post-category">
                        <?php innerblog_category_list(); ?>
                    </div>
                <?php } ?>
                <?php endif; ?>
                <div class="blog-text">
                    <?php the_excerpt(); ?>
                </div>
                <?php if ( 'post' === get_post_type() ) : ?>
                <?php if( get_theme_mod('innerblog_posts_date', 'on' ) == 'on' || get_theme_mod('innerblog_posts_comments', 'on' ) == 'on' ){ ?>
                    <div class="post-meta">
                        <?php if(get_theme_mod('innerblog_posts_date', 'on' ) == 'on' ){ ?>
                            <i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo esc_attr( get_the_date() ) ; ?>
                        <?php } ?>
                        <?php if(get_theme_mod('innerblog_posts_comments', 'on' ) == 'on' ){ ?>
                            <span class="comment-count alignright"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php comments_popup_link( '0 Comment', '1 Comment', '% Comments', 'comments-link', 'Comments are off'); ?></span>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--single-blog Default end-->

</article><!-- #post-<?php the_ID(); ?> -->
