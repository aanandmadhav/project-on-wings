<?php
/**
 * The template for displaying posts in blog page
 *
 */
?>
	<?php 
		
		$post_style = ot_get_option('archive_post_style');
		$content_type = ot_get_option('content_type', 'full_content');
		$article_class = 'archive-style-'. $post_style;
		$article_class .= ' '. ot_get_option('archive_post_layout', 'layout-one-column');
		$article_share = mnky_article_share();
		
		if( is_category() ){
			$category_styles = ot_get_option( 'category_styles', array() );
			if( ! empty( $category_styles ) ) {
				foreach( $category_styles as $category_style ) {
					if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
						if( $category_style['cat_post_style'] != 'default' ) {
							$post_style = $category_style['cat_post_style'];
							$article_class = 'archive-style-'. $category_style['cat_post_style'];
							$article_class .= ' '. $category_style['cat_post_layout'];
						}
						if( $category_style['cat_social_share'] != 'off' ) {
							$article_share = mnky_article_share();
						} else {
							$article_share = '';
						}
						if( $category_style['cat_content_type'] != 'default' ) {
							$content_type = $category_style['cat_content_type'];
						}
					}
				}
			}
		}

		if( is_search() ){
			$content_type = 'excerpt';
		}	
		
		if( ot_get_option( 'post_review_rating' ) != 'off' && get_post_meta( get_the_ID(), 'mnky_enable_review', true ) == 'on' ){	
				if ( get_post_meta( get_the_ID(), 'mnky_review_breakdown', true ) == 'off' ) {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_review_overall_rating', true ) * 10 ) .'%"></span></div></div>';
				} else {
					$rating = '<div class="mp-rating-wrapper"><div class="mp-rating-stars"><span style="width:'. esc_attr(mnky_review_sum() * 10 ).'%"></span></div></div>';
				}
		} else {
			$rating = '';
		}
	?>
	
	<article itemtype="http://schema.org/Article" itemscope="" id="post-<?php the_ID(); ?>" <?php post_class('archive-layout clearfix '. esc_attr($article_class) ); ?> >
	
	<?php
	$img_url = $thumbnail = $thumbnail_bg = $image_alt = $post_link = $post_link_target = '';
	
	if( has_post_thumbnail() ){
		$img_url = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );
		$meta_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
	} elseif( ot_get_option('default_post_image') ) {
		$img_url = wp_get_attachment_url( ot_get_option('default_post_image'), 'full' );		
		$meta_image = wp_get_attachment_image_src( ot_get_option('default_post_image'), 'full' );
		$image_alt = get_post_meta(ot_get_option('default_post_image'), '_wp_attachment_image_alt', true);
	} else {
		$meta_image = null;
	}
	
	if ( has_post_format( 'link' ) && get_post_meta( get_the_ID(), 'mnky_custom_post_link_url', true) != ''){
	$post_link = get_post_meta( get_the_ID(), 'mnky_custom_post_link_url', true);
	$post_link_target = '_blank';
	} else {
	$post_link = get_the_permalink();
	$post_link_target = '_self';
	}
	
	if( $img_url != '' ){
		if( function_exists('aq_resize' ) ){
			if( ot_get_option('srcset_for_images') == 'on' ) {
				if ($meta_image[1] < 1200) {
					$large_size_width = $meta_image[1];
					$large_size_height = round($meta_image[1] / 3 * 2);
				} else {
					$large_size_width = 1200;
					$large_size_height = 800;
				}
				if ($meta_image[1] < 840) {
					$thumbnail_image_width = $meta_image[1];
					$thumbnail_image_height = round($meta_image[1] / 3 * 2);
				} else {
					$thumbnail_image_width = 840;
					$thumbnail_image_height = 560;
				}
				$srcset = 'srcset="'. esc_url( aq_resize( $img_url, $large_size_width, $large_size_height, true, true, true ) ) .' '.$large_size_width.'w, '. esc_url( aq_resize( $img_url, 840, 560, true, true, true ) ) .' 840w, '. esc_url( aq_resize( $img_url, 420, 280, true, true, true ) ) .' 420w" sizes="(max-width:1200px) 100vw, 1200px"';
				} else {
				$srcset = '';	
				$thumbnail_image_width = 840;
				$thumbnail_image_height = 560;
			}
			$thumbnail = '<a class="post-preview" href="'. esc_url($post_link) .'" target="'. esc_attr($post_link_target). '" rel="bookmark"><div itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><img alt="'. esc_attr($image_alt) .'" src="'. esc_url( aq_resize( $img_url, 840, 560, true, true, true ) ) .'" '.$srcset.' width="840" height="560"><meta itemprop="url" content="'. esc_url($meta_image[0]) .'"><meta itemprop="width" content="'. esc_attr($meta_image[1]) .'"><meta itemprop="height" content="'. esc_attr($meta_image[2]) .'"></div></a>';
			$thumbnail_bg = esc_url( aq_resize( $img_url, $thumbnail_image_width, $thumbnail_image_height, true, true, true ) );			
		} else { 
			$thumbnail = '<a class="post-preview" href="'. esc_url($post_link) .'" target="'. esc_attr($post_link_target). '" rel="bookmark">'. get_the_post_thumbnail( null, 'large') .'</a>';
			$thumbnail_bg =	$img_url;
		}
	}
	?>
		
			
		<?php if( $post_style == '2' ) : // Style 2 - Image overlay style ?>	
						
			<div class="post-content-bg" style="background-image:url('<?php echo $thumbnail_bg; ?>');">
				<a class="archive-style-2-bg-url" href="<?php echo esc_url(get_permalink()); ?>"></a>
				<a href="<?php echo esc_url(get_permalink()); ?>" class="format-icon"></a>
				<div class="post-content-wrapper">
					<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
						<div class="entry-category"><?php the_category( ', ' ); ?></div>
					<?php endif; ?>
					
					<header class="post-entry-header">
						<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php echo esc_url($post_link) ?>" target="<?php echo esc_attr($post_link_target) ?>" title="<?php printf( esc_attr__( 'View %s', 'fintech-wp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</header><!-- .entry-header -->

					<?php mnky_blog_meta(); ?>
					
					<?php echo $rating; ?>
					
					<?php if ( $content_type == 'full_content' && strlen(get_the_content()) > 0) :
					echo '<div itemprop="articleBody" class="entry-content">';
						$more_link_text = esc_html__('Read more','fintech-wp');
						the_content($more_link_text);
					echo '</div><!-- .entry-content -->';	
					elseif ( $content_type == 'excerpt' && strlen(get_the_excerpt()) > 0) :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
					
					<?php echo $article_share; ?>
					
				</div><!-- .post-content-wrapper -->
			</div><!-- .post-content-bg -->
			
		<?php else : // Style 1 - Default style ?>	
			
			<?php if( ot_get_option('post_image_blog') != 'off') : ?>
			<?php echo $thumbnail; ?>
			<?php endif; ?>
			
			<?php if ( ot_get_option('post_category_blog') != 'off' ) : ?>
				<div class="entry-category"><?php the_category( ', ' ); ?></div>
			<?php endif; ?>
			<header class="post-entry-header">
				<h2 itemprop="headline" class="entry-title"><a itemprop="mainEntityOfPage" href="<?php echo esc_url($post_link) ?>" target="<?php echo esc_attr($post_link_target) ?>" title="<?php printf( esc_attr__( 'View %s', 'fintech-wp' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header><!-- .entry-header -->
			
			<?php mnky_blog_meta(); ?>
			
			<?php echo $rating; ?>

					<?php if ( $content_type == 'full_content' && strlen(get_the_content()) > 0 ) :
					echo '<div itemprop="articleBody" class="entry-content">';
						$more_link_text = esc_html__('Read more','fintech-wp');
						the_content($more_link_text);
					echo '</div><!-- .entry-content -->';	
					elseif ( $content_type == 'excerpt' && strlen(get_the_excerpt()) > 0) :
					echo '<div itemprop="articleBody" class="entry-summary">';
						the_excerpt();
					echo '</div><!-- .entry-summary -->';	
					else :
						// No content
					endif; ?>
			
			<?php echo $article_share; ?>

		<?php endif; ?>	

		<?php if( ot_get_option('post_date_blog') == 'off') : ?>
		<time datetime="<?php echo esc_attr(get_the_date( 'c' )) ?>" itemprop="datePublished"></time><time datetime="<?php echo esc_attr(get_the_modified_date( 'c' )) ?>" itemprop="dateModified"></time>
		<?php endif; ?>
		
		<?php if( ot_get_option('post_image_blog') == 'off' && $img_url != '' || ot_get_option('archive_post_style') == '2' && $img_url != '') : ?>
		<div class="hidden-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><meta itemprop="url" content="<?php echo esc_url($meta_image[0]); ?>"><meta itemprop="width" content="<?php echo esc_attr($meta_image[1]); ?>"><meta itemprop="height" content="<?php echo esc_attr($meta_image[2]); ?>"></div>	
		<?php endif; ?>
		
		<?php if( ot_get_option('post_author_blog') == 'off') : ?>
		<div class="hidden-meta" itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="<?php echo esc_html(get_the_author()) ?>"></div>
		<?php endif; ?>
		
		<div class="hidden-meta" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div class="hidden-meta" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="<?php echo esc_attr(ot_get_option('logo')) ?>">
			<meta itemprop="width" content="<?php echo esc_attr(str_replace( "px", "", ot_get_option('retina_logo_width') )) ?>">
			<meta itemprop="height" content="<?php echo esc_attr(str_replace( "px", "", ot_get_option('retina_logo_height') )) ?>">
			</div>
			<meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')) ?>">
		</div>	
	</article><!-- #post-<?php the_ID(); ?> -->