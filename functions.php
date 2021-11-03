<?php
/**
 * gKarr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gKarr
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'gkarr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gkarr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gKarr, use a find and replace
		 * to change 'gkarr' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gkarr', get_template_directory() . '/languages' );

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

		// Register menus
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'gkarr' ),
				'social-menu' => esc_html__( 'SocialHeader', 'gkarr' ),
				'donate-button' => esc_html__( 'DonateButton', 'gkarr' )
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

		/* Contact form processing */
		add_action( 'admin_post_nopriv_gkarr_contact', 'gkarr_contact');
		add_action( 'admin_post_gkarr_contact', 'gkarr_contact');
function gkarr_contact() {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$zip = $_POST['zip'];

if ( $name == "" || $email == "" || $zip == "" ) {
	wp_redirect("https://karrforcongress.com?submit=no");
}

else {
	
	$name = sanitize_text_field($name);
	$email = sanitize_email($email);
	$phone = sanitize_text_field($phone);
	$zip = sanitize_text_field($zip);

if ( $email == "" ) {
	
	wp_redirect("https://karrforcongress.com?submit=no");
}
	
else {
    global $wpdb;
             $wpdb->insert('karr_contact', array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
			'zip'  => $zip
            
        ));
		wp_redirect("https://karrforcongress.com?submit=yes");
}
}
}

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'gkarr_custom_background_args',
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
add_action( 'after_setup_theme', 'gkarr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gkarr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gkarr_content_width', 640 );
}
add_action( 'after_setup_theme', 'gkarr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gkarr_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gkarr' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gkarr' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gkarr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gkarr_scripts() {
	wp_enqueue_style( 'gkarr-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gkarr-style', 'rtl', 'replace' );

	wp_enqueue_script( 'gkarr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular()) {
		wp_enqueue_script( 'gkarr-single', get_template_directory_uri() . '/js/single.js');
	}
}
add_action( 'wp_enqueue_scripts', 'gkarr_scripts' );

function gkarr_scripts_additional() {
	wp_enqueue_script( 'gkarr-popup', get_template_directory_uri() . '/js/popup.js');
}

add_action( 'wp_enqueue_scripts' , 'gkarr_scripts_additional');

/**
 * Add custom post type for top of home page
 */

 function gkarr_custom_post() {
	 register_post_type( "gkarr_top_post", array(
		'label' => 'TopPost',
		'labels' => array( 
			'add'
		),
		'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
		'menu_position' => 4,
		'supports' => array( 'title', 'editor', 'thumbnail')
	 ));
 }

 add_action( 'init', 'gkarr_custom_post' );

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




