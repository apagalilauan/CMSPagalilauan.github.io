<?php
/**
 * Dcode Design Settings panel at Theme Customizer
 *
 * @package Dcode
 * @since 1.0.0
 */

add_action( 'customize_register', 'rdcode_design_settings_register' );

function rdcode_design_settings_register( $wp_customize ) {

    /**
     * Add Design Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'rdcode_design_settings_panel',
	    array(
	        'priority'       => 25,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Design Settings', 'dcode' ),
	    )
    );

/*---------------------------------------------------------------------------------------------------------------*/

    /**
     * Archive Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'rdcode_archive_settings_section',
        array(
            'title'    => esc_html__( 'Archive Settings', 'dcode' ),
            'panel'    => 'rdcode_design_settings_panel',
            'priority' => 5,
        )
    );

    /**
     * Heding
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_meta_tags_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
            )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_meta_tags_heading',
            array(
                'label'    => esc_html__( 'Meta Tags Options', 'dcode' ),
                'section'  => 'rdcode_archive_settings_section',
                'priority' => 5,
            )
        )
    );

    /**
     * Switch option for Author name
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_show_author_name',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
            'rdcode_show_author_name',
            array(
                'type'          => 'rdcode-switch',
                'label'         => esc_html__( 'Author Name and Icon', 'dcode' ),
                'description'   => esc_html__( 'Show/Hide option for "Author" for post.', 'dcode' ),
                'section'       => 'rdcode_archive_settings_section',
                'choices'       => array(
                    'show'      => esc_html__( 'Show', 'dcode' ),
                    'hide'      => esc_html__( 'Hide', 'dcode' )
                ),
                'priority'      => 5,
            )
        )
    );

    /**
     * Switch option for Post date
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_show_post_date',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
            'rdcode_show_post_date',
            array(
                'type'          => 'rdcode-switch',
                'label'         => esc_html__( 'Post Date and Icon', 'dcode' ),
                'description'   => esc_html__( 'Show/Hide option for "Post date" for post.', 'dcode' ),
                'section'       => 'rdcode_archive_settings_section',
                'choices'       => array(
                    'show'      => esc_html__( 'Show', 'dcode' ),
                    'hide'      => esc_html__( 'Hide', 'dcode' )
                ),
                'priority'      => 5,
            )
        )
    );

     /**
     * Switch option for Post date
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_show_comment_count',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'rdcode_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new rdcode_Customize_Switch_Control(
        $wp_customize,
            'rdcode_show_comment_count',
            array(
                'type'          => 'rdcode-switch',
                'label'         => esc_html__( 'Comment Count and Icon', 'dcode' ),
                'description'   => esc_html__( 'Show/Hide option for "Comment Count" for post.', 'dcode' ),
                'section'       => 'rdcode_archive_settings_section',
                'choices'       => array(
                    'show'      => esc_html__( 'Show', 'dcode' ),
                    'hide'      => esc_html__( 'Hide', 'dcode' )
                ),
                'priority'      => 5,
            )
        )
    );

    /**
     * Heding
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_post_display_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses',
            )
    );
    $wp_customize->add_control( new rdcode_Customizer_Heading(
        $wp_customize,
            'rdcode_post_display_heading',
            array(
                'label'    => esc_html__( 'Post Display Options', 'dcode' ),
                'section'  => 'rdcode_archive_settings_section',
                'priority' => 5,
            )
        )
    );

    /**
     * Text field for post excerpt length
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_blog_excerpt_length',
        array(
            'default'           => 30,
            'sanitize_callback' => 'rdcode_sanitize_number_absint'
            )
    );
    $wp_customize->add_control(
        'rdcode_blog_excerpt_length',
        array(
            'type'         => 'number',
            'label'        => esc_html__( 'Post excerpt length( content length )', 'dcode' ),
            'description'  => esc_html__( 'Enter content length in numbers.', 'dcode' ),
            'section'      => 'rdcode_archive_settings_section',
            'priority'     => 15
        )
    );

    /**
     * Text field for archive read more
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'rdcode_archive_read_more_text',
        array(
            'default'           => esc_html__( 'Read More', 'dcode' ),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'rdcode_archive_read_more_text',
        array(
            'type'         => 'text',
            'label'        => esc_html__( 'Read More Text', 'dcode' ),
            'description'  => esc_html__( 'Enter read more button text for archive page.', 'dcode' ),
            'section'      => 'rdcode_archive_settings_section',
            'priority'     => 15
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'rdcode_archive_read_more_text', 
            array(
                'selector'        => '.card.post a.btn.btn-xs.btn-primary',
                'render_callback' => 'rdcode_customize_partial_archive_more',
            )
    );

    /**
     * Radio field for post pagination
     * 
     *  @since 1.0.0
     */
    $wp_customize->add_setting( 
        'rdcode_radio_post_pagination',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'pagination',
            'sanitize_callback' => 'rdcode_sanitize_radio_option',
        ) 
    );
    $wp_customize->add_control( 
        'rdcode_radio_post_pagination',
        array(
            'type'        => 'radio',
            'section'     => 'rdcode_archive_settings_section',
            'priority'    => 20,
            'label'       => esc_html__( 'Post Pagination', 'dcode' ),
            'description' => esc_html__( 'Select pagination for post.', 'dcode' ),
            'choices'     => array(
                'default'    => esc_html__( 'default', 'dcode' ),
                'pagination' => esc_html__( 'Pagination', 'dcode' )
            ),
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'rdcode_radio_post_pagination', 
            array(
                'selector'        => '.pagination-outer',
                'render_callback' => 'rdcode_customize_partial_pagination',
            )
    );

/*---------------------------------------------------------------------------------------------------------------*/

}