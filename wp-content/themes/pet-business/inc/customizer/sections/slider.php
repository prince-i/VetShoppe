<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'pet_business_slider_section', array(
	'title'             => esc_html__( 'Sliders','pet-business' ),
	'description'       => esc_html__( 'Sliders Section options.', 'pet-business' ),
	'panel'             => 'pet_business_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'pet_business_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'pet-business' ),
	'section'           => 'pet_business_slider_section',
	'on_off_label' 		=> pet_business_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'pet_business_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'pet_business_sanitize_page',
	) );

	$wp_customize->add_control( new Pet_Business_Dropdown_Chooser( $wp_customize, 'pet_business_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'pet-business' ), $i ),
		'section'           => 'pet_business_slider_section',
		'choices'			=> pet_business_page_choices(),
		'active_callback'	=> 'pet_business_is_slider_section_enable',
	) ) );

	// slider custom button 1
	$wp_customize->add_setting( 'pet_business_theme_options[slider_content_custom_btn_1_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pet_business_theme_options[slider_content_custom_btn_1_' . $i . ']', array(
		'label'             => esc_html__( 'Button One', 'pet-business' ),
		'section'           => 'pet_business_slider_section',
		'type'				=> 'url',
		'active_callback'	=> 'pet_business_is_slider_section_enable',
	) );

	// slider custom url 1
	$wp_customize->add_setting( 'pet_business_theme_options[slider_content_custom_url_1_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'pet_business_theme_options[slider_content_custom_url_1_' . $i . ']', array(
		'label'             => esc_html__( 'URL One', 'pet-business' ),
		'section'           => 'pet_business_slider_section',
		'type'				=> 'url',
		'active_callback'	=> 'pet_business_is_slider_section_enable',
	) );

	// Separator setting
	$wp_customize->add_setting( 'pet_business_theme_options[slider_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Pet_Business_Note_Control( $wp_customize, 'pet_business_theme_options[slider_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'pet-business' ),
		'section'           => 'pet_business_slider_section',
		'active_callback'	=> 'pet_business_is_slider_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;