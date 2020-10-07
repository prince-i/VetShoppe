<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'pet_business_single_post_section', array(
	'title'             => esc_html__( 'Single Post','pet-business' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'pet-business' ),
	'panel'             => 'pet_business_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'pet-business' ),
	'section'           => 'pet_business_single_post_section',
	'on_off_label' 		=> pet_business_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'pet-business' ),
	'section'           => 'pet_business_single_post_section',
	'on_off_label' 		=> pet_business_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'pet-business' ),
	'section'           => 'pet_business_single_post_section',
	'on_off_label' 		=> pet_business_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'pet-business' ),
	'section'           => 'pet_business_single_post_section',
	'on_off_label' 		=> pet_business_hide_options(),
) ) );
