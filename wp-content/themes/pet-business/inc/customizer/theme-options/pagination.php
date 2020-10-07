<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'pet_business_pagination', array(
	'title'               => esc_html__('Pagination','pet-business'),
	'description'         => esc_html__( 'Pagination section options.', 'pet-business' ),
	'panel'               => 'pet_business_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'pet-business' ),
	'section'             => 'pet_business_pagination',
	'on_off_label' 		=> pet_business_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'pet_business_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'pet_business_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'pet-business' ),
	'section'             => 'pet_business_pagination',
	'type'                => 'select',
	'choices'			  => pet_business_pagination_options(),
	'active_callback'	  => 'pet_business_is_pagination_enable',
) );
