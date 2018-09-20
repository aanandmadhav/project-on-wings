<?php
$output = '';
	
	$accent_color = '#e74c3c';
	
	if ( function_exists( 'ot_get_option' ) ) {
	  $accent_color = ot_get_option('accent_color');
	}
	
	extract(shortcode_atts(array(
		'el_class' => '',
		'img_url' => '',
		'name' => 'John Doe',
		'position' => 'Designer',
		'link' => '',
		'icon_type' => '',
		'icon_fontawesome' => '',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_entypoicons' => '',
		'icon_linecons' => '',
		'icon_entypo' => '',
		'icon_material' => '',
		'css_animation' => '',
		'css_animation_delay' => ''
	), $atts));
	
	$el_class = $this->getExtraClass($el_class);
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky_team_wrapper'.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	($icon_type != '') ? $icon = '<i class="'. esc_attr( trim( ${"icon_" . $icon_type} ) ) .'"></i>' : $icon = ''; 
	vc_icon_element_fonts_enqueue( $icon_type );
	
	if($img_url != '') {
		$image_alt = get_post_meta($img_url, '_wp_attachment_image_alt', true);	
		$img_src = wp_get_attachment_image_src( $img_url, 'full');
		if( function_exists( 'ot_get_option' ) && ot_get_option('srcset_for_images') == 'on' ) {	
			if ($img_src[1] < 1080) {
				$large_size = $img_src[1];
			} else {
				$large_size = 1080;
			}		
			$srcset = 'srcset="'. esc_url( aq_resize( $img_src[0], $large_size, $large_size, true, true, true ) ) .' '.$large_size.'w, '. esc_url( aq_resize( $img_src[0], 540, 540, true, true, true ) ) .' 540w, '. esc_url( aq_resize( $img_src[0], 270, 270, true, true, true ) ) .' 270w" sizes="(max-width:540px) 100vw, 540px"';
		} else {
			$srcset = '';	
		}
		$img = '<img itemprop="image" src="'. esc_url( aq_resize($img_src[0], 540, 540, true, true, true) ) .'" alt="'. esc_attr($image_alt) .'" '. $srcset .' width="540" height="540" />';
	} else {
		$img = '';
		$img_src = null;
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
		$output .= '<a ' .$link_attributes. '><div itemscope itemtype="http://schema.org/Person" class="'. esc_attr( trim( $css_class ) ) .'"><div class="team_image">'.$img.'</div><div class="team_content_container"><div itemprop="jobTitle" class="team_member_position">'. esc_html( $position ) .'</div><h4 itemprop="name" class="team_member_name">'. esc_html( $name ) .'</h4>';
		$output .= '' . $icon . '</div></div></a>';
	} else {
		$output .= '<div itemscope itemtype="http://schema.org/Person" class="'. esc_attr( trim( $css_class ) ) .'"><div class="team_image">'.$img.'</div><div class="team_content_container"><div itemprop="jobTitle" class="team_member_position">'. esc_html( $position ) .'</div><h4 itemprop="name" class="team_member_name">'. esc_html( $name ) .'</h4>';
		$output .= '' . $icon . '</div></div>';
	}

echo $output;
