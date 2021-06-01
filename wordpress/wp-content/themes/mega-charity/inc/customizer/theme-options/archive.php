<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'mega_charity_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','mega-charity' ),
	'description'       => esc_html__( 'Archive section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'mega-charity' ),
	'section'           => 'mega_charity_archive_section',
	'on_off_label' 		=> mega_charity_hide_options(),
) ) );

// Archive category setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'mega-charity' ),
	'section'           => 'mega_charity_archive_section',
	'on_off_label' 		=> mega_charity_hide_options(),
) ) );
