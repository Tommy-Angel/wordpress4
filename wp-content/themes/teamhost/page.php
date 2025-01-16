<?php
 get_header();
//Header
$header_enable = 'disable';
if(teamhost_get_theme_mod('page_header_custom_style',true ) == 'custom' ) {
    $header_enable = teamhost_get_theme_mod('page_header', true);
}
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

$title = get_the_title();
if(teamhost_get_theme_mod('page_breadcrumbs',true) == 'custom'){
    $breadcrumbs = teamhost_get_theme_mod('page_breadcrumb',true);
}
if(teamhost_get_theme_mod('page_header_custom_style',true) == 'custom'){
    if(teamhost_get_theme_mod('page_header_title_enable_function',true) != 'disable'){
        if(!empty(teamhost_get_theme_mod('page_custom_title',true))){
            $title = teamhost_get_theme_mod('page_custom_title',true);
        }
    } else {
        $title = '';
    }
    if(!empty(teamhost_get_theme_mod('page_header_img',true))){
        $bg_img = teamhost_get_theme_mod('page_header_img',true);
    }
}


if(teamhost_get_theme_mod('page_border_head') == 'enable'){
    $border_head_class = 'border_head_class';
}

// Header background image css
if (isset($bg_img) && $bg_img != '') {
    $header_bg = 'style=background-image:url(' . $bg_img . ')';
} else {
    $header_bg = '';
}
$wrap_class = '';
if($menu_style == 'style_one'){
    $wrap_class = 'uk-container fl_default_page';
}
?>

<!--Main Start-->
<div class="fl_main ">
    <?php if($header_enable !='disable' ) { ?>
        <div class="uk-page-heading uk-height-medium uk-height-max-medium uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-background-cover uk-light teamhost_page_header" <?php echo esc_attr($header_bg);?> uk-img uk-parallax="bgy: -70">
            <div class="fl-hd-cover">
                <span class="decore-lt"></span>
                <span class="decore-lb"></span>
                <span class="decore-rt"></span>
                <span class="decore-rb"></span>
            </div>
            <h1 class="uk-page-heading-h"><?php echo esc_html($title)?></h1>
            <?php if(isset($pre_title) && $pre_title != ''){?>
                <p class="uk-heading-text"><?php echo esc_html($pre_title)?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <!--Main content Start-->

    <div class="fl_content page-template content <?php echo esc_attr($wrap_class);?>">
        <div class="fl-content-wrapper single-page-wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!--Content Start-->
            <?php if($header_enable == 'disable' && $menu_style == 'style_one') { ?>
                <?php if('' != get_the_title()){?>
                    <h1 class="page_head_disable_title entry-title">
                        <a href="<?php echo esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
                    </h1>
                <?php } ?>
            <?php } ?>

            <?php get_template_part('template-parts/content' );?>

        <?php endwhile; else: ?>
            <?php get_template_part('template-parts/content','none');?>
        <?php endif; ?>
        <!--Content End-->
        <!--Comment Start-->
        <?php if (comments_open()) : ?>
            <?php comments_template(); ?>
        <?php endif; ?>
            <!--Comment End-->
        </div>
    </div>

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
    $footer_enable = teamhost_get_theme_mod('footer_enable');

    //Page
    if(is_page()){
        if(teamhost_get_theme_mod('page_footer_custom_style',true ) == 'custom' ) {
            $footer_enable = teamhost_get_theme_mod('page_footer_enable', true);
        }
    }

    //Post
    if(is_single()){
        if(teamhost_get_theme_mod('post_footer_custom_style',true ) == 'custom' ) {
            $footer_enable = teamhost_get_theme_mod('post_footer_enable', true);
        }
    }

    if(isset($footer_enable) && $footer_enable == 'enable' && $menu_style == 'style_two'){
        get_template_part('template-parts/footer/footer-style', 'footer-four-column');
    } ?>
    <?php if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_two'){?>
        <div class="fl-copy"> <?php
            $footer_copy_allowed_html = array(
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


</div>

<?php if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_two'){?>
    <div class="fl-copy-second"> <?php
        $footer_copy_allowed_html = array(
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
<!--Main End-->
    <!--Footer Start-->
<?php get_footer(); ?>
    <!--Footer End-->

