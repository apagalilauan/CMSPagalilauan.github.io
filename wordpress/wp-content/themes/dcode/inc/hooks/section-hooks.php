<?php
/**
 * Homepage sections hooks functions are define.
 *
 * @package Dcode
 * @since 1.0.4
 */

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Site preloader.
 *
 */
if( ! function_exists( 'rdcode_home_blog' ) ) :

	/**
	 * Fav icon
	 *
	 * @since 1.0.0
	 */
	function rdcode_home_blog() {
		get_template_part( 'section/blog', 'section' );
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Managed functions for Homepage Section Hooks
 *
 * @since 1.0.0
 */
add_action( 'rdcode_blog_sec', 'rdcode_home_blog', 5 );