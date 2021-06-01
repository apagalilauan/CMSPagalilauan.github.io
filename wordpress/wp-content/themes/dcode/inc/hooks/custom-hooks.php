<?php
/**
 * Custom hooks functions are define.
 *
 * @package Dcode
 * @since 1.0.0
 */

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Site preloader.
 *
 */
if( ! function_exists( 'rdcode_preloader' ) ) :

	/**
	 * Fav icon
	 *
	 * @since 1.0.0
	 */
	function rdcode_preloader() {
		?>
		<!--preloader-->
	    <div class="preloader" id="preloader">
	        <div class="preloader_inner">
			<div class="loader">
				<div class="square"></div>
				<div class="path">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
			<p class="text-load">Loading</p>
			</div>
	        </div>
	    </div>
	    <?php
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Post readmore text.
 *
 */
if( ! function_exists( 'rdcode_readmore_txt' ) ) :

	function rdcode_readmore_txt() {
		if ( ! empty ( get_theme_mod( 'rdcode_archive_read_more_text', 'Readmore' ) ) ) {
			$readmore_txt = get_theme_mod( 'rdcode_archive_read_more_text', 'Readmore' );
		} else {
			$readmore_txt = '';
		}
		?>
		<!--readmore button-->
		<a href="<?php the_permalink(); ?>" class="btn btn-xs btn-primary">
			<?php 
				echo esc_html ( $readmore_txt );
			?>
		</a>
		<?php
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Post pagination layout.
 *
 */
if( ! function_exists( 'rdcode_post_pagination_call' ) ) :

	function rdcode_post_pagination_call() {
		?>
		<!--Post pagination-->
		<div class="row">
            <?php if ( get_theme_mod( 'rdcode_radio_post_pagination', 'pagination' ) == 'default' ) {
                    $class = 'default';
                } else {
                    $class = '';
                }
            ?>
            <div class="col-md-12 pagination-outer <?php echo esc_attr( $class ); ?>">
                <?php
                    if ( get_theme_mod( 'rdcode_radio_post_pagination', 'pagination' ) == 'default' ) {
                        the_posts_navigation();
                    } elseif ( get_theme_mod( 'rdcode_radio_post_pagination', 'pagination' ) == 'pagination' ) {
                        echo wp_kses_post( the_posts_pagination( array( 'mid_size' => 2) ) );
					}
                ?>
            </div>
        </div>
		<?php
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Page side bar layout.
 *
 */
if( ! function_exists( 'rdcode_page_sidebar_layout' ) ) :

	function rdcode_page_sidebar_layout() {

		if ( get_theme_mod( 'rdcode_page_sidebar_layout', 'right_sidebar' ) == 'right_sidebar' ) {
			?>
				<main class="col-lg-8 col-sm-12 blog_container">
	    			<?php
	                    while ( have_posts() ) : the_post();
	                        
	                        get_template_part( 'template-parts/content', 'page' );

	                        // If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

	                    endwhile; // End of the loop.
	                ?>
	        	</main>
			<?php
			get_sidebar();
		} elseif ( get_theme_mod( 'rdcode_page_sidebar_layout', 'right_sidebar' ) == 'left_sidebar' ) {
			get_sidebar();
			?>
				<main class="col-lg-8 col-sm-12 blog_container">
	    			<?php
	                    while ( have_posts() ) : the_post();
	                        
	                        get_template_part( 'template-parts/content', 'page' );

	                        // If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

	                    endwhile; // End of the loop.
	                ?>
	        	</main>
			<?php
		} else {
			?>
				<div class="col-lg-12 col-sm-12">
	    			<?php
	                    while ( have_posts() ) : the_post();
	                        
	                        get_template_part( 'template-parts/content', 'page' );

	                        // If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

	                    endwhile; // End of the loop.
	                ?>
	        	</div>
			<?php
		}
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Post side bar layout.
 *
 */
if( ! function_exists( 'rdcode_blog_sidebar_layout' ) ) :

	function rdcode_blog_sidebar_layout() {

		if ( get_theme_mod( 'rdcode_blog_sidebar_layout', 'right_sidebar' ) == 'right_sidebar' ) {
			?>
				<div class="col-lg-8 col-sm-6 blog_container">
	        		<div class="row">
	                    <?php
	                    if ( have_posts() ) :

	                        /* Start the Loop */
	                        while ( have_posts() ) : the_post();
	                        
	                            get_template_part( 'template-parts/content', get_post_format() );

	                        endwhile;

	                    else :

	                        get_template_part( 'template-parts/content', 'none' );

	                    endif; ?>
	                </div>
	                <?php do_action( 'rdcode_post_pagination' ); ?>
	        	</div>
			<?php
			get_sidebar();
		} elseif ( get_theme_mod( 'rdcode_blog_sidebar_layout', 'right_sidebar' ) == 'left_sidebar' ) {
			get_sidebar();
			?>
				<div class="col-lg-8 col-sm-6 blog_container">
	        		<div class="row">
	                    <?php
	                    if ( have_posts() ) :

	                        /* Start the Loop */
	                        while ( have_posts() ) : the_post();
	                        
	                            get_template_part( 'template-parts/content', get_post_format() );

	                        endwhile;

	                    else :

	                        get_template_part( 'template-parts/content', 'none' );

	                    endif; ?>
	                </div>
	                <?php do_action( 'rdcode_post_pagination' ); ?>
	        	</div>
			<?php
		} else {
			?>
				<div class="col-lg-12 col-sm-12">
	        		<div class="row">
	                    <?php
	                    if ( have_posts() ) :

	                        /* Start the Loop */
	                        while ( have_posts() ) : the_post();
	                        
	                            get_template_part( 'template-parts/content', get_post_format() );

	                        endwhile;

	                    else :

	                        get_template_part( 'template-parts/content', 'none' );

	                    endif; ?>
	                </div>
	                <?php do_action( 'rdcode_post_pagination' ); ?>
	        	</div>
			<?php
		}
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Single Post side bar layout.
 *
 */
if( ! function_exists( 'rdcode_single_sidebar_layout' ) ) :

	function rdcode_single_sidebar_layout() {

		if ( get_theme_mod( 'rdcode_single_sidebar_layout', 'right_sidebar' ) == 'right_sidebar' ) {
			?>
				<main class="col-lg-8 col-sm-12 blog_container">
	            	<?php
	                  	while ( have_posts() ) :
	                      	the_post();

	                      	get_template_part( 'template-parts/content', 'single' );

	                      	the_post_navigation();

	                      	// If comments are open or we have at least one comment, load up the comment template.
	                      	if ( comments_open() || get_comments_number() ) :
	                          	comments_template();
	                      	endif;

	                  	endwhile; // End of the loop.
	              	?>
	          	</main>
			<?php
			get_sidebar();
		} elseif ( get_theme_mod( 'rdcode_single_sidebar_layout', 'right_sidebar' ) == 'left_sidebar' ) {
			get_sidebar();
			?>
				<main class="col-lg-8 col-sm-12 blog_container">
	            	<?php
	                  	while ( have_posts() ) :
	                      	the_post();

	                      	get_template_part( 'template-parts/content', 'single' );

	                      	the_post_navigation();

	                      	// If comments are open or we have at least one comment, load up the comment template.
	                      	if ( comments_open() || get_comments_number() ) :
	                          	comments_template();
	                      	endif;

	                  	endwhile; // End of the loop.
	              	?>
	          	</main>
			<?php
		} else {
			?>
				<div class="col-lg-12 col-sm-12">
	            	<?php
	                  	while ( have_posts() ) :
	                      	the_post();

	                      	get_template_part( 'template-parts/content', 'single' );

	                      	the_post_navigation();

	                      	// If comments are open or we have at least one comment, load up the comment template.
	                      	if ( comments_open() || get_comments_number() ) :
	                          	comments_template();
	                      	endif;

	                  	endwhile; // End of the loop.
	              	?>
	          	</div>
			<?php
		}
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Meta Tags.
 *
 */
if( ! function_exists( 'rdcode_meta_tags_layout' ) ) :

	/**
	 * Fav icon
	 *
	 * @since 1.0.0
	 */
	function rdcode_meta_tags_layout() {
		$rdcode_show_author_name   = get_theme_mod( 'rdcode_show_author_name', 'show' );
		$rdcode_show_post_date     = get_theme_mod( 'rdcode_show_post_date', 'show' );
		$rdcode_show_comment_count = get_theme_mod( 'rdcode_show_comment_count', 'show' );

		if ( ( ! empty ( $rdcode_show_author_name ) && $rdcode_show_author_name == 'show' ) || ( ! empty ( $rdcode_show_post_date ) && $rdcode_show_post_date == 'show' ) || ( ! empty ( $rdcode_show_comment_count ) && $rdcode_show_comment_count == 'show' ) ) {
		?>
		<ul class="meta-tag">
			<?php if ( ! empty ( $rdcode_show_author_name ) && $rdcode_show_author_name == 'show' ) { ?>
	        <li><?php rdcode_posted_by() ?></li>
	    	<?php } if ( ! empty ( $rdcode_show_post_date ) && $rdcode_show_post_date == 'show' ) { ?>
	        <li><?php rdcode_posted_on(); ?></li>
	        <?php } if ( ! empty ( $rdcode_show_comment_count ) && $rdcode_show_comment_count == 'show' ) { ?>
	        <li><?php rdcode_comments_count(); ?></li>
	    	<?php } ?>
	    </ul>
	    <?php
		}
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Managed functions for Custom Hooks
 *
 * @since 1.0.0
 */
add_action( 'rdcode_preloader', 'rdcode_preloader', 5 );
add_action( 'rdcode_readmore', 'rdcode_readmore_txt', 10 );
add_action( 'rdcode_post_pagination', 'rdcode_post_pagination_call', 15 );
add_action( 'rdcode_page_layout', 'rdcode_page_sidebar_layout', 20 );
add_action( 'rdcode_post_layout', 'rdcode_blog_sidebar_layout', 25 );
add_action( 'rdcode_single_layout', 'rdcode_single_sidebar_layout', 30 );
add_action( 'rdcode_meta_tags', 'rdcode_meta_tags_layout', 35 );
add_action( 'rdcode_', 'rdcode_meta_tags_layout', 35 );