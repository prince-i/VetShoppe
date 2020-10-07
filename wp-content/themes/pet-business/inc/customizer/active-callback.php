<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

if ( ! function_exists( 'pet_business_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Pet Business 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function pet_business_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'pet_business_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'pet_business_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Pet Business 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function pet_business_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'pet_business_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'pet_business_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Pet Business 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function pet_business_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'pet_business_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[slider_section_enable]' )->value() );
}



/**
 * Check if about section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if project section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_project_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[project_section_enable]' )->value() );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if cta section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[cta_section_enable]' )->value() );
}


/**
 * Check if team section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_team_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[team_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'pet_business_theme_options[blog_content_type]' )->value();
	return pet_business_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'pet_business_theme_options[blog_content_type]' )->value();
	return pet_business_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if contact section is enabled.
 *
 * @since Pet Business 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function pet_business_is_contact_section_enable( $control ) {
	return ( $control->manager->get_setting( 'pet_business_theme_options[contact_section_enable]' )->value() );
}

