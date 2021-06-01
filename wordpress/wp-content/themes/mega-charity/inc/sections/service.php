<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_service_section() {
        $options = mega_charity_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'mega_charity_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'mega_charity_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        mega_charity_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_charity_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Mega Charity 1.0.0
    * @param array $input service section details.
    */
    function mega_charity_get_service_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();

        $post_ids = array();

                for ( $i = 1; $i <= 4; $i++ ) {
                    if ( ! empty( $options['service_content_post_' . $i] ) )
                        $post_ids[] = $options['service_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => 4,
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    ); 

        // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = mega_charity_trim_content( 25 );
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
// service section content details.
add_filter( 'mega_charity_filter_service_section_details', 'mega_charity_get_service_section_details' );


if ( ! function_exists( 'mega_charity_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_service_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        
        $button = $options['service_btn_title'] ? $options['service_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 
        ?>
        
        <div id="our-services" class="relative page-section">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                mega_charity_section_tooltip( 'our-services' );
                endif; ?>

                <div class="section-header-wrapper">
                    <?php if( !empty( $options['service_title'] ) ): ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo mega_charity_santize_allow_tag( $options['service_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; 

                    if( !empty( $options['service_btn_url'] ) && !empty( $button ) ):
                        ?>
                    <a href="<?php echo esc_url( $options['service_btn_url'] ); ?>" class="btn"><?php echo esc_html( $button ); ?></a>
                    <?php 
                    endif;

                    ?>
                </div><!-- .section-header-wrapper -->

                <div class="section-content col-4 clear">

                    <?php $i = 1; foreach ( $content_details as $content ) : ?>

                    <article class ="hentry">
                        <div class="service-item-wrapper">
                            <div class="service-icon">
                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                    <i class="fa <?php echo ! empty( $options['service_content_icon_' . $i] ) ? esc_attr( $options['service_content_icon_' . $i] ) : 'fa-handshake-o'; ?>"></i>
                                </a>
                            </div><!-- .service-icon -->

                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->
                        </div><!-- .service-item-wrapper -->
                    </article>

                    <?php $i++; endforeach; ?>

                </div>

                <?php 
                if( !empty( $options['service_btn_url'] ) && !empty( $button ) ): ?>
                <div class="read-more">
                    <a href="<?php echo esc_url( $options['service_btn_url'] ); ?>" class="btn"><?php echo esc_html( $button ); ?></a>
                </div>
            <?php endif; ?>

        </div><!-- .wrapper -->
    </div><!-- #our-services -->

    <?php }
endif;