<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<?php if(isset($atts['hide_name']) && $atts['hide_name'] !='yes'){ ?>
	<div class="sifs-user-full-name"><?php echo esc_html($full_name); ?></div>
<?php } ?>