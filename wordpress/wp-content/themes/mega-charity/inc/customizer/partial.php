<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Mega Charity
* @since Mega Charity 1.0.0
*/

if ( ! function_exists( 'mega_charity_nav_btn_txt_partial' ) ) :
    // nav_btn_txt
    function mega_charity_nav_btn_txt_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['nav_btn_txt'] );
    }
endif;

if ( ! function_exists( 'mega_charity_copyright_text_partial' ) ) :
    // footer_description
    function mega_charity_copyright_text_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['footer_description'] );
    }
endif;

if ( ! function_exists( 'mega_charity_footer_btn_text_partial' ) ) :
    // footer_btn_text
    function mega_charity_footer_btn_text_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['footer_btn_text'] );
    }
endif;

if ( ! function_exists( 'mega_charity_hero_banner_sub_title_partial' ) ) :
    // hero_banner_sub_title
    function mega_charity_hero_banner_sub_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['hero_banner_sub_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_hero_banner_btn_title_partial' ) ) :
    // hero_banner_btn_title
    function mega_charity_hero_banner_btn_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['hero_banner_btn_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_hero_banner_alt_btn_title_partial' ) ) :
    // hero_banner_alt_btn_title
    function mega_charity_hero_banner_alt_btn_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['hero_banner_alt_btn_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_service_title_partial' ) ) :
    // service_title
    function mega_charity_service_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_service_btn_title_partial' ) ) :
    // service_btn_title
    function mega_charity_service_btn_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['service_btn_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_about_sub_title_partial' ) ) :
    // about sub title
    function mega_charity_about_sub_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['about_sub_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_about_btn_title_partial' ) ) :
    // about btn title
    function mega_charity_about_btn_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_help_us_subtitle_partial' ) ) :
    // help_us_subtitle
    function mega_charity_help_us_subtitle_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['help_us_subtitle'] );
    }
endif;

if ( ! function_exists( 'mega_charity_help_us_title_partial' ) ) :
    // help_us_title
    function mega_charity_help_us_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['help_us_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_help_us_btn_partial' ) ) :
    // help_us_btn
    function mega_charity_help_us_btn_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['help_us_btn'] );
    }
endif;

if ( ! function_exists( 'mega_charity_team_title_partial' ) ) :
    // team_title
    function mega_charity_team_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['team_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_latest_posts_title_partial' ) ) :
    // latest_posts_title
    function mega_charity_latest_posts_title_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['latest_posts_title'] );
    }
endif;

if ( ! function_exists( 'mega_charity_contact_contact_info_partial' ) ) :
    // contact_contact_info
    function mega_charity_contact_contact_info_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['contact_contact_info'] );
    }
endif;

if ( ! function_exists( 'mega_charity_read_more_text_partial' ) ) :
    // read_more_text
    function mega_charity_read_more_text_partial() {
        $options = mega_charity_get_theme_options();
        return esc_html( $options['read_more_text'] );
    }
endif;