<?php
/**
 * Customizer Theme Options Fields
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

function innerblog_theme_customizers_options( $config ) {
    return wp_parse_args( array(
        'logo_image'   => INNERBLOG_THEME_DIR_URI .'/inc/admin/images/innerblog-logo.png',
        'color_accent' => '#016489',
        'color_back'   => '#FFFFFF',
    ), $config );
}
add_filter( 'kirki/config', 'innerblog_theme_customizers_options' );

InnerBlog_Customizer::add_config( 
    'inner-blog', 
        array(
        	'capability'  => 'edit_theme_options',
        	'option_type' => 'theme_mod',
) );

/** General Settings **/
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_home_lg_logo',
            'label'       => esc_html__( 'Front Page Logo Area', 'innerblog' ),
            'description' => esc_html__( 'Show or hide the Large Logo Area on the front page', 'innerblog' ),
            'section'     => 'innerblog_general_settings',
            'default'     => 'on',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_html__( 'Show', 'innerblog' ),
                'off' => esc_html__( 'Hide', 'innerblog' ),
            ),
) );

InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'typography',
            'settings'    => 'silverbird_title_typography',
            'label'       => esc_html__( 'Titles Font Family', 'innerblog' ),
            'description' => esc_html__( 'Select the font family for the posts and header titles', 'innerblog' ),
            'section'     => 'innerblog_general_settings',
            'default'     => array(
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                //'font-size'      => '14px',
                //'color'          => '#212121',
                'text-transform' => 'uppercase',
            ),
            'priority'    => 10,
            'output'      => array(
                array(
                    'element'  => 'h1, h2, h3, h4, h5, h6',
                    'property' => 'font-family',
                ),
            ),
          
) );


/** Posts Archive Layout **/
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_posts_date',
            'label'       => esc_html__( 'Post Dates', 'innerblog' ),
            'description' => esc_html__( 'Show or hide posts date', 'innerblog' ),
            'section'     => 'innerblog_posts_settings',
            'default'     => 'off',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_html__( 'Show', 'innerblog' ),
                'off' => esc_html__( 'Hide', 'innerblog' ),
            ),
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_posts_cats',
            'label'       => esc_html__( 'Post Category', 'innerblog' ),
            'description' => esc_html__( 'Show or hide posts Category', 'innerblog' ),
            'section'     => 'innerblog_posts_settings',
            'default'     => 'off',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_html__( 'Show', 'innerblog' ),
                'off' => esc_html__( 'Hide', 'innerblog' ),
            ),
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_posts_comments',
            'label'       => esc_html__( 'Comment Count', 'innerblog' ),
            'description' => esc_html__( 'Show or hide posts Comment Count', 'innerblog' ),
            'section'     => 'innerblog_posts_settings',
            'default'     => 'off',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_html__( 'Show', 'innerblog' ),
                'off' => esc_html__( 'Hide', 'innerblog' ),
            ),
) );

InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_posts_viewlayout',
            'label'       => esc_html__( 'Posts Layout', 'innerblog' ),
            'description' => esc_html__( 'Select post view layout', 'innerblog' ),
            'section'     => 'innerblog_posts_settings',
            'default'     => 'small',
            'priority'    => 10,
            'choices'     => array(
                'small'  => esc_html__( 'Small', 'innerblog' ),
                'large' => esc_html__( 'Large', 'innerblog' ),
            ),
) );

/** Single Post **/
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_single_posts_date',
            'label'       => esc_html__( 'Post Dates', 'innerblog' ),
            'description' => esc_html__( 'Show or hide posts date', 'innerblog' ),
            'section'     => 'innerblog_single_post_setting',
            'default'     => 'on',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_html__( 'Show', 'innerblog' ),
                'off' => esc_html__( 'Hide', 'innerblog' ),
            ),
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_single_posts_author',
            'label'       => esc_html__( 'Post Author', 'innerblog' ),
            'description' => esc_html__( 'Show or hide post Author', 'innerblog' ),
            'section'     => 'innerblog_single_post_setting',
            'default'     => 'on',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_html__( 'Show', 'innerblog' ),
                'off' => esc_html__( 'Hide', 'innerblog' ),
            ),
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'radio-buttonset',
            'settings'    => 'innerblog_single_posts_comments',
            'label'       => esc_html__( 'Comment Count', 'innerblog' ),
            'description' => esc_html__( 'Show or hide posts Comment Count', 'innerblog' ),
            'section'     => 'innerblog_single_post_setting',
            'default'     => 'on',
            'priority'    => 10,
            'choices'     => array(
                'on'  => esc_html__( 'Show', 'innerblog' ),
                'off' => esc_html__( 'Hide', 'innerblog' ),
            ),
) );


/** Footer **/
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_footer_copyright',
            'label'       => esc_html__( 'Copyright', 'innerblog' ),
            'description' => esc_html__( 'Enter Your Copyright info', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );

/*--- Social Media */
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_social_facebook',
            'label'       => esc_html__( 'Facebook', 'innerblog' ),
            'description' => esc_html__( 'Enter Your Facebook page/profile URL', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_social_twitter',
            'label'       => esc_html__( 'Twitter', 'innerblog' ),
            'description' => esc_html__( 'Enter Your Twitter page URL', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_social_gplus',
            'label'       => esc_html__( 'Google Plus', 'innerblog' ),
            'description' => esc_html__( 'Enter Your Google Plus profile URL', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_social_youtube',
            'label'       => esc_html__( 'YourTube', 'innerblog' ),
            'description' => esc_html__( 'Enter Your YourTube channel URL', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_social_instagram',
            'label'       => esc_html__( 'Instagram', 'innerblog' ),
            'description' => esc_html__( 'Enter Your Instagram page URL', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_social_pinterest',
            'label'       => esc_html__( 'Pinterest', 'innerblog' ),
            'description' => esc_html__( 'Enter Your Pinterest page URL', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );
InnerBlog_Customizer::add_field( 
    'inner-blog', 
        array(
            'type'        => 'text',
            'settings'    => 'innerblog_social_rssfeed',
            'label'       => esc_html__( 'RSS Feed', 'innerblog' ),
            'description' => esc_html__( 'Enter website RSS Feed page URL', 'innerblog' ),
            'section'     => 'innerblog_footer_section',
            'priority'    => 10,
) );

/** Footer End **/


function innerblog_customize_css() {

  
    ?>
    <style type="text/css">
 

    </style>

    <?php

}
add_action( 'wp_head', 'innerblog_customize_css');

