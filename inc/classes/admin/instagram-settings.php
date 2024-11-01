<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="sifs-settings-page-wrap">
	<?php
	// instagram settings goes here
	include('common/header.php');
	$sifs_settings = get_option( 'sifs_settings' );
	if(isset($_GET['message']) && $_GET['message'] == '1'){ ?>
		<div id='message' class="notice notice-success is-dismissible">
			<p><?php _e( 'Settings saved successfully.', 'supaz-instagram-feeds-lite' ); ?></p>
			<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e( 'Dismiss this notice.', 'supaz-instagram-feeds-lite' ); ?></span></button>
		</div>
		<?php 
	}else if(isset($_GET['message']) && $_GET['message'] !='1'){ 
		?>
		<div id='message' class="notice notice-error is-dismissible">
			<p><?php _e( 'Something went wrong. Please try again later.', 'supaz-instagram-feeds-lite' ); ?></p>
			<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e( 'Dismiss this notice.', 'supaz-instagram-feeds-lite' ); ?></span></button>
		</div>
		<?php 
	} ?>

	<form class="sifs-instagram-settings-wrap" method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
		<input type="hidden" name="action" value="sifs-save-instagram-settings">
		
		<div class="sifs-instagram-settings-inner-wrap">
			<div class='sifs-input-wrap'>
				<div class="sifs-input-field-wrap">
					<label class="sifs-label"><?php _e('Access Token', 'supaz-instagram-feeds-lite'); ?></label>
					<input type="text" name="sifs_settings[access_token]" value="<?php if(isset($sifs_settings['access_token']) || $sifs_settings['access_token'] !=''){ echo esc_attr($sifs_settings['access_token']); } ?>" />
				</div>
				<div class="sifs-note-wrap">
	                <?php _e('Please enter the instagram Access Token. You can get this information from below link.', 'supaz-instagram-feeds-lite'); ?>
	                <?php 
	                $new_url = urlencode(admin_url('edit.php?post_type=sifs_posts&page=supaz-instagram-settings')) . '&response_type=token'; 
	                $new_url = site_url().'?supaz-instagram-feeds=true&response_type=token';
	                ?>
	                <div id="login_with_instagram">
	                	<a href="https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=<?php echo $new_url;?>" target='_blank'><?php _e( 'Get access token', 'supaz-instagram-feeds-lite' ); ?></a>
	                </div>
	            </div>
			</div>
			<div class='sifs-input-wrap'>
				<div class="sifs-input-field-wrap">
						<label for='sifs-add-links-to-hashtags-username'><?php echo _e('Enable Links', 'supaz-instagram-feeds-lite'); ?></label>
						<input type='checkbox' name='sifs_settings[enable_links]'  class='sifs-add-links-to-hashtags-username sifs-checkbox-enable-option' id='sifs-add-links-to-hashtags-username' <?php if(isset($sifs_settings['enable_links'])){ echo "checked"; } ?>  />
						<label for='sifs-add-links-to-hashtags-username'></label>
						<div class="sifs-note-wrap"><?php _e('Please select this option if you want to enable links for hashtags and usernames in image caption.', 'supaz-instagram-feeds-lite' ); ?> </div>
				</div>
			</div>

			<?php
	        /**
	         * Nonce field
	         * */
	        wp_nonce_field('sifs-nonce', 'sifs-nonce-field');
	        ?>
	        <div class="sifs-instagram-settings-submit">
	            <input type="submit" class="button button-primary" value="Save" name="sifs_save_settings" />
	        </div>
		</div>
	</form>
</div>