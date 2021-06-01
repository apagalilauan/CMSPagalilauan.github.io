<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add About section
$wp_customize->add_section( 'mega_charity_about_section', array(
	'title'             => esc_html__( 'About Us','mega-charity' ),
	'description'       => esc_html__( 'About Us Section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'mega-charity' ),
	'section'           => 'mega_charity_about_section',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[about_section_enable]', array(
		'selector'            => '#about-us .tooltiptext',
		'settings'            => 'mega_charity_theme_options[about_section_enable]',
    ) );
}

// about image setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[about_image_1]', array(
	'sanitize_callback' => 'mega_charity_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mega_charity_theme_options[about_image_1]',
		array(
		'label'       		=> esc_html__( 'About First Image', 'mega-charity' ),
		'section'     		=> 'mega_charity_about_section',
		'active_callback'	=> 'mega_charity_is_about_section_enable',
) ) );

// about image setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[about_image_2]', array(
	'sanitize_callback' => 'mega_charity_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mega_charity_theme_options[about_image_2]',
		array(
		'label'       		=> esc_html__( 'About Second Image', 'mega-charity' ),
		'section'     		=> 'mega_charity_about_section',
		'active_callback'	=> 'mega_charity_is_about_section_enable',
) ) );

// about sub title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[about_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[about_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'mega-charity' ),
	'section'        	=> 'mega_charity_about_section',
	'active_callback' 	=> 'mega_charity_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[about_sub_title]', array(
		'selector'            => '#about-us h2.section-title span',
		'settings'            => 'mega_charity_theme_options[about_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_about_sub_title_partial',
    ) );
}

// about posts drop down chooser control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[about_content_post]', array(
	'sanitize_callback' => 'mega_charity_sanitize_page',
) );

$wp_customize->add_control( new Mega_Charity_Dropdown_Chooser( $wp_customize, 'mega_charity_theme_options[about_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'mega-charity' ),
	'section'           => 'mega_charity_about_section',
	'choices'			=> mega_charity_post_choices(),
	'active_callback'	=> 'mega_charity_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'mega-charity' ),
	'section'        	=> 'mega_charity_about_section',
	'active_callback' 	=> 'mega_charity_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[about_btn_title]', array(
		'selector'            => '#about-us .wrapper .read-more a',
		'settings'            => 'mega_charity_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_about_btn_title_partial',
    ) );
}