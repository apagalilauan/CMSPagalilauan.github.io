<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Mega Charity
* @since Mega Charity 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'mega_charity_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'mega_charity_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'mega_charity_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'mega-charity' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'mega-charity' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'mega_charity_is_static_homepage_enable',
) );