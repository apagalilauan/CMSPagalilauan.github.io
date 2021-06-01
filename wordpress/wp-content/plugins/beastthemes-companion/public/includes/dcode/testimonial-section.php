<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_testimonial_html {
    public static function beastthemes_companion_testimonial_section() {
        ?>
        <!--Testimonial-Section-->
        <section class="testimonial-wrapper">
          <div class="container">
          <div class="row">  
          <div class="col-lg-6 d-flex align-items-center">  
             <div class="section-header text-left heading-div m-0">
                  <h2 class="section-title  ">
                    <?php echo esc_html( get_theme_mod( 'rdcode_testi_title', 'Happy Client' ) ); ?>
                  </h2>
                <?php if ( ! empty ( get_theme_mod( 'rdcode_testi_desc' ) ) ) { ?>
                  <p class="section-dec"><?php echo esc_html( get_theme_mod( 'rdcode_testi_desc' ) ); ?></p>
                <?php } ?>
              </div>
              </div>
              <div class="col-lg-6">  
              <div class="mx-auto testimonial-slider">
                <?php
                  if ( ! empty ( get_theme_mod( 'rdcode_testi_items' ) ) ) {
                    $testimonial_items = json_decode( get_theme_mod( 'rdcode_testi_items' ) );
                    foreach ( $testimonial_items as $key => $value ) {

                      $array = array();
                      foreach( $value as $key ) {
                          array_push( $array, $key );
                      }

                      if ( ! empty ( $array ) ) {
                  ?>
                  <!-- slider-item -->
                  <div class="testimonial-content">
                  <div class="testimonial-content-inner">
                      <i class="ti-quote-right icon mb-4 "></i>
                     
                      <div class="autor-img "> 
                        <?php if ( ! empty ( $array[0] ) ) { ?>
                          <img class="img-fluid rounded-circle" src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" alt="client-image" />
                        <?php } ?>
                        </div>

                        <?php if ( ! empty ( $array[3] ) ) { ?>
                      <p class="author-dec ">
                        <?php echo esc_html( $array[3] ); ?>
                      </p>
                      <?php } ?>
                      <div class="author-info ">
                        <?php if ( ! empty ( $array[1] ) ) { ?>
                          <h4 class="author-name "><a href="#"><?php echo esc_html( $array[1] ); ?></a></h4>
                        <?php } if ( ! empty ( $array[2] ) ) { ?>
                          <h5 class="author-sub "><?php echo esc_html( $array[2] ); ?></h5>
                        <?php } ?>
                      </div>
                  </div>
                  </div>
                  <?php 
                      }
                    }
                  }
                ?>
                    </div> 
              </div>
          </div>
      </section>
      <!--End-Testimonial-Section-->
    <?php 
    }
}

/**
 * Team section.
 *
 */
if( ! function_exists( 'beastthemes_home_testimonial' ) ) :

    /**
     * Team HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_testimonial() {
        $slider_home = absint( get_theme_mod( 'rdcode_testimonial_home', '1' ) ) ;
        if( $slider_home == "1" ) {
            /* Executes the action for sliders section hook named 'beastthemes_companion_testimonial' */
            do_action( 'beastthemes_companion_testimonial');
        } else {
            echo '<div class="margin-110  clearfix"></div>';
        }
    }

endif;
add_action( 'beastthemes_testimonial_sec', 'beastthemes_home_testimonial', 5 );
?>