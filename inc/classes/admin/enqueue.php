<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if ( !class_exists( 'sifsEnqueueScripts' ) ) {

	class sifsEnqueueScripts extends sifsLibrary{

		function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'register_backend_assets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) );
		}

		function register_backend_assets() {
			// CSS 
			// wp_enqueue_style( 'wp-color-picker');
			wp_enqueue_style( 'sifs-jqueryui-css', SIFS_LITE_CSS_DIR . '/jquery-ui.min.css', array(), SIFS_LITE_VERSION );
			wp_enqueue_style( 'sifs-background-css', SIFS_LITE_CSS_DIR . '/backend.css', array(), SIFS_LITE_VERSION );
			
			// JS
			// wp_enqueue_script( 'sifs-color-picker-js', SIFS_LITE_JS_DIR . '/wp-color-picker-alpha.js', array( 'jquery', 'wp-color-picker' ), SIFS_LITE_VERSION );
			wp_enqueue_media();
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-slider');

			wp_enqueue_script( 'sifs-backend-script', SIFS_LITE_JS_DIR . '/backend.js', array( 'jquery'), SIFS_LITE_VERSION );
			
			//for the backend ajax call
            $ajax_nonce = wp_create_nonce( 'sifs-backend-ajax-nonce' );
            wp_localize_script( 'sifs-backend-script', 'sifs_object', array('ajax_nonce' => $ajax_nonce) );
		}

		function register_frontend_assets() {
			// css
			wp_enqueue_style( 'sifs-frontend-css', SIFS_LITE_CSS_DIR. '/frontend.css' );
			wp_enqueue_style( 'sifs-google-fonts', 'https://fonts.googleapis.com/css?family=Rubik|Lato|Oxygen|Open+Sans|Roboto|Roboto+Slab|Oxygen', false );
			wp_register_style( 'sifs-fontawesome-css', SIFS_LITE_CSS_DIR.'/font-awesome/all.css' );
			wp_register_style( 'sifs-fontawesome-shims-css', SIFS_LITE_CSS_DIR.'/font-awesome/v4-shims.css', array(), '5.2.0' );

			wp_register_style('sifs-bx-slider-css', SIFS_LITE_CSS_DIR . '/jquery.bxslider.css', array(), '4.2.12' );
			wp_register_style('sifs-slick-css', SIFS_LITE_DIR_PATH. 'inc/library/slick/slick.css' );
			wp_register_style('sifs-slick-theme-css', SIFS_LITE_DIR_PATH. 'inc/library/slick/slick-theme.css' );
			
			// js
			wp_register_script('sifs-slick-js', SIFS_LITE_DIR_PATH. 'inc/library/slick/slick.min.js', array( 'jquery' ), '1.9.0' );
			wp_register_script( 'imageloaded-js', SIFS_LITE_JS_DIR . '/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.4' );
			wp_register_script( 'isotope-js', SIFS_LITE_JS_DIR . '/isotope.pkgd.min.js', array( 'jquery' ), '3.0.6' );
			wp_register_script( 'sifs-modernizr-js', SIFS_LITE_JS_DIR . '/modernizr.custom.26633.js', array( 'jquery' ), '2.6.2' );

			wp_register_script( 'sifs-bx-slider', SIFS_LITE_JS_DIR . '/jquery.bxslider.min.js', array( 'jquery' ), '4.2.12' );
			wp_register_script( 'sifs-frontend-js', SIFS_LITE_JS_DIR . '/frontend.js', array( 'jquery' ), SIFS_LITE_VERSION, true);
			$ajax_nonce = wp_create_nonce( 'sifs-frontend-ajax-nonce' );
			$sifs_settings = get_option( 'sifs_settings' );
			$enable_links = isset($sifs_settings['enable_links']) ? 'on' : 'off';
            wp_localize_script ( 'sifs-frontend-js', 'sifs_frontend_ajax_object', array(
            																	'ajax_url' => admin_url() . 'admin-ajax.php', 
            																	'ajax_nonce' => $ajax_nonce,
            																	'enable_links' => $enable_links
            																	) 
        						);

		}
	}
	
	new sifsEnqueueScripts();
}