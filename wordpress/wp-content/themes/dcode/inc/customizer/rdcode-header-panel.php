<?php
/**
 * Dcode Header Settings panel at Theme Customizer
 *
 * @package Dcode
 * @since 1.0.0
 */

add_action( 'customize_register', 'rdcode_header_settings_register' );

function rdcode_header_settings_register( $wp_customize ) {

	/**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'rdcode_header_settings_panel',
	    array(
	        'priority'       => 10,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Header Settings', 'dcode' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
   
    /**
     * Top Header Section
     */
    $wp_customize->add_section(
        'rdcode_top_header_section',
        array(
            'title'     => esc_html__( 'Top Bar Section', 'dcode' ),
            'priority'  => 5,
            'panel'     => 'rdcode_header_settings_panel'
        )
    );

    /**
     * Switch option for Top Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_top_header_option',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
            'rdcode_top_header_option',
            array(
                'type'          => 'rdcode-switch',
                'label'         => esc_html__( 'Top Bar', 'dcode' ),
                'description'   => esc_html__( 'Show/Hide option for top header section.', 'dcode' ),
                'section'       => 'rdcode_top_header_section',
                'choices'       => array(
                    'show'      => esc_html__( 'Show', 'dcode' ),
                    'hide'      => esc_html__( 'Hide', 'dcode' )
                ),
                'priority'      => 5,
            )
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'rdcode_top_header_option', 
            array(
                'selector'        => '.header_top_contact',
                'render_callback' => 'rdcode_customize_partial_top_header',
            )
    );

    /**
     * Top Header Section Phone No
     */
    $wp_customize->add_setting(
        'rdcode_top_header_phone',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
        )
    );
    $wp_customize->add_control(new rdcode_Customize_Switch_Control(
        $wp_customize,
        'rdcode_top_header_phone',
        array(
            'type'        => 'rdcode-switch',
            'label'       => esc_html__( 'Top Header Phone No.', 'dcode' ),
            'description' => esc_html__( 'Show/Hide option for top header section Phone no.', 'dcode' ),
            'section'     => 'rdcode_top_header_section',
            'choices'     => array(
                'show' => esc_html__( 'Show', 'dcode' ),
                'hide' => esc_html__( 'Hide', 'dcode' ),
            ),
            'priority'    => 5,
        )
    )
    );
    $wp_customize->selective_refresh->add_partial(
        'rdcode_top_header_phone',
        array(
            'selector'        => 'li.header_top_phone',
            'render_callback' => 'rdcode_customize_partial_top_header',
        )
    );

    /**
     * Top Header Section Email
     */
    $wp_customize->add_setting(
        'rdcode_top_header_email',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
        'rdcode_top_header_email',
            array(
                'type'        => 'rdcode-switch',
                'label'       => esc_html__( 'Top Header Email', 'dcode'),
                'description' => esc_html__('Show/Hide option for top header section Email', 'dcode'),
                'section'     => 'rdcode_top_header_section',
                'choices'     => array(
                    'show' => esc_html__('Show', 'dcode'),
                    'hide' => esc_html__('Hide', 'dcode'),
                ),
                'priority'    => 5,
            )
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'rdcode_top_header_email',
        array(
            'selector'        => 'li.header_top_email',
            'render_callback' => 'rdcode_customize_partial_top_header',
        )
    );

    /**
     * Top Header Section Socila Icons
     */
    $wp_customize->add_setting(
        'rdcode_top_header_social_icons',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
        )
    );
    $wp_customize->add_control(new rdcode_Customize_Switch_Control(
        $wp_customize,
        'rdcode_top_header_social_icons',
        array(

            'type'        => 'rdcode-switch',
            'label'       => esc_html__('Top Bar Social Icons', 'dcode'),
            'description' => esc_html__('Show/Hide option for top header section Social Icons', 'dcode'),
            'section'     => 'rdcode_top_header_section',
            'choices'     => array(
                'show' => esc_html__('Show', 'dcode'),
                'hide' => esc_html__('Hide', 'dcode'),
            ),
            'priority'    => 5,
        )
    )
    );
    $wp_customize->selective_refresh->add_partial(
        'rdcode_top_header_social_icons',
        array(
            'selector'        => '.topbar-icon',
            'render_callback' => 'rdcode_customize_partial_top_header',
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Header Option Section
     */
    $wp_customize->add_section(
        'rdcode_header_option_section',
        array(
            'title'    => esc_html__( 'Header Options', 'dcode' ),
            'priority' => 10,
            'panel'    => 'rdcode_header_settings_panel',
        )
    );

    /**
     * Switch option for Home Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_menu_sticky_option',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
        'rdcode_menu_sticky_option',
        array(
            'type'        => 'rdcode-switch',
            'label'       => esc_html__('Sticky Menu', 'dcode'),
            'description' => esc_html__('Enable/Disable option for sticky menu.', 'dcode'),
            'section'     => 'rdcode_header_option_section',
            'choices'     => array(
                'show' => esc_html__('Enable', 'dcode'),
                'hide' => esc_html__('Disable', 'dcode'),
            ),
            'priority'    => 5,
        )
    )
    );

    /**
     * Switch option for Search Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_search_icon_option',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
        'rdcode_search_icon_option',
            array(
                'type'        => 'rdcode-switch',
                'label'       => esc_html__('Search Icon', 'dcode' ),
                'description' => esc_html__('Show/Hide option for search icon at primary menu.', 'dcode'),
                'section'     => 'rdcode_header_option_section',
                'choices'     => array(
                    'show' => esc_html__('Show', 'dcode'),
                    'hide' => esc_html__('Hide', 'dcode'),
                ),
                'priority'    => 10,
            )
        )
    );
    $wp_customize->selective_refresh->add_partial(
    'rdcode_search_icon_option',
        array(
            'selector'        => '.nvbar_icon li.nav-item',
            'render_callback' => 'rdcode_customize_partial_top_header',
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Header Option Section
     */
    $wp_customize->add_section(
        'rdcode_beadcrumb_option_section',
        array(
            'title'    => esc_html__( 'Breadcrumb Options', 'dcode' ),
            'priority' => 10,
            'panel'    => 'rdcode_header_settings_panel',
        )
    );

    /**
     * Switch option for Search Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_bead_div_option',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
        'rdcode_bead_div_option',
            array(
                'type'        => 'rdcode-switch',
                'label'       => esc_html__( 'Breadcrumb Section', 'dcode' ),
                'description' => esc_html__( 'Show/Hide breadcrumb section from top.', 'dcode'),
                'section'     => 'rdcode_beadcrumb_option_section',
                'choices'     => array(
                    'show' => esc_html__( 'Show', 'dcode' ),
                    'hide' => esc_html__( 'Hide', 'dcode' ),
                ),
                'priority'    => 10,
            )
        )
    );
    $wp_customize->selective_refresh->add_partial(
    'rdcode_bead_div_option',
        array(
            'selector'        => '.breadcrumb-main row',
            'render_callback' => 'rdcode_customize_partial_top_header',
        )
    );

}