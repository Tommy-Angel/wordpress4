<?php
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function teamhost_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'teamhost_pingback_header' );


if (!function_exists('teamhost_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function teamhost_setup()
    {

        /*
              * Make theme available for translation.
              * Translations can be filed in the /languages/ directory.
              * If you're building a theme based on khaki, use a find and replace
              * to change 'teamhost' to the name of your theme in all the template files.
              */
        load_theme_textdomain('teamhost', get_template_directory() . '/languages');


        register_nav_menus	(array(
            'general-menu'	                => esc_html__('Main Menu', 'teamhost'),
            'left-menu'	                    => esc_html__('Left Menu', 'teamhost'),
            'mobile-menu'	                => esc_html__('Mobile Menu', 'teamhost'),
        ));


        add_editor_style();
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'image', 'quote', 'link' ) );
        add_post_type_support( 'post', 'post-formats' );
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style'
        ));


        // Add default image sizes
        add_theme_support('post-thumbnails');
        add_image_size('teamhost_size_40x40_crop', 40, 40, true);
        add_image_size('teamhost_size_size_50x50_crop', 50, 50, true);
        //Latest works widget Size
        add_image_size('teamhost_size_size_95x88_crop', 95, 88, true);

        /// Gallery Size
        add_image_size('teamhost_size_960x635_crop', 960, 635, true);
        add_image_size('teamhost_size_460x600_crop', 460, 600, true);
        add_image_size('teamhost_size_368x239_crop', 368, 239, true);


        add_image_size('teamhost_size_size_260x248_crop', 260, 248, true);
        add_image_size('teamhost_size_300x300_crop', 300, 300, true);
        add_image_size('teamhost_size_100x80_crop', 100, 80, true);
        add_image_size('teamhost_size_564x780_crop', 564, 780, true);


        add_image_size('teamhost_size_1170x558_crop', 1170, 558, true);
        add_image_size('teamhost_size_571x272_crop', 571, 272, true);
        add_image_size('teamhost_size_1080x413_crop', 1080, 413, true);



        // Register the three useful image sizes for use in Add Media modal
        add_filter('image_size_names_choose', 'teamhost_custom_sizes');
        if (!function_exists('teamhost_custom_sizes')) :
            function teamhost_custom_sizes($sizes)
            {
                return array_merge($sizes, array(
                'size_90x90_crop'               => 'size_90x90_crop',
                'size_130x130_crop'             => 'size_130x130_crop',
                'size_360x480_crop'             => 'size_360x480_crop',
                'size_360x370_crop'             => 'size_360x370_crop',
                'size_360x320_crop'             => 'size_360x320_crop',
                'size_360x250_crop'             => 'size_360x250_crop',
                'size_360x200_crop'             => 'size_360x200_crop',
                'size_360х240_crop'             => 'size_360х240_crop',
                'size_720x960_crop'             => 'size_720x960_crop',
                'size_720x740_crop'             => 'size_720x740_crop',
                'size_720x640_crop'             => 'size_720x640_crop',
                'size_720x500_crop'             => 'size_720x500_crop',
                'size_720x400_crop'             => 'size_720x400_crop',
                'size_720x480_crop'             => 'size_720x480_crop',
                'size_291x255_crop'             => 'size_291x255_crop',
                'size_620x700_crop'             => 'size_620x700_crop',
                'size_1170x731_crop'            => 'size_1170x731_crop',
                ));
            }
        endif;



    }
endif;
add_action('after_setup_theme', 'teamhost_setup');



// Fixed Select2 conflict with Advanced Custom Fields
add_filter( 'acf/settings/select2_version', function( $version ) {
    return 4;
});




//Bulding Breadcrumbs
function teamhost_build_breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">','</div>');
    } else {
        echo teamhost_breadcrumbs(esc_html__('Home','teamhost'));
    }
}


/**
 *  Breadcrumbs
 * */
