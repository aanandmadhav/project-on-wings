<?php
function mnky_custom_css() {
	
/*	
*	---------------------------------------------------------------------
*	General
*	--------------------------------------------------------------------- 
*/
	
	$custom_css = '';
	
	// Define theme accent colors
	$accent_color = ot_get_option('accent_color', '#3498db');
	$secondary_accent_color = ot_get_option('secondary_accent_color', '#f39c12');
	
	// If different post/page custom color 
	if( is_page() || is_single() ){
		if( get_post_meta( get_the_ID(), 'mnky_custom_accent_color', true) ){
			$accent_color = get_post_meta( get_the_ID(), 'mnky_custom_accent_color', true);
		}
		if( get_post_meta( get_the_ID(), 'mnky_custom_secondary_accent_color', true) ){
			$secondary_accent_color = get_post_meta( get_the_ID(), 'mnky_custom_secondary_accent_color', true);
		}
	}	
	
	// Accent color (background-color)
	$custom_css .= '
		input[type=\'submit\'], button, #wp-calendar #today, .pricing-box .plan-badge, .scrollToTop, .widget-area .widget .tagcloud a:hover, blockquote.box-left, blockquote.box-right, blockquote.callout, .article-labels span, .archive-style-2:nth-child(odd) .post-content-bg, .archive-style-2.layout-two-column:nth-child(4n) .post-content-bg, .archive-style-2.layout-two-column:nth-child(4n+1) .post-content-bg, .rating-bar-value, .mp-container .mp-comment, #mobile-site-navigation .mobile-menu-header, #site-navigation-side ul li.menu-button-theme a, #header-container .menu-toggle-wrapper:hover span {background-color:'. $accent_color .';}
	';
	
	$custom_css .= 'input[type=\'submit\'], button{border-bottom-color: '. mnky_ColorDarken( $accent_color ) .';}';
	$custom_css .= 'input[type=button]:hover, input[type=\'submit\']:hover, button:hover{border-bottom-color: '. mnky_ColorDarken( $accent_color ) .'; background-color: '. mnky_ColorDarken( $accent_color ) .';}';
	$custom_css .= '.archive-layout.format-video .post-preview:before, .archive-layout.format-gallery .post-preview:before, .archive-layout.format-link .post-preview:before{background-color:rgba('. mnky_hex2rgb( $accent_color ) .',0.70);}';
	$custom_css .= '.archive-layout.format-video .post-preview:hover:before, .archive-layout.format-gallery .post-preview:hover:before, .archive-layout.format-link .post-preview:hover:before{background-color:rgba('. mnky_hex2rgb( $accent_color ) .',0.80);}';
	
	// Secondary accent color (background-color)
	$custom_css .= '::selection{background-color:'. $secondary_accent_color .';}::-moz-selection{background-color:'. $secondary_accent_color .';}';
	$custom_css .= '.archive-style-2:nth-child(even) .post-content-bg, .archive-style-2.layout-two-column .post-content-bg{background-color:'. $secondary_accent_color .';}';
	
	// Accent color (color)
	$custom_css .= '
		.themecolor_txt, a, a:hover, blockquote.center p, #comments span.required, #comments .comment-reply-link:hover, #comments h3.comment-reply-title #cancel-comment-reply-link:hover, #comments .comment-meta a:hover, .vc_toggle_default .vc_toggle_title .vc_toggle_icon:after, .single-post .entry-header h5 a:hover, .entry-header .entry-meta a:hover, #comments p.comment-notes:before, p.logged-in-as:before, p.must-log-in:before, .sticky .post-preview:after, .pagination a:hover, .page-links a:hover, .format-chat p:nth-child(odd):before, #comments .comment-navigation a:hover, .separator_w_icon i, .mnky_testimonials-slider .flex-control-paging li a.flex-active:after, .mnky-content-slider .flex-control-paging li a.flex-active:after, #site-navigation ul li a:hover, #site-navigation ul li.current-menu-item > a, #site-navigation ul li.megamenu ul li ul li a:hover, #site-navigation ul li.megamenu ul li.current-menu-item > a, .mnky-posts .mp-title a:hover, .mp-author a:hover, .entry-meta-blog .meta-author:hover, .meta-comments a:hover, .archive-layout .entry-category a:hover, .mp-category a:hover, .rating_aspect_value .rating-value, .rating_summary_value, .rating-stars, #mobile-site-navigation ul > li > a:hover, .mnky_team_wrapper .team_member_position, .mnky_team_wrapper .team_content_container i, .mnky_breadcrumbs a:hover span, .site-links .search_button:hover, .site-links .header_cart_link i:hover, .menu-toggle-wrapper:hover, .footer-sidebar .widget a:hover, .site-info .widget a:hover {color:'. $accent_color .';}		
	';
	
	// Secondary accent color (color)
	$custom_css .= '.archive-layout .entry-category, .archive-layout .entry-category a, .single-post .entry-header h5, .single-post .entry-header h5 a, .mnky_team_wrapper:hover .team_content_container i, .mnky_breadcrumbs span {color:'. $secondary_accent_color .';}';

	// Accent color (border-color)
	$custom_css .= '
		input:focus, textarea:focus, blockquote.border p, blockquote.bold:after, .rating-bar-value:after, #site-navigation-side ul li.menu-button-theme a, #site-navigation-side ul li.menu-button-outline-theme a, #sidebar .widget.widget_nav_menu ul li.current-menu-item a, #sidebar.float-right .widget.widget_nav_menu ul li.current-menu-item a {border-color:'. $accent_color .';}
		.mp-container .mp-comment:after {border-left-color:'. $accent_color .'; border-top-color:'. $accent_color .';}	
	';
	
	if ( is_rtl() ) {
		$custom_css .= '.mp-container .mp-comment:after {border-left-color:transparent; border-right-color:'. $accent_color .';}';
	}
	
		
	// Accent color WooCommerce
	if (class_exists( 'WooCommerce' )){
		$custom_css .= '
			.woocommerce div.product span.price,.woocommerce div.product p.price,.woocommerce #content div.product span.price,.woocommerce #content div.product p.price,.woocommerce-page div.product span.price,.woocommerce-page div.product p.price,.woocommerce-page #content div.product span.price,.woocommerce-page #content div.product p.price, .woocommerce ul.products li.product .price,.woocommerce-page ul.products li.product .price, #site-header .site-links .header_cart_widget .woocommerce a:hover, woocommerce ul li.product-category:hover h3,.woocommerce ul li.product-category:hover h3 mark, .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-MyAccount-navigation ul li a:hover:after, .woocommerce-MyAccount-navigation ul li.is-active a:after, .shop_table a:hover, .woocommerce-pagination ul li a:hover {color:'. $accent_color .';}		
		';
		
		$custom_css .= '
			.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce a.added_to_cart,.woocommerce-page a.added_to_cart, .woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a, .site-links .header_cart_link .cart_product_count {background-color:'. $accent_color .';}
		';
		
		$custom_css .= '
			.woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a, .woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active {border-color:'. $accent_color .';}		
		';		
		
		$custom_css .= '
			.woocommerce a.button, .woocommerce .page-sidebar a.button, .woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,.woocommerce-page #respond input#submit,.woocommerce-page #content input.button, .woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce #content input.button.alt,.woocommerce-page a.button.alt,.woocommerce-page button.button.alt,.woocommerce-page input.button.alt,.woocommerce-page #respond input#submit.alt,.woocommerce-page #content input.button.alt, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce a.added_to_cart,.woocommerce-page a.added_to_cart, .woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a {background-color:'. $accent_color .'; border-bottom-color: '. mnky_ColorDarken( $accent_color ) .';}		
		';
		
		$custom_css .= '
			.woocommerce a.button:hover, .woocommerce .page-sidebar a.button:hover, .woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit:hover,.woocommerce #content input.button:hover,.woocommerce-page a.button:hover,.woocommerce-page button.button:hover,.woocommerce-page input.button:hover,.woocommerce-page #respond input#submit:hover,.woocommerce-page #content input.button:hover, .woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce #content input.button.alt:hover,.woocommerce-page a.button.alt:hover,.woocommerce-page button.button.alt:hover,.woocommerce-page input.button.alt:hover,.woocommerce-page #respond input#submit.alt:hover,.woocommerce-page #content input.button.alt:hover{border-bottom-color: '. mnky_ColorDarken( $accent_color ) .'; background-color: '. mnky_ColorDarken( $accent_color ) .';}
		';
		
		// Secondary color
		$custom_css .= '.woocommerce td.product-name dl.variation dt, .woocommerce-page td.product-name dl.variation dt {color:'. $secondary_accent_color .';}';
		
		// Heading color
		$custom_css .= '
			.woocommerce th, .woocommerce .shop_attributes th, .woocommerce #order_review tr.order-total td, .woocommerce .cart-collaterals .cart_totals tr.order-total td,.woocommerce-page .cart-collaterals .cart_totals tr.order-total td, .woocommerce form .form-row label,.woocommerce-page form .form-row label, .woocommerce form  legend,.woocommerce-page form legend {color:'. ot_get_option('headings_color') .'}		
		';	
		
		// Cart
		(ot_get_option('headings_color') != '') ? $custom_css .= '.site-links .header_cart_widget .woocommerce .total {color:'. ot_get_option('headings_color') .'}' : '';
		(ot_get_option('submenu_background') != '') ? $custom_css .= '#site-header .site-links .header_cart_widget {background-color:'. ot_get_option('submenu_background'). '}' : '';
		(ot_get_option('submenu_link_color') != '') ? $custom_css .= '#site-header .site-links .header_cart_widget .woocommerce, #site-header .site-links .header_cart_widget .woocommerce .total, #site-header .site-links .header_cart_widget .woocommerce a {color:'. ot_get_option('submenu_link_color') .'}' : '';
		(ot_get_option('megamenu_separator_color') != '') ? $custom_css .= '#site-header .site-links .header_cart_widget .woocommerce ul li, #site-header .site-links .header_cart_widget .woocommerce .total {border-color:'. ot_get_option('megamenu_separator_color'). '}' : '';
			
	}


	// Layout & Content width	
	$content_width = preg_replace('#[^0-9]#','', ot_get_option('content_width', '1200') );
	$layout_style = ot_get_option('layout_style');
	
		// If custom content width or layout
		if( is_page() || is_single() ){
			if( get_post_meta( get_the_ID(), 'mnky_custom_content_width', true) ){
				$content_width = preg_replace('#[^0-9]#','', get_post_meta( get_the_ID(), 'mnky_custom_content_width', true) );
			}			
			
			if( get_post_meta( get_the_ID(), 'mnky_custom_layout_style', true) ){
				$layout_style = get_post_meta( get_the_ID(), 'mnky_custom_layout_style', true);
			}
		}	  
		
		// Header width
		$custom_css .= '#main, #site-header #header-container, #top-bar, #mobile-site-header, #container, .inner, .page-header, .header-search, .header-search .search-input {max-width:'. $content_width  .'px; }';	
		
		$custom_css .= '#site-navigation ul li.megamenu > ul{max-width:'. $content_width .'px; left: calc(50% - '. $content_width/2 .'px);}';
		
		$custom_css .= '@media only screen and (max-width : '.$content_width.'px){#site-navigation .menu-container ul li.megamenu > ul{left:0;}}';
		
		$custom_css .= '@media only screen and (max-width : '.($content_width+60).'px){.searchform-wrapper {padding:0 30px;} .header-search .toggle-header-search {right:30px;}}';
		
		if( ot_get_option('header_width') == 'on' ){  
			$custom_css .= '#site-header #header-container, #top-bar, .header-search, .header-search .search-input {max-width:none;} .header-search{box-sizing:border-box;}';
			$custom_css .= '.searchform-wrapper {padding:0 30px;} .header-search .toggle-header-search {right:30px;}';
			if(ot_get_option('header_style') == 'default' ){
				$custom_css .= '#site-navigation ul li.megamenu > ul {left:30px; max-width:calc(100% - 60px);} @media only screen and (max-width : '.$content_width.'px){#site-navigation .menu-container ul li.megamenu > ul{max-width:none;}}';
			}
		}
		
		if ( is_rtl() ) {
			$custom_css .= '#site-navigation ul li.megamenu > ul {left:auto; right: calc(50% - '. $content_width/2 .'px);}';
			$custom_css .= '@media only screen and (max-width : '.$content_width.'px){#site-navigation .menu-container ul li.megamenu > ul{left:auto; right:0;}}';
			$custom_css .= '@media only screen and (max-width : '.($content_width+60).'px){#header-container .header-search .toggle-header-search {left:30px; right:auto;}}';
			if( ot_get_option('header_width') == 'on' ){  
				$custom_css .= '#header-container .header-search .toggle-header-search {left:30px; right:auto;}';
				if(ot_get_option('header_style') == 'default' ){
					$custom_css .= '#site-navigation ul li.megamenu > ul {left:auto; right:30px;}';
				}
			}
		}
		
		// Boxed layout width
		if( $layout_style == 'boxed' ){
			$content_width = $content_width + 60;	
			$custom_css .= 'body {padding-left:40px; padding-right:40px;}';
			$custom_css .= '@media only screen and (max-width : 1100px){body {padding-left:15px; padding-right:15px;}}';
			$custom_css .= '#wrapper{max-width:'. $content_width .'px; box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.15)}';
			$custom_css .= '#site-header #header-wrapper{max-width:'. $content_width .'px;}';
			$custom_css .= '#site-header #header-wrapper.header-sticky {left:0px; max-width:none}';
			$custom_css .= '@media only screen and (max-width : '.($content_width+20).'px){#header-wrapper:not(.header-sticky) #site-navigation ul li.megamenu > ul {left:0px; max-width:none;}}';
			$custom_css .= '@media only screen and (max-width : '.($content_width+60).'px){.searchform-wrapper {padding:0 30px;} .header-search .toggle-header-search {right:30px;}}';
			if ( is_rtl() ) {
				$custom_css .= '#site-header #header-wrapper.header-sticky {right:0; left:auto;}';
				$custom_css .= '@media only screen and (max-width : '.($content_width+20).'px){#header-wrapper:not(.header-sticky) #site-navigation ul li.megamenu > ul {left:auto; right:0;}}';
				$custom_css .= '@media only screen and (max-width : '.($content_width+60).'px){#header-container .header-search .toggle-header-search {left:30px; right:auto;}}';
			}
		}
		
		if( $layout_style != 'boxed' ){
			$custom_css .= '#mobile-site-header{width:100% !important;}';
		}
	
			
		
/*	
*	-------------------------------------------------------------------------------------------------
*	Header
*	-------------------------------------------------------------------------------------------------
*/

	// Header style	
	(ot_get_option('header_height') != '') ? $custom_css .= '#site-header, #site-header #header-wrapper {height:'. ot_get_option('header_height') .';}' : '';
	(ot_get_option('header_bg') != '') ? $custom_css .= '#site-header, #site-header #header-wrapper, #mobile-site-header {background-color:'. ot_get_option('header_bg') .';}' : '';	
	
	if( ot_get_option('header_border') == 'on' ){  
		$custom_css .= '#site-header #header-wrapper {box-shadow:0px 1px 3px rgba(0,0,0,0.12);} #site-header.header-overlay #header-wrapper {box-shadow:none;}';
	}
		
	// Top bar style
	(ot_get_option('top_bar_bg') != '') ? $custom_css .= '#top-bar-wrapper, #top-bar .widget_nav_menu ul li ul{background:'. ot_get_option('top_bar_bg') .'}' : '';
	(ot_get_option('top_bar_text_color') != '') ? $custom_css .= '#top-bar-wrapper .widget, #top-bar-wrapper .widget a, #top-bar .widget-title, #top-bar .search-input {color:'. ot_get_option('top_bar_text_color') .'}' : '';
	(ot_get_option('top_bar_link_hover') != '') ? $custom_css .= '#top-bar-wrapper .widget a:hover{color:'. ot_get_option('top_bar_link_hover') .'}' : '';
	
	
	// Menu style		
	(ot_get_option('header_height') != '') ? $custom_css .= '#site-navigation ul > li > a, .site-links .menu-toggle-wrapper, .site-links .header_cart_wrapper, .site-links .search_button, #site-logo .site-title, #site-navigation #menu-sidebar {line-height:'. ot_get_option('header_height') .'}' : '';
	(ot_get_option('header_height') != '') ? $custom_css .= '.header-search .search-input {height:'. ot_get_option('header_height') .'}' : '';
	(ot_get_option('header_style') == 'centred') ? $custom_css .= '#site-navigation ul > li > a, .site-links .menu-toggle-wrapper, .site-links .header_cart_wrapper, .site-links .search_button {line-height:60px;}' : '';	
	(ot_get_option('menu_font_size') != '15px') ? $custom_css .= '#site-navigation ul li a, .site-links .menu-toggle-wrapper {font-size:'. ot_get_option('menu_font_size') .'}' : '';
	(ot_get_option('side_overlay_menu_font_size') != '') ? $custom_css .= '#site-navigation-side ul li a, #site-navigation-overlay .menu-container {font-size:'. ot_get_option('side_overlay_menu_font_size') .'}' : '';
	
	(ot_get_option('default_menu_link') != '') ? $custom_css .= '#site-navigation ul li a, .site-links .search_button, .site-links .header_cart_link i, .toggle-mobile-menu i, #mobile-site-header #mobile-site-logo h1.site-title a, #mobile-site-header .toggle-mobile-menu i, .header-search .search-input, .menu-toggle-wrapper {color:'. ot_get_option('default_menu_link') .'}' : '';
	(ot_get_option('default_menu_link') != '') ? $custom_css .= '.header-search .toggle-header-search span, #header-container .menu-toggle-wrapper span {background-color:'. ot_get_option('default_menu_link') .'}' : '';
 
	(ot_get_option('default_menu_link_h') != '') ? $custom_css .= '#site-navigation ul li a:hover, .site-links .search_button:hover, .site-links .header_cart_link i:hover, #site-navigation ul li.current-menu-item > a, .menu-toggle-wrapper:hover {color:'. ot_get_option('default_menu_link_h') .'}' : '';
	(ot_get_option('default_menu_link_h') != '') ? $custom_css .= '#header-container .menu-toggle-wrapper:hover span {background-color:'. ot_get_option('default_menu_link_h') .'}' : '';
	
	
	// Side menu style
	if( ot_get_option('header_style') == 'side' ){  
		
		$side_navigation_bg = ot_get_option('side_navigation_bg');
		if ( ! empty( $side_navigation_bg ) ){
			$side_navigation_styles = array(
				($side_navigation_bg['background-color'] != '') ? 'background-color:'. $side_navigation_bg['background-color'] : null,
				($side_navigation_bg['background-image'] != '') ? 'background-image: url('. $side_navigation_bg['background-image'] .')' : null,
				($side_navigation_bg['background-repeat'] != '') ? 'background-repeat:'. $side_navigation_bg['background-repeat'] : null,
				($side_navigation_bg['background-position'] != '') ? 'background-position:'. $side_navigation_bg['background-position'] : null,
				($side_navigation_bg['background-attachment'] != '') ? 'background-attachment:'. $side_navigation_bg['background-attachment'] : null,
				($side_navigation_bg['background-size'] != '') ? 'background-size:'. $side_navigation_bg['background-size'] : null,
				
			);
		
			$side_navigation_styles = implode('; ', array_filter($side_navigation_styles));	
			$custom_css .= '#site-navigation-side {'.$side_navigation_styles.'}';
		}
		
		(ot_get_option('side_navigation_border') != '') ? $custom_css .= '#site-navigation-side {border-color:'. ot_get_option('side_navigation_border') .'}' : '';
		(ot_get_option('side_navigation_link') != '') ? $custom_css .= '#site-navigation-side, #site-navigation-side ul li a {color:'. ot_get_option('side_navigation_link') .'}' : '';
		(ot_get_option('side_navigation_link') != '') ? $custom_css .= '#site-navigation-side .toggle-main-menu span {background:'. ot_get_option('side_navigation_link') .'}' : '';		
		(ot_get_option('side_navigation_link_hover') != '') ? $custom_css .= '#site-navigation-side ul li a:hover {color:'. ot_get_option('side_navigation_link_hover') .'}' : '';
		(ot_get_option('side_navigation_link_hover') != '') ? $custom_css .= '#site-navigation-side .toggle-main-menu:hover span {background:'. ot_get_option('side_navigation_link_hover') .'}' : '';
	}
	
	// Overlay menu style	
	if( ot_get_option('header_style') == 'overlay' ){  
	
		$overlay_navigation_bg = ot_get_option('overlay_navigation_bg');
		if ( ! empty( $overlay_navigation_bg ) ){
			$overlay_navigation_styles = array(
				($overlay_navigation_bg['background-color'] != '') ? 'background-color:'. $overlay_navigation_bg['background-color'] : null,
				($overlay_navigation_bg['background-image'] != '') ? 'background-image: url('. $overlay_navigation_bg['background-image'] .')' : null,
				($overlay_navigation_bg['background-repeat'] != '') ? 'background-repeat:'. $overlay_navigation_bg['background-repeat'] : null,
				($overlay_navigation_bg['background-position'] != '') ? 'background-position:'. $overlay_navigation_bg['background-position'] : null,
				($overlay_navigation_bg['background-attachment'] != '') ? 'background-attachment:'. $overlay_navigation_bg['background-attachment'] : null,
				($overlay_navigation_bg['background-size'] != '') ? 'background-size:'. $overlay_navigation_bg['background-size'] : null,
				
			);
		
			$overlay_navigation_styles = implode('; ', array_filter($overlay_navigation_styles));	
			$custom_css .= '#site-navigation-overlay {'.$overlay_navigation_styles.'}';
		}
		
		(ot_get_option('overlay_navigation_link') != '') ? $custom_css .= '#site-navigation-overlay, #site-navigation-overlay ul li a {color:'. ot_get_option('overlay_navigation_link') .'}' : '';
		(ot_get_option('overlay_navigation_link') != '') ? $custom_css .= '#site-navigation-overlay .toggle-main-menu span {background:'. ot_get_option('overlay_navigation_link') .'}' : '';
		(ot_get_option('overlay_navigation_link_hover') != '') ? $custom_css .= '#site-navigation-overlay ul li a:hover {color:'. ot_get_option('overlay_navigation_link_hover') .'}' : '';
		(ot_get_option('overlay_navigation_link_hover') != '') ? $custom_css .= '#site-navigation-overlay .toggle-main-menu:hover span {background:'. ot_get_option('overlay_navigation_link_hover') .'}' : '';
	
	}
	
	// Overlay header style
	if( is_page() ) {
		if( get_post_meta( get_the_ID(), 'mnky_header_overlay', true ) == 'on' ){
			
			(ot_get_option('overlay_header_bg') != '') ? $custom_css .= '#site-header.header-overlay {background-color:'. ot_get_option('overlay_header_bg') .'}' : '';	
			
			(ot_get_option('overlay_menu_link') != '') ? $custom_css .= '#site-navigation ul li a, .site-links .search_button, #site-navigation .header_cart_button, .toggle-mobile-menu i, .site-links .header_cart_link i, .header-search .search-input, .menu-toggle-wrapper {color:'. ot_get_option('overlay_menu_link') .'}' : '';
			(ot_get_option('overlay_menu_link') != '') ? $custom_css .= '.header-search .toggle-header-search span, #header-container .menu-toggle-wrapper span {background-color:'. ot_get_option('overlay_menu_link') .'}' : '';
			
			(ot_get_option('overlay_menu_link_h') != '') ? $custom_css .= '#site-navigation ul li a:hover, #site-navigation ul li.current-menu-item > a, .site-links .search_button:hover, .site-links .header_cart_link i:hover, .menu-toggle-wrapper:hover {color:'. ot_get_option('overlay_menu_link_h') .'}' : '';
			(ot_get_option('overlay_menu_link_h') != '') ? $custom_css .= '#header-container .menu-toggle-wrapper:hover span {background-color:'. ot_get_option('overlay_menu_link_h') .'}' : '';
			
			(ot_get_option('overlay_sticky_menu_bg') != '') ? $custom_css .= '#site-header.header-overlay #header-wrapper.header-sticky {background-color:'. ot_get_option('overlay_sticky_menu_bg') .'}' : '';		
		
			if( ot_get_option('detached_overlay_header') == 'on' ){  
				$custom_css .= '#site-header{margin-top:40px;} #site-header.header-overlay #header-container {background-color:'. ot_get_option('detached_overlay_header_background','#ffffff') .'; padding:0 40px; box-shadow: 5px 5px 0px 0px rgba(0,0,0,0.11); box-sizing:border-box;} .header-overlay#site-header .header-sticky#header-wrapper {background:none;} #site-header.header-overlay .header-search .search-input{padding:0 40px} #site-header.header-overlay .header-search .toggle-header-search {right:40px}';
			}			
			
			(ot_get_option('overlay_header_height') != '') ? $custom_css .= '#site-header.header-overlay ul > li > a, #site-header.header-overlay .site-links .menu-toggle-wrapper, #site-header.header-overlay .site-links .header_cart_wrapper, #site-header.header-overlay .site-links .search_button, #site-logo .site-title {line-height:'. ot_get_option('overlay_header_height') .'}' : '';
			(ot_get_option('overlay_header_height') != '') ? $custom_css .= '#site-header.header-overlay, #site-header.header-overlay #header-wrapper, #site-header.header-overlay .header-search .search-input {height:'. ot_get_option('overlay_header_height') .'}' : '';	
			
		}
	}

	
	// Sub-menu style
	(ot_get_option('sub_menu_font_size') != '13px') ? $custom_css .= '#site-navigation ul li ul li a {font-size:'. ot_get_option('sub_menu_font_size') .'}' : '';
	(ot_get_option('submenu_background') != '') ? $custom_css .= '#site-navigation ul li ul {background-color:'. ot_get_option('submenu_background'). '}' : '';
		
	(ot_get_option('submenu_link_color') != '') ? $custom_css .= '#site-navigation ul li ul li a, #site-navigation ul li ul li a:hover, #site-navigation ul li ul li.current-menu-item > a {color:'. ot_get_option('submenu_link_color'). '}' : '';
	(ot_get_option('submenu_link_bg_color') != '') ? $custom_css .= '#site-navigation ul li ul li a:hover, #site-navigation ul li ul li.current-menu-item > a, .single-post #site-navigation ul li ul li.current_page_parent > a, #site-navigation ul li ul li.current-menu-ancestor > a {background-color:'. ot_get_option('submenu_link_bg_color'). '}' : '';
	
	
	// Megamenu
	$megamenu_bg = ot_get_option('megamenu_bg');
	if ( ! empty( $megamenu_bg ) ){
		$megamenu_styles = array(
			($megamenu_bg['background-color'] != '') ? 'background-color:'. $megamenu_bg['background-color'] : null,
			($megamenu_bg['background-image'] != '') ? 'background-image: url('. $megamenu_bg['background-image'] .')' : null,
			($megamenu_bg['background-repeat'] != '') ? 'background-repeat:'. $megamenu_bg['background-repeat'] : null,
			($megamenu_bg['background-position'] != '') ? 'background-position:'. $megamenu_bg['background-position'] : null,
			($megamenu_bg['background-attachment'] != '') ? 'background-attachment:'. $megamenu_bg['background-attachment'] : null,
			($megamenu_bg['background-size'] != '') ? 'background-size:'. $megamenu_bg['background-size'] : null,
			
		);
	
		$megamenu_styles = implode('; ', array_filter($megamenu_styles));	
		$custom_css .= '#site-navigation ul li.megamenu > ul{'.$megamenu_styles.'}';
	}
	
	(ot_get_option('megamenu_active_item_color') != '') ? $custom_css .= '#site-navigation ul li.megamenu ul li ul li a:hover, #site-navigation ul li.megamenu ul li.current-menu-item > a {color:'. ot_get_option('megamenu_active_item_color') .';}' : '';
		
	(ot_get_option('megamenu_title_color') != '') ? $custom_css .= '#site-navigation ul li.megamenu > ul > li > a, #site-navigation ul li.megamenu > ul > li > a:hover{color:'. ot_get_option('megamenu_title_color'). ' !important}' : '';
		
	(ot_get_option('megamenu_separator_color') != '') ? $custom_css .= '#site-navigation ul > li.megamenu > ul > li {border-right-color:'. ot_get_option('megamenu_separator_color'). '}' : '';
	
	// Mobile menu style
	(ot_get_option('mobile_menu_background') != '') ? $custom_css .= '#mobile-site-header{background:'. ot_get_option('mobile_menu_background'). '}' : '';
	(ot_get_option('mobile_menu_toggle_color') != '') ? $custom_css .= '#mobile-site-header .toggle-mobile-menu i, #mobile-site-header #mobile-site-logo h1.site-title a {color:'. ot_get_option('mobile_menu_toggle_color'). '}' : '';
	
	// Logo
	(ot_get_option('logo_top') != '') ? $custom_css .= '#site-logo {margin-top:'. ot_get_option('logo_top') .'}' : '';
	(ot_get_option('logo_retina') != '' && ot_get_option('retina_logo_width') != '') ? $custom_css .= '#site-logo img.retina-logo{width:'. ot_get_option('retina_logo_width') .'; height:'. ot_get_option('retina_logo_height') .';}' : '';
	(ot_get_option('mobile_logo_retina') != '' && ot_get_option('mobile_retina_logo_width') != '') ? $custom_css .= '#mobile-site-header #site-logo img.retina-logo{width:'. ot_get_option('mobile_retina_logo_width') .'; height:'. ot_get_option('mobile_retina_logo_height') .';}' : '';
	
	// Overlay logo
	if( is_page() ) {
		if( get_post_meta( get_the_ID(), 'mnky_header_overlay', true ) == 'on' ){
			(ot_get_option('overlay_logo_top') != '') ? $custom_css .= '#site-logo {margin-top:'. ot_get_option('overlay_logo_top') .'}' : '';
			(ot_get_option('overlay_logo_retina') != '' && ot_get_option('overlay_retina_logo_width') != '') ? $custom_css .= '#site-logo img.retina-logo{width:'. ot_get_option('overlay_retina_logo_width') .'; height:'. ot_get_option('overlay_retina_logo_height') .';}' : '';
		}
	}
	
		
/*	
*	-------------------------------------------------------------------------------------------------
*	Content
*	-------------------------------------------------------------------------------------------------
*/
	
	// Content style
	(ot_get_option('theme_button_color') != '') ? $custom_css .= 'input[type=\'submit\'], button {background-color:'. ot_get_option('theme_button_color') .'}' : '';
	(ot_get_option('theme_button_color') != '') ? $custom_css .= 'input[type=\'submit\'], button{border-bottom-color: '. mnky_ColorDarken( ot_get_option('theme_button_color') ) .'}': '';
	(ot_get_option('theme_button_hover_color') != '') ? $custom_css .= 'input[type=\'submit\']:hover, button:hover {background-color:'. ot_get_option('theme_button_hover_color') .'; border-color:'. ot_get_option('theme_button_hover_color') .'}' : '';
	(ot_get_option('button_text_color') != '') ? $custom_css .= 'input[type=\'submit\'], button, input[type=\'submit\']:active, button:active {color:'. ot_get_option('button_text_color') .'}' : '';
	
	(ot_get_option('link_color') != '') ? $custom_css .= 'a,.author .author-info a {color:'. ot_get_option('link_color') .'}' : '';
	(ot_get_option('link_hover_color') != '') ? $custom_css .= 'a:hover, .entry-header .entry-meta a:hover, .widget a:hover, .footer-sidebar .widget a:hover, .mp-author a:hover, .entry-meta-blog .meta-author:hover, .meta-comments a:hover, .archive-layout .entry-category a:hover, .single-post .entry-header h5 a:hover, .mp-category a:hover,#site-navigation .mnky-menu-posts .menu-post-container a:hover h6, .mnky-related-posts .related-post-container a:hover h6, .mnky-posts .mp-title a:hover, .review_author a:hover, .mnky_breadcrumbs a:hover span, #comments .comment-reply-link:hover, #comments h3.comment-reply-title #cancel-comment-reply-link:hover, #comments .comment-meta a:hover {color:'. ot_get_option('link_hover_color') .'}' : '';
	
	(ot_get_option('page_title_text_color') != '') ? $custom_css .= '.page-header h1 {color:'. ot_get_option('page_title_text_color') .'}' : '';
	(ot_get_option('page_title_border_color') != '') ? $custom_css .= '.page-header h1:after {background:'. ot_get_option('page_title_border_color') .'}' : '';

	(ot_get_option('sidebar_text_color') != '') ? $custom_css .= '.page-sidebar .widget{color:'. ot_get_option('sidebar_text_color') .'}' : '';
	(ot_get_option('sidebar_link_color') != '') ? $custom_css .= '.page-sidebar a{color:'. ot_get_option('sidebar_link_color') .'}' : '';
	(ot_get_option('sidebar_link_hover_color') != '') ? $custom_css .= '.page-sidebar a:hover{color:'. ot_get_option('sidebar_link_hover_color') .'}' : '';
	(ot_get_option('sidebar_title_color') != '') ? $custom_css .= '.page-sidebar .widget .widget-title {color:'. ot_get_option('sidebar_title_color') .'}' : '';
	(ot_get_option('sidebar_title_border_color') != '') ? $custom_css .= '.page-sidebar .widget .widget-title:after  {background:'. ot_get_option('sidebar_title_border_color') .'}' : '';
	(ot_get_option('sidebar_divider_color') != '') ? $custom_css .= '.page-sidebar .widget ul li,.page-sidebar .widget ul ul,.page-sidebar .widget_categories .children, .page-sidebar .widget_pages .children{border-color:'. ot_get_option('sidebar_divider_color') .'}' : '';
	
	// Article
	if( is_single() ){
		
		$post_width = ot_get_option( 'mnky_post_width' );
		if( get_post_meta( get_the_ID(), 'mnky_post_width', true) != '' ){
			$post_width = get_post_meta( get_the_ID(), 'mnky_post_width', true);
		}
		if( $post_width != '' ){
			$post_width = preg_replace( '/\D/', '', $post_width );
			$custom_css .= '.entry-content p, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .mnky-post-links{max-width:'. $post_width .'px; margin-left:auto; margin-right:auto;}';
		} 
		
		if ( ot_get_option('post_date') == 'off' ) {
			$custom_css .= '.meta-comments:before {content:"";}';			
		}
		
		if ( ot_get_option('post_comments') == 'off' || !comments_open() ) {
			$custom_css .= '.meta-date {margin-right:0px;}';			
		}
		
		if ( get_post_meta( get_the_ID(), 'mnky_custom_content_style', true) == '2' ) {
			$custom_css .= '.post-preview {max-width:48.2%; float:left; margin-bottom:0px;} .entry-content {width:48.2%; float:right;} @media only screen and (max-width: 979px) {.post-preview {max-width:100%; float:none; margin-bottom:40px;} .entry-content {width:100%; float:none;} }';			
		}
		
		if ( get_post_meta( get_the_ID(), 'mnky_custom_content_style', true) == '3' ) {
			$custom_css .= '.post-preview {max-width:48.2%; float:right; margin-bottom:0px;} .entry-content {width:48.2%; float:left;} @media only screen and (max-width: 979px) {.post-preview {max-width:100%; float:none; margin-bottom:40px;} .entry-content {width:100%; float:none;} }';		
		}
		
	}
	
	// Body background
	$body_bg = ot_get_option('body_background');
		
		// If custom body background
		if( is_page() || is_single() ){
			if( get_post_meta( get_the_ID(), 'mnky_custom_body_background', true) ){
				$body_bg = get_post_meta( get_the_ID(), 'mnky_custom_body_background', true); 
			}	
		}
		
	if ( ! empty( $body_bg ) ){
		$body_styles = array(
			($body_bg['background-color'] != '') ? 'background-color:'. $body_bg['background-color'] : null,
			($body_bg['background-image'] != '') ? 'background-image: url('. $body_bg['background-image'] .')' : null,
			($body_bg['background-repeat'] != '') ? 'background-repeat:'. $body_bg['background-repeat'] : null,
			($body_bg['background-position'] != '') ? 'background-position:'. $body_bg['background-position'] : null,
			($body_bg['background-attachment'] != '') ? 'background-attachment:'. $body_bg['background-attachment'] : null,
			($body_bg['background-size'] != '') ? 'background-size:'. $body_bg['background-size'] : null,
				
		);
		
		$body_styles = implode('; ', array_filter($body_styles));	
		$custom_css .= 'body{'.$body_styles.'}';
	}

	
	
	
/*	
*	-------------------------------------------------------------------------------------------------
*	Pre-content
*	-------------------------------------------------------------------------------------------------
*/
	
	// Default pre-content style
	if( is_page() || is_single() ){
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' ) {
			$pre_header_bg = get_post_meta( get_the_ID(), 'mnky_pre_content_bg', true);
			if ( ! empty( $pre_header_bg ) ){
				$pre_header_styles = array(
					($pre_header_bg['background-color'] != '') ? 'background-color:'. $pre_header_bg['background-color'] : null,
					($pre_header_bg['background-image'] != '') ? 'background-image: url('. $pre_header_bg['background-image'] .')' : null,
					($pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $pre_header_bg['background-repeat'] : null,
					($pre_header_bg['background-position'] != '') ? 'background-position:'. $pre_header_bg['background-position'] : null,
					($pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $pre_header_bg['background-attachment'] : null,
					($pre_header_bg['background-size'] != '') ? 'background-size:'. $pre_header_bg['background-size'] : null,
					
				);
			
				$pre_header_styles = implode('; ', array_filter($pre_header_styles));	
				$custom_css .= '.pre-content{'.$pre_header_styles.'}';
			}
			if ( get_post_meta( get_the_ID(), 'mnky_pre_content_responsive_height', true ) == 'on' ){
			$custom_css .= '@media only screen and (max-width: 979px) {.pre-content-html{height:auto !important;}}';
			}
			if ( get_post_meta( get_the_ID(), 'mnky_pre_content_paddings', true ) != '' ){
			$custom_css .= '.pre-content-html {padding:'.get_post_meta( get_the_ID(), 'mnky_pre_content_paddings', true ).'}';
			}
		}
	}

	// Blog pre-content style
	if( is_home() ){
		$blog_pre_header_bg = ot_get_option('blog_pre_content_bg');
		if ( ! empty( $blog_pre_header_bg ) ){
			$blog_pre_header_styles = array(
				($blog_pre_header_bg['background-color'] != '') ? 'background-color:'. $blog_pre_header_bg['background-color'] : null,
				($blog_pre_header_bg['background-image'] != '') ? 'background-image: url('. $blog_pre_header_bg['background-image'] .')' : null,
				($blog_pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $blog_pre_header_bg['background-repeat'] : null,
				($blog_pre_header_bg['background-position'] != '') ? 'background-position:'. $blog_pre_header_bg['background-position'] : null,
				($blog_pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $blog_pre_header_bg['background-attachment'] : null,
				($blog_pre_header_bg['background-size'] != '') ? 'background-size:'. $blog_pre_header_bg['background-size'] : null,
				
			);
		
			$blog_pre_header_styles = implode('; ', array_filter($blog_pre_header_styles));	
			$custom_css .= '.pre-content{'.$blog_pre_header_styles.'}';
		}
		
		if (  ot_get_option('blog_pre_content_responsive_height') == 'on' ){
		$custom_css .= '@media only screen and (max-width: 979px) {.pre-content-html{height:auto !important;}}';
		}
		if ( ot_get_option('blog_pre_content_paddings') != '' ){
		$custom_css .= '.pre-content-html {padding:'. ot_get_option('blog_pre_content_paddings') .'}';
		}
	}

	// Category pre-content style
	if( is_category() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
				
					$cat_pre_header_bg = $category_style['cat_pre_content_bg'];
					if ( ! empty( $cat_pre_header_bg ) ){
						$cat_pre_header_styles = array(
							($cat_pre_header_bg['background-color'] != '') ? 'background-color:'. $cat_pre_header_bg['background-color'] : null,
							($cat_pre_header_bg['background-image'] != '') ? 'background-image: url('. $cat_pre_header_bg['background-image'] .')' : null,
							($cat_pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $cat_pre_header_bg['background-repeat'] : null,
							($cat_pre_header_bg['background-position'] != '') ? 'background-position:'. $cat_pre_header_bg['background-position'] : null,
							($cat_pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $cat_pre_header_bg['background-attachment'] : null,
							($cat_pre_header_bg['background-size'] != '') ? 'background-size:'. $cat_pre_header_bg['background-size'] : null,
							
						);
					
						$cat_pre_header_styles = implode('; ', array_filter($cat_pre_header_styles));	
						$custom_css .= '.pre-content{'.$cat_pre_header_styles.'}';
					}
					
				if (  $category_style['cat_pre_content_responsive_height'] == 'on' ){
				$custom_css .= '@media only screen and (max-width: 979px) {.pre-content-html{height:auto !important;}}';
				}
				if ( $category_style['cat_pre_content_paddings'] != '' ){
				$custom_css .= '.pre-content-html {padding:'. $category_style['cat_pre_content_paddings'] .'}';
				}				
				
				}
			}
		}
	}

	
	
/*	
*	-------------------------------------------------------------------------------------------------
*	Typography
*	-------------------------------------------------------------------------------------------------
*/	

	// Body typo
	$body_typo_array = ot_get_option('body_font');
	if ( ! empty( $body_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$body_typo_array['font-family']]['family'] ) ) {
			$body_typo = 'font-family: "' . $ot_google_fonts[$body_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;';
		} else {
			$body_typo = 'font-family: "' . $body_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;';
		}
		if( ! empty( $body_typo_array['font-weight'] ) ) { $body_typo .= 'font-weight:'. $body_typo_array['font-weight'] .';'; }
		if( ! empty( $body_typo_array['line-height'] ) ) { $body_typo .= 'line-height:'. $body_typo_array['line-height'] .';'; }
		if( ! empty( $body_typo_array['letter-spacing'] ) ) { $body_typo .= 'letter-spacing:'. $body_typo_array['letter-spacing'] .';'; }
		if( ! empty( $body_typo_array['text-transform'] ) ) { $body_typo .= 'text-transform:'. $body_typo_array['text-transform'] .';'; }

		$custom_css .= 'body, select, textarea, input, button{'.$body_typo.'}';
	}

	$custom_css .= 'body{color:'. ot_get_option('body_text_color', '#666677') .'; font-size:'. ot_get_option('body_size').'}';

	(ot_get_option('body_text_color') != '') ? $custom_css .= '#content h4.wpb_toggle, .mp-author a, .entry-meta-blog .meta-author, .meta-comments a, .entry-header .entry-meta, .entry-header .entry-meta a, .pagination a, .page-links a, #comments .comment-meta a, #comments .comment-reply-link, #comments h3.comment-reply-title #cancel-comment-reply-link, #comments .comment-navigation a, .mnky_breadcrumbs a span, .mnky-content-box, .mnky-accordion.vc_tta-style-classic.vc_tta.vc_general .vc_tta-panel-title > a {color:'. ot_get_option('body_text_color', '#666677') .';}' : '';	
	
	
	// Menu typo
	$menu_typo_array = ot_get_option('menu_font');
	if ( ! empty( $menu_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$menu_typo_array['font-family']]['family'] ) ) {
			$menu_typo = 'font-family: "' . $ot_google_fonts[$menu_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;;';
		} else {
			$menu_typo = 'font-family: "' . $menu_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;;';
		}
		if( ! empty( $menu_typo_array['font-weight'] ) ) { $menu_typo .= 'font-weight:'. $menu_typo_array['font-weight'] .';'; }
		if( ! empty( $menu_typo_array['letter-spacing'] ) ) { $menu_typo .= 'letter-spacing:'. $menu_typo_array['letter-spacing'] .';'; }
		if( ! empty( $menu_typo_array['text-transform'] ) ) { $menu_typo .= 'text-transform:'. $menu_typo_array['text-transform'] .';'; }

		$custom_css .= '#site-navigation, #site-navigation ul li a, .site-links .menu-toggle-wrapper{'.$menu_typo.'}';
	}	
	
	// Overlay and side menu typo
	$side_overlay_menu_typo_array = ot_get_option('overlay_side_menu_font');
	if ( ! empty( $side_overlay_menu_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$side_overlay_menu_typo_array['font-family']]['family'] ) ) {
			$side_overlay_menu_typo = 'font-family: "' . $ot_google_fonts[$side_overlay_menu_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;;';
		} else {
			$side_overlay_menu_typo = 'font-family: "' . $side_overlay_menu_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;;';
		}
		if( ! empty( $side_overlay_menu_typo_array['font-weight'] ) ) { $side_overlay_menu_typo .= 'font-weight:'. $side_overlay_menu_typo_array['font-weight'] .';'; }
		if( ! empty( $side_overlay_menu_typo_array['line-height'] ) ) { $side_overlay_menu_typo .= 'line-height:'. $side_overlay_menu_typo_array['line-height'] .';'; }
		if( ! empty( $side_overlay_menu_typo_array['letter-spacing'] ) ) { $side_overlay_menu_typo .= 'letter-spacing:'. $side_overlay_menu_typo_array['letter-spacing'] .';'; }
		if( ! empty( $side_overlay_menu_typo_array['text-transform'] ) ) { $side_overlay_menu_typo .= 'text-transform:'. $side_overlay_menu_typo_array['text-transform'] .';'; }

		$custom_css .= '#site-navigation-side ul li a, #site-navigation-overlay ul li a{'.$side_overlay_menu_typo.'}';
	}	
	
	
	// Heading typo
	$heading_typo_array = ot_get_option('heading_font');
	if ( ! empty( $heading_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$heading_typo_array['font-family']]['family'] ) ) {
			$heading_typo = 'font-family: "' . $ot_google_fonts[$heading_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;;';
		} else {
			$heading_typo = 'font-family: "' . $heading_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;;';
		}
		if( ! empty( $heading_typo_array['font-weight'] ) ) { $heading_typo .= 'font-weight:'. $heading_typo_array['font-weight'] .';'; }
		if( ! empty( $heading_typo_array['line-height'] ) ) { $heading_typo .= 'line-height:'. $heading_typo_array['line-height'] .';'; }
		if( ! empty( $heading_typo_array['letter-spacing'] ) ) { $heading_typo .= 'letter-spacing:'. $heading_typo_array['letter-spacing'] .';'; }
		if( ! empty( $heading_typo_array['text-transform'] ) ) { $heading_typo .= 'text-transform:'. $heading_typo_array['text-transform'] .';'; }

		$custom_css .= 'h1, h2, h3, h4, h5, h6{'.$heading_typo.'}';
	}		
	
	
	// Single post typo
	$single_typo_array = ot_get_option('single_post_font');
	if ( ! empty( $single_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$single_typo_array['font-family']]['family'] ) ) {
			$single_typo = 'font-family: "' . $ot_google_fonts[$single_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;;';
		} else {
			$single_typo = 'font-family: "' . $single_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;;';
		}
		if( ! empty( $single_typo_array['font-weight'] ) ) { $single_typo .= 'font-weight:'. $single_typo_array['font-weight'] .';'; }
		if( ! empty( $single_typo_array['line-height'] ) ) { $single_typo .= 'line-height:'. $single_typo_array['line-height'] .';'; }
		if( ! empty( $single_typo_array['letter-spacing'] ) ) { $single_typo .= 'letter-spacing:'. $single_typo_array['letter-spacing'] .';'; }
		if( ! empty( $single_typo_array['text-transform'] ) ) { $single_typo .= 'text-transform:'. $single_typo_array['text-transform'] .';'; }

		$custom_css .= '.single-post .entry-content{'.$single_typo.'}';
	}	
	
	$custom_css .= '.single-post .entry-content, .single-post .post_lead_content {font-size:'. ot_get_option('single_post_text_font_size').'}';
	
	
	// Widget typo
	$widget_typo_array = ot_get_option('widget_font');
	if ( ! empty( $widget_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$widget_typo_array['font-family']]['family'] ) ) {
			$widget_typo = 'font-family: "' . $ot_google_fonts[$widget_typo_array['font-family']]['family'] . '",Arial,Helvetica,sans-serif;;';
		} else {
			$widget_typo = 'font-family: "' . $widget_typo_array['font-family'] . '",Arial,Helvetica,sans-serif;;';
		}
		if( ! empty( $widget_typo_array['font-weight'] ) ) { $widget_typo .= 'font-weight:'. $widget_typo_array['font-weight'] .';'; }
		if( ! empty( $widget_typo_array['line-height'] ) ) { $widget_typo .= 'line-height:'. $widget_typo_array['line-height'] .';'; }
		if( ! empty( $widget_typo_array['letter-spacing'] ) ) { $widget_typo .= 'letter-spacing:'. $widget_typo_array['letter-spacing'] .';'; }
		if( ! empty( $widget_typo_array['text-transform'] ) ) { $widget_typo .= 'text-transform:'. $widget_typo_array['text-transform'] .';'; }

		$custom_css .= '.widget .widget-title{'.$widget_typo.'}';
	}
	
	
	// Headings
	$custom_css .= 'h1{font-size:'. ot_get_option('h1', '30px') .'}';
	$custom_css .= 'h2{font-size:'. ot_get_option('h2', '24px') .'}';
	$custom_css .= 'h3{font-size:'. ot_get_option('h3', '20px') .'}';
	$custom_css .= 'h4{font-size:'. ot_get_option('h4', '18px') .'}';
	$custom_css .= 'h5{font-size:'. ot_get_option('h5', '16px') .'}';
	$custom_css .= 'h6{font-size:'. ot_get_option('h6', '14px') .'}';
	(ot_get_option('headings_color') != '') ? $custom_css .= 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color:'. ot_get_option('headings_color') .'}' : '';
	
	(ot_get_option('headings_color') != '') ? $custom_css .= '#site-logo .site-title a:hover, #comments .comment-author .fn, .mnky_counter_wrapper .count_data, .mnky-accordion.vc_tta-style-classic.vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title > a {color:'. ot_get_option('headings_color') .'}' : '';
	

