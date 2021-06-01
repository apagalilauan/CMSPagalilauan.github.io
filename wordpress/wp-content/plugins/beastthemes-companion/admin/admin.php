<?php
defined('ABSPATH') or die();

require_once( 'includes/controllers/class-call-theme-action.php' );
require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH. 'admin/includes/helpers/helper.php' );

/**
 * action calls for all functions
 */
add_action( 'init', array( 'BeastThemesCompanionTheme', 'beastthemes_companion_init' ) );

function beastthemes_companion_scripts() {

	$current_theme = BeastThemesCompanionHelper::beastthemes_companion_get_theme_name();

	if ( $current_theme == 'Dcode' ) {
		wp_enqueue_style( 'lity-min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/css/lity.min.css' );
	    wp_enqueue_style( 'slick', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/css/slick.css' );

	    wp_enqueue_script( 'lity.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/lity.min.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'shuffle.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/shuffle.min.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'slick.min', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/slick.min.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'masonry', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/masonry.pkgd.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'beastthemes-dcode-script', BEASTTHEMES_COMPANION_PLUGIN_URL.'assets/js/dcode-script.js', array( 'jquery' ), '', true );
	}
}
add_action( 'wp_enqueue_scripts', 'beastthemes_companion_scripts' );