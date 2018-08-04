<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @link http://www.icynets.com
 *
 * @package InnerBlog
 */

if ( ! function_exists( 'innerblog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function innerblog_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'innerblog' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'innerblog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function innerblog_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'innerblog' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;


function innerblog_category_list() {
	// Hide category for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ' , ', 'innerblog' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat">' . esc_html__( ' %1$s', 'innerblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
}


if ( ! function_exists( 'innerblog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function innerblog_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'innerblog' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'innerblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'innerblog' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'innerblog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'innerblog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'innerblog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

function innerblog_footer(){ ?>
	    <!-- footer start -->
        <footer class="footer-bg gray-bg ptb-50 text-left text-center footer-style">
            <div class="footer-area">
                <div class="container">
                    <div class="footer-info">
                        
                        <?php if( has_custom_logo() ){ ?>
                            <?php the_custom_logo(); ?>
                        <?php } else { ?>
                            <div class="footer-logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span>.</span></a>
                            </div>
                        <?php } ?>

                        <?php do_action( 'innerblog_social_follow' ) ?>

                    </div>

                    <div class="footer-bottom">
                        <div class="copyright">
                            <?php if( get_theme_mod('innerblog_footer_copyright','') != '' ){ printf( esc_attr__( '%s ', 'innerblog' ), get_theme_mod('innerblog_footer_copyright') ); } else { ?>
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'innerblog' ) ); ?>" rel="nofollow" target="_blank">
                                <?php
                                    /* translators: %s: CMS name, i.e. WordPress. */
                                    printf( esc_html__( 'Proudly powered by %s', 'innerblog' ), 'WordPress' );
                                ?>          
                            </a>
                            <?php } ?>
                            |
                            <?php
                                /* translators: 1: Theme name, 2: Theme author. */
                                printf( esc_html__( 'Theme: %1$s by %2$s.', 'innerblog' ), '<a href="http://www.icynets.com/innerblog-wordpress-blogging-theme/" target="_blank">InnerBlog</a>', 'icyNETS' );
                            ?>
                        </div>
                    </div>	
                </div>
            </div>		
        </footer>
        <!-- footer end -->
    </div> <!-- wrapper end //begin found in header.php-->

<?php wp_footer(); ?>

</body>
</html>
<?php 
}


if ( ! function_exists( 'innerblog_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function innerblog_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
