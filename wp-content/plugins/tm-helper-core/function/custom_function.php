<?php
/**
 * Custom User Contact methods
 */

    add_filter('user_contactmethods', 'tm_add_contact_info');

    if (!function_exists('tm_add_contact_info')) {

        function tm_add_contact_info($contact_info)
        {
            $contact_info['facebook']       = esc_html__('Facebook Username', 'tm-helper-core');
            $contact_info['google']         = esc_html__('Google Plus Username', 'tm-helper-core');
            $contact_info['instagram']      = esc_html__('Instagram Username', 'tm-helper-core');
            $contact_info['pinterest']      = esc_html__('Pinterest Username', 'tm-helper-core');
            $contact_info['twitter']        = esc_html__('Twitter Username', 'tm-helper-core');
            $contact_info['behance']        = esc_html__('Behance Username', 'tm-helper-core');
            $contact_info['phone']          = esc_html__('Phone Number', 'tm-helper-core');
            return $contact_info;
        }

    }

// Instagram
function tm_theme_helper_instagram_api_curl_connect( $api_url ){
    $connection_c = curl_init(); // initializing
    curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
    curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
    curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
    $json_return = curl_exec( $connection_c ); // connect and get json data
    curl_close( $connection_c ); // close connection
    return json_decode( $json_return ); // decode and return
}

/**====================================================================
==  Shortcode custom text
====================================================================*/
if (!function_exists('tm_js_delete_wpautop')) {
    function tm_delete_wpautop($content, $wpautop = false)
    {
        if ($wpautop) {
            $content = preg_replace('/<\/?p\>/', "\n", $content);
        }

        return $content;
    }
}
/**
 * Custom Excerpt length
 */
function tm_limit_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
/**
 * Custom Pagination
 */
function tm_custom_pagination($pages = '', $range = 2)
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

        if($paged > 1  ) echo "<a href='".get_pagenum_link($paged - 1)."' class='page-numbers'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></a>";

        if($paged > 2 && $paged > $range+1 && $range < $pages) echo "<a href='".get_pagenum_link(1)."' class='page-numbers'>1</a>";
        if($paged > 2 && $paged > $range+2 && $range < $pages) echo "<span class='page-numbers dots'>…</span>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $range ))
            {
                echo ($paged == $i)? "<span class=\"page-numbers current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"page-numbers\">".$i."</a>";
            }
        }
        if ($paged < $pages-1 &&  $paged+$range+1 < $pages && $range+1 < $pages ) echo "<span class='page-numbers dots'>…</span>";
        if ($paged < $pages-1 &&  $paged+$range < $pages && $range+1 < $pages ) echo "<a href='".get_pagenum_link($pages)."' class=\"page-numbers\">".$pages."</a>";

        if ($paged < $pages ) echo "<a href=\"".get_pagenum_link($paged + 1)."\" class=\"page-numbers\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a>";
    }
}


/* get_intermediate_image_sizes() without keys */
if (!function_exists( 'tm_get_image_sizes' )) :
    function tm_get_image_sizes() {
        $sizes = get_intermediate_image_sizes();
        $result = array('full' => 'full');
        foreach($sizes as $k => $name) {
            $result[$name] = $name;
        }
        return $result;
    }
endif;


/**
 * Get Attachment Attribute for Images
 */
if (!function_exists( 'tm_get_attachment' )) :
    function tm_get_attachment($attachment_id, $attachment_size = 'full')
    {
        if (filter_var($attachment_id, FILTER_VALIDATE_URL)) {
            $path_to_image = $attachment_id;
            $attachment_id = attachment_url_to_postid($attachment_id);
            if (is_numeric($attachment_id) && $attachment_id == 0) {
                return array(
                    'alt' => null,
                    'caption' => null,
                    'description' => null,
                    'href' => null,
                    'src' => $path_to_image,
                    'title' => null,
                    'width' => null,
                    'height' => null,
                );
            }
        }

        if (is_numeric($attachment_id) && $attachment_id !== 0) {
            $attachment = get_post($attachment_id);
            if(is_object($attachment)) {
                $attachment_src = array();
                if (isset($attachment_size)) {
                    $attachment_src = wp_get_attachment_image_src($attachment_id, $attachment_size);
                }
                return array(
                    'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
                    'caption' => $attachment->post_excerpt,
                    'description' => $attachment->post_content,
                    'href' => get_permalink($attachment->ID),
                    'src' => isset($attachment_src[0]) ? $attachment_src[0] : $attachment->guid,
                    'title' => $attachment->post_title,
                    'width' => isset($attachment_src[1]) ? $attachment_src[1] : false,
                    'height' => isset($attachment_src[2]) ? $attachment_src[2] : false,
                );
            }
        }
        return false;
    }