if (!function_exists('teamhost_breadcrumbs')) {
    function teamhost_breadcrumbs($home_title = false)
    {
        /* === OPTIONS === */
        $text['home'] = $home_title;
        $text['blog'] = esc_html__('Blog', 'teamhost');
        $text['category'] = esc_html__('Archive by Category "%s"', 'teamhost');
        $text['tax'] = esc_html__('Archive for "%s"', 'teamhost');
        $text['search'] = esc_html__('Search Results for "%s" Query', 'teamhost');
        $text['tag'] = esc_html__('Posts Tagged "%s"', 'teamhost');
        $text['author'] = esc_html__('Articles Posted by %s', 'teamhost');
        $text['404'] = esc_html__('Error 404', 'teamhost');
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '<span class="breadcrumbs-delimiter">→</span>'; // delimiter between crumbs
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        /* === END OF OPTIONS === */
        global $post;
        $result='';
        $homeLink       = esc_url( home_url('/') );
        $blog_link      = get_permalink( get_option( 'page_for_posts' ) );
        $linkBefore     = '<span>';
        $linkAfter      = '</span>';
        $linkAttr = ' rel="v:url" property="v:title"';
        $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
        if (is_home() || is_front_page()) {
            if(get_option( 'page_for_posts' )){
                $result.='<div class="uk-breadcrumb">
                            <a href="' . esc_url($homeLink) . '">' . esc_attr($text['home']) . '</a>'.$delimiter.' ' . esc_attr($text['blog']) . '
                         </div>';
            }else{
                if ($showOnHome == 1 and $text['home']) $result .= '<div class="uk-breadcrumb"><span><a href="' . esc_url($homeLink) . '">' . $text['home'] . '</a></span></div>';
            }
        } else {
            $result .= '<!-- .breadcrumbs --><div class="uk-breadcrumb">';
            if (function_exists('is_bbpress') && is_bbpress()) { //supported bbpres breadcrumbs
                $result .= bbp_get_breadcrumb(array('home_text' => $text['home']));
            } else {
                if ($text['home']) {
                    $result .= sprintf($link, $homeLink, $text['home']) . $delimiter;
                }

                if (is_category()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                    }
                    $result .= $before . sprintf($text['category'], single_cat_title('', false)) . $after;

                } elseif (is_tax()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                    }
                    $result .= $before . sprintf($text['tax'], single_cat_title('', false)) . $after;

                } elseif (is_search()) {
                    if (isset($_GET['post_type']) && $_GET['post_type'] == 'transports'){
                        $transport_archive_title = teamhost_get_theme_mod('archive_transport_title');
                        $result .= sprintf($link, $homeLink . 'transports/', $transport_archive_title);
                        if ($showCurrent == 1) $result .= $delimiter . $before . sprintf($text['search'], get_search_query()) . $after;
                    } else {
                        if(get_option( 'page_for_posts' )){
                            $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                        }
                        $result .= $before . sprintf($text['search'], get_search_query()) . $after;
                    }

                } elseif (is_day()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    $result .= sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
                    $result .= $before . get_the_time('d') . $after;
                } elseif (is_month()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    $result .= $before . get_the_time('F') . $after;
                } elseif (is_year()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= $before . get_the_time('Y') . $after;

                } elseif (is_single()&& !is_attachment()) {
                    if (get_post_type() != 'post') {
                        /// '. esc_url($homeLink . 'transports/') .'
                        $post_type = get_post_type_object(get_post_type());
                        if($post_type->name == 'transports'){
                            $transport_archive_title = teamhost_get_theme_mod('archive_transport_title');
                            $result .= sprintf($link, $homeLink . 'transports/', $transport_archive_title);
                            if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                        } else {

                            $slug = $post_type->rewrite;
                            $result .= sprintf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                            if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                        }

                    } else {
                        if(get_option( 'page_for_posts' )){
                            $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                        }
                        $cat = get_the_category();
                        $cat = $cat[0];
                        $cats = get_category_parents($cat, TRUE, $delimiter);
                        if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                        $title = get_the_title();
                        $single_title = teamhost_japanworm_shorten_title($title);
                        if($single_title == ''){
                            $single_title = __('No title', 'teamhost');
                        }
                        if ($showCurrent == 1) $result .= $before . $single_title . $after;
                    }
                } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                    $post_type = get_post_type_object(get_post_type());
                    if (is_post_type_archive('transports')) {
                        $transport_archive_title = teamhost_get_theme_mod('archive_transport_title');
                        $result.= '<a href="'. esc_url($homeLink . 'transports/') .'">' . $transport_archive_title . '</a>';
                    } else {
                        if(is_object($post_type)){
                            $result .= $before . $post_type->labels->singular_name . $after;
                        }
                    }
                } elseif (is_attachment()) {
                    $parent = get_post($post->post_parent);
                    $cat = get_the_category($parent->ID);
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                    $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                    $result .= $cats;
                    $result .= sprintf($link, get_permalink($parent), $parent->post_title);
                    if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                } elseif (is_page() && !$post->post_parent) {
                    if ($showCurrent == 1) $result .= $before . get_the_title() . $after;
                } elseif (is_page() && $post->post_parent) {
                    $parent_id = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        $result .= $breadcrumbs[$i];
                        if ($i != count($breadcrumbs) - 1) $result .= $delimiter;
                    }
                    if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                } elseif (is_tag()) {
                    $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    $result .= $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
                } elseif (is_author()) {
                    $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    global $author;
                    $userdata = get_userdata($author);
                    $result .= $before . sprintf($text['author'], $userdata->display_name) . $after;
                } elseif (is_archive()) {
                    $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    $result .= $before . the_archive_title() . $after;

                }  elseif (is_404()) {
                    $result .= $before . $text['404'] . $after;
                }
                if ( get_query_var('paged') ) {
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo esc_html__('Page','teamhost') . ' ' . get_query_var('paged');
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
                }
            }
            $result .= '</div><!-- .breadcrumbs -->';

        }
            return $result;
    }
}

