<?php
/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 */

/**
 * Fires before the display of the members loop.
 *
 * @since 1.2.0
 */
$author_id = get_post_field('post_author', get_the_ID());
$user = get_user_by('ID', $author_id);

// Check if $user is not false before accessing user_login
$permalink = $user ? get_site_url() . '/members/' . $user->user_login : '#';

do_action('bp_before_members_loop'); ?>

<?php if (bp_has_members(bp_ajax_querystring('members'))) : ?>

    <?php

    /**
     * Fires before the display of the members list.
     *
     * @since 1.1.0
     */
    do_action('bp_before_directory_members_list'); ?>


    <?php while (bp_members()) : bp_the_member(); ?>

        <div class="fl-gp-box">
            <div class="fl-cover-single">
                <div class="fl-gp-info">
                    <div class="fl-gp-avatar">
                        <a href="<?php bp_member_permalink(); ?>" class="item-avatar">
                            <?php bp_member_avatar('type=full&width=750&height=750'); ?>
                        </a>
                    </div>
                    <div class="fl-gp-title">
                        <a href="<?php bp_member_permalink(); ?>" class="bp-gp-home-link season-of-the-witch-home-link"><?php bp_member_name(); ?></a>
                    </div>
                    <div class="fl-gp-meta">
                        <div class="group-status"><?php echo youzify_get_md_user_meta(bp_get_member_user_id()); ?></div>
                    </div>
                </div>

                <?php if (class_exists('GamiPress')) { ?>
                    <div class="fl-badges">
                        <?php
                        $user_rank = gamipress_get_user_rank(bp_get_member_user_id());
                        $rank_types = gamipress_get_rank_types_slugs();
                        foreach ($rank_types as $rank_type) {
                            $current_rank_id = gamipress_get_user_rank_id(bp_get_member_user_id(), $rank_type);
                            $rank = gamipress_get_post($current_rank_id);
                            $img = get_the_post_thumbnail_url($rank->ID, 'thumbnail');

                            $img = !empty($img) ? '<img src="' . get_the_post_thumbnail_url($rank->ID, 'thumbnail') . '" class="rank-logo" alt="' . esc_attr__("Newbie", "teamhost") . '" width="250" height="250">' : '';
                            if ($rank->ID != 0) {
                                echo '<div class="youzify-user-level-data">' . $img . '<span class="youzify-user-level-title">' . $rank->post_title . '</span></div>';
                            }
                        }
                        ?>
                    </div>
                    <?php

                    $badges = youzify_gamipress_get_user_badges(bp_get_member_user_id());
                    if (isset($badges) && $badges != '') {
                        echo teamhost_wp_kses($badges);
                    }

                    ?>
                <?php } ?>

            </div>


            <div class="fl-gp-footer">
                <?php if (is_user_logged_in()) { ?>
                    <?php if (bp_get_member_user_id() != get_current_user_ID()) { ?>
                        <div class="fl-gp-cells">
                            <div class="fl-gp-cell-left">
                                <?php bp_add_friend_button(bp_get_member_user_id()); ?>
                            </div>
                            <div class="fl-gp-cell-right">
                                <?php
                                $title = '<span class="teamhost_message_button_mod">' . __('Message', 'teamhost') . '</span>';
                                youzify_send_private_message_button(bp_get_member_user_id(), $title); ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="fl-gp-action">
                    <a class="fl-view-profile" rel="profile" href="<?php bp_member_permalink(); ?>"><?php echo __("View profile", "teamhost") ?></a>
                </div>
            </div>

        </div>

    <?php endwhile; ?>

    <?php

    /**
     * Fires after the display of the members list.
     *
     * @since 1.1.0
     */
    do_action('bp_after_directory_members_list'); ?>

    <?php bp_member_hidden_fields(); ?>

    <div id="pag-bottom" class="pagination">

        <div class="pag-count" id="member-dir-count-bottom">
            <?php bp_members_pagination_count(); ?>
        </div>

        <?php if (bp_get_members_pagination_links()) : ?>
            <div class="pagination-links" id="member-dir-pag-bottom">
                <?php bp_members_pagination_links(); ?>
            </div>
        <?php endif; ?>

    </div>

<?php else : ?>

    <div id="message" class="info">
        <p><?php _e("Sorry, no members were found.", 'teamhost'); ?></p>
    </div>

<?php endif; ?>

<?php

/**
 * Fires after the display of the members loop.
 *
 * @since 1.2.0
 */
do_action('bp_after_members_loop');
