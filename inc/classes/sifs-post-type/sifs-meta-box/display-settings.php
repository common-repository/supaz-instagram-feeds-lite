<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$display_settings = isset( $sifs_feed['display-settings'] ) ? $sifs_feed['display-settings'] : array();
?>
<div class="header-text"><?php _e('Display Settings', 'supaz-instagram-feeds-lite'); ?></div>
<div class='sifs-tab-input-fields'>
	<div class="sifs-input-field-wrap">
		<label><?php _e('Layout Selection','supaz-instagram-feeds-lite');?></label>
		<select name='sifs-feed[display-settings][layout]' class="sifs-select-options sifs-feed-type-select">
			<option value ='grid-layout'          <?php if(isset($display_settings['layout'])) { selected( $display_settings['layout'], 'grid-layout' ); } ?> ><?php _e( 'Grid Layout', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value ='slider-layout'     	  <?php if(isset($display_settings['layout'])) { selected( $display_settings['layout'], 'slider-layout' ); } ?> ><?php _e( 'Slider Layout', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value ='carousel-layout'      <?php if(isset($display_settings['layout'])) { selected( $display_settings['layout'], 'carousel-layout' ); } ?> disabled ><?php _e( 'Carousel Layout(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
			<option value ='grid-rotatory-layout' <?php if(isset($display_settings['layout'])) { selected( $display_settings['layout'], 'grid-rotatory-layout' ); } ?> disabled ><?php _e( 'Grid Rotatory Layout(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
		</select>
	</div>
	
	<div class="sifs-dropdown-selection-options">
		<div class="sifs-dropdown-selection-option sifs-grid-layout" style="<?php if((isset($display_settings['layout']) && $display_settings['layout'] == 'grid-layout') || !isset($display_settings['layout']) ){ echo "display:block;"; }else{ echo "display:none;"; } ?>">
			<div class="sifs-input-field-wrap">
				<label><?php echo _e('Template Selection', 'supaz-instagram-feeds-lite'); $img_src = SIFS_LITE_IMG_DIR.'/grid/template-1.jpg'; ?></label>
				<select name='sifs-feed[display-settings][grid][template]' class="sifs-select-options sifs-feed-template-select">
					<option value ='template-1' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-1.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-1' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-1.jpg'; echo "selected=selected"; } ?> ><?php _e( 'Template 1', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-2' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-2.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-2' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-2.jpg'; echo "selected=selected"; } ?> ><?php _e( 'Template 2', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-3' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-3.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-3' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-3.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 3(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-4' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-4.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-4' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-4.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 4(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-5' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-5.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-5' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-5.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 5(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-6' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-6.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-6' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-6.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 6(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-7' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-7.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-7' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-7.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 7(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-8' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-8.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-8' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-8.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 8(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-9' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-9.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-9' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-9.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 9(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-10' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-10.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-10' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-10.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 10(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value ='template-11' data-img="<?php echo SIFS_LITE_IMG_DIR.'/grid/template-11.jpg'; ?>" <?php if( isset($display_settings['grid']['template']) && $display_settings['grid']['template'] == 'template-11' ){ $img_src = SIFS_LITE_IMG_DIR.'/grid/template-11.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 11(Pro Feature)', 'supaz-instagram-feeds-lite' ); ?></option>
				</select>
				<div class="sifs-image-placeholder">
					<img src="<?php if(isset($img_src)){ echo $img_src; } ?>" alt='Template selection' />
				</div>
			</div>


			<div class="sifs-input-field-wrap">
				<label for='sifs-grid-enable-masonry'><?php echo _e('Enable Masonry', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][grid][enable-masonry]' id='sifs-grid-enable-masonry' class='sifs-checkbox-enable-masonry sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['enable-masonry'])){ echo "checked"; } ?> />
				<label for='sifs-grid-enable-masonry'></label>
			</div>

			<div class="sifs-input-field-wrap">
				<label><?php echo _e('No of Columns', 'supaz-instagram-feeds-lite'); ?></label>
                <div class="sifs-column-selection-options-wrap">
					<label for='sifs-desktop'><?php _e('Desktop', 'supaz-instagram-feeds-lite'); ?></label>
					<div class="sifs-column-input-wrap clearfix">
						<div class="slider-range-max"></div>
						<input type='int' id="sifs-desktop" readonly name='sifs-feed[display-settings][grid][columns][desktop]' key='any' class='sifs-input-field' data-min='1' data-max='6' value='<?php if(isset($display_settings['grid']['columns']['desktop']) && $display_settings['grid']['columns']['desktop'] != '' ){ echo $display_settings['grid']['columns']['desktop']; }else{ echo "3"; } ?>' />
					</div>
				</div>
				<div class="sifs-column-selection-options-wrap">
					<label for='sifs-tablet'><?php _e('Tablet', 'supaz-instagram-feeds-lite'); ?></label>
					<div class="sifs-column-input-wrap clearfix">
						<div class="slider-range-max"></div>
						<input type='int' id="sifs-tablet" readonly name='sifs-feed[display-settings][grid][columns][tablet]' key='any' class='sifs-input-field' data-min='1' data-max='4' value='<?php if(isset($display_settings['grid']['columns']['tablet']) && $display_settings['grid']['columns']['tablet'] != '' ){ echo $display_settings['grid']['columns']['tablet']; }else{ echo "3"; } ?>' />
					</div>
				</div>
				<div class="sifs-column-selection-options-wrap">
					<label for="sifs-mobile"><?php _e('Mobile', 'supaz-instagram-feeds-lite'); ?></label>
					<div class="sifs-column-input-wrap clearfix">
						<div class="slider-range-max"></div>
						<input type='int' id="sifs-mobile" readonly name='sifs-feed[display-settings][grid][columns][mobile]' key='any' class='sifs-input-field' data-min='1' data-max='2' value='<?php if(isset($display_settings['grid']['columns']['mobile']) && $display_settings['grid']['columns']['mobile'] != '' ){ echo $display_settings['grid']['columns']['mobile']; }else{ echo "2"; } ?>' />
					</div>
				</div>
			</div>
			
			<!-- hide/show settings -->
			<div class="sifs-inputs-field-group">
				<div class="sifs-subhead-title"><?php _e('Show/Hide Settings', 'supaz-instagram-feeds-lite'); ?></div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-image-type'><?php echo _e('Hide Image Type Icon', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][image-type]'  id='sifs-display-settings-grid-hide-show-image-type' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['image-type'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-image-type'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-instagram-link'><?php echo _e('Hide Instagram Link', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][instagram-link]'  id='sifs-display-settings-grid-hide-show-instagram-link' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['instagram-link'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-instagram-link'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-profile-image'><?php echo _e('Hide Profile Image', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][profile-image]'  id='sifs-display-settings-grid-hide-show-profile-image' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['profile-image'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-profile-image'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-username'><?php echo _e('Hide Username', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][username]'  id='sifs-display-settings-grid-hide-show-username' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['username'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-username'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-posted-ago'><?php echo _e('Hide Posted Ago', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][posted-ago]'  id='sifs-display-settings-grid-hide-show-posted-ago' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['posted-ago'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-posted-ago'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-image-caption'><?php echo _e('Hide Image Caption', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][image-caption]'  id='sifs-display-settings-grid-hide-show-image-caption' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['image-caption'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-image-caption'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-like-count'><?php echo _e('Hide Like Count', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][like-count]'  id='sifs-display-settings-grid-hide-show-like-count' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['like-count'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-like-count'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-comment-count'><?php echo _e('Hide Comment Count', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][comment-count]'  id='sifs-display-settings-grid-hide-show-comment-count' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['comment-count'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-comment-count'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-grid-hide-show-share-button'><?php echo _e('Hide Share Button', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][grid][hide-show][share-button]'  id='sifs-display-settings-grid-hide-show-share-button' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['grid']['hide-show']['share-button'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-grid-hide-show-share-button'></label>
				</div>
			</div>
		</div>
		
		<div class="sifs-dropdown-selection-option sifs-slider-layout" style="<?php if(isset($display_settings['layout']) && $display_settings['layout'] == 'slider-layout'){ echo "display:block;"; }else{ echo "display:none;"; } ?>">

			<?php // http://kenwheeler.github.io/slick/  - see the refereces of attributes to be used in slider layout. ?>
			<div class="sifs-input-field-wrap">
				<label><?php echo _e( 'Template Selection', 'supaz-instagram-feeds-lite' ); $img_src = SIFS_LITE_IMG_DIR.'/slider/template-1.jpg'; ?></label>
				<select name='sifs-feed[display-settings][slider][template]' class="sifs-select-options sifs-feed-template-select">
					<option value='template-1' data-img="<?php echo SIFS_LITE_IMG_DIR.'/slider/template-1.jpg'; ?>" <?php if( isset($display_settings['slider']['template']) && $display_settings['slider']['template'] == 'template-1' ){ $img_src = SIFS_LITE_IMG_DIR.'/slider/template-1.jpg'; echo "selected=selected"; } ?>><?php _e( 'Template 1', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value='template-2' data-img="<?php echo SIFS_LITE_IMG_DIR.'/slider/template-2.jpg'; ?>" <?php if( isset($display_settings['slider']['template']) && $display_settings['slider']['template'] == 'template-2' ){ $img_src = SIFS_LITE_IMG_DIR.'/slider/template-2.jpg'; echo "selected=selected"; } ?> ><?php _e( 'Template 2', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value='template-3' data-img="<?php echo SIFS_LITE_IMG_DIR.'/slider/template-3.jpg'; ?>" <?php if( isset($display_settings['slider']['template']) && $display_settings['slider']['template'] == 'template-3' ){ $img_src = SIFS_LITE_IMG_DIR.'/slider/template-3.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 3', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value='template-4' data-img="<?php echo SIFS_LITE_IMG_DIR.'/slider/template-4.jpg'; ?>" <?php if( isset($display_settings['slider']['template']) && $display_settings['slider']['template'] == 'template-4' ){ $img_src = SIFS_LITE_IMG_DIR.'/slider/template-4.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 4', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value='template-5' data-img="<?php echo SIFS_LITE_IMG_DIR.'/slider/template-5.jpg'; ?>" <?php if( isset($display_settings['slider']['template']) && $display_settings['slider']['template'] == 'template-5' ){ $img_src = SIFS_LITE_IMG_DIR.'/slider/template-5.jpg'; echo "selected=selected"; } ?> disabled ><?php _e( 'Template 5', 'supaz-instagram-feeds-lite' ); ?></option>
				</select>
				<div class="sifs-image-placeholder">
					<img src="<?php if(isset($img_src)){ echo $img_src; } ?>" alt='template selection'/>
				</div>
			</div>

			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-mode'><?php echo _e('Mode', 'supaz-instagram-feeds-lite'); ?></label>
				<select name='sifs-feed[display-settings][slider][mode]' id='sifs-slider-mode' class="sifs-select-options sifs-slider-mode-select">
					<option value='horizontal' <?php if(isset($display_settings['slider']['mode'])){ selected( $display_settings['slider']['mode'], 'horizontal' ); } ?> ><?php _e( 'Horizontal', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value='vertical' <?php if(isset($display_settings['slider']['mode'])){ selected( $display_settings['slider']['mode'], 'vertical' ); } ?> ><?php _e( 'Vertical', 'supaz-instagram-feeds-lite' ); ?></option>
					<option value='fade' <?php if(isset($display_settings['slider']['mode'])){ selected( $display_settings['slider']['mode'], 'fade' ); } ?> ><?php _e( 'Fade', 'supaz-instagram-feeds-lite' ); ?></option>
				</select>
			</div>
			
			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-hide-content'><?php echo _e('Hide Content', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][slider][hide-content]' id='sifs-slider-hide-content' class='sifs-slider-hide-content sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-content'])){ echo "checked"; } ?> />
				<label for='sifs-slider-hide-content'></label>
			</div>

			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-hide-controls'><?php echo _e('Hide Controls', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][slider][hide-controls]' id='sifs-slider-hide-controls' class='sifs-slider-hide-controls sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-controls'])){ echo "checked"; } ?> />
				<label for='sifs-slider-hide-controls'></label>
			</div>

			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-hide-dots'><?php echo _e('Hide Pager', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][slider][hide-dots]' id='sifs-slider-hide-dots' class='sifs-slider-hide-dots sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-dots'])){ echo "checked"; } ?> />
				<label for='sifs-slider-hide-dots'></label>

			</div>

			<div class="sifs-input-field-wrap">
				<label><?php echo _e('Slide Speed(milisecond)', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='number' step='1' min='0' max='4500' name='sifs-feed[display-settings][slider][speed]' value='<?php if(isset($display_settings['slider']['speed']) && $display_settings['slider']['speed'] != '' ){ echo esc_attr($display_settings['slider']['speed']); } ?>' />
			</div>

			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-random-start'><?php echo _e('Random Start', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][slider][random-start]' id='sifs-slider-random-start' class='sifs-slider-random-start sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['random-start'])){ echo "checked"; } ?> />
				<label for='sifs-slider-random-start'></label>
			</div>

			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-infinite-loop'><?php echo _e('Infinite Loop', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][slider][infinite-loop]' id='sifs-slider-infinite-loop' class='sifs-slider-infinite-loop sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['infinite-loop'])){ echo "checked"; } ?> />
				<label for='sifs-slider-infinite-loop'></label>
			</div>

			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-enable-keyboard'><?php echo _e('Enable Keyboard', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][slider][enable-keyboard]' id='sifs-slider-enable-keyboard' class='sifs-slider-enable-keyboard sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['enable-keyboard'])){ echo "checked"; } ?> />
				<label for='sifs-slider-enable-keyboard'></label>
			</div>

			<div class="sifs-input-field-wrap">
				<label for='sifs-slider-auto-play'><?php echo _e('Auto Play', 'supaz-instagram-feeds-lite'); ?></label>
				<input type='checkbox' name='sifs-feed[display-settings][slider][auto-play]' id='sifs-slider-auto-play' class='sifs-slider-auto-play sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['auto-play'])){ echo "checked"; } ?> />
				<label for='sifs-slider-auto-play'></label>
			</div>

			<!-- hide/show settings -->
			<div class="sifs-inputs-field-group">
				<div class="sifs-subhead-title"><?php _e('Show/Hide Settings', 'supaz-instagram-feeds-lite'); ?></div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-image-type'><?php echo _e('Hide Image type Icon', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][image-type]'  id='sifs-display-settings-slider-hide-show-image-type' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['image-type'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-image-type'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-instagram-link'><?php echo _e('Hide Instagram Link', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][instagram-link]'  id='sifs-display-settings-slider-hide-show-instagram-link' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['instagram-link'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-instagram-link'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-profile-image'><?php echo _e('Hide Profile Image', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][profile-image]'  id='sifs-display-settings-slider-hide-show-profile-image' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['profile-image'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-profile-image'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-name'><?php echo _e('Hide Name', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][name]'  id='sifs-display-settings-slider-hide-show-name' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['name'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-name'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-username'><?php echo _e('Hide Username', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][username]'  id='sifs-display-settings-slider-hide-show-username' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['username'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-username'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-posted-ago'><?php echo _e('Hide Posted Ago', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][posted-ago]'  id='sifs-display-settings-slider-hide-show-posted-ago' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['posted-ago'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-posted-ago'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-image-caption'><?php echo _e('Hide Image Caption', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][image-caption]'  id='sifs-display-settings-slider-hide-show-image-caption' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['image-caption'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-image-caption'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-like-count'><?php echo _e('Hide Like Count', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][like-count]'  id='sifs-display-settings-slider-hide-show-like-count' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['like-count'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-like-count'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-comment-count'><?php echo _e('Hide Comment Count', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][comment-count]'  id='sifs-display-settings-slider-hide-show-comment-count' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['comment-count'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-comment-count'></label>
				</div>
				<div class="sifs-input-field-wrap">
					<label for='sifs-display-settings-slider-hide-show-share-button'><?php echo _e('Hide Share Button', 'supaz-instagram-feeds-lite'); ?></label>
					<input type='checkbox' name='sifs-feed[display-settings][slider][hide-show][share-button]'  id='sifs-display-settings-slider-hide-show-share-button' class='sifs-checkbox-enable-option' <?php if(isset($display_settings['slider']['hide-show']['share-button'])){ echo "checked"; } ?>  />
					<label for='sifs-display-settings-slider-hide-show-share-button'></label>
				</div>
			</div>
		</div>
	</div>
</div>