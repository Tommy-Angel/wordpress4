<?php

$sidebar_position = $sticky_sidebar = $page_sidebar_sticky ="";


if(teamhost_get_theme_mod('blog_archive_sidebar')!= 'disable'){
    $sidebar_position= teamhost_get_theme_mod('blog_archive_sidebar_position');
    $sticky_sidebar = teamhost_get_theme_mod('blog_archive_sidebar_sticky');
}



if(is_singular('post')) {
    $sidebar_position= teamhost_get_theme_mod('blog_single_sidebar_position');
    $sticky_sidebar = teamhost_get_theme_mod('blog_single_sticky');
    if (teamhost_get_theme_mod('post_sidebar_custom',true) =='custom'){
        $sidebar_position= teamhost_get_theme_mod('post_sidebar_position',true);
        $sticky_sidebar = teamhost_get_theme_mod('post_sidebar_sticky',true);
    }
}

if(is_page()) {
    if (teamhost_get_theme_mod('page_sidebar_custom',true) =='custom'){
        $sidebar_position= teamhost_get_theme_mod('page_sidebar_position',true);
        $sticky_sidebar = teamhost_get_theme_mod('page_sidebar_sticky',true);
    }
}

// Template Blog Navigation Style
if(is_page_template( 'template-blog.php' )){
        $sidebar_position= teamhost_get_theme_mod('blog_template_sidebar',true);
        $sticky_sidebar = teamhost_get_theme_mod('blog_template_sidebar_sticky',true);
}



if($sticky_sidebar == 'sticky'){
    $page_sidebar_sticky = 'sidebar-sticky';
}
?>



<?php if( is_active_sidebar( 'news-sidebar' )) { ?>
<div class="uk-width-1-4@l uk-width-2-5@m uk-width-2-5@s sidebar_<?php echo esc_attr($sidebar_position)?> <?php echo esc_attr($page_sidebar_sticky); ?>">
    <aside class="l-sidebar">
        <?php dynamic_sidebar( 'news-sidebar' ); ?>
    </aside>
</div>
<?php } ?>