endif;


function tm_post_taxonomy($post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true)
{
    $tags = wp_get_post_terms($post_id, $taxonomy);
    $list = '';
    foreach ($tags as $tag) {
        if ($link) {
            $list .= '<a href="' . get_category_link($tag->term_id) . '">' . $tag->$get . '</a>' . $delimiter;
        } else {
            $list .= $tag->$get . $delimiter;
        }
    }
    return substr($list, 0, strlen($delimiter) * (-1));
}











add_filter('style_loader_tag', 'tm_fixed_validator_error', 10, 2);
add_filter('script_loader_tag', 'tm_fixed_validator_error', 10, 2);
add_filter('wp_print_footer_scripts ', 'tm_fixed_validator_error', 10, 2);
function tm_fixed_validator_error($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}



// Generate custom css option vc
if( ! function_exists( 'tm_helping_generate_custom_css' ) ) {
    function tm_helping_generate_custom_css() {
        global $tm_helping_responsive_lg_style , $tm_helping_responsive_md_style ,$tm_helping_responsive_sm_style , $tm_helping_css_style;

        // Custom Css
        $output_css_style = '';
        if( !empty($tm_helping_css_style)) {
            ob_start();
            echo '<style id="tm-helping-custom-vc-css" type="text/css">';
            foreach ($tm_helping_css_style as $key => $value) {
                echo $value;
            }
            echo '</style>';
            $output_css_style = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css_style = preg_replace( '#/\*.*?\*/#s', '', $output_css_style );
            $output_css_style = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css_style );
            $output_css_style = preg_replace( '/\s\s+(.*)/', '$1', $output_css_style );

            ?>
            <script type="text/javascript"> (function($) { $('head').append('<?php print $output_css_style; ?>'); })(jQuery); </script>
            <?php
        }
        // Custom Css Resonsive Style
        // Large
        if( !empty( $tm_helping_responsive_lg_style ) ) {
            $output_responsive_css = '';
            ob_start();
            echo '<style id="tm-helping-custom-responsive-lg-css" type="text/css">';
                echo '@media screen and (max-width: 992px) {';
                    foreach ($tm_helping_responsive_lg_style as $key => $value) {
                        echo $value;
                    }
                echo '}';
            echo '</style>';
            $output_responsive_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_responsive_css = preg_replace( '#/\*.*?\*/#s', '', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s\s+(.*)/', '$1', $output_responsive_css );

            ?>
            <script type="text/javascript"> (function($) { $('head').append('<?php print $output_responsive_css ?>'); })(jQuery); </script>
            <?php
        }
        // Medium
        if( !empty( $tm_helping_responsive_md_style ) ) {
            $output_responsive_css = '';
            ob_start();
            echo '<style id="tm-helping-custom-responsive-md-css" type="text/css">';
                echo '@media screen and (max-width: 768px) {';
                    foreach ($tm_helping_responsive_md_style as $key => $value) {
                        echo $value;
                    }
                echo '}';
            echo '</style>';
            $output_responsive_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_responsive_css = preg_replace( '#/\*.*?\*/#s', '', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s\s+(.*)/', '$1', $output_responsive_css );

            ?>
            <script type="text/javascript"> (function($) { $('head').append('<?php print $output_responsive_css ?>'); })(jQuery); </script>
            <?php
        }
        // Small
        if( !empty( $tm_helping_responsive_sm_style ) ) {
            $output_responsive_css = '';
            ob_start();
            echo '<style id="tm-helping-custom-responsive-sm-css" type="text/css">';
                echo '@media screen and (max-width: 576px) {';
                    foreach ($tm_helping_responsive_sm_style as $key => $value) {
                        echo $value;
                    }
                echo '}';
            echo '</style>';
            $output_responsive_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_responsive_css = preg_replace( '#/\*.*?\*/#s', '', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s\s+(.*)/', '$1', $output_responsive_css );

            ?>
            <script type="text/javascript"> (function($) { $('head').append('<?php print $output_responsive_css ?>'); })(jQuery); </script>
            <?php
        }
    }
}
add_action( 'wp_footer', 'tm_helping_generate_custom_css', 999 );



/*
 * Post share
 * */

function tm_share_buttons($tw=false,$fb=false,$lk=false,$pin=false,$rd=false,$vk = false) {
    global $post;
    if( !$post )
        return false;
    $output ='';
    // Permalink
    $permalink      = get_permalink( $post->ID );
    // Post image
    $featured_image  =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $image_post_share = $featured_image['0'];
    // Post Title
    $post_title     = rawurlencode( get_the_title( $post->ID ) );
    $excerpt        = get_the_excerpt();
    // Twitter
    if($tw =='true'){
        $output  .= '<a class="tm-share--icon tm-primary-color-hv" href="https://twitter.com/home?status=' . $post_title . '+' . $permalink . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-twitter"></i></a>';
    }
    //Facebook
    if($fb =='true') {
        $output .= '<a class="tm-share--icon tm-primary-color-hv" href="https://www.facebook.com/share.php?u=' . $permalink . '&title=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-facebook"></i></a>';
    }
    // LinkedIn
    if($lk =='true') {
        $output .= '<a class="tm-share--icon tm-primary-color-hv" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $permalink . '&title=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-linkedin"></i></a>';
    }
    // Pinterest
    if($pin =='true') {
        $output .= '<a class="tm-share--icon tm-primary-color-hv" href="http://pinterest.com/pin/create/bookmarklet/?media=' . $image_post_share . '&url=' . $permalink . '&is_video=false&description=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-pinterest-p"></i></a>';
    }
    // Reddit
    if($rd =='true') {
        $output .= '<a class="tm-share--icon tm-primary-color-hv" href="http://reddit.com/submit?url='.$permalink.'&title=' . $post_title . '" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-reddit-alien"></i></a>';
    }
    // VK
    if($vk =='true') {
         $output .='<a class="tm-share--icon tm-primary-color-hv" href="http://vkontakte.ru/share.php?url='.urlencode(esc_url($permalink)).'&title=' . $post_title . '&description='.esc_attr($excerpt).'" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\');  return false;"><i class="fa fa-vk"></i></a>';
    }
    return $output;
}




// Breadcrumbs function



if( ! function_exists( 'tm_theme_helping_breadcrumb' ) ) {
    //Breadcrumbs Function
    function tm_theme_helping_breadcrumb() {

        $text['home']           = esc_html__('Home','revus');
        $text['blog']           = esc_html__('Blog','revus');
        $text['category']       = esc_html__('Archive','revus').' "%s"';
        $text['search']         = esc_html__('Search results:','revus').' "%s"';
        $text['tag']            = esc_html__('Tag','revus').' "%s"';
        $text['author']         = esc_html__('Author','revus').' %s';
        $text['404']            = esc_html__('Error 404','revus');
        $text['shop_page']      = esc_html__('Shop','revus');



        $show_current           = 1;
        $show_on_home           = 0;
        $show_home_link         = 1;
        $show_title             = 1;
        $delimiter              = '<span class="breadcrumbs-delimiter tm-primary-color"><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span>';

        global $post;
        $home_link    = esc_url(home_url('/'));
        $blog_link    = get_permalink( get_option( 'page_for_posts' ) );
        $link_before  = '<span typeof="v:Breadcrumb">';
        $link_after   = '</span>';
        $link_attr    = ' rel="v:url" property="v:title"';
        $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
        if(isset($post->post_parent)){$my_post_parent = $post->post_parent;}else{$my_post_parent=1;}
        $parent_id    = $parent_id_2 = $my_post_parent;
        $frontpage_id = get_option('page_on_front');

        if (is_home() || is_front_page()) {
            if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
            if(get_option( 'page_for_posts' )){
                echo '<div class="breadcrumbs">
                    <a href="' . esc_url($home_link) . '">' . esc_attr($text['home']) . '</a>'.$delimiter.' ' . esc_attr($text['blog']) . '
                  </div>';
            }
        }
        else {
            echo '<div class="breadcrumbs">';
            if ($show_home_link == 1) {
                echo sprintf($link, $home_link, $text['home']);
                if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
            }

            if ( is_category() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }

                $this_cat = get_category(get_query_var('cat'), false);
                if ($this_cat->parent != 0) {
                    $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                    if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo tm_wp_kses($cats);
                }
                if ($show_current == 1) echo '<span class="current">' . sprintf($text['category'], single_cat_title('', false)) . '</span>' ;

            } elseif ( is_search() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo '<span class="current">' . sprintf($text['search'], get_search_query()) . '</span>';

            } elseif ( is_day() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
                echo '<span class="current">' . get_the_time('d') . '</span>';

            } elseif ( is_month() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo '<span class="current">' . get_the_time('F') . '</span>';

            } elseif ( is_year() ) {
                if(get_option( 'page_for_posts' )){
                    echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                }
                echo '<span class="current">' . get_the_time('Y') . '</span>';

            } elseif ( is_single() && !is_attachment() ) {
                if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                    if ($show_current == 1) echo $delimiter . '<span class="current">' . get_the_title() . '</span>';
                } else {
                    if(get_option( 'page_for_posts' )){
                        echo '<a href="' . esc_url($blog_link) . '">' . esc_attr($text['blog']) . '</a>'.$delimiter;
                    }
                    $cat = get_the_category(); $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo tm_wp_kses($cats);
                    if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';
                }

            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
                echo '<span class="current">' . esc_attr($post_type->labels->singular_name) . '</span>';

            } elseif ( is_attachment() ) {
                $parent = get_post($parent_id);
                $cat = get_the_category($parent->ID); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo tm_wp_kses($cats);
                printf($link, get_permalink($parent), $parent->post_title);
                if ($show_current == 1) echo $delimiter . '<span class="current">' . get_the_title() . '</span>';

            } elseif ( is_page() && !$parent_id ) {
                if ($show_current == 1) echo '<span class="current">' . get_the_title() . '</span>';

            } elseif ( is_page() && $parent_id ) {
                if ($parent_id != $frontpage_id) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        if ($parent_id != $frontpage_id) {
                            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        }
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo tm_wp_kses($breadcrumbs[$i]);
                        if ($i != count($breadcrumbs)-1) echo $delimiter;
                    }
                }
                if ($show_current == 1) {
                    if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                    echo '<span class="current">' . get_the_title() . '</span>';
                }

            } elseif ( is_tag() ) {
                echo '<span class="current">' . sprintf($text['tag'], single_tag_title('', false)) . '</span>';

            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo '<span class="current">' . sprintf($text['author'], $userdata->display_name) . '</span>';

            } elseif ( is_404() ) {
                echo '<span class="current">' . esc_attr($text['404']) . '</span>';

            }




            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                echo esc_html__('Page','revus') . ' ' . get_query_var('paged');
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }




            echo '</div><!-- .breadcrumbs -->';

        }
    }
}



