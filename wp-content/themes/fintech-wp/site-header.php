<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: site header
*	--------------------------------------------------------------------- 
*/
?>	


<?php 
	$header_style = ot_get_option('header_style', 'default');
	$search_button = ot_get_option('search_button', 'on');
	$cart_widget = ot_get_option('cart_widget', 'on');
	$header_class = $header_style;
	$menu_class = '';
	
	if( ot_get_option('menu_align') == 'right' ){
		$menu_class = 'menu-float-right';
	}
	
	if( is_page() ) {
		if( get_post_meta( get_the_ID(), 'mnky_header_overlay', true ) == 'on' ){
			$header_class .= ' header-overlay';
		}
	}
	
	if ( ! has_nav_menu( 'primary' ) && ! has_nav_menu( 'secondary' ) ) {
		$menu_fallback = 'mnky_no_menu';
	} else {
		$menu_fallback = '';
	}	
?>
	
<header id="mobile-site-header" class="mobile-header">
	<div id="mobile-site-logo">
		<?php get_template_part( 'mobile-logo' ); // Include logo.php ?>
	</div>	
	<?php get_sidebar('mobile-header'); ?>	
	<a href="#mobile-site-navigation" class="toggle-mobile-menu"><i class="fa fa-bars"></i></a>	
</header>	
	
	
<?php if( $header_style == 'side' ) : // Header w/ slide-out menu ?>

	<header id="site-header" class="header-style-<?php echo esc_attr($header_class); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>
		
				<div id="site-navigation" class="menu-float-right">
					<?php if ( has_nav_menu('secondary') ) : ?>
						<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => '', 'items_wrap' => '<nav id="secondary-navigation" class="menu-container-2 menu-float-left"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
					<?php endif; ?>
					
					<div class="site-links menu-float-left">
						<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
							<div class="header_cart_wrapper">
								<a href="<?php echo esc_url( mnky_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'fintech-wp' ); ?>" class="header_cart_link" >
									<?php woocommerce_cart_button(); ?>
								</a>	
								<?php if( $cart_widget != 'off' ) {
									woocommerce_cart_widget();
								} ?>
							</div>
						<?php endif; ?>
													
						<?php if( $search_button != 'off' ) : ?>
							<button class="toggle-header-search search_button" type="button">
								<i class="fa fa-search"></i>
							</button>
						<?php endif; ?>
		
						<div class="menu-toggle-wrapper">
							<div class="toggle-main-menu">
							  <span></span>
							  <span></span>
							  <span></span>
							</div>
							<?php esc_html_e( 'Menu', 'fintech-wp' ); ?>
						</div>
					</div><!-- .site-links -->			
				</div><!-- #site-navigation -->			
				
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
						<div class="toggle-header-search">
							<span></span>
							<span></span>
						</div>
					</div>
				<?php endif; ?>
				
			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->

	<div id="site-navigation-side">
		<div class="menu-toggle-wrapper">
			<div class="toggle-main-menu open">
				<span></span>
				<span></span>
			</div>
		</div>	
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'mnky_no_menu', 'items_wrap' => '<nav id="main-navigation" class="menu-container" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement"><ul id="%1$s" class="%2$s">%3$s</ul></nav>' ) ); ?>
		<?php get_sidebar('menu'); ?>
	</div><!-- #site-navigation -->

<?php elseif( $header_style == 'overlay' ) : // Header w/ hullcreen overlay menu ?>

	<header id="site-header" class="header-style-<?php echo esc_attr($header_class); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>
		
				<div id="site-navigation" class="menu-float-right">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => '', 'items_wrap' => '<nav id="secondary-navigation" class="menu-container-2 menu-float-left"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
					
					<div class="site-links menu-float-left">
						<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
							<div class="header_cart_wrapper">
								<a href="<?php echo esc_url( mnky_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'fintech-wp' ); ?>" class="header_cart_link" >
									<?php woocommerce_cart_button(); ?>
								</a>	
								<?php if( $cart_widget != 'off' ) {
									woocommerce_cart_widget();
								} ?>
							</div>
						<?php endif; ?>
													
						<?php if( $search_button != 'off' ) : ?>
							<button class="toggle-header-search search_button" type="button">
								<i class="fa fa-search"></i>
							</button>
						<?php endif; ?>
		
						<div class="menu-toggle-wrapper">
							<div class="toggle-main-menu">
							  <span></span>
							  <span></span>
							  <span></span>
							</div>
							<?php esc_html_e( 'Menu', 'fintech-wp' ); ?>
						</div>
					</div><!-- .site-links -->			
				</div><!-- #site-navigation -->				
				
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
						<div class="toggle-header-search">
							<span></span>
							<span></span>
						</div>
					</div>
				<?php endif; ?>
				
			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->

	<div id="site-navigation-overlay">
		<div class="menu-toggle-wrapper">
			<div class="toggle-main-menu open">
				<span></span>
				<span></span>
			</div>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'mnky_no_menu', 'items_wrap' => '<nav id="main-navigation" class="menu-container" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement"><ul id="%1$s" class="%2$s">%3$s</ul></nav>' ) ); ?>
	</div><!-- #site-navigation -->

