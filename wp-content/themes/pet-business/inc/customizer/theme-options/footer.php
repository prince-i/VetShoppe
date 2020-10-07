<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'pet_business_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'pet-business' ),
		'priority'   			=> 900,
		'panel'      			=> 'pet_business_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'pet_business_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'pet_business_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'pet_business_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'pet-business' ),
		'section'    			=> 'pet_business_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'pet_business_theme_options[copyright_text]', array(
		'selector'            => '.site-info span.copyright',
		'settings'            => 'pet_business_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'pet_business_copyright_text_partial',
    ) );
}

// footer Social menu visible
$wp_customize->add_setting( 'pet_business_theme_options[footer_social_visible]',
	array(
		'default'       	=> $options['footer_social_visible'],
		'sanitize_callback' => 'pet_business_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[footer_social_visible]',
    array(
		'label'      		=> esc_html__( 'Display Footer Social', 'pet-business' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show footer social menu.', 'pet-business' ), esc_html__( 'Click Here', 'pet-business' ), esc_html__( 'to create menu', 'pet-business' ) ),
		'section'    		=> 'pet_business_section_footer',
		'on_off_label' 		=> pet_business_switch_options(),
    )
) );

// scroll top visible
$wp_customize->add_setting( 'pet_business_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'pet_business_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Pet_Business_Switch_Control( $wp_customize, 'pet_business_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'pet-business' ),
		'section'    		=> 'pet_business_section_footer',
		'on_off_label' 		=> pet_business_switch_options(),
    )
) );