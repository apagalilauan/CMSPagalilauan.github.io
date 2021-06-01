<?php
/**
 * team section
 *
 * This is the template for the content of team section
 *
 * @team Theme Palace
 * @subteam Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_team_section' ) ) :
    /**
    * Add team section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_team_section() {
        $options = mega_charity_get_theme_options();
        // Check if team is enabled on frontpage
        $team_enable = apply_filters( 'mega_charity_section_status', true, 'team_section_enable' );


        if ( true !== $team_enable ) {
            return false;
        }
        // Get team section details
        $section_details = array();
        $section_details = apply_filters( 'mega_charity_filter_team_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render team section now.
        mega_charity_render_team_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_charity_get_team_section_details' ) ) :
    /**
    * team section details.
    *
    * @since Mega Charity 1.0.0
    * @param array $input team section details.
    */
    function mega_charity_get_team_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['team_content_post_' . $i] ) )
                $post_ids[] = $options['team_content_post_' . $i];
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
// team section content details.
add_filter( 'mega_charity_filter_team_section_details', 'mega_charity_get_team_section_details' );


if ( ! function_exists( 'mega_charity_render_team_section' ) ) :
  /**
   * Start team section
   *
   * @return string team content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_team_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        $i = 1;        

        if ( empty( $content_details ) ) {
            return;
        } 
        ?> 
           
        <div id="business-team" class="relative page-section">
            <div class="wrapper">
            <?php if ( is_customize_preview()):
            mega_charity_section_tooltip( 'business-team' );
            endif; ?>
            <?php if( !empty( $options['team_title'] ) ): ?>
                <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $options['team_title'] ); ?></h2>
                </div><!-- .business-section-header -->
            <?php endif; ?>

                <div class="business-section-content clear col-4">

                <?php $i = 1; foreach ( $content_details as $content ) : ?>

                    <article>
                        <div class="business-team-item">
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="business-team-01"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                                </header>

                                <?php if ( !empty( $options['team_position_'.$i] )): ?>
                                <div class="entry-content">
                                    <p><?php echo esc_html( $options['team_position_'.$i] ) ; ?></p>
                                </div><!-- .entry-content -->
                            <?php endif; ?>

                            </div><!-- .entry-container -->
                        </div><!-- .business-team-item -->
                    </article>

                    <?php $i++; endforeach; ?>

                </div><!-- .business-section-content -->
            </div><!-- .wrapper -->
        </div><!-- #business-team -->


    <?php }
endif;