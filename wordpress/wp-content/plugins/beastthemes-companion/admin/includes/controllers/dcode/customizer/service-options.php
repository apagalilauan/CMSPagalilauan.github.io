<?php
defined('ABSPATH') or die();

/**
 * Customizer options for service section
 */
class BeastThemesCompanionServiceDcode {
	public static function service_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Service Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'rdcode_service_layout_section',
	        array(
	            'title'       => esc_html__( 'Service Options', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage service section from here.', 'beastthemes_companion' ),
	            'priority'    => 55,
	            'panel'       => 'rdcode_homepage_settings_panel',
	        )
	    );
	    
	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Enable/Disable Service Section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	    	'rdcode_service_home', 
	    	array(
	    		'default'           => '1',
			  	'capability'        => 'edit_theme_options',
			  	'sanitize_callback' => 'rdcode_sanitize_checkbox',
			) 
	    );

		$wp_customize->add_control( 
			'rdcode_service_home', 
			array(
			  	'type'        => 'checkbox',
			  	'section'     => 'rdcode_service_layout_section',
			  	'label'       => esc_html__( 'Enable/Disable Service Section.' ),
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
	        'rdcode_content_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_content_tags_heading',
	            array(
	                'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
	                'section'  => 'rdcode_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Service title input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_service_title',
	        array(
	            'default'           => esc_html__( 'Best Services', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_service_title',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Service Title', 'beastthemes_companion' ),
	            'section'  => 'rdcode_service_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Service description input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_service_desc',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_service_desc',
	        array(
	            'type'     => 'textarea',
	            'label'    => esc_html__( 'Service Description', 'dcode' ),
	            'section'  => 'rdcode_service_layout_section',
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
	        'rdcode_services_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_services_tags_heading',
	            array(
	                'label'    => esc_html__( 'Services', 'beastthemes_companion' ),
	                'section'  => 'rdcode_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'rdcode_services_items', 
	        array(
	            'sanitize_callback' => 'rdcode_sanitize_repeater',
	            'default'           => json_encode(array(
	                array(
	                    'service_icon' => 'fas fa-brush',
	                    'service_name' => esc_html__( 'Responsive', 'beastthemes_companion' ),
	                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                    'service_url'  => '#',
	                ),
	                array(
	                    'service_icon' => 'fas fa-award',
	                    'service_name' => esc_html__( 'Creative Design', 'beastthemes_companion' ),
	                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                    'service_url'  => '#',
	                ),
	                array(
	                    'service_icon' => 'fas fa-users',
	                    'service_name' => esc_html__( 'User friendly', 'beastthemes_companion' ),
	                    'service_desc' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                    'service_url'  => '#',
	                ),
	            ))
	        )
	    );
	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'rdcode_services_items', 
	            array(
	                'label'    				 => '',
	                'section'  				 => 'rdcode_service_layout_section',
	                'settings' 				 => 'rdcode_services_items',
	                'priority' 				 => 5,
	                'rdcode_box_label'       => esc_html__( 'Service','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Service','beastthemes_companion' )
	            ),
	            array(
	                'service_icon' => array(
	                    'type'        => 'social_icon',
	                    'label'       => esc_html__( 'Service icon', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Choose Service icon.', 'beastthemes_companion' )
	                ),
	                'service_name' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Service name', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter service name.', 'beastthemes_companion' )
	                ),
	                'service_desc' => array(
	                    'type'        => 'textarea',
	                    'label'       => esc_html__( 'Service description', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter service description.', 'beastthemes_companion' )
	                ),
	                'service_url'  => array(
	                    'type'        => 'url',
	                    'label'       => esc_html__( 'Service URL', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter service linked URL.', 'beastthemes_companion' )
	                ),
	            )
	        ) 
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_visibility_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_visibility_tags_heading',
	            array(
	                'label'    => esc_html__( 'Visibility', 'beastthemes_companion' ),
	                'section'  => 'rdcode_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'rdcode_service_icon_hide',
	        array(
	            'default'           => 'show',
	            'sanitize_callback' => 'rdcode_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
	        $wp_customize,
	            'rdcode_service_icon_hide',
	            array(
	                'type'          => 'switch',
	                'label'         => esc_html__( 'Service icon', 'beastthemes_companion' ),
	                'description'   => esc_html__( 'Show/Hide option for service icons.', 'beastthemes_companion' ),
	                'section'       => 'rdcode_service_layout_section',
	                'choices'       => array(
	                    'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
	                    'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
	                ),
	                'priority'      => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'rdcode_service_title_hide',
	        array(
	            'default'           => 'show',
	            'sanitize_callback' => 'rdcode_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
	        $wp_customize,
	            'rdcode_service_title_hide',
	            array(
	                'type'          => 'switch',
	                'label'         => esc_html__( 'Service title', 'beastthemes_companion' ),
	                'description'   => esc_html__( 'Show/Hide option for service title.', 'beastthemes_companion' ),
	                'section'       => 'rdcode_service_layout_section',
	                'choices'       => array(
	                    'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
	                    'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
	                ),
	                'priority'      => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'rdcode_service_content_hide',
	        array(
	            'default'           => 'show',
	            'sanitize_callback' => 'rdcode_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customize_Switch_Control(
	        $wp_customize,
	            'rdcode_service_content_hide',
	            array(
	                'type'          => 'switch',
	                'label'         => esc_html__( 'Service description', 'beastthemes_companion' ),
	                'description'   => esc_html__( 'Show/Hide option for service description.', 'beastthemes_companion' ),
	                'section'       => 'rdcode_service_layout_section',
	                'choices'       => array(
	                    'show'      => esc_html__( 'Show', 'beastthemes_companion' ),
	                    'hide'      => esc_html__( 'Hide', 'beastthemes_companion' )
	                ),
	                'priority'      => 5,
	            )
	        )
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Heding
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_style_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_style_tags_heading',
	            array(
	                'label'    => esc_html__( 'Style', 'beastthemes_companion' ),
	                'section'  => 'rdcode_service_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Color option service section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_service_bg_color',
	        array(
	            'default'           => '#f6f9fe',
	            'sanitize_callback' => 'sanitize_hex_color',
	        )
	    ); 
	    $wp_customize->add_control( new WP_Customize_Color_Control(
	            $wp_customize,
	            'rdcode_service_bg_color',
	            array(
	                'label'    => esc_html__( 'Background color', 'beastthemes_companion' ),
	                'section'  => 'rdcode_service_layout_section',
	                'priority' => 5
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'rdcode_service_icon_size',
	        array(
	            'default'           => 60,
	            'transport'         => 'postMessage',
	            'sanitize_callback' => 'sanitize_text_field'
	            )
	    );
	    $wp_customize->add_control(
	        'rdcode_service_icon_size',
	        array(
	            'type'        => 'number',
	            'label'       => esc_html__( 'Service icon size ( in px )', 'beastthemes_companion' ),
	            'description' => esc_html__( 'set size for service icons to display.', 'beastthemes_companion' ),
	            'section'     => 'rdcode_service_layout_section',
	            'priority'    => 5
	        )
	    );

	}

}