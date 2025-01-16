<?php
/*
* Template name: Half Page Template
* */

get_header();

$bg_image = teamhost_get_theme_mod('login_page_img', true);
$style = '';
if(isset($bg_image) && $bg_image != ''){
    $style = 'background-image: url('.esc_url($bg_image).');';
}

?>

<div class="welcome-page">
    <div class="uk-text-center uk-grid"  uk-grid="">
        <div class="uk-width-expand@m uk-visible@m page-first-screen uk-first-column" style="<?php echo esc_attr($style)?>">
            <div class="fl-hd-cover"></div>
            <div class="uk-card  uk-card-body "></div>
        </div>
        <div class="uk-width-expand@m">
            <div class="form-login">
                <?php the_content();?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>