<?php
/**
 * Customizer Theme Options Sections
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

InnerBlog_Customizer::add_section( 
    'innerblog_general_settings', 
        array(
            'title'          => esc_html__( 'General Settings', 'innerblog' ),
            'panel'          => 'theme_options', // Not typically needed.
            'priority'       => 4,
            'icon'           => 'dashicons-admin-tools',
    
) );

InnerBlog_Customizer::add_section( 
    'innerblog_main_colors', 
        array(
            'title'          => esc_html__( 'Default Colors', 'innerblog' ),
            'panel'          => 'colors', // Not typically needed.
            'priority'       => 6,
            'icon'           => 'dashicons-laptop',
    
) );

InnerBlog_Customizer::add_section( 
    'innerblog_posts_settings', 
        array(
            'title'          => esc_html__( 'Posts & Archive Settings', 'innerblog' ),
            'panel'          => 'theme_options', // Not typically needed.
            'priority'       => 4,
            'icon'           => 'dashicons-admin-comments',
    
) );
/* Single */
InnerBlog_Customizer::add_section( 
    'innerblog_single_post_setting', 
        array(
            'title'          => esc_html__( 'Single Post View', 'innerblog' ),
            'panel'          => 'theme_options', // Not typically needed.
            'priority'       => 5,
            'icon'           => 'dashicons-admin-page',
    
) );


/* Foooter */
InnerBlog_Customizer::add_section( 
    'innerblog_footer_section', 
        array(
            'title'          => esc_html__( 'Footer', 'innerblog' ),
            'panel'          => 'theme_options', // Not typically needed.
            'priority'       => 6,
            'icon'           => 'dashicons-screenoptions',
    
) );
