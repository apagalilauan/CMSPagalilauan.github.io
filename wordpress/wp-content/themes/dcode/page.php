<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Dcode
 * @since 1.0
 */

get_header();
?>
<section class="section pb-50">
  	<div class="container">
    	<div class="row">
        	<!-- Page Layout -->
		    <?php
                /**
                 * rdcode_page_layout hook
                 *
                 * @hooked - rdcode_page_sidebar_layout - 20
                 *
                 * @since 1.0.0
                 */
	            do_action( 'rdcode_page_layout' );
	        ?>
    	</div>
	</div>
</section>
<?php get_footer(); ?>