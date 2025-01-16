<?php
// Navigation


$menu_style = teamhost_get_theme_mod('menu_style');
if(is_page()){
    if(teamhost_get_theme_mod('page_navigator', true) == 'custom'){
        $menu_style = teamhost_get_theme_mod('menu_style', 'true');
    }
}
if(is_single()){
    if(teamhost_get_theme_mod('post_navigator', true) == 'custom'){
        $menu_style = teamhost_get_theme_mod('post_menu_style', 'true');
    }
}
?>

<?php if(teamhost_get_theme_mod('footer_mailchimp') == 'enable'){ ?>
    <?php
    $footer_mailchimp_title = teamhost_get_theme_mod('footer_mailchimp_title');
    $footer_mailchimp_form = teamhost_get_theme_mod('footer_mailchimp_form');

    $footer_download_title = teamhost_get_theme_mod('footer_download_title');
    $footer_download_text = teamhost_get_theme_mod('footer_download_text');

    $footer_download_app_link_one = teamhost_get_theme_mod('footer_download_app_link_one');
    $footer_download_app_img_one = teamhost_get_theme_mod('footer_download_app_img_one');
    $footer_download_app_link_two = teamhost_get_theme_mod('footer_download_app_link_two');
    $footer_download_app_img_two = teamhost_get_theme_mod('footer_download_app_img_two');
    ?>
    <section class="newsletter">
        <div class="uk-section uk-container uk-container-xlarge">
            <div class="newsletter__inner">
                <?php if(class_exists('MC4WP_Container')){ ?>
                    <div class="newsletter-form">
                        <?php if(isset($footer_mailchimp_title) && $footer_mailchimp_title != ''){?>
                            <div class="newsletter-form__title">
                                <h4>
                                    <?php
                                    $allowed_html = array(
                                        'br'     => array()
                                    );
                                    echo wp_kses($footer_mailchimp_title, $allowed_html);
                                    ?>
                                </h4>
                            </div>
                        <?php } ?>
                        <?php if(isset($footer_mailchimp_form) && $footer_mailchimp_form != ''){ ?>
                            <div class="newsletter-form__form">
                                <?php echo do_shortcode('[mc4wp_form id="' .$footer_mailchimp_form .'"]');?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="download-app">
                    <?php if(isset($footer_download_title) && $footer_download_title != '' ){?>
                        <div class="download-app__title">
                            <h4><?php echo esc_html($footer_download_title)?></h4>
                            <?php if(isset($footer_download_text) && $footer_download_text != '' ){?>
                                <p><?php echo esc_html($footer_download_text)?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if(isset($footer_download_app_img_one) && $footer_download_app_img_one != '' && isset($footer_download_app_img_two) && $footer_download_app_img_two != ''){?>
                        <div class="download-app__links">
                            <a class="download-link" href="<?php echo esc_url($footer_download_app_link_one)?>" target="_blank">
                                <img src="<?php echo esc_url($footer_download_app_img_one)?>" alt="<?php echo esc_attr('appstore');?>">
                            </a>
                            <a class="download-link" href="<?php echo esc_url($footer_download_app_link_two)?>" target="_blank">
                                <img src="<?php echo esc_url($footer_download_app_img_two)?>" alt="<?php echo esc_attr('appstore');?>">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<?php if( class_exists('TM_Helper_Core_Addons')){ ?>
    <?php if(is_active_sidebar( 'footer-sidebar-1' ) ||  is_active_sidebar( 'footer-sidebar-2' ) ||  is_active_sidebar( 'footer-sidebar-3' )) {?>
        <section class="fl-section fl-footer">
            <div class="fl-container">
                <div uk-grid>
                    <div class="uk-width-1-4@m">
                        <div class="page-header__logo">
                            <?php if (teamhost_get_theme_mod( 'footer_logo_image')){ ?>
                                <img src="<?php echo esc_url(teamhost_get_theme_mod( 'footer_logo_image')); ?>" alt="<?php echo esc_attr('logotype')?>"/>
                                <span class="page-header__logo_text"><?php esc_attr(bloginfo('title')); ?></span>
                            <?php } else { ?>
                                <span class="page-header__logo_text"><?php esc_attr(bloginfo('title')); ?></span>
                            <?php } ?>
                        </div>
                        <?php if (teamhost_get_theme_mod( 'footer_logo_text')){ ?>
                            <div class="finfo"><?php echo esc_attr(teamhost_get_theme_mod( 'footer_logo_text')); ?></div>
                        <?php } ?>
                    </div>
                    <div class="uk-width-1-4@m">
                        <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?>
                            <?php dynamic_sidebar( 'footer-sidebar-1' );?>
                        <?php } ?>
                    </div>

                    <div class="uk-width-1-4@m">
                        <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
                            <?php dynamic_sidebar( 'footer-sidebar-2' );?>
                        <?php } ?>
                    </div>
                    <div class="uk-width-1-4@m">
                        <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
                            <?php dynamic_sidebar( 'footer-sidebar-3' );?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>


<?php
if(teamhost_get_theme_mod('footer_copyrights') && !is_404() && $menu_style != 'style_two'){ ?>
    <div class="fl-copy">
        <?php $footer_copy_allowed_html = array(
            'a' => array(
                'href'  => true,
                'title' => true,
            ),
            'b'     => array(),
            'span' => array(),
        );
        echo wp_kses(teamhost_get_theme_mod('footer_copyrights'), $footer_copy_allowed_html);?>
    </div>
<?php } ?>