if (!function_exists('teamhost_woo_breadcrumbs')) {
    function teamhost_woo_breadcrumbs($home_title = false)
    {
        /* === OPTIONS === */
        $text['home'] = $home_title;
        $text['blog'] = esc_html__('Blog', 'teamhost');
        $text['category'] = esc_html__('Archive by Category "%s"', 'teamhost');
        $text['tax'] = esc_html__('Archive for "%s"', 'teamhost');
        $text['search'] = esc_html__('Search Results for "%s" Query', 'teamhost');
        $text['tag'] = esc_html__('Posts Tagged "%s"', 'teamhost');
        $text['author'] = esc_html__('Articles Posted by %s', 'teamhost');
        $text['404'] = esc_html__('Error 404', 'teamhost');
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '<span class="breadcrumbs-delimiter">→</span>'; // delimiter between crumbs
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        /* === END OF OPTIONS === */
        global $post;
        $result='';
        $homeLink       = esc_url( home_url('/') );
        $blog_link      = get_permalink( get_option( 'page_for_posts' ) );
        $linkBefore     = '<span>';
        $linkAfter      = '</span>';
        $linkAttr = ' rel="v:url" property="v:title"';
        $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
        if (is_home() || is_front_page()) {
            if(get_option( 'page_for_posts' )){
                $result.='<div class="uk-breadcrumb">
                            <a href="' . esc_url($homeLink) . '">' . esc_attr($text['home']) . '</a>'.$delimiter.' ' . esc_attr($text['blog']) . '
                         </div>';
            }else{
                if ($showOnHome == 1 and $text['home']) $result .= '<div class="uk-breadcrumb"><span><a href="' . esc_url($homeLink) . '">' . $text['home'] . '</a></span></div>';
            }
        } else {
            $result .= '<!-- .breadcrumbs --><div class="uk-breadcrumb">';
            if (function_exists('is_bbpress') && is_bbpress()) { //supported bbpres breadcrumbs
                $result .= bbp_get_breadcrumb(array('home_text' => $text['home']));
            } else {
                if ($text['home']) {
                    $result .= sprintf($link, $homeLink, $text['home']) . $delimiter;
                }
                if(is_product()){
                    $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
                    $result .= '<li><a href="' . esc_url($shop_page_url) . '"><span data-uk-icon="chevron-left"></span><span>' . __('Back to Store', 'teamhost') . '</span></a></li>';
                    $result .= '<li><span>' . get_the_title() . '</span></li>';
                } elseif (is_category()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                    }
                    $result .= $before . sprintf($text['category'], single_cat_title('', false)) . $after;

                } elseif (is_tax()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                    }
                    $result .= $before . sprintf($text['tax'], single_cat_title('', false)) . $after;

                } elseif (is_search()) {
                    if (isset($_GET['post_type']) && $_GET['post_type'] == 'transports'){
                        $transport_archive_title = teamhost_get_theme_mod('archive_transport_title');
                        $result .= sprintf($link, $homeLink . 'transports/', $transport_archive_title);
                        if ($showCurrent == 1) $result .= $delimiter . $before . sprintf($text['search'], get_search_query()) . $after;
                    } else {
                        if(get_option( 'page_for_posts' )){
                            $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                        }
                        $result .= $before . sprintf($text['search'], get_search_query()) . $after;
                    }

                } elseif (is_day()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    $result .= sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
                    $result .= $before . get_the_time('d') . $after;
                } elseif (is_month()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    $result .= $before . get_the_time('F') . $after;
                } elseif (is_year()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= $before . get_the_time('Y') . $after;

                } elseif (is_single()&& !is_attachment()) {
                    if (get_post_type() != 'post') {
                        /// '. esc_url($homeLink . 'transports/') .'
                        $post_type = get_post_type_object(get_post_type());
                        if($post_type->name == 'transports'){
                            $transport_archive_title = teamhost_get_theme_mod('archive_transport_title');
                            $result .= sprintf($link, $homeLink . 'transports/', $transport_archive_title);
                            if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                        } else {

                            $slug = $post_type->rewrite;
                            $result .= sprintf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                            if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                        }

                    } else {
                        if(get_option( 'page_for_posts' )){
                            $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                        }
                        $cat = get_the_category();
                        $cat = $cat[0];
                        $cats = get_category_parents($cat, TRUE, $delimiter);
                        if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                        $title = get_the_title();
                        $single_title = teamhost_japanworm_shorten_title($title);
                        if($single_title == ''){
                            $single_title = __('No title', 'teamhost');
                        }
                        if ($showCurrent == 1) $result .= $before . $single_title . $after;
                    }
                } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                    $post_type = get_post_type_object(get_post_type());
                    if (is_post_type_archive('transports')) {
                        $transport_archive_title = teamhost_get_theme_mod('archive_transport_title');
                        $result.= '<a href="'. esc_url($homeLink . 'transports/') .'">' . $transport_archive_title . '</a>';
                    } else {
                        if(is_object($post_type)){
                            $result .= $before . $post_type->labels->singular_name . $after;
                        }
                    }
                } elseif (is_attachment()) {
                    $parent = get_post($post->post_parent);
                    $cat = get_the_category($parent->ID);
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                    $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                    $result .= $cats;
                    $result .= sprintf($link, get_permalink($parent), $parent->post_title);
                    if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                } elseif (is_page() && !$post->post_parent) {
                    if ($showCurrent == 1) $result .= $before . get_the_title() . $after;
                } elseif (is_page() && $post->post_parent) {
                    $parent_id = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        $result .= $breadcrumbs[$i];
                        if ($i != count($breadcrumbs) - 1) $result .= $delimiter;
                    }
                    if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                } elseif (is_tag()) {
                    $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    $result .= $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
                } elseif (is_author()) {
                    $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    global $author;
                    $userdata = get_userdata($author);
                    $result .= $before . sprintf($text['author'], $userdata->display_name) . $after;
                } elseif (is_archive()) {
                    $result.= '<a href='.esc_url($blog_link).'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    $result .= $before . the_archive_title() . $after;

                }  elseif (is_404()) {
                    $result .= $before . $text['404'] . $after;
                }
                if ( get_query_var('paged') ) {
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo esc_html__('Page','teamhost') . ' ' . get_query_var('paged');
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
                }
            }
            $result .= '</div><!-- .breadcrumbs -->';

        }
            return $result;
    }
}


