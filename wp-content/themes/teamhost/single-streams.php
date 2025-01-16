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

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


?>


<div class="uk-grid uk-grid-custom fl_main_stream fl_main fl_main_post fl_main_post_single <?php echo esc_attr($css_class);?>" data-uk-grid>
    <?php
    if(is_active_sidebar( 'sidebar-stream-left')){
        get_template_part( 'sidebar-stream-left');
    }
    ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="<?php echo (is_active_sidebar( 'sidebar-stream-left') && is_active_sidebar( 'sidebar-single-right') ? esc_attr("uk-width-3-5@l teamhost_padding") : esc_attr("uk-width-3-4@l") ) ?>  uk-width-3-5@m single_post_content">
            <div class="uk-grid  uk-child-width-2-2@l uk-child-width-2-2@m uk-child-width-1-1@s">
                <section class="b-post b-post-full article-intro b-post-single clearfix">
                    <div class="entry-media">
                        <?php
                        $protocols = array('https://', 'https://www.', 'http://', 'http://www.', 'www.');

                        $link_site = str_replace($protocols, '', site_url());
                        if(strpos($link_site, '/') !== false){
                            $link_site = strstr($link_site, '/', true);
                        }
                        if('twitch' == teamhost_get_theme_mod('stream_type', true)){
                            $acc_nickname = teamhost_get_theme_mod('twitch_link', true);
                            $www = teamhost_get_theme_mod('stream_www', true);
                             if(isset($www) && $www == 'enable'){
                                 $link = 'https://player.twitch.tv/?channel=' . teamhost_get_theme_mod('twitch_link', true) . '&parent=www.' . $link_site;

                             } else {
                                 $link = 'https://player.twitch.tv/?channel=' . teamhost_get_theme_mod('twitch_link', true) . '&parent=' . $link_site;

                             }


                            $type = 'iframe';
                            if(class_exists('TP_Twitch_Stream')){
                                $streams = tp_twitch_get_streams( array('streamer' => $acc_nickname));
                                foreach ($streams as $str){
                                    $status = $str->stream['type'];
                                    $views = $str->get_viewer( true );
                                    $thumb_url = $str->get_thumbnail_url(283, 206);
                                    $alt = $str->get_thumbnail_alt();
                                }
                            }
                            ?>
                            <iframe src="<?php echo esc_url($link)?>" width="1280" height="720"></iframe>
                            <?php
                        } else {
                            $acc_nickname = teamhost_get_theme_mod('youtube_acc', true);
                            $link = teamhost_get_theme_mod('youtube_link', true);
                            $type = 'youtube';

                            parse_str( parse_url( $link, PHP_URL_QUERY ), $link_arr );
                            if(isset($link_arr['v']) && $link_arr['v'] != ''){
                                $video_id = $link_arr['v'];
                            } else {
                                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $link, $matches);
                                $video_id = $matches[1];
                            }

                            $link = 'https://www.youtube.com/embed/' . $video_id;

                            ?>
                            <iframe width="1280" height="720" src="<?php echo esc_url($link)?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php
                        }
                        ?>
                    </div>
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
    if(is_active_sidebar( 'sidebar-stream-right')){
        get_template_part( 'sidebar-stream-right');
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
