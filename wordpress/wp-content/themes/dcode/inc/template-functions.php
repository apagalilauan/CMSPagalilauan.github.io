<?php
/**
 * Additional features to allow styling of the templates & Functions which enhance the theme by hooking into WordPress
 *
 * @package Dcode
 * @since 1.0
 */

 /*---------------------------------------------------------------------------------------------------------------------------------*/

 if ( ! function_exists( 'rdcode_fonts_url' ) ) :

    /**
     * Register Google fonts for Dcode.
     *
     * @return string Google fonts URL for the theme.
     * @since 1.0.0
     */

    function rdcode_fonts_url() {
        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'dcode' ) ) {
            $font_families[] = 'Roboto:wght@300;400;500;700;900&display=swap';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto Slab, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'dcode' ) ) {
            $font_families[] = 'Roboto+Slab:wght@100;200;300;400;500;600;700;800;900';
        }
        
        /*
         * Translators: If there are characters in your language that are not supported
         * by Raleway Slab, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Raleway Slab font: on or off', 'dcode' ) ) {
            $font_families[] = 'Raleway:wght@200;300;400;500;600;700;800;900';
        }  

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function rdcode_scripts() {
    
    global $rdcode_version;

    wp_enqueue_style( 'rdcode-fonts', rdcode_fonts_url(), array(), null );
    wp_enqueue_style( 'rdcode-main-style', get_stylesheet_uri(), array(), esc_attr( $rdcode_version ) );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome/css/font-awesome.css', array(), '5.8.2' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', array(), '4.3.1' );
    wp_enqueue_style( 'rdcode-theme-style', get_template_directory_uri().'/assets/css/theme-style.css', array(), esc_attr( $rdcode_version ) );
    wp_enqueue_style( 'rdcode-responsive', get_template_directory_uri().'/assets/css/responsive.css', array(), esc_attr( $rdcode_version ) );
    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri().'/assets/js/bootstrap.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'rdcode-custom', get_template_directory_uri().'/assets/js/script.js', array( 'jquery' ), esc_attr( $rdcode_version ), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'rdcode_scripts' );

function rdcode_admin_scripts() {
    wp_enqueue_style( 'rdcode-admin-style', get_template_directory_uri() . '/inc/admin/css/admin.css' );
    wp_enqueue_script( 'rdcode-admin-script', get_template_directory_uri() . '/inc/admin/js/admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'rdcode-admin-script', 'rdcode_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'rdcode_admin_scripts' );

/*---------------------------------------------------------------------------------------------------------------*/

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rdcode_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    /**
    * Adds a class of no-sidebar when there is no sidebar present.
    */
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }
    
    /**
     * option for web site layout 
     */
    $rdcode_website_layout = esc_attr( get_theme_mod( 'rdcode_site_layout', 'fullwidth_layout' ) );
    
    if( ! empty( $rdcode_website_layout ) ) {
        $classes[] = $rdcode_website_layout;
    }

    return $classes;
}
add_filter( 'body_class', 'rdcode_body_classes' );

/*---------------------------------------------------------------------------------------------------------------*/

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rdcode_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'rdcode_pingback_header' );

/*---------------------------------------------------------------------------------------------------------------*/

/**
* Default comment form includes name, email address and website URL
* Default comment form elements are hidden when user is logged in
*/
add_filter( 'comment_form_default_fields', 'rdcode_comment_custom_fields' );
function rdcode_comment_custom_fields( $fields ) {

    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $aria_req  = ( $req ? " aria-required='true'" : ’ );

    $fields[ 'author' ] = '<div class="comment-form-author">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="author" placeholder="' . esc_attr__( 'Name', 'dcode' ) . '" name="author" value="'. esc_attr( $commenter['comment_author'] ) .
                                    '"' . $aria_req . '>
                                    <span class="form-icon fa fa-user"></span>
                                </div>
                            </div>';

    $fields[ 'email' ] = '<div class="comment-form-email">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="email" placeholder="' . esc_attr__( 'Email', 'dcode' ) . '" name="email" value="'. esc_attr( $commenter['comment_author_email'] ) .
                                    '" ' . $aria_req . '>
                                    <span class="form-icon fas fa-envelope"></span>
                                </div>
                            </div>';

    $fields[ 'url' ] = '<div class="comment-form-url">
                            <div class="form-group">
                                <input id="url" class="form-control" type="text" placeholder="' . esc_attr__( 'Website', 'dcode' ) . '" name="url" value="'. esc_attr( $commenter['comment_author_url'] ) .
                                '" ' . $aria_req . '>
                                <span class="form-icon fas fa-wifi"></span>
                            </div>
                        </div>';
  return $fields;
}

