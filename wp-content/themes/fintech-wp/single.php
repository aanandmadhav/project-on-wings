<?php get_header(); ?>
<?php get_sidebar('before-post'); ?>

	<div id="container">
	<?php mnky_hook_post_top(); ?>
		<div id="content">
		<?php mnky_hook_post_content_top(); ?>
		
			<?php while ( have_posts() ) : the_post(); ?>
										
				<?php get_template_part( 'content', 'single' ); ?>
						
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
						
				<?php endwhile; ?>
				
		<?php mnky_hook_post_content_bottom(); ?>				
		</div><!-- #content -->		
	<?php mnky_hook_post_bottom(); ?>		
	</div><!-- #container -->
	
<?php get_footer(); ?>