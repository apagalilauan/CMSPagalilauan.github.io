<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'mega_charity_single_post_section', array(
	'title'             => esc_html__( 'Single Post','mega-charity' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'mega-charity' ),
	'panel'             => 'mega_charity_theme_options_panel',
) );

// Tourableve date meta setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'mega-charity' ),
	'section'           => 'mega_charity_single_post_section',
	'on_off_label' 		=> mega_charity_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'mega-charity' ),
	'section'           => 'mega_charity_single_post_section',
	'on_off_label' 		=> mega_charity_hide_options(),
) ) );