<?php elseif( $header_style == 'centred' ) : // Centred header ?>

	<header id="site-header" class="header-style-<?php echo esc_attr($header_class); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>			
				
				<div id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => $menu_fallback, 'items_wrap' => '<nav id="primary-navigation" class="menu-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
				
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => '', 'items_wrap' => '<nav id="secondary-navigation" class="menu-container-2"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
					
					<div class="site-links">
						<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
							<div class="header_cart_wrapper">
								<a href="<?php echo esc_url( mnky_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'fintech-wp' ); ?>" class="header_cart_link" >
									<?php woocommerce_cart_button(); ?>
								</a>	
								<?php if( $cart_widget != 'off' ) {
									woocommerce_cart_widget();
								} ?>
							</div>
						<?php endif; ?>
															
						<?php if( $search_button != 'off' ) : ?>
							<button class="toggle-header-search search_button" type="button">
								<i class="fa fa-search"></i>
							</button>
						<?php endif; ?>
					</div>
					
					<?php get_sidebar('menu'); ?>
					
				</div><!-- #site-navigation -->
											
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
						<div class="toggle-header-search">
							<span></span>
							<span></span>
						</div>
					</div>
				<?php endif; ?>									

			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->
	
<?php elseif( $header_style == 'split' ) : // Header with menu split by logo ?>

	<header id="site-header" class="header-style-<?php echo esc_attr($header_class); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>			
				
				<div id="site-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'mnky_no_menu', 'items_wrap' => '<nav id="primary-navigation" class="menu-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
					
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => '', 'items_wrap' => '<nav id="secondary-navigation" class="menu-container-2 menu-float-right"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
					
					<div class="site-links">
						<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
							<div class="header_cart_wrapper">
								<a href="<?php echo esc_url( mnky_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'fintech-wp' ); ?>" class="header_cart_link" >
									<?php woocommerce_cart_button(); ?>
								</a>	
								<?php if( $cart_widget != 'off' ) {
									woocommerce_cart_widget();
								} ?>
							</div>
						<?php endif; ?>
															
						<?php if( $search_button != 'off' ) : ?>
							<button class="toggle-header-search search_button" type="button">
								<i class="fa fa-search"></i>
							</button>
						<?php endif; ?>
										
						<?php get_sidebar('menu'); ?>
					</div>
				</div><!-- #site-navigation -->
											
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
						<div class="toggle-header-search">
							<span></span>
							<span></span>
						</div>
					</div>
				<?php endif; ?>									

			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->

<?php else : // Default header ?>

	<header id="site-header" class="header-style-<?php echo esc_attr($header_class); ?>" itemscope itemtype="http://schema.org/WPHeader">
		<div id="header-wrapper">
			<div id="header-container" class="clearfix">
				<div id="site-logo">
					<?php get_template_part( 'logo' ); // Include logo.php ?>
				</div>			
				
				<div id="site-navigation" class="<?php echo esc_attr( $menu_class ); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => $menu_fallback, 'items_wrap' => '<nav id="primary-navigation" class="menu-container"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
					
					<?php get_sidebar('menu'); ?>

					<div class="site-links menu-float-right">
						<?php if( class_exists( 'WooCommerce' ) && ot_get_option('cart_button') != 'off' ) : ?>
							<div class="header_cart_wrapper">
								<a href="<?php echo esc_url( mnky_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'fintech-wp' ); ?>" class="header_cart_link" >
									<?php woocommerce_cart_button(); ?>
								</a>	
								<?php if( $cart_widget != 'off' ) {
									woocommerce_cart_widget();
								} ?>
							</div>
						<?php endif; ?>
															
						<?php if( $search_button != 'off' ) : ?>
							<button class="toggle-header-search search_button" type="button">
								<i class="fa fa-search"></i>
							</button>
						<?php endif; ?>										
					</div>
				
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'fallback_cb' => '', 'items_wrap' => '<nav id="secondary-navigation" class="menu-container-2 menu-float-right"><ul id="%1$s" class="%2$s">%3$s</ul></nav>', 'walker' => new mnky_walker() ) ); ?>
				</div><!-- #site-navigation -->
												
				<?php if( $search_button != 'off' ) : ?>
					<div class="header-search">
						<?php get_search_form(); ?>
						<div class="toggle-header-search">
							<span></span>
							<span></span>
						</div>
					</div>
				<?php endif; ?>

			</div><!-- #header-container -->
		</div><!-- #header-wrapper -->	
	</header><!-- #site-header -->
	
<?php endif; ?>	