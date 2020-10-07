<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Pet
* @since Pet Business 1.0.0
*/

if ( ! function_exists( 'pet_business_about_btn_title_partial' ) ) :
    // about btn title
    function pet_business_about_btn_title_partial() {
        $options = pet_business_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'pet_business_service_title_partial' ) ) :
    // service title
    function pet_business_service_title_partial() {
        $options = pet_business_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'pet_business_team_title_partial' ) ) :
    // team title
    function pet_business_team_title_partial() {
        $options = pet_business_get_theme_options();
        return esc_html( $options['team_title'] );
    }
endif;

if ( ! function_exists( 'pet_business_testimonial_title_partial' ) ) :
    // testimonial title
    function pet_business_testimonial_title_partial() {
        $options = pet_business_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'pet_business_blog_title_partial' ) ) :
    // blog title
    function pet_business_blog_title_partial() {
        $options = pet_business_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'pet_business_copyright_text_partial' ) ) :
    // copyright text
    function pet_business_copyright_text_partial() {
        $options = pet_business_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

