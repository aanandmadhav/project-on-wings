<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Edit option panel
*	--------------------------------------------------------------------- 
*/


function filter_list_item_title_desc( $label, $id ) {
	$label = esc_html__( 'Add a title only you will see. This makes it easier to drag & drop.', 'fintech-wp' );
	return $label;
}
add_filter( 'ot_list_item_title_desc', 'filter_list_item_title_desc', 10, 2 );


function mnky_ot_header_logo() {
	return '<div class="dashicons dashicons-admin-settings" style="font-size:22px; padding:4px 8px 5px 8px"></div>';
}
add_filter( 'ot_header_logo_link', 'mnky_ot_header_logo', 10, 2 );

function mnky_ot_header_version() {
	return 'Fintech WP - v'. wp_get_theme()->get( 'Version' );
}
add_filter( 'ot_header_version_text', 'mnky_ot_header_version', 10, 2 );

function mnky_ot_upload_text() {
	return 'Add to Panel';
}
add_filter( 'ot_upload_text', 'mnky_ot_upload_text', 10, 2 );


/*	
*	---------------------------------------------------------------------
*	MNKY Edit option
*	--------------------------------------------------------------------- 
*/

function mnky_radio_images( $array, $field_id ) {
	if ( $field_id == 'layout_style' ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'fintech-wp' ),
				'src'	  => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-fullwidth.png'
			),
			array(
				'value'   => 'boxed',
				'label'   => esc_html__( 'Boxed layout', 'fintech-wp' ),
				'src'	  => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-boxed.png'
			)
		);
	} 	
	
	if ( $field_id == 'header_style' ) {
		$array = array(
			array(
				'value'	   => 'default',
				'label'	   => esc_html__( 'Default', 'fintech-wp' ),
				'src'	   => MNKY_URI . '/inc/theme-options-extend/assets/header-default.png'
			),
			array(
				'value'	   => 'centred',
				'label'	   => esc_html__( 'Centred', 'fintech-wp' ),
				'src'	   => MNKY_URI . '/inc/theme-options-extend/assets/header-centred.png'
			),		  
			array(
				'value'	   => 'split',
				'label'	   => esc_html__( 'Menu split by logo', 'fintech-wp' ),
				'src'	   => MNKY_URI . '/inc/theme-options-extend/assets/header-split.png'
			),
			array(
				'value'	   => 'side',
				'label'	   => esc_html__( 'Hamburger icon w/ slide out menu', 'fintech-wp' ),
				'src'	   => MNKY_URI . '/inc/theme-options-extend/assets/header-side.png'
			),
			array(
				'value'	   => 'overlay',
				'label'	   => esc_html__( 'Hamburger icon w/ fullscreen overlay menu', 'fintech-wp' ),
				'src'	   => MNKY_URI . '/inc/theme-options-extend/assets/header-fullscreen.png'
			)
		);
	} 
	
	if ( $field_id == 'mnky_custom_layout_style' ) {
		$array = array(
			array(
				'value'   => '',
				'label'   => esc_html__( 'Default', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/admin-default.png'
			),			
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-fullwidth.png'
			),
			array(
				'value'   => 'boxed',
				'label'   => esc_html__( 'Boxed layout', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/site-layout-boxed.png'
			)
		);
	} 
	
	if ( $field_id == 'catalog_layout'  || $field_id == 'product_layout' || $field_id == 'blog_layout' ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'right-sidebar',
				'label'   => esc_html__( 'Right sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'left-sidebar',
				'label'   => esc_html__( 'Left sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}
	
	if ( $field_id == 'post_layout' ) {
		$array = array(
			array(
				'value'   => 'single.php',
				'label'   => esc_html__( 'Full width', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'single-right-sidebar.php',
				'label'   => esc_html__( 'Right sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'single-left-sidebar.php',
				'label'   => esc_html__( 'Left sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}	
	if ( $field_id == 'mnky_custom_post_template' ) {
		$array = array(
			array(
				'value'   => '',
				'label'   => esc_html__( 'Default (Selected in theme options panel)', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/admin-default.png'
			),				
			array(
				'value'   => 'single.php',
				'label'   => esc_html__( 'Full width', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'single-right-sidebar.php',
				'label'   => esc_html__( 'Right sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'single-left-sidebar.php',
				'label'   => esc_html__( 'Left sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}

	
	if ( $field_id == 'archive_post_layout' ) {
		$array = array(
			array(
				'value'   => 'layout-one-column',
				'label'   => esc_html__( 'One column', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/post-layout-1.png'
			),
			array(
				'value'   => 'layout-two-column',
				'label'   => esc_html__( 'Two column', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/post-layout-2.png'
			)
		);
	}
	
	
	if ( preg_match( '/^category_styles_cat_post_layout_/', $field_id ) ) {
		$array = array(
			array(
				'value'   => 'layout-one-column',
				'label'   => esc_html__( 'One column', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/post-layout-1.png'
			),		
			array(
				'value'   => 'layout-two-column',
				'label'   => esc_html__( 'Two column', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/post-layout-2.png'
			)
		);
	}


	if ( preg_match( '/^category_styles_cat_layout_/', $field_id ) ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-none.png'
			),			
			array(
				'value'   => 'right-sidebar',
				'label'   => esc_html__( 'Right sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'left-sidebar',
				'label'   => esc_html__( 'Left sidebar', 'fintech-wp' ),
				'src'	 => MNKY_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}	
		
	
	
	return $array;
}
add_filter( 'ot_radio_images', 'mnky_radio_images', 10, 2 );