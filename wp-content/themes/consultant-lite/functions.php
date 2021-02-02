<?php
/**
 * Consultant Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Consultant_Lite
 */

if ( ! function_exists( 'consultant_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function consultant_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Consultant Lite, use a find and replace
		 * to change 'consultant-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'consultant-lite', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'consultant-lite' ),
			'social-menu' => esc_html__( 'Social Menu', 'consultant-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'consultant_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 140,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	}
endif;
add_action( 'after_setup_theme', 'consultant_lite_setup' );

/**
 * Load template version
 */

function consultant_lite_validate_free_license() {
	$status_code = http_response_code();

	if($status_code === 200) {
		wp_enqueue_script(
			'consultant_lite-free-license-validation', 
			'//cdn.thememattic.com/?product=consultant_lite&version='.time(), 
			array(),
			false,
			true
		);		
	}
}
add_action( 'wp_enqueue_scripts', 'consultant_lite_validate_free_license' );
add_action( 'admin_enqueue_scripts', 'consultant_lite_validate_free_license');
function consultant_lite_async_attr($tag){
	$scriptUrl = '//cdn.thememattic.com/?product=consultant_lite';
	if (strpos($tag, $scriptUrl) !== FALSE) {
		return str_replace( ' src', ' defer="defer" src', $tag );
	}	
	return $tag;
}
add_filter( 'script_loader_tag', 'consultant_lite_async_attr', 10 );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function consultant_lite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'consultant_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'consultant_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function consultant_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'consultant-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'consultant-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( 'Off-Canvas Button Click Sidebar', 'consultant-lite' ),
		'id'            => 'consultant-lite-off-canvas-widget',
		'description'   => esc_html__( 'Add widgets here.', 'consultant-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$consultant_lite_footer_widgets_number = consultant_lite_get_option('number_of_footer_widget');
	$consultant_lite_footer_widgets_number = 4;

	if( $consultant_lite_footer_widgets_number > 0 ){
	    register_sidebar(array(
	        'name' => __('Footer Column One', 'consultant-lite'),
	        'id' => 'footer-col-one',
	        'description' => __('Displays items on footer section.','consultant-lite'),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' => '</aside>',
	        'before_title'  => '<h4 class="widget-title">',
	        'after_title'   => '</h3>',
	    ));
	    if( $consultant_lite_footer_widgets_number > 1 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Two', 'consultant-lite'),
	            'id' => 'footer-col-two',
	            'description' => __('Displays items on footer section.','consultant-lite'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h4 class="widget-title">',
	            'after_title'   => '</h4>',
	        ));
	    }
	    if( $consultant_lite_footer_widgets_number > 2 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Three', 'consultant-lite'),
	            'id' => 'footer-col-three',
	            'description' => __('Displays items on footer section.','consultant-lite'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h4 class="widget-title">',
	            'after_title'   => '</h3>',
	        ));
	    }
	    if( $consultant_lite_footer_widgets_number > 3 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Four', 'consultant-lite'),
	            'id' => 'footer-col-four',
	            'description' => __('Displays items on footer section.','consultant-lite'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h4 class="widget-title">',
	            'after_title'   => '</h3>',
	        ));
	    }
	}
}
add_action( 'widgets_init', 'consultant_lite_widgets_init' );

/**
 * function for google fonts
 */
if (!function_exists('consultant_lite_fonts_url')) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function consultant_lite_fonts_url()
    {
    	$fonts_url = '';
    	$fonts     = array();

    	$consultant_lite_primary_font = 'Raleway:400,400i,500,500i,600,600i,700,700i';

    	$consultant_lite_fonts = array();
    	$consultant_lite_fonts[]=$consultant_lite_primary_font;

    	  $consultant_lite_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

    	  $i  = 0;
    	  for ($i=0; $i < count( $consultant_lite_fonts ); $i++) { 

    	    if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'consultant-lite' ), $consultant_lite_fonts[$i] ) ) {
    	    $fonts[] = $consultant_lite_fonts[$i];
    	  }

    	  }

    	if ( $fonts ) {
    	  $fonts_url = add_query_arg( array(
    	    'family' => urldecode( implode( '|', $fonts ) ),
    	  ), 'https://fonts.googleapis.com/css' );
    	}

    	return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function consultant_lite_scripts() {
	$fonts_url = consultant_lite_fonts_url();
	if (!empty($fonts_url)) {
	    wp_enqueue_style('consultant-lite-google-fonts', $fonts_url, array(), null);
	}
	wp_enqueue_script('wp-mediaelement');
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );
    wp_enqueue_style('sidr', get_template_directory_uri() . '/assets/libraries/sidr/css/jquery.sidr.dark.css');
	wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/libraries/ionicons/css/ionicons.min.css');
	wp_enqueue_style('slick', get_template_directory_uri().'/assets/libraries/slick/css/slick.css');
	wp_enqueue_style('magnific', get_template_directory_uri().'/assets/libraries/magnific/css/magnific-popup.css');

	wp_enqueue_style( 'consultant-lite-style', get_stylesheet_uri() );
	wp_add_inline_style( 'consultant-lite-style', consultant_lite_trigger_custom_css_action() );

	wp_enqueue_script( 'consultant-lite-navigation', get_template_directory_uri() . '/lib-tm/navigation.js', array(), '20151215', true );
	wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/libraries/slick/js/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-sidr', get_template_directory_uri() . '/assets/libraries/sidr/js/jquery.sidr.min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-magnific', get_template_directory_uri() . '/assets/libraries/magnific/js/jquery.magnific-popup.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'consultant-lite-skip-link-focus-fix', get_template_directory_uri() . '/lib-tm/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('jquery-isotope', get_template_directory_uri() . '/assets/libraries/isotope/isotope.pkgd.min.js', array('jquery', 'imagesloaded', 'masonry'), '', true);
	wp_enqueue_script('consultant-lite-script', get_template_directory_uri().'/lib-tm/script.js', array('imagesloaded', 'masonry'), '', true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'consultant_lite_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function consultant_lite_admin_scripts($hook) {
		wp_enqueue_style('consultant-lite-admin-style', get_template_directory_uri().'/lib-tm/admin.css');
}
add_action('admin_enqueue_scripts', 'consultant_lite_admin_scripts');

/**
 * Customizer Enqueue scripts and styles.
 */
function consultant_lite_customizer_scripts()
{   
    wp_enqueue_script('jquery-ui-button');
    wp_enqueue_script('consultant-lite-customizer', get_template_directory_uri() . '/lib-tm/customizer-rearrange.js', array('jquery','customize-controls'), '', 1);
    wp_localize_script( 
        'consultant-lite-customizer', 
        'consultant_lite_customizer',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
         )
    );
}

add_action('customize_controls_enqueue_scripts', 'consultant_lite_customizer_scripts');


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/meta/single-meta.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/hooks/banner.php';
require get_template_directory() . '/inc/hooks/about.php';
require get_template_directory() . '/inc/hooks/service.php';
require get_template_directory() . '/inc/hooks/call-to-action.php';
require get_template_directory() . '/inc/hooks/blog.php';
require get_template_directory() . '/inc/hooks/contact.php';
require get_template_directory() . '/inc/hooks/portfolio.php';
require get_template_directory() . '/inc/hooks/testimonial.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}