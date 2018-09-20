<?php
$output = '';
	
	extract(shortcode_atts(array(
		'img_url' => '',
		'width' => '',
		'height' => '',
		'link' => '',
		'effect' => '',
		'center_element' => '',
		'css_animation' => '',
		'css_animation_delay' => '',
		'el_class' => '',
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$effect = $this->getExtraClass($effect);
	$center_element = $this->getExtraClass($center_element);
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky_client_logo_wrapper'.$effect.$center_element.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	// Clean user input
	$width = preg_replace('/\D/', '', $width);
	$height = preg_replace('/\D/', '', $height);
	
	if($img_url != '' && ($width == '' || $height == '')) {
		$image_alt = get_post_meta($img_url, '_wp_attachment_image_alt', true);	
		$img_src = wp_get_attachment_image_src( $img_url, 'full');
		$img = '<img src="'. esc_url($img_src[0]) .'" alt="'. esc_attr($image_alt) .'" width="'.$img_src[1].'" height="'.$img_src[2].'" />';
	} elseif ($img_url != '' && $width != '' && $height != '') {
		$image_alt = get_post_meta($img_url, '_wp_attachment_image_alt', true);	
		$img_src = wp_get_attachment_image_src( $img_url, 'full');
		if( function_exists( 'ot_get_option' ) && ot_get_option('srcset_for_images') == 'on' ) {	
			$srcset = 'srcset="'. esc_url( aq_resize( $img_src[0], $width*2, $height*2, true, true, true ) ) .' '. esc_attr($width)*2 .'w, '. esc_url( aq_resize( $img_src[0], $width, $height, true, true, true ) ) .' '. esc_attr($width) .'w" sizes="(max-width:'.  esc_attr($width) .'px) 100vw, '.  esc_attr($width) .'px"';
		} else {
			$srcset = '';	
		}
		$img = '<img src="'. esc_url( aq_resize($img_src[0], $width, $height, true, true, true) ) .'" alt="'. esc_attr($image_alt) .'" '. $srcset .' width="'.esc_attr($width).'" height="'.esc_attr($height).'" />';
	} else {
		$img = '<img src="'. MNKY_PLUGIN_URL .'/assets/images/placeholder_image.png" width="900" height="600" />';
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
		$output .= '<a ' .$link_attributes. '><div class="'. esc_attr( trim( $css_class ) ) .'"><div class="client_image">'.$img.'</div></div></a>';
	} else {
		$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'"><div class="client_image">'.$img.'</div></div>';
	}

echo $output;
