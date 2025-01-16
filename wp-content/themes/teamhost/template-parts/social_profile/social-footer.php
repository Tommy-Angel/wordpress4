<?php if(teamhost_get_theme_mod('fb') || teamhost_get_theme_mod('twi') ||teamhost_get_theme_mod('pin') || teamhost_get_theme_mod('linkedin')
|| teamhost_get_theme_mod('yt') || teamhost_get_theme_mod('vime') || teamhost_get_theme_mod('gpl') || teamhost_get_theme_mod('insta') || teamhost_get_theme_mod('beh')){?>
    <div class="footer-social">
        <?php if(teamhost_get_theme_mod('fb')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('fb')); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('twi')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('twi')); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('pin')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('pin')); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('linkedin')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('linkedin')); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('yt')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('yt')); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('vime')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('vime')); ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('gpl')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('gpl')); ?>"><i class="fa fa-google" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('insta')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('insta')); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php } ?>
        <?php if(teamhost_get_theme_mod('beh')){ ?><a class="fl_footer_social_icon" href="<?php echo esc_url(teamhost_get_theme_mod('beh')); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a><?php } ?>
    </div>
<?php }?>