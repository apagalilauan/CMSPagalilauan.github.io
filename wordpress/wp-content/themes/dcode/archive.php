<?php
/**
 * The template for displaying archive pages
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
        	<!-- Archive Layout -->
            <?php
                /**
                 * rdcode_page_layout hook
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
<?php
get_footer();