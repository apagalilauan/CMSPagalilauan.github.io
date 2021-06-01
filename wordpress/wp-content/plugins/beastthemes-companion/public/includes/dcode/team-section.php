<?php
defined( 'ABSPATH' ) or die();

class beastthemes_companion_team_html {
    public static function beastthemes_companion_team_section() {
      $rdcode_team_bg_img = get_theme_mod( 'rdcode_team_bg_img', BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/team-bg.png' );
    ?>
      <!--Team-Section-->
      <section class="section bg-cover pb-60" data-background="<?php echo esc_attr( esc_url( $rdcode_team_bg_img ) ); ?>" style="background-image: url( <?php echo esc_attr( esc_url( $rdcode_team_bg_img ) ); ?> );">
        <div class="container">
            <div class="section-header heading-div text-center">
                     <h2 class="section-title">
                       <?php echo esc_html( get_theme_mod( 'rdcode_team_title', 'The Leadership' ) ); ?>
                     </h2>
                   <?php if ( ! empty ( get_theme_mod( 'rdcode_team_desc' ) ) ) { ?>
                     <p class="section-dec"><?php echo esc_html( get_theme_mod( 'rdcode_team_desc' ) ); ?></p>
                   <?php } ?>
               </div>
            <div class="row">
            
               <?php
               if ( ! empty ( get_theme_mod( 'rdcode_teams_items' ) ) ) {
                 $team_items = json_decode( get_theme_mod( 'rdcode_teams_items' ) );
                 foreach ( $team_items as $key => $value ) {

                   $array = array();
                   foreach( $value as $key ) {
                       array_push( $array, $key );
                   }

                   if ( ! empty ( $array ) ) {
               ?>
               <div class="col-lg-3 col-md-6 col-12 mb-4 team-member">
                  <div class="card text-center">
                     <div class="position-relative">
                        <?php if ( ! empty ( $array[0] ) ) { ?>
                        <img src="<?php echo esc_attr( esc_url( $array[0] ) ); ?>" class="card-img-top" alt="img" />
                        <?php } if ( ! empty ( $array[3] ) || ! empty ( $array[4] ) || ! empty ( $array[5] ) || ! empty ( $array[6] ) ) { ?>
                        <div class="team-overlay">
                        
                           <ul class="team-social social_media">
                           <?php if ( ! empty ( $array[3] ) ) { ?>
                           <li>
                              <a class="social-item" href="<?php echo esc_url( $array[3] ); ?>"><i class="fab fa-facebook-f"></i> </a>
                           </li>
                           <?php } if ( ! empty ( $array[4] ) ) { ?>
                           <li>
                              <a class="social-item" href="<?php echo esc_url( $array[4] ); ?>"><i class="fab fa-instagram"></i> </a>
                           </li>
                           <?php } if ( ! empty ( $array[5] ) ) { ?>
                           <li>
                              <a class="social-item" href="<?php echo esc_url( $array[5] ); ?>"><i class="fab fa-google-plus-g"></i> </a>
                           </li>
                           <?php } if ( ! empty ( $array[6] ) ) { ?>
                           <li>
                              <a class="social-item" href="<?php echo esc_url( $array[6] ); ?>"><i class="fab fa-twitter"></i> </a>
                           </li>
                        <?php } ?>
                        </ul>
                        </div>
                        <?php } ?>
                     </div>
                     <?php if ( ! empty ( $array[1] ) || ! empty ( $array[2] ) ) { ?>
                     <div class="card-body">
                        <?php if ( ! empty ( $array[1] ) ) { ?>
                        <h4><a href="#" class="card-title"><?php echo esc_html( $array[1] ); ?></a></h4>
                        <?php } if ( ! empty ( $array[2] ) ) { ?>
                        <p class="text-light"><?php echo esc_html( $array[2] ); ?></p>
                        <?php } ?>
                     </div>
                     <?php } ?>
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
    <!--End-Team-Section-->
    <?php 
    }
}

/**
 * Team section.
 *
 */
if( ! function_exists( 'beastthemes_home_team' ) ) :

    /**
     * Team HTML
     *
     * @since 1.0.0
     */
    function beastthemes_home_team() {
        $slider_home = absint( get_theme_mod( 'rdcode_team_home', '1' ) ) ;
        if( $slider_home == "1" ) {
            /* Executes the action for sliders section hook named 'beastthemes_companion_team' */
            do_action( 'beastthemes_companion_team');
        } else {
            echo '<div class="margin-110  clearfix"></div>';
        }
    }

endif;
add_action( 'beastthemes_team_sec', 'beastthemes_home_team', 5 );
?>