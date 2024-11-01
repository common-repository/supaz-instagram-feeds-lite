<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="sifs-user-info-wrap">
	<div class="sifs-clearfix">
		<?php 
		if(isset($atts['hide_profile_image']) && $atts['hide_profile_image'] != '1'){
			include('profile-image.php');
		}
		include('user-bio.php');
		?>
	</div>
</div>