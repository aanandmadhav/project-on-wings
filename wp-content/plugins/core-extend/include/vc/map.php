<?php
/*---------------------------------------------------------------*/
/* Register shortcode within Visual Composer interface
/*---------------------------------------------------------------*/

add_action( 'init', 'mnky_vc_map' );
function mnky_vc_map() {

	if ( function_exists( 'vc_map' ) ) {
	$add_css_animation = vc_map_add_css_animation( true );
	} else {
	$add_css_animation = '';
	}

	$add_css_animation_delay = array(
		'type' => 'dropdown',
		'heading' => esc_html__('CSS Animation Delay', 'core-extend'),
		'param_name' => 'css_animation_delay',
		'value' => array(
			'0ms' => '', 
			'100ms' => 'delay-100', 
			'200ms' => 'delay-200', 
			'300ms' => 'delay-300', 
			'400ms' => 'delay-400', 
			'500ms' => 'delay-500', 
			'600ms' => 'delay-600', 
			'700ms' => 'delay-700', 
			'800ms' => 'delay-800', 
			'900ms' => 'delay-900', 
			'1000ms' => 'delay-1000', 
			'1100ms' => 'delay-1100', 
			'1200ms' => 'delay-1200', 
			'1300ms' => 'delay-1300', 
			'1400ms' => 'delay-1400', 
			'1500ms' => 'delay-1500', 
			'1600ms' => 'delay-1600',
			'1700ms' => 'delay-1700',
			'1800ms' => 'delay-1800', 
			'1900ms' => 'delay-1900', 
			'2000ms' => 'delay-2000'
		)
	);
	

	// Buttons
	vc_map( array(
		'name' => esc_html__('Styled Button', 'core-extend'),
		'base' => 'mnky_button',
		'icon' => 'icon-mnky_button',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Eye catching button', 'core-extend'),
		'params' => array(
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Button Style', 'core-extend' ),
				'value' => array(
					esc_html__( 'Standard', 'core-extend' ) => '',
					esc_html__( 'Round', 'core-extend' ) => 'mnky-round-button',
				),
				'param_name' => 'button_style',
				'description' => esc_html__( 'Choose button style', 'core-extend' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button text', 'core-extend'),
				'admin_label' => true,
				'param_name' => 'title',
				'value' => esc_html__('Text on the button', 'core-extend'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Button color', 'core-extend'),
				'param_name' => 'bg_color',
				'value' => '',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend')
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Text color', 'core-extend'),
				'param_name' => 'color',
				'value' => '#fff'
			),			
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__( 'Background hover color', 'core-extend' ),
				'param_name' => 'bg_hover_color',
				'value' => array('Black' => 'flat-black', 'Soft Blue' => 'flat-softblue', 'Coffe' => 'flat-coffe', 'Pink' => 'flat-pink', 'Lime' => 'flat-lime', 'Watermelon' => 'flat-watermelon', 'Brown' => 'flat-brown', 'Purple' => 'flat-purple', 'Gray' => 'flat-gray', 'Silver' => 'flat-silver', 'Mint' => 'flat-mint', 'Green' => 'flat-green', 'Sky Blue' => 'flat-sky', 'Teal' => 'flat-teal', 'Magenta' => 'flat-magenta', 'Sand' => 'flat-sand', 'Yellow' => 'flat-yellow', 'Blue' => 'flat-blue', 'Navy Blue' => 'flat-navy', 'Plum' => 'flat-plum', 'Red' => 'flat-red', 'Orange' => 'flat-orange'),
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Align center?', 'core-extend' ),
				'param_name' => 'center_element',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'button-center-align')
			),	
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'No icon', 'core-extend' ) => '',
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );
	
	// Heading
	vc_map( array(
		'name' => esc_html__('Styled Heading', 'core-extend'),
		'base' => 'mnky_heading',
		'icon' => 'icon-mnky_heading',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Eye catching headings', 'core-extend'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'core-extend'),
				'param_name' => 'title',
				'value' => 'This is title',
				'admin_label' => true,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Heading tag', 'core-extend'),
				'param_name' => 'heading_tag',
				'value' => array(
					esc_html__('H1', 'core-extend' ) => 'h1',
					esc_html__('H2', 'core-extend' ) => 'h2',
					esc_html__('H3', 'core-extend' ) => 'h3',
					esc_html__('H4', 'core-extend' ) => 'h4',
					esc_html__('H5', 'core-extend' ) => 'h5',
					esc_html__('H6', 'core-extend' ) => 'h6',
				),
				'description' => esc_html__('Choose heading tag from the list.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font size', 'core-extend'),
				'param_name' => 'font_size',
				'value' => '30px',
				'description' => esc_html__('Enter font size in pixels.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Align', 'core-extend' ),
				'param_name' => 'align',
				'value' => array(
					esc_html__('Left', 'core-extend' ) => '',
					esc_html__('Center', 'core-extend' ) => 'align-center',
					esc_html__('Right', 'core-extend' ) => 'align-right',
				),
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Heading color', 'core-extend'),
				'param_name' => 'color',
				'value' => ''
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Bottom line color', 'core-extend'),
				'param_name' => 'line_color',
				'value' => ''
			),		
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );
	
	// Icons
	vc_map( array(
		'name' => esc_html__('Icons', 'core-extend'),
		'base' => 'mnky_icons',
		'icon' => 'icon-mnky_icons',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Scalable vector icons', 'core-extend'),
		'admin_enqueue_js' => array( MNKY_PLUGIN_URL . 'assets/js/extend-composer-custom-views.js' ),
		'admin_enqueue_css' => array( MNKY_PLUGIN_URL . 'assets/css/core-extend-backend.css'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Mono Social', 'core-extend' ) => 'monosocial',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_monosocial',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'monosocial',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon size', 'core-extend'),
				'param_name' => 'icon_size',
				'value' => '28px',
				'description' => esc_html__('Icon size in pixels.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Icon color', 'core-extend'),
				'param_name' => 'icon_color',
				'value' => '#666677'
			),		
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Align center?', 'core-extend' ),
				'param_name' => 'center_element',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'icon-center-align')
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Padding left', 'core-extend'),
				'param_name' => 'padding_left',
				'value' => '0px',
				'description' => esc_html__('The padding-left property sets the left padding (space) of an element.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Padding right', 'core-extend'),
				'param_name' => 'padding_right',
				'value' => '0px',
				'description' => esc_html__('The padding-right property sets the right padding (space) of an element.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Hover effect', 'core-extend'),
				'param_name' => 'hover_effect',
				'value' => array(esc_html__('None', 'core-extend') => '', esc_html__('Fade out', 'core-extend') => 'fade_out', esc_html__('Change color', 'core-extend') => 'change_color', esc_html__('Bounce', 'core-extend') => 'bounce', esc_html__('Shrink', 'core-extend') => 'shrink')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Hover color', 'core-extend'),
				'param_name' => 'hover_color',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend'),
				'dependency' => array('element' => 'hover_effect', 'value' => array('change_color'))
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			$add_css_animation,
			$add_css_animation_delay,		
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		'js_view' => 'VcIconView'
	) );	
	
	// Client logo
	vc_map( array(
		'name' => esc_html__('Client Logo', 'core-extend'),
		'base' => 'mnky_client_logo',
		'icon'		=> 'icon-mnky_client_logo',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Client logo image', 'core-extend'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Client logo image', 'core-extend'),
				'param_name' => 'img_url',
				'value' => '', 
				'description' => esc_html__('Add client logo image. Note: If you have enabled SRCSET feature in Theme Options, it is recommended that your original image is at least 2x bigger than specified size.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image width', 'core-extend' ),
				'param_name' => 'width',
				'description' => '',
				'description' => esc_html__( 'Specified size is converted to pixels, use plain numbers, e.g., "350". Leave empty to use original image.', 'core-extend' )
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image height', 'core-extend' ),
				'param_name' => 'height',
				'description' => '',
				'description' => esc_html__( 'Specified size is converted to pixels, use plain numbers, e.g., "350". Leave empty to use original image.', 'core-extend' )
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Effect', 'core-extend' ),
				'param_name' => 'effect',
				'value' => array(
					esc_html__('No Effect', 'core-extend' ) => '',
					esc_html__('Opacity to full color', 'core-extend' ) => 'opacity-effect',
					esc_html__('Grayscale to color', 'core-extend' ) => 'grayscale-effect',
				),
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Align center?', 'core-extend' ),
				'param_name' => 'center_element',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'client-logo-center-align')
			),	
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );	
	
	// Retina image
	vc_map( array(
		'name' => esc_html__('Retina Image', 'core-extend'),
		'base' => 'mnky_retina_image',
		'icon'		=> 'icon-mnky_retina_image',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Single retina image', 'core-extend'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Select image', 'core-extend'),
				'param_name' => 'img_url',
				'value' => '', 
				'description' => esc_html__('Choose image from media library.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image display width in pixels', 'core-extend' ),
				'param_name' => 'width',
				'description' => '',
				'admin_label' => true,
				'description' => esc_html__( 'Original image size should be at least 2x larger than specified size. If empty, only original image will be returned.', 'core-extend' )
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image display height in pixels', 'core-extend' ),
				'param_name' => 'height',
				'description' => '',
				'admin_label' => true,
				'description' => esc_html__( 'Original image size should be at least 2x larger than specified size. If empty, only original image will be returned.', 'core-extend' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Image alignment', 'core-extend' ),
				'param_name' => 'align',
				'value' => array(
					esc_html__('Left', 'core-extend' ) => '',
					esc_html__('Center', 'core-extend' ) => 'retina-image-center',
					esc_html__('Right', 'core-extend' ) => 'retina-image-right',
				),
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Optional border', 'core-extend' ),
				'param_name' => 'border',
				'description' => '',
				'description' => esc_html__( 'Add optional border shorthand css, e.g., 1px solid #eee', 'core-extend' )
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Optional box shadow', 'core-extend' ),
				'param_name' => 'static_shadow',
				'description' => 'Enables box shadow.',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'shadow')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Custom shadow', 'core-extend'),
				'param_name' => 'custom_static_shadow',
				'description' => esc_html__('Add custom value for the CSS box-shadow property. Default value is "2px 2px 15px 0px rgba(102, 102, 119, 0.11)"', 'core-extend'),
				'dependency' => array('element' => 'static_shadow', 'value' => array('shadow') )
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );	
	

	// Team
	vc_map( array(
		'name' => esc_html__('Team', 'core-extend'),
		'base' => 'mnky_team',
		'icon' => 'icon-mnky_team',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Staff members', 'core-extend'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Member image', 'core-extend'),
				'param_name' => 'img_url',
				'value' => '', 
				'description' => esc_html__('Display size is 540x540px. If you have enabled SRCSET feature in Theme Options, it is recommended that your original image is at least 1080x1080px.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Name', 'core-extend'),
				'param_name' => 'name',
				'value' => 'John Doe',
				'admin_label' => true
			),		
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Position', 'core-extend'),
				'param_name' => 'position',
				'value' => 'designer',
				'admin_label' => true,
				'description' => esc_html__('e.g. Senior Designer', 'core-extend')
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'No icon', 'core-extend' ) => '',
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );


	// Testimonial slider
	vc_map( array(
		'name' => esc_html__('Testimonials', 'core-extend'),
		'base' => 'mnky_testimonial_slider',
		'icon' => 'icon-mnky_testimonials', 
		'as_parent' => array('only' => 'mnky_testimonial'),
		'is_container' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Quote slider', 'core-extend'),
		'params' => array(	
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Animation', 'core-extend'),
				'param_name' => 'flex_animation',
				'value' => array(esc_html__('Fade', 'core-extend') => '', esc_html__('Slide', 'core-extend') => 'slide',),
				'description' => esc_html__('Choose slide animation type.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Slide show speed', 'core-extend'),
				'param_name' => 'slide_speed',
				'value' => '5',
				'description' => esc_html__('Set the speed of the slideshow cycling, in seconds. Set 0 to stop auto slide.', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Hide paging control?', 'core-extend' ),
				'param_name' => 'bullets',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'paging-false')
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		'custom_markup' => '
			<div class="wpb_testimonial_holder wpb_holder clearfix vc_container_for_children">
			%content%
			</div>
			<div class="tab_controls">
			    <a class="add_tab" title="' . esc_html__( 'Add Testimonials', 'core-extend' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . esc_html__( 'Add testimonial', 'core-extend' ) . '</span></a>
			</div>
		',
	  'default_content' => '
	  [mnky_testimonial name="John Doe" position="Designer"]I am tsetimonial text. Click edit button to change this text.[/mnky_testimonial]
	  [mnky_testimonial name="Nathan Benson" position="Developer"]I am testimonial text. Click edit button to change this text.[/mnky_testimonial]
	  ',
	  'js_view' => 'MNKYTestimonialsView'
	  
	) );


	// Testimonial tab
	vc_map( array(
		'name' => esc_html__('Testimonial', 'core-extend'),
		'base' => 'mnky_testimonial',
		'is_container' => true,
		'content_element' => false,
		'as_child' => array('only' => 'mnky_testimonial_slider'),
		'category' => esc_html__('Premium', 'core-extend'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Author image', 'core-extend'),
				'param_name' => 'img_url',
				'description' => esc_html__('Display size is 70x70px. If you have enabled SRCSET feature in theme options, consider using original image sized at least 140x140px.', 'core-extend')
			),		
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Author name', 'core-extend'),
				'param_name' => 'name',
				'value' => 'John Doe',
				'holder' => 'h3'
			),		
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Author info', 'core-extend'),
				'param_name' => 'author_dec',
				'value' => 'Designer',
				'description' => esc_html__('e.g. "Senior Designer" or  "Happy Customer"', 'core-extend')
			),
			array(
				'type' => 'textarea',
				'class' => 'quote_text',
				'heading' => esc_html__('Testimonial/Quote text', 'core-extend'),
				'param_name' => 'content',
				'value' => esc_html__('I am tetimonial text.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Text color', 'core-extend'),
				'param_name' => 'text_color',
				'description' => esc_html__('Leave empty to use default text color', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)
	) );

	
	// Content slider tab
	vc_map( array(
		'name' => esc_html__('Content Slider', 'core-extend'),
		'base' => 'mnky_content_slider',
		'icon' => 'icon-mnky_content_slider', 
		'as_parent' => array('only' => 'mnky_content_slider_tab'),
		'is_container' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Pageable content container', 'core-extend'),
		'params' => array(	
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Animation', 'core-extend'),
				'param_name' => 'flex_animation',
				'value' => array(esc_html__('Fade', 'core-extend') => '', esc_html__('Slide', 'core-extend') => 'slide',),
				'description' => esc_html__('Choose tab animation type.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Slide show speed', 'core-extend'),
				'param_name' => 'slide_speed',
				'value' => '5',
				'description' => esc_html__('Set the speed of the slideshow cycling, in seconds.', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Hide paging control?', 'core-extend' ),
				'param_name' => 'bullets',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'paging-false')
			),	
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Hide navigation arrows?', 'core-extend' ),
				'param_name' => 'arrows',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'arrows-false')
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		'custom_markup' => '
			<div class="wpb_tour_holder wpb_holder clearfix vc_container_for_children">
			%content%
			</div>
			<div class="tab_controls">
			    <a class="add_tab" title="' . esc_html__( 'Add Section', 'core-extend' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . esc_html__( 'Add Section', 'core-extend' ) . '</span></a>
			</div>
		',
	  'default_content' => '
	  [mnky_content_slider_tab]I am content slider tab. Add some content here.[/mnky_content_slider_tab]
	  ',
	  'js_view' => 'MNKYContentSliderView'
	  
	) );

	
	// Content slider tab
	vc_map( array(
		'name' => esc_html__('Slider Section', 'core-extend'),
		'base' => 'mnky_content_slider_tab',
		'is_container' => true,
		'content_element' => false,
		'as_child' => array('only' => 'mnky_content_slider'),
		'category' => esc_html__('Premium', 'core-extend'),
		'params' => array(		
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		'js_view' => 'MNKYContentSliderTabView'
	) );

	
	// Content box
	vc_map( array(
	  'name'		=> esc_html__('Content Box', 'core-extend'),
	  'base'		=> 'mnky_content_box',
	  'icon'		=> 'icon-mnky_content_box',
	  'is_container' => true,
	  'show_settings_on_create' => true,
	  'category'  => esc_html__('Premium', 'core-extend'),
	  'description' => esc_html__('Stylable content container', 'core-extend'),
		'params' => array(
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Background color', 'core-extend'),
				'param_name' => 'background',
				'description' => esc_html__('Leave empty for no background color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Border color', 'core-extend'),
				'param_name' => 'border',
				'description' => esc_html__('Leave empty for no border.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Content color', 'core-extend'),
				'param_name' => 'color',
				'description' => esc_html__('General content text color for elements inside the content box.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Padding', 'core-extend'),
				'param_name' => 'padding',
				'description' => esc_html__('Set custom inner paddings for the box content. Default paddings are 40px.', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Keep paddings in mobile view', 'core-extend'),
				'param_name' => 'keep_paddings',
				'description' => esc_html__('Keep custom paddings in mobile view. By default paddings are reset to 40px.', 'core-extend'),
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'keep-paddings')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Enable shadow in static view', 'core-extend' ),
				'param_name' => 'static_shadow',
				'description' => 'Enables box shadow.',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'shadow')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Custom static shadow', 'core-extend'),
				'param_name' => 'custom_static_shadow',
				'description' => esc_html__('Add custom value for the CSS box-shadow property. Default value is "2px 2px 15px 0px rgba(102, 102, 119, 0.11)"', 'core-extend'),
				'dependency' => array('element' => 'static_shadow', 'value' => array('shadow') )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Border radius', 'core-extend'),
				'param_name' => 'border_radius',
				'description' => esc_html__('Set border radius in pixels. Default value is 2px', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Hover Effect', 'core-extend' ),
				'param_name' => 'hover_effect',
				'value' => array(
					esc_html__('No Effect', 'core-extend' ) => '',
					esc_html__('Shadow', 'core-extend' ) => 'shadow-hover',
					esc_html__('Slide Up', 'core-extend' ) => 'slide-up-hover',
					esc_html__('Shadow and slide up', 'core-extend' ) => 'slide-up-shadow-hover',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Optional maximum width', 'core-extend'),
				'param_name' => 'max_width',
				'description' => esc_html__('Set optional maximum width in pixels.', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Optional maximum height', 'core-extend'),
				'param_name' => 'max_height',
				'description' => esc_html__('Set optional maximum height in pixels.', 'core-extend')
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),			
			$add_css_animation,
			$add_css_animation_delay,		
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
	  'js_view' => 'MNKYContentBoxView'
	  
	) );

		
	// List item
	vc_map( array(
		'name' => esc_html__('List Item', 'core-extend'),
		'base' => 'mnky_list_item',
		'icon' => 'icon-mnky_list', 
		'is_container' => false,
		'description' => esc_html__('List with custom icon', 'core-extend'),
		'category' => esc_html__('Premium', 'core-extend'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Icon color', 'core-extend'),
				'param_name' => 'icon_color',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Size', 'core-extend' ),
				'param_name' => 'size',
				'value' => array(
					esc_html__('Small', 'core-extend' ) => 'li_small',
					esc_html__('Medium', 'core-extend' ) => 'li_medium',
					esc_html__('Large', 'core-extend' ) => 'li_large',
				),
			),	
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Text', 'core-extend'),
				'param_name' => 'content',
				'value' => esc_html__('I am a list item', 'core-extend'),
				'admin_label' => true,
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Last or only list item?', 'core-extend' ),
				'param_name' => 'last_item',
				'description' => 'Removes bottom margin for the list item.',
				'value' => array(esc_html__( 'Yes', 'core-extend' ) => 'last')
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)		
		),
		'js_view' => 'MNKYIconView'
	) );
	
	
	// Ordered List
	vc_map( array(
		'name' => esc_html__('Ordered List', 'core-extend'),
		'base' => 'mnky_ordered_list',
		'icon' => 'icon-mnky_ordered_list', 
		'is_container' => false,
		'description' => esc_html__('Styled ordered list item', 'core-extend'),
		'category' => esc_html__('Premium', 'core-extend'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Number', 'core-extend'),
				'param_name' => 'number',
				'value' => esc_html__('1', 'core-extend'),
				'admin_label' => true,
			),			
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Text', 'core-extend'),
				'param_name' => 'content',
				'value' => esc_html__('I am a list item', 'core-extend'),
				'admin_label' => true,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Size', 'core-extend' ),
				'param_name' => 'size',
				'value' => array(
					esc_html__('Small', 'core-extend' ) => 'ol_small',
					esc_html__('Medium', 'core-extend' ) => 'ol_medium',
					esc_html__('Large', 'core-extend' ) => 'ol_large',
				),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Number color', 'core-extend'),
				'param_name' => 'number_color',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Divider color', 'core-extend'),
				'param_name' => 'divider_color',
				'description' => esc_html__('Leave empty to use default color.', 'core-extend')
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Last or only list item?', 'core-extend' ),
				'param_name' => 'last_item',
				'description' => 'Removes bottom margin for the list item.',
				'value' => array(esc_html__( 'Yes', 'core-extend' ) => 'last')
			),	
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)		
		)
	) );


	// Service
	vc_map( array(
		'name' => esc_html__('Service', 'core-extend'),
		'base' => 'mnky_service',
		'icon' => 'icon-mnky_service',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Service info with custom icon', 'core-extend'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'core-extend' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'core-extend' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'core-extend' ) => 'openiconic',
					esc_html__( 'Typicons', 'core-extend' ) => 'typicons',
					esc_html__( 'Entypo', 'core-extend' ) => 'entypo',
					esc_html__( 'Linecons', 'core-extend' ) => 'linecons',
					esc_html__( 'Material', 'core-extend' ) => 'material'
				),
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'core-extend' ),
				'param_name' => 'icon_material',
				'settings' => array(
					'emptyIcon' => false, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'core-extend' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'core-extend'),
				'param_name' => 'title',
				'admin_label' => true,
				'value' => esc_html__('Your service title', 'core-extend')
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Service description', 'core-extend'),
				'param_name' => 'content',
				'value' => esc_html__('I am service box text. Click edit button to change this text.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Service box align', 'core-extend'),
				'param_name' => 'position',
				'value' => array(esc_html__('Left', 'core-extend') => '', esc_html__('Right', 'core-extend') => 'sb_right', esc_html__('Center', 'core-extend') => 'sb_center')
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Icon color', 'core-extend'),
				'param_name' => 'icon_color',
				'description' => esc_html__('Leave empty to use theme accent color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Title color', 'core-extend'),
				'param_name' => 'heading_color',
				'description' => esc_html__('Leave empty to use default heading color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Text color', 'core-extend'),
				'param_name' => 'text_color',
				'description' => esc_html__('Leave empty to use default text color.', 'core-extend')
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		 'js_view' => 'MNKYIconView'

	) );
	
	// Person Info
	vc_map( array(
		'name' => esc_html__('Person Info', 'core-extend'),
		'base' => 'mnky_person_info',
		'icon' => 'icon-mnky_person_info',
		'category' => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Person info box with image', 'core-extend'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Author image', 'core-extend'),
				'param_name' => 'img_url',
				'description' => esc_html__('Display size is 70x70px. If you have enabled SRCSET feature in theme options, consider using original image sized at least 140x140px.', 'core-extend')
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'core-extend'),
				'param_name' => 'title',
				'admin_label' => true,
				'value' => esc_html__('John Doe', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Subtitle', 'core-extend'),
				'param_name' => 'subtitle',
				'admin_label' => true,
				'value' => esc_html__('CEO', 'core-extend')
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Person description', 'core-extend'),
				'param_name' => 'description',
				'value' => esc_html__('I am text describing this person.', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Image align', 'core-extend'),
				'param_name' => 'position',
				'value' => array(esc_html__('Left', 'core-extend') => '', esc_html__('Right', 'core-extend') => 'pi_right', esc_html__('Center', 'core-extend') => 'pi_center')
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Title color', 'core-extend'),
				'param_name' => 'heading_color',
				'description' => esc_html__('Leave empty to use default heading color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Subtitle color', 'core-extend'),
				'param_name' => 'subheading_color',
				'description' => esc_html__('Leave empty to use default #999 grey color.', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Description color', 'core-extend'),
				'param_name' => 'description_color',
				'description' => esc_html__('Leave empty to use default body color.', 'core-extend')
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('URL (Link)', 'core-extend'),
				'param_name' => 'link',
			),
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		),
		 'js_view' => 'MNKYIconView'

	) );	
	
	
	// Counter
	vc_map( array(
		'name'		=> esc_html__('Counter', 'core-extend'),
		'base'		=> 'mnky_counter',
		'icon'		=> 'icon-mnky_counter',
		'category'  => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Animated numerical data', 'core-extend'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Value you want to begin at', 'core-extend'),
				'param_name' => 'from',
				'value' => '0'
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Value you want to arrive at', 'core-extend'),
				'param_name' => 'to',
				'value' => '2000',
				'admin_label' => true
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Duration in milliseconds', 'core-extend'),
				'param_name' => 'speed',
				'value' => '1000'
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Interval', 'core-extend'),
				'param_name' => 'interval',
				'value' => '10',
				'description' => esc_html__('How often the element should be updated', 'core-extend')
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Decimals', 'core-extend'),
				'param_name' => 'decimals',
				'value' => '0',
				'description' => esc_html__('The number of decimal places to show', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)

	) );

	
	// Countdown
	vc_map( array(
		'name'		=> esc_html__('Countdown', 'core-extend'),
		'base'		=> 'mnky_countdown',
		'icon'		=> 'icon-mnky_countdown',
		'category'  => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Count down to specific date', 'core-extend'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Date', 'core-extend'),
				'param_name' => 'date',
				'value' => '2018/04/16',
				'admin_label' => true,
				'description' => esc_html__('Enter date to counts down seconds, minutes, hours and days. e.g YYYY/MM/DD', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Digit font size', 'core-extend'),
				'param_name' => 'font',
				'value' => '100px',
				'description' => esc_html__('Choose digit font size in pixels, e.g., 80px', 'core-extend')
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Divider color', 'core-extend' ),
				'param_name' => 'border',
				'value' => '#cccccc'
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra class name', 'core-extend'),
				'param_name' => 'el_class',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend')
			)
		)

	) );
	
	
	// Pricing box
	vc_map( array(
	  'name'		=> esc_html__('Pricing', 'core-extend'),
	  'base'		=> 'mnky_pricing_box',
	  'icon'		=> 'icon-mnky_pricing_box',
	  'allowed_container_element' => false,
	  'is_container' => true,
	  'category'  => esc_html__('Premium', 'core-extend'),
	  'description' => esc_html__('Styled pricing boxes', 'core-extend'),
	  'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'core-extend' ),
				'param_name' => 'title',
				'holder' => 'h4',
				'description' => esc_html__( 'Give your plan a title.', 'core-extend' ),
				'value' => esc_html__( 'Starter Pack', 'core-extend' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Before price', 'core-extend' ),
				'param_name' => 'before_price',
				'holder' => 'span',
				'description' => esc_html__( 'For example, enter currency symbol or text, e.g., $ or USD.', 'core-extend' ),
				'value' => esc_html__( '$', 'core-extend' )
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Price', 'core-extend' ),
				'param_name' => 'price',
				'holder' => 'span',
				'description' => esc_html__( 'Set the price for this plan.', 'core-extend' ),
				'value' => esc_html__( '10', 'core-extend' )
			),						
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'After price', 'core-extend' ),
				'param_name' => 'after_price',
				'holder' => 'span',
				'description' => esc_html__( 'For example, choose time span for you plan, e.g., /mo, month or /yr.', 'core-extend' ),
				'value' => esc_html__( '/mo', 'core-extend' )
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Meta', 'core-extend' ),
				'param_name' => 'meta',
				'holder' => 'span',
				'description' => esc_html__( 'A short desciption or slogan for the plan.', 'core-extend' ),
				'value' => esc_html__( 'Great for small business', 'core-extend' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Call to action text', 'core-extend' ),
				'param_name' => 'cta',
				'holder' => 'div',
				'description' => esc_html__( 'A short call to action text, e.g., Subscribe now.', 'core-extend' )
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Add link to the whole box or call to action', 'core-extend' ),
				'param_name' => 'link',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Link position', 'core-extend' ),
				'param_name' => 'link_position',
				'value' => array(
					esc_html__('Whole box', 'core-extend' ) => '',
					esc_html__('Call to action', 'core-extend' ) => 'cta',
				)
			),	
			$add_css_animation,
			$add_css_animation_delay,
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'core-extend' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend' )
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background color', 'core-extend' ),
				'param_name' => 'bg_color',
				'value' => '#ffffff',
				'description' => esc_html__( 'Set background color for pricing box body.', 'core-extend' ),
				'group' => esc_html__('Design', 'core-extend')
			),					
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Text color', 'core-extend' ),
				'param_name' => 'color',
				'value' => '#0b3b5b',
				'description' => esc_html__( 'Set text color for pricing box content.', 'core-extend' ),
				'group' => esc_html__('Design', 'core-extend')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Border color (optional)', 'core-extend' ),
				'param_name' => 'border_color',
				'description' => esc_html__( 'Add border to whole box. Leave empty for no border.', 'core-extend' ),
				'group' => esc_html__('Design', 'core-extend')
			),	
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Call to action background color', 'core-extend' ),
				'param_name' => 'cta_bg',
				'value' => '#f6f7f8',
				'description' => esc_html__( 'Set background color for pricing call to action area.', 'core-extend' ),
				'group' => esc_html__('Design', 'core-extend')
			),					
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Call to action text color', 'core-extend' ),
				'param_name' => 'cta_color',
				'value' => '#0b3b5b',
				'description' => esc_html__( 'Set text color for pricing call to action area.', 'core-extend' ),
				'group' => esc_html__('Design', 'core-extend')
			),			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Add badge?', 'core-extend' ),
				'param_name' => 'add_badge',
				'group' => esc_html__('Badge', 'core-extend'),
				'description' => 'Adds a nice badge to your pricing box.',
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'on')
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Badge background color', 'core-extend' ),
				'param_name' => 'badge_bg',
				'group' => esc_html__('Badge', 'core-extend'),
				'description' => esc_html__( 'Set a background color for the badge.', 'core-extend' ),
				'dependency' => array('element' => 'add_badge', 'not_empty' => true)
			),			
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Badge text color', 'core-extend' ),
				'param_name' => 'badge_color',
				'group' => esc_html__('Badge', 'core-extend'),
				'value' => '#fff',
				'description' => esc_html__( 'Set a text color for the badge.', 'core-extend' ),
				'dependency' => array('element' => 'add_badge', 'not_empty' => true)
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Badge text', 'core-extend' ),
				'param_name' => 'badge_text',
				'value' => esc_html__( 'Best Offer', 'core-extend' ),
				'group' => esc_html__('Badge', 'core-extend'),
				'description' => esc_html__( 'What do you want your badge to say? , E.g., 50% Off or Save 30%.', 'core-extend' ),
				'dependency' => array('element' => 'add_badge', 'not_empty' => true)
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Hover effect', 'core-extend' ),
				'param_name' => 'hover_effect',
				'value' => array('None' => '', 'Emphasize' => 'box-effect-1', 'Add Shadow' => 'box-effect-2', 'Emphasize + Add Shadow' => 'box-effect-3'),
				'description' => esc_html__( 'Enable and choose a hover effect.', 'core-extend' ),
				'group' => esc_html__('Effect', 'core-extend')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Always active? (by default only on hover state)', 'core-extend' ),
				'param_name' => 'effect_active',
				'group' => esc_html__('Effect', 'core-extend'),
				'value' => array(esc_html__( 'Yes, please', 'core-extend' ) => 'box-effect-active'),
				'description' => esc_html__( 'Use this option, if you want to accentuate one of the boxes.', 'core-extend' ),
			)			
		),
		'js_view' => 'MNKYPricingView'
	) );	
	

	// Posts
	$author_list = array();
	$author_list['Select author...'] = 'all';
	$blogusers = get_users( array( 'fields' => array( 'display_name', 'ID' ) ) );
	foreach ( $blogusers as $user ) {
		$author_list[$user->display_name] = $user->ID;
	}
	
	$animation_group = array( 'group' => esc_html__('Layout', 'core-extend') );
	$add_css_animation_posts = array_merge($add_css_animation, $animation_group );
	$add_css_animation_delay_posts = array_merge($add_css_animation_delay, $animation_group );

	vc_map( array(
		'name'		=> esc_html__('Article Block', 'core-extend'),
		'base'		=> 'mnky_posts',
		'icon'		=> 'icon-mnky_posts',
		'class'		=> 'mnky-get-posts',
		'front_enqueue_css' => MNKY_PLUGIN_URL . 'assets/css/core-extend-frontend.css',
		'category'  => esc_html__('Premium', 'core-extend'),
		'description' => esc_html__('Display selected posts', 'core-extend'),
		'show_settings_on_create' => true,
		'params' => array(				
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Columns', 'core-extend' ),
				'param_name' => 'column_layout',
				'value' => array(
					esc_html__('One column', 'core-extend' ) => 'column-count-1',
					esc_html__('Two columns', 'core-extend' ) => 'column-count-2',
					esc_html__('Three columns', 'core-extend' ) => 'column-count-3',
					esc_html__('Four columns', 'core-extend' ) => 'column-count-4',
					esc_html__('Five columns', 'core-extend' ) => 'column-count-5',
					esc_html__('Six columns', 'core-extend' ) => 'column-count-6',
				),
				'group' => esc_html__('Layout', 'core-extend')
			),	
			array(
			  'type' => 'dropdown',
			  'heading' => esc_html__('Choose content type', 'core-extend'),
			  'param_name' => 'content_type',
			  'value' => array(esc_html__('No Content', 'core-extend')  => '', esc_html__('Excerpt', 'core-extend') => 'excerpt', esc_html__('Full Content', 'core-extend') => 'content_full'),
			  'group' => esc_html__('Layout', 'core-extend')
			),	
			array(
			  'type' => 'checkbox',
			  'heading' => esc_html__('Do not duplicate posts', 'core-extend'),
			  'param_name' => 'no_dublicate',
			  'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
			  'group' => esc_html__('Layout', 'core-extend'),
			  'description' => esc_html__( 'Do not include posts that are already shown before in other post section.', 'core-extend' ),
			  'admin_label' => true
			),				
			array(
			  'type' => 'checkbox',
			  'heading' => esc_html__('Allow to duplicate posts from this section', 'core-extend'),
			  'param_name' => 'allow_dublicate',
			  'value' => array(esc_html__('Yes, please!', 'core-extend') => 'yes'),
			  'group' => esc_html__('Layout', 'core-extend'),
			  'description' => esc_html__( 'Other post sections below will include posts from THIS section even if "Do not duplicate posts" will be active.', 'core-extend' ),
			  'admin_label' => true
			),
			array(
			  'type' => 'checkbox',
			  'heading' => esc_html__('Disable box shadow and background', 'core-extend'),
			  'param_name' => 'shadow_style',
			  'value' => array(esc_html__('Yes, please!', 'core-extend') => 'no-shadow'),
			  'group' => esc_html__('Layout', 'core-extend'),
			  'description' => esc_html__( 'Disables box shadow and white background for the post box.', 'core-extend' ),
			  'admin_label' => true
			),	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Posts per page', 'core-extend' ),
				'param_name' => 'posts_per_page',
				'value' => '4',
				'description' => esc_html__( 'Number of post to show per page (-1 to show all posts)', 'core-extend' ),
				'group' => esc_html__('Parameters', 'core-extend')
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Limit posts by time period', 'core-extend' ),
				'param_name' => 'time_limit',
				'value' => array(esc_html__('No Limit', 'core-extend')  => '', esc_html__('Today', 'core-extend') => 'today', esc_html__('This Week', 'core-extend') => 'week', esc_html__('This Month', 'core-extend') => 'month'),
				'group' => esc_html__('Parameters', 'core-extend')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order', 'core-extend' ),
				'param_name' => 'order',
				'value' => array(esc_html__('Descending', 'core-extend') => 'DESC', esc_html__('Ascending', 'core-extend') => 'ASC'),
				'group' => esc_html__('Parameters', 'core-extend')
			),			
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Order by', 'core-extend' ),
				'param_name' => 'orderby',
				'value' => array(esc_html__('By date', 'core-extend' ) => 'date', esc_html__('By post views', 'core-extend' ) => 'meta_value_num', esc_html__('By last modified date', 'core-extend' ) => 'modified', esc_html__('By number of comments', 'core-extend' ) => 'comment_count', esc_html__('Random order', 'core-extend' ) => 'rand', esc_html__('By title', 'core-extend' ) => 'title', esc_html__('By ID', 'core-extend' ) => 'ID', esc_html__('By author', 'core-extend' ) => 'author', esc_html__('By post slug', 'core-extend' ) => 'name', esc_html__('By post/page parent id', 'core-extend' ) => 'parent', esc_html__('No order', 'core-extend' ) => 'none' ),
				'group' => esc_html__('Parameters', 'core-extend')
			),
			array(
			  'type' => 'checkbox',
			  'heading' => esc_html__('Show pagination', 'core-extend'),
			  'param_name' => 'pagination',
			  'value' => array(esc_html__('Yes, please!', 'core-extend') => 'on'),
			  'group' => esc_html__('Parameters', 'core-extend')
			),				
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Offset', 'core-extend' ),
				'param_name' => 'offset',
				'value' => '',
				'description' => esc_html__( 'Number of post to displace or pass over. Does not work with pagination!', 'core-extend' ),
				'group' => esc_html__('Parameters', 'core-extend')
			),								
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Filter results', 'core-extend'),
				'param_name' => 'taxonomy',
				'group' => esc_html__('Filter', 'core-extend'),
				'holder' => 'div',
				'value' => array('All posts' => 'all_posts', 'By Category' => 'category', 'By Tags' => 'post_tag', 'By Author' => 'author'),
			),	
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Operator', 'core-extend'),
				'param_name' => 'tax_operator',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('IN' => 'IN', 'NOT IN' => 'NOT IN', 'AND' => 'AND'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category', 'post_tag')),
				'description' => sprintf (esc_html_x( 'IN = Posts must be %2$s at least in ONE %3$s of selected categories or tags %1$s NOT IN = Excludes posts that are in selected categories or tags %1$s AND = Post must be %2$s in ALL %3$s selected categories or tags', '%1$s stands for line break, %2$s and %3$s stand for <strong> tags.' ,'core-extend' ), '<br/>', '<strong>', '</strong>')
			),	
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Select author', 'core-extend' ),
				'param_name' => 'author',
				'value' => $author_list,
				'admin_label' => true,
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('author'))
			),			
			array(
				'type' => 'mnky_cat',
				'heading' => esc_html__( 'Categories', 'core-extend' ),
				'param_name' => 'category',
				'description' => '',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category'))
			),			
			array(
				'type' => 'mnky_tags',
				'heading' => esc_html__( 'Tags', 'core-extend' ),
				'param_name' => 'tag',
				'description' => '',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('post_tag'))
			),		
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Refine results', 'core-extend'),
				'param_name' => 'taxonomy_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('None' => 'none', 'By Categories' => 'category', 'By Tags' => 'post_tag'),
				'dependency' => array('element' => 'taxonomy', 'value' => array('category', 'post_tag'))
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Taxonomy relation', 'core-extend' ),
				'param_name' => 'tax_relation',
				'value' => array('OR' => 'OR', 'AND' => 'AND'),
				'description' => esc_html__( 'The logical relationship between each taxonomy.', 'core-extend' ),
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => Array('element' => 'taxonomy_2', 'value' => array('category', 'post_tag'))
			),		
			array(
				'type' => 'mnky_preview',
				'heading' => esc_html__('Operator 2', 'core-extend'),
				'param_name' => 'tax_operator_2',
				'group' => esc_html__('Filter', 'core-extend'),
				'value' => array('IN' => 'IN', 'NOT IN' => 'NOT IN', 'AND' => 'AND'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('category', 'post_tag'))
			),						
			array(
				'type' => 'mnky_cat',
				'heading' => esc_html__( 'Categories 2', 'core-extend' ),
				'param_name' => 'category_2',
				'description' => '',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('category'))
			),			
			array(
				'type' => 'mnky_tags',
				'heading' => esc_html__( 'Tags 2', 'core-extend' ),
				'param_name' => 'tag_2',
				'description' => '',
				'group' => esc_html__('Filter', 'core-extend'),
				'dependency' => array('element' => 'taxonomy_2', 'value' => array('post_tag'))
			),				
			array(
				'type' => 'mnky_info',
				'param_name' => 'image_enabled',
				'description' => esc_html__( 'Image will always be stretched to fit container, but you can use these options to control aspect ratio and image size. Note: If you have enabled SRCSET feature in Theme Options, it is recommended that your original image is at least 2x bigger than specified size.', 'core-extend' ),
				'group' => esc_html__('Image', 'core-extend')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image width', 'core-extend' ),
				'param_name' => 'width',
				'description' => '',
				'group' => esc_html__('Image', 'core-extend'),
				'description' => esc_html__( 'Specified size is converted to pixels, use plain numbers, e.g., "350"', 'core-extend' )
			),			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Image height', 'core-extend' ),
				'param_name' => 'height',
				'description' => '',
				'group' => esc_html__('Image', 'core-extend'),
				'description' => esc_html__( 'Specified size is converted to pixels, use plain numbers, e.g., "350"', 'core-extend' )
			),
			$add_css_animation_posts,
			$add_css_animation_delay_posts,
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'core-extend' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'core-extend' ),
				'group' => esc_html__('Layout', 'core-extend')
			)
		),
		'js_view' => 'MNKYPostView'

	) );
	
}