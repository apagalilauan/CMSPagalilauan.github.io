<?php
$rdcode_blog_excerpt_hide  = get_theme_mod( 'rdcode_blog_excerpt_hide', 'show' );
$rdcode_blog_readmore_hide = get_theme_mod( 'rdcode_blog_readmore_hide', 'show' );
$rdcode_blog_layout        = get_theme_mod( 'rdcode_blog_layout', 'grid' );
if ( $rdcode_blog_layout == 'grid' ) {
?>
<!--Blog-Section-->
<section class="section">
    <div class="container">
      <div class="row">
       	<div class="col-12 text-center heading-div">
            <h2 class="section-title">
                <?php echo esc_html( get_theme_mod( 'rdcode_blog_title', 'Latest News' ) ); ?>
            </h2>
            <p><?php echo esc_html( get_theme_mod( 'rdcode_blog_desc' ) ); ?></p>
        </div>
       	<?php
       		/**
  				 * Setup query to show the 'Posts' post type with ‘8’ posts.
  				 * Output the title with an excerpt.
  				 */
         		$count = get_theme_mod( 'rdcode_no_of_blogs', '3' );
         		if ( empty ( $count ) ) {
         			$count = -1;
         		}
         		$args  = array(  
  		        'post_type'           => 'post',
  		        'post_status'         => 'publish',
  		        'posts_per_page'      => $count,
  		        'ignore_sticky_posts' => 1 
  			    );

	      $loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
       	?>
       	<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            	<article class="card shadow hover-shadow">
                <figure>
            		<?php 
            			if ( has_post_thumbnail() ) {
  					        echo '<a href="'.esc_attr( esc_url( get_the_permalink() ) ).'" rel="lightbox">'; 
  					            the_post_thumbnail( 'rdcode-blog-thumb', array( 'class' => 'rounded card-img-top' ) );
  					        echo '</a>';
  				        }
            		?>
               	<figcaption class="card-body">
                  	<header class="card-title entry-header">
                    <h3 class="entry-title">
                  		<a href="<?php echo esc_attr( esc_url( get_the_permalink() ) ); ?>"><?php the_title(); ?></a>
                    </h3>
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

                    if ( ! empty( $rdcode_blog_excerpt_hide ) && $rdcode_blog_excerpt_hide == 'show' ) { ?>
                  	<p class="cars-text"><?php the_excerpt(); ?></p>
                  	<?php } if ( ! empty( $rdcode_blog_readmore_hide ) && $rdcode_blog_readmore_hide == 'show' ) { ?>
                  	<a href="<?php echo esc_attr( esc_url( get_the_permalink() ) ); ?>" class="btn btn-xs btn-primary"><?php echo esc_html( get_theme_mod( 'rdcode_archive_read_more_text', 'Read More' ) ); ?></a>
                  	<?php } ?>
               	</figcaption>
                 </figure>
            	</article>
        </div>
       	<?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
</section>
<!--End-Blog-Section-->
<?php } else { ?>
<section class="section">
  <div class="container">
    <div class="col-12 text-center heading-div">
        <h2 class="section-title">
            <?php echo esc_html( get_theme_mod( 'rdcode_blog_title', 'Latest News' ) ); ?>
        </h2>
        <p><?php echo esc_html( get_theme_mod( 'rdcode_blog_desc' ) ); ?></p>
    </div>
    <div class="mx-auto blog-slider slider">
       <?php
          /**
           * Setup query to show the 'Posts' post type with ‘8’ posts.
           * Output the title with an excerpt.
           */
            $count = get_theme_mod( 'rdcode_no_of_blogs', '3' );
            if ( empty ( $count ) ) {
              $count = -1;
            }
            $args  = array(  
              'post_type'           => 'post',
              'post_status'         => 'publish',
              'posts_per_page'      => $count,
              'ignore_sticky_posts' => 1 
            );

        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <!-- slider-item -->
        <div class="blog-content">
          <article class="card shadow hover-shadow">
             <?php 
                if ( has_post_thumbnail() ) {
                  echo '<a href="'.esc_attr( esc_url( get_the_permalink() ) ).'" rel="lightbox">'; 
                      the_post_thumbnail( 'rdcode-blog-thumb', array( 'class' => 'rounded card-img-top' ) );
                  echo '</a>';
                }
              ?>
             <div class="card-body">
                <h4 class="card-title">
                  <a href="<?php echo esc_attr( esc_url( get_the_permalink() ) ); ?>"><?php the_title(); ?></a>
                </h4>
                <?php 
                  /**
                   * rdcode_meta_tags hook
                   *
                   * @hooked - rdcode_meta_tags_layout - 35
                   *
                   * @since 1.0.0
                   */
                  do_action( 'rdcode_meta_tags' );

                  if ( ! empty( $rdcode_blog_excerpt_hide ) && $rdcode_blog_excerpt_hide == 'show' ) { ?>
                  <p class="cars-text"><?php the_excerpt(); ?></p>
                  <?php } if ( ! empty( $rdcode_blog_readmore_hide ) && $rdcode_blog_readmore_hide == 'show' ) { ?>
                  <a href="<?php echo esc_attr( esc_url( get_the_permalink() ) ); ?>" class="btn btn-xs btn-primary"><?php echo esc_html( get_theme_mod( 'rdcode_archive_read_more_text', 'Read More' ) ); ?></a>
                <?php } ?>
             </div>
          </article>
        </div>
        <!-- slider-item -->
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php }