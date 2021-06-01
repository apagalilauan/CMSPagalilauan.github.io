<?php
defined('ABSPATH') or die();

/**
 * Beastthemes companion helper class
 */
class BeastThemesCompanionHelper {
    
    /* Get theme name and version */
    public static function beastthemes_companion_get_theme_name() {
        if ( get_bloginfo( 'version' ) < '3.4' ) {
            $theme_data      = wp_get_theme( get_stylesheet_directory() . '/style.css' );
            $theme_name      = $theme_data['Name'];
        } else {
            $theme_name      = wp_get_theme();
        }
        return $theme_name;
    }

    public static function beastthemes_companion_get_theme_version( $name, $version ) {
        if ( get_bloginfo( 'version' ) < '3.4' ) {
            $my_theme = wp_get_theme( get_stylesheet_directory() . '/style.css' );
        } else {
            $my_theme = wp_get_theme();
        }

        $theme_name    = $my_theme->get( 'Name' );
        $theme_version = $my_theme->get( 'Version' );

        if ( $name == $theme_name && $theme_version > $version ) {
            return true;
        } else {
            return false;
        }
    }
}