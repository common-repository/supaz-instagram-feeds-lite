<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$class_additions = 'sifs-feeds-grid';
?>
<div class='sifs-clearfix sifs-feeds-outer-wrap <?php echo $class_additions; ?>' id='sifs-widget-template-<?php echo $template; ?>'>
	<?php
	$index_count=0;
	foreach($self_feed['data'] as $feed){
		$index_count++;
		?>
		<div class='sifs-single-feed-media'>
		<div class='sifs-single-feed-media-inner'>
			<div class="sifs-single-feed-image">
				<?php
				$user                       = $feed['user'];
				$image_details              = $feed['images'];
				
				$image_resolution           = isset($atts['feed_image_size']) ? $atts['feed_image_size'] : 'standard_resolution';
				$feed_image_url             = $image_details[$image_resolution]['url'];
				$created_time               = $feed['created_time'];
				
				$caption                    = $feed['caption'];
				$image_caption              = $caption['text'];
				$image_caption_created_time = $caption['created_time'];
				
				$likes_count                = $insta->get_formatted_count($feed['likes']['count'], $number_format_option);
				$comments_count             = $insta->get_formatted_count($feed['comments']['count'], $number_format_option);
				
				$feed_type                  = $feed['type'];
				// $insta_link                 = $feed['link'];
				?>
				<img src='<?php echo esc_url($feed_image_url); ?>' alt='<?php echo esc_attr($image_caption); ?>' />
				
			</div>
			<div class="sifs-hover-properties">
				<a href='<?php echo esc_url($insta_link); ?>' target='_blank' title="<?php _e('View on Instagram', 'supaz-instagram-feeds-lite'); ?>"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
		</div>
		<?php
	}
	?>
</div>

