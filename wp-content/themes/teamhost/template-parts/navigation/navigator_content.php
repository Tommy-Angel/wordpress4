<?php
//Navigator class
$navigation_css_class = '';

$css_classes[] = 'fl-header--navigation';


// Navigation
$menu_style = teamhost_get_theme_mod('menu_style');
$language = teamhost_get_theme_mod('language');
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

if($menu_style == 'style_two'){
    $css_classes[] = '--two-line';
}
$header_logo_text = teamhost_get_theme_mod('header_logo_text');
$search_icon = teamhost_get_theme_mod('search_icon');
// Button
$header_btn_link = '';
$header_btn_text = teamhost_get_theme_mod('header_btn_text');
if(class_exists('WeDevs_Dokan')){
     $dukan_dash = get_option('dokan_pages', true);
     $header_btn_link = get_permalink($dukan_dash['dashboard']);
}


$nav_user = teamhost_get_theme_mod('nav_user');
if($search_icon == 0){
    $css_classes[] = 'tm-search-block-disable';
}
$nav_contact = teamhost_get_theme_mod('nav_contact');
$nav_phone_text = teamhost_get_theme_mod('nav_phone_text');
$nav_phone_number = teamhost_get_theme_mod('nav_phone_number');
if($menu_style == 'disable'){
 $css_classes[] = 'teamhost_navi_disable';
}
$is_404 = '';
if($menu_style == 'style_one'){
    if(is_404()){
        $is_404 = 'not_found_404_page';
    }
}

