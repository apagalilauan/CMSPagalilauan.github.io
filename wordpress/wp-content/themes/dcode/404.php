<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Dcode
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>
<section class="page_404">
    <div class="container">
        <div class=" justify-content-center content-center text-center">
			<div class="error-box">
             	<h1><?php esc_html_e( '404', 'dcode' ); ?></h1>
             	<span><?php esc_html_e( 'OOOPS !', 'dcode' ); ?></span>
             	<p class="my-3"><?php esc_html_e( 'Something Went Wrong. Go Back Home', 'dcode' ); ?></p>
             	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn  btn-xs btn-primary"><?php esc_html_e( 'Back To Home', 'dcode' ); ?></a>
	        </div>
	    </div>  
    </div>
 </section>
<?php get_footer(); ?>