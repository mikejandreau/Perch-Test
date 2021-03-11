<?php
/**
 * Perch Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Perch_Test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'perchtest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function perchtest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Perch Test, use a find and replace
		 * to change 'perchtest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'perchtest', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'perchtest' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'perchtest_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'perchtest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function perchtest_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'perchtest_content_width', 640 );
}
add_action( 'after_setup_theme', 'perchtest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function perchtest_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'perchtest' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'perchtest' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'perchtest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function perchtest_scripts() {

	// STYLES 

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/vendor/font-awesome-5/css/fontawesome-all.min.css', array(), _S_VERSION );

	// bootstrap
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), _S_VERSION );

	// flickity
	wp_enqueue_style( 'perchtest-flickity-styles', get_template_directory_uri() . '/assets/vendor/metafizzy/flickity.min.css', array(), _S_VERSION );

	// custom theme styles
	wp_enqueue_style( 'perchtest-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'perchtest-style', 'rtl', 'replace' );



	// SCRIPTS

	// jquery scrolling
	wp_enqueue_script( 'perchtest-jquery-easing-js', get_template_directory_uri() . '/assets/vendor/jquery-easing/jquery.easing.min.js', array('jquery'), _S_VERSION, true );

	// bootstrap bundle w/jQuery
	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true );

	// flickity
	wp_enqueue_script( 'perchtest-flickity-js', get_template_directory_uri() . '/assets/vendor/metafizzy/flickity.pkgd.min.js', array(), _S_VERSION, true );

	// izotope
	wp_enqueue_script( 'perchtest-izotope-js', get_template_directory_uri() . '/assets/vendor/metafizzy/isotope.pkgd.min.js', array(), _S_VERSION, true );

	// imagesloaded
	wp_enqueue_script( 'perchtest-imagesloaded-js', get_template_directory_uri() . '/assets/vendor/metafizzy/imagesloaded.pkgd.js', array(), _S_VERSION, true );

	// custom theme scripts
	wp_enqueue_script( 'perchtest-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'perchtest_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}












/**
 * CUSTOM FUNCTIONS START BELOW
 * Above is all the default stuff, below are some optional additions to theme functionality
 */



/**
 * Include custom navwalker
 */
require_once get_template_directory() . '/inc/bs4navwalker.php';

/*
 * Load the theme options page.
 */
require get_template_directory() . '/inc/theme-options/theme-options.php';

/*
 * Custom post type for Portfolio Items
 */
require get_template_directory() . '/inc/custom-post-portfolio.php';





/**
 * CUSTOM LOGIN SCREEN
 * overrides default WP logo, background image/color, and form styles
 */
function perchtest_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/login-style.css' );
}
add_action( 'login_enqueue_scripts', 'perchtest_login_stylesheet' );

/**
 * CUSTOM LOGIN SCREEN LOGO LINK
 * Redirect custom login logo link to homepage
 */
function perchtest_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'perchtest_login_logo_url' );

/**
 * CUSTOM LOGIN SCREEN LOGO TITLE
 * Update custom login logo page title
 */
function perchtest_login_logo_url_title( $title ) {
	return esc_attr( get_bloginfo( 'title' ) );
}
add_filter( 'login_headertext', 'perchtest_login_logo_url_title' );
