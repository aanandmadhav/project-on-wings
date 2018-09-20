<?php
$output = $number = $size = $el_class = $link = $a_href = $a_title = $a_target = $a_rel = $last_item = $el_class = '';

	$accent_color = '#db0a5b';
	
	if ( function_exists( 'ot_get_option' ) ) {
	  $accent_color = ot_get_option('accent_color');
	}
	
	extract(shortcode_atts(array(
		'number' => '1',
		'size' => 'ol_small',
		'link' => '',
		'number_color' => $accent_color,
		'divider_color' => '',
		'last_item' => '',
		'css_animation' => '',
		'css_animation_delay' => '',
		'el_class' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$size = $this->getExtraClass($size);
	$last_item = $this->getExtraClass($last_item);
	($number_color != '') ? $number_color = 'style="color:'. esc_attr( $number_color ) .'"' : '';
	($divider_color != '') ? $divider_color = 'style="background-color:'. esc_attr( $divider_color ) .'"' : '';
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'clearfix mnky_ordered-list-item'.$size.$last_item.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
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
		$output = '<div class="'. esc_attr( trim( $css_class ) ) .'"><span class="ordered-list-number" '. $number_color .'>'. esc_html( $number ) .'<span class="ordered-list-divider" '. $divider_color .'></span></span><a ' .$link_attributes. '><span class="ordered-list-content">'.wpb_js_remove_wpautop($content).'</span></a></div>';
	} else {
		$output = '<div class="'. esc_attr( trim( $css_class ) ) .'"><span class="ordered-list-number" '. $number_color .'>'. esc_html( $number ) .'<span class="ordered-list-divider" '. $divider_color .'></span></span><span class="ordered-list-content">'.wpb_js_remove_wpautop($content).'</span></div>';
	}
	
echo $output;
