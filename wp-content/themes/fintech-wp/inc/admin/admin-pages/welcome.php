<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$demo_names = array(
	'default-Davos',
	'zurich',
	'geneva',
	'basel',
	'lugano',
	'sion',
	'lausanne',
	'bienne'	
);


if (class_exists('MNKY_Core_Extend')) : ?>
	<script>
		jQuery(document).ready(function($) {
			"use strict";
			
			jQuery('.button-install-demo').live('click', function(e) {
				var selected_demo = jQuery(this).data('demo-name');
			
				var data = {
					action: 'mnky_importer',
					demo_type: selected_demo
				};
				
				jQuery('.importer-notice').hide();
				jQuery('.data-importing').fadeIn();

				jQuery.post(ajaxurl, data, function(response) {
					if( response && response.indexOf('successful') == -1 ) {
						jQuery('.data-imported').fadeIn();
						jQuery('.data-importing').hide();
					} else {
						jQuery('.data-imported').fadeIn();
						jQuery('.data-importing').hide();
					}
				}).fail(function() {
					jQuery('.import-error').fadeIn();
					jQuery('.data-importing').hide();
				});
				
				e.preventDefault();
			});			
		});
	</script>
<?php else : // If Core Extend not active ?>
	<script>
		jQuery(document).ready(function($) {
			"use strict";
			
			jQuery('.plugin-notice, .not-active-bg').show();
		});
	</script>
<?php endif; ?>


