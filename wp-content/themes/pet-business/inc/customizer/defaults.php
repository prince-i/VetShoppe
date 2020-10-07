<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 * @return array An array of default values
 */

function pet_business_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$pet_business_default_options = array(
		// Color Options
		'header_title_color'			=> '#2a2e43',
		'header_tagline_color'			=> '#82868b',
		'header_txt_logo_extra'			=> 'show-all',
		'colorscheme'					=> 'default',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		'menu_style'					=> 'classic-menu',
		'nav_search_enable'				=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'pet-business' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'pet-business' ), '[the-year]', '[site-link]' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'pet-business' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	=> true,
		'footer_social_visible'        	=> false,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'pet-business' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */
		// slider
		'slider_section_enable'			=> false,
		
		// team
		'team_section_enable'			=> false,
		'team_title'					=> esc_html__( 'Our Team', 'pet-business' ),

		// About
		'about_section_enable'			=> false,
		'about_btn_title'				=> esc_html__( 'Learn more', 'pet-business' ),

		// service
		'service_section_enable'		=> false,
		'service_title'					=> esc_html__( 'Pet Business Services', 'pet-business' ),

		// project
		'project_section_enable'		=> false,
		'project_title'					=> esc_html__( 'Latest Projects', 'pet-business' ),


		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_title'				=> esc_html__( 'Our Pet Business Lovers', 'pet-business' ),
	
		// call to action
		'cta_section_enable'			=> false,
		'cta_btn_title'					=> esc_html__( 'Adopt Tommy', 'pet-business' ),

		// contact
		'contact_section_enable'		=> false,

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'category',
		'blog_title'					=> esc_html__( 'From our Blog', 'pet-business' ),


	);

	$output = apply_filters( 'pet_business_default_theme_options', $pet_business_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}