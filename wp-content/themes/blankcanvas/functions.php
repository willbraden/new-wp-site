<?php
/**
 * blankcanvas functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blankcanvas
 */

if ( ! function_exists( 'blankcanvas_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blankcanvas_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blankcanvas, use a find and replace
	 * to change 'blankcanvas' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blankcanvas', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'blankcanvas' ),
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
	add_theme_support( 'custom-background', apply_filters( 'blankcanvas_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'blankcanvas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blankcanvas_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blankcanvas_content_width', 640 );
}
add_action( 'after_setup_theme', 'blankcanvas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blankcanvas_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blankcanvas' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blankcanvas' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'blankcanvas_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blankcanvas_scripts() {
	wp_enqueue_style( 'blankcanvas-style', get_stylesheet_uri() );

	wp_enqueue_script( 'blankcanvas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'blankcanvas-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blankcanvas_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




function enqueue_my_scripts() {
wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery'), '1.9.1', true); // we need the jquery library for bootsrap js to function
wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'), true); // all the bootstrap javascript goodness
}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');
function enqueue_my_styles() {
wp_enqueue_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
wp_enqueue_style( 'my-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles');


add_filter('gform_confirmation_anchor', '__return_false');


// ACF
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Talk Form Settings',
		'menu_title'	=> 'Talk Form',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}

add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
	?>
	<style type="text/css">

		/* ... */

	</style>

	<script type="text/javascript">


jQuery( document ).ready(function() {
		
		jQuery('.wLabel input').each(function() { 
			var valu = jQuery(this).val();
			var valu = '<span style="color:#333;background:#ddd;padding:3px 10px;margin-left:15px;margin-bottom:10px;margin-top:10px;border-radius:3px;font-size:10px;display:inline-block;box-shadow:inset 1px 1px 2px rgba(0,0,0,0.2);">Label: ' + valu + '</span>';
				jQuery(this).parents('.layout').prepend(valu) ;
				// console.log(valu);
			});

		jQuery()

});

	</script>
	<?php
}


// Google Map API for ACF 
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDWeya3PCuN4uz4dCkGfjrH1cVdGApEG18');
}

add_action('acf/init', 'my_acf_init');



add_image_size( 'custom-size', 300, 150, true ); // Hard crop left top




// TinyMCE styles
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Button',
			'selector' => 'a', 
			'classes' => 'button',
			'wrapper' => false,
			
		), 
		array(  
			'title' => 'Button Small',
			'selector' => 'a', 
			'classes' => 'button--small',
			'wrapper' => false,
			
		), 
		array(  
			'title' => 'Button Light Grey',
			'selector' => 'a', 
			'classes' => 'button--lt-grey',
			'wrapper' => false,
			
		), 
		array(  
			'title' => 'Button Red',
			'selector' => 'a', 
			'classes' => 'button--lt-red',
			'wrapper' => false,
			
		), 
		array(  
			'title' => 'Hilight Copy',
			'selector' => 'p', 
			'classes' => 'hilight-copy',
			'wrapper' => false,
			
		), 
		array(  
			'title' => 'Hilight Copy Grey BG',
			'selector' => 'p', 
			'classes' => 'hilight-copy hilight-copy--grey-bg',
			'wrapper' => false,
			
		), 

	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  



// create an SEO friendly string



