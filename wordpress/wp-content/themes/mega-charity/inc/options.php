<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function mega_charity_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'mega-charity' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function mega_charity_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'mega-charity' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'mega_charity_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function mega_charity_selected_sidebar() {
        $mega_charity_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'mega-charity' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'mega-charity' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'mega-charity' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'mega-charity' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'mega-charity' ),
        );

        $output = apply_filters( 'mega_charity_selected_sidebar', $mega_charity_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'mega_charity_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function mega_charity_site_layout() {
        $mega_charity_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'mega_charity_site_layout', $mega_charity_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'mega_charity_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function mega_charity_global_sidebar_position() {
        $mega_charity_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'mega_charity_global_sidebar_position', $mega_charity_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'mega_charity_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function mega_charity_sidebar_position() {
        $mega_charity_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'mega_charity_sidebar_position', $mega_charity_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'mega_charity_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function mega_charity_pagination_options() {
        $mega_charity_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'mega-charity' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'mega-charity' ),
        );

        $output = apply_filters( 'mega_charity_pagination_options', $mega_charity_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'mega_charity_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function mega_charity_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'mega-charity' ),
            'spinner-wheel'         => esc_html__( 'Wheel', 'mega-charity' ),
            'spinner-double-circle' => esc_html__( 'Double Circle', 'mega-charity' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'mega-charity' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'mega-charity' ),
            'spinner-dots'          => esc_html__( 'Dots', 'mega-charity' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'mega-charity' ),
            'spinner-fidget'        => esc_html__( 'Fidget', 'mega-charity' ),
        );
        return apply_filters( 'mega_charity_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'mega_charity_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function mega_charity_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'mega-charity' ),
            'off'       => esc_html__( 'Disable', 'mega-charity' )
        );
        return apply_filters( 'mega_charity_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'mega_charity_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function mega_charity_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'mega-charity' ),
            'off'       => esc_html__( 'No', 'mega-charity' )
        );
        return apply_filters( 'mega_charity_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'mega_charity_heading_tags' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function mega_charity_heading_tags() {
        
        $mega_charity_heading_tags = array(
			'h1'	=> esc_html__('H1', 'mega-charity'),
			'h2'	=> esc_html__('H2', 'mega-charity'),
			'h3'	=> esc_html__('H3', 'mega-charity'),
			'h4'	=> esc_html__('H4', 'mega-charity'),
			'h5'	=> esc_html__('H5', 'mega-charity'),
			'h6'	=> esc_html__('H6', 'mega-charity'),
			'p'		=> esc_html__('Paragraph', 'mega-charity'),
		);

        $output = apply_filters( 'mega_charity_heading_tags', $mega_charity_heading_tags );


        return $output;
    }
endif;


if ( ! function_exists( 'mega_charity_popular_product_content_type' ) ) :
    /**
     * List of product_layout_similar_product options
     * @return array List of product_layout_similar_product options.
     */
    function mega_charity_popular_product_content_type() {
    
        if ( class_exists( 'WooCommerce' ) ) {
                $arr = array(
                'product'           => esc_html__( 'Product', 'mega-charity' ),
                'product_cat'       => esc_html__( 'Product Category', 'mega-charity' ),
                'recent_product'    => esc_html__( 'Recent Product', 'mega-charity' ),
            );
        }

        return apply_filters( 'mega_charity_popular_product_content_type', $arr );
    }
endif;

if ( ! function_exists( 'mega_charity_latest_product_content_type' ) ) :
    /**
     * List of product_layout_similar_product options
     * @return array List of product_layout_similar_product options.
     */
    function mega_charity_latest_product_content_type() {
    
        if ( class_exists( 'WooCommerce' ) ) {
                $arr = array(
                'product'           => esc_html__( 'Product', 'mega-charity' ),
                'product_cat'       => esc_html__( 'Product Category', 'mega-charity' ),
                'recent_product'    => esc_html__( 'Recent Product', 'mega-charity' ),
            );
        }

        return apply_filters( 'mega_charity_latest_product_content_type', $arr );
    }
endif;