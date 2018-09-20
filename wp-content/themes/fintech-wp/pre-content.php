<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: before content area
*	--------------------------------------------------------------------- 
*/
?>

<?php 	
$content_width = ot_get_option('content_width', '1200');
	
// If custom content width or layout
if( is_page() || is_single() ){
	if( get_post_meta( get_the_ID(), 'mnky_custom_content_width', true) ){
		$content_width = get_post_meta( get_the_ID(), 'mnky_custom_content_width', true);
	}			
}
		
if ( is_page() ) :  // Page  ?>
	
	<?php if ( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' ) : ?>
	
		<?php
		$style = '';
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_height', true ) ) {
			$style .= 'height:'. esc_attr(get_post_meta( get_the_ID(), 'mnky_pre_content_height', true )) .';';
		}
		
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) { 
			$style .='max-width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) .';'; 
		} else {
			$style .= 'max-width:'. esc_attr($content_width) .'px;';
		} 
		?>


		<div class="pre-content">	
				<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post (get_post_meta( get_the_ID(), 'mnky_pre_content_html', true ) ) ); ?></div>		
		</div><!-- .pre-content -->
		
	<?php endif; ?>
	
<?php elseif ( is_single() ) :  // Single post ?>

	<?php if( get_post_meta( get_the_ID(), 'mnky_pre_content_activation', true ) == 'on' ) :
		$style = '';		
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_height', true ) ) {
			$style .= 'height:'. esc_attr(get_post_meta( get_the_ID(), 'mnky_pre_content_height', true )) .';'; 
		}
			
		if ( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) { 
			$style .='max-width:'. esc_attr( get_post_meta( get_the_ID(), 'mnky_pre_content_width', true ) ) .''; 
		} else {
			$style .= 'max-width:'. esc_attr($content_width) .'px';
		}
		?>

		<div class="pre-content">		
				<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post( get_post_meta( get_the_ID(), 'mnky_pre_content_html', true ) ) ); ?></div>
		</div>
		
	<?php endif; ?>
	
<?php elseif ( is_category() ) : // If is category 
	
	$category_styles = ot_get_option( 'category_styles', array() );
	if( ! empty( $category_styles ) ) :
		foreach( $category_styles as $category_style ) :
			if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ) :
			
				if ( $category_style['cat_pre_content_area'] == 'on' ) : ?>
				
					<?php
					$style = '';
					if ( $category_style['cat_pre_content_height'] != '' ) {
						$style .= 'height:'. esc_attr($category_style['cat_pre_content_height']) .';';
					}
					
					if ( $category_style['cat_pre_content_width'] != '' ) { 
						$style .='max-width:'. esc_attr($category_style['cat_pre_content_height']) .';'; 
					} else {
						$style .= 'max-width:'. esc_attr($content_width) .'px;';
					} 
					?>
					
					<div class="pre-content">						
							<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post( $category_style['cat_pre_content_html'] ) ); ?></div>							
					</div><!-- .pre-content -->
				<?php 
				endif;
			endif;
		endforeach;
	endif;
	
elseif ( is_home() ) : // If is blog ?>
	
	<?php if ( ot_get_option('blog_pre_content_area') == 'on' ) : ?>
	
		<?php
		$style = '';
		if ( ot_get_option('blog_pre_content_height') != '' ) {
			$style .= 'height:'. esc_attr(ot_get_option('blog_pre_content_height')) .';';
		}
					
		if ( ot_get_option('blog_pre_content_width') != '' ) { 
			$style .='max-width:'. esc_attr(ot_get_option('blog_pre_content_width')) .';'; 
		} else {
			$style .= 'max-width:'. esc_attr($content_width) .'px;';
		} 
		?>	
		
		<div class="pre-content">
				<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post ( ot_get_option('blog_pre_content_html') ) ); ?></div>
		</div><!-- .pre-content -->
	<?php endif; ?>
					
<?php elseif ( class_exists( 'Woocommerce' ) && is_woocommerce() ) : // If is WooComerce product page ?>	

	<?php if( ot_get_option('woo_custom_header') != '' ) : ?>
	
			<?php
			$style = 'max-width:'. esc_attr($content_width) .'px;';
			?>	
		
		<div class="pre-content">
			<div class="pre-content-html" style="<?php echo esc_attr($style); ?>"><?php echo do_shortcode( wp_kses_post ( ot_get_option('woo_custom_header') ) ); ?></div>
		</div><!-- .pre-content -->
	<?php endif; ?>	
	
<?php endif; ?>