<div class="wrap about-wrap mnky-wrap">
	<h1><?php echo sprintf( esc_html__( 'Welcome to %s', 'fintech-wp' ), wp_get_theme() ); ?></h1>

	<div class="about-text"><?php echo sprintf( __( 'Below you can import demo data and find some useful information. Get ready to create something beautiful with %s!', 'fintech-wp' ),  wp_get_theme() ); ?></div>
	<div class="wp-badge mnky-page-logo">
		<?php echo sprintf( esc_html__( 'Version %s', 'fintech-wp' ), wp_get_theme()->get( 'Version' ) ); ?>
	</div>
	
	<div class="importer-notice data-importing" style="display:none;">
		<p class="about-description"><span class="loading"></span><?php echo esc_html__( 'Importing demo data... This may take a while, please wait!', 'fintech-wp' ); ?></p>
	</div>	
	
	<div class="importer-notice data-imported" style="display:none;">
		<p class="about-description"><?php echo esc_html__( 'Demo data successfully imported. You are good to go!', 'fintech-wp' ); ?></p>
	</div>
	
	<div class="importer-notice import-error" style="display:none;">
		<p class="about-description"><?php echo esc_html__( 'All done!', 'fintech-wp'); ?></p>
	</div>	
	
	<div class="importer-notice error-notice plugin-notice" style="display:none;">
		<p class="about-description"><?php echo sprintf( esc_html__( 'To import theme demo data please install and activate %s plugin first.', 'fintech-wp'), '<a href="themes.php?page=tgmpa-install-plugins" >Fintech WP | Theme Core Extend</a>' ); ?></p>
	</div>
	
	<h3><?php esc_html_e('Install Demo', 'fintech-wp')?></h3>
	<div class="mnky-section mnky-demos theme-browser clearfix">
		<?php foreach ( $demo_names as $demo_name ) { ?>
			<div class="theme">
				<div class="theme-wrapper">
					<div class="theme-screenshot">
						<img src="<?php echo MNKY_URI .'/inc/admin/assets/'. esc_attr($demo_name) .'_preview.png'; ?>" />
					</div>
					<h3 class="theme-name" id="<?php esc_attr ($demo_name); ?>"><?php echo ucwords( str_replace( '_', ' ', $demo_name ) ); ?></h3>
					<div class="theme-actions">
						<?php printf( '<a class="button button-primary button-install-demo" data-demo-name="%s" href="#">%s</a>', strtolower( $demo_name ), esc_html__( 'Install', 'fintech-wp' ) ); ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="not-active-bg" style="display:none"></div>
	</div>	

	<h3><?php esc_html_e('Getting Started', 'fintech-wp')?></h3>
    <div class="mnky-section mnky-info clearfix">
    	<div class="col three-col">
        	<div class="col">
				<h3><?php echo esc_html__( 'Documentation', 'fintech-wp' ); ?></h3>
				<p>
					<?php esc_html_e('Read online documentation to learn everything about the theme.', 'fintech-wp')?>
					<a class="mnky_small_button" href="<?php echo esc_url('http://mnkythemedemos.com/documentation/fintechwp/') ?>" target="_blank"><span><?php esc_html_e('Read documentation', 'fintech-wp')?></span></a>
				</p>

            </div>
            <div class="col">
				<h3><?php echo esc_html__( 'Theme Options', 'fintech-wp' ); ?></h3>
				<p>
					<?php esc_html_e('Go to theme options panel to adjust theme settings.', 'fintech-wp')?>
					<a class="mnky_small_button" href="<?php echo esc_url('themes.php?page=ot-theme-options') ?>"><span><?php esc_html_e('Customize theme', 'fintech-wp')?></span></a>
				</p>
            </div>
        	<div class="col last-feature">
				<h3><?php echo esc_html__( 'Help desk', 'fintech-wp' ); ?></h3>
				<p>
					<?php esc_html_e('Visit our support forums to ask questions and get the answers.', 'fintech-wp')?>
					<a class="mnky_small_button" href="<?php echo esc_url('http://support.mnkystudio.com/categories/fintechwp') ?>" target="_blank"><span><?php esc_html_e('Receive support', 'fintech-wp')?></span></a>
				</p>
            </div>
        </div>        
	</div>
	

	<h3><?php esc_html_e('Server Info', 'fintech-wp')?></h3>
	<table class="mnky_status_table widefat" cellspacing="0">
		<tbody>
		<tr>
			<td data-export-label="Home URL"><?php esc_html_e( 'Home URL', 'fintech-wp' ); ?>:</td>
			<td class="help"><span><?php echo esc_html__( 'The URL of your site\'s homepage.', 'fintech-wp' ); ?></td>
			<td><?php form_option( 'home' ); ?></td>
		</tr>
		<tr>
			<td data-export-label="Site URL"><?php esc_html_e( 'Site URL', 'fintech-wp' ); ?>:</td>
			<td class="help"><span><?php echo esc_html__( 'The root URL of your site.', 'fintech-wp' ); ?></td>
			<td><?php form_option( 'siteurl' ); ?></td>
		</tr>
		<tr>
			<td data-export-label="WP Version"><?php esc_html_e( 'WP Version', 'fintech-wp' ); ?>:</td>
			<td class="help"><span><?php echo esc_html__( 'The version of WordPress installed on your site.', 'fintech-wp' ); ?></td>
			<td><?php bloginfo('version'); ?></td>
		</tr>
		<tr>
			<td data-export-label="WP Memory Limit"><?php esc_html_e( 'WP Memory Limit', 'fintech-wp' ); ?>:</td>
			<td class="help"><span><?php echo esc_html__( 'The maximum amount of memory (RAM) that your site can use at one time.', 'fintech-wp' ); ?></td>
			<td><?php
				$memory = mnky_let_to_num( WP_MEMORY_LIMIT );

				if ( function_exists( 'memory_get_usage' ) ) {
					$system_memory = mnky_let_to_num( @ini_get( 'memory_limit' ) );
					$memory        = max( $memory, $system_memory );
				}

				if ( $memory < 67108864 ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( esc_html__( '%s - We recommend setting memory to at least 64MB. See: %s', 'fintech-wp' ), size_format( $memory ), '<a href="https://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">' . esc_html__( 'Increasing memory allocated to PHP', 'fintech-wp' ) . '</a>' ) . '</mark>';
				} else {
					echo '<mark class="yes">' . size_format( $memory ) . '</mark>';
				}
			?></td>
		</tr>
		
		
			<tr>
				<td data-export-label="PHP Version"><?php esc_html_e( 'PHP Version', 'fintech-wp' ); ?>:</td>
				<td class="help"><span><?php echo esc_html__( 'The version of PHP installed on your hosting server.', 'fintech-wp'  ); ?></span></td>
				<td><?php
					// Check if phpversion function exists.
					if ( function_exists( 'phpversion' ) ) {
						$php_version = phpversion();

						if ( version_compare( $php_version, '5.4', '<' ) ) {
							echo '<mark class="error">' . sprintf( esc_html__( '%s - We recommend a minimum PHP version of 5.6. See: %s', 'fintech-wp' ), esc_html( $php_version ), '<a href="https://wordpress.org/about/requirements/" target="_blank">' . esc_html__( 'Current recommended PHP version', 'fintech-wp' ) . '</a>' ) . '</mark>';
						} else {
							echo '<mark class="yes">' . esc_html( $php_version ) . '</mark>';
						}
					} else {
						_e( "Couldn't determine PHP version because phpversion() doesn't exist.", 'fintech-wp' );
					}
					?></td>
			</tr>
			<?php if ( function_exists( 'ini_get' ) ) : ?>
				<tr>
					<td data-export-label="PHP Post Max Size"><?php esc_html_e( 'PHP Post Max Size', 'fintech-wp' ); ?>:</td>
					<td class="help"><span><?php echo esc_html__( 'The largest filesize that can be contained in one post.', 'fintech-wp'  ); ?></span></td>
					<td><?php echo size_format( mnky_let_to_num( ini_get( 'post_max_size' ) ) ); ?></td>
				</tr>
				<tr>
					<td data-export-label="PHP Time Limit"><?php esc_html_e( 'PHP Time Limit', 'fintech-wp' ); ?>:</td>
					<td class="help"><span><?php echo esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'fintech-wp'  ); ?></span></td>
					<td><?php echo ini_get( 'max_execution_time' ); ?></td>
				</tr>
				<tr>
					<td data-export-label="PHP Max Input Vars"><?php esc_html_e( 'PHP Max Input Vars', 'fintech-wp' ); ?>:</td>
					<td class="help"><span><?php echo esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'fintech-wp'  ); ?></span></td>
					<td><?php echo ini_get( 'max_input_vars' ); ?></td>
				</tr>
			<?php endif; ?>
			<tr>
				<td data-export-label="MySQL Version"><?php esc_html_e( 'MySQL Version', 'fintech-wp' ); ?>:</td>
				<td class="help"><span><?php echo esc_html__( 'The version of MySQL installed on your hosting server.', 'fintech-wp'  ); ?></span></td>
				<td>
					<?php
					/** @global wpdb $wpdb */
					global $wpdb;
					echo $wpdb->db_version();
					?>
				</td>
			</tr>
			<tr>
				<td data-export-label="Max Upload Size"><?php esc_html_e( 'Max Upload Size', 'fintech-wp' ); ?>:</td>
				<td class="help"><span><?php echo esc_html__( 'The largest filesize that can be uploaded to your WordPress installation.', 'fintech-wp'  ); ?></span></td>
				<td><?php echo size_format( wp_max_upload_size() ); ?></td>
			</tr>
			<tr>
				<td data-export-label="ZipArchive"><?php esc_html_e( 'ZipArchive:', 'fintech-wp' ); ?></td>
				<td class="help"><span><?php echo esc_html__( 'ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders.', 'fintech-wp'  ); ?></span></td>
				<td><?php echo class_exists( 'ZipArchive' ) ? '<mark class="yes">&#10004;</mark>' : '<mark class="error">'. esc_html__( 'ZipArchive is not installed on your server, but is required if you need to import demo content.', 'fintech-wp'  ) .'</mark>'; ?></td>
			</tr>
		</tbody>
	</table>

	
	
    <div class="fintech-wp_thanks">
    	<p class="description"><?php echo sprintf( esc_html__( 'Thank you for choosing %s', 'fintech-wp' ), wp_get_theme() ); ?><br>MNKY Team</p>
    </div>	
</div>
