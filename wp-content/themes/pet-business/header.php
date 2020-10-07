<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Pet
	 * @since Pet Business 1.0.0
	 */

	/**
	 * pet_business_doctype hook
	 *
	 * @hooked pet_business_doctype -  10
	 *
	 */
	do_action( 'pet_business_doctype' );

?>
<head>
<?php
	/**
	 * pet_business_before_wp_head hook
	 *
	 * @hooked pet_business_head -  10
	 *
	 */
	do_action( 'pet_business_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * pet_business_page_start_action hook
	 *
	 * @hooked pet_business_page_start -  10
	 *
	 */
	do_action( 'pet_business_page_start_action' ); 

	/**
	 * pet_business_loader_action hook
	 *
	 * @hooked pet_business_loader -  10
	 *
	 */
	do_action( 'pet_business_before_header' );

	/**
	 * pet_business_header_action hook
	 *
	 * @hooked pet_business_header_start -  10
	 * @hooked pet_business_sidr_menu -  15
	 * @hooked pet_business_site_branding -  20
	 * @hooked pet_business_site_navigation -  30
	 * @hooked pet_business_header_end -  50
	 *
	 */
	do_action( 'pet_business_header_action' );

	/**
	 * pet_business_mobile_menu hook
	 *
	 * @hooked pet_business_mobile_menu -  10
	 *
	 */
	do_action( 'pet_business_mobile_menu' );

	/**
	 * pet_business_content_start_action hook
	 *
	 * @hooked pet_business_content_start -  10
	 *
	 */
	do_action( 'pet_business_content_start_action' );

	/**
	 * pet_business_header_image_action hook
	 *
	 * @hooked pet_business_header_image -  10
	 *
	 */
	do_action( 'pet_business_header_image_action' );

    if ( pet_business_is_frontpage() ) {
    	$i = 1;
    	$sections = pet_business_sortable_sections();
		foreach ( $sections as $section => $value ) {
			add_action( 'pet_business_primary_content', 'pet_business_add_'. $section .'_section', $i . 0 );
			$i++;
		}
		do_action( 'pet_business_primary_content' );
	}