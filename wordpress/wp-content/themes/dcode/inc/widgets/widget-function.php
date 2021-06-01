<?php
/**
 * Dcode custom function and work related to widgets.
 *
 * @package Dcode
 * @since 1.0.0
 */

 /*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rdcode_widgets_init() {
	
	/**
	 * Register right sidebar
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dcode' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dcode' ),
		'before_widget' => '<section id="%1$s" class="card my-4 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="card-header">',
		'after_title'   => '</h4>',
	) );

	/**
	 * Register 4 different footer area 
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'dcode' ),
		'id'            => 'rdcode_footer_sidebar',
		'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'dcode' ),
		'before_widget' => '<section id="%1$s" class="col-lg-3 col-md-6 mb-4 footer-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'dcode' ),
		'id'            => 'rdcode_footer_sidebar-2',
		'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'dcode' ),
		'before_widget' => '<section id="%1$s" class="col-lg-3 col-md-6 mb-4 footer-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'dcode' ),
		'id'            => 'rdcode_footer_sidebar-3',
		'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'dcode' ),
		'before_widget' => '<section id="%1$s" class="col-lg-3 col-md-6 mb-4 footer-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'dcode' ),
		'id'            => 'rdcode_footer_sideba-4',
		'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'dcode' ),
		'before_widget' => '<section id="%1$s" class="col-lg-3 col-md-6 mb-4 footer-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'rdcode_widgets_init' );