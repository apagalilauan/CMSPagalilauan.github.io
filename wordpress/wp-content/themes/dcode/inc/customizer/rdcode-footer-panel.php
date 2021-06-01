<?php
/**
 * Dcode Footer Settings panel at Theme Customizer
 *
 * @package Dcode
 * @since 1.0.0
 */

add_action( 'customize_register', 'rdcode_footer_settings_register' );

function rdcode_footer_settings_register( $wp_customize ) {

	/**
     * Add Additional Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'rdcode_footer_settings_panel',
	    array(
	        'priority'       => 30,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Footer Settings', 'dcode' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
    
    /**
	 * Bottom Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'rdcode_footer_bottom_section',
        array(
            'title'	   => esc_html__( 'Bottom Section', 'dcode' ),
            'panel'    => 'rdcode_footer_settings_panel',
            'priority' => 10,
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Text field for copyright
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_copyright_text',
        array(
            'default'           => esc_html__( 'Copyright © 2020 | All Rights Reserved.', 'dcode' ),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'rdcode_copyright_text',
        array(
            'type'     => 'text',
            'label'    => esc_html__( 'Copyright Text', 'dcode' ),
            'section'  => 'rdcode_footer_bottom_section',
            'priority' => 5
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'rdcode_copyright_text', 
            array(
                'selector'        => '.footer-bottom .left-text',
                'render_callback' => 'rdcode_customize_partial_copyright',
            )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Text color for copyright
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_copyright_text_color',
        array(
            'default'   => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 'rdcode_copyright_text_color', 
            array(
                'label'      => esc_html__( 'Select copyright text color', 'dcode' ),
                'section'    => 'rdcode_footer_bottom_section',
                'settings'   => 'rdcode_copyright_text_color',
            ) 
        ) 
    );
    $wp_customize->selective_refresh->add_partial( 
        'rdcode_copyright_text_color', 
            array(
                'selector'        => '',
                'render_callback' => 'rdcode_customize_partial_copyright',
            )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

}