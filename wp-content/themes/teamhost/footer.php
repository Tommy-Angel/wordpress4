<?php
//Header
$header_enable = 'enable';
if(teamhost_get_theme_mod('page_header_custom_style',true ) == 'custom' ) {
    $header_enable = teamhost_get_theme_mod('page_header', true);
}

if($header_enable !='disable' ) {  ?>
<?php } ?>

<?php
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

// Blog page
if (teamhost_is_blog_checker()) {
    if(teamhost_get_theme_mod('blog_footer_custom_style',true ) == 'custom' ) {
        $footer_enable = teamhost_get_theme_mod('blog_footer_enable', true);
    }
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


?>

<?php
if(isset($footer_enable) && $footer_enable == 'enable' && $menu_style != 'style_two'){
    get_template_part('template-parts/footer/footer-style', 'footer-four-column');
}
?>
</main>
<?php if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_one'){
    if(is_404()){ ?>
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
    <?php }
} ?>
</div>
<!-- Main holder End-->
<?php wp_footer(); ?>
</body>
</html>