<?php
/**
 * File to sanitize customizer field
 *
 * @package Dcode
 * @since 1.0.0
 */

/**
 * Sanitize checkbox value
 *
 * @since 1.0.1
 */
function rdcode_sanitize_checkbox( $input ) {
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

function rdcode_sanitize_number_absint( $number, $setting ) {
  // Ensure $number is an absolute integer (whole number, zero or greater).
  $number = absint( $number );

  // If the input is an absolute integer, return it; otherwise, return the default
  return ( $number ? $number : $setting->default );
}

/**
 * Sanitize repeater value
 *
 * @since 1.0.0
 */
function rdcode_sanitize_repeater( $input ){
    $input_decoded = json_decode( $input, true );
        
    if( !empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxes => $box ){
            foreach ( $box as $key => $value ){
                $input_decoded[$boxes][$key] = wp_kses_post( $value );
            }
        }
        return json_encode( $input_decoded );
    }
    
    return $input;
}

/**
 * Sanitize site layout
 *
 * @since 1.0.0
 */
function rdcode_sanitize_site_layout( $input ) {
    $valid_keys = array(
        'fullwidth_layout' => esc_html__( 'Fullwidth Layout', 'dcode' ),
        'boxed_layout'     => esc_html__( 'Boxed Layout', 'dcode' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * switch option (show/hide)
 *
 * @since 1.0.0
 */
function rdcode_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => esc_html__( 'Show', 'dcode' ),
            'hide'  => esc_html__( 'Hide', 'dcode' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * sanitize function for home-sortable
 *
 * @since 1.0.0
 */
function rdcode_sanitize_mulitple_checkbox( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

/**
 * sanitize function for multiple checkboxes
 *
 * @since 1.0.0
 */
function rdcode_sanitize_json_string( $json ) {
    $sanitized_value = array();
    foreach ( json_decode( $json, true ) as $value ) {
        $sanitized_value[] = esc_attr( $value );
    }

    return json_encode( $sanitized_value );
}

/**
 * sanitize function for Radio type
 *
 * @since 1.0.0
 */
function rdcode_sanitize_radio_option( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
  
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
  
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Dcode 1.0.0
 * @see rdcode_footer_settings_register()
 *
 * @return void
 */
function rdcode_customize_partial_copyright(){
    return get_theme_mod( 'rdcode_copyright_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Dcode 1.0.0
 * @see rdcode_design_settings_register()
 *
 * @return void
 */
function rdcode_customize_partial_archive_more(){
    return get_theme_mod( 'rdcode_archive_read_more_text' );
}

/**
 * Render the Show/Hide option for the selective refresh partial.
 *
 * @since Dcode 1.0.0
 * @see rdcode_header_settings_register()
 *
 * @return void
 */
function rdcode_customize_partial_top_header(){
    return get_theme_mod( 'rdcode_top_header_option' );
}

/**
 * Render the pagination option for the selective refresh partial.
 *
 * @since Dcode 1.0.0
 * @see rdcode_design_settings_register()
 *
 * @return void
 */
function rdcode_customize_partial_pagination(){
    return get_theme_mod( 'rdcode_radio_post_pagination' );
}

// Sanitize Sortable control.
function rdcode_sanitize_sortable( $val = array(), $setting ) {
    if ( is_string( $val ) || is_numeric( $val ) ) {
        return array(
            esc_attr( $val ),
        );
    }
    $sanitized_value = array();
    foreach ( $val as $item ) {
        if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
            $sanitized_value[] = esc_attr( $item );
        }
    }
    return $sanitized_value;
}