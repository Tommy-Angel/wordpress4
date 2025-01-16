<?php get_header();
//Header
$header = 'disable';
if (teamhost_get_theme_mod('post_single_header_custom_style', true) == 'custom') {
    $header = teamhost_get_theme_mod('post_single_header', true);
}
if ($header != 'disable') {
    get_template_part('template-parts/header/header_content');
}


$css_classes[]= $bottom_css_classes[]='';
//Sidebar position
$sidebar_float = 'no';


if( !class_exists('TM_Helper_Core_Addons')){
    $css_classes[] = 'plugin-disable';
}
$menu_style = teamhost_get_theme_mod('menu_style');
if(teamhost_get_theme_mod('post_navigator', true) == 'custom'){
    $menu_style = teamhost_get_theme_mod('post_menu_style', 'true');
}

$css_classes[] = 'menu_' . $menu_style;
if($menu_style == 'style_one'){
    $css_classes[] = 'uk-container';
}
if ( get_post_type() == 'ranks'){
    $css_classes[] = 'tm_gamipress_rank_single';
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
$css_class_cont = '';

?>
<?php
$single_cont_class = '';
if(is_active_sidebar( 'sidebar-single-left') && is_active_sidebar( 'sidebar-single-right')) {
    $single_cont_class = 'uk-width-3-5@l teamhost_padding';
} elseif(is_active_sidebar( 'main-sidebar') || is_active_sidebar( 'sidebar-single-left') || is_active_sidebar( 'sidebar-single-right')){
    $single_cont_class = 'uk-width-3-4@l teamhost_padding';
    $css_class_cont = 'teamhost_sidebar_isset_single';
} else {
    $single_cont_class = '';
}
?>

<div class="uk-grid uk-grid-custom fl_main fl_main_post fl_main_post_single <?php echo esc_attr($css_class);?> <?php echo esc_attr($css_class_cont);?>" data-uk-grid>
    <?php
    if(is_active_sidebar( 'sidebar-single-left')){
        get_template_part( 'sidebar-single-left');
    }
    ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="<?php echo esc_attr($single_cont_class)?> single_post_content">
            <div class="uk-grid  uk-child-width-2-2@l uk-child-width-2-2@m uk-child-width-1-1@s">
                <section class="b-post b-post-full article-intro b-post-single clearfix">
                    <?php
                    if ( get_post_type() != 'ranks'){
                        if (has_post_thumbnail()) { get_template_part('template-parts/blog-single-page/post-holder'); }
                    }
                    ?>
                    <div class="entry-main">
                        <div class="entry-content">
                            <?php if('' != get_the_title()){?>
                                <h1 class="entry-title">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
                                </h1>
                            <?php } ?>
                            <article <?php post_class('cf'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
                                <div class="tm-post-content">
                                    <?php the_content(); ?>
                                    <?php wp_link_pages(array(
                                        'before'        => '<p class="post-inner-pagination">'.'<span class="pagination-text">' . esc_html__('Post Pages:', 'teamhost').'</span>',
                                        'after'	        => '</p>',
                                        'link_before'   => '',
                                        'link_after'    => '',
                                        'pagelink'      => '<span class="page-numbers">'.'%'.'</span>',

                                    )) ?>
                                </div>

                                <?php get_template_part('template-parts/blog-single-page/post-tags-content')?>


                            </article>
                            <?php if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    <?php endwhile; else: ?>
        <?php get_template_part('template-parts/content', 'none')?>
    <?php endif; ?>
    <?php
    if(is_active_sidebar( 'sidebar-single-right')){
        get_template_part( 'sidebar-single-right');
    } elseif (is_active_sidebar( 'main-sidebar' )){
        get_template_part( 'sidebar');
    }
    ?>

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




<!--Footer Start-->
<?php get_footer(); ?>
<!--Footer End-->
