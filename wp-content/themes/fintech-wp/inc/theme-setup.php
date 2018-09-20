<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Theme Setup
*	--------------------------------------------------------------------- 
*/


// Set content width
if ( ! isset( $content_width ) ) {
	$content_width = 980;
}
if ( ! function_exists( 'mnky_theme_setup' ) ) {
	function mnky_theme_setup() {

		// Register menu
		register_nav_menus( array(
			'primary' => esc_html__( 'Main Navigation', 'fintech-wp' ),
			'secondary' => esc_html__( 'Secondary Navigation', 'fintech-wp' ),
			'mobile' => esc_html__( 'Mobile Navigation', 'fintech-wp' )
		) );

		// Menu fallback
		function mnky_no_menu(){
			$url = admin_url( 'nav-menus.php');
			echo '<div class="menu-container"><ul class="menu"><li><a href="'. esc_url($url) .'">'.esc_html__( 'Click here to assign menu!', 'fintech-wp' ).'</a></li></ul></div>';
		}   

		// Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Title tag
		add_theme_support( 'title-tag' );

		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'link' ) );

		// Feeds
		add_theme_support( 'automatic-feed-links' );

		// HTML5
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		
		// Widget selective refresh
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Languages
		load_theme_textdomain( 'fintech-wp', get_template_directory() . '/languages' );
		
		// Editor style
		add_editor_style( 'custom-editor-style.css' );

	}
}
add_action( 'after_setup_theme', 'mnky_theme_setup' );


// Add Single post templates
if ( ! function_exists( 'mnky_post_template' ) ) {
	function mnky_post_template( $template ) {
		global $post;
		
		if( is_singular('post') ){
			$custom_field = get_post_meta( $post->ID, 'mnky_custom_post_template', true );

			if( ! $custom_field ) {
				if( ot_get_option('post_layout') != 'single.php') {
					$custom_field = ot_get_option('post_layout');
				} else {
					return $template;
				}
			} elseif( $custom_field == 'single.php') {
				return $template;
			}
			
			// Prevent directory traversal
			$custom_field = str_replace( '..', '', $custom_field );
			
			if(strlen($custom_field) > 0) {
				if( file_exists( get_stylesheet_directory() . "/{$custom_field}" ) ) {
					$template = get_stylesheet_directory() . "/{$custom_field}";
				} elseif( file_exists( get_template_directory() . "/{$custom_field}" ) ) {
					$template = get_template_directory() . "/{$custom_field}";
				}
			}		
		}
		return $template;
	}
}
add_filter( 'single_template', 'mnky_post_template' );


// Redirect to "Theme Options/Import Data" after activation
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	wp_redirect( admin_url( 'themes.php?page=fintech-welcome' ) );
}
