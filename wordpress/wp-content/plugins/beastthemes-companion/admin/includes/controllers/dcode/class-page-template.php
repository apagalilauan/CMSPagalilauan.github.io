<?php
defined( 'ABSPATH' ) or wp_die();

/**
 * Add page templates.
 */
class BeastThemesCompanionPageTemplates {
	
	public static function add_page_template_to_dropdown( $templates ) {
		$templates['home-template.php'] = esc_html__( 'Homepage', 'beastthemes_companion' );
   		return $templates;
	}

	public static function catch_plugin_template( $template ) {
		if ( is_page_template( 'home-template.php' ) ) {
			$template = BEASTTHEMES_COMPANION_PLUGIN_DIR_PATH . 'admin/includes/controllers/dcode/home-template.php';
		}
	    return $template;
	}

	public static function setup_homepage_template() {

	    $HomePgaeTemplate = get_option( 'beastthemes_front_page' );

	    if ( ! $HomePgaeTemplate ) {

	        //post status and options
	        $post = array(
	              'comment_status' => 'closed',
	              'ping_status'    => 'closed' ,
	              'post_author'    => 1,
	              'post_date'      => date('Y-m-d H:i:s'),
	              'post_name'      => 'Homepage',
	              'post_status'    => 'publish' ,
	              'post_title'     => 'Homepage',
	              'post_type'      => 'page',
	        ); 

	        //insert page and save the id
	        $NewValue = wp_insert_post( $post, false );
	        if ( $NewValue && ! is_wp_error( $NewValue ) ){
	            update_post_meta( $NewValue, '_wp_page_template', 'home-template.php' ); 

	            // Use a static front page
	            $page = get_page_by_title('Homepage');
	            update_option( 'show_on_front', 'page' );
	            update_option( 'page_on_front', $page->ID );      
	        }

	        //save the id in the database
	        update_option( 'beastthemes_front_page', $NewValue );
	    }
	}
}