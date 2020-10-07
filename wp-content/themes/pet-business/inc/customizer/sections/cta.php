<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'pet_business_cta_section', array(
	'title'             => esc_html__( 'Call to Action','pet-business' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'pet-business' ),
	'panel'             => 'pet_business_front_page_panel',
) );

	// Call to Action content enable control and setting
	$wp_customize->add_setting( 'pet_business_theme_options[cta_section_enable]', array(
		'default'			=> 	$options['cta_section_enable' ],
		'sanitize_callback' => 'pet_business_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[cta_section_enable]', array(
		'label'             => esc_html__( 'Call to Action Section Enable', 'pet-business' ),
		'section'           => 'pet_business_cta_section',
		'on_off_label' 		=> pet_business_switch_options(),
	) ) );

	// cta pages drop down chooser control and setting
	$wp_customize->add_setting( 'pet_business_theme_options[cta_content_page]', array(
		'sanitize_callback' => 'pet_business_sanitize_page',
	) );

	$wp_customize->add_control( new Pet_Business_Dropdown_Chooser( $wp_customize, 'pet_business_theme_options[cta_content_page]', array(
		'label'             => esc_html__( 'Select Page', 'pet-business' ),
		'section'           => 'pet_business_cta_section',
		'choices'			=> pet_business_page_choices(),
		'active_callback'	=> 'pet_business_is_cta_section_enable',
	) ) );

	// cta btn title setting and control
	$wp_customize->add_setting( 'pet_business_theme_options[cta_btn_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['cta_btn_title'],
	) );

	$wp_customize->add_control( 'pet_business_theme_options[cta_btn_title]', array(
		'label'           	=> esc_html__( 'Button Label', 'pet-business' ),
		'section'        	=> 'pet_business_cta_section',
		'active_callback' 	=> 'pet_business_is_cta_section_enable',
		'type'				=> 'text',
	) );