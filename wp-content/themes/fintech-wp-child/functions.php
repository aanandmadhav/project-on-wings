<?php
/*	
*	---------------------------------------------------------------------
*	Fintech WP child theme functions
*	--------------------------------------------------------------------- 
*/

// Theme setup
add_action( 'wp_enqueue_scripts', 'fintechwp_child_enqueue_styles' );
function fintechwp_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}