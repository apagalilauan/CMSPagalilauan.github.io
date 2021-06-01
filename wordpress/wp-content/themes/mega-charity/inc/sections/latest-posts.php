<?php
/**
 * Latest Posts section
 *
 * This is the template for the content of latest_posts section
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_latest_posts_section' ) ) :
    /**
    * Add latest_posts section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_latest_posts_section() {
        $options = mega_charity_get_theme_options();
        // Check if latest_posts is enabled on frontpage
        $latest_posts_enable = apply_filters( 'mega_charity_section_status', true, 'latest_posts_section_enable' );

        if ( true !== $latest_posts_enable ) {
            return false;
        }
        // Get latest_posts section details
        $section_details = array();
        $section_details = apply_filters( 'mega_charity_filter_latest_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render latest_posts section now.
        mega_charity_render_latest_posts_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_charity_get_latest_posts_section_details' ) ) :
    /**
    * latest_posts section details.
    *
    * @since Mega Charity 1.0.0
    * @param array $input latest_posts section details.
    */
    function mega_charity_get_latest_posts_section_details( $input ) {
        $options = mega_charity_get_theme_options();

        // Content type.
        $latest_posts_content_type  = get_theme_mod( 'mega_charity_theme_options_latest_posts_content_type', 'category' );
        $content = array();
        switch ( $latest_posts_content_type ) {

            case 'post':
                $post_ids = array();
                $author = array();

                for ( $i = 1; $i <= 4; $i++ ) {
                    if ( ! empty( $options['latest_posts_content_post_' . $i] ) ) :
                        $post_ids[] = $options['latest_posts_content_post_' . $i];
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( 4 ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['latest_posts_content_category'] ) ? $options['latest_posts_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( 4 ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;
            
            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = mega_charity_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
   
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// latest_posts section content details.
add_filter( 'mega_charity_filter_latest_posts_section_details', 'mega_charity_get_latest_posts_section_details' );


if ( ! function_exists( 'mega_charity_render_latest_posts_section' ) ) :
  /**
   * Start latest_posts section
   *
   * @return string latest_posts content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_latest_posts_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="latest" class="page-section relative no-padding-top">
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                    mega_charity_section_tooltip( 'latest' );
                    endif; ?>
                <?php if( !empty( $options['latest_posts_title'] ) ): ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['latest_posts_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                    <div class="section-content col-2">
                        <div class="archive-blog-wrapper clear">
                           
                           <?php foreach ( $content_details as $content ) : ?>

                            <article class="hentry">
                                <div class="post-wrapper">
                                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                    </div><!-- .featured-image -->

                                    <div class="entry-container">

                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->

                                         <div class="entry-meta">
                                           <?php echo mega_charity_author_meta( $content['id'] ); ?>

                                            <?php mega_charity_posted_on( $content['id'] ); ?>
                                        </div><!-- .entry-meta -->
                                    </div><!-- .entry-container -->
                                </div><!-- .post-wrapper -->
                            </article>

                            <?php endforeach; ?>

                        </div><!-- .archive-blog-wrapper -->
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- .recent -->

    <?php }
endif;