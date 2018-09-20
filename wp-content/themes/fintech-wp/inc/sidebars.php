<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Register sidebars
*	--------------------------------------------------------------------- 
*/

function mnky_sidebars() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog/Post Sidebar', 'fintech-wp' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Appears on blog layout and posts', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Page Sidebar', 'fintech-wp' ),
		'id' => 'default-sidebar',
		'description' => esc_html__( 'Appears as default sidebar on pages', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Single Post Header Sidebar', 'fintech-wp' ),
		'id' => 'post-header-sidebar',
		'description' => esc_html__( 'Appears in single post header', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Top', 'fintech-wp' ),
		'id' => 'post-content-top-sidebar',
		'description' => esc_html__( 'Appears before single post content', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Bottom', 'fintech-wp' ),
		'id' => 'post-content-bottom-sidebar',
		'description' => esc_html__( 'Appears after single post content', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'After Single Post Sidebar', 'fintech-wp' ),
		'id' => 'after-single-post-sidebar',
		'description' => esc_html__( 'Appears after single post', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Before Single Post Sidebar', 'fintech-wp' ),
		'id' => 'before-single-post-sidebar',
		'description' => esc_html__( 'Appears above single post content and sidebar', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Menu Sidebar', 'fintech-wp' ),
		'id' => 'menu-sidebar',
		'description' => esc_html__( 'Appears in the default navigation bar and after the side navigation menu', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Left', 'fintech-wp' ),
		'id' => 'top-left-widget-area',
		'description' => esc_html__( 'Top bar widget area (align left)', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
		
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Right', 'fintech-wp' ),
		'id' => 'top-right-widget-area',
		'description' => esc_html__( 'Top bar widget area (align right)', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 1', 'fintech-wp' ),
		'id' => 'footer-widget-area-1',
		'description' => esc_html__( 'Appears in the footer section', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 2', 'fintech-wp' ),
		'id' => 'footer-widget-area-2',
		'description' => esc_html__( 'Appears in the footer section', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 3', 'fintech-wp' ),
		'id' => 'footer-widget-area-3',
		'description' => esc_html__( 'Appears in the footer section', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 4', 'fintech-wp' ),
		'id' => 'footer-widget-area-4',
		'description' => esc_html__( 'Appears in the footer section', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Copyright Area', 'fintech-wp' ),
		'id' => 'copyright-widget-area',
		'description' => esc_html__( 'Appears in the footer section', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'WooCommerce Page Sidebar', 'fintech-wp' ),
		'id' => 'shop-widget-area',
		'description' => esc_html__( 'Product page widget area', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Mobile Header Sidebar', 'fintech-wp' ),
		'id' => 'mobile-header-widget-area',
		'description' => esc_html__( 'Mobile header widget area', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Mobile Menu Sidebar', 'fintech-wp' ),
		'id' => 'mobile-menu-widget-area',
		'description' => esc_html__( 'Mobile menu widget area', 'fintech-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

}

add_action( 'widgets_init', 'mnky_sidebars' );