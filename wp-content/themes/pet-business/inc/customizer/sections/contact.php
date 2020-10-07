<?php
/**
 * Contact Section options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Add Contact section
$wp_customize->add_section( 'pet_business_contact_section', array(
	'title'             => esc_html__( 'Contact','pet-business' ),
	'description'       => esc_html__( 'Contact Section options.', 'pet-business' ),
	'panel'             => 'pet_business_front_page_panel',
) );

// Contact content enable control and setting
$wp_customize->add_setting( 'pet_business_theme_options[contact_section_enable]', array(
	'default'			=> 	$options['contact_section_enable'],
	'sanitize_callback' => 'pet_business_sanitize_switch_control',
) );

$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[contact_section_enable]', array(
	'label'             => esc_html__( 'Contact Section Enable', 'pet-business' ),
	'section'           => 'pet_business_contact_section',
	'on_off_label' 		=> pet_business_switch_options(),
) ) );

if ( class_exists( 'WPCF7' ) ) {
	$description = sprintf( __( 'You can manage the Contact Form 7 shortcodes from %1$s here %2$s.', 'pet-business' ), '<a href="' .  esc_url( admin_url('admin.php?page=wpcf7' ) ) . '" target="_blank">', '</a>' );
} else {
	$description = sprintf( __( 'We recommend you to install Contact Form 7 plugin from %1$s here %2$s</a> for shortcodes.', 'pet-business' ), '<a href="' .  esc_url( admin_url('themes.php?page=tgmpa-install-plugins' ) ) . '" target="_blank">', '</a>' );
}

// contact image setting and control.
$wp_customize->add_setting( 'pet_business_theme_options[contact_shortcode]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'pet_business_theme_options[contact_shortcode]',
		array(
		'label'       		=> esc_html__( 'Contact shortcode', 'pet-business' ),
		'description'		=> $description,
		'section'     		=> 'pet_business_contact_section',
		'active_callback'	=> 'pet_business_is_contact_section_enable',
) );

// contact pages drop down chooser control and setting
$wp_customize->add_setting( 'pet_business_theme_options[contact_content_page]', array(
	'sanitize_callback' => 'pet_business_sanitize_page',
) );

$wp_customize->add_control( new Pet_Business_Dropdown_Chooser( $wp_customize, 'pet_business_theme_options[contact_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'pet-business' ),
	'section'           => 'pet_business_contact_section',
	'choices'			=> pet_business_page_choices(),
	'active_callback'	=> 'pet_business_is_contact_section_enable',
) ) );



// contact image control and setting
$wp_customize->add_setting( 'pet_business_theme_options[contact_image]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pet_business_theme_options[contact_image]', array(
	'label'             => esc_html__( 'Image', 'pet-business' ),
	'section'           => 'pet_business_contact_section',
	'active_callback'   => 'pet_business_is_contact_section_enable',
) ) );

for ( $i=1; $i < 3; $i++ ) { 
	// contact custom date
	$wp_customize->add_setting( 'pet_business_theme_options[contact_text_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pet_business_theme_options[contact_text_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Address title %d', 'pet-business' ), $i ),
		'section'           => 'pet_business_contact_section',
		'active_callback'	=> 'pet_business_is_contact_section_enable',
	) );

	// contact custom button
	$wp_customize->add_setting( 'pet_business_theme_options[contact_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pet_business_theme_options[contact_value_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Value %d', 'pet-business' ), $i ),
		'section'           => 'pet_business_contact_section',
		'active_callback'	=> 'pet_business_is_contact_section_enable',
	) );

	// Separator setting
	$wp_customize->add_setting( 'pet_business_theme_options[contact_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Pet_Business_Note_Control( $wp_customize, 'pet_business_theme_options[contact_separator_' . $i . ']', array(
		'label'             => __( '<hr style="width: 100%; border: 1px #bcb1b1 solid;"/>', 'pet-business' ),
		'section'           => 'pet_business_contact_section',
		'active_callback'	=> 'pet_business_is_contact_section_enable',
		'type'				=> 'custom-html',
	) ) );
}