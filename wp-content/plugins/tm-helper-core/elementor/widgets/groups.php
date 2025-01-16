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
class TM_Groups extends Widget_Base {

    public function get_name() {
        return 'tm-groups';
    }

    public function get_title() {
        return esc_html__( 'Groups Slider', 'tm-helper-core' );
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
            'posts_per_page',
            [
                'label' => esc_html__( 'Posts per Page', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your posts per page', 'tm-helper-core' ),
                'default' => 3,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'groups', 'role', 'groups' );
        $settings = $this->get_settings_for_display();
        $j = 1;

         global $wpdb;
        $table_name = $wpdb->base_prefix.'bp_groups';
        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );


        ?>
        <?php if(function_exists('bp_has_groups') && $wpdb->get_var( $query ) == $table_name && bp_is_active( 'groups' )) { ?>
            <?php if (bp_has_groups()){?>
                <div class="js-popular">
                <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if (bp_has_groups()) : while (bp_groups()) :
                    bp_the_group(); ?>
                    <?php if ($j <= intval($settings["posts_per_page"])) { ?>
                    <div class="swiper-slide <?php echo esc_attr('teamhost_group_' . bp_get_group_id()); ?>">
                        <div class="fl-gp-box">
                            <?php
                            $group_cover_image_url = bp_attachments_get_attachment('url', array(
                                'object_dir' => 'groups',
                                'item_id' => bp_get_group_id(),
                            ));
                            $style = 'background-image: url(' . esc_url($group_cover_image_url) . ')';

                            $default = get_option('youzify_default_groups_cover');
                            $default_style = 'background-image: url(' . esc_url($default) . ')';

                            ?>
                            <a href="<?php bp_group_permalink() ?>" class="teamhost_group_link"></a>

                            <?php if (isset($group_cover_image_url) && $group_cover_image_url != ''){ ?>
                            <div class="fl-cover-image" style="<?php echo esc_attr($style) ?>">
                                <?php } else { ?>
                                <?php if (isset($default) && $default != ''){ ?>
                                <div class="fl-cover-image" style="<?php echo esc_attr($default_style) ?>">
                                    <?php } else { ?>
                                    <div class="fl-cover-image">
                                        <?php } ?>
                                        <?php } ?>

                                        <div class="fl-gp-info-wrap">
                                            <div class="fl-gp-info">
                                                <div class="fl-gp-title">
                                                    <a href="<?php bp_group_permalink() ?>"
                                                       class="bp-gp-home-link season-of-the-witch-home-link"><?php bp_group_name() ?></a>
                                                </div>
                                                <div class="fl-gp-meta">
                                                    <div class="group-status"><i
                                                                class="icon-globe"></i><span><?php bp_group_type() ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fl-gp-avatar">
                                                <a href="<?php bp_group_permalink() ?>" class="item-avatar">
                                                    <?php bp_group_avatar('type=full&width=400&height=400'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fl-gp-footer">
                                        <div class="fl-gp-cells">
                                            <div class="fl-gp-cell-left">
                                                <?php if (function_exists('youzify_get_group_total_posts_count')) { ?>
                                                    <strong><?php echo youzify_get_group_total_posts_count(bp_get_group_id()); ?></strong>
                                                <?php } ?>
                                                <span><?php echo __('Posts', 'tm-helper-core') ?></span>
                                            </div>
                                            <div class="fl-gp-cell-right">
                                                <strong> <?php echo esc_html(tm_bp_get_group_member_count_number(bp_get_group_id())); ?> </strong>
                                                <span>
                                                <?php
                                                $count_string = sprintf(
                                                    _n('member', 'members',
                                                        tm_bp_get_group_member_count_number(bp_get_group_id()),
                                                        'buddypress'),
                                                    bp_core_number_format(tm_bp_get_group_member_count_number(bp_get_group_id()))
                                                );
                                                echo esc_html($count_string);
                                                ?>
                                            </span>
                                            </div>
                                        </div>

                                        <div class="fl-gp-action">
                                                <span class="fl-gp-active">
                                                    <i class="gg-icon ico_report"></i>
                                                    <?php printf(__('Latest active %s', 'tm-helper-core'),
                                                        bp_get_group_last_active()) ?>
                                                </span>
                                            <div class="fl-gp-button">
                                                <?php $com_group_btn = teamhost_get_theme_mod('com_group_btn');
                                                $com_group_btn_text = teamhost_get_theme_mod('com_group_btn_text');
                                                ?>
                                                <?php if (isset($com_group_btn) && $com_group_btn == 'enable') { ?>
                                                    <a class="fl-gp-button fl-join-group" rel="join"
                                                       href="<?php bp_group_permalink() ?>">
                                                        <?php echo esc_html($com_group_btn_text) ?>
                                                    </a>
                                                <?php } else { ?>
                                                    <?php if (is_user_logged_in()) { ?>
                                                        <?php
                                                        $group_admin_ids = BP_Groups_Member::get_group_administrator_ids(bp_get_group_id());
                                                        $author_ID = get_current_user_id();
                                                        $user = get_user_by('ID', $author_ID);
                                                        foreach ($group_admin_ids as $id) { ?>
                                                            <?php if (get_current_user_id() == $id->user_id) { ?>
                                                                <?php $manage_url = bp_get_group_permalink() . $user->user_login; ?>
                                                                <a class="fl-gp-button fl-join-group tm_manage_btn"
                                                                   rel="join" href="<?php echo esc_url($manage_url) ?>">
                                                                    <i class="gg-icon gg-log-in"></i>
                                                                    <?php echo __('Manage Group', 'teamhost'); ?>
                                                                </a>
                                                            <?php } else { ?>
                                                                <?php if (count($group_admin_ids) <= 1) { ?>
                                                                    <?php bp_group_join_button(); ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php
                                                        $perm_id = get_option('youzify_membership_pages');
                                                        if (isset($perm_id['login']) && $perm_id['login'] != '') {
                                                            $permalink_login = get_permalink($perm_id['login']);
                                                        } else {
                                                            $permalink_login = wp_login_url();
                                                        }
                                                        ?>
                                                        <a class="fl-gp-button fl-join-group" rel="join"
                                                           href="<?php echo esc_url($permalink_login); ?>">
                                                            <i class="gg-icon gg-log-in"></i>
                                                            <?php echo __('Join Group', 'teamhost'); ?>
                                                        </a>
                                                    <?php } ?>

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php $j++;
                            endwhile;
                            else:
                            ?>
                                <div class="bpress_notice">
                                    <span><?php echo __('No groups', 'tm-helper-core');?></span>
                                </div>
                            <?php
                            endif;
                            wp_reset_query(); ?>
                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <?php
            } else { ?>
              <div id="groups-dir-list" class="uk-grid uk-grid-small uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s groups dir-list" aria-live="assertive" aria-atomic="true" aria-relevant="all">
                    <div id="message" class="info">
                        <p><?php echo __('There were no groups found.', 'tm-helper-core');?></p>
                        <a href="<?php echo home_url() . '/groups/create/'; ?>"><?php echo __('Create a Group', 'tm-helper-core');?></a>
                    </div>
                </div>
        <?php
            }
        } else {
              ?>
              <?php if(is_user_logged_in() && current_user_can('administrator')){ ?>
                    <div id="groups-dir-list" class="uk-grid uk-grid-small uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s groups dir-list" aria-live="assertive" aria-atomic="true" aria-relevant="all">
                        <div id="message" class="info">
                            <p><?php echo __('Please activate User Groups  and Private Messaging in Settings - BuddyPress', 'tm-helper-core');?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php
        }
    }
}