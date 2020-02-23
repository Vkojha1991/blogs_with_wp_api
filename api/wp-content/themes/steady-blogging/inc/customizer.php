<?php
/**
 * steady Theme Customizer.
 *
 * @package steady Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function steady_blogging_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport                              = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport                       = 'postMessage';
}
add_action( 'customize_register', 'steady_blogging_customize_register' );
