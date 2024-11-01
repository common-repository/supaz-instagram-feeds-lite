<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$feed_settings = isset($sifs_feed['feed-settings']) ? $sifs_feed['feed-settings'] : array();
// sifsLibrary::print_array($feed_settings);
?>
<div class="header-text"><?php _e('Feed Settings', 'supaz-instagram-feeds-lite'); ?></div>
<div class='sifs-tab-input-fields'>
	<div class="sifs-input-field-wrap">
		<label><?php _e('Feed Type','supaz-instagram-feeds-lite');?></label>
		<select name='sifs-feed[feed-settings][feed-type]' class="sifs-select-options sifs-feed-type-select">
			<option value ='recent-media' <?php if(isset($feed_settings['feed-type'])) { selected( $feed_settings['feed-type'], 'recent-media'); } ?> ><?php _e( 'Recent Media', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value ='hashtag' disabled ><?php _e( 'Hash Tag(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value ='location' disabled ><?php _e( 'Location(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
		</select>
	</div>

	<div class="sifs-dropdown-selection-options">
		<div class="sifs-dropdown-selection-option sifs-recent-media"></div>
	</div>

	<div class="sifs-input-field-wrap">
		<label for='sifs-feed-settings-no-of-images'><?php _e('Image Size','supaz-instagram-feeds-lite');?></label>
		<select name='sifs-feed[feed-settings][image-size]'>
			<option value="thumbnail" <?php if( isset($feed_settings['image-size']) ){ selected( $feed_settings['image-size'], 'thumbnail' ); } ?> ><?php _e('Thumbnail', 'supaz-instagram-feeds-lite'); ?></option>
			<option value="low_resolution" <?php if( isset($feed_settings['image-size']) ){ selected( $feed_settings['image-size'], 'low_resolution' ); } ?> ><?php _e('Low Resolution', 'supaz-instagram-feeds-lite'); ?></option>
			<option value="standard_resolution" <?php if( isset($feed_settings['image-size']) ){ selected( $feed_settings['image-size'], 'standard_resolution' ); } ?> ><?php _e('Standard Resolution', 'supaz-instagram-feeds-lite'); ?></option>
		</select>	
	</div>
	<div class="sifs-input-field-wrap">
		<label for='sifs-feed-settings-no-of-images'><?php _e('No of Images','supaz-instagram-feeds-lite');?></label>
		<input type='number' min='1' max='200' step='1' name='sifs-feed[feed-settings][no-of-images]' id='sifs-feed-settings-no-of-images' value='<?php if(isset($feed_settings['no-of-images']) && $feed_settings['no-of-images'] !=''){ echo $feed_settings['no-of-images']; }else{ echo '10'; } ?>' />
		
	</div>

	<div class="sifs-input-field-wrap">
		<label><?php _e('Sorting','supaz-instagram-feeds-lite');?></label>
		<select name='sifs-feed[feed-settings][sorting]'>
			<option value='random' <?php if( isset($feed_settings['sorting']) ){ selected( $feed_settings['sorting'], 'random' ); } ?> ><?php _e( 'Random', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value='likes' <?php if( isset($feed_settings['sorting']) ){ selected( $feed_settings['sorting'], 'likes' ); } ?> ><?php _e( 'Likes', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value='comments' <?php if( isset($feed_settings['sorting']) ){ selected( $feed_settings['sorting'], 'comments' ); } ?> ><?php _e( 'Comments', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value='date' <?php if( isset($feed_settings['sorting']) ){ selected( $feed_settings['sorting'], 'date' ); } ?> ><?php _e( 'Date', 'supaz-instagram-feeds-lite' ); ?></option>
		</select>
	</div>

	<div class="sifs-input-field-wrap">
		<label><?php _e('Order By','supaz-instagram-feeds-lite');?></label>
		<select name='sifs-feed[feed-settings][order-by]'>
			<option value='desc' <?php if( isset($feed_settings['order-by']) ){ selected( $feed_settings['order-by'], 'desc' ); } ?>><?php _e( 'DESC', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value='asc' <?php if( isset($feed_settings['order-by']) ){ selected( $feed_settings['order-by'], 'asc' ); } ?>><?php _e( 'ASC', 'supaz-instagram-feeds-lite' ); ?></option>
		</select>
	</div>

	<div class="sifs-input-field-wrap">
		<label><?php _e('Number Format','supaz-instagram-feeds-lite');?></label>
		<select name='sifs-feed[feed-settings][number-format]'>
			<option value='1' <?php if( isset($feed_settings['number-format']) ){ selected( $feed_settings['number-format'], '1' ); } ?> ><?php _e( 'number only (1700) ', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value='2' <?php if( isset($feed_settings['number-format']) ){ selected( $feed_settings['number-format'], '2' ); } ?> ><?php _e( '1,700', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value='3' <?php if( isset($feed_settings['number-format']) ){ selected( $feed_settings['number-format'], '3' ); } ?> ><?php _e( '1.7k', 'supaz-instagram-feeds-lite' ); ?></option>
		</select>
	</div>

	<div class="sifs-input-fields-section-wrap">
		<div class="sifs-subhead-title"><?php _e('Moderation(Remove item if it contains)(Pro feature)','supaz-instagram-feeds-lite'); ?></div>
		<div class="sifs-input-field-wrap">
			<label for='sifs-feed-feed-settings-moderation-usernames'><?php _e('Usernames','supaz-instagram-feeds-lite'); ?></label>
			<input type="text" name='sifs-feed[feed-settings][moderation][usernames]' readonly />
			<div class="sifs-note-wrap"><?php _e("Please enter the comma separted usernames which you don't want to show in the feed.", "supaz-instagram-feeds-lite" ); ?></div>
		</div>

		<div class="sifs-input-field-wrap">
			<label for='sifs-feed-feed-settings-moderation-usernames'><?php _e('Image Caption','supaz-instagram-feeds-lite'); ?></label>
			<input type="text" name='sifs-feed[feed-settings][moderation][image-caption]' readonly />
			<div class="sifs-note-wrap"><?php _e("Please enter the comma separted captions which you don't want to show in the feed.", "supaz-instagram-feeds-lite" ); ?></div>
		</div>
	</div>

	<div class="sifs-checkbox-outer-wrap">
		<div class="sifs-subhead-title"><?php _e('Cache Settings','supaz-instagram-feeds-lite'); ?></div>
		<div class="sifs-input-field-wrap">
			<label for='sifs-feed-settings-enable-cache'><?php echo _e('Enable', 'supaz-instagram-feeds-lite'); ?></label>
			<input type='checkbox' name='sifs-feed[feed-settings][cache][enable]' id='sifs-feed-settings-enable-cache' class='sifs-checkbox-enable-item sifs-checkbox-enable-option' <?php if(isset($feed_settings['cache']['enable'])){ echo "checked"; } ?> />
			<label for='sifs-feed-settings-enable-cache'></label>
		</div>
		<div class="sifs-checkbox-checked-options" style="<?php if(isset($feed_settings['cache']['enable'])){ echo 'display:block';  }else{ echo 'display:none'; } ?>">
			<div class="sifs-input-field-wrap">
				<label><?php echo _e('Cache Period(Minutes)', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='number' step='0.01' min='0' max='20000' name="sifs-feed[feed-settings][cache][period]" value="<?php if( isset($feed_settings['cache']['period']) ) { echo esc_attr( $feed_settings['cache']['period'] ); } ?>" />
			</div>
		</div>
	</div>
</div>