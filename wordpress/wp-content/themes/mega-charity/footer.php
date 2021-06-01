<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Mega Charity
 * @since Mega Charity 1.0.0
 */

/**
 * mega_charity_footer_primary_content hook
 *
 * @hooked mega_charity_add_contact_section -  10
 *
 */
do_action( 'mega_charity_footer_primary_content' );

/**
 * mega_charity_content_end_action hook
 *
 * @hooked mega_charity_content_end -  10
 *
 */
do_action( 'mega_charity_content_end_action' );

/**
 * mega_charity_content_end_action hook
 *
 * @hooked mega_charity_footer_start -  10
 * @hooked mega_charity_Footer_Widgets->add_footer_widgets -  20
 * @hooked mega_charity_footer_site_info -  40
 * @hooked mega_charity_footer_end -  100
 *
 */
do_action( 'mega_charity_footer' );

/**
 * mega_charity_page_end_action hook
 *
 * @hooked mega_charity_page_end -  10
 *
 */
do_action( 'mega_charity_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
