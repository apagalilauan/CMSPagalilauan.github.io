<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_slider_html {
    public static function beastthemes_companion_slider_section() {
        ?>
        <!-- Start-Slider-Section -->
        <main class="mb-801">
            <div class="hero-slide slider slider-type-two ">
                <?php 
                   if ( ! empty ( get_theme_mod( 'rdcode_sliders_items' ) ) ) {
                      $slider_items = json_decode( get_theme_mod( 'rdcode_sliders_items' ) );
                      foreach ( $slider_items as $key => $value ) {
                         $array = array();
                        foreach($value as $key){
                            array_push( $array, $key );
                        }
                        if ( ! empty ( $array ) && ! empty ( $array[0] ) ) {
                        ?>
                        <div class="item">
                            <img src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" class="img-fluid" alt="hero-1">
                            <div class="hero-slider__content-wrapper">
                                <div class="container">
                                    <div class="hero-slider__content">
                                        <?php if ( ! empty ( $array[1] ) ) { ?>
                                        <h2 class="hero-slider__title"><?php echo esc_html( $array[1] ); ?></h2>
                                        <?php } if ( ! empty ( $array[2] ) ) { ?>
                                        <p class="hero-slider__text"><?php echo esc_html( $array[2] ); ?></p>
                                        <?php } if ( ! empty ( $array[3] ) && ! empty ( $array[4] ) ) { ?>
                                        <a class="hero-slider__btn active mb-4" href="<?php echo esc_attr( esc_url( $array[4] ) ); ?>"><?php echo esc_html( $array[3] ); ?></a>
                                        <?php } if ( ! empty ( $array[6] ) && ! empty ( $array[5] ) ) { ?>
                                        <a class="hero-slider__btn" href="<?php echo esc_attr( esc_url( $array[6] ) ); ?>"><?php echo esc_html( $array[5] ); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                      }
                   }
                ?>
            </div>
        </main>
        <!-- End-Slider-Section -->
    <?php 
    }
}

/**
 * Slider section.
 *
 */
if( ! function_exists( 'beastthemes_home_slider' ) ) :

    /**
     * Slider HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_slider() {
        $slider_home = absint( get_theme_mod( 'rdcode_slider_home', '1' ) ) ;
        if( $slider_home == "1" ) {
            /* Executes the action for sliders section hook named 'beastthemes_companion_slider' */
            do_action( 'beastthemes_companion_slider');
        } else {
            echo '<div class="margin-110  clearfix"></div>';
        }
    }

endif;
add_action( 'beastthemes_slider_sec', 'beastthemes_home_slider', 5 );
?>