<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'mega_charity_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'mega-charity' ),
		'priority'   			=> 900,
		'panel'      			=> 'mega_charity_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'mega_charity_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'mega_charity_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'mega_charity_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'mega-charity' ),
		'section'    			=> 'mega_charity_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_charity_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'mega_charity_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_charity_copyright_text_partial',
    ) );
}