<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'mega_charity_menu', array(
	'title'             => esc_html__('Header Menu','mega-charity'),
	'description'       => esc_html__( 'Header Menu options.', 'mega-charity' ),
	'panel'             => 'nav_menus',
) );

// counter image setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[menu_image]', array(
	'sanitize_callback' => 'mega_charity_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mega_charity_theme_options[menu_image]',
		array(
		'label'       		=> esc_html__( 'Menu Image', 'mega-charity' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'mega-charity' ), 1231, 985 ),
		'section'     		=> 'mega_charity_menu',
) ) );

// button enable setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[nav_btn]', array(
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
	'default'           => $options['nav_btn'],
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[nav_btn]', array(
	'label'             => esc_html__( 'Enable Button', 'mega-charity' ),
	'section'           => 'mega_charity_menu',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

// button text setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[nav_btn_txt]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['nav_btn_txt'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[nav_btn_txt]', array(
	'label'           	=> esc_html__( 'Button Label', 'mega-charity' ),
	'active_callback' 	=> 'mega_charity_is_nav_btn_enable',
	'section'        	=> 'mega_charity_menu',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[nav_btn_txt]', array(
		'selector'            => '#site-menu li.custom-menu-item a',
		'settings'            => 'mega_charity_theme_options[nav_btn_txt]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_nav_btn_txt_partial',
    ) );
}

// button url setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[nav_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $options['nav_btn_url'],
) );

$wp_customize->add_control( 'mega_charity_theme_options[nav_btn_url]', array(
	'label'           	=> esc_html__( 'Button URL', 'mega-charity' ),
	'section'        	=> 'mega_charity_menu',
	'active_callback' 	=> 'mega_charity_is_nav_btn_enable',
	'type'				=> 'url'
) );