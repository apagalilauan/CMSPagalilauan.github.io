<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 * @return array An array of default values
 */

function mega_charity_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$mega_charity_default_options = array(
		// Color Options
		'header_title_color'			=> '#000',
		'header_tagline_color'			=> '#000',
		'header_txt_logo_extra'			=> 'show-all',
		
		// typography Options
		'theme_typography' 				=> 'default',
		'body_theme_typography' 		=> 'default',

		//body typography
		'body_font_family'			=> 'Muli',
		'body_font_weight'			=> 300,
		'body_font_size'			=> 16,
		'body_font_style'			=> 'normal',
		'body_text_transform'		=> 'none',

		//h1 typography
		'heading_h1_font_family'		=> 'Raleway',
		'heading_h1_font_weight'		=> 300,
		'heading_h1_text_transform'		=> 'none',
		'heading_h1_font_style'			=> 'normal',

		//h2 typography
		'heading_h2_font_family'		=> 'Raleway',
		'heading_h2_font_weight'		=> 700,
		'heading_h2_text_transform'		=> 'none',
		'heading_h2_font_style'			=> 'normal',

		//h3 typography
		'heading_h3_font_family'		=> 'Raleway',
		'heading_h3_font_weight'		=> 700,
		'heading_h3_text_transform'		=> 'none',
		'heading_h3_font_style'			=> 'normal',

		//h4 typography
		'heading_h4_font_family'		=> 'Raleway',
		'heading_h4_font_weight'		=> 700,
		'heading_h4_text_transform'		=> 'none',
		'heading_h4_font_style'			=> 'normal',

		//h5 typography
		'heading_h5_font_family'		=> 'Raleway',
		'heading_h5_font_weight'		=> 700,
		'heading_h5_text_transform'		=> 'none',
		'heading_h5_font_style'			=> 'normal',

		//h6 typography
		'heading_h6_font_family'		=> 'Raleway',
		'heading_h6_font_weight'		=> 700,
		'heading_h6_text_transform'		=> 'none',
		'heading_h6_font_style'			=> 'normal',

		//p typography
		'heading_p_font_family'			=> 'Muli',
		'heading_p_font_weight'			=> 400,
		'heading_p_text_transform'		=> 'none',
		'heading_p_font_style'			=> 'normal',

		//button
		'button_background_color'		=> '#e5f8fc',
		'button_text_color'		=> '#00afe9',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		
		//menu
		'nav_btn'						=> true,
		'nav_btn_txt' 					=> esc_html__( 'Donate Now', 'mega-charity' ),
		'nav_btn_url' 					=> '#',

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'mega-charity' ), '[the-year]', '[site-link]' ),

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'hero_banner,service,about,counter,help_us,team,latest_posts,contact',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'mega-charity' ),
		'hide_date' 					=> false,
		'hide_author'					=> false,
		
		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,

		/* Front Page */

		// hero_banner
		'hero_banner_section_enable'		=> false,
		'hero_banner_sub_title'				=> esc_html__( 'Together', 'mega-charity' ),
		'hero_banner_btn_title'				=> esc_html__( 'Discover', 'mega-charity' ),
		'hero_banner_alt_btn_title'			=> esc_html__( 'Donate Now', 'mega-charity' ),

		// service
		'service_section_enable'		=> false,
		'service_title'					=> esc_html('We Are Always Where  Others <span>Needs Help</span>', 'mega-charity'),
		'service_btn_title'				=> esc_html('View All Services', 'mega-charity'),

		// about
		'about_section_enable'			=> false,
		'about_sub_title'				=> esc_html__( 'Keep Helping', 'mega-charity' ),
		'about_btn_title'				=> esc_html__( 'More About Us', 'mega-charity' ),

		//counter
		'counter_section_enable'		=> false,

		//help us
		'help_us_section_enable'		=> false,
		'help_us_subtitle'				=> __( 'HELP US', 'mega-charity' ),
		'help_us_title'					=> __( 'Join Our Cause, Anyone Can Help', 'mega-charity' ),
		'help_us_btn'					=> __( 'Learn More', 'mega-charity' ),	

		// team
		'team_section_enable'		=> false,
		'team_title'				=> esc_html('Meet Our Team', 'mega-charity'),

		// latest_posts
		'latest_posts_section_enable'	=> false,
		'latest_posts_content_type'		=> 'category',
		'latest_posts_title'			=> esc_html__( 'News & Happenings Around Us', 'mega-charity' ),

		// Contact Us
		'contact_section_enable'		=> false,
		'contact_social_menu_enable'	=> true,
		'contact_contact_info'			=> __( 'Contact us and join the team HelpYou', 'mega-charity' ),
		'contact_phone_no'				=> __( '+508-982-5074', 'mega-charity' ),
		'contact_email'					=> __( 'info@helpyou.com', 'mega-charity' ),
	);

	$output = apply_filters( 'mega_charity_default_theme_options', $mega_charity_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}