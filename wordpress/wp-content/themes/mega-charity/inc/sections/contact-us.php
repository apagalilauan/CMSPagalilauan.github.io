<?php
/**
 * Contact section
 *
 * This is the template for the content of contact section
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */
if ( ! function_exists( 'mega_charity_add_contact_section' ) ) :
    /**
    * Add contact section
    *
    *@since Mega Charity 1.0.0
    */
    function mega_charity_add_contact_section() {
        $options = mega_charity_get_theme_options();

        // Check if contact is enabled on frontpage
        $contact_enable = apply_filters( 'mega_charity_section_status', true, 'contact_section_enable' );


        if ( true !== $contact_enable ) {
           return false;
        }

        // Render contact section now.
        mega_charity_render_contact_section();
    }
endif;

if ( ! function_exists( 'mega_charity_render_contact_section' ) ) :
  /**
   * Start contact section
   *
   * @return string contact content
   * @since Mega Charity 1.0.0
   *
   */
   function mega_charity_render_contact_section() {
        
        $options = mega_charity_get_theme_options();

        $col_class = ( has_nav_menu('social') && $options['contact_social_menu_enable'] == true  ) ? 'col-2' : 'col-1';
   
        ?>

        <div id="contact-us">
            <div class="wrapper">
            <?php if ( is_customize_preview()):
                    mega_charity_section_tooltip( 'contact-us' );
                    endif; ?>
                <div class="contact-address clear">
                    <div class="<?php echo esc_attr( $col_class ); ?>">      
                        <div class="hentry">
                            <?php if( !empty( $options['contact_contact_info'] ) ): ?>
                                <p><?php echo wp_kses_post($options['contact_contact_info']); ?></p>
                            <?php endif; ?>
                            <div class="widget widget_contact_info clear">
                                <ul>    
                                    <?php if( !empty( $options['contact_phone_no'] ) ): ?>
                                        <li>
                                            <div class="icon">
                                                <svg viewBox="0 0 512.001 512.001">
                                                    <path d="M498.808,377.784l-63.633-63.647c-16.978-16.978-46.641-17.007-63.647,0l-10.611,10.611l127.284,127.277l10.607-10.607
                                                    C516.427,423.798,516.368,395.314,498.808,377.784z"></path>
                                                    <path d="M339.116,345.37c-13.39,10.373-32.492,9.959-44.727-2.303L168.572,217.163c-12.263-12.263-12.676-31.379-2.303-44.736
                                                    L39.278,45.443c-54.631,63.68-52.495,159.633,7.8,219.928l199.103,199.19c57.86,57.858,152.635,65.532,219.932,7.797
                                                    L339.116,345.37z"></path>

                                                    <path d="M197.503,76.391L133.87,12.744c-16.978-16.978-46.641-17.007-63.647,0L59.612,23.355l127.284,127.277l10.607-10.608
                                                    C215.121,122.406,215.063,93.922,197.503,76.391z"></path>
                                                </svg>
                                            </div>
                                            <div class="details">
                                                <span><a href="tel:<?php echo esc_url($options['contact_phone_no']); ?>"><?php echo esc_html($options['contact_phone_no']); ?></a></span>
                                            </div><!-- .details -->
                                        </li>
                                    <?php endif; 

                                    if( !empty( $options['contact_email'] ) ):
                                        ?>

                                    <li>
                                        <div class="icon">
                                            <svg viewBox="0 0 512 512">
                                                <path d="M467,61H45c-6.927,0-13.412,1.703-19.279,4.51L255,294.789l51.389-49.387c0,0,0.004-0.005,0.005-0.007
                                                c0.001-0.002,0.005-0.004,0.005-0.004L486.286,65.514C480.418,62.705,473.929,61,467,61z"></path>

                                                <path d="M507.496,86.728L338.213,256.002L507.49,425.279c2.807-5.867,4.51-12.352,4.51-19.279V106
                                                C512,99.077,510.301,92.593,507.496,86.728z"></path>

                                                <path d="M4.51,86.721C1.703,92.588,0,99.073,0,106v300c0,6.923,1.701,13.409,4.506,19.274L173.789,256L4.51,86.721z"></path>

                                                <path d="M317.002,277.213l-51.396,49.393c-2.93,2.93-6.768,4.395-10.605,4.395s-7.676-1.465-10.605-4.395L195,277.211
                                                L25.714,446.486C31.582,449.295,38.071,451,45,451h422c6.927,0,13.412-1.703,19.279-4.51L317.002,277.213z"></path>
                                            </svg>
                                        </div>
                                        <div class="details">
                                            <span><a href="mailto:<?php echo esc_url($options['contact_email']); ?>"><?php echo esc_html($options['contact_email']); ?></a></span>
                                        </div><!-- .details -->
                                    </li> 
                                <?php endif; ?>

                            </ul>
                        </div><!-- .widget -->
                    </div>

                    <?php if(has_nav_menu('social') && $options['contact_social_menu_enable'] == true ): ?>
                    <div class="hentry">
                        <?php 

                        wp_nav_menu(  array(
                            'theme_location' => 'social',
                            'container' => false,
                            'menu_class' => 'social-icons',
                            'echo' => true,
                            'fallback_cb' => false,
                            'depth' => 1,
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                            ) );

                            ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div><!-- .wrapper -->
        </div><!-- .#contact-us -->

    <?php }
endif; ?>

