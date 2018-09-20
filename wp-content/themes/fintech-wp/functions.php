<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Functions
*	--------------------------------------------------------------------- 
*/

// Define constants
define('MNKY_PATH', get_template_directory());
define('MNKY_URI', get_template_directory_uri());
define('MNKY_INCLUDE', get_template_directory() . '/inc');
define('MNKY_ADMIN', get_template_directory() . '/inc/theme-options');
define('MNKY_ADMIN_EXT', get_template_directory() . '/inc/theme-options-extend');
define('MNKY_PLUGINS', get_template_directory() . '/inc/plugins');

// Theme setup
require_once(MNKY_INCLUDE . '/theme-setup.php');
require_once(MNKY_INCLUDE . '/custom-functions.php');
require_once(MNKY_INCLUDE . '/hooks.php');
require_once(MNKY_INCLUDE . '/admin/index.php');
require_once(MNKY_INCLUDE . '/menu-walker.php');
require_once(MNKY_INCLUDE . '/sidebars.php');
require_once(MNKY_INCLUDE . '/tgm-plugin-activation.php');
require_once(MNKY_INCLUDE . '/tgm-register-plugins.php');


// WooCommerce
require_once(MNKY_INCLUDE . '/woocommerce/index.php');

// Theme options
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
require(MNKY_ADMIN . '/ot-loader.php');
require(MNKY_ADMIN_EXT . '/theme-options.php' );
require(MNKY_ADMIN_EXT . '/config.php');
require(MNKY_ADMIN_EXT . '/typography.php');
require(MNKY_ADMIN_EXT . '/meta-boxes.php');


/*	
*	---------------------------------------------------------------------
*	MNKY Enqueue scripts & styles
*	--------------------------------------------------------------------- 
*/

add_action('wp_enqueue_scripts', 'mnky_scripts');
function mnky_scripts() {
			
	// Global scripts
	wp_enqueue_script( 'mnky_main-js', MNKY_URI . '/js/init.js', array('jquery'), '', true);
	
	// Sticky menu
	$sticky_header = ot_get_option('sticky_header', 'sticky_header_smart');
	if( is_page() ){
		if( get_post_meta( get_the_ID(), 'mnky_sticky_header', true) ){
			$sticky_header = get_post_meta( get_the_ID(), 'mnky_sticky_header', true);
		}
	}	
	if ( $sticky_header == 'sticky_header_smart' ){
		wp_enqueue_script( 'mnky_sticky-header-smart-js', MNKY_URI . '/js/sticky-header-smart.js', array('jquery'), '', true);		
	} elseif ( $sticky_header == 'sticky_header' ){
		wp_enqueue_script( 'mnky_sticky-header-js', MNKY_URI . '/js/sticky-header.js', array('jquery'), '', true);
	}

	// Woocommerce style
	if (class_exists( 'WooCommerce' )){
		wp_register_style( 'mnky_woocommerce_style', MNKY_URI . '/inc/woocommerce/woocommerce.css', null, wp_get_theme()->get( 'Version' ), 'all' );
		wp_style_add_data( 'mnky_woocommerce_style', 'rtl', MNKY_URI . '/inc/woocommerce/woocommerce-rtl.css' );
		wp_enqueue_style( 'mnky_woocommerce_style' );
	}

	// Main stylesheet
	wp_enqueue_style( 'mnky_main', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ));
	
	// Theia Sticky Sidebar
	wp_enqueue_script( 'theia_sticky-sidebar', MNKY_URI . '/js/theia-sticky-sidebar.js', array('jquery'), '', true);
	
	// jQuery Scrollify
	if ( get_post_meta( get_the_ID(), 'mnky_section_scroll', true ) == 'on' ){
		wp_register_script( 'jquery_scrollify', MNKY_URI . '/js/jquery.scrollify.js', array('jquery'), '', true);
		wp_enqueue_script( 'jquery_scrollify');
		if ( get_post_meta( get_the_ID(), 'mnky_section_animation', true ) == 'off' ){
			wp_localize_script( 'jquery_scrollify', 'mnkyScrollOptions', array(
				'speed' => '0',
			) );	
		} else {
			wp_localize_script( 'jquery_scrollify', 'mnkyScrollOptions', array(
				'speed' => '1100',
			) );	
		}			
	}
	
	// Icons	
	if ( ! function_exists( 'vc_map' ) ) {
		wp_enqueue_style( 'font-awesome', MNKY_URI . '/css/font-awesome.min.css', null, '4.7.0', 'all' );
	} else {
		wp_enqueue_style( 'font-awesome' );
	}
		
	// Threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Default typo
	$body_typo_array = ot_get_option('body_font');
	if ( empty( $body_typo_array['font-family'] ) ) {
		
	function mnky_default_font_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'fintech-wp' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Roboto:400,300italic,300,400italic,500,500italic,700,700italic&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
	
	return $font_url;
	}	
	
    wp_enqueue_style( 'mnky-fonts', mnky_default_font_url(), array(), '1.0.0' );

	}
}

// Enqueue custom styles from theme options
require_once(MNKY_PATH . '/custom-style.php');

// Custom back-end style
add_action( 'admin_enqueue_scripts', 'mnky_admin_scripts' );
function mnky_admin_scripts() {
	wp_enqueue_style( 'mnky_admin', MNKY_URI . '/inc/admin/assets/admin.css', null, wp_get_theme()->get( 'Version' ), 'all' );
	wp_style_add_data( 'mnky_admin', 'rtl', MNKY_URI . '/inc/admin/assets/admin-rtl.css' );
}