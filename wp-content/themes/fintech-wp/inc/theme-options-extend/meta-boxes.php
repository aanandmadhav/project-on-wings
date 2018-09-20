<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Custom meta boxes
*	--------------------------------------------------------------------- 
*/


add_action( 'admin_init', 'mnky_custom_meta_boxes' );

function mnky_custom_meta_boxes() {
	
	$mnky_meta_page = array(
		'id'          => 'mnky_page_options',
		'title'       => esc_html__( 'Page Options', 'fintech-wp' ),
		'desc'        => '',
		'pages'       => array( 'page'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'id'          => 'general_tab',
				'label'       => esc_html__( 'General', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'fintech-wp' ),
				'id'          => 'mnky_custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'label'       => esc_html__( 'Custom theme secondary accent color', 'fintech-wp' ),
				'id'          => 'mnky_custom_secondary_accent_color',
				'desc'        => esc_html__( 'Set different secondary accent color for this page. Leave blank for default color.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'id'          => 'mnky_custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'fintech-wp' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s 2. Full width layout %1$s 3. Boxed layout', '%1$s stands for line break' ,'fintech-wp' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
			),
			array(
				'id'          => 'mnky_custom_body_background',
				'label'       => esc_html__( 'Body background', 'fintech-wp' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'background',
				'condition'   => 'mnky_custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'mnky_custom_content_width',
				'label'       => esc_html__( 'Content width', 'fintech-wp' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website. Leave empty for default.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'text',
			),
			array(
				'id'          => 'header_tab',
				'label'       => esc_html__( 'Header', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'id'          => 'mnky_sticky_header',
				'label'       => esc_html__( 'Sticky header', 'fintech-wp' ),
				'desc'        => esc_html__( 'Do you want a header to stick to top while you scroll?', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'radio',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array( 
				  array(
					'value'       => '',
					'label'       => esc_html__( 'Default (set in Theme Options)', 'fintech-wp' ),
					'src'         => ''
				  ),				  
				  array(
					'value'       => 'sticky_header_smart',
					'label'       => esc_html__( 'Smart header (sticky only when scrolling up)', 'fintech-wp' ),
					'src'         => ''
				  ),
				  array(
					'value'       => 'sticky_header',
					'label'       => esc_html__( 'Always sticky header', 'fintech-wp' ),
					'src'         => ''
				  ),
				  array(
					'value'       => 'no_sticky',
					'label'       => esc_html__( 'Disable sticky header', 'fintech-wp' ),
					'src'         => ''
				  )
				)
			  ),
			array(
				'label'       => esc_html__( 'Top bar', 'fintech-wp' ),
				'id'          => 'mnky_top_bar',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Disable top bar on this page only. If top bar is not enabled in theme options, this setting has no effect.', 'fintech-wp' ),
				'std'         => 'on'
			),	
			array(
				'label'       => esc_html__( 'Overlay header', 'fintech-wp' ),
				'id'          => 'mnky_header_overlay',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enable overlay header on this page. Overlay header is configured in Theme Options/Header options/Overlay Header.', 'fintech-wp' ),
				'std'         => 'off'
			),			
			array(
				'label'       => esc_html__( 'Page title', 'fintech-wp' ),
				'id'          => 'mnky_page_title',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Display or hide page title.', 'fintech-wp' ),
				'std'         => 'on'
			),
			array(
				'id'          => 'precontent_tab',
				'label'       => esc_html__( 'Pre-content', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),			
			array(
				'label'       => esc_html__( 'Pre-content area', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'fintech-wp' ),
				'std'         => 'off'
			 ),
			array(
				'label'       => esc_html__( 'Height (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>250px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'fintech-wp' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>1200px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Paddings (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_paddings',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area paddings. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>40px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'mnky_pre_content_bg',
				'label'       => esc_html__( 'Background', 'fintech-wp' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'fintech-wp' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'fintech-wp' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			),
			array(
				'id'          => 'section_scroll_tab',
				'label'       => esc_html__( 'Section scroll', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'label'       => esc_html__( 'Enable section scroll', 'fintech-wp' ),
				'id'          => 'mnky_section_scroll',
				'desc'        => esc_html( 'Advance full section on each scroll. <br/><br/><strong>Important Notes:</strong><br/> 1. Works best with overlay header.<br/>2. Choose page template with no vertical paddings.<br/>3. Elements preceding first section should be disabled (turn off page title and pre-content area).', 'fintech-wp' ),
				'type'        => 'on-off',
				'std'         => 'off',
			),			
			array(
				'label'       => esc_html__( 'Animation', 'fintech-wp' ),
				'id'          => 'mnky_section_animation',
				'desc'        => '',
				'type'        => 'on-off',
				'std'         => 'on',
				'condition'   => 'mnky_section_scroll:is(on)',
			),
			array(
				'label'       => esc_html__( 'Show Pagination?', 'fintech-wp' ),
				'id'          => 'mnky_section_pagination',
				'desc'        => '',
				'type'        => 'on-off',
				'std'         => 'off',
				'condition'   => 'mnky_section_scroll:is(on)',
			),
			array(
				'label'       => esc_html__( 'Section pagination color', 'fintech-wp' ),
				'id'          => 'mnky_section_pagination_color',
				'desc'        => '',
				'std'         => '#fff',
				'type'        => 'colorpicker_opacity',
				'condition'   => 'mnky_section_scroll:is(on),mnky_section_pagination:is(on)',
			),

		)
	);
	
	$mnky_meta_post = array(
		'id'          => 'mnky_post_options',
		'title'       => esc_html__( 'Post Options', 'fintech-wp' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(
			array(
				'id'          => 'general_tab',
				'label'       => esc_html__( 'General', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'fintech-wp' ),
				'id'          => 'mnky_custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'label'       => esc_html__( 'Custom theme secondary accent color', 'fintech-wp' ),
				'id'          => 'mnky_custom_secondary_accent_color',
				'desc'        => esc_html__( 'Set different secondary accent color for this page. Leave blank for default color.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'id'          => 'mnky_custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'fintech-wp' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s Selected in Appearance / Theme Options / General Options %1$s%1$s 2. Full width layout %1$s3. Boxed layout', '%1$s stands for line break' ,'fintech-wp' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'general',
			),
			array(
				'id'          => 'mnky_custom_body_background',
				'label'       => esc_html__( 'Body background', 'fintech-wp' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'fintech-wp' ), 
				'std'         => '',
				'type'        => 'background',
				'section'     => 'general',
				'condition'   => 'mnky_custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'mnky_custom_content_width',
				'label'       => esc_html__( 'Content width', 'fintech-wp' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website. Leave empty for default.', 'fintech-wp' ), 
				'std'         => '',
				'type'        => 'text',
				'section'     => 'general',
			),
			array(
				'label'       => esc_html__( 'Top bar', 'fintech-wp' ),
				'id'          => 'mnky_top_bar',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Disable top bar on this page only. If top bar is not enabled in theme options, this setting has no effect.', 'fintech-wp' ),
				'std'         => 'on'
			),	
			array(
				'id'          => 'post_options_tab',
				'label'       => esc_html__( 'Post settings', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'id'          => 'mnky_post_lead_content',
				'label'       => esc_html__( 'Lead content', 'fintech-wp' ),
				'desc'        => esc_html__( 'Optional content displayed below the title. Shortcode enabled. It will not be included into post excerpt.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'textarea',
				'rows'        => '4'
			),		
			array(
				'label'       => esc_html__( 'Post title area', 'fintech-wp' ),
				'id'          => 'mnky_single_post_header',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enable default title area for this post.', 'fintech-wp' ),
				'std'         => 'on'
			), 
			array(
				'label'       => esc_html__( 'Featured image after title', 'fintech-wp' ),
				'id'          => 'mnky_content_featured_img',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Do you want to display featured image after title in content?', 'fintech-wp' ),
				'std'         => 'on'
			), 
			array(
				'id'          => 'mnky_custom_post_template',
				'label'       => esc_html__( 'Template', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'radio-image',
				'desc'        => '',
			),
			array(
				'id'          => 'mnky_custom_content_style',
				'label'       => esc_html__( 'Content style', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => sprintf (esc_html_x( '1. Standard one column %1$s 2. Divided with featured image on the left %1$s 3. Divided with featured image on the right', '%1$s stands for line break' ,'fintech-wp' ), '<br/>'),
				'choices'     => array( 
				  array(
					'value'       => '1',
					'label'       => esc_html__( 'Standard one column', 'fintech-wp' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '2',
					'label'       => esc_html__( 'Divided with featured image on the left', 'fintech-wp' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '3',
					'label'       => esc_html__( 'Divided with featured image on the right', 'fintech-wp' ),
					'src'         => ''
				  )  				  
				)
			),
						array(
				'label'       => esc_html__( 'Set different width for paragraphs', 'fintech-wp' ),
				'id'          => 'mnky_post_width',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Specify maximum width for text paragraphs without affecting other content , e.g., images.', 'fintech-wp' ),
			),
			array(
				'label'       => esc_html__( 'Post labels', 'fintech-wp' ),
				'id'          => 'mnky_post_labels',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Add some labels to the post, e.g., "Sponsored Content"', 'fintech-wp' ),
				'settings'    => array( 
				array(
					'id'          => 'mnky_post_label_text',
					'label'       => esc_html__( 'Label text', 'fintech-wp' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'mnky_post_label_color',
					'label'       => esc_html__( 'Choose label color', 'fintech-wp' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker_opacity',
					'operator'    => 'and'
				  )
				)

			),
			array(
				'id'          => 'precontent_tab',
				'label'       => esc_html__( 'Pre-content', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
			),
			array(
				'label'       => esc_html__( 'Pre-content area', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'fintech-wp' ),
				'std'         => 'off'
			),
			array(
				'label'       => esc_html__( 'Height (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>250px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'fintech-wp' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>1200px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Paddings (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_paddings',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area paddings. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>40px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'mnky_pre_content_bg',
				'label'       => esc_html__( 'Background', 'fintech-wp' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'fintech-wp' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'fintech-wp' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	
	);
	
	$mnky_meta_featured_image_caption = array(
		'id'          => 'mnky_featured_image_caption',
		'title'       => esc_html__( 'Featured image caption', 'fintech-wp' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'mnky_featured_image_caption_text',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Optional caption text for the featured image. Simple HTML allowed. *If featured image in content is disabled, will be displayed below header image, if present.', 'fintech-wp' )
			)
		)
	);
	
	$mnky_meta_custom_post_link= array(
		'id'          => 'mnky_custom_post_link',
		'title'       => esc_html__( 'Custom url for link post type', 'fintech-wp' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'mnky_custom_post_link_url',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Optional custom url for the link post type. Applied to title and featured image in blog view. Supports external links.', 'fintech-wp' )
			)
		)
	);
	
	$mnky_meta_post_reviews = array(
		'id'          => 'mnky_post_reviews',
		'title'       => esc_html__( 'Product Review', 'fintech-wp' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(		
			array(
			'label'       => esc_html__( 'Enable Reviews', 'fintech-wp' ),
			'id'          => 'mnky_enable_review',
			'type'        => 'on-off',
			'desc'        => esc_html__( 'Add review functionality to this post.', 'fintech-wp' ),
			'std'         => 'off'	
			),
			array(
				'label'       => esc_html__( 'Review position', 'fintech-wp'),
				'id'          => 'mnky_review_position',
				'type'        => 'select',
				'choices'     => array( 
					array(
						'value'       => 'top',
						'label'       => esc_html__( 'Top of the post', 'fintech-wp' ),
						'src'         => ''
					),
					array(
						'value'       => 'bottom',
						'label'       => esc_html__( 'Bottom of the post', 'fintech-wp' ),
						'src'         => ''
					)
				),	
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Choose where review will appear', 'fintech-wp' )
			),
			array(
				'label'       => esc_html__( 'Review title', 'fintech-wp'),
				'id'          => 'mnky_review_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Name this review', 'fintech-wp' )
			),
			array(
				'label'       => esc_html__( 'Overall rating', 'fintech-wp'),
				'id'          => 'mnky_review_overall_rating',
				'type'        => 'numeric-slider',
				'std'         => '5',
				'min_max_step'=> '0,10,0.1',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Give overall rating from 0 to 10 to this product.', 'fintech-wp' )
			),
			array(
				'label'       => esc_html__( 'Use review breakdown', 'fintech-wp' ),
				'id'          => 'mnky_review_breakdown',
				'type'        => 'on-off',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'If this option is active, overall review rating will be calculated from the ratings in the list.', 'fintech-wp' ),
				'std'         => 'off'
			), 	
			array(
				'label'       => esc_html__( 'Review ratings breakdown', 'fintech-wp' ),
				'id'          => 'mnky_review_ratings',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Rate product from various aspects, e.g., "Design, Features, Performance"', 'fintech-wp' ),
				'condition'   => 'mnky_enable_review:is(on),mnky_review_breakdown:is(on)',
				'class'       => 'child-options child-first child-last',	
				'settings'    => array( 
				array(
					'id'          => 'mnky_review_aspect_name',
					'label'       => esc_html__( 'Name', 'fintech-wp' ),
					'std'         => '',
					'type'        => 'text',
					'desc'        => esc_html__( 'Name this review aspect,  e.g., "Design"', 'fintech-wp' ),
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'mnky_review_aspect_rating',
					'label'       => esc_html__( 'Rating', 'fintech-wp' ),
					'desc'        => '',
					'type'        => 'numeric-slider',
					'std'         => '5',
					'min_max_step'=> '0,10,0.1',
					'operator'    => 'and'
				  )
				)
			),
			array(
				'label'       => esc_html__( 'Good things', 'fintech-wp' ),
				'id'          => 'mnky_review_good_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing good things in this product, e.g, "The Good"', 'fintech-wp' )
			),
			array(
				'label'       => '',
				'id'          => 'mnky_review_good',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was good in this product', 'fintech-wp' )
			),
			array(
				'label'       => esc_html__( 'Bad things', 'fintech-wp' ),
				'id'          => 'mnky_review_bad_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing bad things in this product, e.g, "The Bad"', 'fintech-wp' )
			),
			array(
				'label'       => '',
				'id'          => 'mnky_review_bad',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was bad in this product', 'fintech-wp' )
			),
			array(
				'label'       => esc_html__( 'Bottom line', 'fintech-wp' ),
				'id'          => 'mnky_review_bottomline_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing the bottom line of this product, e.g, "The Bottom Line"', 'fintech-wp' )
			),
			array(
				'label'       => '',
				'id'          => 'mnky_review_bottomline',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'So what is the bottom line for this product?', 'fintech-wp' )
			),
			array(
				'label'       => esc_html__( 'Custom content', 'fintech-wp' ),
				'id'          => 'mnky_review_custom_field',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'mnky_enable_review:is(on)',
				'desc'        => esc_html__( 'Add any custom content here, shortcodes are allowed', 'fintech-wp' )
			)
		)
	);
	
	$mnky_meta_ads = array(
		'id'          => 'mnky_ads_options',
		'title'       => esc_html__( 'Ad Options', 'fintech-wp' ),
		'desc'        => '',
		'pages'       => array( 'ads' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(			
			array(
				'label'       => esc_html__( 'URL', 'fintech-wp' ),
				'id'          => 'mnky_ad_url',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Include %1$s %2$s or %3$s', '%1$s, %2$s, %3$s stand for protocol types.' ,'fintech-wp' ), '<code>http://</code>', '<code>https://</code>', '<code>//</code>')
			),
			array(
				'id'          => 'mnky_ad_url_target',
				'label'       => esc_html__( 'Target', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => esc_html__( 'The target attribute specifies how to open the link.', 'fintech-wp' ),
				'choices'     => array( 
					array(
						'value'       => '_blank',
						'label'       => esc_html__( '_blank (opens in new window or tab)', 'fintech-wp' ),
						'src'         => ''
					),
					array(
						'value'       => '_self',
						'label'       => esc_html__( '_self (opens in the same frame as it was clicked)', 'fintech-wp' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'mnky_ad_url:not()'
			),			
			array(
				'id'          => 'mnky_ad_url_rel',
				'label'       => esc_html__( 'Use rel="nofollow"', 'fintech-wp' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => sprintf( wp_kses_post( _x( 'Specifies the relationship between the current document and the linked document. %1$s <a href="%2$s">Should I use it?</a>', '%1$s stands for line break, %2$s stands for linked page.','fintech-wp' ) ), '<br/>', esc_url( 'https://support.google.com/webmasters/answer/96569?hl=en' ) ),
				'choices'     => array( 
					array(
						'value'       => '',
						'label'       => esc_html__( 'No', 'fintech-wp' ),
						'src'         => ''
					),
					array(
						'value'       => 'rel=nofollow',
						'label'       => esc_html__( 'Yes', 'fintech-wp' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'mnky_ad_url:not()'
			),
			array(
				'label'       => esc_html__( 'Alternative text', 'fintech-wp' ),
				'id'          => 'mnky_ad_alt_text',
				'type'        => 'text',
				'desc'        => esc_html__( 'Add text for alt attribute.', 'fintech-wp' )
			),	
			array(
				'label'       => esc_html__( 'Advertisement block width', 'fintech-wp' ),
				'id'          => 'mnky_ad_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block width, e.g. %s', '%s stands for example value, do not delete it.' ,'fintech-wp' ), '<code>140px</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement block height (optional)', 'fintech-wp' ),
				'id'          => 'mnky_ad_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block height, e.g. %1$s %2$s Will cut off ad block, if value smaller than actual ad size used.', '%1$s stands for example value, %2$s stands for line break.' ,'fintech-wp' ), '<code>440px</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block position (optional)', 'fintech-wp' ),
				'id'          => 'mnky_ad_position',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block position using css margin: property. %1$s For example %2$s will center the ad inside.', '%1$s stands for line break, %2$s stands for example value.' ,'fintech-wp' ), '<br/>', '<code>0 auto</code>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block float (optional)', 'fintech-wp' ),
				'id'          => 'mnky_ad_float',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block float using css float: property. %1$s For example %2$s will float ad to the left side.', '%1$s stands for line break, %2$s stands for example value.' ,'fintech-wp' ), '<br/>', '<code>left</code>')
			),
			array(
				'id'          => 'mnky_ad_image',
				'label'       => esc_html__( 'Advertisement Image', 'fintech-wp' ),
				'desc'        => esc_html__( 'Choose advertisement image.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'upload'
			),
			array(
				'label'       => esc_html__( 'Advertisement image width', 'fintech-wp' ),
				'id'          => 'mnky_ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value, do not delete it.' ,'fintech-wp' ), '<code>140</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement image height', 'fintech-wp' ),
				'id'          => 'mnky_ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'fintech-wp' ), '<code>400</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image', 'fintech-wp' ),
				'id'          => 'mnky_responsive_ad',
				'type'        => 'on-off',
				'desc'        => esc_html__('Use different image for smaller screens', 'fintech-wp' ),
				'std'         => 'off'
			), 
			array(
				'label'       => esc_html__( 'Advertisement Image', 'fintech-wp' ),
				'id'          => 'mnky_responsive_ad_image',
				'std'         => '',
				'type'        => 'upload',
				'desc'        => esc_html__( 'Choose advertisement image for screens below 979px (Tablet portrait) and below 1024px (Tablet landscape), if placed in header widget area.', 'fintech-wp' ),
				'condition'   => 'mnky_responsive_ad:is(on)',
				'class'       => 'child-options child-first'				
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image width', 'fintech-wp' ),
				'id'          => 'mnky_responsive_ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value. Do not delete it.', 'fintech-wp' ), '<code>140</code>'),
				'condition'   => 'mnky_responsive_ad:is(on)',
				'class'       => 'child-options'				
			),			
			array(
				'label'       => esc_html__( 'Responsive advertisement image height', 'fintech-wp' ),
				'id'          => 'mnky_responsive_ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'fintech-wp' ), '<code>400</code>', '<br/>'),
				'condition'   => 'mnky_responsive_ad:is(on)',
				'class'       => 'child-options child-last'				
			),
			array(
				'label'       => esc_html__( 'Hide ad on mobiles', 'fintech-wp' ),
				'id'          => 'mnky_hide_responsive_ad',
				'type'        => 'on-off',
				'desc'        =>  esc_html__( 'Hide advertisement on screens smaller than 767px (Mobile phones).', 'fintech-wp' ),
				'std'         => 'off'
			), 
			array(
				'label'       => esc_html__( 'Label', 'fintech-wp' ),
				'id'          => 'mnky_ad_note',
				'type'        => 'text',
				'desc'        => esc_html__( 'Optional label under advertisement, e.g. "Sponsored" or "Advertisement".', 'fintech-wp' )
			),	
			array(
				'label'       => '',
				'id'          => 'mnky_ads_textblock',
				'type'        => 'textblock',
				'desc'        => '<div class="section-title">'. esc_html__( 'If you use Custom HTML, you can leave fields above empty.', 'fintech-wp' ) .'</div>'
			),			
			array(
				'label'       => esc_html__( 'Custom HTML', 'fintech-wp' ),
				'id'          => 'mnky_ad_html',
				'type'        => 'textarea',
				'rows'        => '14',
				'desc'        => esc_html__( 'Insert any custom code.', 'fintech-wp' )
			)
		)
	);
	
	$mnky_meta_product = array(
		'id'          => 'mnky_product_options',
		'title'       => esc_html__( 'Page Options', 'fintech-wp' ),
		'desc'        => '',
		'pages'       => 'product',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'fintech-wp' ),
				'id'          => 'mnky_custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			 ),
			 array(
				'label'       => esc_html__( 'Custom theme secondary accent color', 'fintech-wp' ),
				'id'          => 'mnky_custom_secondary_accent_color',
				'desc'        => esc_html__( 'Set different secondary accent color for this page. Leave blank for default color.', 'fintech-wp' ),
				'std'         => '',
				'type'        => 'colorpicker_opacity',
			),
			array(
				'label'       => esc_html__( 'Pre-content area', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content', 'fintech-wp' ),
				'std'         => 'off'
			 ),
			array(
				'label'       => esc_html__( 'Height (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>250px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'fintech-wp' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>1200px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Paddings (optional)', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_paddings',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area paddings. Example: %s', '%s stands for example value. Do not delete it.' ,'fintech-wp' ), '<code>40px</code>'),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'mnky_pre_content_bg',
				'label'       => esc_html__( 'Background', 'fintech-wp' ),
				'desc'        => 'Set custom background color or image',
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'fintech-wp' ),
				'id'          => 'mnky_pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed', 'fintech-wp' ),
				'condition'   => 'mnky_pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	);	
	
	
  
	if ( function_exists( 'ot_register_meta_box' ) ) {
		ot_register_meta_box( $mnky_meta_page );
		ot_register_meta_box( $mnky_meta_post );
		ot_register_meta_box( $mnky_meta_product );
		ot_register_meta_box( $mnky_meta_ads );
		ot_register_meta_box( $mnky_meta_featured_image_caption );
		ot_register_meta_box( $mnky_meta_custom_post_link );
		ot_register_meta_box( $mnky_meta_post_reviews );
	}
}