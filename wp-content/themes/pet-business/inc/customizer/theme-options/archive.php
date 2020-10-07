<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'pet_business_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','pet-business' ),
	'description'       => esc_html__( 'Archive section options.', 'pet-business' ),
	'panel'             => 'pet_business_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'pet_business_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'pet-business' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'pet-business' ),
	'section'           => 'pet_business_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'pet_business_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'pet-business' ),
	'section'           => 'pet_business_archive_section',
	'on_off_label' 		=> pet_business_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'pet-business' ),
	'section'           => 'pet_business_archive_section',
	'on_off_label' 		=> pet_business_hide_options(),
) ) );

