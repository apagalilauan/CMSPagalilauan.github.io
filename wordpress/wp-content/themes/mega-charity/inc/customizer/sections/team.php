<?php
/**
 * Team Section options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add Team section
$wp_customize->add_section( 'mega_charity_team_section', array(
	'title'             => esc_html__( 'Teams','mega-charity' ),
	'description'       => esc_html__( 'Teams Section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_front_page_panel',
) );

// Team content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[team_section_enable]', array(
	'default'			=> 	$options['team_section_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[team_section_enable]', array(
	'label'             => esc_html__( 'Team Section Enable', 'mega-charity' ),
	'section'           => 'mega_charity_team_section',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );


if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[team_section_enable]', array(
		'selector'            => '#business-team .tooltiptext',
		'settings'            => 'mega_charity_theme_options[team_section_enable]',
    ) );
}

// team title setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[team_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['team_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[team_title]', array(
	'label'           	=> esc_html__( 'Title', 'mega-charity' ),
	'section'        	=> 'mega_charity_team_section',
	'active_callback' 	=> 'mega_charity_is_team_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[team_title]', array(
		'selector'            => '#business-team h2.section-title',
		'settings'            => 'mega_charity_theme_options[team_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_team_title_partial',
    ) );
}

for ( $i = 1; $i <= 4; $i++ ) :

	// team posts drop down chooser control and setting
	$wp_customize->add_setting( 'mega_charity_theme_options[team_content_post_' . $i . ']', array(
		'sanitize_callback' => 'mega_charity_sanitize_page',
	) );

	$wp_customize->add_control( new Mega_Charity_Dropdown_Chooser( $wp_customize, 'mega_charity_theme_options[team_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'mega-charity' ), $i ),
		'section'           => 'mega_charity_team_section',
		'choices'			=> mega_charity_post_choices(),
		'active_callback'	=> 'mega_charity_is_team_section_enable',
	) ) );

	// team custom content
	$wp_customize->add_setting( 'mega_charity_theme_options[team_position_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'mega_charity_theme_options[team_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'mega-charity' ), $i ),
		'section'           => 'mega_charity_team_section',
		'active_callback'	=> 'mega_charity_is_team_section_enable',
	) );

endfor;