<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class='sifs-counter-wrap '>
	<div class="sifs-clearfix">
		<div class="sifs-counter-wrap-inner">
			<div class="sifs-posts-count sifs-count">
				<?php echo $insta->get_formatted_count($posts_count, $number_format_option); ?>
			</div>
			<div class="sifs-posts sifs-count-label">
				<?php _e('Posts', 'supaz-instagram-feeds-lite'); ?>
			</div>
		</div>
		<div class=" sifs-counter-wrap-inner">
			<div class='sifs-followers-count sifs-count'>
				<?php echo $insta->get_formatted_count($followers_count, $number_format_option); ?>
			</div>
			<div class="sifs-followers sifs-count-label">
				<?php _e('Followers', 'supaz-instagram-feeds-lite'); ?>
			</div>
		</div>
		<div class=" sifs-counter-wrap-inner">
			<div class='sifs-follows-count sifs-count'>
				<?php echo $insta->get_formatted_count($follows_count, $number_format_option); ?>
			</div>
			<div class="sifs-follows sifs-count-label">
				<?php _e('Following', 'supaz-instagram-feeds-lite'); ?>
			</div>
		</div>
	</div>
</div>