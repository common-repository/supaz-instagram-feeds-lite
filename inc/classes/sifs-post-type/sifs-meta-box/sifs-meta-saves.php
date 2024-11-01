<?php 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// Save logic goes here. Don't forget to include nonce checks!
// Checks save status
$is_autosave = wp_is_post_autosave($post_id);
$is_revision = wp_is_post_revision($post_id);
$is_valid_nonce = ( isset($_POST['sifs_save_nonce']) && wp_verify_nonce($_POST['sifs_save_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
// Exits script depending on save status
if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
}
if(isset($_POST['sifs-feed'])){
	$sanitized_array = sifsLibrary:: sanitize_array($_POST['sifs-feed']);
}

if( isset($sanitized_array) ){
	update_post_meta($post_id, 'sifs-feed', $sanitized_array);
}
return;