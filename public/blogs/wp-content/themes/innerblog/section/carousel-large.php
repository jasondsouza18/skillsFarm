<?php 
/**
 * Template part for displaying large post carousel
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
<div class="slider-carsoule slider-dotted">
                
    <?php while( $slider->have_posts() ) {
        $slider->the_post(); ?>

        <!--Slider animate text area start-->
            <div class="slider deep-gray-bg slider-img-bg-6 bg-fixed black-overlay ptb-200" style="background: url(<?php the_post_thumbnail_url('innerblog-large-carousel') ; ?>);">
                <div class="container">

                    <div class="slider-text text-center slider-style-2">
                        <?php the_title( '<h1 class="heading-sub-title cd-headline clip is-full-width"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h1>' );?>

                        <p><?php the_excerpt(); ?></p>

                        <div class="slider-blog sb-2">
                            <div class="category-list">
                                <?php innerblog_category_list(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Slider animate text area end-->

        <?php } ?>

</div>

<!--slider blog area start-->

<?php } ?>