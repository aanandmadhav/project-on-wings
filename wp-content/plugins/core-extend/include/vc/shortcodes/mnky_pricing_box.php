<?php
$output = $el_class = $title = $before_price = $price = $after_price  = $meta = $add_badge = $bg_color = $badge_bg = $badge_color = $badge_text = $color = $css_animation = $css_animation_delay = $meta = $link = $a_href = $a_title = $a_target = $a_rel = '';
	
	$accent_color = '#e74c3c';
	
	if ( function_exists( 'ot_get_option' ) ) {
	  $text_color = ot_get_option('body_text_color');
	}
	
	$accent_color = '#14b8c0';
	
	if ( function_exists( 'ot_get_option' ) ) {
	  $accent_color = ot_get_option('accent_color');
	}

	
		extract(shortcode_atts(array(
			'el_class' => '',
			'title' => 'Starter Pack',
			'before_price' => '$',
			'price' => '10',
			'after_price' => '/mo',
			'meta' => 'Great for small business',
			'cta' => '',
			'add_badge' => 'off',
			'bg_color' => '#ffffff',
			'color' => '#0b3b5b',
			'cta_bg' => '#f6f7f8',
			'cta_color' => '#0b3b5b',
			'badge_text' => 'Best Offer',
			'badge_bg' => '#dd3333',
			'badge_color' => '#ffffff',
			'border_color' => '',
			'hover_effect' => '',
			'effect_active' => '',
			'link' => '',
			'link_position' => '',
			'css_animation' => '',
			'css_animation_delay' => ''
		), $atts));
		
		$el_class = $this->getExtraClass($el_class);
		$hover_effect = $this->getExtraClass($hover_effect);
		$effect_active = $this->getExtraClass($effect_active);
		
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'pricing-box'.$hover_effect.$effect_active.$el_class, $this->settings['base']);
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
		$link_attributes[] = 'href="' . trim( $a_href ) . '"';
		$link_attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
		if ( ! empty( $a_target ) ) {
			$link_attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
		}
		if ( ! empty( $a_rel ) ) {
			$link_attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
		}
		}
		
		$link_attributes = implode( ' ', $link_attributes );
			
		$title = '<span class="plan-title">'. esc_html( $title ) .'</span>';
		$before_price = '<span class="plan-before-price">'. esc_html( $before_price ) .'</span>';
		$price = '<span class="plan-price">'. esc_html( $price ) .'</span>';
		$after_price = '<span class="plan-after-price">'. esc_html( $after_price ).'</span>';
		($meta != '') ? $meta = '<span class="plan-meta">'. esc_html( $meta ).'</span>' : $meta = '';
		($border_color != '') ? $border_color = ' border:1px solid '. esc_attr( $border_color ) .';' : $border_color = '';
		
		$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'" >';
			$output .= '<div class="pricing-box-inner" style="background-color:'. esc_attr( $bg_color ) .'; color:'. esc_attr( $color ) .';'.$border_color.'">';
			
				if($add_badge == 'on') {
					$output .= '<div class="plan-badge" style="background-color:'. esc_attr( $badge_bg ) .'; color:'. esc_attr( $badge_color ) .';"><span>'. esc_html( $badge_text ) .'</span></div>';
				}
			
				$output .= '<div class="plan-header">';
					$output .= $title;
					$output .= '<span class="plan-divider" style="background-color:'. esc_attr( $color ) .';"></span>';
					$output .= '<div class="plan-pricing">'. $before_price . $price . $after_price . $meta . '</div>';
				$output .= '</div>';

				
				$output .= '<div class="plan-features">';
					$output .= wpb_js_remove_wpautop($content);
				$output .= '</div>'; //.plan-features
				
				if ( $use_link && $link_position == 'cta' && $cta != '') {
					$output .= '<a class="plan-cta-link" ' .$link_attributes. '><div class="plan-cta" style="background-color:'. esc_attr( $cta_bg ) .'; color:'. esc_attr( $cta_color ) .'">';
						$output .= esc_html($cta);
					$output .= '</div></a>'; //.plan-call-to-action
				} elseif ( $cta != '') {
					$output .= '<div class="plan-cta" style="background-color:'. esc_attr( $cta_bg ) .'; color:'. esc_attr( $cta_color ) .'">';
						$output .= esc_html($cta);
					$output .= '</div>'; //.plan-call-to-action
				}
					
			$output .= '</div>'; //.pricing-box-container
		$output .= '</div>'; //.pricing-box
		
		if ( $use_link && $link_position != 'cta' ) {
			$output = '<a ' .$link_attributes. '>' . $output . '</a>';
		}


echo $output;