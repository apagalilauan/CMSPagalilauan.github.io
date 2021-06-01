<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Mega Charity
	 * @since Mega Charity 1.0.0
	 */

	/**
	 * mega_charity_doctype hook
	 *
	 * @hooked mega_charity_doctype -  10
	 *
	 */
	do_action( 'mega_charity_doctype' );

?>
<head>
<?php
	/**
	 * mega_charity_before_wp_head hook
	 *
	 * @hooked mega_charity_head -  10
	 *
	 */
	do_action( 'mega_charity_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * mega_charity_page_start_action hook
	 *
	 * @hooked mega_charity_page_start -  10
	 *
	 */
	do_action( 'mega_charity_page_start_action' ); 

	/**
	 * mega_charity_header_action hook
	 *
	 * @hooked mega_charity_header_start -  10
	 * @hooked mega_charity_site_branding -  20
	 * @hooked mega_charity_site_navigation -  30
	 * @hooked mega_charity_header_end -  50
	 *
	 */
	do_action( 'mega_charity_header_action' );

	/**
	 * mega_charity_content_start_action hook
	 *
	 * @hooked mega_charity_content_start -  10
	 *
	 */
	do_action( 'mega_charity_content_start_action' );

	/**
	 * mega_charity_header_image_action hook
	 *
	 * @hooked mega_charity_header_image -  10
	 *
	 */
	do_action( 'mega_charity_header_image_action' );

	if ( mega_charity_is_frontpage() ) {
    	$options = mega_charity_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'mega_charity_primary_content', 'mega_charity_add_'. $section .'_section' );
		}

		do_action( 'mega_charity_primary_content' );
	}