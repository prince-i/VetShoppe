<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'pet_business_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','pet-business' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'pet-business' ),
	'panel'             => 'pet_business_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'pet_business_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'pet-business' ),
	'section'           => 'pet_business_testimonial_section',
	'on_off_label' 		=> pet_business_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'pet_business_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'pet_business_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'pet-business' ),
	'section'        	=> 'pet_business_testimonial_section',
	'active_callback' 	=> 'pet_business_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'pet_business_theme_options[testimonial_title]', array(
		'selector'            => '#client-testimonial .section-title',
		'settings'            => 'pet_business_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'pet_business_testimonial_title_partial',
    ) );
}

// slider image
$wp_customize->add_setting( 'pet_business_theme_options[testimonial_bg]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pet_business_theme_options[testimonial_bg]', array(
	'label'             => esc_html__( 'Background Image', 'pet-business' ),
	'section'           => 'pet_business_testimonial_section',
	'active_callback'   => 'pet_business_is_testimonial_section_enable',
) ) );


for ( $i = 1; $i <= 3; $i++ ) :

	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'pet_business_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'pet_business_sanitize_page',
	) );

	$wp_customize->add_control( new Pet_Business_Dropdown_Chooser( $wp_customize, 'pet_business_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'pet-business' ), $i ),
		'section'           => 'pet_business_testimonial_section',
		'choices'			=> pet_business_page_choices(),
		'active_callback'	=> 'pet_business_is_testimonial_section_enable',
	) ) );

	// testimonial title setting and control
	$wp_customize->add_setting( 'pet_business_theme_options[testimonial_custom_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pet_business_theme_options[testimonial_custom_position_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Position %d', 'pet-business' ), $i ),
		'section'        	=> 'pet_business_testimonial_section',
		'active_callback' 	=> 'pet_business_is_testimonial_section_enable',
		'type'				=> 'text',
	) );

	// Separator setting
	$wp_customize->add_setting( 'pet_business_theme_options[testimonial_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Pet_Business_Note_Control( $wp_customize, 'pet_business_theme_options[testimonial_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'pet-business' ),
		'section'           => 'pet_business_testimonial_section',
		'active_callback'	=> 'pet_business_is_testimonial_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;
