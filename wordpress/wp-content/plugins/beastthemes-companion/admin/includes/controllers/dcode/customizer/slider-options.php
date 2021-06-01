<?php
defined('ABSPATH') or die();

/**
 * Customizer options for slider section
 */
class BeastThemesCompanionSliderDcode {
	public static function slider_customizer( $wp_customize ) {

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Slider Options
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_section(
	        'rdcode_slider_layout_section',
	        array(
	            'title'       => esc_html__( 'Slider Options', 'beastthemes_companion' ),
	            'description' => esc_html__( 'Manage slider section from here.', 'beastthemes_companion' ),
	            'priority'    => 55,
	            'panel'       => 'rdcode_homepage_settings_panel',
	        )
	    );
	    
	    /*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Enable/Disable Slider Section
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting( 
	    	'rdcode_slider_home', 
	    	array(
	    		'default'           => '1',
			  	'capability'        => 'edit_theme_options',
			  	'sanitize_callback' => 'rdcode_sanitize_checkbox',
			) 
	    );

		$wp_customize->add_control( 
			'rdcode_slider_home', 
			array(
			  	'type'        => 'checkbox',
			  	'section'     => 'rdcode_slider_layout_section',
			  	'label'       => esc_html__( 'Enable/Disable Slider Section.' ),
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
	        'rdcode_content_slider_heading',
	        array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses',
	            )
	    );
	    $wp_customize->add_control( new beastthemes_Customizer_Heading(
	        $wp_customize,
	            'rdcode_content_slider_heading',
	            array(
	                'label'    => esc_html__( 'Slides', 'beastthemes_companion' ),
	                'section'  => 'rdcode_slider_layout_section',
	                'priority' => 5,
	            )
	        )
	    );

	    $wp_customize->add_setting( 
	        'rdcode_sliders_items', 
	        array(
	            'sanitize_callback' => 'rdcode_sanitize_repeater',
	            'default'           => json_encode(array(
	                array(
	                    'slider_image'     => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/slider/slider-1.jpg',
			            'slider_heading'   => esc_html__( 'Make Your Business More Profitable!','beastthemes_companion' ),
			            'slider_subhead'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
			            'slider_btn_1_txt' => esc_html__( 'GET START','beastthemes_companion' ),
			            'slider_btn_1_url' => '#',
			            'slider_btn_2_txt' => esc_html__( 'CONTACT US','beastthemes_companion' ),
			            'slider_btn_2_url' => '#',
	                ),
	                array(
	                    'slider_image'     => BEASTTHEMES_COMPANION_PLUGIN_URL. '/assets/images/dcode/slider/slider-2.jpg',
			            'slider_heading'   => esc_html__( 'Make Your Business More Profitable!','beastthemes_companion' ),
			            'slider_subhead'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since','beastthemes_companion' ),
			            'slider_btn_1_txt' => esc_html__( 'GET START','beastthemes_companion' ),
			            'slider_btn_1_url' => '#',
			            'slider_btn_2_txt' => esc_html__( 'CONTACT US','beastthemes_companion' ),
			            'slider_btn_2_url' => '#',
	                ),
	            ))
	        )
	    );

	    $wp_customize->add_control( new beastthemes_companion_Repeater_Controler(
	        $wp_customize, 
	            'rdcode_sliders_items', 
	            array(
	                'label'    => '',
	                'section'  => 'rdcode_slider_layout_section',
	                'settings' => 'rdcode_sliders_items',
	                'priority' => 5,
	                'rdcode_box_label'       => esc_html__( 'Slides','beastthemes_companion' ),
	                'rdcode_box_add_control' => esc_html__( 'Add Slides','beastthemes_companion' )
	            ),
	            array(
	            	'slider_image'    => array(
	                    'type'        => 'image',
	                    'label'       => esc_html__( 'Slide Image', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Select image for this slide.', 'beastthemes_companion' )
	                ),
	                'slider_heading'   => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Heading', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter slide main heading.', 'beastthemes_companion' )
	                ),
	                'slider_subhead'   => array(
	                    'type'        => 'textarea',
	                    'label'       => esc_html__( 'Sub Heading', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter slide sub-heading.', 'beastthemes_companion' )
	                ),
	                'slider_btn_1_txt' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Button One Text', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter first button text.', 'beastthemes_companion' )
	                ),
	                'slider_btn_1_url' => array(
	                    'type'        => 'url',
	                    'label'       => esc_html__( 'Button One URL', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter first button linked URL.', 'beastthemes_companion' )
	                ),
	                'slider_btn_2_txt' => array(
	                    'type'        => 'text',
	                    'label'       => esc_html__( 'Button Two Text', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter second button text.', 'beastthemes_companion' )
	                ),
	                'slider_btn_2_url' => array(
	                    'type'        => 'url',
	                    'label'       => esc_html__( 'Button Two URL', 'beastthemes_companion' ),
	                    'description' => esc_html__( 'Enter second button linked URL.', 'beastthemes_companion' )
	                ),
	            )
	        ) 
	    );
	}
}