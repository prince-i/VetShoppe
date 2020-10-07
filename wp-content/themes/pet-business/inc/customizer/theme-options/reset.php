<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'pet_business_reset_section', array(
	'title'             => esc_html__('Reset all settings','pet-business'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'pet-business' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'pet_business_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'pet_business_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'pet-business' ),
	'section'           => 'pet_business_reset_section',
	'type'              => 'checkbox',
) );
