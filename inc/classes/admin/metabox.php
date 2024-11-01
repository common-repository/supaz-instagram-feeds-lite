<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if ( !class_exists( 'sifsMetaBox' ) ) {

	class sifsMetaBox extends sifsLibrary{

		function __construct() {
			add_action( 'add_meta_boxes', array( $this, 'sifs_add_metabox' ) );
    	add_action( 'save_post', array( $this, 'sifs_save_settings' ) );
    	add_action( "load-edit.php",array( $this, 'sifs_help_tabs' )  );
    	add_action( "load-post-new.php", array( $this, 'sifs_help_tabs' ) );
    	add_action( "load-post.php", array( $this, 'sifs_help_tabs' ) );
		}

		function sifs_add_metabox() {
			add_meta_box( 'supaz_instagram_feeds', __( 'Feed settings', SIFS_LITE_TD ), array( $this, 'sifs_meta_callback' ), 'sifs_posts', 'normal', 'core' );
		}

		function sifs_meta_callback( $post ) {
			include(SIFS_LITE_PATH . 'inc/classes/sifs-post-type/sifs-meta-box/sifs-meta-box.php');
		}

		function sifs_save_settings( $post_id ) {
			include(SIFS_LITE_PATH . 'inc/classes/sifs-post-type/sifs-meta-box/sifs-meta-saves.php');
		}

    function sifs_help_tabs() {
      $screen = get_current_screen();
      $screen_ids = array('sifs_posts','edit-sifs_posts' );

      if ( ! in_array( $screen->id, $screen_ids ) ) {
        return;
      }

      $screen->add_help_tab(
        array(
          'id'      => 'seb_overview',
          'title'   => 'Overview',
          'content' => '<p><strong>Supaz Instagram Feeds Lite</strong> is a light-weight WordPress Plugin to add instagram feeds to your site using shortcode.</p><p><strong>Supaz Instagram Feeds Lite</strong> uses API to fetch the instagram feeds images to show in a site. You can create as many feeds as you want.</p><p>Please go to the widgets area to use the instagram widgets that we offer. If you have any queries regarding our plugin please feel free to contact us using our profile contact form.'
        )
      );

      /*Add a sidebar to contextual help.*/
      $screen->set_help_sidebar( '<p><strong>Connect with us:</strong></p><p><a href="https://www.facebook.com/supazthemes/" target="_blank">Facebook</a></p><p><a href="https://twitter.com/supazthemes" target="_blank">Twitter</a></p>' );
    }
	}

	new sifsMetaBox();
}
