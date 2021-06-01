<?php
defined('ABSPATH') or die();

require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH. 'admin/includes/helpers/helper.php' );

/**
 * Class to set home page
 */
 class BeastThemesCompanionTheme {

 	/* Select theme for companion plugin */
    public static function beastthemes_companion_init() {

		$current_theme = BeastThemesCompanionHelper::beastthemes_companion_get_theme_name();
		
		if ( file_exists( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "admin/includes/controllers/$current_theme/init.php" ) ) {
			require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . "admin/includes/controllers/$current_theme/init.php" );
		}
	}
 }