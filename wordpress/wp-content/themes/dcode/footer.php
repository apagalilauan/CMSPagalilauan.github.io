<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dcode
 * @since 1.0
 */ 
?>
<!--Footer-Section-->
<?php
    /**
     * rdcode_footer hook
     * @hooked - rdcode_footer_start - 5
     * @hooked - rdcode_footer_widget_section - 10
     * @hooked - rdcode_footer_copyright - 15
     * @hooked - rdcode_footer_end - 20
     *
     * @since 1.0.0
     */
    do_action( 'rdcode_footer' );
?>
<!--End-Footer-Section-->
  <!--preloader-Section-->
   <?php
      /**
       * rdcode_preloader hook
       * @hooked - rdcode_preloader - 10
       *
       * @since 1.0.0
       */
      do_action( 'rdcode_preloader' );
  ?>
  <!--END-preloader-Section-->
  <?php wp_footer(); 
    /**
     * rdcode_footer_scroll_to_top hook
     * @hooked - rdcode_footer_scroll_to_top_button - 5
     *
     * @since 1.0.0
     */
    do_action( 'rdcode_footer_scroll_to_top' );
  ?>
  </div>
  </div>
  </body>
</html>