<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package Dcode
 * @since 1.0.0
 */

    /**
     * The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
     
    if( !is_active_sidebar( 'rdcode_footer_sidebar' ) &&
        !is_active_sidebar( 'rdcode_footer_sidebar-2' ) &&
        !is_active_sidebar( 'rdcode_footer_sidebar-3' ) &&
        !is_active_sidebar( 'rdcode_footer_sidebar-4' ) ) {
            return;
    }
    
    dynamic_sidebar( 'rdcode_footer_sidebar' );
    dynamic_sidebar( 'rdcode_footer_sidebar-2' );
    dynamic_sidebar( 'rdcode_footer_sidebar-3' );
    dynamic_sidebar( 'rdcode_footer_sidebar-4' );