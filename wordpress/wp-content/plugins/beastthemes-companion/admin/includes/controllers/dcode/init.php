<?php
defined('ABSPATH') or die();

/**
 * customizer file includes
 */
require_once( 'customizer/class-custom-functions.php' );
require_once( 'customizer/slider-options.php' );
require_once( 'customizer/service-options.php' );
require_once( 'customizer/testimonial-options.php' );
require_once( 'customizer/team-options.php' );
require_once( 'customizer/client-options.php' );
require_once( 'customizer/homepage-layout.php' );
require_once( 'home-default.php' );

add_action( 'customize_register', array( 'BeastThemesCompanionLayoutDcode', 'layout_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionSliderDcode', 'slider_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionServiceDcode', 'service_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionTestimonialDcode', 'testi_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionteamDcode', 'team_customizer' ) );
add_action( 'customize_register', array( 'BeastThemesCompanionclientDcode', 'client_customizer' ) );