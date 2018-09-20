<?php
$output = $color = $icon = $target = $link = $el_class = $title = $a_href = $a_title = $a_target = $a_rel = '';
	
	$accent_color = '#db0a5b';
	
	if ( function_exists( 'ot_get_option' ) ) {
	  $accent_color = ot_get_option('accent_color');
	}
	
	extract(shortcode_atts(array(
		'bg_color' => $accent_color,
		'bg_hover_color' => 'flat-black',
		'color' => '#fff',
		'center_element' => '',
		'button_style' => '',
		'link' => '',
		'icon_type' => '',
		'icon_fontawesome' => '',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_entypoicons' => '',
		'icon_linecons' => '',
		'icon_entypo' => '',
		'icon_material' => '',
		'el_class' => '',
		'title' => __('Text on the button', 'core-extend'),
		'css_animation' => '',
		'css_animation_delay' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$bg_hover_color = $this->getExtraClass($bg_hover_color);
	$center_element = $this->getExtraClass($center_element);
	$button_style = $this->getExtraClass($button_style);
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky_button'.$button_style.$bg_hover_color.$center_element.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';

	vc_icon_element_fonts_enqueue( $icon_type );
	
	($icon_type != '') ? $icon = '<i class="'. esc_attr( trim( ${"icon_" . $icon_type} ) ) .'"></i>' : $icon = ''; 
	
	if( function_exists( 'mnky_ColorDarken' ) ) {
		$border_color = mnky_ColorDarken($bg_color);
	}

	//parse link
	$link = ( '||' === $link ) ? '' : $link;
	$link = vc_build_link( $link );
	$use_link = false;
	if ( strlen( $link['url'] ) > 0 ) {
		$use_link = true;
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = $link['target'];
		$a_rel = $link['rel'];
	}
	
	$link_attributes = array();
	
	if ( $use_link ) {
	$link_attributes[] = 'href="' .  esc_url( trim( $a_href ) ) . '"';
	$link_attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$link_attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$link_attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
	}
	
	$link_attributes = implode( ' ', $link_attributes );
	
	$output .= '<span>'. $icon . esc_html($title) .'</span>';
	if( $use_link ){
			$output = '<div class="'. esc_attr( trim( $css_class ) ) .'"><a style="background-color:'. esc_attr( $bg_color ) .'; border-color:'. esc_attr( $border_color ) .'; color:'. esc_attr( $color ) .';" ' .$link_attributes. '>' . $output . '</a></div>';
	} else {
			$output = '<div class="'. esc_attr( trim( $css_class ) ) .'"><a style="background-color:'. esc_attr( $bg_color ) .'; border-color:'. esc_attr( $border_color ) .'; color:'. esc_attr( $color ) .';">' . $output . '</a></div>';
	}

echo $output . $this->endBlockComment('button') . "\n";