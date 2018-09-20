<?php
/**
 * The template for displaying search forms
 */
?>
	<div class="searchform-wrapper">
		<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input onfocus="this.value=''" onblur="this.value='<?php esc_html_e( 'Type and hit enter to search ...', 'fintech-wp' );?>'" type="text" value="<?php esc_html_e( 'Search...', 'fintech-wp' );?>" name="s" class="search-input" />
		</form>
	</div>