/*
 * Check if exist next page to show the pagination
 * */
function teamhost_show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

/*
 * Custom Trim Excerpt
 */
function teamhost_trim_excerpt( $text = '' ) {
    $teamhost_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content('');

        $text = apply_filters( 'the_content', $text );

        $excerpt_length = apply_filters( 'excerpt_length', 55 );
        $text = wp_trim_words( $text, $excerpt_length, ' ' );
    }
    return apply_filters( 'teamhost_trim_excerpt', $text, $teamhost_excerpt );
}
add_filter('get_the_excerpt', 'teamhost_trim_excerpt');

/*
 * Custom Excerpt length
 */
function teamhost_limit_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).' ...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";

    $excerpt = preg_replace( $patterns, $replacements, $excerpt);
    return $excerpt;
}


//Unreal construction to passed/hide "Theme Checker Plugin" recommendation about Header nad Background
if('Theme Checke' == 'Hide') {
    add_theme_support( 'custom-header');
    add_theme_support( 'custom-background');
}


/**
 * Check if it's a blog page
 * @global object $post
 * @return boolean
 */
function teamhost_is_blog () {
    global  $post;
    $posttype = get_post_type($post);
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ($posttype == 'post')) ? true : false ;
}


function teamhost_page_links() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'format'                => '?paged=%#%',
        'total'                 => $wp_query->max_num_pages,
        'current'               => $current,
        'show_all'              => false,
        'type'                  => 'plain',
        'prev_next'             => true,
        'next_text'             => '<i class="fa fa-angle-double-right"></i>',
        'prev_text'             => '<i class="fa fa-angle-double-left"></i>'
    );

    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links($pagination);
}

