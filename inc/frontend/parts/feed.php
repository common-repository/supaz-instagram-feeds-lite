<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$class_additions = 'sifs-feeds-carousel';
?>
<div class='sifs-feeds-outer-wrap <?php echo $class_additions; ?>'>
	<?php
	$index_count=0;
	foreach($self_feed['data'] as $feed){
		$index_count++;
		?>
		<div class='sifs-single-feed-media'>
			<div class="sifs-single-feed-image">
				<?php
				$user                       = $feed['user'];
				$image_details              = $feed['images'];
				
				$image_resolution           = isset($atts['feed_image_size']) ? $atts['feed_image_size'] : 'standard_resolution';
				$feed_image_url             = $image_details[$image_resolution]['url'];
				$created_time               = $feed['created_time'];
				
				$caption                    = $feed['caption'];
				$image_caption              = $caption['text'];
				
				$likes_count                = $insta->get_formatted_count($feed['likes']['count'], $number_format_option);
				$comments_count             = $insta->get_formatted_count($feed['comments']['count'], $number_format_option);
				
				$feed_type                  = $feed['type'];
				// $insta_link                 = $feed['link'];
				?>
					<img src='<?php echo esc_url($feed_image_url); ?>' alt='<?php echo esc_attr($image_caption); ?>' />
				
			</div>
			<div class="sifs-hover-properties">
				<?php
				/////////////////////////////////////////
				//like, comment, feed type, share icon //
				//
				///////////////////////////////////////
				?>

				<?php 
				if(isset($atts['hide_type']) && $atts['hide_type'] !='1'){ ?>
					<div class="sifs-feed-type">
						<?php if($feed_type == 'carousel'){ ?>
							<i class="fas fa-clone"></i>
						<?php }else if($feed_type == 'image'){ ?>
							<i class="fas fa-camera"></i>
						<?php }else if($feed_type == 'video'){ ?>
							<i class="fas fa-video"></i>
						<?php } ?>
					</div>
					<?php 
				} ?>
				<div class="sifs-com-shre-wrap">
				<?php if(isset($atts['hide_like_count']) && $atts['hide_like_count'] !='1'){ ?>
					<div class="sifs-like-count"><i class="fa fa-heart"></i><?php echo esc_html($likes_count); ?> </div>
				<?php } ?>
				
				<?php if(isset($atts['hide_comment_count']) && $atts['hide_comment_count'] !='1'){ ?>
					<div class="sifs-comment-count"><i class="fa fa-comment"></i><?php echo esc_html($comments_count); ?> </div>
				<?php } ?>
			</div>
			</div>
		</div>
		<?php
	}
	?>
</div>