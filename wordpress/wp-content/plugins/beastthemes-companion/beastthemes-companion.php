<?php
/*
Plugin Name: BeastThemes Companion
Plugin URI:
Description: BeastThemes Companion Enhances themes with extra functionality and Extra sections.
Author: BeastThemes
Author URI: https://beastthemes.com/
Version: 1.0.5
Text Domain: beastthemes_companion
Domain Path: /lang/
*/

defined('ABSPATH') or die();

if ( ! defined( 'BEASTTHEMES_COMPANION_PLUGIN_URL' ) ) {
    define( 'BEASTTHEMES_COMPANION_PLUGIN_URL', plugin_dir_url(__FILE__) );
}

if ( ! defined( 'BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH' ) ) {
    define( 'BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__) );
}

if ( ! defined( 'BEASTTHEMES_COMPANION_PLUGIN_BASENAME' ) ) {
    define('BEASTTHEMES_COMPANION_PLUGIN_BASENAME', plugin_basename(__FILE__) );
}

if ( ! defined( 'BEASTTHEMES_COMPANION_PLUGIN_FILE' ) ) {
    define( 'BEASTTHEMES_COMPANION_PLUGIN_FILE', __FILE__ );
}

final class BeastThemesCompanionInit {
    private static $instance = null;

    private function __construct() {
        $this->initialize_hooks();
        $this->setup_init();
    }

    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function initialize_hooks() {
        require_once('admin/admin.php');
        require_once('public/public.php');
    }

    private function setup_init() {
        require( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . '/admin/includes/controllers/dcode/class-page-template.php' );
        add_filter( 'theme_page_templates', array( 'BeastThemesCompanionPageTemplates', 'add_page_template_to_dropdown' ) );
        add_filter( 'page_template', array( 'BeastThemesCompanionPageTemplates', 'catch_plugin_template' ) );
        register_activation_hook( __FILE__, array( 'BeastThemesCompanionPageTemplates', 'setup_homepage_template' ) );
    }
}
BeastThemesCompanionInit::get_instance();