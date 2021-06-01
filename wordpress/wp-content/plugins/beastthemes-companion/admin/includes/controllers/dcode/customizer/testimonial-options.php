<?php
defined('ABSPATH') or die();

/**
 * Customizer options for testimonial section
 */
class BeastThemesCompanionTestimonialDcode {
	public static function testi_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Testimonial Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'rdcode_testi_layout_section',
	        array(
	            'title'       => esc_html__( 'Testimonial Options', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage service section from here.', 'beastthemes_companion' ),
	            'priority'    => 55,
	            'panel'       => 'rdcode_homepage_settings_panel',
	        )
	    );
	    
	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Enable/Disable Testimonial Section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	    	'rdcode_testimonial_home', 
	    	array(
	    		'default'           => '1',
			  	'capability'        => 'edit_theme_options',
			  	'sanitize_callback' => 'rdcode_sanitize_checkbox',
			) 
	    );

		$wp_customize->add_control( 
			'rdcode_testimonial_home', 
			array(
			  	'type'        => 'checkbox',
			  	'section'     => 'rdcode_testi_layout_section',
			  	'label'       => esc_html__( 'Enable/Disable Testimonial Section.' ),
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
	        'rdcode_content_testi_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_content_testi_heading',
	            array(
	                'label'    => esc_html__( 'Content', 'beastthemes_companion' ),
	                'section'  => 'rdcode_testi_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    /**
	     * Testimonial title input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_testi_title',
	        array(
	            'default'           => esc_html__( 'Happy Client', 'beastthemes_companion' ),
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_testi_title',
	        array(
	            'type'     => 'text',
	            'label'    => esc_html__( 'Testimonial Title', 'beastthemes_companion' ),
	            'section'  => 'rdcode_testi_layout_section',
	            'priority' => 5
	        )
	    );

	    /**
	     * Testimonial description input box
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'rdcode_testi_desc',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'sanitize_text_field'
	        )
	    );
	    $wp_customize->add_control(
	        'rdcode_testi_desc',
	        array(
	            'type'     => 'textarea',
	            'label'    => esc_html__( 'Team Description', 'dcode' ),
	            'section'  => 'rdcode_testi_layout_section',
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
	        'rdcode_testi_tags_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_testi_tags_heading',
	            array(
	                'label'    => esc_html__( 'Testimonials', 'beastthemes_companion' ),
	                'section'  => 'rdcode_testi_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'rdcode_testi_items', 
	        array(
	            'sanitize_callback' => 'rdcode_sanitize_repeater',
	            'default' 			=> json_encode(array(
	                array(
	                    'testi_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/1.jpg',
	                    'testi_name'  => esc_html__( 'Jesica Gomez','beastthemes_companion' ),
	                    'testi_desig' => esc_html__( 'CEO, Founder','beastthemes_companion' ),
	                    'testi_mgs'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                ),
	                array(
	                    'testi_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/2.jpg',
	                    'testi_name'  => esc_html__( 'Jesica Gomez','beastthemes_companion' ),
	                    'testi_desig' => esc_html__( 'CEO, Founder','beastthemes_companion' ),
	                    'testi_mgs'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                ),
	                array(
	                    'testi_image' => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/team/3.jpg',
	                    'testi_name'  => esc_html__( 'Jesica Gomez','beastthemes_companion' ),
	                    'testi_desig' => esc_html__( 'CEO, Founder','beastthemes_companion' ),
	                    'testi_mgs'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
	                ),
	            ))
	        )
	    );
	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'rdcode_testi_items', 
	            array(
	                'label'   				 => '',
	                'section'  				 => 'rdcode_testi_layout_section',
	                'settings' 				 => 'rdcode_testi_items',
	                'priority' 				 => 5,
	                'rdcode_box_label'       => esc_html__( 'Testimonial','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Testimonial','beastthemes_companion' )
	            ),
	            array(
	            	'testi_image'     => array(
	                    'type'        => 'image',
	                    'label'       => esc_html__( 'Client Image', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Select image for this Client.', 'beastthemes_companion' )
	                ),
	                'testi_name'  => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Client Name', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter client\'s name.', 'beastthemes_companion' )
	                ),
	                'testi_desig' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Client Designation', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter client\'s designation.', 'beastthemes_companion' )
	                ),
	                'testi_mgs'   => array(
	                    'type'        => 'textarea',
	                    'label'       => esc_html__( 'Client Message', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter client\'s message.', 'beastthemes_companion' )
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
	        'rdcode_visibility_testi_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	        )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_visibility_testi_heading',
	            array(
	                'label'    => esc_html__( 'Style', 'beastthemes_companion' ),
	                'section'  => 'rdcode_testi_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting(
	        'rdcode_testi_bg',
	        array(
	            'default'   => BEASTTHEMES_COMPANION_PLUGIN_URL. '/admin/assets/images/backgrounds/3.png',
	            'transport' => 'postMessage',
	        )
	    );

	    $wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'rdcode_testi_bg',
	           array(
	               'label'      => esc_html__( 'Upload a background image', 'theme_name' ),
	               'section'    => 'rdcode_testi_layout_section',
	               'settings'   => 'rdcode_testi_bg',
	           )
	       )
	    );

	    /*-----------------------------------------------------------------------------------------------------------------------*/
	}
}