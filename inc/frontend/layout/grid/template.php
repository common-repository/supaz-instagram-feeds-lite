<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

if($layout =='grid-layout' || $layout=='masonry'){
	$appended_classes_jay = $column_class." sifs-".$layout." "." sifs-".$layout."-". $layout_template;
}else if($layout =='slider-layout'){
	$appended_classes_jay = 'sifs-'.$layout.' '."sifs-".$layout."-".$layout_template;
}else{
	$appended_classes_jay ='';
}
?>	
<div class="sifs-plugins-inner-wrap <?php echo esc_attr($appended_classes_jay); ?> sifs-unique-id-<?php echo esc_attr($post_id); ?>">
	<?php 
	if(isset($feed_data['meta']['code']) && $feed_data['meta']['code'] == '200'){
	$data_count = count($feed_data['data']);

	if($layout=='slider-layout'){
		$add_classes1 ='sifs-slider-layouts';
		if( $layout_template == 'template-1' ){
			$data_prev_text = "PREV";
			$data_next_text = "NEXT";
			$pager_type     = ''; //short
		}else if($layout_template == 'template-4'){
			$data_prev_text = "PREV";
			$data_next_text = "NEXT";
			$pager_type     = 'short';
		}else{
			$data_prev_text = "PREV";
			$data_next_text = "NEXT";
			$pager_type     = 'full';
		}
		$mode             = isset($display_settings['slider']['mode']) ? $display_settings['slider']['mode'] : 'horizontal';
		$hide_controls    = isset( $display_settings['slider']['hide-controls'] ) ? 'false' : 'true';
		$hide_pager       = isset( $display_settings['slider']['hide-dots'] ) ? 'false' : 'true';
		$speed            = isset( $display_settings['slider']['speed'] ) && $display_settings['slider']['speed'] !='' ? $display_settings['slider']['speed'] : '500';
		$randomstart      = isset( $display_settings['slider']['random-start'] ) ? 'true' : 'false';
		$infiniteloop     = isset( $display_settings['slider']['infinite-loop'] ) ? 'true' : 'false';
		$keyboardenabled  = isset( $display_settings['slider']['enable-keyboard'] ) ? 'true' : 'false';
		$auto             = isset( $display_settings['slider']['auto-play'] ) ? 'true' : 'false';
		
		$add_attributes   ="data-next-text='{$data_next_text}' data-prev-text='{$data_prev_text}' data-pager-type='{$pager_type}' data-auto='{$auto}' data-keyboard='{$keyboardenabled}' data-loop='{$infiniteloop}' data-randomstart='{$randomstart}' data-speed='{$speed}' data-pager='{$hide_pager}' data-controls={$hide_controls} data-mode='{$mode}'";
	}else{
		
		if( isset($display_settings['grid']['enable-masonry']) ){
			$add_classes1 ='sifs-masonry-layouts';
			$add_attributes ='';
		}else{
			$add_classes1 ='sifs-grid-common-class';
			$add_attributes ='';
		}
	}
 	?>
	<div class="sifs-individual-item-wrap <?php echo esc_attr($add_classes1); ?> sifs-clearfix" <?php echo $add_attributes; ?> data-feed-id='<?php echo $post_id; ?>'>
		<?php include('feed-items.php'); ?>
	</div>
	<?php
}else{ 
	$error_message = (isset($feed_data['error_message']) && $feed_data['error_message'] !='') ? $feed_data['error_message'] : __( 'Something went wrong. Looks like the connection is lost. Please check.', 'supaz-instagram-feeds-lite' );
	?>
	<div class="sifs-error-div"><?php echo esc_html($error_message); ?></div>
	<?php
}
?>
</div>