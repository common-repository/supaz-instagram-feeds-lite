<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$inner_classes_add = ''; 
?>
<div class="sifs-individual-item-wrap-inner <?php echo esc_attr($inner_classes_add); ?>">
    <div class='sifs-feed-image' ><?php 
        if(!isset($display_settings['slider']['hide-show']['image-type'])){ ?>
            <div class="sifs-image-type"><?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/media-type.php'); ?></div><?php  
        } ?>
            <?php if($layout_template == 'template-1'){ ?>
            <?php }else if($layout_template =='template-2'){ ?>
                <div class="sifs-popup-insta-link-wrap">
                    <?php if(!isset($display_settings['slider']['hide-show']['instagram-link'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/instagram-link.php'); } ?>
                </div>
            <?php } ?>
        <?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/feed-image.php'); ?>
    </div>

    <?php 
    if(!isset($display_settings['slider']['hide-content'])){ ?>
        <div class="sifs-content-wrap">
            <?php
            if( $layout_template == 'template-1' ){
                $add_classes = '';
                ?>
                <div class="sifs-user-img-name-insta-link <?php echo esc_attr($add_classes); ?>">    
                    <div class="sifs-user-img-name">
                        <?php if(!isset($display_settings['slider']['hide-show']['profile-image'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/profile-picture.php'); } ?>
                        <div class="sifs-name-username-wrap">
                            <?php if(!isset($display_settings['slider']['hide-show']['name'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/name.php'); } ?>
                            <?php if(!isset($display_settings['slider']['hide-show']['username'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/username.php'); } ?>
                        </div>
                    </div>
                    <?php if(!isset($display_settings['slider']['hide-show']['instagram-link'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/instagram-link.php'); } ?>
                </div>
                <?php if(!isset($display_settings['slider']['hide-show']['posted-ago'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/posted-ago.php'); } ?>
                <?php if(!isset($display_settings['slider']['hide-show']['image-caption'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/image-caption.php'); } ?>
                
                <div class="sifs-like-comment-shares sifs-clearfix">    
                    <div class="sifs-like-comment">
                        <?php if(!isset($display_settings['slider']['hide-show']['like-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/like-counts.php'); } ?>
                        <?php if(!isset($display_settings['slider']['hide-show']['comment-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/comment-counts.php'); } ?>
                    </div>
                    <?php 
                    if(!isset($display_settings['slider']['hide-show']['share-button'])){ ?>
                        <span class="sifs-shares">
                            <div class='sifs-shares-fa-wrap'>
                                <i class="fas fa-share"></i>
                            </div>
                            <div class="sifs-share-icons" style="display: block;">
                                <?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/social-share.php'); ?>
                            </div>
                        </span>
                        <?php 
                    } ?>
                </div>
                <?php 
            }else if( $layout_template =='template-2' ){ ?>
                <div class="sifs-user-img-name">
                    <?php if(!isset($display_settings['slider']['hide-show']['profile-image'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/profile-picture.php'); } ?>
                    <div class="sifs-name-username-wrap">
                        <?php if(!isset($display_settings['slider']['hide-show']['name'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/name.php'); } ?>
                        <?php if(!isset($display_settings['slider']['hide-show']['username'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/username.php'); } ?>
                    </div>
                </div>
                <div class="sifs-like-comment">
                    <?php if(!isset($display_settings['slider']['hide-show']['like-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/like-counts.php'); } ?>
                    <?php if(!isset($display_settings['slider']['hide-show']['comment-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/comment-counts.php'); } ?>
                </div>
                <?php if(!isset($display_settings['slider']['hide-show']['posted-ago'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/posted-ago.php'); } ?>
                <?php if(!isset($display_settings['slider']['hide-show']['image-caption'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/image-caption.php'); } ?>
                <?php 
                if(!isset($display_settings['slider']['hide-show']['share-button'])){ ?>
                    <span class="sifs-shares">
                        <div class="sifs-share-text"><?php _e('Share the story', 'supaz-instagram-feeds-lite'); ?></div>
                        <div class="sifs-share-icons" style="display: block;">
                            <?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/social-share.php'); ?>
                        </div>
                    </span><?php 
                } ?>
                <?php
            } ?>
        </div>
        <?php 
    } ?>
</div>