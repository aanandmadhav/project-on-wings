<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


class WPBakeryShortCode_Mnky_Testimonial_Slider extends WPBakeryShortCode {
	protected $controls_css_settings = 'out-tc vc_controls-content-widget';
	protected $controls_list = array( 'add', 'edit', 'clone', 'delete' );
	
	public function __construct( $settings ) {
		parent::__construct( $settings );
	}


	public function contentAdmin( $atts, $content = NULL ) {
		$width = $custom_markup = '';
		$shortcode_attributes = array( 'width' => '1/1' );
		foreach ( $this->settings['params'] as $param ) {
			if ( $param['param_name'] != 'content' ) {
				if ( isset( $param['value'] ) && is_string( $param['value'] ) ) {
					$shortcode_attributes[$param['param_name']] = __( $param['value'], 'core-extend' );
				} elseif ( isset( $param['value'] ) ) {
					$shortcode_attributes[$param['param_name']] = $param['value'];
				}
			} else if ( $param['param_name'] == 'content' && $content == NULL ) {
				$content = __( $param['value'], 'core-extend' );
			}
		}
		extract( shortcode_atts(
			$shortcode_attributes
			, $atts ) );

		$output = '';

		$elem = $this->getElementHolder( $width );

		$inner = '';
		foreach ( $this->settings['params'] as $param ) {
			$param_value = '';
			$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
			if ( is_array( $param_value ) ) {
				// Get first element from the array
				reset( $param_value );
				$first_key = key( $param_value );
				$param_value = $param_value[$first_key];
			}
			$inner .= $this->singleParamHtmlHolder( $param, $param_value );
		}
		//$elem = str_ireplace('%wpb_element_content%', $iner, $elem);
		$tmp = '';
		// $template = '<div class="wpb_template">'.do_shortcode('[vc_accordion_tab title="New Section"][/vc_accordion_tab]').'</div>';

		if ( isset( $this->settings["custom_markup"] ) && $this->settings["custom_markup"] != '' ) {
			if ( $content != '' ) {
				$custom_markup = str_ireplace( "%content%", $tmp . $content, $this->settings["custom_markup"] );
			} else if ( $content == '' && isset( $this->settings["default_content_in_template"] ) && $this->settings["default_content_in_template"] != '' ) {
				$custom_markup = str_ireplace( "%content%", $this->settings["default_content_in_template"], $this->settings["custom_markup"] );
			} else {
				$custom_markup = str_ireplace( "%content%", '', $this->settings["custom_markup"] );
			}
			//$output .= do_shortcode($this->settings["custom_markup"]);
			$inner .= do_shortcode( $custom_markup );
		}
		$elem = str_ireplace( '%wpb_element_content%', $inner, $elem );
		$output = $elem;

		return $output;
	}
}

class WPBakeryShortCode_Mnky_Testimonial extends WPBakeryShortCode {	
	protected $controls_css_settings = 'tc vc_control-container';
	protected $controls_list = array('edit', 'clone', 'delete');

	public function outputTitle($title) {
        return '';
    }
	
	public function customAdminBlockParams() {
		return '';
	}
}