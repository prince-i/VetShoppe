<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add About section
$wp_customize->add_section( 'pet_business_about_section', array(
	'title'             => esc_html__( 'About Us','pet-business' ),
	'description'       => esc_html__( 'About Section options.', 'pet-business' ),
	'panel'             => 'pet_business_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'pet_business_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'pet-business' ),
	'section'           => 'pet_business_about_section',
	'on_off_label' 		=> pet_business_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'pet_business_theme_options[about_content_page]', array(
	'sanitize_callback' => 'pet_business_sanitize_page',
) );

$wp_customize->add_control( new Pet_Business_Dropdown_Chooser( $wp_customize, 'pet_business_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'pet-business' ),
	'section'           => 'pet_business_about_section',
	'choices'			=> pet_business_page_choices(),
	'active_callback'	=> 'pet_business_is_about_section_enable',
) ) );


// about btn title setting and control
$wp_customize->add_setting( 'pet_business_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' 			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'pet_business_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'pet-business' ),
	'section'        	=> 'pet_business_about_section',
	'active_callback' 	=> 'pet_business_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'pet_business_theme_options[about_btn_title]', array(
		'selector'            => '#about-us a.btn',
		'settings'            => 'pet_business_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'pet_business_about_btn_title_partial',
    ) );
}

