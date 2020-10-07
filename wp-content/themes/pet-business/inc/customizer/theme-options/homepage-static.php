<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Pet
* @since Pet Business 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'pet_business_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'pet_business_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'pet-business' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'pet-business' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );