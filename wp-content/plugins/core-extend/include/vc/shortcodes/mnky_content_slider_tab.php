<?php
$output = '';

	extract(shortcode_atts(array(
		'el_class' => ''
	), $atts));
			
	$el_class = $this->getExtraClass($el_class);
	
	$output .= '<li class="section-wrapper'. esc_attr( $el_class ) .'" style="display:none;"><div class="section-inner">';	
	$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
	$output .= '</div></li>';

echo $output;