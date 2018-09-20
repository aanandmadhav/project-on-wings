<?php
$output = $heading_style = $subheading_style = $description_style = $link = $a_href = $a_title = $a_target = $a_rel = '';
			
	extract(shortcode_atts(array(
		'el_class' => '',
		'img_url' => '',
		'title' => 'John Doe',
		'subtitle' => 'CEO',
		'description' => 'I am text describing this person.',
		'heading_color' => '',
		'subheading_color' => '',
		'description_color' => '',
		'link' => '',
		'position' => '',
		'css_animation' => '',
		'css_animation_delay' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$position = $this->getExtraClass($position);
	($heading_color != '') ? $heading_style = 'style="color:' . esc_attr( $heading_color ) . ';"' : '';
	($subheading_color != '') ? $subheading_style = 'style="color:' . esc_attr( $subheading_color ) . ';"' : '';
	($description_color != '') ? $description_style = 'style="color:' . esc_attr( $description_color) . ';"' : '';
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'person-image', $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	if($img_url != '') {
		$image_alt = get_post_meta($img_url, '_wp_attachment_image_alt', true);	
		$img_src = wp_get_attachment_image_src( $img_url, 'full');
		$img_src = $img_src[0];
		if( function_exists( 'ot_get_option' ) && ot_get_option('srcset_for_images') == 'on' ) {			
			$srcset = 'srcset="'. esc_url( aq_resize( $img_src, 140, 140, true, true, true ) ) .' 140w, '. esc_url( aq_resize( $img_src, 70, 70, true, true, true ) ) .' 70w" sizes="(max-width:70px) 100vw, 70px"';
		} else {
			$srcset = '';	
		}
		$img = '<div class="testimonial-img"><img src="'. esc_url( aq_resize($img_src, 70, 70, true) ) .'" alt="'. esc_attr($image_alt) .'"  '. $srcset .' width="70" height="70" /></div>';
	} else {
		$img_src = null;
		$img = '';
		$srcset = '';
		$image_alt = '';
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
	$link_attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
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
		$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'">' . $img . '</div>';
		$output .= '<div class="person-title"><h5 '. $heading_style .'>'. esc_html( $title ) .'</h5><span '. $subheading_style .'>'. esc_html( $subtitle ) .'</span></div>';
		$output .= '<div class="person-description" '. $description_style .'>' .wpb_js_remove_wpautop($description) .'</div>';

		$output = '<div class="clearfix mnky_person-info'. esc_attr( $el_class ) . esc_attr( $position ) .'"><a ' .$link_attributes. '>' . $output . '</a></div>';
	} else {
		$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'">' . $img . '</div>';
		$output .= '<div class="person-title"><h5 '. $heading_style .'>'. esc_html( $title ) .'</h5><span '. $subheading_style .'>'. esc_html( $subtitle ) .'</span></div>';
		$output .= '<div class="person-description" '. $description_style .'>' .wpb_js_remove_wpautop($description) .'</div>';

		$output = '<div class="clearfix mnky_person-info'. esc_attr( $el_class ) . esc_attr( $position ) .'">' . $output . '</div>';

	}

	
echo $output;
