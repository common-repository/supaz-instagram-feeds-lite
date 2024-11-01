<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>

<div class="sifs-header-wrap">
    <div class="sifs-header-logo">
        <h2><?php esc_attr_e('Supaz Instagram Feeds Lite', 'supaz-instagram-feeds-lite'); ?></h2>
        <span class="sifs-plugin-version">Ver <?php echo SIFS_LITE_VERSION; ?></span>
    </div>

    <div class="supaz-social-profiles">
        <p><?php _e('Follow us for new updates', 'supaz-instagram-feeds-lite') ?></p>
        <div class="supaz-social-profile">
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fsupazthemes&width=68&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=196518897138687" width="68" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="supaz-social-profile">
            <a href="https://twitter.com/supazthemes?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @supazthemes</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
</div>