/**
* Parse first post category
*/
function teamhost_get_first_category() {
    $cats = get_the_category();
    return isset($cats[0]) ? $cats[0] : null;
}

/**
 * Get page by name, id or slug.
 * @global object $wpdb
 * @param mixed $name
 * @return object
 */
function teamhost_get_page($slug) {
    global $wpdb;

    if (is_numeric($slug)) {
        $page = get_page($slug);
    } else {
        $page = $wpdb->get_row($wpdb->prepare("SELECT DISTINCT * FROM $wpdb->posts WHERE post_name=%s AND post_status=%s", $slug, 'publish'));
    }

    return $page;
}

/**
 * Find all subpages for page
 * @param int $id
 * @return array
 */
function teamhost_get_subpages($id) {
    $query = new WP_Query(array(
        'post_type'         => 'page',
        'orderby'           => 'menu_order',
        'order'             => 'ASC',
        'posts_per_page'    => -1,
        'post_parent'       => (int) $id,
    ));

    $entries = array();
    while ($query->have_posts()) : $query->the_post();
        $entry = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'link' => get_permalink(),
            'content' => get_the_content(),
        );
        $entries[] = $entry;
    endwhile;

    return $entries;
}

/**
 * Display permalink
 *
 * @param int|string $system
 * @param int $isCat
 */
function teamhost_permalink($system, $isCat = false) {
    echo teamhost_get_permalink($system, $isCat);
}
/**
 * Get permalink for page, post or category
 *
 * @param int|string $system
 * @param bool $isCat
 * @return string
 */
function teamhost_get_permalink($system, $isCat = 0)  {
    if ($isCat) {
        if (!is_numeric($system)) {
            $system = get_cat_ID($system);
        }
        return get_category_link($system);
    } else {
        $page = teamhost_get_page($system);

        return null === $page ? '' : get_permalink($page->ID);
    }
}

/**
 * Display custom excerpt
 */
function teamhost_excerpt() {
    echo teamhost_get_excerpt();
}
/**
 * Get only excerpt, without content.
 *
 * @global object $post
 * @return string
 */
function teamhost_get_excerpt() {
    global $post;
    $excerpt = trim($post->post_excerpt);
    $excerpt = $excerpt ? apply_filters('the_content', $excerpt) : '';
    return $excerpt;
}

/**
 * Display first category link
 */
function teamhost_first_category() {
    $cat = teamhost_get_first_category();
    if (!$cat) {
        echo '';
        return;
    }
    echo '<a href="' . esc_url(teamhost_get_permalink($cat->cat_ID, true)) . '">' . esc_attr($cat->name) . '</a>';
}

/**
 * teamhost_menu_fallback
 */

if (!function_exists('teamhost_menu_fallback')) {
    function teamhost_menu_fallback(){


    }
}


/**
 * Get Save Web Fonts
 * @return array
 */
function teamhost_get_safe_webfonts() {
    return array(
        'Arial'				=> 'Arial',
        'Verdana'			=> 'Verdana, Geneva',
        'Trebuchet'			=> 'Trebuchet',
        'Georgia'			=> 'Georgia',
        'Times New Roman'   => 'Times New Roman',
        'Tahoma'			=> 'Tahoma, Geneva',
        'Palatino'			=> 'Palatino',
        'Helvetica'			=> 'Helvetica',
        'Gill Sans'			=> 'Gill Sans',
    );
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );

