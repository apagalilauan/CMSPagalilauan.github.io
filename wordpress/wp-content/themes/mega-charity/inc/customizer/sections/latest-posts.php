<?php
/**
 * Latest Posts Section options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Add Latest Posts section
$wp_customize->add_section( 'mega_charity_latest_posts_section', array(
	'title'             => esc_html__( 'Latest Posts','mega-charity' ),
	'description'       => esc_html__( 'Latest Posts Section options.', 'mega-charity' ),
	'panel'             => 'mega_charity_front_page_panel',
) );

// Latest Posts content enable control and setting
$wp_customize->add_setting( 'mega_charity_theme_options[latest_posts_section_enable]', array(
	'default'			=> 	$options['latest_posts_section_enable'],
	'sanitize_callback' => 'mega_charity_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Charity_Switch_Control( $wp_customize, 'mega_charity_theme_options[latest_posts_section_enable]', array(
	'label'             => esc_html__( 'Latest Posts Section Enable', 'mega-charity' ),
	'section'           => 'mega_charity_latest_posts_section',
	'on_off_label' 		=> mega_charity_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[latest_posts_section_enable]', array(
		'selector'            => '#latest .tooltiptext',
		'settings'            => 'mega_charity_theme_options[latest_posts_section_enable]',
    ) );
}

// Latest Posts btn label setting and control
$wp_customize->add_setting( 'mega_charity_theme_options[latest_posts_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['latest_posts_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_charity_theme_options[latest_posts_title]', array(
	'label'           	=> esc_html__( 'Latest Posts Title', 'mega-charity' ),
	'section'        	=> 'mega_charity_latest_posts_section',
	'active_callback' 	=> 'mega_charity_is_latest_posts_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[latest_posts_title]', array(
		'selector'            => '#latest h2.section-title',
		'settings'            => 'mega_charity_theme_options[latest_posts_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_latest_posts_title_partial',
    ) );
}

// Latest Posts content type control and setting
$wp_customize->add_setting( 'mega_charity_theme_options_latest_posts_content_type', array(
	'default'          	=> $options['latest_posts_content_type'],
	'sanitize_callback' => 'mega_charity_sanitize_select',
) );

$wp_customize->add_control( 'mega_charity_theme_options_latest_posts_content_type', array(
	'label'             => esc_html__( 'Content Type', 'mega-charity' ),
	'section'           => 'mega_charity_latest_posts_section',
	'type'				=> 'select',
	'active_callback' 	=> 'mega_charity_is_latest_posts_section_enable',
	'choices'			=> array(
		'post'      => esc_html__( 'Post', 'mega-charity' ),
		'category'  => esc_html__( 'Category', 'mega-charity' ),
		),
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// latest_posts posts drop down chooser control and setting
	$wp_customize->add_setting( 'mega_charity_theme_options[latest_posts_content_post_' . $i . ']', array(
		'sanitize_callback' => 'mega_charity_sanitize_page',
	) );

	$wp_customize->add_control( new Mega_Charity_Dropdown_Chooser( $wp_customize, 'mega_charity_theme_options[latest_posts_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'mega-charity' ), $i ),
		'section'           => 'mega_charity_latest_posts_section',
		'choices'			=> mega_charity_post_choices(),
		'active_callback'	=> 'mega_charity_is_latest_posts_section_content_post_enable',
	) ) );

endfor;

// Add dropdown category setting and control.
$wp_customize->add_setting(  'mega_charity_theme_options[latest_posts_content_category]', array(
	'sanitize_callback' => 'mega_charity_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Mega_Charity_Dropdown_Taxonomies_Control( $wp_customize,'mega_charity_theme_options[latest_posts_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'mega-charity' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'mega-charity' ),
	'section'           => 'mega_charity_latest_posts_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'mega_charity_is_latest_posts_section_content_category_enable'
) ) );

