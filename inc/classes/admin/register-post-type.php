<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( !class_exists( 'sifsPostType' ) ) {

	class sifsPostType extends sifsLibrary{
		function __construct() {
			add_action( 'init', array( $this, 'sifs_register_post_type' ) );
		}
		
		function sifs_register_post_type() {
			include(SIFS_LITE_PATH . 'inc/classes/sifs-post-type/sifs-custom-post-type.php');
		}
	}
	new sifsPostType();
}