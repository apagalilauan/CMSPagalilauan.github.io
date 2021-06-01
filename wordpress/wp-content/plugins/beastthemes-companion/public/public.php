<?php
defined('ABSPATH') or die();

require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH. 'admin/includes/helpers/helper.php' );

$current_theme = BeastThemesCompanionHelper::beastthemes_companion_get_theme_name();

if ( $current_theme == 'Dcode' ) {

	if ( file_exists( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/slider-section.php" ) ) {
		require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/slider-section.php" );
	}

	if ( file_exists( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/service-section.php" ) ) {
		require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/service-section.php" );
	}

	if ( file_exists( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/testimonial-section.php" ) ) {
		require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/testimonial-section.php" );
	}

	if ( file_exists( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/team-section.php" ) ) {
		require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/team-section.php" );
	}

	if ( file_exists( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/client-section.php" ) ) {
		require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "public/includes/$current_theme/client-section.php" );
	}

	add_action( 'beastthemes_companion_slider', [ 'beastthemes_companion_slider_html', 'beastthemes_companion_slider_section' ] );
	add_action( 'beastthemes_companion_service', [ 'beastthemes_companion_service_html', 'beastthemes_companion_service_section' ] );
	add_action( 'beastthemes_companion_testimonial', [ 'beastthemes_companion_testimonial_html', 'beastthemes_companion_testimonial_section' ] );
	add_action( 'beastthemes_companion_team', [ 'beastthemes_companion_team_html', 'beastthemes_companion_team_section' ] );
	add_action( 'beastthemes_companion_client', [ 'beastthemes_companion_client_html', 'beastthemes_companion_client_section' ] );

}