<?php
if ( is_front_page() ) {
  return;
}

$rdcode_bead_div_option = get_theme_mod( 'rdcode_bead_div_option', 'show' );
if ( ! empty ( $rdcode_bead_div_option ) && $rdcode_bead_div_option == 'show' ) {
?>
<!-- page title -->
<section class="page-title position-relative breadcrumb-main">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">
          <?php 
            if ( is_home() ) {
              echo esc_html__( "Blog", "dcode" );
            } else {
              the_title();
            } 
          ?>
        </h1>
		<nav>
			<ol class="breadcrumb bg-transparent d-flex justify-content-center text-white">
			 <?php 
          global $post;
          $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
          $home        = esc_html__( 'Home', 'dcode' ); // text for the 'Home' link
          $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
          $homeLink    = home_url();

          if ( is_home() || is_front_page() ) {
            if ( $showOnHome == 1 ) echo '<li class="breadcrumb-item"><a href="'.esc_attr( esc_url( $homeLink ) ).'">'.esc_html( $home ).'</a></li>';
          }
          else {
            echo '<li class="breadcrumb-item"><a href="'.esc_attr( esc_url( $homeLink ) ).'">'.esc_html( $home ).'</a></li>';
            if ( is_category() ) {
                global $wp_query;
                $catt_obj   = $wp_query->get_queried_object();
                $thisCat   = $catt_obj->term_id;
                $thisCat   = get_category( $thisCat );
                $parentCat = get_category( $thisCat->parent );
                if ( $thisCat->parent != 0 ) echo '<li class="breadcrumb-item">'.wp_kses_post( get_category_parents( $parentCat, TRUE, ' ' ) ).'</li>';
                echo '<li class="breadcrumb-item active">'. esc_html__( 'Archive by category', 'dcode' ).' "' . single_cat_title( '', false)  . '"'."</li>";
            }
            elseif ( is_search() ) {
              echo '<li class="breadcrumb-item active">'.esc_html__( 'Results for', 'dcode' ).' "' . get_search_query() . '"'."</li>";
            }
            elseif ( is_day() ) {
              echo '<li class="breadcrumb-item"><a href="' . esc_attr( esc_url( get_year_link( get_the_time( 'Y' ) ) ) ) . '">' . esc_html( get_the_time( 'Y' )  ). '</a></li> ';
              echo '<li class="breadcrumb-item"><a href="' . esc_attr( esc_url( get_month_link( get_the_time( 'Y' ),get_the_time( 'm' ) ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a></li> ';
              echo '<li class="breadcrumb-item active">'.esc_html( get_the_time( 'd' ) )."</li>";
            }
            elseif ( is_month() ) {
              echo '<li class="breadcrumb-item"><a href="' . esc_attr( esc_url( get_year_link( get_the_time( 'Y' ) ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a></li> ';
              echo '<li class="breadcrumb-item active">'.esc_html( get_the_time( 'F' ) )."</li>";
            }
            elseif ( is_year() ) {
              echo '<li class="breadcrumb-item active">'.esc_html( get_the_time( 'Y' ) )."</li>";
            }
            elseif ( is_single() && !is_attachment() ) {
              if ( get_post_type() != 'post' ) {
                $post_typee = get_post_type_object( get_post_type() );
                $slug       = $post_typee->rewrite;
                echo '<li class="breadcrumb-item"><a href="' . esc_attr( esc_url( $homeLink ) ) . '/' . esc_attr( esc_url( $slug['slug'] ) ) . '/">' . esc_html( $slug['slug'] ) . '</a></li>';
                if ( $showCurrent == 1 ) echo '<li class="breadcrumb-item active">'.esc_html( get_the_title() ).'</li>';
              }
              else {
                $catt = get_the_category(); 
                $catt = $catt[0];
                is_wp_error( $catts = get_category_parents( $catt, TRUE, ' ' ) ) ? '' : $catts; 
                if ( $showCurrent == 0 ) $catts = preg_replace( "/^(.+)\s \s$/", "$1", $catts );
                if ( $showCurrent == 1 ) echo '<li class="breadcrumb-item active">'.wp_kses_post( get_the_title() ).'</li>';
              }
            }
            elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
              $post_typee = get_post_type_object(get_post_type());
              echo esc_html(get_post_type_object(get_post_type()))->labels->singular_name;
            }
            elseif ( is_attachment() ) {
              $parent = get_post( $post->post_parent );
              echo '<li class="breadcrumb-item"><a href="' . esc_attr( esc_url( get_permalink( $parent ) ) ) . '">' . esc_html( $parent->post_title ) . '</a></li>';
              if ( $showCurrent == 1 ) echo '<li class="breadcrumb-item active">'.esc_html( get_the_title() ).'</li>';
            }
            elseif ( is_page() && !$post->post_parent ) {
              if ( $showCurrent == 1 ) echo '<li class="breadcrumb-item active">'.esc_html( get_the_title() ).'</li>';
            }
            elseif ( is_page() && $post->post_parent ) {
              $parent_id   = $post->post_parent;
              $breadcrumbs = array();
              while ( $parent_id ) {
                $pagee          = get_page( $parent_id );
                $breadcrumbs[]  = '<li class="breadcrumb-item"><a href="' . esc_attr( esc_url( get_permalink( $pagee->ID ) ) ) . '">' . esc_html(get_the_title( $pagee->ID ) ) . '</a></li> ';
                $parent_id      = $pagee->post_parent;
              }
              $breadcrumbs = array_reverse( $breadcrumbs );
              foreach ( $breadcrumbs as $crumb ) echo !empty( $crumb ) ? wp_kses_post( $crumb ) : '';
              if ( $showCurrent == 1 ) echo '<li class="breadcrumb-item active">'.esc_html( get_the_title() ).'</li>';
            }
            elseif ( is_tag() ) {
              echo '<li class="breadcrumb-item active">'.esc_html__( 'Posts tagged for ', 'dcode' ).' "' . single_tag_title( '', false ) . '"'.'</li>';
            }
            elseif ( is_author() ) {
              global $author;
              $userdataa = get_userdata( $author );
              echo '<li class="breadcrumb-item active">'.esc_html__( 'Articles posted by', 'dcode' ).' ' . esc_html( $userdataa->display_name ).'</li>';
            }
            elseif ( is_404() ) {
              echo '<li class="breadcrumb-item active">'.esc_html__( 'Error 404', 'dcode' ).'</li>';
            }
          }
        ?>
			</ol>
		 </nav>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->
<?php } ?>