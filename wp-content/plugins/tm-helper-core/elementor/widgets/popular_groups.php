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
class TM_Popular_Groups extends Widget_Base {

    public function get_name() {
        return 'tm-popular-groups';
    }

    public function get_title() {
        return esc_html__( 'Popular Groups Slider', 'tm-helper-core' );
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

        $this->add_render_attribute( 'popular-groups', 'role', 'popular-groups' );
        $settings = $this->get_settings_for_display();
        $args = array(
            'type'               => "popular",
            'per_page'           => $settings['posts_per_page'],             // The number of results to return per page.

        );

        global $wpdb;
        $table_name = $wpdb->base_prefix.'bp_groups';
        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

        if ( $wpdb->get_var( $query ) == $table_name && bp_is_active( 'groups' )) {

            if (function_exists('groups_get_groups')){
                $groups = groups_get_groups($args);
            }

            ?>


            <?php if(isset($groups['groups']) && !empty($groups['groups'])){ ?>
                <div class="js-popular2">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($groups['groups'] as $group){ ?>
                                <div class="swiper-slide">
                                    <div class="rectangle_popular">
                                        <div class="rectangle_popular-top">
                                            <div class="rp-info">
                                                <div class="rp-title">
                                                    <a href="<?php bp_group_permalink($group);?>" class="bp-gp-home-link season-of-the-witch-home-link"><?php bp_group_name($group);?></a>
                                                    <div class="rp-status"><?php bp_group_type($group) ?></div>
                                                </div>
                                                <?php if(tm_get_group_rating_average($group->id) != false){?>
                                                    <div class="rectangle__rating">
                                                        <?php echo tm_get_group_reviews_stars($group->id); ?>
                                                        <a href="<?php echo esc_url(bp_group_permalink($group)) . 'reviews';?>">
                                                            <?php echo tm_get_group_reviews_count($group->id) . ' ' . __('Reviews', 'tm-helper-core'); ?>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="rectangle_popular-bot">
                                            <div class="rectangle_popular-ac">
                                                <a class="uk-button  uk-button-theme-color uk-width-1-1 uk-margin-small-bottom " href="<?php bp_group_permalink($group);?>"><?php echo __("Read More", "tm-helper-core")?></a>
                                            </div>
                                            <div class="game-card__users">
                                                <ul class="users-list">
                                                    <?php
                                                    $args = array(
                                                        'group_id'   		=> $group->id,
                                                        'exclude_admins_mods'   => false
                                                    );
                                                    $members = groups_get_group_members( $args );
                                                    $ms = 1;
                                                    foreach ($members['members'] as $m){
                                                        if($ms <= 5){?>
                                                            <li><img src="<?php echo esc_url(get_avatar_url($m->ID));?>" alt="user"></li>
                                                            <?php
                                                        }
                                                        $ms++;
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php } else { ?>
                <div id="groups-dir-list" class="uk-grid uk-grid-small uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s groups dir-list" aria-live="assertive" aria-atomic="true" aria-relevant="all">
                    <div id="message" class="info">
                        <p><?php echo __('There were no groups found.', 'tm-helper-core');?></p>
                        <a href="<?php echo home_url() . '/groups/create/'; ?>"><?php echo __('Create a Group', 'tm-helper-core');?></a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <?php if(is_user_logged_in() && current_user_can('administrator')){ ?>
                <div id="groups-dir-list" class="uk-grid uk-grid-small uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s groups dir-list" aria-live="assertive" aria-atomic="true" aria-relevant="all">
                    <div id="message" class="info">
                        <p><?php echo __('Please activate User Groups  and Private Messaging in Settings - BuddyPress', 'tm-helper-core');?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <?php

    }
}