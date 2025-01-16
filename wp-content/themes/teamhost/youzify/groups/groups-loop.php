<?php
/**
 * BuddyPress - Groups Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter().
 */

?>

<?php

/**
 * Fires before the display of groups from the groups loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_groups_loop' ); ?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<?php

	/**
	 * Fires before the listing of the groups list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_directory_groups_list' ); ?>

    <?php while ( bp_groups() ) : bp_the_group(); ?>

        <div class="<?php echo esc_attr('teamhost_group_' . bp_get_group_id()); ?>">

            <?php
            $group_cover_image_url = bp_attachments_get_attachment('url', array(
                'object_dir' => 'groups',
                'item_id' => bp_get_group_id(),
            ));
            $style = 'background-image: url(' . esc_url($group_cover_image_url) .')';

            $default = get_option('youzify_default_groups_cover');
            $default_style = 'background-image: url(' . esc_url($default) .')';
            ?>
            <a href="<?php bp_group_permalink() ?>" class="teamhost_group_link"></a>

            <?php if(isset($group_cover_image_url) && $group_cover_image_url != ''){?>
                <div class="fl-cover-image" style="<?php echo esc_attr($style)?>">
            <?php } else { ?>
                 <?php if(isset($default) && $default != ''){?>
                    <div class="fl-cover-image" style="<?php echo esc_attr($default_style)?>">
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
                        <span><?php echo __('Posts', 'teamhost') ?></span>
                    </div>
                    <div class="fl-gp-cell-right">
                        <strong> <?php echo esc_html(tm_bp_get_group_member_count_number(bp_get_group_id())); ?> </strong>
                        <span>
                            <?php
                            $count_string = sprintf(
                                _n('member', 'members',
                                    tm_bp_get_group_member_count_number(bp_get_group_id()),
                                    'teamhost'),
                                bp_core_number_format(tm_bp_get_group_member_count_number(bp_get_group_id()))
                            );
                            echo esc_html($count_string);
                            ?>
                        </span>
                    </div>
                </div>
                <div class="fl-gp-action">
                    <?php if(teamhost_get_group_last_active(bp_get_group_id())){ ?>
                        <span class="fl-gp-active">
                            <i class="gg-icon ico_report"></i>
                            <?php printf(__('Latest active %s', 'teamhost'), teamhost_get_group_last_active(bp_get_group_id())); ?>
                        </span>
                    <?php } ?>

                    <div class="fl-gp-button">
                        <div class="fl-gp-button">
                            <?php $com_group_btn = teamhost_get_theme_mod('com_group_btn');
                            $com_group_btn_text = teamhost_get_theme_mod('com_group_btn_text');
                            ?>
                            <?php if(isset($com_group_btn) && $com_group_btn == 'enable'){ ?>
                                <a class="fl-gp-button fl-join-group" rel="join" href="<?php bp_group_permalink() ?>">
                                    <?php echo esc_html($com_group_btn_text)?>
                                </a>
                            <?php } else { ?>
                                <?php if(is_user_logged_in()){ ?>
                                    <?php
                                    $group_admin_ids = BP_Groups_Member::get_group_administrator_ids( bp_get_group_id() );
                                    $author_ID =  get_current_user_id();
                                    $user = get_user_by('ID', $author_ID);
                                    foreach ($group_admin_ids as $id){ ?>
                                        <?php if(get_current_user_id() == $id->user_id){ ?>
                                            <?php $manage_url = bp_get_group_permalink() . $user->user_login; ?>
                                            <a class="fl-gp-button fl-join-group tm_manage_btn" rel="join" href="<?php echo esc_url($manage_url) ?>">
                                                <i class="gg-icon gg-log-in"></i>
                                                <?php echo __('Manage Group', 'teamhost');?>
                                            </a>
                                        <?php } else { ?>
                                            <?php if (count($group_admin_ids) <= 1){ ?>
                                                <?php bp_group_join_button(); ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php
                                    $perm_id = get_option('youzify_membership_pages');
                                    if(isset($perm_id['login']) && $perm_id['login'] != ''){
                                        $permalink_login = get_permalink($perm_id['login']);
                                    } else {
                                        $permalink_login = wp_login_url();
                                    }
                                    ?>
                                    <a class="fl-gp-button fl-join-group" rel="join" href="<?php echo esc_url($permalink_login);?>">
                                        <i class="gg-icon gg-log-in"></i>
                                        <?php echo __('Join Group', 'teamhost');?>
                                    </a>
                                <?php } ?>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>


	<?php

	/**
	 * Fires after the listing of the groups list.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">
			<?php bp_groups_pagination_count(); ?>
		</div>

		<?php if ( bp_get_groups_pagination_links() ) : ?>
		<div class="pagination-links" id="group-dir-pag-bottom">
			<?php bp_groups_pagination_links(); ?>
		</div>
		<?php endif; ?>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'teamhost' ); ?></p>
	</div>

<?php endif; ?>

<?php

/**
 * Fires after the display of groups from the groups loop.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_groups_loop' );
