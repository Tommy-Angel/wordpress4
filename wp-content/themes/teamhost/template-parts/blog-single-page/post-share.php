
<ul class="social">
    <?php $fl_share_platforms  = teamhost_get_theme_mod('social_sharing_setting'); ?>
    <?php if ( ! empty( $fl_share_platforms  ) ) : ?>
        <?php foreach ( $fl_share_platforms  as $checked_value ) : ?>
            <?php switch ($checked_value) {
                case 'fb' :
                    $fl_icon = 'facebook';
                    break;
                case 'twi' :
                    $fl_icon = 'twitter';
                    break;
                case 'lin' :
                    $fl_icon = 'linkedin';
                    break;
                case 'you' :
                    $fl_icon = 'youtube';
                    break;
            } ?>
            <li class="social__item">
                <a href="<?php echo esc_url(tm_get_share($checked_value)); ?>" class="social__link <?php echo esc_attr($checked_value); ?>" onclick="window.open(this.href, 'Share this post', 'width=600,height=300'); return false">
                    <span data-uk-icon="<?php echo esc_attr($fl_icon); ?>"></span>
                </a>
            </li>

        <?php endforeach; ?>
    <?php endif; ?>
</ul>




