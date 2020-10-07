<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

$options = pet_business_get_theme_options();


if ( ! function_exists( 'pet_business_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Pet Business 1.0.0
	 */
	function pet_business_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'pet_business_doctype', 'pet_business_doctype', 10 );


if ( ! function_exists( 'pet_business_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'pet_business_before_wp_head', 'pet_business_head', 10 );

if ( ! function_exists( 'pet_business_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pet-business' ); ?></a>

		<?php
	}
endif;
add_action( 'pet_business_page_start_action', 'pet_business_page_start', 10 );

if ( ! function_exists( 'pet_business_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'pet_business_page_end_action', 'pet_business_page_end', 10 );

if ( ! function_exists( 'pet_business_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_header_start() { ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'pet_business_header_action', 'pet_business_header_start', 10 );

if ( ! function_exists( 'pet_business_sidr_menu' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_sidr_menu() { ?>
		<a id="sidr-left-top-button" class="menu-button right menu-toggle" href="#sidr-left-top">
            <span class="menu-label"><?php esc_html_e( 'Menu', 'pet-business' ); ?></span>
            <?php echo pet_business_get_svg( array( 'icon' => 'menu' ) ); ?>
            <?php echo pet_business_get_svg( array( 'icon' => 'close' ) ); ?>
        </a><!-- .sidr-left-top-button -->
		<?php
	}
endif;
add_action( 'pet_business_header_action', 'pet_business_sidr_menu', 15 );

if ( ! function_exists( 'pet_business_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_site_branding() {
		$options  = pet_business_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-identity">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( pet_business_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'pet_business_header_action', 'pet_business_site_branding', 20 );

if ( ! function_exists( 'pet_business_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_site_navigation() {
		$options = pet_business_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php  
				$search = '';
				if ( $options['nav_search_enable'] ) :
					$search = '<li class="search-menu"><a href="#">';
					$search .= pet_business_get_svg( array( 'icon' => 'search' ) );
					$search .= pet_business_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search">';
					$search .= get_search_form( $echo = false );
	                $search .= '</div><!-- #search --></li>';
                endif;

        		wp_nav_menu( array(
        			'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'pet_business_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
        		) );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'pet_business_header_action', 'pet_business_site_navigation', 30 );


if ( ! function_exists( 'pet_business_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'pet_business_header_action', 'pet_business_header_end', 50 );

if ( ! function_exists( 'pet_business_mobile_menu' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_mobile_menu() {
		?>
		<div id="sidr-left-top" class="mobile-menu sidr left">
		    <?php  
				$options = pet_business_get_theme_options();
				$search = '';
				if ( $options['nav_search_enable'] ) :
					$search = '<li class="search-menu"><a href="#">';
					$search .= pet_business_get_svg( array( 'icon' => 'search' ) );
					$search .= pet_business_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search">';
					$search .= get_search_form( $echo = false );
	                $search .= '</div><!-- #search --></li>';
                endif;

        	
        		wp_nav_menu( array(
        			'theme_location' => 'primary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'pet_business_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
        		) );
        	?>
		</div><!-- #sidr-left-top -->
		<?php
	}
endif;

add_action( 'pet_business_mobile_menu', 'pet_business_mobile_menu', 10 );

if ( ! function_exists( 'pet_business_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'pet_business_content_start_action', 'pet_business_content_start', 10 );

if ( ! function_exists( 'pet_business_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Pet Business 1.0.0
	 */
	function pet_business_add_breadcrumb() {
		$options = pet_business_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( pet_business_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >
			<div class="wrapper">';
				/**
				 * pet_business_simple_breadcrumb hook
				 *
				 * @hooked pet_business_simple_breadcrumb -  10
				 *
				 */
				do_action( 'pet_business_simple_breadcrumb' );
		echo '</div>
			</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

if ( ! function_exists( 'pet_business_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_header_image() {
		$options = pet_business_get_theme_options();
		if ( pet_business_is_frontpage() )
			return;

		$header_image = get_header_image();
		$header_image = $header_image ? $header_image : get_template_directory_uri() . '/assets/uploads/header-image.jpg';
		if ( is_singular() ) :
			$header_image = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
		endif;

		$header = get_custom_header();
		$header_img_url = $header->url;
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_img_url ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
            	<div id="page-header-wrapper">
	                <header class="page-header">
	                    <h2 class="page-title"><?php pet_business_custom_header_banner_title(); ?></h2>
	                </header>
                	<?php pet_business_add_breadcrumb(); ?>
            	</div>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

		<?php
	}
endif;
add_action( 'pet_business_header_image_action', 'pet_business_header_image', 10 );

if ( ! function_exists( 'pet_business_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'pet_business_content_end_action', 'pet_business_content_end', 10 );

if ( ! function_exists( 'pet_business_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'pet_business_footer', 'pet_business_footer_start', 10 );

if ( ! function_exists( 'pet_business_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_footer_site_info() {
		$options = pet_business_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 

		$class = ( has_nav_menu( 'social' ) && $options['footer_social_visible'] ) ? 2 : 1 ;
		?>

		<div class="site-info col-<?php echo esc_attr( $class ); ?>">
                <div class="wrapper">
                    <span class="copyright">
                    	<?php 
                    	echo pet_business_santize_allow_tag( $copyright_text ); 
                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
						    the_privacy_policy_link( ' | ' );
						}
                    	?>
                    	</span>
                    <?php if ( has_nav_menu( 'social' ) && $options['footer_social_visible'] ) : ?>
	                        <?php  
			            	
			            		wp_nav_menu( array(
			            			'theme_location' => 'social',
			            			'container' => 'div',
			            			'container_class' => 'social-icons',
			            			'menu_class' => 'menu',
			            			'echo' => true,
			            			'fallback_cb' => false,
			            			'depth' => 1,
			            			'link_before' => '<span class="screen-reader-text">',
									'link_after' => '</span>',
			            		) );
			            	?>
	                <?php endif; ?>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->


		<?php
	}
endif;
add_action( 'pet_business_footer', 'pet_business_footer_site_info', 40 );

if ( ! function_exists( 'pet_business_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Pet Business 1.0.0
	 *
	 */
	function pet_business_footer_scroll_to_top() {
		$options  = pet_business_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo pet_business_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'pet_business_footer', 'pet_business_footer_scroll_to_top', 40 );


