<?php
/**
 * Contact Section options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add Contact section
$wp_customize->add_section( 'mega_charity_contact_section', array(
	'title'             => esc_html__( 'Contact Section','mega-charity' ),
	'description'       => esc_html__( 'Contact Section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_front_page_panel',
	) );

// Contact content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[contact_section_enable]', array(
	'default'			=> 	$options['contact_section_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
	) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[contact_section_enable]', array(
	'label'             => esc_html__( 'Contact Section Enable', 'mega-charity' ),
	'section'           => 'mega_charity_contact_section',
	'on_off_label' 		=> mega_charity_switch_options(),
	) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[contact_section_enable]', array(
		'selector'            => '#contact-us .tooltiptext',
		'settings'            => 'mega_charity_theme_options[contact_section_enable]',
    ) );
}

// top description setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[contact_contact_info]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['contact_contact_info'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[contact_contact_info]', array(
	'label'           	=> esc_html__( 'Contact Info Text', 'mega-charity' ),
	'section'        	=> 'mega_charity_contact_section',
	'active_callback' 	=> 'mega_charity_is_contact_section_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[contact_contact_info]', array(
		'selector'            => '#contact-us p',
		'settings'            => 'mega_charity_theme_options[contact_contact_info]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_contact_contact_info_partial',
    ) );
}

// top description setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[contact_phone_no]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['contact_phone_no'],
) );

$wp_customize->add_control( 'mega_charity_theme_options[contact_phone_no]', array(
	'label'           	=> esc_html__( 'Enter Phone No.', 'mega-charity' ),
	'section'        	=> 'mega_charity_contact_section',
	'active_callback' 	=> 'mega_charity_is_contact_section_enable',
	'type'				=> 'text',
) );

// top description setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[contact_email]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['contact_email'],
) );

$wp_customize->add_control( 'mega_charity_theme_options[contact_email]', array(
	'label'           	=> esc_html__( 'Enter Email Address.', 'mega-charity' ),
	'section'        	=> 'mega_charity_contact_section',
	'active_callback' 	=> 'mega_charity_is_contact_section_enable',
	'type'				=> 'sanitize_email',
) );

// Contact content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[contact_social_menu_enable]', array(
	'default'			=> 	$options['contact_social_menu_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
	) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[contact_social_menu_enable]', array(
	'label'             => esc_html__( 'Contact Us Social Menu', 'mega-charity' ),
	'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show topbar menu.', 'mega-charity' ), esc_html__( 'Click Here', 'mega-charity' ), esc_html__( 'to create menu', 'mega-charity' ) ),
	'section'           => 'mega_charity_contact_section',
	'on_off_label' 		=> mega_charity_switch_options(),
	'active_callback' 	=> 'mega_charity_is_contact_section_enable',
	) ) );