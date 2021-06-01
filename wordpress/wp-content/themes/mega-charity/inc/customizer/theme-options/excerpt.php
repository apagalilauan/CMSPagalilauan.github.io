<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'mega_charity_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','mega-charity' ),
	'description'       => esc_html__( 'Excerpt section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'mega_charity_sanitize_number_range',
	'validate_callback' => 'mega_charity_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'mega_charity_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'mega-charity' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'mega-charity' ),
	'section'     		=> 'mega_charity_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