/*	
*	-------------------------------------------------------------------------------------------------
*	Footer
*	-------------------------------------------------------------------------------------------------
*/
		
	// Footer background
	$footer_bg = ot_get_option('footer_bg');
	if ( ! empty( $footer_bg ) ){
		$footer_styles = array(
			($footer_bg['background-color'] != '') ? 'background-color:'. $footer_bg['background-color'] : null,
			($footer_bg['background-image'] != '') ? 'background-image: url('. $footer_bg['background-image'] .')' : null,
			($footer_bg['background-repeat'] != '') ? 'background-repeat:'. $footer_bg['background-repeat'] : null,
			($footer_bg['background-position'] != '') ? 'background-position:'. $footer_bg['background-position'] : null,
			($footer_bg['background-attachment'] != '') ? 'background-attachment:'. $footer_bg['background-attachment'] : null,
			($footer_bg['background-size'] != '') ? 'background-size:'. $footer_bg['background-size'] : null,
			
		);
	
		$footer_styles = implode('; ', array_filter($footer_styles));	
		$custom_css .= '.footer-sidebar{'.$footer_styles.'}';
	}
	// Footer columns
	$footer_columns = ot_get_option('footer_columns', 'vc_col-sm-3');
	
	if ( $footer_columns == 'vc_col-sm-6') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-6:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-6:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	}
	
	if ( $footer_columns == 'vc_col-sm-4') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	(ot_get_option('footer_column_3_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(3) {width:'. ot_get_option('footer_column_3_width') .'}' : '';
	}
	
	if ( $footer_columns == 'vc_col-sm-3') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	(ot_get_option('footer_column_3_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(3) {width:'. ot_get_option('footer_column_3_width') .'}' : '';
	(ot_get_option('footer_column_4_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(4) {width:'. ot_get_option('footer_column_4_width') .'}' : '';
	}
	
	// Footer style
	(ot_get_option('footer_text_color') != '') ? $custom_css .= '.footer-sidebar .widget, .footer-sidebar .widget input{color:'. ot_get_option('footer_text_color') .'}' : '';
	(ot_get_option('footer_link') != '') ? $custom_css .= '.footer-sidebar .widget a{color:'. ot_get_option('footer_link') .'}' : '';
	(ot_get_option('footer_link_hover') != '') ? $custom_css .= '.footer-sidebar .widget a:hover {color:'. ot_get_option('footer_link_hover') .'}' : '';
	(ot_get_option('footer_widget_title') != '') ? $custom_css .= '.footer-sidebar .widget .widget-title{color:'. ot_get_option('footer_widget_title') .'}' : '';
	
	
	// Copyright background
	$copyright_bg = ot_get_option('copyright_bg');
	if ( ! empty( $copyright_bg ) ){
		$copyright_styles = array(
			($copyright_bg['background-color'] != '') ? 'background-color:'. $copyright_bg['background-color'] : null,
			($copyright_bg['background-image'] != '') ? 'background-image: url('. $copyright_bg['background-image'] .')' : null,
			($copyright_bg['background-repeat'] != '') ? 'background-repeat:'. $copyright_bg['background-repeat'] : null,
			($copyright_bg['background-position'] != '') ? 'background-position:'. $copyright_bg['background-position'] : null,
			($copyright_bg['background-attachment'] != '') ? 'background-attachment:'. $copyright_bg['background-attachment'] : null,
			($copyright_bg['background-size'] != '') ? 'background-size:'. $copyright_bg['background-size'] : null,
			
		);
	
		$copyright_styles = implode('; ', array_filter($copyright_styles));	
		$custom_css .= '.site-info{'.$copyright_styles.'}';
	}
	
	// Copyright style
	(ot_get_option('copyright_text_align') != '') ? $custom_css .= '.site-info {text-align:'. ot_get_option('copyright_text_align') .'}' : '';
	(ot_get_option('copyright_separator_color') != '') ? $custom_css .= '.site-info .copyright-separator {border-color:'. ot_get_option('copyright_separator_color') .'}' : '';
	(ot_get_option('copyright_text_color') != '') ? $custom_css .= '.site-info .widget, .footer-sidebar .widget input, .site-info .widget-title{color:'. ot_get_option('copyright_text_color') .'}' : '';
	(ot_get_option('copyright_link') != '') ? $custom_css .= '.site-info .widget a{color:'. ot_get_option('copyright_link') .'}' : '';
	(ot_get_option('copyright_link_hover') != '') ? $custom_css .= '.site-info .widget a:hover{color:'. ot_get_option('copyright_link_hover') .'}' : '';
	(ot_get_option('copyright_widget_title') != '') ? $custom_css .= '.site-info .widget .widget-title{color:'. ot_get_option('copyright_widget_title') .'}' : '';


	
/*	
*	-------------------------------------------------------------------------------------------------
*	Misc
*	-------------------------------------------------------------------------------------------------
*/

	// Section pagination
	if( is_page() && get_post_meta( get_the_ID(), 'mnky_section_scroll', true) == 'on' ){
		if( get_post_meta( get_the_ID(), 'mnky_section_pagination_color', true) ){
			$custom_css .= '.section-pagination a:after{background:'. get_post_meta( get_the_ID(), 'mnky_section_pagination_color', true) .'}';
		}
		if( get_post_meta( get_the_ID(), 'mnky_section_pagination', true) == 'off' ){
			$custom_css .= '.section-pagination {display:none;}';
		}
	}	
	
	// Mobile style
	if ( class_exists('Mobile_Detect') ){
		$detect = new Mobile_Detect;
		if ( $detect->isMobile() ) {
			$custom_css .= '@media only screen and (max-width : 1024px){
				.wpb_row, .pre-content {background-attachment:scroll !important;}
			}';
		}
	}
	
	// Custom CSS from option panel
	$custom_css .=  ot_get_option('custom_css');
	
	
	$custom_css = preg_replace('/\r|\n/', '', $custom_css);
	
	wp_add_inline_style( 'mnky_main', wp_strip_all_tags( $custom_css ) );
}

add_action('wp_enqueue_scripts', 'mnky_custom_css');