add_filter( 'script_loader_tag', 'tm_helper_core_remove_type', 10, 3 );
add_filter( 'style_loader_tag', 'tm_helper_core_remove_type', 10, 3 );  // Ignore the $media argument to allow for a common function.
function tm_helper_core_remove_type( $markup, $handle, $href ) {
    //error_log( 'Markup: ' . $markup );
    //error_log( 'Handle: ' . $handle );
    //error_log( 'Href: ' . $href );
    // Remove the 'type' attribute.
    $markup = str_replace( " type='text/javascript'", '', $markup );
    $markup = str_replace( " type='text/css'", '', $markup );
    return $markup;
}
// Store and process wp_head output to operate on inline scripts and styles.
add_action( 'wp_head', 'tm_helper_core_wp_head_ob_start', 0 );
function tm_helper_core_wp_head_ob_start() {
    ob_start();
}
//add_action( 'wp_head', 'tm_helper_core_wp_head_ob_end', 10000 );
function tm_helper_core_wp_head_ob_end() {
    $wp_head_markup = ob_get_contents();
    ob_end_clean();

    // Remove the 'type' attribute. Note the use of single and double quotes.
    $wp_head_markup = str_replace( " type='text/javascript'", '', $wp_head_markup );
    $wp_head_markup = str_replace( ' type="text/javascript"', '', $wp_head_markup );
    $wp_head_markup = str_replace( ' type="text/css"', '', $wp_head_markup );
    $wp_head_markup = str_replace( " type='text/css'", '', $wp_head_markup );
    echo $wp_head_markup;
}


