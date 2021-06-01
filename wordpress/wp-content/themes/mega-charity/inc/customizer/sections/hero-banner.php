<?php
/**
 * Hero Banner Section options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add Hero Banner section
$wp_customize->add_section( 'mega_charity_hero_banner_section', array(
	'title'             => esc_html__( 'Hero Banner','mega-charity' ),
	'description'       => esc_html__( 'Hero Banner Section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_front_page_panel',
) );

// Hero Banner content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[hero_banner_section_enable]', array(
	'default'			=> 	$options['hero_banner_section_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[hero_banner_section_enable]', array(
	'label'             => esc_html__( 'Hero Banner Section Enable', 'mega-charity' ),
	'section'           => 'mega_charity_hero_banner_section',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[hero_banner_section_enable]', array(
		'selector'            => '#hero-banner .tooltiptext',
		'settings'            => 'mega_charity_theme_options[hero_banner_section_enable]',
    ) );
}

// hero_banner sub title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[hero_banner_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['hero_banner_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[hero_banner_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'mega-charity' ),
	'section'        	=> 'mega_charity_hero_banner_section',
	'active_callback' 	=> 'mega_charity_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[hero_banner_sub_title]', array(
		'selector'            => '#hero-banner h2.entry-title span',
		'settings'            => 'mega_charity_theme_options[hero_banner_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_hero_banner_sub_title_partial',
    ) );
}

// hero_banner posts drop down chooser control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[hero_banner_content_post]', array(
	'sanitize_callback' => 'mega_charity_sanitize_page',
) );

$wp_customize->add_control( new Mega_Charity_Dropdown_Chooser( $wp_customize, 'mega_charity_theme_options[hero_banner_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'mega-charity' ),
	'section'           => 'mega_charity_hero_banner_section',
	'choices'			=> mega_charity_post_choices(),
	'active_callback'	=> 'mega_charity_is_hero_banner_section_enable',
) ) );

// hero_banner btn title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[hero_banner_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['hero_banner_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[hero_banner_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'mega-charity' ),
	'section'        	=> 'mega_charity_hero_banner_section',
	'active_callback' 	=> 'mega_charity_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[hero_banner_btn_title]', array(
		'selector'            => '#hero-banner .read-more a.first-btn',
		'settings'            => 'mega_charity_theme_options[hero_banner_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_hero_banner_btn_title_partial',
    ) );
}

// hero_banner btn title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[hero_banner_alt_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['hero_banner_alt_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[hero_banner_alt_btn_title]', array(
	'label'           	=> esc_html__( 'Alternative Button Label', 'mega-charity' ),
	'section'        	=> 'mega_charity_hero_banner_section',
	'active_callback' 	=> 'mega_charity_is_hero_banner_section_enable',
	'type'				=> 'text',
) );
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[hero_banner_alt_btn_title]', array(
		'selector'            => '#hero-banner .read-more a.second-btn',
		'settings'            => 'mega_charity_theme_options[hero_banner_alt_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_hero_banner_alt_btn_title_partial',
    ) );
}

// hero_banner btn link setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[hero_banner_alt_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'mega_charity_theme_options[hero_banner_alt_btn_link]', array(
	'label'           	=> esc_html__( 'Alternative Button Link', 'mega-charity' ),
	'section'        	=> 'mega_charity_hero_banner_section',
	'active_callback' 	=> 'mega_charity_is_hero_banner_section_enable',
	'type'				=> 'url',
) );