<?php 
/**
 * Template part for displaying post carousel
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

    global $post;
    //Query slide Posts
     $args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        //'posts_per_page'        => absint($num),
        'ignore_sticky_posts'   => true,
        //'meta_key'              => 'sb_homepage_slider',
        //'meta_value'            => '1',
        //'orderby'               => $orderby,
    );

    $slider = new WP_Query( $args );

if( $slider->have_posts() ) {
?>

		 <!--slider blog area start-->
        <div class="slider-blog-area">
            <div class="slider-blog active-slider-blog full-carsoule blog-mar">
                
            <?php while( $slider->have_posts() ) {
                            $slider->the_post(); ?>
                <div class="single-blog ">
                    <div class="blog-img">
                        <?php if( has_post_thumbnail() ){?>
                            <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php the_post_thumbnail_url('innerblog-medium') ; ?>" alt="<?php the_title_attribute();?>"></a>
                        <?php } else { ?>
                            <img src="<?php echo esc_url( INNERBLOG_THEME_DIR_URI ); ?>/assets/images/5.jpg" alt="<?php the_title_attribute();?>">
                        <?php } ?>
                    </div>
                    <div class="blog-content">
                        <div class="blog-title">
                            <?php   the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );?>
                        </div>
                        <div class="category-list">
                            <?php innerblog_category_list(); ?>
                        </div>
                    </div>
                </div>

        <?php } ?>

            </div>
        </div>
	    <!--slider blog area start-->

<?php } ?>