// Store and process wp_footer output to operate on inline scripts and styles.
add_action( 'wp_footer', 'tm_helper_core_wp_footer_ob_start', 0 );
function tm_helper_core_wp_footer_ob_start() {
    ob_start();
}

add_action( 'wp_footer', 'tm_helper_core_wp_footer_ob_end', 10000 );
function tm_helper_core_wp_footer_ob_end() {
    $wp_footer_markup = ob_get_contents();
    ob_end_clean();

    // Remove the 'type' attribute. Note the use of single and double quotes.
    $wp_footer_markup = str_replace( " type='text/javascript'", '', $wp_footer_markup );
    $wp_footer_markup = str_replace( ' type="text/javascript"', '', $wp_footer_markup );
    $wp_footer_markup = str_replace( ' type="text/css"', '', $wp_footer_markup );
    $wp_footer_markup = str_replace( " type='text/css'", '', $wp_footer_markup );
    echo $wp_footer_markup;
}


function tm_japanworm_shorten_title( $title, $length) {
    $newTitle = substr( $title, 0, $length ); // Only take the first 20 characters
    return $newTitle . " &hellip;"; // Append the elipsis to the text (...)
}



function tm_bp_get_group_member_count_number( $group = false ) {
    $group = bp_get_group( $group );
    if ( empty( $group->id ) ) {
        return '';
    }
    $count        = (int) $group->total_member_count;
    return $count;
}


