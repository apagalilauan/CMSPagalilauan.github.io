<?php
/**
 * Counter Section options
 *
 * @package Theme Palace
 * @subpackage Blog Diary Pro
 * @since Blog Diary Pro 1.0.0
 */

// Add Counter section
$wp_customize->add_section( 'mega_charity_counter_section', array(
	'title'             => esc_html__( 'Counter','mega-charity' ),
	'description'       => esc_html__( 'Counter Section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_front_page_panel',
) );

// Counter content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[counter_section_enable]', array(
	'default'			=> 	$options['counter_section_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[counter_section_enable]', array(
	'label'             => esc_html__( 'Counter Section Enable', 'mega-charity' ),
	'section'           => 'mega_charity_counter_section',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[counter_section_enable]', array(
		'selector'            => '#counter .tooltiptext',
		'settings'            => 'mega_charity_theme_options[counter_section_enable]',
    ) );
}

for ( $i = 1; $i <= 4; $i++ ) :

	// counter title setting and control
	$wp_customize->add_setting( 'mega_charity_theme_options[counter_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'mega_charity_theme_options[counter_value_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Value %d', 'mega-charity' ), $i ),
		'section'        	=> 'mega_charity_counter_section',
		'active_callback' 	=> 'mega_charity_is_counter_section_enable',
		'type'				=> 'text',
	) );

	// counter position setting and control
	$wp_customize->add_setting( 'mega_charity_theme_options[counter_label_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'mega_charity_theme_options[counter_label_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Label %d', 'mega-charity' ), $i ),
		'section'        	=> 'mega_charity_counter_section',
		'active_callback' 	=> 'mega_charity_is_counter_section_enable',
		'type'				=> 'textarea',
	) );

	// counter hr setting and control
	$wp_customize->add_setting( 'mega_charity_theme_options[counter_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Mega_Charity_Customize_Horizontal_Line( $wp_customize, 'mega_charity_theme_options[counter_hr_'. $i .']',
		array(
			'section'         => 'mega_charity_counter_section',
			'active_callback' => 'mega_charity_is_counter_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;