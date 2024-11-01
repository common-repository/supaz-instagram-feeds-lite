<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

if($layout == 'grid-layout'){

    wp_enqueue_style('sifs-fontawesome-css');
    wp_enqueue_style('sifs-fontawesome-shims-css');
    // wp_enqueue_style('sifs-animate-css');
    // wp_enqueue_style('sifs-m-custom-scrollbar-css');
    wp_enqueue_style('sifs-slick-css' );
    wp_enqueue_style('sifs-slick-theme-css' );
    // wp_enqueue_style( 'sifs-animate-css');

    wp_enqueue_script('sifs-slick-js');
    // wp_enqueue_script('wow-js');
    wp_enqueue_script('imageloaded-js');
    wp_enqueue_script('isotope-js');
    // wp_enqueue_script('sifs-m-custom-scrollbar-js');


    $dependencies = array('jquery', 'sifs-slick-js', 'imageloaded-js', 'isotope-js');
    wp_enqueue_script('sifs-frontend-js', '', $dependencies);
    
}else if($layout == 'slider-layout'){
    wp_enqueue_style('sifs-fontawesome-css');
    wp_enqueue_style('sifs-fontawesome-shims-css');
    wp_enqueue_style('sifs-slick-theme-css' );
    wp_enqueue_style('sifs-slick-css' );
    wp_enqueue_style('sifs-bx-slider-css');
    // wp_enqueue_style('sifs-m-custom-scrollbar-css');

    wp_enqueue_script('sifs-slick-js');
    wp_enqueue_script('imageloaded-js');
    wp_enqueue_script('sifs-bx-slider');
    // wp_enqueue_script('sifs-m-custom-scrollbar-js');

    $dependencies = array('jquery', 'sifs-slick-js', 'imageloaded-js', 'sifs-bx-slider');
    wp_enqueue_script('sifs-frontend-js', '', $dependencies);
}

wp_localize_script ( 'sifs-frontend-js', 'sifs_frontend_object', array(
                                                                    'layout' => $layout
                                                                    )
                    );

if(!empty($feed_data['data'])){
    $formated_array = array();
    $sort_images_by = $feed_settings['sorting'];
    $order_by       = $feed_settings['order-by'];
    $number_format  = $feed_settings['number-format'];

    foreach($feed_data['data'] as $key=>$data) {
        $likes                                 = esc_attr($data['likes']['count']);
        $comments                              = esc_attr($data['comments']['count']);
        $formated_array[$key]                  = $data;
        $formated_array[$key]['likes_count']   = $likes;
        $formated_array[$key]['comment_count'] = $comments;
    };

    if(!empty($sort_images_by) && $sort_images_by =='random') {
        shuffle($formated_array);
    }else if(!empty($sort_images_by) && $sort_images_by == 'likes') {
        if($formated_array){
            usort( $formated_array, array($this, 'LikeSorting' ) );
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'comments') {
        if($formated_array){
            usort( $formated_array, array($this, 'commentSorting' ) );
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'date') {
        if($formated_array){
            usort( $formated_array, array($this, 'dateSorting' ) );
        }
    }
    $feed_data['data'] = $formated_array;

    $count = 0;
    foreach ( $feed_data['data'] as $key => $feeds ) {
        $count++;
        $username                     = $feeds['user']['username'];
        $full_name                    = isset($feeds['user']['full_name']) ? $feeds['user']['full_name'] : '';
        $profile_picture              = isset($feeds['user']['profile_picture']) ? $feeds['user']['profile_picture'] : SIFS_LITE_IMG_DIR.'/instagram.png';
        
        $image_size                   = isset($feed_settings['image-size']) ? $feed_settings['image-size'] : 'thumbnail';
        $image_settings               = $feeds['images'];
        $image_url                    = $image_settings[$image_size]['url'];
        $image_url_full               = $image_settings['standard_resolution']['url'];
        $image_caption                = $feeds['caption']['text'];
        $image_caption_from_username  = $feeds['caption']['from']['username'];
        $image_caption_from_full_name = isset($feeds['caption']['from']['full_name']) ? $feeds['caption']['from']['full_name'] : '';
        $created_time                 = supazInstagram:: timeDuration($feeds['created_time']);
        
        $image_likes_count            = supazInstagram:: get_formatted_count( $feeds['likes']['count'], $number_format );
        $image_comments_count         = supazInstagram:: get_formatted_count( $feeds['comments']['count'], $number_format );
        
        $image_type                   = $feeds['type'];
        $instagram_link               = $feeds['link'];

        if($image_type == 'video'){
            $video_url = $feeds['videos']['standard_resolution']['url'];
        }

        $carousel_array = array();
        if($image_type == 'carousel'){
            foreach ($feeds['carousel_media'] as $key => $carousel_item) {
                $carousel_type = $carousel_item['type'];
                switch ($carousel_type) {
                    case 'image':
                        $image_url_carousel = $carousel_item['images']['standard_resolution']['url']; // 
                        $carousel_array[] = array(
                                            'type' => 'image',
                                            'url' => $image_url_carousel
                                            );
                        break;

                    case 'video':
                        $video_url = $carousel_item['videos']['standard_resolution']['url']; // standard_resolution -640, low_bandwidth -480, low_resolution -480
                        $carousel_array[] = array(
                                            'type' => 'video',
                                            'url' => $video_url
                                            );
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
        }

        if($layout == 'grid-layout' && isset($grid_settings['item-animation']['enable'])){
            $append_animate_classes = 'wow '.$grid_settings['item-animation']['type']; 
        }else{
            $append_animate_classes = '';
        }
        ?>
            <?php
            if($layout == 'grid-layout'){
                ?>    
                <div class="sifs-individual-item <?php echo esc_attr($append_animate_classes); ?>">
                    <?php
                    switch ($layout_template) {
                        case 'template-1':
                            include('feed-items/template-1.php');
                            break;

                        default:
                            include('feed-items/template-1.php');
                            break;
                    }

                    ?>
                </div>
            <?php    
            }else if($layout =='slider-layout'){
                ?>
                <div class="sifs-individual-item">
                    <?php
                    switch ($layout_template) {
                        case 'template-1':
                            include('feed-items/slider/template-1.php');
                            break;

                        default:
                            include('feed-items/slider/template-1.php');
                            break;
                    }
                    ?>
                </div>
                <?php
            }
    }
}