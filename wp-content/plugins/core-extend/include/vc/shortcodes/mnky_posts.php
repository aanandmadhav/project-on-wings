<?php
$output = $meta_date = $meta_author = $image_src = $image_alt = $image = $date = $publisher = '';

	extract( shortcode_atts( array(
		'post_type' => 'post',
		'offset' => 0,
		'posts_per_page' => '4',
		'order' => 'DESC',
		'orderby' => 'date',
		'author' => '',
		'category' => '',
		'tag' => '',
		'category_2' => '',
		'tag_2' => '',
		'taxonomy' => '',
		'tax_term' => '',
		'tax_operator' => 'IN',
		'tax_2' => '',
		'taxonomy_2' => '',
		'tax_term_2' => '',
		'tax_operator_2' => 'IN',
		'tax_relation' => 'OR',
		'time_limit' => '',
		'width' => 600,
		'height' => 400,
		'el_class' => '',
		'css_class' => '',
		'css_animation' => '',
		'css_animation_delay' => '',
		'column_layout' => 'column-count-1',
		'shadow_style' => '',
		'no_dublicate' => '',
		'allow_dublicate' => '',
		'content_type' => '',
		'pagination' => ''
	), $atts ) );
	
	$el_class = $this->getExtraClass($el_class);
	$column_layout = $this->getExtraClass($column_layout);
	$shadow_style = $this->getExtraClass($shadow_style);
	
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'mnky-posts clearfix'.$column_layout.$shadow_style.$el_class, $this->settings['base']);
	$css_class .= $this->getCSSAnimation($css_animation);
	($css_animation != '' && $css_animation_delay != '') ? $css_class .= $this->getExtraClass($css_animation_delay) : '';
	
	// Clean user input
	$width = preg_replace('/\D/', '', $width);
	$height = preg_replace('/\D/', '', $height);
		

	// Set up initial query for post
	$args = array(
		'post_type' => explode( ',', $post_type ),
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderby,
	);
	
	// Store shown post IDs
	$mp_do_not_duplicate = array();
	global $mp_do_not_duplicate;
	
	// Offset
	if( $offset != 0 && $offset != '') {
		$args['offset'] = $offset;
	}	
	
	// Pagination
	if( $pagination == 'on' ) {
		//Protect against arbitrary paged values
		if ( get_query_var('paged') ) { 
			$paged = get_query_var('paged'); 
		} else if ( get_query_var('page') ) {
			$paged = get_query_var('page'); 
		} else { 
			$paged = 1; 
		}
		$args['paged'] = $paged;
	}	
	
	// If do not dublicate
	if( $no_dublicate == 'yes' ) {
		$args['post__not_in'] = $mp_do_not_duplicate;
	}
	
	// If order by views
	if( $orderby == 'meta_value_num' ) {
		$args['meta_key'] = 'mnky_post_views_count';
	}	
	
	// If author selected
	if( $taxonomy == 'author' ) {
		if( $author != 'all' ) {
			$args['author__in'] = $author;
		}
	}	
	
	// If time limit
	if( $time_limit != '' ) {
		$date_args = array();
		
		if( $time_limit == 'today' ) {
			$today = getdate();
			$date_args = array(
				'date_query' => array(
					array(
						'year'  => $today['year'],
						'month' => $today['mon'],
						'day'   => $today['mday'],
					),
				)
			);
		} elseif( $time_limit == 'week' ) {
			$date_args = array(
				'date_query' => array(
					array(
						'year' => date( 'Y' ),
						'week' => date( 'W' ),
					)
				)
			);
		} elseif( $time_limit == 'month' ) {
			$date_args = array(
				'date_query' => array(
					array(
						'year' => date( 'Y' ),
						'month' => date( 'n' ),
					)
				)
			);
		}
		$args = array_merge( $args, $date_args );
	}
	
	// If taxonomy attributes, create a taxonomy query
	if ( ( $taxonomy != 'all_posts' &&  $taxonomy != 'author' ) && ( ! empty( $category ) || ! empty( $tag ) ) ) {
		
		// Term string to array
		if($taxonomy == 'category') {
			$tax_term = explode( ', ', $category );
		} else {
			$tax_term = explode( ', ', $tag );
		}
	
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $tax_term,
					'operator' => $tax_operator
				)
			)
		);
		
		if( $taxonomy_2 != 'none' && ( ! empty( $category_2 ) || ! empty( $tag_2 ) ) ) {
			// Term string to array
			if($taxonomy_2 == 'category') {
				$tax_term_2 = explode( ', ', $category_2 );
			} else {
				$tax_term_2 = explode( ', ', $tag_2 );
			}
			
			$tax_args['tax_query']['relation'] = $tax_relation;
			$tax_2 = array(
				'taxonomy' => $taxonomy_2,
				'field' => 'slug',
				'terms' => $tax_term_2,
				'operator' => $tax_operator_2
			);
			array_push($tax_args['tax_query'], $tax_2);
		}
		
		$args = array_merge( $args, $tax_args );
	}
	
	
	$query = new WP_Query( $args );
	
	if ( ! $query -> have_posts() )
		return false;
	
	$count = 0;
	while ( $query -> have_posts() ): $query -> the_post(); 
		$count++;
		
		if( $allow_dublicate != 'yes' ) {
			$mp_do_not_duplicate[] = get_the_ID();
		}
		
		$title = '<h2 itemprop="headline" class="mp-title"><a itemprop="mainEntityOfPage" href="'. esc_url(get_the_permalink()) .'" title="'. sprintf( esc_attr__( 'View %s', 'core-extend' ), the_title_attribute( 'echo=0' ) ) .'" rel="bookmark">'. esc_html(get_the_title()) .'</a></h2>';
		
		if( has_post_thumbnail() ){
			$image_src = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );
			$meta_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);	
			if( function_exists( 'ot_get_option' ) && ot_get_option('srcset_for_images') == 'on' ) {			
				$srcset = 'srcset="'. esc_url( aq_resize( $image_src, $width*2, $height*2, true, true, true ) ) .' '. esc_attr($width)*2 .'w, '. esc_url( aq_resize( $image_src, $width, $height, true, true, true ) ) .' '. esc_attr($width) .'w, '. esc_url( aq_resize( $image_src, $width/2, $height/2, true, true, true ) ) .' '. esc_attr($width)/2 .'w" sizes="(max-width:1200px) 100vw, 1200px"';
				} else {
				$srcset = '';	
				}
		} elseif( function_exists( 'ot_get_option' ) && ot_get_option('default_post_image') ) {
			$image_src = wp_get_attachment_image_url( ot_get_option('default_post_image'), 'full' );  
			$meta_image = wp_get_attachment_image_src( ot_get_option('default_post_image'), 'full' );
			$image_alt = get_post_meta(ot_get_option('default_post_image'), '_wp_attachment_image_alt', true);
			$srcset = '';
		} else {
			$image_src = '';
			$meta_image = null;
			$srcset = '';
		}	
				
		if( $image_src != '' ){
			$image = '<a href="'. esc_url(get_the_permalink()) .'" class="mp-image" rel="bookmark"><div itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><img src="'. esc_url(aq_resize( $image_src, $width, $height, true, true, true )) .'" '.$srcset.' alt="'. esc_attr($image_alt) .'" height="'. esc_attr($height) .'" width="'. esc_attr($width) .'"/><meta itemprop="url" content="'. esc_url($meta_image[0]) .'"><meta itemprop="width" content="'. esc_attr($meta_image[1]) .'"><meta itemprop="height" content="'. esc_attr($meta_image[2]) .'"></div></a>';			
		} else {
			$image_alt = $image = '';
		}
			
		$meta_author = '<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="'. esc_html(get_the_author()) .'"></div>';
			
		if ( function_exists( 'mnky_post_time' ) ) {
			$date = '<span class="mp-date"><time datetime="'. esc_attr(get_the_date( 'c' )) .'" itemprop="datePublished">'. esc_html(mnky_post_time()) .'</time><time class="meta-date-modified" datetime="'. esc_attr(get_the_modified_date( 'c' )) .'" itemprop="dateModified">'. esc_attr(get_the_modified_date()) .'</time></span>';
		} else {
			$date =  esc_html(get_the_date());
		}	
				
		$post_format = ' post-format-'.get_post_format();
			if ( false === get_post_format() ) {
				$post_format = '';
		}	
						
		if(function_exists( 'ot_get_option' )){
			$publisher = '<div class="hidden-meta" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div class="hidden-meta" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="'. esc_attr(ot_get_option('logo')) .'">
			<meta itemprop="width" content="'. esc_attr(str_replace( "px", "", ot_get_option('retina_logo_width') )) .'">
			<meta itemprop="height" content="'. esc_attr(str_replace( "px", "", ot_get_option('retina_logo_height') )) .'">
			</div>
			<meta itemprop="name" content="'. esc_attr(get_bloginfo('name')) .'">
			</div>';
		} else {
			$publisher = '';
		}	
		
		if( $content_type == 'excerpt' ){	
			$excerpt = '<div itemprop="articleBody" class="mp-excerpt">'. wpautop(esc_html(get_the_excerpt())) .'</div>';
		} elseif ( $content_type == 'content_full' ) {			
			$excerpt = '<div itemprop="articleBody" class="mp-full-content">'. do_shortcode(wpautop( get_the_content())) .'</div>';
		} else {
			$excerpt = '';
		}
		
		
		$output .= '<div itemscope itemtype="http://schema.org/Article" class="mp-container mp-post-'. esc_attr($count) . esc_attr($post_format) .'"><div class="mp-inner-container">'. $image . '<div class="mp-content-container">'. $title . $date . $excerpt . $meta_date . $meta_author . $publisher .'</div></div></div>';			
	
	endwhile; 
	
	if( $pagination == 'on' ) {
		$output .= '<div class="navigation pagination">';
		$big = 999999999; // need an unlikely integer

		$output .= paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '/page/%#%',
			'current' => max( 1, $paged ),
			'end_size' => 3,
			'mid_size' => 3,
			'prev_text' => __( 'Previous', 'core-extend' ),
			'next_text' => __( 'Next', 'core-extend' ),
			'total' => $query->max_num_pages
		) );
		$output .= '</div>';
	}

	wp_reset_postdata();

	$output = '<div class="'.esc_attr( trim( $css_class ) ).'" >'. $output .'</div>';

echo $output;