<?php
defined('ABSPATH') or die();

/**
 * Customizer options for client section
 */
class BeastThemesCompanionLayoutDcode {
	public static function layout_customizer( $wp_customize ) {

		require_once( BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . 'admin/includes/controllers/class-custom-customizer-functions.php' );
		// Register the radio image control class as a JS control type.
    	$wp_customize->register_control_type( 'beastthemes_companion_Customize_Sortable_Control' );

		/*-----------------------------------------------------------------------------------------------------------------------*/

	    /**
	     * Home Layout Options
	     *
	     * @since 1.0.0
	     */
	    // $wp_customize->add_section(
	    //     'rdcode_homel_layout_section',
	    //     array(
	    //         'title'       => esc_html__( 'Home Layout Options', 'beastthemes_companion' ),
	    //         'description' => esc_html__( 'Manage Homepage sections order from here.', 'beastthemes_companion' ),
	    //         'priority'    => 60,
	    //         'panel'       => 'rdcode_homepage_settings_panel',
	    //     )
	    // );
	    
	    // /*-----------------------------------------------------------------------------------------------------------------------*/

	    // /**
	    //  * Heding
	    //  *
	    //  * @since 1.0.0
	    //  */
	    // $wp_customize->add_setting(
	    //     'rdcode_content_home_heading',
	    //     array(
	    //         'default'           => '',
	    //         'sanitize_callback' => 'wp_kses',
	    //         )
	    // );
	    // $wp_customize->add_control( new beastthemes_Customizer_Heading(
	    //     $wp_customize,
	    //         'rdcode_content_home_heading',
	    //         array(
	    //             'label'    => esc_html__( 'Homepage Layout', 'beastthemes_companion' ),
	    //             'section'  => 'rdcode_homel_layout_section',
	    //             'priority' => 5,
	    //         )
	    //     )
	    // );

	    // /*-----------------------------------------------------------------------------------------------------------------------*/

	    // $wp_customize->add_setting( 'rdcode_home_reorder',
	    //     array(
	    //         'type'              => 'theme_mod',
	    //         'sanitize_callback' => '',
	    //         'capability'        => 'edit_theme_options',
	    //     )
	    // );
	    // $wp_customize->add_control( 
	    //     new beastthemes_companion_Customize_Sortable_Control( 
	    //         $wp_customize, 'rdcode_home_reorder', 
	    //         array(
	    //             'label'       => 'Set Homepage Sections',
	    //             'description' => esc_html__( 'Drag & Drop to re-arrange the order.', 'dcode' ),
	    //             'section'     => 'rdcode_homel_layout_section',
	    //             'type'        => 'beastthemes-sortable',
	    //             'default'     => array(
	    //             	'service',
					// 	'testimonial',
					// 	'team',
					// 	'client',
					// 	'blog'
	    //             ),
	    //             'choices'     => array(
	    //                 'service'     => esc_html__( 'Service', 'dcode' ),
	    //                 'testimonial' => esc_html__( 'Testimonials', 'dcode' ),
	    //                 'team'        => esc_html__( 'Team', 'dcode' ),
	    //                 'client'      => esc_html__( 'Client', 'dcode' ),
	    //                 'blog'        => esc_html__( 'Blog', 'dcode' ),
	    //             ),
	    //             'settings' => 'rdcode_home_reorder',
	    //         ) 
	    //     ) 
	    // );

	}
}