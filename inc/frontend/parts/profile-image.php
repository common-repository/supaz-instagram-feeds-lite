<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<?php if(isset($atts['hide_profile_image']) && $atts['hide_profile_image'] !='yes'){ ?>
	<div class="sifs-user-image"><img src='<?php echo esc_url($profile_picture); ?>' alt='<?php echo esc_attr($full_name); ?>' /></div>
<?php }