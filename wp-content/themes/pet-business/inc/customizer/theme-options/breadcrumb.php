<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

$wp_customize->add_section( 'pet_business_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','pet-business' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'pet-business' ),
	'panel'             => 'pet_business_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'pet-business' ),
	'section'          	=> 'pet_business_breadcrumb',
	'on_off_label' 		=> pet_business_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'pet_business_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'pet-business' ),
	'active_callback' 	=> 'pet_business_is_breadcrumb_enable',
	'section'          	=> 'pet_business_breadcrumb',
) );
