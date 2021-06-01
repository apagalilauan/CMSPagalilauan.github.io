<?php
/**
 * Dcode General Settings panel at Theme Customizer
 *
 * @package Dcode
 * @since 1.0.0
 */

add_action( 'customize_register', 'rdcode_general_settings_register' );

function rdcode_general_settings_register( $wp_customize ) {

    // Register the radio image control class as a JS control type.
    $wp_customize->register_control_type( 'rdcode_Customize_Image_Radio_Control' );
    $wp_customize->register_control_type( 'rdcode_Customizer_Heading' );

    $wp_customize->get_section( 'title_tagline' )->panel        = 'rdcode_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority     = '5';
    $wp_customize->get_section( 'colors' )->panel               = 'rdcode_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority            = '10';
    $wp_customize->get_section( 'background_image' )->panel     = 'rdcode_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority  = '15';
    $wp_customize->get_section( 'header_image' )->panel         = 'rdcode_general_settings_panel';
    $wp_customize->get_section( 'header_image' )->priority      = '20';
    $wp_customize->get_section( 'static_front_page' )->panel    = 'rdcode_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '25';

    /**
     * Add Appearance Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'rdcode_general_settings_panel',
	    array(
	        'priority'       => 5,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Appearance Settings', 'dcode' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Color option for theme
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_theme_color',
        array(
            'default'           => '#131935',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'rdcode_theme_color',
            array(
                'label'    => esc_html__( 'Theme Color', 'dcode' ),
                'section'  => 'colors',
                'priority' => 5
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Color option for Links
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_link_color',
        array(
            'default'           => '#131935',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'rdcode_link_color',
            array(
                'label'    => esc_html__( 'Link Color', 'dcode' ),
                'section'  => 'colors',
                'priority' => 5
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Color option for buttons
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_btn_color',
        array(
            'default'           => '#b5a067',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'rdcode_btn_color',
            array(
                'label'    => esc_html__( 'Button Color', 'dcode' ),
                'section'  => 'colors',
                'priority' => 5
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Color option for button border
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_btn_border_color',
        array(
            'default'           => '#b5a067',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'rdcode_btn_border_color',
            array(
                'label'    => esc_html__( 'Button Border Color', 'dcode' ),
                'section'  => 'colors',
                'priority' => 5
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Color option for button Hover
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_btn_hover_color',
        array(
            'default'           => '#131935',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'rdcode_btn_hover_color',
            array(
                'label'    => esc_html__( 'Button Hover Color', 'dcode' ),
                'section'  => 'colors',
                'priority' => 5
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Color option for button Hover border
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_btn_hover_border_color',
        array(
            'default'           => '#131935',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'rdcode_btn_hover_border_color',
            array(
                'label'    => esc_html__( 'Button Border Color on Hover', 'dcode' ),
                'section'  => 'colors',
                'priority' => 5
            )
        )
    );
    
/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Website layout section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'rdcode_website_layout_section',
        array(
            'title'       => esc_html__( 'Website Layout', 'dcode' ),
            'description' => esc_html__( 'Choose a layout to display your website more effectively.', 'dcode' ),
            'priority'    => 55,
            'panel'       => 'rdcode_general_settings_panel',
        )
    );
    
    /**
     * Site layout
     */
    $wp_customize->add_setting(
        'rdcode_site_layout',
        array(
            'default'           => 'fullwidth_layout',
            'sanitize_callback' => 'sanitize_key',
        )       
    );
    $wp_customize->add_control(
        new rdcode_Customize_Image_Radio_Control(
            $wp_customize,
            'rdcode_site_layout',
            array(
                'type'     => 'rdcode-radio-image',
                'label'    => esc_html__( 'Site Layout', 'dcode' ),
                'section'  => 'rdcode_website_layout_section',
                'choices'  => array(
                    'fullwidth_layout' => array(
                        'label' => esc_html__( 'Full width layout', 'dcode' ),
                        'url'   => '%s/assets/images/customizer/full-1.png'
                    ),
                    'boxed_layout' => array(
                        'label' => esc_html__( 'Boxed layout', 'dcode' ),
                        'url'   => '%s/assets/images/customizer/full.png'
                    )
                ),
                'priority' => 5,
            )
        )
    );

    /**
     * page sidebar layout
     */
    $wp_customize->add_setting(
        'rdcode_page_sidebar_layout',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )       
    );
    $wp_customize->add_control(
        new rdcode_Customize_Image_Radio_Control(
            $wp_customize,
            'rdcode_page_sidebar_layout',
            array(
                'type'     => 'rdcode-radio-image',
                'label'    => esc_html__( 'Page Sidebar Layout', 'dcode' ),
                'section'  => 'rdcode_website_layout_section',
                'choices'  => array(
                    'no_sidebar' => array(
                        'label'    => esc_html__( 'Full width layout', 'dcode' ),
                        'url'      => '%s/assets/images/customizer/full.png'
                    ),
                    'left_sidebar' => array(
                        'label'    => esc_html__( 'Left Sidebar', 'dcode' ),
                        'url'      => '%s/assets/images/customizer/left.png'
                    ),
                    'right_sidebar' => array(
                        'label'     => esc_html__( 'Right Sidebar', 'dcode' ),
                        'url'       => '%s/assets/images/customizer/right.png'
                    )
                ),
                'priority' => 5,
            )
        )
    );

    /**
     * Blog sidebar layout
     */
    $wp_customize->add_setting(
        'rdcode_blog_sidebar_layout',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )       
    );
    $wp_customize->add_control(
        new rdcode_Customize_Image_Radio_Control(
            $wp_customize,
            'rdcode_blog_sidebar_layout',
            array(
                'type'     => 'rdcode-radio-image',
                'label'    => esc_html__( 'Archive Sidebar Layout', 'dcode' ),
                'section'  => 'rdcode_website_layout_section',
                'choices'  => array(
                    'no_sidebar' => array(
                        'label'    => esc_html__( 'Full-width layout', 'dcode' ),
                        'url'      => '%s/assets/images/customizer/full.png'
                    ),
                    'left_sidebar' => array(
                        'label'    => esc_html__( 'Left Sidebar', 'dcode' ),
                        'url'      => '%s/assets/images/customizer/left.png'
                    ),
                    'right_sidebar' => array(
                        'label'     => esc_html__( 'Right Sidebar', 'dcode' ),
                        'url'       => '%s/assets/images/customizer/right.png'
                    )
                ),
                'priority' => 5,
            )
        )
    );

    /**
     * Post( Single-page ) sidebar layout
     */
    $wp_customize->add_setting(
        'rdcode_single_sidebar_layout',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )       
    );
    $wp_customize->add_control(
        new rdcode_Customize_Image_Radio_Control(
            $wp_customize,
            'rdcode_single_sidebar_layout',
            array(
                'type'     => 'rdcode-radio-image',
                'label'    => esc_html__( 'Post( Single-page ) sidebar Layout', 'dcode' ),
                'section'  => 'rdcode_website_layout_section',
                'choices'  => array(
                    'no_sidebar' => array(
                        'label'    => esc_html__( 'Full-width layout', 'dcode' ),
                        'url'      => '%s/assets/images/customizer/full.png'
                    ),
                    'left_sidebar' => array(
                        'label'    => esc_html__( 'Left Sidebar', 'dcode' ),
                        'url'      => '%s/assets/images/customizer/left.png'
                    ),
                    'right_sidebar' => array(
                        'label'     => esc_html__( 'Right Sidebar', 'dcode' ),
                        'url'       => '%s/assets/images/customizer/right.png'
                    )
                ),
                'priority' => 5,
            )
        )
    );

    /**
     * Scroll to top
     */
    $wp_customize->add_setting(
        'rdcode_scroll_to_top',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
        'rdcode_scroll_to_top',
            array(
                'type'        => 'rdcode-switch',
                'label'       => esc_html__( 'Scroll to top', 'dcode' ),
                'description' => esc_html__( 'Show/Hide option for scroll to top icon in bottom', 'dcode' ),
                'section'     => 'rdcode_website_layout_section',
                'choices'     => array(
                    'show' => esc_html__( 'Show', 'dcode' ),
                    'hide' => esc_html__( 'Hide', 'dcode' ),
                ),
                'priority'    => 10,
            )
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'rdcode_scroll_to_top',
        array(
            'selector'       => 'li.header_top_email',
            'render_callback' => 'rdcode_customize_partial_top_header',
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Base Typoghraphy section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'rdcode_base_typoghraphy_section',
        array(
            'title'       => esc_html__( 'Base Typoghraphy', 'dcode' ),
            'priority'    => 55,
            'panel'       => 'rdcode_general_settings_panel',
        )
    );

    /**
     * Heding
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_base_typoghraphy_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_base_typoghraphy_heading',
            array(
                'label'    => esc_html__( 'BODY & CONTENT', 'dcode' ),
                'section'  => 'rdcode_base_typoghraphy_section',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_typoghraphy_family',
        array(
            'type'              => 'theme_mod',
            'default'           => 'Roboto',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new rdcode_Font_Selector(
        $wp_customize,
            'rdcode_base_typoghraphy_family',
            array(
                'label'    => esc_html__( 'Family', 'dcode' ),
                'section'  => 'rdcode_base_typoghraphy_section',
                'priority' => 5,
                'type'     => 'select',
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_typo_family_size',
        array(
            'type'              => 'theme_mod',
            'default'           => '15',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'rdcode_base_typo_family_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Font Size', 'dcode' ),
            'description' => esc_html__( 'Font size in px.', 'dcode' ),
            'section'     => 'rdcode_base_typoghraphy_section',
            'priority'    => 5
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_typo_family_weight',
        array(
            'type'              => 'theme_mod',
            'default'           => 'inherit',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_typo_family_weight',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Font Weight', 'dcode' ),
            'section'     => 'rdcode_base_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'inherit' => esc_html__( 'Inherit', 'dcode' ),
                '300'  => esc_html__( 'Light 300', 'dcode' ),
                '400'  => esc_html__( 'Normal 400', 'dcode' ),
                '700'  => esc_html__( 'Bold 700', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_typo_family_transform',
        array(
            'type'              => 'theme_mod',
            'default'           => 'default',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_typo_family_transform',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Text Transform', 'dcode' ),
            'section'     => 'rdcode_base_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'default'           => esc_html__( 'Default', 'dcode' ),
                'none'       => esc_html__( 'None', 'dcode' ),
                'capitalize' => esc_html__( 'Capitalize', 'dcode' ),
                'uppercase'  => esc_html__( 'Uppercase', 'dcode' ),
                'lowercase'  => esc_html__( 'Lowercase', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_typo_line_height',
        array(
            'type'              => 'theme_mod',
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'rdcode_sanitize_number_absint',
        )
    );
    $wp_customize->add_control( new rdcode_Range_Value_Control(
        $wp_customize,
        'rdcode_base_typo_line_height',
        array(
            'type'        => 'rdcode-range-value',
            'label'       => esc_html__( 'Line Height', 'dcode' ),
            'section'     => 'rdcode_base_typoghraphy_section',
            'priority'    => 5,
            'input_attrs' => array(
                'min'    => 1,
                'max'    => 5,
                'step'   => .1,
            ),
                    
        )
    ));

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Headings Typoghraphy section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'rdcode_heading_typoghraphy_section',
        array(
            'title'       => esc_html__( 'Headings Typoghraphy', 'dcode' ),
            'priority'    => 55,
            'panel'       => 'rdcode_general_settings_panel',
        )
    );

    /**
     * Heding
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_heading_typoghraphy_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_heading_typoghraphy_heading',
            array(
                'label'    => esc_html__( 'HEADINGS ( H1 - H6 )', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h_family',
        array(
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new rdcode_Font_Selector(
        $wp_customize,
            'rdcode_base_all_h_family',
            array(
                'label'    => esc_html__( 'Family', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
                'type'     => 'select',
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h_weight',
        array(
            'type'              => 'theme_mod',
            'default'           => 'inherit',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h_weight',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Font Weight', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'inherit' => esc_html__( 'Inherit', 'dcode' ),
                '300'  => esc_html__( 'Light 300', 'dcode' ),
                '400'  => esc_html__( 'Normal 400', 'dcode' ),
                '700'  => esc_html__( 'Bold 700', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h_transform',
        array(
            'type'              => 'theme_mod',
            'default'           => 'default',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h_transform',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Text Transform', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'default'    => esc_html__( 'Default', 'dcode' ),
                'none'       => esc_html__( 'None', 'dcode' ),
                'capitalize' => esc_html__( 'Capitalize', 'dcode' ),
                'uppercase'  => esc_html__( 'Uppercase', 'dcode' ),
                'lowercase'  => esc_html__( 'Lowercase', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h_line_height',
        array(
            'type'              => 'theme_mod',
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'rdcode_sanitize_number_absint',
        )
    );
    $wp_customize->add_control( new rdcode_Range_Value_Control(
        $wp_customize,
        'rdcode_base_all_h_line_height',
        array(
            'type'        => 'rdcode-range-value',
            'label'       => esc_html__( 'Line Height', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'input_attrs' => array(
                'min'    => 1,
                'max'    => 5,
                'step'   => .1,
            ),
                    
        )
    ));

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding H1
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_heading_typoghraphy_h1',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_heading_typoghraphy_h1',
            array(
                'label'    => esc_html__( 'HEADING 1', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h1_family',
        array(
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new rdcode_Font_Selector(
        $wp_customize,
            'rdcode_base_all_h1_family',
            array(
                'label'    => esc_html__( 'Family', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
                'type'     => 'select',
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h1_size',
        array(
            'type'              => 'theme_mod',
            'default'           => '40',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'rdcode_base_all_h1_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Font Size', 'dcode' ),
            'description' => esc_html__( 'Font size in px.', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h1_weight',
        array(
            'type'              => 'theme_mod',
            'default'           => 'inherit',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h1_weight',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Font Weight', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'inherit' => esc_html__( 'Inherit', 'dcode' ),
                '300'  => esc_html__( 'Light 300', 'dcode' ),
                '400'  => esc_html__( 'Normal 400', 'dcode' ),
                '700'  => esc_html__( 'Bold 700', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h1_transform',
        array(
            'type'              => 'theme_mod',
            'default'           => 'default',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h1_transform',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Text Transform', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'default'    => esc_html__( 'Default', 'dcode' ),
                'none'       => esc_html__( 'None', 'dcode' ),
                'capitalize' => esc_html__( 'Capitalize', 'dcode' ),
                'uppercase'  => esc_html__( 'Uppercase', 'dcode' ),
                'lowercase'  => esc_html__( 'Lowercase', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h1_line_height',
        array(
            'type'              => 'theme_mod',
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'rdcode_sanitize_number_absint',
        )
    );
    $wp_customize->add_control( new rdcode_Range_Value_Control(
        $wp_customize,
        'rdcode_base_all_h1_line_height',
        array(
            'type'        => 'rdcode-range-value',
            'label'       => esc_html__( 'Line Height', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'input_attrs' => array(
                'min'    => 1,
                'max'    => 5,
                'step'   => .1,
            ),
                    
        )
    ));

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding H2
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_heading_typoghraphy_h2',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_heading_typoghraphy_h2',
            array(
                'label'    => esc_html__( 'HEADING 2', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h2_family',
        array(
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new rdcode_Font_Selector(
        $wp_customize,
            'rdcode_base_all_h2_family',
            array(
                'label'    => esc_html__( 'Family', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
                'type'     => 'select',
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h2_size',
        array(
            'type'              => 'theme_mod',
            'default'           => '30',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'rdcode_base_all_h2_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Font Size', 'dcode' ),
            'description' => esc_html__( 'Font size in px.', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h2_weight',
        array(
            'type'              => 'theme_mod',
            'default'           => 'inherit',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h2_weight',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Font Weight', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'inherit' => esc_html__( 'Inherit', 'dcode' ),
                '300'  => esc_html__( 'Light 300', 'dcode' ),
                '400'  => esc_html__( 'Normal 400', 'dcode' ),
                '700'  => esc_html__( 'Bold 700', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h2_transform',
        array(
            'type'              => 'theme_mod',
            'default'           => 'default',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h2_transform',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Text Transform', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'default'           => esc_html__( 'Default', 'dcode' ),
                'none'       => esc_html__( 'None', 'dcode' ),
                'capitalize' => esc_html__( 'Capitalize', 'dcode' ),
                'uppercase'  => esc_html__( 'Uppercase', 'dcode' ),
                'lowercase'  => esc_html__( 'Lowercase', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h2_line_height',
        array(
            'type'              => 'theme_mod',
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'rdcode_sanitize_number_absint',
        )
    );
    $wp_customize->add_control( new rdcode_Range_Value_Control(
        $wp_customize,
        'rdcode_base_all_h2_line_height',
        array(
            'type'        => 'rdcode-range-value',
            'label'       => esc_html__( 'Line Height', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'input_attrs' => array(
                'min'    => 1,
                'max'    => 5,
                'step'   => .1,
            ),
                    
        )
    ));

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding H3
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_heading_typoghraphy_h3',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_heading_typoghraphy_h3',
            array(
                'label'    => esc_html__( 'HEADING 3', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h3_family',
        array(
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new rdcode_Font_Selector(
        $wp_customize,
            'rdcode_base_all_h3_family',
            array(
                'label'    => esc_html__( 'Family', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
                'type'     => 'select',
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h3_size',
        array(
            'type'              => 'theme_mod',
            'default'           => '25',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'rdcode_base_all_h3_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Font Size', 'dcode' ),
            'description' => esc_html__( 'Font size in px.', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5
        )
    );

    $wp_customize->add_setting(
        'rdcode_base_all_h3_weight',
        array(
            'type'              => 'theme_mod',
            'default'           => 'inherit',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h3_weight',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Font Weight', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'inherit' => esc_html__( 'Inherit', 'dcode' ),
                '300'     => esc_html__( 'Light 300', 'dcode' ),
                '400'     => esc_html__( 'Normal 400', 'dcode' ),
                '700'     => esc_html__( 'Bold 700', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h3_transform',
        array(
            'type'              => 'theme_mod',
            'default'           => 'default',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'rdcode_base_all_h3_transform',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Text Transform', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'choices'     => array( 
                'default'    => esc_html__( 'Default', 'dcode' ),
                'none'       => esc_html__( 'None', 'dcode' ),
                'capitalize' => esc_html__( 'Capitalize', 'dcode' ),
                'uppercase'  => esc_html__( 'Uppercase', 'dcode' ),
                'lowercase'  => esc_html__( 'Lowercase', 'dcode' ),
            ),
        )
    ));

    $wp_customize->add_setting(
        'rdcode_base_all_h3_line_height',
        array(
            'type'              => 'theme_mod',
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'rdcode_sanitize_number_absint',
        )
    );
    $wp_customize->add_control( new rdcode_Range_Value_Control(
        $wp_customize,
        'rdcode_base_all_h3_line_height',
        array(
            'type'        => 'rdcode-range-value',
            'label'       => esc_html__( 'Line Height', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5,
            'input_attrs' => array(
                'min'    => 1,
                'max'    => 5,
                'step'   => .1,
            ),
                    
        )
    ));

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding H4
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_heading_typoghraphy_h4',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_heading_typoghraphy_h4',
            array(
                'label'    => esc_html__( 'HEADING 4', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
            )
        )
    );
    $wp_customize->add_setting(
        'rdcode_base_all_h4_size',
        array(
            'type'              => 'theme_mod',
            'default'           => '20',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'rdcode_base_all_h4_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Font Size', 'dcode' ),
            'description' => esc_html__( 'Font size in px.', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding H5
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_heading_typoghraphy_h5',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_heading_typoghraphy_h5',
            array(
                'label'    => esc_html__( 'HEADING 5', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
            )
        )
    );
    $wp_customize->add_setting(
        'rdcode_base_all_h5_size',
        array(
            'type'              => 'theme_mod',
            'default'           => '18',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'rdcode_base_all_h5_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Font Size', 'dcode' ),
            'description' => esc_html__( 'Font size in px.', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding H6
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_heading_typoghraphy_h6',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
        )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_heading_typoghraphy_h6',
            array(
                'label'    => esc_html__( 'HEADING 6', 'dcode' ),
                'section'  => 'rdcode_heading_typoghraphy_section',
                'priority' => 5,
            )
        )
    );
    $wp_customize->add_setting(
        'rdcode_base_all_h6_size',
        array(
            'type'              => 'theme_mod',
            'default'           => '15',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'rdcode_base_all_h6_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Font Size', 'dcode' ),
            'description' => esc_html__( 'Font size in px.', 'dcode' ),
            'section'     => 'rdcode_heading_typoghraphy_section',
            'priority'    => 5
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

}