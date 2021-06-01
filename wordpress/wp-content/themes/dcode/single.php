<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dcode
 * @since 1.0.0
 */

get_header();
?>
<section class="section">
  <div class="container">
      <div class="row">
        <!-- Single Post Layout -->
        <?php
          /**
           * rdcode_single_layout hook
           *
           * @hooked - rdcode_single_sidebar_layout - 20
           *
           * @since 1.0.0
           */
          do_action( 'rdcode_single_layout' );
        ?>
      </div>
  </div>
</section>
<?php
get_footer();