<?php
/**
 * Dcode Homepage Settings panel at Theme Customizer
 *
 * @package Dcode
 * @since 1.0.0
 */

add_action( 'customize_register', 'rdcode_homepage_settings_register' );

function rdcode_homepage_settings_register( $wp_customize ) {

	/**
     * Add Homepage Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'rdcode_homepage_settings_panel',
	    array(
	        'priority'       => 10,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Homepage Settings', 'dcode' ),
	    )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Blog Options
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'rdcode_blog_layout_section',
        array(
            'title'       => esc_html__( 'Blog Options', 'dcode' ),
            'description' => esc_html__( 'Manage blog section from here.', 'dcode' ),
            'priority'    => 60,
            'panel'       => 'rdcode_homepage_settings_panel',
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Enable/Disable Blog Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'rdcode_blog_home', 
        array(
            'default'           => '1',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'rdcode_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        'rdcode_blog_home', 
        array(
            'type'        => 'checkbox',
            'section'     => 'rdcode_blog_layout_section',
            'label'       => esc_html__( 'Enable/Disable Blog Section.', 'dcode' ),
            'priority'    => 5,
        ) 
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_content_blog_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
            )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_content_blog_heading',
            array(
                'label'    => esc_html__( 'Content', 'dcode' ),
                'section'  => 'rdcode_blog_layout_section',
                'priority' => 5,
            )
        )
    );

    /**
     * Blog title input box
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_blog_title',
        array(
            'default'           => esc_html__( 'Latest News', 'dcode' ),
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'rdcode_blog_title',
        array(
            'type'     => 'text',
            'label'    => esc_html__( 'Blog Title', 'dcode' ),
            'section'  => 'rdcode_blog_layout_section',
            'priority' => 5
        )
    );

    /**
     * Blog description input box
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_blog_desc',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'rdcode_blog_desc',
        array(
            'type'     => 'textarea',
            'label'    => esc_html__( 'Blog Description', 'dcode' ),
            'section'  => 'rdcode_blog_layout_section',
            'priority' => 5
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/

    /**
     * Heding
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_visibility_blog_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
            )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_visibility_blog_heading',
            array(
                'label'    => esc_html__( 'Visibility', 'dcode' ),
                'section'  => 'rdcode_blog_layout_section',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_no_of_blogs',
        array(
            'default'           => 3,
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'rdcode_no_of_blogs',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'No of blogs', 'dcode' ),
            'description' => esc_html__( 'set no of blogs to display.', 'dcode' ),
            'section'     => 'rdcode_blog_layout_section',
            'priority'    => 5
        )
    );

    $wp_customize->add_setting(
        'rdcode_blog_excerpt_hide',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
            'rdcode_blog_excerpt_hide',
            array(
                'type'          => 'switch',
                'label'         => esc_html__( 'Blog Excerpt', 'dcode' ),
                'description'   => esc_html__( 'Show/Hide blog content/text.', 'dcode' ),
                'section'       => 'rdcode_blog_layout_section',
                'choices'       => array(
                    'show'      => esc_html__( 'Show', 'dcode' ),
                    'hide'      => esc_html__( 'Hide', 'dcode' )
                ),
                'priority'      => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'rdcode_blog_readmore_hide',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
            'rdcode_blog_readmore_hide',
            array(
                'type'          => 'switch',
                'label'         => esc_html__( 'Readmore button', 'dcode' ),
                'description'   => esc_html__( 'Show/Hide readmore button.', 'dcode' ),
                'section'       => 'rdcode_blog_layout_section',
                'choices'       => array(
                    'show'      => esc_html__( 'Show', 'dcode' ),
                    'hide'      => esc_html__( 'Hide', 'dcode' )
                ),
                'priority'      => 5,
            )
        )
    );

    /**
     * Radio field for blog layout
     * 
     *  @since 1.0.0
     */
    $wp_customize->add_setting( 
        'rdcode_blog_layout',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'grid',
            'sanitize_callback' => 'rdcode_sanitize_radio_option',
        ) 
    );
    $wp_customize->add_control( 
        'rdcode_blog_layout',
        array(
            'type'        => 'radio',
            'section'     => 'rdcode_blog_layout_section',
            'priority'    => 20,
            'label'       => esc_html__( 'Blog Dispay Layout', 'dcode' ),
            'description' => esc_html__( 'Select layout for displaying blogs.', 'dcode' ),
            'choices'     => array(
                'grid'   => esc_html__( 'Grid Layout', 'dcode' ),
                'slider' => esc_html__( 'Slider Layout', 'dcode' ),
            ),
        )
    );

    /*-----------------------------------------------------------------------------------------------------------------------*/
}