<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

if ( ! function_exists( 'mega_charity_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Mega Charity 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function mega_charity_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'mega_charity_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'mega_charity_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Mega Charity 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function mega_charity_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'mega_charity_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'mega_charity_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Mega Charity 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function mega_charity_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'mega_charity_is_nav_btn_enable' ) ) :
	
	function mega_charity_is_nav_btn_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[nav_btn]' )->value() );
}
endif;

/**
 * Front Page Active Callbacks
 */
/*=================Hero Banner====================*/

/**
 * Check if hero_banner section is enabled.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_hero_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[hero_banner_section_enable]' )->value() );
}

/*=====================Service====================*/

/**
* Check if service section is enabled.
*
* @since Mega Charity 1.0.0
* @param WP_Customize_Control $control WP_Customize_Control instance.
* @return bool Whether the control is active to the current preview.
*/
function mega_charity_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[service_section_enable]' )->value() );
}

/*==================About=====================*/

/**
 * Check if about section is enabled.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[about_section_enable]' )->value() );
}

/*===================Counter====================*/

/**
 * Check if counter section is enabled.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_counter_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[counter_section_enable]' )->value() );
}

/*=====================Help Us=============================*/

/**
 * Check if help_us section is enabled.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_help_us_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[help_us_section_enable]' )->value() );
}

/*===============Team======================*/

/**
 * Check if team section is enabled.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_team_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[team_section_enable]' )->value() );
}

/*=========================Latest Posts==================*/

/**
 * Check if latest_posts section is enabled.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_latest_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[latest_posts_section_enable]' )->value() );
}

/**
 * Check if latest_posts section content type is category.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_latest_posts_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'mega_charity_theme_options_latest_posts_content_type' )->value();
	return mega_charity_is_latest_posts_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if latest_posts section content type is post.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_latest_posts_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'mega_charity_theme_options_latest_posts_content_type' )->value();
	return mega_charity_is_latest_posts_section_enable( $control ) && ( 'post' == $content_type );
}

/*==================Contact Us===============*/

/**
 * Check if contact section is enabled.
 *
 * @since Mega Charity 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_charity_is_contact_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_charity_theme_options[contact_section_enable]' )->value() );
}

