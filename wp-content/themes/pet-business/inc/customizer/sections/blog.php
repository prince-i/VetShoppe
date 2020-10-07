<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'pet_business_blog_section', array(
	'title'             => esc_html__( 'Blog','pet-business' ),
	'description'       => esc_html__( 'Blog Section options.', 'pet-business' ),
	'panel'             => 'pet_business_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'pet_business_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'pet-business' ),
	'section'           => 'pet_business_blog_section',
	'on_off_label' 		=> pet_business_switch_options(),
) ) );

// blog note control and setting
$wp_customize->add_setting( 'pet_business_theme_options[blog_heading_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Pet_Business_Note_Control( $wp_customize, 'pet_business_theme_options[blog_heading_label]', array(
	'label'             => esc_html__( 'Heading Section', 'pet-business' ),
	'section'           => 'pet_business_blog_section',
	'active_callback'	=> 'pet_business_is_blog_section_enable',
) ) );


// blog title setting and control
$wp_customize->add_setting( 'pet_business_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'pet_business_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'pet-business' ),
	'section'        	=> 'pet_business_blog_section',
	'active_callback' 	=> 'pet_business_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'pet_business_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'pet_business_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'pet_business_blog_title_partial',
    ) );
}

// blog note control and setting
$wp_customize->add_setting( 'pet_business_theme_options[blog_content_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Pet_Business_Note_Control( $wp_customize, 'pet_business_theme_options[blog_content_label]', array(
	'label'             => esc_html__( 'Content Section', 'pet-business' ),
	'section'           => 'pet_business_blog_section',
	'active_callback'	=> 'pet_business_is_blog_section_enable',
) ) );

// Blog content type control and setting
$wp_customize->add_setting( 'pet_business_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'pet_business_sanitize_select',
) );

$wp_customize->add_control( 'pet_business_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'pet-business' ),
	'section'           => 'pet_business_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'pet_business_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'pet-business' ),
		'recent' 	=> esc_html__( 'Recent', 'pet-business' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'pet_business_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'pet_business_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Pet_Business_Dropdown_Taxonomies_Control( $wp_customize,'pet_business_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'pet-business' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'pet-business' ),
	'section'           => 'pet_business_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'pet_business_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'pet_business_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Pet_Business_Dropdown_Category_Control( $wp_customize,'pet_business_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'pet-business' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Ctrl key select multilple categories.', 'pet-business' ),
	'section'           => 'pet_business_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'pet_business_is_blog_section_content_recent_enable'
) ) );
