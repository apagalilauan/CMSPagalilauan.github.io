<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
        	<div class="col-lg-8 col-sm-6 blog_container">
        		<div class="row">
        			<?php
                        if ( have_posts() ) : 
                            
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', 'search' );

                            endwhile;

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; 
                    ?>
        		</div>
        		<?php do_action( 'rdcode_post_pagination' ); ?>
        	</div>
        	<?php
                get_sidebar();
            ?>
        </div>
	</div>
</section>
<?php get_footer(); ?>