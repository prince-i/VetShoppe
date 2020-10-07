<?php
/**
 * Theme Palace functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

if ( ! function_exists( 'pet_business_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pet_business_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Theme Palace, use a find and replace
		 * to change 'pet-business' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pet-business' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widgets.php' );
		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 490, 375, true );

		// Set the default content width.
		$GLOBALS['content_width'] = 525;
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'pet-business' ),
			'social' 	=> esc_html__( 'Social', 'pet-business' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pet_business_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// This setup supports logo, site-title & site-description
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style' . pet_business_min() . '.css', pet_business_fonts_url() ) );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'pet-business' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'pet-business' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'pet-business' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'pet-business' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'pet-business' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'pet-business' ),
		       	'shortName' => esc_html__( 'S', 'pet-business' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'pet-business' ),
		       	'shortName' => esc_html__( 'M', 'pet-business' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'pet-business' ),
		       	'shortName' => esc_html__( 'L', 'pet-business' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'pet-business' ),
		       	'shortName' => esc_html__( 'XL', 'pet-business' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'pet_business_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pet_business_content_width() {

	$content_width = $GLOBALS['content_width'];


	$sidebar_position = pet_business_layout();
	switch ( $sidebar_position ) {

	  case 'no-sidebar':
	    $content_width = 1170;
	    break;

	  case 'left-sidebar':
	  case 'right-sidebar':
	    $content_width = 819;
	    break;

	  default:
	    break;
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1170;
	}

	/**
	 * Filter Pet Business content width of the theme.
	 *
	 * @since Pet Business 1.0.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'pet_business_content_width', $content_width );
}
add_action( 'template_redirect', 'pet_business_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pet_business_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pet-business' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pet-business' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebars( 4, array(
		'name'          => esc_html__( 'Optional Sidebar %d', 'pet-business' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'pet-business' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pet_business_widgets_init' );


if ( ! function_exists( 'pet_business_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function pet_business_fonts_url() {
	$options = pet_business_get_theme_options();

	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'pet-business' ) ) {
		$fonts[] = 'Lato:300,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'pet-business' ) ) {
		$fonts[] = 'Raleway:300,400,500,600,700';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since Pet Business 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function pet_business_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'pet-business-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'pet_business_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function pet_business_scripts() {
	$options = pet_business_get_theme_options();
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'pet-business-fonts', pet_business_fonts_url(), array(), null );

	// FontAwesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome' . pet_business_min() . '.css' );

	// slick
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick' . pet_business_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . pet_business_min() . '.css' );

	wp_enqueue_style( 'sidr-dark', get_template_directory_uri() . '/assets/css/sidr.dark' . pet_business_min() . '.css' );

	// blocks
	wp_enqueue_style( 'pet-business-blocks', get_template_directory_uri() . '/assets/css/blocks' . pet_business_min() . '.css' );

	wp_enqueue_style( 'pet-business-style', get_stylesheet_uri() );

	// Load the colorscheme.
	wp_enqueue_style( 'pet-business-colors', get_template_directory_uri() . '/assets/css/' . esc_attr( $options['colorscheme'] ) . pet_business_min() .'.css', array( 'pet-business-style' ), '1.0' );

	// Load the html5 shiv.
	wp_enqueue_script( 'pet-business-html5', get_template_directory_uri() . '/assets/js/html5' . pet_business_min() . '.js', array(), '3.7.3' );
	wp_script_add_data( 'pet-business-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'pet-business-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . pet_business_min() . '.js', array(), '20160412', true );

	wp_enqueue_script( 'pet-business-navigation', get_template_directory_uri() . '/assets/js/navigation' . pet_business_min() . '.js', array(), '20151215', true );
	
	$pet_business_l10n = array(
		'quote'          => pet_business_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'pet-business' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'pet-business' ),
		'icon'           => pet_business_get_svg( array( 'icon' => 'down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'pet-business-navigation', 'pet_business_l10n', $pet_business_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . pet_business_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/assets/js/jquery.sidr' . pet_business_min() . '.js', array( 'jquery' ), '', true );

	// custom script
	wp_enqueue_script( 'pet-business-custom', get_template_directory_uri() . '/assets/js/custom' . pet_business_min() . '.js', array( 'jquery' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'pet_business_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Pet Business 1.0.0
 */
function pet_business_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'pet-business-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . pet_business_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'pet-business-fonts', pet_business_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'pet_business_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load core file
 */
require get_template_directory() . '/inc/core.php';

