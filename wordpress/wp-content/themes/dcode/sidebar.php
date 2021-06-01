<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dcode
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside class="col-lg-4 col-sm-12 blog_sidebar">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->