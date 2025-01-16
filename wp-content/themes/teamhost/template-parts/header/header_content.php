<?php
global $post;
//Save
$header_bg = $custom_html_title_class = '';

// Heading Background Image
$bg_img = teamhost_get_theme_mod('page_background_img');

// Blog page Title
$title = teamhost_get_theme_mod('archive_blog_title');

//Border head
$border_head_class = '';
$menu_style = teamhost_get_theme_mod('menu_style');

// Blog page
if (teamhost_is_blog_checker()) {
    if(! empty(teamhost_get_theme_mod('blog_archive_page_background_img'))){
        $bg_img = teamhost_get_theme_mod('blog_archive_page_background_img');
    }
    if(teamhost_get_theme_mod('archive_border_head') == 'enable'){
        $border_head_class = 'border_head_class';
    }
    if(teamhost_get_theme_mod('post_navigator', true) == 'custom'){
        $menu_style = teamhost_get_theme_mod('post_menu_style', 'true');
    }
}



// Single post
if(is_single()){
    $custom_html_title_class = 'post-inner-header';
    $title = get_the_title();

    if(teamhost_get_theme_mod('post_single_header_custom_style',true) == 'custom'){
        // Pre Title
        if(!empty(teamhost_get_theme_mod('post_single_header_pre_title',true))){
            $pre_title = teamhost_get_theme_mod('post_single_header_pre_title',true);
        }

        if(teamhost_get_theme_mod('post_single_header_title_enable_function',true) != 'disable'){
            if(!empty(teamhost_get_theme_mod('post_single_custom_title',true))){
                $title = teamhost_get_theme_mod('post_single_custom_title',true);
            }
        } else {
            $title = '';
        }

        if(!empty(teamhost_get_theme_mod('post_single_header_img',true))){
            $bg_img = teamhost_get_theme_mod('post_single_header_img',true);
        }
    }

    if(teamhost_get_theme_mod('single_border_head') == 'enable'){
        $border_head_class = 'border_head_class';
    }


}


if (is_category()) { // Category page
    $title = single_cat_title("", false);
    $pre_title = esc_html__('All posts from:', 'teamhost');
    if(teamhost_get_theme_mod('archive_border_head') == 'enable'){
        $border_head_class = 'border_head_class';
    }
} else if (is_author()) { // Author page
    $title = get_the_author();
    $pre_title = esc_html__('All posts from author:', 'teamhost');
    if(teamhost_get_theme_mod('archive_border_head') == 'enable'){
        $border_head_class = 'border_head_class';
    }
} else if (is_tag()) { // Tag page
    $title = single_tag_title("", false);
    $pre_title = esc_html__('Tagged to:', 'teamhost');
    if(teamhost_get_theme_mod('archive_border_head') == 'enable'){
        $border_head_class = 'border_head_class';
    }
} else if (is_search()) {//search page
    $title = get_search_query();
    $pre_title = esc_html__('Search results for:', 'teamhost');
    if(teamhost_get_theme_mod('archive_border_head') == 'enable'){
        $border_head_class = 'border_head_class';
    }
} else if (is_archive()) {
    if (is_day()) :
        $title = sprintf(esc_html__('Daily Archive: %s', 'teamhost'), get_the_date());
    elseif (is_month()) :
        $title = sprintf(esc_html__('Monthly Archive: %s', 'teamhost'), get_the_date(_x('F Y', 'monthly archives date format', 'teamhost')));
    elseif (is_year()) :
        $title = sprintf(esc_html__('Yearly Archive: %s', 'teamhost'), get_the_date(_x('Y', 'yearly archives date format', 'teamhost')));
    else :
        $title = esc_html__('Archive', 'teamhost');
    endif;
    if(teamhost_get_theme_mod('archive_border_head') == 'enable'){
        $border_head_class = 'border_head_class';
    }
}





// Header background image css
if (isset($bg_img) && $bg_img != '') {
    $header_bg = 'data-src="' . $bg_img . '"';
} else {
    $header_bg = '';
}


$css_style = ($header_bg) ? 'style=' . $header_bg . '' : '';
?>
<?php if(!teamhost_is_blog_checker() && !is_404() && !is_page()){ ?>
    <div class="uk-page-heading uk-height-medium uk-height-max-medium uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-background-cover uk-light" <?php echo esc_attr($header_bg);?> uk-img uk-parallax="bgy: -70">
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


