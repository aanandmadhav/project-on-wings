<?php
/*
Single Post Template: Left Sidebar
*/
?>
<?php get_header(); ?>
<?php get_sidebar('before-post'); ?>

	<div id="container" class="clearfix">
	<?php mnky_hook_post_top(); ?>
		<div id="content" class="float-right">
		<?php mnky_hook_post_content_top(); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content', 'single' ); ?>
					
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>

			<?php endwhile; ?>
			
		<?php mnky_hook_post_content_bottom(); ?>			
		</div><!-- #content -->
				
		<div itemscope itemtype="http://schema.org/WPSideBar" id="sidebar" class="float-left">
			<?php get_sidebar('blog'); ?>
		</div>	
		
	<?php mnky_hook_post_bottom(); ?>		
	</div><!-- #container -->

<?php get_footer(); ?>