<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_client_html {
    public static function beastthemes_companion_client_section() {
        ?>
        <!--Client-Section-->
        <div class="section bg-gray">
            <div class="container">
                <div class="section-header heading-div text-center">
                    <h2 class="section-title ">
                        <?php echo esc_html( get_theme_mod( 'rdcode_client_title', 'Our Clients' ) ); ?>
                    </h2>
                    <?php if ( ! empty ( get_theme_mod( 'rdcode_client_desc' ) ) ) { ?>
                        <p class="section-dec"><?php echo esc_html( get_theme_mod( 'rdcode_client_desc' ) ); ?></p>
                    <?php } ?>
                </div>
    
                <div class="client-logo-slider d-flex align-items-center">
                    <?php
                    if ( ! empty ( get_theme_mod( 'rdcode_clients_items' ) ) ) {
                        $client_items = json_decode( get_theme_mod( 'rdcode_clients_items' ) );
                        foreach ( $client_items as $key => $value ) {

                            $array = array();
                            foreach( $value as $key ) {
                               array_push( $array, $key );
                            }

                            if ( ! empty ( $array ) ) {
                                if ( ! empty ( $array[0] ) ) { ?>
                                    <a href="<?php echo esc_attr( esc_url( $array[1] ) ); ?>" class="text-center d-block outline-0 p-4">
                                        <img class="d-unset img-fluid" src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" alt="client-logo" />
                                    </a>
                        <?php   } 
                            } 
                        } 
                    } ?>
                </div>
            </div>
        </div>
        <!--End-Client-Section-->
    <?php 
    }
}

/**
 * Client section.
 *
 */
if( ! function_exists( 'beastthemes_home_client' ) ) :

    /**
     * Client HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_client() {
        $slider_home = absint( get_theme_mod( 'rdcode_client_home', '1' ) ) ;
        if( $slider_home == "1" ) {
            /* Executes the action for sliders section hook named 'beastthemes_companion_client' */
            do_action( 'beastthemes_companion_client');
        } else {
            echo '<div class="margin-110  clearfix"></div>';
        }
    }

endif;
add_action( 'beastthemes_client_sec', 'beastthemes_home_client', 5 );
?>