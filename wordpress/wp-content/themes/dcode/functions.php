<?php
/**
 * Dcode functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dcode
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'rdcode_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function rdcode_setup() {

    	/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'dcode' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        $editor_stylesheet_path = './assets/css/custom-editor-style.css';

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

        /*
         * For WooCommerce Product images
         */
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        /* image size */
        add_image_size( 'rdcode-blog-thumb', 350, 246, true );

        /*  This theme uses wp_nav_menu() in one location. */
        register_nav_menus( array(
            'rdcode_primary_menu' => esc_html__( 'Primary Menu', 'dcode' ),
            'rdcode_footer_menu'  => esc_html__( 'Footer Menu', 'dcode' )
        ) );
    
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
        	'html5', 
        	array(
	            'search-form',
	            'comment-form',
	            'comment-list',
	            'gallery',
	            'caption',
	            'script',
				'style'
        	) 
        );

        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 220,
            	'height'      => 64,
            	'flex-width'  => true,
				'flex-height' => true,
			)
		);
    
        // Set up the WordPress core custom background feature.
		$args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( "custom-background", $args );

		$args = array(
	        'default-image'      => '%s/assets/images/backgrounds/bg1.jpg',
	        'default-text-color' => 'fff',
	       	'width'              => 1190, /* 16:9 Aspect Ratio */
			'height'             => 258,
	        'flex-width'         => true,
	        'flex-height'        => true
	    );
		add_theme_support( "custom-header", $args );

        // Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
		add_theme_support( 'align-wide' );
    
        /* Add theme support for selective refresh for widgets. */
        add_theme_support( 'customize-selective-refresh-widgets' );

        /* Allow shortcodes in widgets. */
        add_filter( 'widget_text', 'do_shortcode' );

        // Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'dcode' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'dcode' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'dcode' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'dcode' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'dcode' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'dcode' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'dcode' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'dcode' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'dcode' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'dcode' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'dcode' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'dcode' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'dcode' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'dcode' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

        // Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'dcode' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'dcode' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'dcode' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'dcode' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'dcode' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'dcode' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'dcode' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'dcode' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'dcode' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'dcode' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'dcode' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

        // Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

    }
endif;
add_action( 'after_setup_theme', 'rdcode_setup' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rdcode_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rdcode_content_width', 640 );
}
add_action( 'after_setup_theme', 'rdcode_content_width', 0 );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Set the theme version
 *
 * @global int $jetrip_wordpress_version
 * @since 1.0.0
 */
function rdcode_theme_version() {
	$rdcode_theme_info         = wp_get_theme();
	$GLOBALS['rdcode_version'] = $rdcode_theme_info->get( 'Version' );
	$GLOBALS['rdcode_name']    = $rdcode_theme_info->get( 'Name' );
}
add_action( 'after_setup_theme', 'rdcode_theme_version', 0 );

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Custom script loader class.
 */
require get_template_directory() . '/inc/classes/class-dcode-script-loader.php';
require get_template_directory() . '/inc/classes/class-bootstrap-nav-walker.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Widget function file
 */
require get_template_directory() . '/inc/widgets/widget-function.php';

/**
 * Custom files for hook
 */
require get_template_directory() . '/inc/hooks/footer-hooks.php';
require get_template_directory() . '/inc/hooks/header-hooks.php';
require get_template_directory() . '/inc/hooks/custom-hooks.php';
require get_template_directory() . '/inc/hooks/section-hooks.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Jetpack Compatibility File
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/admin/theme-activation-notice.php';