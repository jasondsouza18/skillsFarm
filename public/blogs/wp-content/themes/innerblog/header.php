<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="wrapper">
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="wrapper">
		<!-- header start -->
		<header class="intelligent-header">
			<div class="header-area">
				<div class="container">
					<div class="row">

						<div class="col-md-3 col-xs-12">
							<?php if( has_custom_logo() ){ ?>
							<?php the_custom_logo(); ?>
							<?php } else { ?>
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span>.</span></a>
							</div>
							<?php } ?>
						</div>

						<div class="col-md-9 col-xs-12">
							<div class="main-menu text-right main-menu-shadow">
								<nav>
									<?php
										wp_nav_menu( array(
											'theme_location' => 'main-menu',
											'menu_class'     => 'menu',
										) );
									?>	
								</nav>
							</div>
							<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<div class="free-space"></div>
		<!-- header end -->
		
		<?php if ( is_home() || is_front_page() ) : ?>
		<?php if( get_theme_mod('innerblog_home_lg_logo', 'on' ) == 'on' ){ ?>
			<div class="header-top-area">
			    <div class="container">
			        <div class="row">
			            <div class="col-xs-12">
			                <div class="site-title text-center">
			                    <?php if( has_custom_logo() ){ ?>
									<?php the_custom_logo(); ?>
								<?php } else { ?>
								<div class="logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span>.</span></a>
								</div>
								<?php } ?>
	                            <?php $innerblog_description = get_bloginfo( 'description', 'display' );
	                                if ( $innerblog_description || is_customize_preview() ) :
	                                    ?>
			                    <p class="site-description">
			                        <?php echo $innerblog_description; /* WPCS: xss ok. */ ?>
			                    </p>
	                            <?php endif; ?>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		<?php } ?>
		<?php endif; ?>
