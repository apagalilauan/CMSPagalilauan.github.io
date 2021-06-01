<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dcode
 * @since 1.0
 */

if ( has_post_thumbnail() ) {
	$post_class = 'card shadow mb-30 has-thumbnail';
} else {
	$post_class = 'card shadow mb-30 no-thumbnail';
}
?>
<?php if ( 'post' === get_post_type() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
<figure>
	<?php 
    if ( has_post_thumbnail() ) {
        rdcode_post_thumbnail(); 
    } 
  ?>
	<figcaption class="card-body">
        <header class=" entry-header">
                        
		<?php 
      the_title( '<h3 class="entry-title card-title"><a class="text-dark" href="' . esc_attr( esc_url( get_permalink() ) ) . '" rel="bookmark">', '</a></h4>' );
     ?>
     	</header>
      <?php 
      /**
       * rdcode_meta_tags hook
       *
       * @hooked - rdcode_meta_tags_layout - 35
       *
       * @since 1.0.0
       */
      do_action( 'rdcode_meta_tags' );
      
      the_excerpt();
      do_action( 'rdcode_readmore' );
    ?>


  </figcaption>
      </figure>


</article><!-- #post-<?php the_ID(); ?> -->
<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
<article id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class( $post_class ); ?>>
<figure>
<figcaption class="card-body">
        <header class=" entry-header">
    <?php 
      the_title( '<h3 class="entry-title card-title"><a class="text-dark" href="' . esc_attr( esc_url( get_permalink() ) ) . '" rel="bookmark">', '</a></h3>' ); 
      ?>
      </header>

     <?php 

      the_excerpt();
      do_action( 'rdcode_readmore');
    ?>
  </figcaption>
  </figure>
</article>
<?php endif; ?>