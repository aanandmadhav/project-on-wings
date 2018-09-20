<?php
$output = '';

	extract(shortcode_atts(array(
		'flex_animation' => 'fade',
		'slide_speed' => '6',
		'bullets' => '',
		'arrows' => '',
		'el_class' => ''
	), $atts));
			
    wp_enqueue_style('flexslider');
    wp_enqueue_script('flexslider');

	$el_class = $this->getExtraClass($el_class);
	$bullets = $this->getExtraClass($bullets);	
	$arrows = $this->getExtraClass($arrows);
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky-content-slider'.$bullets.$arrows.$el_class, $this->settings['base']);
	
	$output .= '<div class="'. esc_attr( trim( $css_class ) ) .'"><div class="wpb_flexslider" data-interval="'. esc_attr( $slide_speed ) .'" data-flex_fx="'. esc_attr( $flex_animation ).'"><ul class="slides">';
		
	$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
	
	$output .= '</ul></div></div>';

echo $output;
