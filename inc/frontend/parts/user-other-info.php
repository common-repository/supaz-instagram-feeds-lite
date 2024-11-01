<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="sifs-info-abt-usr">
	<?php 
	if(isset($atts['hide_username']) && $atts['hide_username'] !='1'){ ?>
		<div class="sifs-user-username"><a href='https://www.instagram.com/<?php echo esc_attr($username); ?>/'>@<?php echo esc_html($username); ?></a></div>
		<?php 
	} 
	
	if(isset($atts['hide_bio']) && $atts['hide_bio'] !='1'){ ?>
		<div class="sifs-user-bio-in"><?php echo esc_html($bio); ?></div>
		<?php 
	} 
	
	if(isset($atts['hide_website']) && $atts['hide_website'] !='1'){ ?>
		<div class="sifs-user-website"><a href='<?php echo esc_url($website); ?>' target='_blank'><?php echo esc_url($website); ?></a></div>
	<?php } ?>
</div>