if( !class_exists('TM_Helper_Core_Addons')){
    $css_classes[] = 'plugin-disable';
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

?>
<!--Header Start-->
<header class="page-header demo-1 <?php echo esc_attr($css_class); ?> cf" id="fl-header">
        <div class="page-header__inner">
         <?php
                $css_side = '';
                if ( !has_nav_menu( 'general-menu' ) && !has_nav_menu( 'mobile-menu' ) ) {
                    $css_side = 'side_mobile_menu_disable';
                };

                ?>
            <div class="page-header__sidebar <?php echo esc_attr($css_side)?>">
                <div class="page-header__menu-btn dl-menuwrapper" id="dl-menu">
                    <?php if ( has_nav_menu( 'general-menu' ) || has_nav_menu( 'mobile-menu' ) ) { ?>
                        <button class="dl-trigger menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button menu-btn">
                            <span class="toggle-menu-button-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    <?php } ?>
                    <?php if ( has_nav_menu( 'mobile-menu' ) ) { ?>
                        <?php wp_nav_menu(array(
                                'theme_location'    => 'mobile-menu',
                                'menu_class'        => 'menu uk-navbar-nav uk-navbar',
                                'container'         => false,
                                'id'                => 'mobile-menu',
                                'depth'             => 8,
                                'fallback_cb'       => 'teamhost_menu_fallback'
                        )); ?>
                    <?php } else { ?>
                        <?php wp_nav_menu(array(
                                'theme_location'    => 'general-menu',
                                'menu_class'        => 'menu uk-navbar-nav uk-navbar',
                                'container'         => false,
                                'id'                => 'general-menu',
                                'depth'             => 8,
                                'fallback_cb'       => 'teamhost_menu_fallback'
                        )); ?>
                     <?php } ?>
                </div>
                <?php
                $css_logo = '';
                if ( !has_nav_menu( 'general-menu' ) && !has_nav_menu( 'mobile-menu' ) ) {
                    $css_logo = 'mobile_menu_disable';
                };
                ?>
                <div class="page-header__logo <?php echo esc_attr($css_logo);?>">
                    <a href="<?php echo esc_url(home_url("/"))?>">
                        <?php if (teamhost_get_theme_mod( 'site_logo')){ ?>
                            <img src="<?php echo esc_url(teamhost_get_theme_mod( 'site_logo')); ?>" alt="<?php echo esc_attr('logotype')?>"/>
                            <span class="page-header__logo_text"><?php esc_attr(bloginfo('title')); ?></span>
                        <?php } else { ?>
                            <span class="page-header__logo_text"><?php esc_attr(bloginfo('title')); ?></span>
                        <?php } ?>
                    </a>
                </div>
            </div>
            <?php
            if($menu_style == 'style_one'){ ?>
                <?php if ( has_nav_menu( 'general-menu' ) ) {?>
                    <div class="page-header__mainmenu">
                        <nav class="fl-mega-menu nav-menu">
                            <?php wp_nav_menu(array(
                                'theme_location'    => 'general-menu',
                                'class'             => 'header-menu nav-menu',
                                'container'         => false,
                                'id'                => 'general-menu',
                                'depth'             => 8,
                                'fallback_cb'       => 'teamhost_menu_fallback'
                            )); ?>
                        </nav>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if($menu_style == 'style_two'){ ?>
                <div class="page-header__content">
                    <?php if($search_icon == "enable"){ ?>
                        <div class="page-header__search">
                            <div class="search">
                                <div class="search__input"><i class="ico_search"></i>
                                    <form class="form-sidebar" id="search-global-form" action="<?php echo site_url()?>">
                                        <input role="search" type="search" id="search-field" name="s" placeholder="<?php echo esc_attr_e('Search', 'teamhost')?>" value="<?php echo get_search_query(); ?>">
                                    </form>
                                </div>
                                <div class="search__btn"><button type="button" id="voice-trigger"><i class="ico_microphone"></i></button></div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="page-header__action">
                        <?php if($menu_style == 'style_two'){ ?>
                            <?php if($language == 'enable'){ ?>
                                <?php $languages = teamhost_get_theme_mod('languages'); ?>
                                <?php if(function_exists('wpm_get_language')){?>
                                    <ul class="uk-subnav uk-nav-lang  uk-subnav-pill" uk-margin>
                                    <?php if (isset($languages) && !empty($languages)){ ?>
                                        <li>
                                            <?php
                                            foreach ($languages as $lang){ ?>
                                                <?php if(isset($_GET['lang']) && $_GET['lang'] != ''){?>
                                                    <?php if($lang['link_id'] == $_GET['lang'] ){ ?>
                                                        <?php if(isset($lang['link_text']) && $lang['link_text'] != ''){
                                                            if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                                $lang_url = $lang['link_url'];
                                                            } else {
                                                                $lang_url = '#';
                                                            }
                                                            ?>
                                                             <a href="<?php echo esc_url($lang_url);?>">
                                                                 <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                    <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                                 <?php } ?>
                                                                <?php echo esc_html($lang['link_text']);?>
                                                                <span uk-icon="icon: triangle-down"></span>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                      <?php if($lang['link_id'] == wpm_get_language()){ ?>
                                                        <?php if(isset($lang['link_text']) && $lang['link_text'] != ''){
                                                            if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                                $lang_url = $lang['link_url'];
                                                            } else {
                                                                $lang_url = '#';
                                                            }
                                                            ?>
                                                             <a href="<?php echo esc_url($lang_url);?>">
                                                                 <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                    <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                                 <?php } ?>
                                                                <?php echo esc_html($lang['link_text']);?>
                                                                <span uk-icon="icon: triangle-down"></span>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php  } ?>
                                            <?php } ?>
                                            <div uk-dropdown="mode: hover">
                                                <ul class="uk-nav uk-dropdown-nav">
                                                    <?php
                                                    foreach ($languages as $lang){ ?>
                                                        <?php if(isset($_GET['lang']) && $_GET['lang'] != ''){ ?>
                                                            <?php if($lang['link_id'] != $_GET['lang']){ ?>
                                                                <?php if(isset($lang['link_text']) && $lang['link_text'] != ''){
                                                                    if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                                        $lang_url = $lang['link_url'];
                                                                    } else {
                                                                        $lang_url = '#';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo esc_url($lang_url);?>">
                                                                            <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                                <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                                            <?php } ?>
                                                                            <?php echo esc_html($lang['link_text']);?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <?php if($lang['link_id'] != wpm_get_language()){ ?>
                                                                <?php if(isset($lang['link_text']) && $lang['link_text'] != ''){
                                                                    if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                                        $lang_url = $lang['link_url'];
                                                                    } else {
                                                                        $lang_url = '#';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo esc_url($lang_url);?>">
                                                                            <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                                <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                                            <?php } ?>
                                                                            <?php echo esc_html($lang['link_text']);?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <?php } else { ?>
                                    <ul class="uk-subnav uk-nav-lang  uk-subnav-pill" uk-margin>
                                    <?php if (isset($languages) && !empty($languages)){ ?>
                                        <li>
                                            <?php
                                            $i = 0;
                                            foreach ($languages as $lang){ ?>
                                                <?php if(isset($_GET['lang']) && $_GET['lang'] != ''){?>
                                                    <?php if($lang['link_id'] == $_GET['lang'] ){ ?>
                                                        <?php if(isset($lang['link_text']) && $lang['link_text'] != ''){
                                                            if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                                $lang_url = $lang['link_url'];
                                                            } else {
                                                                $lang_url = '#';
                                                            }
                                                            ?>
                                                             <a href="<?php echo esc_url($lang_url);?>">
                                                                 <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                    <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                                 <?php } ?>
                                                                <?php echo esc_html($lang['link_text']);?>
                                                                <span uk-icon="icon: triangle-down"></span>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if(isset($lang['link_text']) && $lang['link_text'] != '' && $i == 0){
                                                        if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                            $lang_url = $lang['link_url'];
                                                        } else {
                                                            $lang_url = '#';
                                                        }
                                                        ?>
                                                         <a href="<?php echo esc_url($lang_url);?>">
                                                             <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                             <?php } ?>
                                                            <?php echo esc_html($lang['link_text']);?>
                                                            <span uk-icon="icon: triangle-down"></span>
                                                        </a>
                                                    <?php } ?>
                                                <?php  } ?>
                                            <?php $i++; } ?>
                                            <div uk-dropdown="mode: hover">
                                                <ul class="uk-nav uk-dropdown-nav">
                                                    <?php
                                                    $j = 0;
                                                    foreach ($languages as $lang){ ?>
                                                        <?php if(isset($_GET['lang']) && $_GET['lang'] != ''){ ?>
                                                            <?php if($lang['link_id'] != $_GET['lang']){ ?>
                                                                <?php if(isset($lang['link_text']) && $lang['link_text'] != ''){
                                                                    if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                                        $lang_url = $lang['link_url'];
                                                                    } else {
                                                                        $lang_url = '#';
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo esc_url($lang_url);?>">
                                                                            <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                                <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                                            <?php } ?>
                                                                            <?php echo esc_html($lang['link_text']);?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <?php if(isset($lang['link_text']) && $lang['link_text'] != '' && $j != 0){
                                                                if(isset($lang['link_url']) && $lang['link_url'] != ''){
                                                                    $lang_url = $lang['link_url'];
                                                                } else {
                                                                    $lang_url = '#';
                                                                }
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($lang_url);?>">
                                                                        <?php if(isset($lang['link_image']) && $lang['link_image'] != ''){ ?>
                                                                            <img src="<?php echo esc_url($lang['link_image'])?>" alt="<?php echo esc_attr_e('profile', 'teamhost');?>" class="profile">
                                                                        <?php } ?>
                                                                        <?php echo esc_html($lang['link_text']);?>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php $j++;} ?>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if($nav_user == 1){ ?>
                            <?php if(is_user_logged_in()){ ?>
                                <?php if(class_exists('BuddyPress') && class_exists('Youzify')) { ?>
                                    <?php
                                    $author_ID =  get_current_user_id();
                                    $user = get_user_by('ID', $author_ID);
                                    if(class_exists('WeDevs_Dokan')){
                                        $vendor = dokan()->vendor->get( $author_ID );
                                        if ($vendor->data->user_nicename != ''){
                                              $permalink = get_site_url() . '/members/' . $vendor->data->user_nicename;
                                            $permalink_password = get_site_url() . '/members/' . $vendor->data->user_nicename . '/settings/';
                                        } else {
                                            $permalink = get_site_url() . '/members/' . $user->user_login;
                                            $permalink_password = get_site_url() . '/members/' . $user->user_login . '/settings/';
                                        }
                                    } else {
                                        $permalink = get_site_url() . '/members/' . $user->user_login;
                                        $permalink_password = get_site_url() . '/members/' . $user->user_login . '/settings/';
                                    }


                                    if($user->first_name != ''){
                                        $show_name = $user->first_name;
                                    } else {
                                        $show_name = $user->display_name;
                                    }

                                    $user_avatar = get_avatar_url($author_ID);
                                    if($user_avatar != ''){
                                        $avatar_img = '<img src="' . esc_url($user_avatar) . '" alt="' . esc_url($user_avatar) . '" class="profile">';
                                    } else {
                                        $avatar_img = '';
                                    }
                                    ?>
                                    <?php if ( bp_is_active( 'messages' ) ) { ?>
                                        <?php $msgs_nbr = bp_get_total_unread_messages_count( $author_ID ); ?>
                                        <a class="action-btn" href="<?php echo bp_nav_menu_get_item_url( 'messages' ); ?>">
                                            <i class="ico_message"></i>
                                            <?php if ( $msgs_nbr > 0 ) : ?>
                                                <span class="animation-ripple-delay1"></span>
                                            <?php endif; ?>
                                        </a>
                                    <?php } ?>

                                    <?php if ( bp_is_active( 'notifications' ) ) : ?>
                                        <?php $notification_nbr = bp_notifications_get_unread_notification_count( $author_ID ); ?>
                                        <a class="action-btn" href="<?php echo bp_nav_menu_get_item_url( 'notifications' ); ?>">
                                            <i class="ico_notification"></i>
                                            <?php if ( $notification_nbr > 0 ) : ?>
                                                <span class="animation-ripple-delay2"></span>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(isset($header_btn_link) && $header_btn_link != ''){ ?>
                                        <a href="<?php echo esc_url($header_btn_link)?>" class="submit__listing">
                                           <i class="icon-plus icons"></i> <?php echo esc_html($header_btn_text);?>
                                        </a>
                                    <?php } ?>
                                    <ul class="uk-subnav uk-subnav-pill" uk-margin>
                                        <li>
                                            <a href="<?php echo esc_url($permalink)?>">
                                                <?php echo teamhost_wp_kses($avatar_img);?>
                                                <?php echo __('Hi, ', 'teamhost') . $show_name;?>
                                                <span uk-icon="icon: triangle-down"></span>
                                            </a>
                                            <div uk-dropdown="mode: click">
                                                <ul class="uk-nav uk-dropdown-nav">
                                                    <li><a href="<?php echo esc_url($permalink)?>"><?php echo __('My profile', 'teamhost');?></a></li>
                                                    <li><a href="<?php echo esc_url($permalink_password)?>"><?php echo __('Profile Settings', 'teamhost');?></a></li>
                                                    <?php if(class_exists('WooCommerce')){ ?>
                                                         <li class="uk-nav-divider"></li>
                                                         <li><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) . 'orders'); ?>"><?php echo __('My Orders', 'teamhost');?></a></li>
                                                         <li><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) . 'edit-address'); ?>"><?php echo __('My Addresses', 'teamhost');?></a></li>
                                                    <?php } ?>

                                                     <?php if(class_exists('WeDevs_Dokan')){
                                                         $dukan_dash = get_option('dokan_pages', true);
                                                         $dukan_dash_permalink = get_permalink($dukan_dash['dashboard']);
                                                         if(isset($dukan_dash_permalink) && $dukan_dash_permalink != ''){
                                                         ?>
                                                            <li><a href="<?php echo esc_url($dukan_dash_permalink); ?>"><?php echo __('My Dashboard', 'teamhost');?></a></li>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <li class="uk-nav-divider"></li>
                                                    <li><a href="<?php echo esc_url(get_site_url() . '/wp-login.php?action=logout')?>"><?php echo __('Log Out', 'teamhost');?></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                <?php } ?>
                            <?php } else { ?>
                                <?php if(class_exists('BuddyPress') && class_exists('Youzify')) { ?>
                                    <?php
                                    $header_login_link = teamhost_get_theme_mod('header_login_link');
                                    if(isset($header_login_link) && $header_login_link != ''){
                                        $permalink_login = $header_login_link;
                                    } else {
                                       $perm_id = get_option('youzify_membership_pages');
                                        if(isset($perm_id['login']) && $perm_id['login'] != ''){
                                            $permalink_login = get_permalink($perm_id['login']);
                                        } else {
                                            $permalink_login = wp_login_url();
                                        }
                                    }
                                    $user_avatar = get_template_directory_uri() . '/assets/css/images/no-ava.png';
                                    $avatar_img = '<img src="' . esc_url($user_avatar) . '" alt="' . esc_attr__('profile', 'teamhost') . '" class="profile">';?>
                                    <a class="action-btn" href="<?php echo esc_url($permalink_login)?>">
                                        <i class="ico_message"></i>
                                        <span class="animation-ripple-delay1"></span>
                                    </a>
                                    <a class="action-btn" href="<?php echo esc_url($permalink_login)?>">
                                        <i class="ico_notification"></i>
                                        <span class="animation-ripple-delay2"></span>
                                    </a>

                                     <?php if(isset($header_login_link) && $header_login_link != ''){ ?>
                                        <a href="<?php echo esc_url($header_login_link)?>" class="submit__listing">
                                           <i class="icon-plus icons"></i> <?php echo esc_html($header_btn_text);?>
                                        </a>
                                    <?php } ?>

                                    <ul class="uk-subnav uk-subnav-pill" uk-margin>
                                        <li>
                                            <a href="<?php echo esc_url($permalink_login)?>">
                                                <?php echo teamhost_wp_kses($avatar_img);?>
                                                <?php echo teamhost_get_theme_mod('header_notlog_text');?>
                                            </a>
                                        </li>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if ( has_nav_menu( 'general-menu' ) or has_nav_menu( 'mobile-menu' )) { ?>
            <div id="offcanvas" data-uk-offcanvas="mode: reveal; overlay: true">
                <div class="uk-offcanvas-bar uk-flex uk-flex-column uk-flex-between"><button class="uk-offcanvas-close" type="button" data-uk-close></button>
                    <div class="uk-margin-bottom">
                        <a class="logo uk-margin-bottom" href="<?php echo esc_url(home_url("/")); ?>">
                            <?php if (teamhost_get_theme_mod( 'site_mobile_logo')){ ?>
                                <img src="<?php echo esc_url(teamhost_get_theme_mod( 'site_mobile_logo')); ?>" alt="<?php echo esc_attr('logotype')?>"/>
                            <?php } else { ?>
                                <h3 class="logotype-text"><?php esc_attr(bloginfo('title')); ?></h3>
                            <?php } ?>
                        </a>
                        <?php if ( has_nav_menu( 'mobile-menu' ) ) {
                            wp_nav_menu(array(
                                'theme_location'    => 'mobile-menu',
                                'menu_class'        => 'uk-nav uk-nav-default uk-nav-parent-icon',
                                'container'         => false,
                                'id'                => 'general-menu',
                                'depth'             => 8,
                                'fallback_cb'       => 'teamhost_menu_fallback'
                            ));
                        } else {
                            wp_nav_menu(array(
                                'theme_location'    => 'general-menu',
                                'menu_class'        => 'uk-nav uk-nav-default uk-nav-parent-icon',
                                'container'         => false,
                                'id'                => 'general-menu',
                                'depth'             => 8,
                                'fallback_cb'       => 'teamhost_menu_fallback'
                            ));
                        }?>
                    </div>
                    <?php if(class_exists('TM_Helper_Core_Addons')){ ?>
                        <?php if($nav_contact == 1){ ?>
                            <div class="uk-margin">
                                <?php if(isset($nav_phone_number) && $nav_phone_number != ''){ ?>
                                    <a class="contacts-block ico_contacts" href="<?php echo esc_url('tel:' . $nav_phone_number);?>">
                                        <?php if(isset($nav_phone_text) && $nav_phone_text != ''){ ?>
                                            <span><?php echo esc_html($nav_phone_text);?></span>
                                        <?php } ?>
                                        <strong><?php echo esc_html($nav_phone_number);?></strong>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </header>

<main class="page-main nav_<?php echo esc_attr($menu_style);?> <?php echo esc_attr($is_404);?>">
    <?php if($menu_style == 'style_two'){ ?>
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-hider">
                <i class="icon-arrow-left"></i>
                <i class="icon-arrow-right"></i>
            </div>
            <div class="sidebar-box">
                <div class="uk-nav">
                    <?php if ( has_nav_menu( 'left-menu' ) ) { ?>
                        <?php
                         wp_nav_menu(array(
                            'theme_location'    => 'left-menu',
                            'menu_class'        => 'menu uk-nav uk-nav-default uk-nav-parent-icon',
                            'container'         => false,
                            'id'                => 'left-menu',
                            'depth'             => 3,
                            'fallback_cb'       => 'teamhost_menu_fallback'
                        ));
                        ?>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'leftmenu-sidebar-1' ) ) { ?>
                        <?php dynamic_sidebar( 'leftmenu-sidebar-1' ); ?>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'leftmenu-sidebar-2' ) ) { ?>
                        <?php dynamic_sidebar( 'leftmenu-sidebar-2' ); ?>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'leftmenu-sidebar-3' ) ) { ?>
                        <?php dynamic_sidebar( 'leftmenu-sidebar-3' ); ?>
                    <?php } ?>
                </div>
            </div>
        </aside>
    <?php } ?>