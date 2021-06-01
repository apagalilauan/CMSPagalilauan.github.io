<?php
/**
 * Header file for the Dcode.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dcode
 * @since 1.0
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <!-- mobile responsive meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link rel="profile" href="https://gmpg.org/xfn/11">
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
      <?php wp_body_open(); ?>
      <div class="dcode-wrapper">
      <a class="skip-link screen-reader-text" href="#main_content"><?php esc_html_e( 'Skip to content', 'dcode' ); ?></a>
      <!-- Topbar-start-area -->
      <?php
        /**
         * rdcode_top_header hook
         *
         * @hooked - rdcode_top_header_start - 5
         * @hooked - rdcode_top_left_section - 10
         * @hooked - rdcode_top_right_section - 15
         * @hooked - rdcode_top_header_end - 20
         *
         * @since 1.0.0
         */
          do_action( 'rdcode_top_header' );
      ?>
      <!-- End-Topbar-area -->
      <header class="navigation <?php if ( get_theme_mod( 'rdcode_menu_sticky_option', 'show' ) == 'show' ) { echo esc_attr( 'header-fixed' ); } ?>">
         <!-- Topbar-start-area -->
        <?php

            /**
           * rdcode_header_section hook
           *
           * @hooked - rdcode_header_navbar_start - 5
           * @hooked - rdcode_header_navbar_left_section - 10
           * @hooked - rdcode_header_navbar_menu_section - 15
           * @hooked - rdcode_header_navbar_end - 20
           *
           * @since 1.0.0
           */
            do_action( 'rdcode_header_section' );
        ?>
        <!-- End-Topbar-area -->
      </header>
      <?php
        if ( ! is_home() ) {
            get_template_part( 'breadcrumb' );
        }
      ?>
      <div id="main_content" class="dcode-main-content">