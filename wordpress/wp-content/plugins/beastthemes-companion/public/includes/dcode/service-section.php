<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_service_html {
  public static function beastthemes_companion_service_section() {
      ?>
      <!---Services-Section-->
      <section class="services section pb-50 bg-gray">
        <div class="container">
          <div class="section-header heading-div text-center">
              <h2 class="section-title">
                <?php echo esc_html( get_theme_mod( 'rdcode_service_title', 'Best Services' ) ); ?>
              </h2>
            <?php if ( ! empty ( get_theme_mod( 'rdcode_service_desc' ) ) ) { ?>
              <p class="section-dec"><?php echo esc_html( get_theme_mod( 'rdcode_service_desc' ) ); ?></p>
            <?php } ?>
          </div>
          <div class="row">
          
             <?php
               if ( ! empty ( get_theme_mod( 'rdcode_services_items' ) ) ) {

                  $service_items = json_decode( get_theme_mod( 'rdcode_services_items' ) );
                  $service_icon  = get_theme_mod( 'rdcode_service_icon_hide', 'show' );
                  $service_title = get_theme_mod( 'rdcode_service_title_hide', 'show' );
                  $service_desc  = get_theme_mod( 'rdcode_service_content_hide', 'show' );

                  foreach ( $service_items as $key => $value ) {

                    $array = array();
                    foreach($value as $key){
                        array_push( $array, $key );
                    }

                    if ( ! empty ( $array ) ) {
                    ?>
                    <div class="col-lg-4 col-md-6 mb-30">
                     
                        <div class="card hover-shadow shadow">
                            <div class="card-body service-box text-center px-4 py-5">

                              <div class="service-icon"> 
                                <?php if ( ! empty ( $array[0] ) && ! empty ( $service_icon ) && $service_icon == 'show' ) { ?>
                                <i class="<?php echo esc_attr( $array[0] ); ?> icon"></i>
                                <?php } if ( ! empty ( $array[1] ) && ! empty ( $service_title ) && $service_title == 'show' ) { ?>
                              </div>
                              <h4 class="service-title">  <a href="<?php $url = ( ! empty ( $array[3] ) ) ? esc_url_raw( $array[3] ) : esc_attr( '#' );  echo $url; ?>"> <?php echo esc_html( $array[1] ); ?>       </a></h4>
                              <?php } if ( ! empty ( $array[2] ) && ! empty ( $service_desc ) && $service_desc == 'show' ) { ?>
                              <p class="service-dec"><?php echo esc_html( $array[2] ); ?></p>
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
      </section>
      <!---End-Services-Section-->
  <?php 
  }
}

/**
 * Service section.
 *
 */
if( ! function_exists( 'beastthemes_home_service' ) ) :

  /**
   * Service HTML
   *
   * @since 1.0.0
   */
  function beastthemes_home_service() {
    $service_home = absint( get_theme_mod( 'rdcode_service_home','1' ) ) ;
    if( $service_home == "1" ) {
        /* Executes the action for service section hook named 'beastthemes_companion_service' */
        do_action( 'beastthemes_companion_service');
    } else {
        echo '<div class="margin-110  clearfix"></div>';
    }
  }

endif;
add_action( 'beastthemes_service_sec', 'beastthemes_home_service', 10 );
?>