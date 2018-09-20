<?php
$output = $background = $border = $color = $padding = $keep_paddings = $max_width = $max_height = $static_shadow = $custom_static_shadow = $border_radius = $hover_effect = $el_class = '';

	extract(shortcode_atts(array(
		'background' => '',
		'border' => '',
		'color' => '',
		'padding' => '',
		'keep_paddings' => '',
		'max_width' => '',
		'max_height' => '',
		'static_shadow' => '',
		'custom_static_shadow' => '',
		'border_radius' => '',
		'hover_effect' => '',
		'link' => '',
		'css_animation' => '',
		'css_animation_delay' => '',
		'el_class' => ''
	), $atts));

	$el_class = $this->getExtraClass($el_class);
	$hover_effect = $this->getExtraClass($hover_effect);
	$static_shadow = $this->getExtraClass($static_shadow);
	$keep_paddings = $this->getExtraClass($keep_paddings);
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky-content-box'.$static_shadow.$hover_effect.$keep_paddings.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	// Clean user input
	$max_width = preg_replace('/\D/', '', $max_width);
	$max_height = preg_replace('/\D/', '', $max_height);
	$border_radius = preg_replace('/\D/', '', $border_radius);
	
	$inline_styles = array();
	
	if ( ! empty( $background ) ) {
		$inline_styles [] = 'background: '.$background.';';
	}
	if ( ! empty( $border ) ) {
		$inline_styles [] = 'border: 1px solid '.$border.';';
	}
	if ( ! empty( $color ) ) {
		$inline_styles [] = 'color: '.$color.';';
	}
	if ( ! empty( $padding ) ) {
		$inline_styles [] = 'padding: '.$padding.';';
	}
	if ( ! empty( $custom_static_shadow ) ) {
		$inline_styles [] = 'box-shadow: '.$custom_static_shadow.';';
	}
	if ( ! empty( $border_radius) ) {
		$inline_styles [] = 'border-radius: '.$border_radius.'px;';
	}
	if ( ! empty( $max_width ) ) {
		$inline_styles [] = 'max-width: '.$max_width.'px;';
	}
	if ( ! empty( $max_height ) ) {
		$inline_styles [] = 'max-height: '.$max_height.'px;';
	}
		
	$inline_styles = implode( ' ', $inline_styles );
	
	if ( ! empty( $inline_styles ) ) {
	$inline_styles = 'style="'. esc_attr( $inline_styles ) .'"';
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
	
	if ( $use_link ) {
		$output .= '<a ' .$link_attributes. '><div class="'. esc_attr( trim( $css_class ) ) .'" '.$inline_styles.'>';
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		$output .= '</div></a>';
	} else {
		$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'" '.$inline_styles.'>';
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		$output .= '</div>';
	}

echo $output;
