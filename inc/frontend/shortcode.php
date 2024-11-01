<?php 
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

global $sifs_settings, $insta;

$sifs_settings           = get_option( 'sifs_settings' );

$sifs_dynamic_css_at_end = array();
$google_fonts_array      = array();

$post_id                 = $atts['id'];
$feed_data               = get_post_meta($post_id, 'sifs-feed', true);

// sifsLibrary:: print_array($feed_data);

$feed_settings           = isset($feed_data['feed-settings']) ? $feed_data['feed-settings'] : array();

// sifsLibrary:: print_array($feed_settings);

$display_settings        = isset($feed_data['display-settings']) ? $feed_data['display-settings'] : array();

// sifsLibrary:: print_array($display_settings);

$layout                  = isset($display_settings['layout']) ? $display_settings['layout'] : array();

$access_token            = isset($sifs_settings['access_token']) ? $sifs_settings['access_token'] : '';
$feed_type               = isset($feed_settings['feed-type']) ? $feed_settings['feed-type']: '';

$insta                   = new supazInstagram();
$insta->access_token     = isset($access_token) ? $access_token : $sifs_settings['access_token'];
$user_details            = $insta->get_user_details();
$no_of_images            = isset($feed_settings['no-of-images']) ? $feed_settings['no-of-images'] : '10';
$enable_lightbox         = isset($display_settings['grid']['enable_lightbox']) ? $atts['grid']['enable_lightbox'] : 'no'; 
$username                = isset($user_details['data']['username']) ? $user_details['data']['username'] : '';
$insta->username         = $username;
$template                = isset($atts['template']) ? $atts['template'] : '1';
$number_format_option    = isset($atts['number_format']) ? $atts['number_format']: '1';
$feed_data               = array();

$cache_settings = isset($feed_settings['cache']) ? $feed_settings['cache']: array();
$cache_period = isset($cache_settings['period']) ? $cache_settings['period'] : '1';

$transient_name = 'sifs_feeds_'.$post_id;

switch ($feed_type) {
	case 'recent-media':
		// before fetching need to set transitent to overcome API Limit and if there is change in the image number count
		if(isset($cache_settings['enable'])){
			$transient_value = get_transient( $transient_name );

			if( isset($transient_value->feed_data['meta']['error_message']) || $transient_value =='' || (!isset($transient_value)) || ($transient_value->no_of_images != $no_of_images) || ($transient_value->feed_type != $feed_type) ){
				$feed_data = $insta->get_self_feed($no_of_images);
				$data = new stdClass();
				$data->feed_type = $feed_type;
				$data->no_of_images = $no_of_images;
				$data->feed_data = $feed_data;
				set_transient( $transient_name, $data, 60*$cache_period );
			}else{
				$feed_data = $transient_value->feed_data;
			}
		}else{
			$feed_data = $insta->get_self_feed($no_of_images);
			
		}

		break;

	default:
		break;
}

?>

<div class="sifs-plugins-outer-wrap sifs-plugin-common-class">
	<?php 
	switch ($layout) {
		case 'grid-layout':
			$grid_settings   = $display_settings['grid'];
			$layout_template = $grid_settings['template'];
			$hover_settings  = isset($grid_settings['hover']) ? $grid_settings['hover'] : '';
			$column_settings = $grid_settings['columns'];
			
			$detect = new sifs_Mobile_Detect;
			// Any mobile device (phones or tablets); Excluding tablets.
			if( $detect->isMobile() && !$detect->isTablet() ){
			  // echo "Mobile Detected";
			  $column_class = "sifs-column-{$column_settings['mobile']}";
			}
			// Any tablet device.
			else if( $detect->isTablet() ){
			  // echo "Tablet Detected";
			  $column_class = "sifs-column-{$column_settings['tablet']}";
			}
			// any desktop devices
			else{
				// echo "Desktop detected";
				$column_class = "sifs-column-{$column_settings['desktop']}";
			}

			include('layout/grid/template.php');
			break;

		case 'slider-layout':
			$slider_settings = $display_settings['slider'];
			$layout_template = $slider_settings['template'];
			include('layout/grid/template.php');
			break;

		default:
			# code...
			break;
	} ?>
</div>