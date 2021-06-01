<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'lalita_background_setup' );
/**
 * Overwrite parent theme background defaults and registers support for WordPress features.
 *
 */
function lalita_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => '71116E',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

/**
 * Overwrite theme URL
 *
 */
function lalita_theme_uri_link() {
	return 'https://wpkoi.com/ishvara-wpkoi-wordpress-theme/';
}

/**
 * Overwrite parent theme's blog header function
 *
 */
add_action( 'lalita_after_header', 'lalita_blog_header_image', 11 );
function lalita_blog_header_image() {

	if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
		$blog_header_image 			=  lalita_get_setting( 'blog_header_image' ); 
		$blog_header_title 			=  lalita_get_setting( 'blog_header_title' ); 
		$blog_header_text 			=  lalita_get_setting( 'blog_header_text' ); 
		$blog_header_button_text 	=  lalita_get_setting( 'blog_header_button_text' ); 
		$blog_header_button_url 	=  lalita_get_setting( 'blog_header_button_url' ); 
		if ( $blog_header_image != '' ) { ?>
		<div class="page-header-image grid-parent page-header-blog">
        	<div class="page-header-blog-inner">
                <div class="page-header-blog-content-h grid-container">
                    <div class="page-header-blog-content">
                    <?php if ( ( $blog_header_title != '' ) || ( $blog_header_text != '' ) ) { ?>
                        <div class="page-header-blog-text">
                            <?php if ( $blog_header_title != '' ) { ?>
                            <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                            <div class="clearfix"></div>
                            <?php } ?>
                            <?php if ( $blog_header_title != '' ) { ?>
                            <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                            <div class="clearfix"></div>
                            <?php } ?>
                        </div>
                        <div class="page-header-blog-button">
                            <?php if ( $blog_header_button_text != '' ) { ?>
                            <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="page-header-blog-inner-img"><img src="<?php echo esc_url($blog_header_image); ?>" /></div>
            </div>
		</div>
		<?php
		}
	}
}

if ( ! function_exists( 'ishvara_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'ishvara_remove_parent_dynamic_css' );
	/**
	 * The dynamic styles of the parent theme added inline to the parent stylesheet.
	 * For the customizer functions it is better to enqueue after the child theme stylesheet.
	 */
	function ishvara_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

if ( ! function_exists( 'ishvara_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'ishvara_enqueue_parent_dynamic_css', 50 );
	/**
	 * Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
	 *
	 */
	function ishvara_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

// Extra cutomizer functions
if ( ! function_exists( 'ishvara_customize_register' ) ) {
	add_action( 'customize_register', 'ishvara_customize_register' );
	function ishvara_customize_register( $wp_customize ) {
				
		// Navigation effect
		$wp_customize->add_setting(
			'ishvara_settings[nav_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'ishvara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'ishvara_settings[nav_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Ishvara navigation effect', 'ishvara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'ishvara' ),
					'disable' => __( 'Disable', 'ishvara' )
				),
				'settings' => 'ishvara_settings[nav_effect]',
				'section' => 'lalita_layout_navigation',
				'priority' => 24
			)
		);
		
		// Blog image effect
		$wp_customize->add_setting(
			'ishvara_settings[img_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'ishvara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'ishvara_settings[img_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Blog image effect', 'ishvara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'ishvara' ),
					'disable' => __( 'Disable', 'ishvara' )
				),
				'settings' => 'ishvara_settings[img_effect]',
				'section' => 'lalita_blog_section',
				'priority' => 29
			)
		);
		
		// Nicescroll
		$wp_customize->add_setting(
			'ishvara_settings[nicescroll]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'ishvara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'ishvara_settings[nicescroll]',
			array(
				'type' => 'select',
				'label' => __( 'Scrollbar style', 'ishvara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'ishvara' ),
					'disable' => __( 'Disable', 'ishvara' )
				),
				'settings' => 'ishvara_settings[nicescroll]',
				'section' => 'lalita_layout_container',
				'priority' => 20
			)
		);
		
		// Cursor
		$wp_customize->add_setting(
			'ishvara_settings[cursor]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'ishvara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'ishvara_settings[cursor]',
			array(
				'type' => 'select',
				'label' => __( 'Cursor image', 'ishvara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'ishvara' ),
					'disable' => __( 'Disable', 'ishvara' )
				),
				'settings' => 'ishvara_settings[cursor]',
				'section' => 'lalita_layout_container',
				'priority' => 20
			)
		);
		
		// Logo effect
		$wp_customize->add_setting(
			'ishvara_settings[logo_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'ishvara_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'ishvara_settings[logo_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Logo effect', 'ishvara' ),
				'choices' => array(
					'enable' => __( 'Enable', 'ishvara' ),
					'disable' => __( 'Disable', 'ishvara' )
				),
				'settings' => 'ishvara_settings[logo_effect]',
				'section' => 'title_tagline',
				'priority' => 2
			)
		);
		
	}
}

if ( ! function_exists( 'ishvara_sanitize_choices' ) ) {
	/**
	 * Sanitize choices.
	 *
	 */
	function ishvara_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'ishvara_body_classes' ) ) {
	add_filter( 'body_class', 'ishvara_body_classes' );
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 */
	function ishvara_body_classes( $classes ) {
		// Get Customizer settings
		$ishvara_settings = get_option( 'ishvara_settings' );
		
		$img_effect  = 'enable';
		$nav_effect  = 'enable';
		$nicescroll  = 'enable';
		$cursor		 = 'enable';
		$logo_effect = 'enable';
		if ( isset( $ishvara_settings['img_effect'] ) ) {
			$img_effect = $ishvara_settings['img_effect'];
		}
		if ( isset( $ishvara_settings['nav_effect'] ) ) {
			$nav_effect = $ishvara_settings['nav_effect'];
		}
		if ( isset( $ishvara_settings['nicescroll'] ) ) {
			$nicescroll = $ishvara_settings['nicescroll'];
		}
		if ( isset( $ishvara_settings['cursor'] ) ) {
			$cursor = $ishvara_settings['cursor'];
		}
		if ( isset( $ishvara_settings['logo_effect'] ) ) {
			$logo_effect = $ishvara_settings['logo_effect'];
		}
		
		// Blog image function
		if ( $img_effect != 'disable' ) {
			$classes[] = 'ishvara-img-effect';
		}
		
		// Navigation effect
		if ( $nav_effect != 'disable' ) {
			$classes[] = 'ishvara-nav-effect';
		}
		
		// Scrollbar style function
		if ( $nicescroll != 'disable' ) {
			$classes[] = 'ishvara-scrollbar-style';
		}
		
		// Mouse style function
		if ( $cursor != 'disable' ) {
			$classes[] = 'ishvara-cursor-style';
		}
		
		// Logo effect
		if ( $logo_effect != 'disable' ) {
			$classes[] = 'ishvara-logo-effect';
		}
		
		return $classes;
	}
}
