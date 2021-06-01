<?php // Template Name: Homepage

    get_header();

    $blog_home = absint( get_theme_mod( 'rdcode_slider_home', 1 ) );
    if ( $blog_home == 1 ) {
        do_action( 'beastthemes_slider_sec' );
    }

    $blog_home = absint( get_theme_mod( 'rdcode_service_home', 1 ) );
    if ( $blog_home == 1 ) {
        do_action( 'beastthemes_service_sec' );
    }

    $blog_home = absint( get_theme_mod( 'rdcode_testimonial_home', 1 ) );
    if ( $blog_home == 1 ) {
        do_action( 'beastthemes_testimonial_sec' );
    }

    $blog_home = absint( get_theme_mod( 'rdcode_team_home', 1 ) );
    if ( $blog_home == 1 ) {
        do_action( 'beastthemes_team_sec' );
    }

    $blog_home = absint( get_theme_mod( 'rdcode_client_home', 1 ) );
    if ( $blog_home == 1 ) {
        do_action( 'beastthemes_client_sec' );
    }

    $blog_home = absint( get_theme_mod( 'rdcode_blog_home', 1 ) );
    if ( $blog_home == 1 ) {
        do_action( 'rdcode_blog_sec' );
    }

get_footer();