/*---------------------------------------------------------------------------------------------------------------*/

/*  */
/**
 * To set excerpt length
 */
function rdcode_excerpt_length( $length ){
    if ( is_admin() ) {
        return $length;
    }

    $length = get_theme_mod( 'rdcode_blog_excerpt_length', 30 );
    return $length;
}
add_filter( 'excerpt_length', 'rdcode_excerpt_length', 999 );

/*---------------------------------------------------------------------------------------------------------------*/

/**
 * Comment Form field position
 */
function rdcode_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'rdcode_comment_field_to_bottom' );

/*---------------------------------------------------------------------------------------------------------------*/

/**
 * Styles the header image and custom css.
 *
 * @see rdcode_custom_style().
 */
function rdcode_custom_style() {

    global $rdcode_version;

    $header_text_color = get_header_textcolor();
    $header_image      = get_header_image();
    $custom_css        = "";

    // If we get this far, we have custom styles. Let's do this.
    wp_enqueue_style( 'rdcode-inline', get_template_directory_uri().'/assets/css/rdcode-inline.css', array(), esc_attr( $rdcode_version ) );

    // Has the text been hidden?
    if ( ! display_header_text() ) :

        $custom_css .= ".site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }
            .site-description {
                color: #fff;
            }
            .header-two .navbar-light .navbar-nav .nav-link {
                color: #fff;
            }";


    // If the user has set a custom color for the text use that.
    else :
        
        $custom_css .= ".site-title a,
            .site-description {
                color: #".esc_attr( $header_text_color ).";
            }
            .header-two .navbar-light .navbar-nav .nav-link {
                color: #".esc_attr( $header_text_color ).";
            }";

    endif;
    
    if ( has_header_image() ) : 

        $custom_css .= ".page-title{
            background-image: url(".esc_attr( $header_image ).");
        }";

    endif;

    if ( ! empty ( get_theme_mod( 'rdcode_copyright_text_color' ) ) ) : 

        $custom_css .= "p.copy-right-credit{
            color: ".esc_attr( get_theme_mod( 'rdcode_copyright_text_color', '#fff' ) ).";
        }";

    endif;

    if ( ! empty ( get_theme_mod( 'rdcode_theme_color' ) ) ) : 

        $custom_css .= ".blog_sidebar .card-header, p.copy-right-credit, footer, .home.blog header.navigation{
            background: ".esc_attr( get_theme_mod( 'rdcode_theme_color', '#131935' ) )."!important;
        }";

        $custom_css .= ".header_top_area.type-two .contact_wrapper_top .header_top_contact li, .header_top_area.type-two .contact_wrapper_top .header_top_contact li i {
            color: ".esc_attr( get_theme_mod( 'rdcode_theme_color', '#131935' ) )."!important;
        }";

    endif;

    if ( ! empty ( get_theme_mod( 'rdcode_link_color' ) ) ) : 

        $custom_css .= "a{
            color: ".esc_attr( get_theme_mod( 'rdcode_link_color', '#131935' ) ).";
        }";

    endif;

    if ( ! empty ( get_theme_mod( 'rdcode_btn_color' ) ) ) : 

        $custom_css .= ".btn-primary{
            background: ".esc_attr( get_theme_mod( 'rdcode_btn_color', '#b5a067' ) ).";
        }";

    endif;

    if ( ! empty ( get_theme_mod( 'rdcode_btn_border_color' ) ) ) : 

        $custom_css .= ".btn-primary{
            border: 2px solid ".esc_attr( get_theme_mod( 'rdcode_btn_border_color', '#b5a067' ) ).";
        }";

    endif;

    if ( ! empty ( get_theme_mod( 'rdcode_btn_hover_color' ) ) ) : 

        $custom_css .= ".btn-primary:hover{
            background: ".esc_attr( get_theme_mod( 'rdcode_btn_hover_color', '#131935' ) ).";
        }";

    endif;

    if ( ! empty ( get_theme_mod( 'rdcode_btn_hover_border_color' ) ) ) : 

        $custom_css .= ".btn-primary:hover{
            border-color: ".esc_attr( get_theme_mod( 'rdcode_btn_hover_border_color', '#131935' ) ).";
        }";

    endif;

    /**
     * BODY & CONTENT font family.
     */
    $rdcode_base_typoghraphy_family    = get_theme_mod( 'rdcode_base_typoghraphy_family', 'default' );
    $rdcode_base_typo_family_size      = get_theme_mod( 'rdcode_base_typo_family_size', '15' );
    $rdcode_base_typo_family_weight    = get_theme_mod( 'rdcode_base_typo_family_weight', 'inherit' );
    $rdcode_base_typo_family_transform = get_theme_mod( 'rdcode_base_typo_family_transform', '' );
    $rdcode_base_typo_line_height      = get_theme_mod( 'rdcode_base_typo_line_height', '' );
    if ( ! empty ( $rdcode_base_typoghraphy_family ) || ! empty ( $rdcode_base_typo_family_size ) || ! empty ( $rdcode_base_typo_family_weight ) || ! empty ( $rdcode_base_typo_family_transform ) ) {
        $custom_css .= 'body, p, .navbar .navbar-nav .nav-item .nav-link, .header_top_area .contact_wrapper_top .header_top_contact li {
            font-family: ' . esc_attr( $rdcode_base_typoghraphy_family ) . ';
            font-size: ' . esc_attr( $rdcode_base_typo_family_size ) . 'px!important;
            font-weight: ' . esc_attr( $rdcode_base_typo_family_weight ) . ';
            text-transform: ' . esc_attr( $rdcode_base_typo_family_transform ) . ';
            line-height: ' . esc_attr( $rdcode_base_typo_line_height ) . ';
        }';
        if ( class_exists( 'WooCommerce', false ) ) {
            $custom_css .= '.woocommerce.single-product h1.product_title, .woocommerce section.related.products h2, .woocommerce section.exclusive-products h2, .woocommerce span.comment-reply-title, .woocommerce ul.products[class*="columns-"] li.product-category h2 {
                font-family: ' . esc_attr( $rdcode_base_typoghraphy_family ) . ';
                font-size: ' . esc_attr( $rdcode_base_typo_family_size ) . 'px!important;
                font-weight: ' . esc_attr( $rdcode_base_typo_family_weight ) . ';
                text-transform: ' . esc_attr( $rdcode_base_typo_family_transform ) . ';
            }';
        }
    }

    /**
     * HEADINGS ( H1 - H6 ).
     */
    $rdcode_base_all_h_family      = get_theme_mod( 'rdcode_base_all_h_family', 'default' );
    $rdcode_base_all_h_weight      = get_theme_mod( 'rdcode_base_all_h_weight', '' );
    $rdcode_base_all_h_transform   = get_theme_mod( 'rdcode_base_all_h_transform', '' );
    $rdcode_base_all_h_line_height = get_theme_mod( 'rdcode_base_all_h_line_height' );
    if ( ! empty ( $rdcode_base_all_h_family ) || ! empty ( $rdcode_base_all_h_weight ) || ! empty ( $rdcode_base_all_h_transform ) || ! empty ( $rdcode_base_all_h_line_height ) ) {
        $custom_css .= ' h1, h2, h3, h4, h5, h6 {
            font-family: ' . esc_attr( $rdcode_base_all_h_family ) . ';
            font-weight: ' . esc_attr( $rdcode_base_all_h_weight ) . ';
            text-transform: ' . esc_attr( $rdcode_base_all_h_transform ) . ';
            line-height: ' . esc_attr( $rdcode_base_all_h_line_height ) . ';
        }';
    }

    /**
     * HEADINGS ( H1 ).
     */
    $rdcode_base_all_h1_family      = get_theme_mod( 'rdcode_base_all_h1_family', 'default' );
    $rdcode_base_all_h1_size        = get_theme_mod( 'rdcode_base_all_h1_size', '' );
    $rdcode_base_all_h1_weight      = get_theme_mod( 'rdcode_base_all_h1_weight', '' );
    $rdcode_base_all_h1_transform   = get_theme_mod( 'rdcode_base_all_h1_transform', '' );
    $rdcode_base_all_h1_line_height = get_theme_mod( 'rdcode_base_all_h1_line_height' );
    if ( ! empty ( $rdcode_base_all_h1_family ) || ! empty ( $rdcode_base_all_h1_size ) || ! empty ( $rdcode_base_all_h1_weight ) || ! empty ( $rdcode_base_all_h1_transform ) || ! empty ( $rdcode_base_all_h1_line_height ) ) {
        $custom_css .= ' h1 {
            font-family: ' . esc_attr( $rdcode_base_all_h1_family ) . ';
            font-size: ' . esc_attr( $rdcode_base_all_h1_size ) . 'px;
            font-weight: ' . esc_attr( $rdcode_base_all_h1_weight ) . ';
            text-transform: ' . esc_attr( $rdcode_base_all_h1_transform ) . ';
            line-height: ' . esc_attr( $rdcode_base_all_h1_line_height ) . ';
        }';
    }

    /**
     * HEADINGS ( H2 ).
     */
    $rdcode_base_all_h2_family      = get_theme_mod( 'rdcode_base_all_h2_family', 'default' );
    $rdcode_base_all_h2_size        = get_theme_mod( 'rdcode_base_all_h2_size', '' );
    $rdcode_base_all_h2_weight      = get_theme_mod( 'rdcode_base_all_h2_weight', '' );
    $rdcode_base_all_h2_transform   = get_theme_mod( 'rdcode_base_all_h2_transform', '' );
    $rdcode_base_all_h2_line_height = get_theme_mod( 'rdcode_base_all_h2_line_height' );
    if ( ! empty ( $rdcode_base_all_h2_family ) || ! empty ( $rdcode_base_all_h2_size ) || ! empty ( $rdcode_base_all_h2_weight ) || ! empty ( $rdcode_base_all_h2_transform ) || ! empty ( $rdcode_base_all_h2_line_height ) ) {
        $custom_css .= ' h2 {
            font-family: ' . esc_attr( $rdcode_base_all_h2_family ) . ';
            font-size: ' . esc_attr( $rdcode_base_all_h2_size ) . 'px;
            font-weight: ' . esc_attr( $rdcode_base_all_h2_weight ) . ';
            text-transform: ' . esc_attr( $rdcode_base_all_h2_transform ) . ';
            line-height: ' . esc_attr( $rdcode_base_all_h2_line_height ) . ';
        }';
    }

    /**
     * HEADINGS ( H3 ).
     */
    $rdcode_base_all_h3_family      = get_theme_mod( 'rdcode_base_all_h3_family', 'default' );
    $rdcode_base_all_h3_size        = get_theme_mod( 'rdcode_base_all_h3_size', '' );
    $rdcode_base_all_h3_weight      = get_theme_mod( 'rdcode_base_all_h3_weight', '' );
    $rdcode_base_all_h3_transform   = get_theme_mod( 'rdcode_base_all_h3_transform', '' );
    $rdcode_base_all_h3_line_height = get_theme_mod( 'rdcode_base_all_h3_line_height' );
    if ( ! empty ( $rdcode_base_all_h3_family ) || ! empty ( $rdcode_base_all_h3_size ) || ! empty ( $rdcode_base_all_h3_weight ) || ! empty ( $rdcode_base_all_h3_transform ) || ! empty ( $rdcode_base_all_h3_line_height ) ) {
        $custom_css .= ' h3 {
            font-family: ' . esc_attr( $rdcode_base_all_h3_family ) . ';
            font-size: ' . esc_attr( $rdcode_base_all_h3_size ) . 'px;
            font-weight: ' . esc_attr( $rdcode_base_all_h3_weight ) . ';
            text-transform: ' . esc_attr( $rdcode_base_all_h3_transform ) . ';
            line-height: ' . esc_attr( $rdcode_base_all_h3_line_height ) . ';
        }';
    }

    /**
     * HEADINGS ( H4 ).
     */
    $rdcode_base_all_h4_size = get_theme_mod( 'rdcode_base_all_h4_size', '' );
    if ( ! empty ( $rdcode_base_all_h4_size ) ) {
        $custom_css .= ' h4 {
            font-size: ' . esc_attr( $rdcode_base_all_h4_size ) . 'px;
        }';
    }

    /**
     * HEADINGS ( H5 ).
     */
    $rdcode_base_all_h5_size = get_theme_mod( 'rdcode_base_all_h5_size', '' );
    if ( ! empty ( $rdcode_base_all_h5_size ) ) {
        $custom_css .= ' h5 {
            font-size: ' . esc_attr( $rdcode_base_all_h5_size ) . 'px;
        }';
    }

    /**
     * HEADINGS ( H5 ).
     */
    $rdcode_base_all_h5_size = get_theme_mod( 'rdcode_base_all_h5_size', '' );
    if ( ! empty ( $rdcode_base_all_h5_size ) ) {
        $custom_css .= ' h4 {
            font-size: ' . esc_attr( $rdcode_base_all_h5_size ) . 'px;
        }';
    }

    wp_add_inline_style( 'rdcode-inline', $custom_css );  
}
add_action( 'wp_enqueue_scripts', 'rdcode_custom_style' );

/*---------------------------------------------------------------------------------------------------------------*/