<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

$wp_customize->add_section( 'mega_charity_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','mega-charity' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'mega-charity' ),
	'section'          	=> 'mega_charity_breadcrumb',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'mega_charity_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'mega-charity' ),
	'active_callback' 	=> 'mega_charity_is_breadcrumb_enable',
	'section'          	=> 'mega_charity_breadcrumb',
) );
