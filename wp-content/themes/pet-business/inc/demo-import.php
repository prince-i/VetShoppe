<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Pet Business
 * @since Pet Business 1.0.0
 */

function pet_business_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Pet Business Theme.', 'pet-business' ),
    esc_url( 'https://themepalace.com/instructions/themes/pet-business' ), esc_html__( 'Click here for Demo File download', 'pet-business' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'pet_business_intro_text' );