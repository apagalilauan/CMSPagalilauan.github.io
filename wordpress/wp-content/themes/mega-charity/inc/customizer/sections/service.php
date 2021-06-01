<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'mega_charity_service_section', array(
	'title'             => esc_html__( 'Services','mega-charity' ),
	'description'       => esc_html__( 'Services Section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'mega-charity' ),
	'section'           => 'mega_charity_service_section',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[service_section_enable]', array(
		'selector'            => '#our-services .tooltiptext',
		'settings'            => 'mega_charity_theme_options[service_section_enable]',
    ) );
}

// service title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[service_title]',
	array(
		'default'       		=> $options['service_title'],
		'sanitize_callback'		=> 'mega_charity_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'mega_charity_theme_options[service_title]',
    array(
		'label'      			=> esc_html__( 'Section Title', 'mega-charity' ),
		'section'    			=> 'mega_charity_service_section',
		'type'		 			=> 'textarea',
		'active_callback'		=> 'mega_charity_is_service_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[service_title]', array(
		'selector'            => '#our-services h2.section-title',
		'settings'            => 'mega_charity_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_service_title_partial',
    ) );
}

// service title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[service_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[service_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'mega-charity' ),
	'section'        	=> 'mega_charity_service_section',
	'active_callback' 	=> 'mega_charity_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[service_btn_title]', array(
		'selector'            => '#our-services a.btn',
		'settings'            => 'mega_charity_theme_options[service_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_service_btn_title_partial',
    ) );
}

$wp_customize->add_setting( 'mega_charity_theme_options[service_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'mega_charity_theme_options[service_btn_url]', array(
	'label'           	=> esc_html__( 'Button Url', 'mega-charity' ),
	'section'        	=> 'mega_charity_service_section',
	'active_callback' 	=> 'mega_charity_is_service_section_enable',
	'type'				=> 'url',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'mega_charity_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Mega_Charity_Icon_Picker( $wp_customize, 'mega_charity_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'mega-charity' ), $i ),
		'section'           => 'mega_charity_service_section',
		'active_callback'	=> 'mega_charity_is_service_section_enable',
	) ) );

	// service posts drop down chooser control and setting
	$wp_customize->add_setting( 'mega_charity_theme_options[service_content_post_' . $i . ']', array(
		'sanitize_callback' => 'mega_charity_sanitize_page',
	) );

	$wp_customize->add_control( new Mega_Charity_Dropdown_Chooser( $wp_customize, 'mega_charity_theme_options[service_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'mega-charity' ), $i ),
		'section'           => 'mega_charity_service_section',
		'choices'			=> mega_charity_post_choices(),
		'active_callback'	=> 'mega_charity_is_service_section_enable',
	) ) );

endfor;