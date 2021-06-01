<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Mega Charity
* @since Mega Charity 1.0.0
*/

if ( ! function_exists( 'mega_charity_validate_long_excerpt' ) ) :
  function mega_charity_validate_long_excerpt( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'mega-charity' ) );
	 } elseif ( $value < 5 ) {
		 $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'mega-charity' ) );
	 } elseif ( $value > 100 ) {
		 $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'mega-charity' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'mega_charity_validate_help_us_count' ) ) :
  function mega_charity_validate_help_us_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'mega-charity' ) );
	 } elseif ( $value < 3 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 3', 'mega-charity' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'mega-charity' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'mega_charity_validate_featured_count' ) ) :
  function mega_charity_validate_featured_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'mega-charity' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'mega-charity' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'mega-charity' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'mega_charity_validate_service_count' ) ) :
  function mega_charity_validate_service_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'mega-charity' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'mega-charity' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'mega-charity' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'mega_charity_validate_latest_posts_count' ) ) :
  function mega_charity_validate_latest_posts_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'mega-charity' ) );
	 } elseif ( $value < 2 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'mega-charity' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'mega-charity' ) );
	 }
	 return $validity;
  }
endif;

if ( ! function_exists( 'mega_charity_validate_team_count' ) ) :
  function mega_charity_validate_team_count( $validity, $value ){
		 $value = intval( $value );
	 if ( empty( $value ) || ! is_numeric( $value ) ) {
		 $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'mega-charity' ) );
	 } elseif ( $value < 1 ) {
		 $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 1', 'mega-charity' ) );
	 } elseif ( $value > 12 ) {
		 $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'mega-charity' ) );
	 }
	 return $validity;
  }
endif;
