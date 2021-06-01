<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_about_section() {
    	$options = mega_charity_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'mega_charity_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'mega_charity_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        mega_charity_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_charity_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Mega Charity 1.0.0
    * @param array $input about section details.
    */
    function mega_charity_get_about_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();
        $post_id = ! empty( $options['about_content_post'] ) ? $options['about_content_post'] : '';
        $args = array(
            'post_type'         => 'post',
            'p'                 => $post_id,
            'posts_per_page'    => 1,
            );


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = mega_charity_trim_content( 35 );
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// about section content details.
add_filter( 'mega_charity_filter_about_section_details', 'mega_charity_get_about_section_details' );


if ( ! function_exists( 'mega_charity_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_about_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        $about_sub_title = ! empty( $options['about_sub_title'] ) ? $options['about_sub_title'] : '';
        $about_btn_title = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 
        ?>
        <?php

        foreach ( $content_details as $content ) : ?>

            <div id="about-us" class="page-section col-2">
                <div class="wrapper">
                <?php if ( is_customize_preview()):
                mega_charity_section_tooltip( 'about-us' );
                endif; ?>
                    <article class="hentry">
                        <?php if( !empty( $options['about_image_1'] ) ): ?>
                            <div class="featured-wrapper">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $options['about_image_1'] ); ?>');">
                                </div><!-- .featured-image -->
                            </div>
                        <?php endif; 

                        if( !empty( $options['about_image_2'] ) ):
                            ?>

                        <div class="featured-wrapper">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $options['about_image_2'] ); ?>');">
                            </div><!-- .featured-image -->
                        </div>

                    <?php endif; ?>

                </article>

                <article class="hentry">
                    <div class="entry-container">
                        <?php if( !empty( $content['title'] ) ): ?>
                            <div class="section-header">
                                <h2 class="section-title"><?php echo esc_html( $content['title'] ) ; ?>
                                    <?php if( !empty( $about_sub_title ) ): ?>
                                        <span><?php echo esc_html( $about_sub_title ); ?></span>
                                    <?php endif; ?>
                                </h2>
                            </div><!-- .section-header -->
                        <?php endif; ?>
                        <div class="entry-content">
                            <p><?php echo esc_html( $content['excerpt'] ) ; ?></p> 
                        </div><!-- .entry-content -->

                        <?php if( !empty( $content['url'] ) && !empty( $about_btn_title ) ): ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn"><?php echo esc_html( $about_btn_title ); ?></a>
                            </div><!-- .read-more -->
                        <?php endif; ?>
                    </div><!-- .entry-container -->
                </article>
            </div><!-- .wrapper -->
        </div><!-- #about-us -->

    <?php endforeach;

}
endif;

