<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function pet_business_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'pet-business' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'pet_business_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function pet_business_site_layout() {
        $pet_business_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/frame.png',
        );

        $output = apply_filters( 'pet_business_site_layout', $pet_business_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'pet_business_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function pet_business_selected_sidebar() {
        $pet_business_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'pet-business' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'pet-business' ),
        );

        $output = apply_filters( 'pet_business_selected_sidebar', $pet_business_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'pet_business_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function pet_business_sidebar_position() {
        $pet_business_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'pet_business_sidebar_position', $pet_business_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'pet_business_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function pet_business_pagination_options() {
        $pet_business_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'pet-business' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'pet-business' ),
        );

        $output = apply_filters( 'pet_business_pagination_options', $pet_business_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'pet_business_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function pet_business_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'pet-business' ),
            'off'       => esc_html__( 'Disable', 'pet-business' )
        );
        return apply_filters( 'pet_business_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'pet_business_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function pet_business_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'pet-business' ),
            'off'       => esc_html__( 'No', 'pet-business' )
        );
        return apply_filters( 'pet_business_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'pet_business_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function pet_business_sortable_sections() {
        $sections = array(
            'slider'   => esc_html__( 'Slider', 'pet-business' ),
            'service'    => esc_html__( 'Service', 'pet-business' ),
            'about'     => esc_html__( 'About', 'pet-business' ),
            'project' => esc_html__( 'Project', 'pet-business' ),
            'testimonial' => esc_html__( 'Testimonial', 'pet-business' ),
            'cta'       => esc_html__( 'Call to Action', 'pet-business' ),
            'team'       => esc_html__( 'Team', 'pet-business' ),
            'blog'      => esc_html__( 'Blog', 'pet-business' ),
            'contact'      => esc_html__( 'Contact', 'pet-business' ),
        );
        return apply_filters( 'pet_business_sortable_sections', $sections );
    }
endif;
