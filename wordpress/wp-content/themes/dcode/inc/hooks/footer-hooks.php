<?php
/**
 * Custom hooks functions are define about footer section.
 *
 * @package Dcode
 * @since 1.0.0
 */

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_footer_start' ) ) :

	/**
	 * Footer start
	 *
	 * @since 1.0.0
	 */

	function rdcode_footer_start() {
		echo '<footer class="footer-section"><div class="footer-inner"><div class="container pt-80 pb-60">';
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_footer_widget_section' ) ) :

	/**
	 * Footer widget section
	 *
	 * @since 1.0.0
	 */

	function rdcode_footer_widget_section() {
		echo '<div class="row">';
		get_sidebar( 'footer' );
		echo '</div>';
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_footer_copyright' ) ) :

	/**
	 * Footer end
	 *
	 * @since 1.0.0
	 */

	function rdcode_footer_copyright() {
		echo '<div class="border-top text-center border-dark py-2">
               <p class="mb-0 copy-right-credit">'.esc_html( get_theme_mod( 'rdcode_copyright_text', 'Copyright © 2020 | All Rights Reserved.' ) ).'<p>
            </div>';
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_footer_end' ) ) :

	/**
	 * Footer end
	 *
	 * @since 1.0.0
	 */

	function rdcode_footer_end() {
		echo '</div></div></footer><!-- #end -->';
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Managed functions for footer hook
 *
 * @since 1.0.0
 */
add_action( 'rdcode_footer', 'rdcode_footer_start', 5 );
add_action( 'rdcode_footer', 'rdcode_footer_widget_section', 10 );
add_action( 'rdcode_footer', 'rdcode_footer_copyright', 15 );
add_action( 'rdcode_footer', 'rdcode_footer_end', 20 );

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_footer_scroll_to_top_button' ) ) :

	/**
	 * Footer Scroll to top button
	 *
	 * @since 1.0.0
	 */

	function rdcode_footer_scroll_to_top_button() {
		$rdcode_scroll_to_top = get_theme_mod( 'rdcode_scroll_to_top', 'show' );
		if ( ! empty ( $rdcode_scroll_to_top ) && $rdcode_scroll_to_top == 'show' ) {
			echo '<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>';
		}
	}

endif;
add_action( 'rdcode_footer_scroll_to_top', 'rdcode_footer_scroll_to_top_button', 5 );

/*-----------------------------------------------------------------------------------------------------------------------*/