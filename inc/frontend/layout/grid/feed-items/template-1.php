<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="sifs-individual-item-wrap-inner">
    <div class="sifs-image-wrap">
         <?php 
            if(!isset($display_settings['grid']['hide-show']['image-type'])){ ?>
                <div class="sifs-image-type"><?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/media-type.php'); ?></div>
                <?php 
            } ?>
        <div class="sifs-overlay-icon-wrap">
            <div class="sifs-overlay"></div><?php 
            if($layout_template == 'template-1'){ ?>
                <div class="sifs-popup-insta-link-wrap"><?php
                    if(!isset($display_settings['grid']['hide-show']['instagram-link'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/instagram-link.php'); } ?>
                </div><?php 
            }else if($layout_template =='template-2'){ ?>
                <div class="sifs-popup-insta-link-wrap">
                    <?php 
                    if(!isset($display_settings['grid']['hide-show']['instagram-link'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/instagram-link.php'); } ?>
                </div>

                <div class="sifs-like-comment-share"> <?php
                    if(!isset($display_settings['grid']['hide-show']['share-button'])){ ?>
                        <span class="sifs-shares">
                            <div class="sifs-share-text"><?php _e('Share', 'supaz-instagram-feeds-lite'); ?></div>
                            <div class="sifs-share-icons" style="display: block;">
                                <?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/social-share.php'); ?>
                            </div>
                        </span>
                        <?php 
                    }
                    if(!isset($display_settings['grid']['hide-show']['like-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/like-counts.php'); }
                    if(!isset($display_settings['grid']['hide-show']['comment-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/comment-counts.php'); } ?>
                </div><?php 
            } ?>
        </div>
        <div class='sifs-feed-image'>
            <?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/feed-image.php'); ?>
        </div>
        
        <?php 
        if($layout_template == 'template-1' || $layout_template == 'template-2' ){ ?>
            <div class="sifs-user-img-name">
                <?php if(!isset($display_settings['grid']['hide-show']['profile-image'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/profile-picture.php'); } ?>
                <?php if(!isset($display_settings['grid']['hide-show']['username'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/username.php'); } ?>
            </div><?php
        } ?>
    </div>

    <div class="sifs-content-wrap">
        <?php 
        if($layout_template == 'template-1' || $layout_template == 'template-2' ){ ?>
        <?php if(!isset($display_settings['grid']['hide-show']['posted-ago'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/posted-ago.php'); } ?>
        <?php if(!isset($display_settings['grid']['hide-show']['image-caption'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/image-caption.php'); } ?>
            <div class="sifs-like-comment-share"><?php 
                if($layout_template !='template-6'){ ?>
                    <?php if(!isset($display_settings['grid']['hide-show']['comment-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/comment-counts.php'); } ?>
                    <?php if(!isset($display_settings['grid']['hide-show']['like-count'])){ include(SIFS_LITE_PATH.'inc/frontend/layout/parts/like-counts.php'); } ?>
                    <?php 
                }
                if(!isset($display_settings['grid']['hide-show']['share-button'])){ ?>    
                    <span class="sifs-shares">
                        <i class="fas fa-share"></i>
                        <div class="sifs-share-icons" style="display: block;">
                            <?php include(SIFS_LITE_PATH.'inc/frontend/layout/parts/social-share.php'); ?>
                        </div>
                    </span><?php 
                } ?>
            </div>
            <?php 
        } ?>
    </div>
</div>