<?php

get_header();
$sidebar_float = 'right';
$css_classes[] = $wrapper_attributes[] = $post_wrapper_css_classes[]='';

$blog_html_div = $animation_type = $animation_delay = '';

//Save
$header_bg = $custom_html_title_class = '';

// Heading Background Image
$bg_img = teamhost_get_theme_mod('blog_archive_page_background_img');
// Blog page Title
$title = teamhost_get_theme_mod('archive_blog_title');

//Border head
$border_head_class = '';
$menu_style = teamhost_get_theme_mod('menu_style');


$header_enable = teamhost_get_theme_mod('blog_archive_header');
if($header_enable !='disable') {
    get_template_part('template-parts/header/header_content');
}
$blog_archive_style = teamhost_get_theme_mod('blog_archive_style');

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

if ( is_active_sidebar( 'main-sidebar' ) and teamhost_get_theme_mod('blog_archive_sidebar_position') !='disable' ) {
    $sidebar_float = teamhost_get_theme_mod('blog_archive_sidebar_position');
}
$wrap_class = '';
if($menu_style == 'style_one'){
    $wrap_class = 'uk-container';
}
if($sidebar_float !='disable'){
    if(is_active_sidebar( 'news-sidebar') || is_active_sidebar( 'main-sidebar' )){
        $sidebar_float =='right' ? $css_classes[] = 'uk-width-3-4@l uk-width-3-5@m uk-width-3-5@s right-sidebar' : $css_classes[] = 'uk-width-2-3@m left-sidebar';
    } else {
        $css_classes[] = 'col-md-12';
        $wrap_class .= ' team_no_sidebar';
    }
} else {
    $css_classes[] = 'col-md-12';
    $wrap_class .= ' team_no_sidebar';
}

$wrap_class = '';
if($menu_style == 'style_one'){
    $wrap_class = 'uk-container';
}

// Blog page
if(! empty(teamhost_get_theme_mod('blog_archive_page_background_img'))){
    $bg_img = teamhost_get_theme_mod('blog_archive_page_background_img');
}
if(teamhost_get_theme_mod('archive_border_head') == 'enable'){
    $border_head_class = 'border_head_class';
}
if(teamhost_get_theme_mod('post_navigator', true) == 'custom'){
    $menu_style = teamhost_get_theme_mod('post_menu_style', 'true');
}

// Header background image css
if (isset($bg_img) && $bg_img != '') {
    $header_bg = 'data-src="' . $bg_img . '"';
    $header_bg_style = 'background-image: url("' . $bg_img . '")';
} else {
    $header_bg = '';
    $header_bg_style = '';
}

// Animation
if($menu_style == 'style_one'){
    $post_animation = teamhost_get_theme_mod('blog_animation');
    if (!empty($post_animation) and ($post_animation != 'disable')) {
        $post_wrapper_css_classes[] = 'fl-animated-item-velocity';
        $wrapper_attributes[]       = 'data-animate-type="' . $post_animation . '"';
        $wrapper_attributes[]       = 'data-item-for-animated=".article-intro"';
    }
}


$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

$post_wrapper_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $post_wrapper_css_classes ) ) ) );
?>

<?php if($menu_style == 'style_one' && $header_enable == 'enable'){?>
<div class="uk-page-heading uk-height-medium uk-height-max-medium uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-background-cover uk-light" <?php echo esc_attr($header_bg);?> style="<?php echo esc_attr($header_bg_style)?>" uk-img uk-parallax="bgy: -70">
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

<!-- Content -->
<div class="uk-grid fl_main fl_main_post <?php echo esc_attr($wrap_class);?>" data-uk-grid>
    <?php if($menu_style == 'style_two' && $header_enable == 'enable'){?>
    <div class="uk-page-heading uk-height-medium uk-height-max-medium uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-background-cover uk-light" <?php echo esc_attr($header_bg);?> style="<?php echo esc_attr($header_bg_style)?>" uk-img uk-parallax="bgy: -70">
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

    <div class="uk-grid tm_archive">
        <!--Left sidebar -->
        <?php if($sidebar_float == 'left'){
            if(is_active_sidebar( 'news-sidebar')){
                get_template_part( 'sidebar-news');
            } elseif (is_active_sidebar( 'main-sidebar' )){
                get_template_part( 'sidebar');
            }
        } ?>
        <!--Left sidebar End-->

        <?php if(isset($blog_archive_style) && $blog_archive_style == 'default'){ ?>
            <div class="tm_archive_posts tm_archive_posts_default uk-grid uk-grid-medium uk-child-width-1-1@s <?php echo esc_attr(trim($css_class)); ?> <?php echo esc_attr(trim($post_wrapper_css_class)); ?>" <?php echo implode(' ', $wrapper_attributes); ?>>
                <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <!--Post Start-->
                <section <?php post_class('article-intro') ?>>
                    <?php get_template_part('template-parts/blog-entry-content/post', 'holder')?>
                    <?php get_template_part('template-parts/blog-entry-content/post', 'bottom')?>
                </section>
                <!--Post End-->
                <?php endwhile;
                    // If no content, include the "No posts found" template.
                    else : get_template_part('template-parts/content', 'none'); endif; ?>
                <?php get_template_part( 'template-parts/content','pagination');
                    wp_reset_postdata();?>
            </div>
        <?php } elseif(isset($blog_archive_style) && $blog_archive_style == 'grid'){ ?>
            <div class="tm_archive_posts tm_archive_posts_grid uk-grid uk-grid-medium  uk-flex-top uk-flex-wrap-top <?php echo esc_attr(trim($css_class)); ?> <?php echo esc_attr(trim($post_wrapper_css_class)); ?>" <?php echo implode(' ', $wrapper_attributes); ?>>
                <div class="tm_archive_posts_contain_in">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php if(is_sticky()){ ?>
                            <?php if (has_post_thumbnail()) { ?>
                                <section <?php post_class('article-intro b-post-cover b-post b-post-full clearfix article-intro-grid sticky') ?>>
                                    <?php get_template_part('template-parts/blog-entry-content/post', 'holder-sticky')?>
                                </section>
                            <?php } else { ?>
                                <section <?php post_class('article-intro b-post-cover b-post b-post-full clearfix article-intro-grid sticky teamrow_two') ?>>
                                    <?php get_template_part('template-parts/blog-entry-content/post', 'bottom')?>
                                </section>
                            <?php } ?>
                        <?php } else { ?>
                            <section <?php post_class('article-intro b-post b-post-full clearfix article-intro-grid teamrow_two') ?>>
                                <?php get_template_part('template-parts/blog-entry-content/post', 'holder')?>
                                <?php get_template_part('template-parts/blog-entry-content/post', 'bottom')?>
                            </section>
                        <?php } ?>
                    <?php endwhile;
                        else : get_template_part('template-parts/content', 'none'); endif; ?>
                    <?php wp_reset_postdata();?>
                </div>
                <?php get_template_part( 'template-parts/content','pagination');?>
            </div>
        <?php } ?>
        <!--Right sidebar -->
        <?php if($sidebar_float == 'right'){
            if(is_active_sidebar( 'news-sidebar')){
                get_template_part( 'sidebar-news');
            } elseif (is_active_sidebar( 'main-sidebar' )){
                get_template_part( 'sidebar');
            }
        } ?>
        <!--Right sidebar End-->
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
        <?php if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_two'){ ?>
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


</div>
<!-- Content End-->


<?php get_footer(); ?>
