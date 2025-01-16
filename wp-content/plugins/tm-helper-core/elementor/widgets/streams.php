<?php
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor activities widget.
 *
 * Elementor widget that displays a bullet list with any chosen icons and texts.
 *
 * @since 1.0.0
 */
class TM_Streams extends Widget_Base {

    public function get_name() {
        return 'tm-streams';
    }

    public function get_title() {
        return esc_html__( 'Streams', 'tm-helper-core' );
    }

    public function get_icon() {
        return 'fab fa-font tm-icon';
    }

    public function get_categories() {
        return array('tm-helper-core-elements');
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_elementor_text_editor_general_style',
            [
                'label' => __( 'General Styles', 'tm-helper-core' ),
            ]
        );

        $this->add_control(
            'www',
            [
                'label' => __( '"WWW" enable (select if doesn"t work twitch)', 'tm-helper-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'disable' => esc_attr__('Disable', 'tm-helper-core'),
                    'enable' => esc_attr__('Enable', 'tm-helper-core'),
                ],
                'default' => 'disable',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'streams', 'role', 'streams' );
        $settings = $this->get_settings_for_display();

        $streams = get_posts(array(
            'posts_per_page' => -1,
            'ignore_sticky_posts' => 1,
            'post_status' => 'publish',
            'post_type' => 'streams'
        ));
        ?>

        <div data-uk-filter="target: .js-filter">
            <?php
            $terms_html = '';
            $streams_html = '';
            $terms_arr = array();
            $terms_html .= '<li class="uk-active" data-uk-filter-control><a href="#">' . __('All', 'tm-helper-core') . '</a></li>';
            foreach ($streams as $steam) {
                $terms = get_the_terms($steam->ID, 'streams-category');
                
                // Check if $terms is an array before iterating
                if (is_array($terms)) {
                    foreach ($terms as $term) {
                        if (!in_array($term->slug, $terms_arr)) {
                            $terms_html .= '<li data-uk-filter-control="[data-type=\'' . $term->slug .'\']"><a href="#">' . $term->name .'</a></li>';
                            $terms_arr[] = $term->slug;
                        }
                    }
                }

                $streams_html .= '<li data-type="' . ($term->slug ?? '') .'">';

                $streams_html .= '<div class="stream-item">';
                $streams_html .= '<div class="stream-item__box">';
                $streams_html .= '<div class="stream-item__media" data-uk-lightbox="video-autoplay: true">';
                $protocols = array('https://', 'https://www.', 'http://', 'http://www.', 'www.');
                $link_site = str_replace($protocols, '', get_bloginfo('wpurl'));
                if (strpos($link_site, '/') !== false) {
                    $link_site = strstr($link_site, '/', true);
                }

                if ('twitch' == tm_helper_get_metabox('stream_type', $steam->ID)) {
                    $acc_nickname = tm_helper_get_metabox('twitch_link', $steam->ID);
                    if (isset($settings['www']) && $settings['www'] == 'enable') {
                        $link = 'https://player.twitch.tv/?channel=' . tm_helper_get_metabox('twitch_link', $steam->ID) . '&parent=www.' . $link_site;
                    } else {
                        $link = 'https://player.twitch.tv/?channel=' . tm_helper_get_metabox('twitch_link', $steam->ID) . '&parent=' . $link_site;
                    }

                    $type = 'iframe';

                    if (class_exists('TP_Twitch_Stream')) {
                        $streams = tp_twitch_get_streams(array('streamer' => $acc_nickname));
                        foreach ($streams as $str) {
                            $status = $str->stream['type'];
                            $views = $str->get_viewer(true);
                            $thumb_url = $str->get_thumbnail_url(283, 206);
                            $alt = $str->get_thumbnail_alt();
                        }
                    }
                } else {
                    $acc_nickname = tm_helper_get_metabox('youtube_acc', $steam->ID);
                    $link = tm_helper_get_metabox('youtube_link', $steam->ID);
                    $type = 'youtube';
                }

                $streams_html .= '<a href="'. $link .'" data-type="' . $type . '" data-attrs="width: 1280; height: 720;" data-caption="' . $steam->post_title . '">';
                if (isset($thumb_url) && $thumb_url != '') {
                    $streams_html .= '<img src="' . $thumb_url . '" alt="' . $alt . '" />';
                } elseif (has_post_thumbnail($steam->ID)) {
                    $streams_html .= '<img src="' . get_the_post_thumbnail_url($steam->ID) . '" alt="' . $steam->post_title . '" />';
                } else {
                    $streams_html .= '<img src="' . TM_HELPER_CORE_PREVIEW_IMAGE . '/no_image.jpg" alt="' . $steam->post_title . '" />';
                }

                $streams_html .= '</a>';
                $streams_html .= '<div class="stream-item__info">';
                if (isset($status) && $status != '') {
                    $streams_html .= ' <div class="stream-item__status ' . $status .'">' .$status . '</div>';
                }

                if (isset($views) && $views != '') {
                    $streams_html .= '<div class="stream-item__count">' . $views . '</div>';
                }
                $streams_html .= '</div>';
                $streams_html .= '</div>';
                $streams_html .= '<div class="stream-item__body">
                                    <a class="stream-item__title" href="' . get_permalink($steam->ID) . '">' . $steam->post_title .'</a>
                                    <div class="stream-item__nicname">' . $acc_nickname . '</div>
                                    <div class="stream-item__time"><i class="icon-calendar"></i>' . tm_altered_post_time_ago_function($steam->ID) . '</div>
                                </div>';
                $streams_html .= '</div>';
                $streams_html .= '</div>';
                $streams_html .= '</li>';
            }

            if (is_user_logged_in()) {
                $author_ID = get_current_user_id();
                $user = get_user_by('ID', $author_ID);
                if (class_exists('WeDevs_Dokan')) {
                    $vendor = dokan()->vendor->get($author_ID);
                    if ($vendor->data->user_nicename != '') {
                        $header_btn_link = get_site_url() . '/members/' . $vendor->data->user_nicename . '/add_streams';
                    } else {
                        $header_btn_link = get_site_url() . '/members/' . $user->user_login . '/add_streams';
                    }
                } else {
                    $header_btn_link = get_site_url() . '/members/' . $user->user_login . '/add_streams';
                }
            } else {
                $header_btn_link = '';
                if (isset($header_btn_link) && $header_btn_link == '') {
                    $perm_id = get_option('youzify_membership_pages');
                    if (isset($perm_id['login']) && $perm_id['login'] != '') {
                        $header_btn_link = get_permalink($perm_id['login']);
                    } else {
                        $header_btn_link = wp_login_url();
                    }
                }
            }
            $terms_html .= '<li class="stream_add_btn"><a href="'. $header_btn_link. '">' . __('Add Stream', 'tm-helper-core') . '</a></li>';
            ?>
            <?php if (isset($terms_html) && $terms_html != '') { ?>
                <div class="fl-subnav">
                    <ul class="uk-subnav uk-subnav-pill">
                        <?php echo $terms_html; ?>
                    </ul>
                </div>
            <?php } ?>
            <?php if (isset($streams_html) && $streams_html != '') { ?>
                <ul class="js-filter uk-grid-small uk-child-width-1-1 uk-child-width-1-5@xl uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid>
                    <?php echo $streams_html; ?>
                </ul>
            <?php } ?>
        </div>
        <?php
    }
}
