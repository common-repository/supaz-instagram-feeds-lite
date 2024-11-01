<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
global $post;
global $sifs_global;
$post_id = $post->ID;
$sifs_feed = get_post_meta($post_id, 'sifs-feed', true);
wp_nonce_field(basename(__FILE__), 'sifs_save_nonce');
?>
<div class="sifs-metaboxes-wrapper inside">
	<div class="sifs-metaboxes-wrapper-inner">
		<div class="sifs-tabs-header-wrap">
			<ul class="sifs-tabs-wrap">
				<li class='sifs-tab sifs-feed-settings sifs-active' id='sifs-tab-feed-settings'><?php _e("Feed Settings", 'supaz-instagram-feeds-lite'); ?></li>
				<li class='sifs-tab sifs-display-settings' id='sifs-tab-display-settings' ><?php _e("Display Settings", 'supaz-instagram-feeds-lite'); ?></li>
			</ul>
		</div>

		<div class="sifs-tabs-content-wrap">
			<div class="sifs-tab-content sifs-tab-feed-settings" id='sifs-content-feed-settings' style="display:block;">
				<?php include('feed-settings.php'); ?>
			</div>

			<div class="sifs-tab-content sifs-tab-display-settings" id='sifs-content-display-settings' style="display:none;">
				<?php include('display-settings.php'); ?>
			</div>
		</div>
	</div>
</div>