<?php
/**
 * Custom hooks functions are define about header section.
 *
 * @package Dcode
 * @since 1.0.0
 */

 /*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_top_header_start' ) ) :

	/**
	 * Top header start
	 *
	 * @since 1.0.0
	 */

	function rdcode_top_header_start() {
		if ( get_theme_mod( 'rdcode_top_header_option', 'show' ) == 'show' ) {
			echo '<!-- Topbar-start-area -->
					<div class="header_top_area type-two">
					<div class="container">
					<div class="row">
					<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="contact_wrapper_top">';
		}
	}

endif;

if( ! function_exists( 'rdcode_top_left_section' ) ) :

	/**
	 * Top header left section
	 *
	 * @since 1.0.0
	 */

	function rdcode_top_left_section() {
		$top_bar_contact_number = get_theme_mod( 'top_bar_contact_number', '+123-456-7890' );
		$top_bar_email_address  = get_theme_mod( 'top_bar_email_address', 'info@example.com' );

		if ( get_theme_mod( 'rdcode_top_header_option', 'show' ) == 'show' ) {
	?>
		<ul class="header_top_contact">
			<?php if ( get_theme_mod( 'rdcode_top_header_phone', 'show' ) == 'show' ) { ?>
            <li class="header_top_phone"><i class="fa fa-phone" aria-hidden="true"></i>
            	<?php echo esc_html( $top_bar_contact_number ); ?>
            </li>
			<?php } if ( get_theme_mod( 'rdcode_top_header_email', 'show' ) == 'show' ) { ?>
            <li class="header_top_email"><i class="fa fa-envelope" aria-hidden="true"></i>
            	<?php echo esc_html( $top_bar_email_address ); ?>
            </li>
			<?php } ?>
        </ul>
	<?php }
}

endif;

if( ! function_exists( 'rdcode_top_right_section' ) ) :

	/**
	 * Top header right section
	 *
	 * @since 1.0.0
	 */

	function rdcode_top_right_section() {
		if ( get_theme_mod( 'rdcode_top_header_option', 'show' ) == 'show' ) {
			if ( get_theme_mod( 'rdcode_top_header_social_icons', 'show' ) == 'show' ) {
	?>
			<div class="topbar-icon">
	            <ul class="social-media">
	                <?php
		            	if ( ! empty ( get_theme_mod( 'social_media_icons' ) ) ) {
		            		$social_icons = json_decode( get_theme_mod( 'social_media_icons' ) );
		            		foreach ( $social_icons as $key => $value ) {
		            			$array = array();
						        foreach($value as $key){
						            $array[] = $key;
						        }
						        if ( ! empty ( $array ) ) {
						        	echo '<li><a href="'.esc_attr( esc_url( $array[1] ) ).'"><i class="'.esc_attr( $array[0] ).'"></i></a></li>';
						        }
		            		}
		            	}
	            	?>
	            </ul>
	        </div><!-- .jetrip-top-right-section -->
	<?php } }
	}

endif;

 if( ! function_exists( 'rdcode_top_header_end' ) ) :

	/**
	 * Top header end
	 *
	 * @since 1.0.0
	 */

	function rdcode_top_header_end() {
		if ( get_theme_mod( 'rdcode_top_header_option', 'show' ) == 'show' ) {
			echo '</div></div></div></div></div><!-- End-Topbar-area -->';
		}
	}

endif;

/**
 * Managed functions for top header hook
 *
 * @since 1.0.0
 */
add_action( 'rdcode_top_header', 'rdcode_top_header_start', 5 );
add_action( 'rdcode_top_header', 'rdcode_top_left_section', 10 );
add_action( 'rdcode_top_header', 'rdcode_top_right_section', 15 );
add_action( 'rdcode_top_header', 'rdcode_top_header_end', 20 );

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_header_navbar_start' ) ) :

	/**
	 * header navbar start
	 *
	 * @since 1.0.0
	 */

	function rdcode_header_navbar_start() {
		echo '<nav class="navbar navbar-expand-lg navbar-dark">';
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_header_navbar_left_section' ) ) :

	/**
	 * header navbar left section
	 *
	 * @since 1.0.0
	 */

	function rdcode_header_navbar_left_section() {
		?>
		
           <!-- .site-branding -->
           <div class="site-branding">
	            <?php if ( the_custom_logo() ) { ?>
	                <div class="site-logo">
	                    <?php the_custom_logo(); ?>
	                </div><!-- .site-logo -->
	            <?php }
	            if ( get_bloginfo() ) {
	            ?>
	                <h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php the_title_attribute(); ?>" rel="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h3>
	            <?php 
	            } 
	            $description = get_bloginfo( 'description', 'display' );
	            if ( $description || is_customize_preview() ) : ?>
	                <p class="site-description"><?php echo esc_html( $description ); ?></p>
	            <?php
	            endif;
	            ?>
	        </div><!-- .site-branding -->
        <?php
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_header_navbar_menu_section' ) ) :

	/**
	 * header navbar menu
	 *
	 * @since 1.0.0
	 */

	function rdcode_header_navbar_menu_section() {
		?>

<div class="desktop__search_popup">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'dcode' ); ?>">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse text-center" id="navigation">
       <?php 
          wp_nav_menu( array(
             'theme_location' => 'rdcode_primary_menu',
             'depth'          => 4,
             'container'      => false,
             'menu_class'     => 'navbar-nav m-auto',
             'fallback_cb'    => 'rdcode_bootstrap_Navwalker::fallback',
             'walker'         => new rdcode_bootstrap_Navwalker()
          ) );
	   ?>
	   <button class="navbar-toggler-close " type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'dcode' ); ?>">
		<span class="fas fa-times"></span>
	</button>
    </div>

	
		<?php if ( get_theme_mod( 'rdcode_search_icon_option', 'show' ) == 'show' ) { ?>
			<button class="search__btn" data-toggle="collapse" data-target="#search_box2" aria-expanded="true"> <i class="fas fa-search"> </i> </button>
		<?php } ?>
		<div id="search_box2" class="collapse main-search-box">
			<div class="search__wrapper">
				<form role="search" method="get"  class="d-flex justify-content-between search-inner" action="<?php echo esc_attr( esc_url( home_url('/') ) ); ?>">
					<input type="text" placeholder="<?php esc_attr_e( 'Search for...', 'dcode' ); ?>" class="form-control" name="s" id="search_input" placeholder="<?php esc_attr_e( 'Search Here', 'dcode' ); ?>" <?php the_search_query(); ?>/>
					<button class="btn btn-search-bar"> <i class="fas fa-search"> </i>  </button>
				</form>
				<button class="close-search-btn"  data-toggle="collapse" data-target="#search_box2">
					<i class="fas fa-times">  </i>
				</button>
			</div>
		</div>
	</div>
		<?php
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'rdcode_header_navbar_end' ) ) :

	/**
	 * header navbar end
	 *
	 * @since 1.0.0
	 */

	function rdcode_header_navbar_end() {
		echo '</nav>';
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Managed functions for header section hook
 *
 * @since 1.0.0
 */
add_action( 'rdcode_header_section', 'rdcode_header_navbar_start', 5 );
add_action( 'rdcode_header_section', 'rdcode_header_navbar_left_section', 10 );
add_action( 'rdcode_header_section', 'rdcode_header_navbar_menu_section', 15 );
add_action( 'rdcode_header_section', 'rdcode_header_navbar_end', 20 );