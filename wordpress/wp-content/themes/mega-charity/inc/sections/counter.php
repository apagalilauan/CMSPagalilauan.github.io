<?php
/**
 * Counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_counter_section() {
        $options = mega_charity_get_theme_options();
        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'mega_charity_section_status', true, 'counter_section_enable' );

        if ( true !== $counter_enable ) {
            return false;
        }

        // Render counter section now.
        mega_charity_render_counter_section();
    }
endif;

if ( ! function_exists( 'mega_charity_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_counter_section() {
        $options = mega_charity_get_theme_options();
        
        ?>
       
        <div id="counter" class="relative">
          <div class="wrapper">
            <?php if ( is_customize_preview()):
            mega_charity_section_tooltip( 'counter' );
            endif; ?>
            <div class="section-content clear col-4">

              <?php for ( $i = 1; $i <= 4; $i++) { 

                if ( ! empty( $options['counter_value_' . $i] ) && ! empty( $options['counter_label_' . $i] ) ) :
                 ?>
               <article>
                <header class="entry-header">
                  <h2 class="entry-title"><?php echo esc_html( $options['counter_value_' . $i] ); ?></h2>
                </header>
                <div class="entry-content">
                  <p><?php echo esc_html( $options['counter_label_' . $i] ); ?></p>
                </div>
              </article>

            <?php endif;

          } ?>
        </div><!-- .business-section-content -->
      </div><!-- .wrapper -->
    </div><!-- #counter -->
            
    <?php }
endif;