<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dcode
 * @since 1.0
 */

get_header();
?>
<!-- blog -->
<section class="section pb-50">
  	<div class="container">
    	<div class="row">
            <!-- Post Layout -->
            <?php
                /**
                 * rdcode_post_layout hook
                 *
                 * @hooked - rdcode_blog_sidebar_layout - 20
                 *
                 * @since 1.0.0
                 */
                do_action( 'rdcode_post_layout' );
            ?>
    	</div>
	</div>
</section>
<?php get_footer(); ?>