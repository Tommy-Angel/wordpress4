<?php if(teamhost_get_theme_mod('fb') || teamhost_get_theme_mod('twi') || teamhost_get_theme_mod('linkedin')
|| teamhost_get_theme_mod('yt') ||  teamhost_get_theme_mod('insta')){?>
    <ul class="social">
        <?php if(teamhost_get_theme_mod('header_fb')){ ?>
            <li class="social__item">
                <a class="social__link" href="<?php echo esc_url(teamhost_get_theme_mod('header_fb')); ?>" target="_blank">
                    <span data-uk-icon="facebook"></span>
                </a>
            </li>
        <?php } ?>
        <?php if(teamhost_get_theme_mod('header_twi')){ ?>
            <li class="social__item">
                <a class="social__link" href="<?php echo esc_url(teamhost_get_theme_mod('header_twi')); ?>" target="_blank">
                    <span data-uk-icon="twitter"></span>
                </a>
            </li>
        <?php } ?>
        <?php if(teamhost_get_theme_mod('header_insta')){ ?>
            <li class="social__item">
                <a class="social__link" href="<?php echo esc_url(teamhost_get_theme_mod('header_insta')); ?>" target="_blank">
                    <span data-uk-icon="instagram"></span>
                </a>
            </li>
        <?php } ?>
        <?php if(teamhost_get_theme_mod('header_linkedin')){ ?>
            <li class="social__item">
                <a class="social__link" href="<?php echo esc_url(teamhost_get_theme_mod('header_linkedin')); ?>" target="_blank">
                    <span data-uk-icon="linkedin"></span>
                </a>
            </li>
        <?php } ?>
        <?php if(teamhost_get_theme_mod('header_yt')){ ?>
            <li class="social__item">
                <a class="social__link" href="<?php echo esc_url(teamhost_get_theme_mod('header_yt')); ?>" target="_blank">
                    <span data-uk-icon="youtube"></span>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php }?>