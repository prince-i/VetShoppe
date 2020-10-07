<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Pet
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';


/**
 * Register widgets
 */
function pet_business_register_widgets() {

	register_widget( 'Pet_Business_Latest_Post' );

	register_widget( 'Pet_Business_Social_Link' );

}
add_action( 'widgets_init', 'pet_business_register_widgets' );