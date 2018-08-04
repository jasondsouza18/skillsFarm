<?php
/**
 * Customizer Theme Options Panel
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

InnerBlog_Customizer::add_panel( 
	'theme_options', 
		array(
    		'priority'    => 2,
    		'title'       => esc_html__( 'InnerBlog Options', 'innerblog' ),
    		'description' => esc_html__( 'This is the default Theme Option Customizer.', 'innerblog' ),
    		'icon'        => 'dashicons-layout',
) );

InnerBlog_Customizer::add_panel( 
	'colors', 
		array(
    		'priority'    => 2,
    		'title'       => esc_html__( 'Colors', 'innerblog' ),
    		'description' => esc_html__( 'This panel provides all the options for the Theme Colors.', 'innerblog' ),
    		'icon'        => 'dashicons-admin-appearance',
) );


?>