function tm_get_group_reviews_count($group_id){
    $args                 = array(
        'post_type'      => 'review',
        'post_status'    => 'publish',
        'category'       => 'group',
        'posts_per_page' => -1,
        'meta_query'     => array(
            array(
                'key'     => 'linked_group',
                'value'   => $group_id,
                'compare' => '=',
            ),
        ),
    );
    $reviews              = get_posts( $args );
   return count($reviews);

}


function tm_get_group_rating_average($group_id){
    $args                 = array(
        'post_type'      => 'review',
        'post_status'    => 'publish',
        'category'       => 'group',
        'posts_per_page' => -1,
        'meta_query'     => array(
            array(
                'key'     => 'linked_group',
                'value'   => $group_id,
                'compare' => '=',
            ),
        ),
    );
    $reviews              = get_posts( $args );
    $reviews_count = count($reviews);
    $review_star = 0;

    if(isset($reviews) && !empty($reviews)){
        foreach ($reviews as $rev){
            $review_av = get_post_meta($rev->ID, 'review_star_rating', true);
            $review_star += intval($review_av['review']);
        }
        $average = $review_star / $reviews_count;
        return $average;
    } else {
        return false;
    }
}


function tm_get_group_reviews_stars($group_id){
    $rating_icons = '';
    $average = tm_get_group_rating_average($group_id);
    $i = 1;
    while ($i <= intval($average)){
        $rating_icons .= '<i class="ico_star st-active"></i>';
        $i++;
    }
    if(intval($average) < 5){
        $asd = 5 - intval($average);
        $k = 1;
        while ($k <= $asd){
            $rating_icons .= '<i class="ico_star "></i>';
            $k++;
        }
    }
    return $rating_icons;
}


function tm_altered_post_time_ago_function($id) {
    $days = round((date('U') - get_the_time('U', $id)) / (60*60*24));
    if ($days == 0) {
        return esc_attr__("Published Today", 'tm-helper-core');
    }
    elseif ($days == 1) {
        return  $days . esc_attr__(" day ago", 'tm-helper-core');
    }
    else {
        return $days . esc_attr__(" days ago", 'tm-helper-core');
    }
}