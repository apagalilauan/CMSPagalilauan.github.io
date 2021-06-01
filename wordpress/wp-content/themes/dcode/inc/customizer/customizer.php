<?php
/**
 * Dcode Theme Customizer
 *
 * @package Dcode
 * @since 1.0.0
 */

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rdcode_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'rdcode_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'rdcode_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'rdcode_customize_register' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rdcode_customize_partial_blogname() {
	bloginfo( 'name' );
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rdcode_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rdcode_customize_preview_js() {
	wp_enqueue_script( 'rdcode-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rdcode_customize_preview_js' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function rdcode_customize_backend_scripts() {

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/all.min.css', array(), '5.3.1' );    
    wp_enqueue_style( 'rdcode_admin_customizer_style', get_template_directory_uri() . '/assets/css/rdcode-customizer-style.css' );

	wp_enqueue_script( "jquery-effects-core" );
    wp_enqueue_script( 'rdcode_admin_customizer', get_template_directory_uri() . '/assets/js/rdcode-customizer-controls.js', array( 'jquery', 'customize-controls' ), '20170616', true );
}
add_action( 'customize_controls_enqueue_scripts', 'rdcode_customize_backend_scripts', 10 );

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Load required files for customizer section
 *
 * @since 1.0.0
 */
get_template_part( 'inc/customizer/rdcode-custom', 'classes' );      // Custom Classes
get_template_part( 'inc/customizer/rdcode-customizer', 'sanitize' ); // Customizer Sanitize
get_template_part( 'inc/customizer/rdcode-general', 'panel' );       // General Settings
get_template_part( 'inc/customizer/rdcode-header', 'panel' );        // Header Settings
get_template_part( 'inc/customizer/rdcode-footer', 'panel' );        // Footer Settings
get_template_part( 'inc/customizer/rdcode-design', 'panel' );        // Design Settings
get_template_part( 'inc/customizer/rdcode-additional', 'panel' );    // Additional Settings
get_template_part( 'inc/customizer/rdcode-home', 'panel' );          // Homepage Settings