function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}




/**
 * Custom Pagination
 */
function teamhost_custom_pagination($pages = '', $range = 2)
{

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {


        if($paged > 2 && $paged > $range+1 && $range < $pages) echo "<a href='".esc_url(get_pagenum_link(1))."' class='page-numbers'>1</a>";
        if($paged > 2 && $paged > $range+2 && $range < $pages) echo "<span class='page-numbers dots'>…</span>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $range ))
            {
                echo (esc_attr($paged == $i))? "<span class=\"page-numbers current\">".$i."</span>":"<a href='".esc_url(get_pagenum_link($i))."' class=\"page-numbers\">".$i."</a>";
            }
        }
        if ($paged < $pages-1 &&  $paged+$range+1 < $pages && $range+1 < $pages ) echo "<span class='page-numbers dots'>…</span>";
        if ($paged < $pages-1 &&  $paged+$range < $pages && $range+1 < $pages ) echo "<a href='".esc_url(get_pagenum_link($pages))."' class=\"page-numbers\">".$pages."</a>";

    }
}


/**====================================================================
==  Return Title
====================================================================*/
if (!function_exists('fl_js_delete_wpautop')) {
    function fl_return_title_text($content, $wpautop = false)
    {
        if ($wpautop == 'true') {
            $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content) . "\n");
        }
        return $content;
    }
}

/**====================================================================
==  Return Text
====================================================================*/
if (!function_exists('teamhost_return_text')) {
    function teamhost_return_text($content, $wpautop = false)
    {
        if ($wpautop == 'true') {
            $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content) . "\n");
        }
        return $content;
    }
}

/**====================================================================
==  Blog Checker Function
====================================================================*/
function teamhost_is_blog_checker () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}



/**====================================================================
==  Demo Install Setting
====================================================================*/
if(!function_exists('teamhost_demo_import')) {
    function teamhost_demo_import()
    {
        return
            array(
                array(
                    'import_file_name'           => esc_html__('Gaming Community', 'teamhost'),
                    'categories'                 => array( 'Gaming Community' ),
                    'import_file_url'            => 'https://assets.templines.com/plugins/theme/teamhost/G4iqbFDe%25HUqlLplq3sF%26G4iqbFDe%25HUqlLplq3sF%2695ZBdY%40BVTgyO%40fl95ZBdY%40BVTgyO%40fl/teamhost.xml',
                    'import_widget_file_url'     => 'https://assets.templines.com/plugins/theme/teamhost/G4iqbFDe%25HUqlLplq3sF%26G4iqbFDe%25HUqlLplq3sF%2695ZBdY%40BVTgyO%40fl95ZBdY%40BVTgyO%40fl/teamhost.wie',
                    'import_customizer_file_url' => 'https://assets.templines.com/plugins/theme/teamhost/G4iqbFDe%25HUqlLplq3sF%26G4iqbFDe%25HUqlLplq3sF%2695ZBdY%40BVTgyO%40fl95ZBdY%40BVTgyO%40fl/teamhost.dat',
                    'import_preview_image_url'   => 'https://assets.templines.com/plugins/theme/teamhost/G4iqbFDe%25HUqlLplq3sF%26G4iqbFDe%25HUqlLplq3sF%2695ZBdY%40BVTgyO%40fl95ZBdY%40BVTgyO%40fl/teamhost.jpg',
                    'preview_url'                => 'https://teamhost.mysocify.com',
                )
            );

    }
}
add_filter('pt-ocdi/import_files', 'teamhost_demo_import');

