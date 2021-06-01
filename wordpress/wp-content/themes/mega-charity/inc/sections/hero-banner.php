<?php
/**
 * Hero Banner section
 *
 * This is the template for the content of hero-banner section
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_hero_banner_section' ) ) :
    /**
    * Add hero-banner section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_hero_banner_section() {
        $options = mega_charity_get_theme_options();
        
        // Check if Hero Banner is enabled on frontpage
        $hero_banner_enable = apply_filters( 'mega_charity_section_status', true, 'hero_banner_section_enable' );

        if ( true !== $hero_banner_enable ) {
            return false;
        }
        $section_details = array();

        // Get Hero Banner section details
        $section_details = apply_filters( 'mega_charity_filter_hero_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        
        mega_charity_render_hero_banner_section( $section_details );

    }
endif;

if ( ! function_exists( 'mega_charity_get_hero_banner_section_details' ) ) :
    /**
    * Hero Banner section details.
    *
    * @since Mega Charity 1.0.0
    * @param array $input hero-banner section details.
    */
    function mega_charity_get_hero_banner_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();

        $post_id = ! empty( $options['hero_banner_content_post'] ) ? $options['hero_banner_content_post'] : '';
        $args = array(
            'post_type'         => 'post',
            'p'                 => $post_id,
            'posts_per_page'    => 1,
            );

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = mega_charity_trim_content( 15 );
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// Hero Banner section content details.
add_filter( 'mega_charity_filter_hero_banner_section_details', 'mega_charity_get_hero_banner_section_details' );


if ( ! function_exists( 'mega_charity_render_hero_banner_section' ) ) :
  /**
   * Start Hero Banner section
   *
   * @return string Hero Banner content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_hero_banner_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        $hero_banner_sub_title = ! empty( $options['hero_banner_sub_title'] ) ? $options['hero_banner_sub_title'] : '';
        $hero_banner_btn_title = ! empty( $options['hero_banner_btn_title'] ) ? $options['hero_banner_btn_title'] : '';
        $hero_banner_alt_btn_title = ! empty( $options['hero_banner_alt_btn_title'] ) ? $options['hero_banner_alt_btn_title'] : '';
        $hero_banner_alt_btn_link = ! empty( $options['hero_banner_alt_btn_link'] ) ? $options['hero_banner_alt_btn_link'] : '';
        
        $content = $content_details[0];
        if ( empty( $content_details ) ) {
            return;
        } 
        ?>

        <div id="hero-banner">
            <div class="wrapper">
            <?php if ( is_customize_preview()):
                mega_charity_section_tooltip( 'hero-banner' );
                endif; ?>
                <article>

                    <div class="hero-content-wrapper">
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <?php if( !empty( $hero_banner_sub_title ) ): ?>
                                    <span><?php echo esc_html($hero_banner_sub_title); ?></span>
                                <?php endif; 
                                if( !empty( $content['title'] ) ):
                                    echo esc_html($content['title']); ?></h2>
                            <?php endif; ?>
                        </header>

                        <?php if( !empty( $content['excerpt'] ) ): ?>
                            <div class="entry-content">
                                <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                            </div><!-- .entry-content-->
                        <?php endif; ?>

                        <div class="read-more">
                            <?php if( !empty( $hero_banner_btn_title ) ): ?>
                                <a href="<?php echo esc_url($content['url']); ?>" class="btn first-btn"><?php echo esc_html($hero_banner_btn_title); ?></a>
                            <?php endif;

                            if( !empty( $hero_banner_alt_btn_link ) && !empty( $hero_banner_alt_btn_title ) ):

                                ?>
                            <a href="<?php echo esc_url($hero_banner_alt_btn_link); ?>" class="btn second-btn"><?php echo esc_html($hero_banner_alt_btn_title); ?></a>
                        <?php endif; ?>
                    </div><!-- .read-more -->
                </div><!-- .featured-content-wrapper -->

                <?php if( !empty( $content['image'] ) ): ?>
                    <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']);?>');">
                    </div>
                <?php endif; ?>
            </article>

        </div>
    </div><!-- #hero-banner -->

        <?php 
    }
endif;

?>