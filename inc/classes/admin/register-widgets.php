<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
 * Adds AccessPress Social Login Widget
 */

class sifsWidget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'sifs_widget', // Base ID
                __('Supaz Instagram Feeds', 'supaz-instagram-feeds-lite' ), // Name
                array('description' => __('Supaz Instagram Widget', 'supaz-instagram-feeds-lite' )) // Args
        );
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {

        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = '';
        }

        if (isset($instance['template'])) {
            $template = $instance['template'];
        } else {
            $template = '';
        }

        if (isset($instance['hide_counter'])) {
            $hide_counter = $instance['hide_counter'];
        } else {
            $hide_counter = '';
        }

        if (isset($instance['hide_profile_image'])) {
            $hide_profile_image = $instance['hide_profile_image'];
        } else {
            $hide_profile_image = '';
        }

        if (isset($instance['hide_name'])) {
            $hide_name = $instance['hide_name'];
        } else {
            $hide_name = '';
        }

        if (isset($instance['hide_username'])) {
            $hide_username = $instance['hide_username'];
        } else {
            $hide_username = '';
        }

        if (isset($instance['hide_bio'])) {
            $hide_bio = $instance['hide_bio'];
        } else {
            $hide_bio = '';
        }

        if (isset($instance['hide_website'])) {
            $hide_website = $instance['hide_website'];
        } else {
            $hide_website = '';
        }        
        
        if (isset($instance['number_format'])) {
            $number_format = $instance['number_format'];
        } else {
            $number_format = '';
        }

        if (isset($instance['number_of_images'])) {
            $number_of_images = $instance['number_of_images'];
        } else {
            $number_of_images = '';
        }

        if (isset($instance['hide_feed_images'])) {
            $hide_feed_images = $instance['hide_feed_images'];
        } else {
            $hide_feed_images = '';
        }
        
        if (isset($instance['image_size'])) {
            $image_size = $instance['image_size'];
        } else {
            $image_size = '';
        }

        if (isset($instance['hide_like_count'])) {
            $hide_like_count = $instance['hide_like_count'];
        } else {
            $hide_like_count = '';
        }

        if (isset($instance['hide_comment_count'])) {
            $hide_comment_count = $instance['hide_comment_count'];
        } else {
            $hide_comment_count = '';
        }

        // if (isset($instance['hide_share_buttons'])) {
        //     $hide_share_buttons = $instance['hide_share_buttons'];
        // } else {
        //     $hide_share_buttons = '';
        // }

        // if (isset($instance['hide_type'])) {
        //     $hide_type = $instance['hide_type'];
        // } else {
        //     $hide_type = '';
        // }

        // if (isset($instance['enable_lightbox'])) {
        //     $enable_lightbox = $instance['enable_lightbox'];
        // } else {
        //     $enable_lightbox = '';
        // }

        // if (isset($instance['lightbox_type'])) {
        //     $lightbox_type = $instance['lightbox_type'];
        // } else {
        //     $lightbox_type = '';
        // }


        if (isset($instance['enable_cache'])) {
            $enable_cache = $instance['enable_cache'];
        } else {
            $enable_cache = '';
        }

        if (isset($instance['cache_period'])) {
            $cache_period = $instance['cache_period'];
        } else {
            $cache_period = '';
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title: ', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('template'); ?>"><?php _e( 'Template: ', 'supaz-instagram-feeds-lite' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('template'); ?>" name="<?php echo $this->get_field_name('template'); ?>" >
                <?php for($i=1;$i<=2;$i++){
                ?>
                    <option value="<?php echo $i;?>" <?php selected( $template,''.$i ); ?>><?php echo $i; ?></option>
                <?php
                }?>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_counter'); ?>"><?php _e( 'Hide Counter?', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('hide_counter'); ?>" name="<?php echo $this->get_field_name('hide_counter'); ?>" type="checkbox" value="1" <?php checked($hide_counter, true);?>/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_profile_image'); ?>"><?php _e( 'Hide Profile Image?', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('hide_profile_image'); ?>" name="<?php echo $this->get_field_name('hide_profile_image'); ?>" type="checkbox" value="1" <?php checked($hide_profile_image,true);?>/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_name'); ?>"><?php _e( 'Hide Name?', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('hide_name'); ?>" name="<?php echo $this->get_field_name('hide_name'); ?>" type="checkbox" value="1" <?php checked($hide_name,true);?> />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_username'); ?>"><?php _e( 'Hide Username?', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('hide_username'); ?>" name="<?php echo $this->get_field_name('hide_username'); ?>" type="checkbox" value="1" <?php checked($hide_username,true);?> />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_bio'); ?>"><?php _e( 'Hide Bio?', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('hide_bio'); ?>" name="<?php echo $this->get_field_name('hide_bio'); ?>" type="checkbox" value="1" <?php checked($hide_bio, true );?> />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_website'); ?>"><?php _e( 'Hide Website?', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('hide_website'); ?>" name="<?php echo $this->get_field_name('hide_website'); ?>" type="checkbox" value="1" <?php checked($hide_website,true);?> />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('number_format'); ?>"><?php _e( 'Number format', 'supaz-instagram-feeds-lite' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('number_format'); ?>" name="<?php echo $this->get_field_name('number_format'); ?>" >
                    <option value="1" <?php selected( $number_format, '1' ); ?> >number only(1200)</option>
                    <option value="2" <?php selected( $number_format, '2' ); ?> >1,200</option>
                    <option value="3" <?php selected( $number_format, '3' ); ?> >1.2k</option>
            </select>
        </p> 
        <p>
            <label for="<?php echo $this->get_field_id('number_of_images'); ?>"><?php _e( 'Number of Images', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_images'); ?>" name="<?php echo $this->get_field_name('number_of_images'); ?>" type="text" value="<?php echo esc_attr($number_of_images); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('hide_feed_images'); ?>"><?php _e( 'Hide feed Images', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('hide_feed_images'); ?>" name="<?php echo $this->get_field_name('hide_feed_images'); ?>" type="checkbox" value="1" <?php checked($hide_feed_images,true);?>/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_size'); ?>"><?php _e( 'Image Size', 'supaz-instagram-feeds-lite' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('image_size'); ?>" name="<?php echo $this->get_field_name('image_size'); ?>" >
                <option value="thumbnail" <?php selected( $image_size, 'thumbnail' ); ?> >Thumbnail</option>
                <option value="low_resolution" <?php selected( $image_size, 'low_resolution' ); ?> >Low Resolution</option>
                <option value="standard_resolution" <?php selected( $image_size, 'standard_resolution' ); ?> >Standard Resolution</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('enable_cache'); ?>"><?php _e( 'Enable cache', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('enable_cache'); ?>" name="<?php echo $this->get_field_name('enable_cache'); ?>" type="checkbox" value="1" <?php checked( $enable_cache,true );?> />
        </p>
        <p>        
            <label for="<?php echo $this->get_field_id('cache_period'); ?>"><?php _e( 'Cache Period(in minutes)', 'supaz-instagram-feeds-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('cache_period'); ?>" name="<?php echo $this->get_field_name('cache_period'); ?>" type="text" value="<?php echo esc_attr($cache_period); ?>" />
        </p>

        <?php
    }

     /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo "<div class='sifs-widget'>";
        echo do_shortcode("[supaz-istagram-feeds-widget template='{$instance['template']}' hide_counter='{$instance['hide_counter']}' hide_profile_image='{$instance['hide_profile_image']}' hide_name='{$instance['hide_name']}' hide_username='{$instance['hide_username']}' hide_bio='{$instance['hide_bio']}' hide_website='{$instance['hide_website']}' number_format='{$instance['number_format']}' no_of_images='{$instance['number_of_images']}'  hide_feed_images='{$instance['hide_feed_images']}' feed_image_size='{$instance['image_size']}' hide_like_count='{$instance['hide_like_count']}' hide_comment_count='{$instance['hide_comment_count']}' hide_share_button='{$instance['hide_share_buttons']}' hide_type='0' enable_lightbox='{$instance['enable_lightbox']}' lightbox_type='{$instance['lightbox_type']}' enable_cache='{$instance['enable_cache']}' cache_period='{$instance['cache_period']}' ]");
        echo "</div>";
        echo $args['after_widget'];
    }


    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['template'] = (!empty($new_instance['template']) ) ? strip_tags($new_instance['template']) : '';
        $instance['hide_counter'] = (!empty($new_instance['hide_counter']) ) ? strip_tags($new_instance['hide_counter']) : '';
        $instance['hide_profile_image'] = (!empty($new_instance['hide_profile_image']) ) ? strip_tags($new_instance['hide_profile_image']) : '';
        $instance['hide_name'] = (!empty($new_instance['hide_name']) ) ? strip_tags($new_instance['hide_name']) : '';
        $instance['hide_username'] = (!empty($new_instance['hide_username']) ) ? strip_tags($new_instance['hide_username']) : '';
        $instance['hide_bio'] = (!empty($new_instance['hide_bio']) ) ? strip_tags($new_instance['hide_bio']) : '';
        $instance['hide_website'] = (!empty($new_instance['hide_website']) ) ? strip_tags($new_instance['hide_website']) : '';
        $instance['number_format'] = (!empty($new_instance['number_format']) ) ? strip_tags($new_instance['number_format']) : '';
        $instance['number_of_images'] = (!empty($new_instance['number_of_images']) ) ? strip_tags($new_instance['number_of_images']) : '';
        $instance['hide_feed_images'] = (!empty($new_instance['hide_feed_images']) ) ? strip_tags($new_instance['hide_feed_images']) : '';
        $instance['image_size'] = (!empty($new_instance['image_size']) ) ? strip_tags($new_instance['image_size']) : '';
        $instance['hide_like_count'] = (!empty($new_instance['hide_like_count']) ) ? strip_tags($new_instance['hide_like_count']) : '';
        $instance['hide_comment_count'] = (!empty($new_instance['hide_comment_count']) ) ? strip_tags($new_instance['hide_comment_count']) : '';
        // $instance['hide_share_buttons'] = (!empty($new_instance['hide_share_buttons']) ) ? strip_tags($new_instance['hide_share_buttons']) : '';
        // $instance['hide_type'] = (!empty($new_instance['hide_type']) ) ? strip_tags($new_instance['hide_type']) : '';
        // $instance['enable_lightbox'] = (!empty($new_instance['enable_lightbox']) ) ? strip_tags($new_instance['enable_lightbox']) : '';
        // $instance['lightbox_type'] = (!empty($new_instance['lightbox_type']) ) ? strip_tags($new_instance['lightbox_type']) : '';

        $instance['enable_cache'] = (!empty($new_instance['enable_cache']) ) ? strip_tags($new_instance['enable_cache']) : '';
        $instance['cache_period'] = (!empty($new_instance['cache_period']) ) ? strip_tags($new_instance['cache_period']) : '';
        return $instance;
    }
}


add_action( 'widgets_init', 'register_sifs_widget' );
//registration of the social login widget

function register_sifs_widget() {
    register_widget( 'sifsWidget' );
}