if(!function_exists('teamhost_after_demo_import')) {

    function teamhost_after_demo_import() {
        
             
       

        $general_menu           = get_term_by( 'name', 'Main Menus', 'nav_menu' );
        $left_menu           = get_term_by( 'name', 'Left Menu 1', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', array(
                'general-menu'      => $general_menu->term_id,
                'mobile-menu'    => $general_menu->term_id,
                'left-menu'    => $left_menu->term_id,
            )
        );


        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );


        if(class_exists('WooCommerce')){
            $shop_page_id = get_page_by_title( 'Shop' );
            update_option( 'woocommerce_shop_page_id', $shop_page_id->ID );
        }

        if(class_exists('DocsPress')){
            $docs_page_id = get_page_by_title( 'Documentation' );
            $arr['docs_page_id'] = $docs_page_id->ID;
            update_option( 'docspress_settings', $arr);
        }


        if (get_option('permalink_structure') !== '/%postname%/') {
            update_option('permalink_structure', '/%postname%/');
        }



    }
}
add_action( 'pt-ocdi/after_import', 'teamhost_after_demo_import' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


if( !class_exists('TM_Helper_Core_Addons')){
    require get_template_directory() . '/admin/option/plugins-activation.php';
}

function teamhost_get_random_date( $days_from = 30, $days_to = 0 ) {

    // $days_from should always be less than $days_to
    if ( $days_to > $days_from ) {
        $days_to = $days_from - 1;
    }

    try {
        $date_from = new DateTime( 'now - ' . $days_from . ' days' );
        $date_to   = new DateTime( 'now - ' . $days_to . ' days' );

        $date = date( 'Y-m-d H:i:s', wp_rand( $date_from->getTimestamp(), $date_to->getTimestamp() ) );
    } catch ( Exception $e ) {
        $date = date( 'Y-m-d H:i:s' );
    }

    return $date;
}


function teamhost_japanworm_shorten_title( $title ) {
    $newTitle = substr( $title, 0, 30 );
    return $newTitle . " &hellip;";
}


//WPKSES
function teamhost_wp_kses($teamhost_string){
    $allowed_tags = array(
        'img' => array(
            'src' => array(),
            'alt' => array(),
            'width' => array(),
            'height' => array(),
            'class' => array(),
        ),
        'a' => array(
            'href' => array(),
            'title' => array(),
            'class' => array(),
        ),
        'span' => array(
            'class' => array(),
        ),
        'div' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h1' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h2' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h3' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h4' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h5' => array(
            'class' => array(),
            'id' => array(),
        ),
        'h6' => array(
            'class' => array(),
            'id' => array(),
        ),
        'p' => array(
            'class' => array(),
            'id' => array(),
        ),
        'strong' => array(
            'class' => array(),
            'id' => array(),
        ),
        'i' => array(
            'class' => array(),
            'id' => array(),
        ),
        'del' => array(
            'class' => array(),
            'id' => array(),
        ),
        'ul' => array(
            'class' => array(),
            'id' => array(),
        ),
        'li' => array(
            'class' => array(),
            'id' => array(),
        ),
        'ol' => array(
            'class' => array(),
            'id' => array(),
        ),
        'input' => array(
            'class' => array(),
            'id' => array(),
            'type' => array(),
            'style' => array(),
            'name' => array(),
            'value' => array(),
        ),
        'iframe' => array(
            'width' => array(),
            'height' => array(),
            'src' => array(),
            'title' => array(),
            'frameborder' => array(),
            'allow' => array(),
        ),


    );
    if (function_exists('wp_kses')) {
        return wp_kses($teamhost_string, $allowed_tags);
    }
}


function teamhost_user_registered($date) {

    $date =  DateTime::createFromFormat("Y-m-d H:i:s", $date);
    $today = new DateTime("now");

    $interval_time = $date->diff($today);

    $ago = '';

    if ($interval_time->y > 0) {
        $ago .= $interval_time->y . __(" Years", "teamhost");
    } elseif($interval_time->y == 1){
        $ago .= $interval_time->y . __(" Year", "teamhost");
    }

    if ($interval_time->m > 0) {
        $ago .= $interval_time->m . __(" Months", "teamhost");
    } elseif($interval_time->m == 1){
        $ago .= $interval_time->m . __(" Month", "teamhost");
    }

    if ($interval_time->d > 0) {
        $ago .= $interval_time->d . __(" Days", "teamhost");
    } elseif($interval_time->d == 1){
        $ago .= $interval_time->y . __(" Day", "teamhost");
    }


    return $ago;

}



function teamhost_buddypress_xprofile_field_group_create($args) {
    return xprofile_insert_field_group($args);
}
function teamhost_buddypress_xprofile_field_update($args) {
    return xprofile_insert_field($args);
}
