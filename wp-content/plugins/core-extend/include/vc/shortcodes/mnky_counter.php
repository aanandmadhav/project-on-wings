<?php
$output = '';

	extract(shortcode_atts(array(
		'el_class' => '',
		'from' => '0',
		'to' => '2000',
		'speed' => '1000',
		'interval' => '10',
		'decimals' => '0'
	), $atts));
	
	wp_enqueue_script( 'waypoints' );
	wp_enqueue_script( 'CountTo', MNKY_PLUGIN_URL . 'assets/js/countTo.js', array('jquery'));
	
	$el_class = $this->getExtraClass($el_class);
	
	$output .= '<div class="mnky_counter_wrapper '. esc_attr( trim($el_class ) ) .'"><span class="count_data" data-count-from="'. esc_attr( $from ) .'" data-count-to="'. esc_attr( $to ) .'" data-count-speed="'.esc_attr( $speed ).'" data-count-interval="'. esc_attr( $interval) .'" data-count-decimals="'. esc_attr( $decimals ) .'">'. esc_html( $from ) .'</span></div>';

echo $output;
