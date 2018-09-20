<?php
$output = $text_color= $img = $name = $author_dec = '';

	extract(shortcode_atts(array(
		'img_url' => '',
		'name' => 'John Doe',
		'author_dec' => 'Designer',
		'text_color' => '',
		'el_class' => ''
	), $atts));
			
	$el_class = $this->getExtraClass($el_class);
	($text_color != '') ? $text_color = 'style="color:'. esc_attr( $text_color ) .'"' : '';
	
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
	
	if($name != '') {
		$name = '<div class="testimonial-author" '. $text_color .'>'. esc_html( $name );
		if($author_dec != '') { $name .= '<span class="testimonial-separator"></span><span class="testimonial-author-desc">'. esc_html( $author_dec ) .'</span>'; }
		$name .= '</div>';	
	}
	
	$output .= '<li class="testimonial-wrapper'. esc_attr( $el_class ) .'" style="display:none;">';	
	$output .= '<div class="testimonial-content" '. $text_color .'><span>'.wpb_js_remove_wpautop($content).'</span></div>';
	$output .= $img;
	$output .= $name;	
	$output .= '</li>';

echo $output;