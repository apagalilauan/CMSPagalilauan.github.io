<?php
/**
 * Help Us section
 *
 * This is the template for the content of help_us section
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_help_us_section' ) ) :
    /**
    * Add help_us section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_help_us_section() {
        $options = mega_charity_get_theme_options();
        // Check if help_us is enabled on frontpage
        $help_us_enable = apply_filters( 'mega_charity_section_status', true, 'help_us_section_enable' );

        if ( true !== $help_us_enable ) {
            return false;
        }
        // Get help_us section details
        $section_details = array();
        $section_details = apply_filters( 'mega_charity_filter_help_us_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render help_us section now.
        mega_charity_render_help_us_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_charity_get_help_us_section_details' ) ) :
    /**
    * help_us section details.
    *
    * @since Mega Charity 1.0.0
    * @param array $input help_us section details.
    */
    function mega_charity_get_help_us_section_details( $input ) {
        $options = mega_charity_get_theme_options();

        $content = array();

         $post_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['help_us_content_post_' . $i] ) ) :
                        $post_ids[] = $options['help_us_content_post_' . $i];
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( 3 ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = mega_charity_trim_content( 30 );
                $page_post['url']       = get_the_permalink();
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
// help_us section content details.
add_filter( 'mega_charity_filter_help_us_section_details', 'mega_charity_get_help_us_section_details' );


if ( ! function_exists( 'mega_charity_render_help_us_section' ) ) :
  /**
   * Start help_us section
   *
   * @return string help_us content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_help_us_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="help-us" class="page-section">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                mega_charity_section_tooltip( 'help-us' );
                endif; ?>

                <div class="section-header">
                    <?php if( !empty( $options['help_us_subtitle'] ) ): ?>
                        <p class="section-subtitle"><?php echo esc_html( $options['help_us_subtitle'] ); ?></p>
                    <?php endif;

                    if( !empty( $options['help_us_title'] ) ): ?>
                    <h2 class="section-title"><?php echo esc_html( $options['help_us_title'] ); ?></h2>
                <?php endif; ?>
            </div>

            <div class="section-content col-3">

                <?php foreach ( $content_details as $content ): ?>

                    <article class="hentry">
                        <div class="help-wrapper">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <div class="overlay"></div>
                                <?php if( !empty( $options['help_us_btn'] ) ): ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $options['help_us_btn'] ); ?></a>
                                <?php endif; ?>
                            </div><!-- .featured-image -->

                            <div class="entry-container">

                                <div class="entry-meta">
                                    <span class="cat-links">
                                        <?php the_category( '', '', $content['id'] ) ?>
                                    </span>

                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div>

                            </div><!-- .entry-container -->
                        </div><!-- .help-wrapper -->
                    </article>

                <?php endforeach; ?>

            </div><!-- .section-content -->
        </div><!-- .wrapper -->
    </div><!-- #help-us -->
        

    <?php }
endif;