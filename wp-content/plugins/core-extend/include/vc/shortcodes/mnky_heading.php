<?php
$output = $cat_links = '';

	extract(shortcode_atts(array(
		'el_class' => '',
		'title' => 'This is title',
		'heading_tag' => 'h1',
		'font_size' => '30px',
		'color' => '',
		'line_color' => '',
		'align' => '',
		'link' => '',
		'css_animation' => '',
		'css_animation_delay' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$align = $this->getExtraClass($align);
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky_heading_wrapper'.$align.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	// Clean user input
	$font_size = preg_replace('/\D/', '', $font_size);
	
	$inline_styles = array();
	
	if ( ! empty( $font_size ) ) {
		$inline_styles [] = 'font-size: '.$font_size.'px;';
	}
	if ( ! empty( $color ) ) {
		$inline_styles [] = 'color: '.$color.';';
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
	$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'"><a ' .$link_attributes. '><'. esc_html ($heading_tag) .' '. $inline_styles .'>'. esc_html ($title) .'</'. esc_html ($heading_tag) .'></a><div class="heading-line"><span style="background-color:'.esc_attr($line_color).'"></span></div></div>';
	} else {
	$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'"><'. esc_html ($heading_tag) .' '. $inline_styles .'>'. esc_html ($title) .'</'. esc_html ($heading_tag) .'><div class="heading-line"><span style="background-color:'.esc_attr($line_color).'"></span></div></div>';
	}

echo $output;