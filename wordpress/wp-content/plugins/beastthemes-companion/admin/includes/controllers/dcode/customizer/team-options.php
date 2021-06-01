<?php
defined('ABSPATH') or die();

/**
 * Customizer options for team section
 */
class BeastThemesCompanionteamDcode {
	public static function team_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Team Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'rdcode_team_layout_section',
	        array(
	            'title'       => esc_html__( 'Team Options', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage service section from here.', 'beastthemes_companion' ),
	            'priority'    => 55,
	            'panel'       => 'rdcode_homepage_settings_panel',
	        )
	    );
	    
	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Enable/Disable Team Section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	    	'rdcode_team_home', 
	    	array(
	    		'default'           => '1',
			  	'capability'        => 'edit_theme_options',
			  	'sanitize_callback' => 'rdcode_sanitize_checkbox',
			) 
	    );

		$wp_customize->add_control( 
			'rdcode_team_home', 
			array(
			  	'type'        => 'checkbox',
			  	'section'     => 'rdcode_team_layout_section',
			  	'label'       => esc_html__( 'Enable/Disable Team Section.' ),
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
	        'rdcode_content_team_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_content_team_heading',
	            array(
	                'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
	                'section'  => 'rdcode_team_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Team title input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_team_title',
	        array(
	            'default'           => esc_html__( 'The Leadership', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_team_title',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Team Title', 'beastthemes_companion' ),
	            'section'  => 'rdcode_team_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Team description input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_team_desc',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_team_desc',
	        array(
	            'type'     => 'textarea',
	            'label'    => esc_html__( 'Team Description', 'dcode' ),
	            'section'  => 'rdcode_team_layout_section',
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
	        'rdcode_teams_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_teams_tags_heading',
	            array(
	                'label'    => esc_html__( 'Team Members', 'beastthemes_companion' ),
	                'section'  => 'rdcode_team_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'rdcode_teams_items', 
	        array(
	            'sanitize_callback' => 'rdcode_sanitize_repeater',
	            'default'           => json_encode(array(
	                array(
	                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/1.jpg',
	                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
	                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
	                    'm_facebook_url' => '#',
	                    'm_insta_url'    => '#',
	                    'm_google_url'   => '#',
	                    'm_twitter_url'  => '#',
	                ),
	                array(
	                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/2.jpg',
	                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
	                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
	                    'm_facebook_url' => '#',
	                    'm_insta_url'    => '#',
	                    'm_google_url'   => '#',
	                    'm_twitter_url'  => '#',
	                ),
	                array(
	                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/3.jpg',
	                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
	                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
	                    'm_facebook_url' => '#',
	                    'm_insta_url'    => '#',
	                    'm_google_url'   => '#',
	                    'm_twitter_url'  => '#',
	                ),
	                array(
	                    'member_image'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/4.jpg',
	                    'member_name'    => esc_html__( 'Jack Schenziwe','beastthemes_companion' ),
	                    'member_desig'   => esc_html__( 'Project Manager','beastthemes_companion' ),
	                    'm_facebook_url' => '#',
	                    'm_insta_url'    => '#',
	                    'm_google_url'   => '#',
	                    'm_twitter_url'  => '#',
	                ),
	            ))
	        )
	    );
	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'rdcode_teams_items', 
	            array(
	                'label'    				 => '',
	                'section'  				 => 'rdcode_team_layout_section',
	                'settings' 				 => 'rdcode_teams_items',
	                'priority' 				 => 5,
	                'rdcode_box_label'       => esc_html__( 'Members','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Members','beastthemes_companion' )
	            ),
	            array(
	            	'member_image'   => array(
	                    'type'        => 'image',
	                    'label'       => esc_html__( 'Member Image', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Select image for this Memeber.', 'beastthemes_companion' )
	                ),
	                'member_name'    => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Name', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter Member name.', 'beastthemes_companion' )
	                ),
	                'member_desig'   => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Designation', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter Member designation.', 'beastthemes_companion' )
	                ),
	                'm_facebook_url' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Facebook', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter facebook profile URL.', 'beastthemes_companion' )
	                ),
	                'm_insta_url'    => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Instagram', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter instagram profile URL.', 'beastthemes_companion' )
	                ),
	                'm_google_url'   => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Google Plus', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter google plus profile URL.', 'beastthemes_companion' )
	                ),
	                'm_twitter_url'  => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Twitter', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter twitter profile URL.', 'beastthemes_companion' )
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
	        'rdcode_teams_style_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_teams_style_heading',
	            array(
	                'label'    => esc_html__( 'Style', 'beastthemes_companion' ),
	                'section'  => 'rdcode_team_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'rdcode_team_bg_img',
	        array(
	            'default'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/team-bg.png',
	            'transport' => 'postMessage',
	        )
	    );

	    $wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'rdcode_team_bg_img',
	           array(
	               'label'      => esc_html__( 'Upload a background image', 'theme_name' ),
	               'section'    => 'rdcode_team_layout_section',
	               'settings'   => 'rdcode_team_bg_img',
	           )
	       )
	    );

	}
}