<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $sifs_settings, $insta;
$sifs_settings = get_option('sifs_settings');

$insta                    = new supazInstagram();
$insta->access_token      = $sifs_settings['access_token'];
$user_details             = $insta->get_user_details();

$no_of_images             = isset($atts['no_of_images']) ? $atts['no_of_images'] : '20';
$enable_lightbox          = isset($atts['enable_lightbox']) ? $atts['enable_lightbox'] : 'no';
$lightbox_type            = isset($atts['lightbox_type']) ? $atts['lightbox_type'] : '1';

$template                 = isset($atts['template']) ? $atts['template'] : '1';

$transient_name           = 'sifs_feeds_widget'. $template;
$cache_settings['enable'] = isset($atts['enable_cache']) ? $atts['enable_cache'] : '0';
$cache_period             = isset($atts['cache_period']) ? $atts['cache_period'] : 5;

if(isset($cache_settings['enable']) && $cache_settings['enable'] == '1' ){
	$transient_value = get_transient( $transient_name );
	// sifsLibrary:: print_array($transient_value);
	// die();
	if( isset($transient_value->self_feed['meta']['error_message']) || $transient_value =='' || (!isset($transient_value)) || ($transient_value->no_of_images != $no_of_images) ){
		$self_feed = $insta->get_self_feed($no_of_images);
		// sifsLibrary:: print_array($self_feed);
		$data = new stdClass();
		$data->no_of_images = $no_of_images;
		$data->self_feed = $self_feed;
		set_transient( $transient_name, $data, 60*$cache_period );
	}else{
		$self_feed = $transient_value->self_feed;
	}
}else{
	$self_feed = $insta->get_self_feed($no_of_images);
	
}

$number_format_option = isset($atts['number_format']) ? $atts['number_format']: '1';
?>

<div class='sifs-widgets-wrap sifs-plugin-common-class sifs-widget-template-<?php echo $template; ?>'>
	<?php
	if(isset($user_details['meta']['code']) && $user_details['meta']['code'] == '200'){
		$user_details_data   = $user_details['data'];
		$username            = $user_details_data['username'];
		$profile_picture     = $user_details_data['profile_picture'];
		$full_name           = $user_details_data['full_name'];
		$bio                 = $user_details_data['bio'];
		$website             = $user_details_data['website']; 
		$is_business         = $user_details_data['is_business']; 
		$fan_followers_count = $user_details_data['counts'];
		$posts_count         = $fan_followers_count['media'];
		$follows_count       = $fan_followers_count['follows'];
		$followers_count     = $fan_followers_count['followed_by'];
		
		switch ($template) {
			case '1':
				///////////////////////////////////////////
				if($self_feed['meta']['code'] =='200'){
					if(isset($atts['hide_feed_images']) && $atts['hide_feed_images'] !='1'){
						include('parts/feed.php');
					}
				}else{
					echo "<pre>";
					print_r($self_feed['meta']);
					echo "</pre>";
				}
				if(isset($atts['hide_counter']) && $atts['hide_counter'] != '1'){
					include('parts/user_counts.php');
				}
				include('parts/user_info.php');

				//////////////////////////////////////////////////
				# code...
				break;
			
			case '2':
				///////////////////////////////////////////
				?>
				<div class="sifs-slider-profile-image-wrap">
					<?php
					if($self_feed['meta']['code'] =='200'){
						if(isset($atts['hide_feed_images']) && $atts['hide_feed_images'] !='1'){
							include('parts/feed.php');
						}
					}else{
						$error_message = (isset($self_data['error_message']) && $self_data['error_message'] !='') ? $self_data['error_message'] : __( 'Something went wrong. Looks like the connection is lost. Please check.', 'supaz-instagram-feeds-lite' );
						?>
						<div class="sifs-error-div"><?php echo esc_html($error_message); ?></div>
						<?php
					}

					include('parts/profile-image.php');
					include('parts/user-bio.php');
					?>
				</div>
				<?php
				if(isset($atts['hide_counter']) && $atts['hide_counter'] != '1'){
					include('parts/user_counts.php');
				}

				//////////////////////////////////////////////////
				# code...
				break;

				default:
				# code...
				break;
		}
	}else{
		$error_message = (isset($user_details['error_message']) && $user_details['error_message'] !='') ? $user_details['error_message'] : __( 'Something went wrong. Looks like the connection is lost. Please check.', 'supaz-instagram-feeds-lite' );
		?>
		<div class="sifs-error-div"><?php echo esc_html( $error_message ); ?></div>
		<?php
	}
	?>
</div>
<?php
wp_enqueue_style('sifs-fontawesome-css');
wp_enqueue_style('sifs-fontawesome-shims-css');
wp_enqueue_style('sifs-slick-css' );
wp_enqueue_style('sifs-slick-theme-css' );

wp_enqueue_script('sifs-slick-js');

$dependencies = array('jquery', 'sifs-slick-js');
wp_enqueue_script('sifs-frontend-js', '', $dependencies);