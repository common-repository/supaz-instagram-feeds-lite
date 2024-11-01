<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( !class_exists( 'supazInstagram' ) ) {
	class supazInstagram {
		function get_json_data( $url ){
	        $content = wp_remote_get( $url );
	        if( isset( $content->errors ) )
	        {
	            $content = json_encode( array ( 'meta'=>array( 'error_message'=>$content->errors['http_request_failed']['0'] ) ) );
	            $content = json_decode( $content, true );
	            return $content;
	        }else{
	            $response = wp_remote_retrieve_body( $content );
	            $json = json_decode( $response, true );
	            return $json;
	        }
	    }

		function getUserId($username){
	        $token =  $this->access_token;
	        $username = strtolower( $username ); // sanitization
 	        if( !empty( $username ) && !empty( $token ) )
	        {
	            $url = "https://api.instagram.com/v1/users/search?q=" . $username . "&access_token=" . $token;
	            $get = wp_remote_get( $url );
	            $response = wp_remote_retrieve_body( $get );
	            $json = json_decode( $response );
	            if(isset($json->data)){
	                foreach( $json->data as $user )
	                {
	                    if( $user->username == $username )
	                    {
	                        return $user->id;
	                    }
	                }
	            }
	            return '00000000'; // return this if nothing is found
	        }
		}

		function get_user_details(){
			$access_token = $this->access_token;
	        $url = "https://api.instagram.com/v1/users/self/?access_token=$access_token";
	        $json = self:: get_json_data( $url );
	        return $json;
		}


		function get_self_feed($count){
			$access_token = $this->access_token;
			$url          = "https://api.instagram.com/v1/users/self/media/recent/?access_token=$access_token" . "&count=" . $count;
			$json         = self:: get_json_data( $url );
	        return $json;
		}

    	/**
         *
         * @param int $count
         * @param string $format
         */
        static function get_formatted_count( $count, $format )
        {
            switch( $format )
            {
            case '2':
                $count = number_format( $count );
                break;

            case '3':
                $count = self::abreviateTotalCount( $count );
                break;

            default:
                break;
            }
            return $count;
        }
        
        /**
         *
         * @param integer $value
         * @return string
         */
        static function abreviateTotalCount( $value )
        {
            if($value == 0){
                return $value;
            }else{
                $abbreviations = array(12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '');
                foreach ($abbreviations as $exponent => $abbreviation) {
                    if ($value >= pow(10, $exponent)) {
                        return round(floatval($value / pow(10, $exponent)), 1) . $abbreviation;
                    }
                }
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

        static function timeDuration( $tm, $rcs = 0 ){
            $cur_tm = time();
            $dif = $cur_tm - $tm;
            $pds = array('second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade');
            $lngh = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);
            
            for( $v = sizeof( $lngh ) - 1;( $v >= 0 ) &&(( $no = $dif / $lngh[$v] ) <= 1 );$v-- );
            if( $v < 0 )$v = 0;
            $_tm = $cur_tm -( $dif % $lngh[$v] );
            $no = floor( $no );
            if( $no <> 1 )$pds[$v].= 's';
            $x = sprintf( "%d %s ", $no, $pds[$v] );
            if(( $rcs == 1 ) &&( $v >= 1 ) &&(( $cur_tm - $_tm ) > 0 ) )$x.= time_ago( $_tm );
            return $x . 'ago';
        }
	}
}