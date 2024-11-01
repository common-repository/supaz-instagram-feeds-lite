<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="sifs-user-bio">
	<?php
	if(isset($atts['hide_name']) && $atts['hide_name'] != '1'){
		include('user-full-name.php');
	}
	include('user-other-info.php'); ?>
</div>