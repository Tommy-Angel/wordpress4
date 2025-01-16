<?php
/**
 * Display share options
 * 
 * @param string $type 
 */
function tm_share($type = 'fb') {
    echo tm_get_share($type);
}

/**
 * Get link for sharing
 * 
 * @param string $type
 * @return string
 */
function tm_get_share($type = 'fb', $permalink = false, $title = false) {
    if (!$permalink) {
        $permalink = get_permalink();
    }
    if (!$title) {
        $title = get_the_title();
    }

global $post;
    $excerpt = get_the_excerpt();
    $image_url = get_the_post_thumbnail_url($post->ID,'full');

    switch ($type) {
        case 'twi':
            return 'http://twitter.com/home?status=' . esc_attr($title) . '+-+' . esc_url($permalink);
            break;
        case 'fb':
            return 'http://www.facebook.com/sharer.php?u=' . esc_url($permalink) . '&t=' . esc_attr($title);
            break;
        case 'tumblr':
            return 'http://tumblr.com/widgets/share/tool?canonicalUrl='. urlencode(esc_url($permalink));
            break;
        case 'vk':
            return 'http://vkontakte.ru/share.php?url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title).'&description='.esc_attr($excerpt);
            break;
        case 'pin':
            return 'http://pinterest.com/pin/create/button/?url='. urlencode(esc_url($permalink)).'&description='.esc_attr($excerpt).'&media='.urlencode(esc_url($image_url));
            break;
        case 'red':
            return 'http://reddit.com/submit?url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title);
            break;
        case 'lin':
            return 'https://www.linkedin.com/shareArticle?mini=true&url='. urlencode(esc_url($permalink)).'&title='.esc_attr($title).'&summary='.esc_attr($excerpt);
            break;
        default:
            return '';
    }
}

function tm_get_share_show(){
    $social_sharing_setting = liarch_get_theme_mod('social_sharing_setting');
    $idf = uniqid().'-'.rand(100,9999);
    $result ='';
    $result .= '<div class="fl-post-share-contain" id="fl-share-buttons-contain-'. esc_attr($idf,'fl-themes-helper') .'">';
    $result .= '<a class="fl-share fl--btn-share"><i class="ecata-share" aria-hidden="true"></i></a>';
    $result .= '<div class="fl-share-buttons-contain">';
    foreach ($social_sharing_setting as $soc_share){
        if($soc_share == 'fb'){
            $soc_share_icon = '<i class="fa fa-facebook" aria-hidden="true"></i>';
        } elseif ($soc_share == 'twi'){
            $soc_share_icon = '<i class="fa fa-twitter" aria-hidden="true"></i>';
        }elseif ($soc_share == 'goglp'){
            $soc_share_icon = '<i class="fa fa-google-plus" aria-hidden="true"></i>';
        }elseif ($soc_share == 'vk'){
            $soc_share_icon = '<i class="fa fa-vk" aria-hidden="true"></i>';
        }elseif ($soc_share == 'pin'){
            $soc_share_icon = '<i class="fa fa-pinterest" aria-hidden="true"></i>';
        }elseif ($soc_share == 'red'){
            $soc_share_icon = '<i class="fa fa-reddit" aria-hidden="true"></i>';
        }elseif ($soc_share == 'lin'){
            $soc_share_icon = '<i class="fa fa-linkedin" aria-hidden="true"></i>';
        }
        $result .= "<div class='fl--share-icons-contain'>";
        $result .= '<a class="fl--btn-icon" target="blank" href="'.tm_get_share($soc_share, $permalink = true, $title = false).'">'.$soc_share_icon.'</a>';
        $result .= "</div>";
    }
    $result .= '</div>';
    $result .= '</div>';
    $result .= '<span class="fl-text-bold-style">' . esc_html__('Share This', 'fl-themes-helper') . '</span>';
    $result .= '<script>
        jQuery.noConflict()(document).ready( function() {
            jQuery("#fl-share-buttons-contain-' . $idf . '").on("click", function() {
                if(jQuery(this).children(".fl-share-buttons-contain").hasClass("active")){
                    jQuery(this).children(".fl-share-buttons-contain").removeClass("active");
                }else{
                    jQuery(this).children(".fl-share-buttons-contain").addClass("active");
                }
            });
        });
    </script>';

    return $result;
}