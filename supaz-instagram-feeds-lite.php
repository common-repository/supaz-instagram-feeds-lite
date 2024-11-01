<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
  Plugin Name: Supaz Instagram Feeds Lite - Add Instagram feeds to your site using shortcodes
  Plugin URI:  http://www.supazthemes.com/plugins/supaz-instagram-feeds-lite
  Description: Easy way to add instagram feeds to your WordPress site.
  Version:     1.0.2
  Author:      Supazthemes
  Author URI:  http://www.supazthemes.com/
  License:     GPL2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages/
  Text Domain: supaz-instagram-feeds-lite
*/

if(!class_exists('supazInstagramFeedsLite')){
  class supazInstagramFeedsLite{
    function __construct() {
      $this->define_constants();
      $this->includes();
    }

    function define_constants() {
      defined( 'SIFS_LITE_PATH' ) or define( 'SIFS_LITE_PATH', plugin_dir_path( __FILE__ ) );
      defined( 'SIFS_LITE_DIR_PATH' ) or define( 'SIFS_LITE_DIR_PATH', plugin_dir_url( __FILE__ ) );
      defined( 'SIFS_LITE_IMG_DIR' ) or define( 'SIFS_LITE_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' );
      defined( 'SIFS_LITE_CSS_DIR' ) or define( 'SIFS_LITE_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );
      defined( 'SIFS_LITE_JS_DIR' ) or define( 'SIFS_LITE_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );
      defined( 'SIFS_LITE_VERSION' ) or define( 'SIFS_LITE_VERSION', '1.0.2' );
      defined( 'SIFS_LITE_TD' ) or define( 'SIFS_LITE_TD', 'supaz-instagram-feeds-lite' );
      defined( 'SIFS_LITE_BASENAME' ) or define( 'SIFS_LITE_BASENAME', plugin_basename( __FILE__ ) );
    }

    function includes() {
      require_once SIFS_LITE_PATH . 'inc/classes/admin/init.php';
      require_once SIFS_LITE_PATH . 'inc/classes/supaz-instagram-library.php';
      require_once SIFS_LITE_PATH . 'inc/classes/admin/library.php';
      require_once SIFS_LITE_PATH . 'inc/classes/admin/enqueue.php';
      require_once SIFS_LITE_PATH . 'inc/classes/admin/register-post-type.php';
      require_once SIFS_LITE_PATH . 'inc/classes/admin/register-widgets.php';
      require_once SIFS_LITE_PATH . 'inc/classes/admin/metabox.php';
      require_once SIFS_LITE_PATH . 'inc/classes/mobile_Detect.php';
    }
  }

  $supazInstagramFeedsLite = new supazInstagramFeedsLite();
}