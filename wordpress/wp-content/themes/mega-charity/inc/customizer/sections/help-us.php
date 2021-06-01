<?php
/**
 * Help Us Section options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add Help Us section
$wp_customize->add_section( 'mega_charity_help_us_section', array(
    'title'             => esc_html__( 'Help Us','mega-charity' ),
    'description'       => esc_html__( 'Help Us Section options.', 'mega-charity' ),
    'panel'             => 'mega_charity_front_page_panel',
) );

// Help Us content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[help_us_section_enable]', array(
    'default'           =>  $options['help_us_section_enable'],
    'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[help_us_section_enable]', array(
    'label'             => esc_html__( 'Help Us Section Enable', 'mega-charity' ),
    'section'           => 'mega_charity_help_us_section',
    'on_off_label'      => mega_charity_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[help_us_section_enable]', array(
        'selector'            => '#help-us .tooltiptext',
        'settings'            => 'mega_charity_theme_options[help_us_section_enable]',
    ) );
}

// help_us title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[help_us_subtitle]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['help_us_subtitle'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[help_us_subtitle]', array(
    'label'             => esc_html__( 'Sub Title', 'mega-charity' ),
    'section'           => 'mega_charity_help_us_section',
    'active_callback'   => 'mega_charity_is_help_us_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[help_us_subtitle]', array(
        'selector'            => '#help-us p.section-subtitle',
        'settings'            => 'mega_charity_theme_options[help_us_subtitle]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'mega_charity_help_us_subtitle_partial',
    ) );
}

// help_us title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[help_us_title]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['help_us_title'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[help_us_title]', array(
    'label'             => esc_html__( 'Title', 'mega-charity' ),
    'section'           => 'mega_charity_help_us_section',
    'active_callback'   => 'mega_charity_is_help_us_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[help_us_title]', array(
        'selector'            => '#help-us h2.section-title',
        'settings'            => 'mega_charity_theme_options[help_us_title]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'mega_charity_help_us_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
 
     // help_us posts drop down chooser control and setting
    $wp_customize->add_setting( 'mega_charity_theme_options[help_us_content_post_' . $i . ']', array(
        'sanitize_callback' => 'mega_charity_sanitize_page',
    ) );

    $wp_customize->add_control( new Mega_Charity_Dropdown_Chooser( $wp_customize, 'mega_charity_theme_options[help_us_content_post_' . $i . ']', array(
        'label'             => sprintf( esc_html__( 'Select Post %d', 'mega-charity' ), $i ),
        'section'           => 'mega_charity_help_us_section',
        'choices'           => mega_charity_post_choices(),
        'active_callback'   => 'mega_charity_is_help_us_section_enable',
    ) ) );
endfor;

// help_us btn setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[help_us_btn]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['help_us_btn'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[help_us_btn]', array(
    'label'             => esc_html__( 'Button', 'mega-charity' ),
    'section'           => 'mega_charity_help_us_section',
    'active_callback'   => 'mega_charity_is_help_us_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[help_us_btn]', array(
        'selector'            => '#help-us a.btn',
        'settings'            => 'mega_charity_theme_options[help_us_btn]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'mega_charity_help_us_btn_partial',
    ) );
}