<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

/**
 * pet_business_footer_primary_content hook
 *
 * @hooked pet_business_add_contact_section -  10
 *
 */
do_action( 'pet_business_footer_primary_content' );

/**
 * pet_business_content_end_action hook
 *
 * @hooked pet_business_content_end -  10
 *
 */
do_action( 'pet_business_content_end_action' );

/**
 * pet_business_content_end_action hook
 *
 * @hooked pet_business_footer_start -  10
 * @hooked Pet_Business_Footer_Widgets->add_footer_widgets -  20
 * @hooked pet_business_footer_site_info -  40
 * @hooked pet_business_footer_end -  100
 *
 */
do_action( 'pet_business_footer' );

/**
 * pet_business_page_end_action hook
 *
 * @hooked pet_business_page_end -  10
 *
 */
do_action( 'pet_business_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
