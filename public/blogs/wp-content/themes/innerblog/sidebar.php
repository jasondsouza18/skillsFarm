<?php
/**
 * The sidebar containing the main widget area
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="col-md-4 col-sm-4 col-xs-12">
        
        <?php dynamic_sidebar( 'sidebar-1' ); ?>

     </div> 
</aside><!-- #secondary -->
