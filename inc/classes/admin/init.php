<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if(!class_exists('sifs_Init')){
	class sifsInit{
		function __construct(){
			add_action('init',array($this,'init'));
		}
		
		function init(){
			load_plugin_textdomain( 'supaz-instagram-feeds-lite', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
			do_action('sifs_init');
			add_action('admin_menu', array($this, 'register_about_page')); //add submenu page
            add_action( 'admin_post_sifs-save-instagram-settings', array($this, 'save_instagram_settings') );

            add_filter('manage_sifs_posts_posts_columns', array($this, 'sifs_columns_head')); //adding custom row
            add_action('manage_sifs_posts_posts_custom_column', array($this, 'sifs_columns_content'), 10, 2); //adding custom row content
            add_filter('post_row_actions', array($this, 'remove_row_actions'), 10, 1);

            //backend ajax calls
            add_action( 'wp_ajax_sifs_backend_ajax', array($this, 'sifs_backend_ajax') );
            add_action( 'wp_ajax_nopriv_sifs_backend_ajax', array($this, 'sifs_backend_ajax') );

            add_action( 'wp_ajax_sifs_frontend_ajax', array($this, 'sifs_frontend_ajax') );
            add_action( 'wp_ajax_nopriv_sifs_frontend_ajax', array($this, 'sifs_frontend_ajax') );

            // widget shortcode
            add_shortcode( 'supaz-istagram-feeds-widget', array($this, 'register_instagram_feeds_widget') );

            // feed shortcode
			add_shortcode( 'supaz-instagram-feeds', array($this, 'register_instagram_feeds') );

            add_action('template_redirect', array($this, 'generate_access_token'));

            // add_action( 'wp_footer', array($this, 'popup_div'));
            

		}

        /**
          Generate Access Token
         * */
        function generate_access_token() {
            if (isset($_GET['access_token'])) {
                echo "<div class='supaz-access-token-field'>";
                echo __('Your access token is : ', 'supaz-instagram-feeds-lite') . sanitize_text_field($_GET['access_token']);
                echo "</div>";
                echo "<div class='supaz-access-token-field-note'>";
                echo __('Please copy the AccessToken and paste in the Access Token Field in the previous tab.', 'supaz-instagram-feeds-lite');
                echo "</div>";
                die();
            }
        }

        /**
         * Popup div
         * 
         * @return mixed this is the popup div for the lightobx
         */
        // function popup_div(){
        //     echo "<div class='sifs-popup-outer-wrap'></div>";
        // }

        function sifs_frontend_ajax(){
            $nonce = $_POST['_wpnonce'];

            $created_nonce = 'sifs-frontend-ajax-nonce';
            if ( ! wp_verify_nonce( $nonce, $created_nonce ) ) {
                die( __( 'Security check', 'supaz-instagram-feeds-lite' ) );
            }
            die();
        }

        function sifs_backend_ajax(){
            global $sifs_settings, $insta;
            $sifs_settings       = get_option('sifs_settings');
            $insta               = new supazInstagram();
            $insta->access_token = $sifs_settings['access_token'];
            $nonce               = $_POST['_wpnonce'];
            $created_nonce       = 'sifs-backend-ajax-nonce';
            if ( ! wp_verify_nonce( $nonce, $created_nonce ) ) {
                die( __( 'Security check', 'supaz-instagram-feeds-lite' ) );
            }


            if( $_POST['_action'] == 'fetch_locations' ){
                $lat       = $_POST['lat'];
                $long      = $_POST['long'];
                $locations = $insta-> get_locations_by_lat_long( $lat, $long );
                if( $locations['meta']['code'] == '200' ){ ?>
                    <select class='sifs-placeid-select-options'>
                    <?php
                    foreach ($locations['data'] as $key => $value) { ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo esc_attr($value['name']); ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    <?php
                }
            }
            die();
        }

		function remove_row_actions($actions) {
            if (get_post_type() == 'sifs_posts') { // choose the post type where you want to hide the button
                unset($actions['view']); // this hides the VIEW button on your edit post screen
                unset($actions['inline hide-if-no-js']);
            }
            return $actions;
        }


		/*
        * Add custom column to smartlogo post
        */

        function sifs_columns_head($columns) {
            $columns['shortcodes'] = __('Shortcode', 'supaz-instagram-feeds-lite');
            $columns['template'] = __('Template Shortcode', 'supaz-instagram-feeds-lite');
            return $columns;
        }

        /*
         * Added content to custom column
        */

        function sifs_columns_content($column, $post_id) {
            if ($column == 'shortcodes') {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="25" readonly="readonly">[supaz-instagram-feeds id='<?php echo $post_id; ?>']</textarea><?php
            }
            if ($column == 'template') {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="45" readonly="readonly">&lt;?php echo do_shortcode("[supaz-instagram-feeds id='<?php echo $post_id; ?>']"); ?&gt;</textarea><?php
            }
        }


		function register_instagram_feeds_widget($atts){
			ob_start();
            include(SIFS_LITE_PATH.'inc/frontend/widget-shortcode.php');
            $return_data = ob_get_contents();
            ob_end_clean();
            if(isset($return_data)){
            	return $return_data;
            }else{
            	return NULL;
            }
		}

        function register_instagram_feeds($atts){
            ob_start();
            include(SIFS_LITE_PATH.'inc/frontend/shortcode.php');
            $return_data = ob_get_contents();
            ob_end_clean();
            if(isset($return_data)){
                return $return_data;
            }else{
                return NULL;
            }
        }

		function register_about_page(){
			add_submenu_page( 'edit.php?post_type=sifs_posts', __('Instagram Settings', 'supaz-instagram-feeds-lite'), __('Instagram Settings', 'supaz-instagram-feeds-lite'), 'manage_options', 'supaz-instagram-settings', array($this, 'instagram_settings_submenu_page_callback'));
			add_submenu_page( 'edit.php?post_type=sifs_posts', __('About Us', 'supaz-instagram-feeds-lite'), __('About Us', 'supaz-instagram-feeds-lite'), 'manage_options', 'about-us', array($this, 'about_us_submenu_page_callback'));
        }

        function about_us_submenu_page_callback() {
            include('about.php');
        }

        function instagram_settings_submenu_page_callback(){
        	include('instagram-settings.php');
        }

        function save_instagram_settings(){
        	if( !empty( $_POST ) && wp_verify_nonce( $_POST['sifs-nonce-field'], 'sifs-nonce' ) ){
                $sanitized_array = sifsLibrary:: sanitize_array($_POST['sifs_settings']);
				update_option( 'sifs_settings', $sanitized_array );
				wp_redirect(admin_url().'edit.php?post_type=sifs_posts&page=supaz-instagram-settings&message=1');
            }
        }

        static function likeSorting($a, $b) {
            return $b['likes_count'] - $a['likes_count'];
        }

        static function commentSorting($a, $b) {
            return $b['comment_count'] - $a['comment_count'];
        }

        static function dateSorting($a, $b) {
            return $b['created_time'] - $a['created_time'];
        }
	}
	new sifsInit();
}