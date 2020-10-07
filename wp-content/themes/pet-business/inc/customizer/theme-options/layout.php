<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'pet_business_layout', array(
	'title'               => esc_html__('Layout','pet-business'),
	'description'         => esc_html__( 'Layout section options.', 'pet-business' ),
	'panel'               => 'pet_business_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[site_layout]', array(
	'sanitize_callback'   => 'pet_business_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Pet_Business_Custom_Radio_Image_Control ( $wp_customize, 'pet_business_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'pet-business' ),
	'section'             => 'pet_business_layout',
	'choices'			  => pet_business_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'pet_business_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Pet_Business_Custom_Radio_Image_Control ( $wp_customize, 'pet_business_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'pet-business' ),
	'section'             => 'pet_business_layout',
	'choices'			  => pet_business_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'pet_business_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Pet_Business_Custom_Radio_Image_Control ( $wp_customize, 'pet_business_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'pet-business' ),
	'section'             => 'pet_business_layout',
	'choices'			  => pet_business_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'pet_business_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Pet_Business_Custom_Radio_Image_Control( $wp_customize, 'pet_business_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'pet-business' ),
	'section'             => 'pet_business_layout',
	'choices'			  => pet_business_sidebar_position(),
) ) );