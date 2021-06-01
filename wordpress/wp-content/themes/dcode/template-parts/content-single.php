<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dcode
 * @since 1.0.0
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-content content mb-60' ); ?>>
  	<?php 
	    if ( has_post_thumbnail() ) {
	        rdcode_post_thumbnail(); 
	    } 
	  ?>
  	<?php 
		the_title( '<h4 class="font-tertiary mb-4">', '</h4>' );
		
        /**
        * rdcode_meta_tags hook
        *
        * @hooked - rdcode_meta_tags_layout - 35
        *
        * @since 1.0.0
        */
        do_action( 'rdcode_meta_tags' );

    ?>
    <div class="entry-taxonomy meta-tag mt-2">
        <?php rdcode_entry_taxonomy(); ?>
    </div><!-- .entry-taxonomy -->
    <div class="entry-content">
        <?php
            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dcode' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dcode' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->
</div>