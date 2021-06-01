<?php
/**
 * Dcode Additional Settings panel at Theme Customizer
 *
 * @package Dcode
 * @since 1.0.0
 */

add_action( 'customize_register', 'rdcode_additional_settings_register' );

function rdcode_additional_settings_register( $wp_customize ) {

	/**
     * Add Additional Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'rdcode_additional_settings_panel',
	    array(
	        'priority'       => 20,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Additional Settings', 'dcode' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
	 * Social Icons Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'rdcode_social_icons_section',
        array(
            'title'		=> esc_html__( 'Social Icons', 'dcode' ),
            'panel'     => 'rdcode_additional_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Repeater field for social media icons
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'social_media_icons', 
        array(
            'sanitize_callback' => 'rdcode_sanitize_repeater',
            'default' => json_encode(array(
                array(
                    'social_icon_class' => 'fab fa-facebook-f',
                    'social_icon_url'   => '',
                    )
            ))
        )
    );
    $wp_customize->add_control( new rdcode_Repeater_Controler(
        $wp_customize, 
            'social_media_icons', 
            array(
                'label'    => esc_html__( 'Social Media Icons', 'dcode' ),
                'section'  => 'rdcode_social_icons_section',
                'settings' => 'social_media_icons',
                'priority' => 5,
                'rdcode_box_label'       => esc_html__( 'Social Media Icon','dcode' ),
                'rdcode_box_add_control' => esc_html__( 'Add Icon','dcode' )
            ),
            array(
                'social_icon_class' => array(
                    'type'        => 'social_icon',
                    'label'       => esc_html__( 'Social Media Logo', 'dcode' ),
                    'description' => esc_html__( 'Choose social media icon.', 'dcode' )
                ),
                'social_icon_url' => array(
                    'type'        => 'url',
                    'label'       => esc_html__( 'Social Icon Url', 'dcode' ),
                    'description' => esc_html__( 'Enter social media url.', 'dcode' )
                )
            )
        ) 
    );
/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Contact Info Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'rdcode_contact_info_section',
        array(
            'title'     => esc_html__( 'Contact Info', 'dcode' ),
            'panel'     => 'rdcode_additional_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Top bar phone no.
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'top_bar_contact_number', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__( '+123-456-7890', 'dcode' )
        )
    );
    $wp_customize->add_control(
        'top_bar_contact_number',
        array(
            'type'         => 'text',
            'label'        => esc_html__( 'Phone Number', 'dcode' ),
            'description'  => esc_html__( 'Enter your contact number here.', 'dcode' ),
            'section'      => 'rdcode_contact_info_section',
            'settings'     => 'top_bar_contact_number',
            'priority'     => 15
        )
    );

    /**
     * Top bar Email addpress.
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'top_bar_email_address', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => 'info@example.com'
        )
    );
    $wp_customize->add_control(
        'top_bar_email_address',
        array(
            'type'         => 'text',
            'label'        => esc_html__( 'Email address', 'dcode' ),
            'description'  => esc_html__( 'Enter your contact email address here.', 'dcode' ),
            'section'      => 'rdcode_contact_info_section',
            'settings'     => 'top_bar_email_address',
            'priority'     => 15
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

}