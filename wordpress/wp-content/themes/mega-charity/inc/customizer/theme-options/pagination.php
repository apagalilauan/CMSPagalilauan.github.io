<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'mega_charity_pagination', array(
	'title'               => esc_html__('Pagination','mega-charity'),
	'description'         => esc_html__( 'Pagination section options.', 'mega-charity' ),
	'panel'               => 'mega_charity_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'mega-charity' ),
	'section'             => 'mega_charity_pagination',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'mega_charity_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'mega_charity_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'mega-charity' ),
	'section'             => 'mega_charity_pagination',
	'type'                => 'select',
	'choices'			  => mega_charity_pagination_options(),
	'active_callback'	  => 'mega_charity_is_pagination_enable',
) );
