<?php
/**
 * BuddyPress - Members
 *
 */
/**
 * Fires at the top of the members directory template file.
 *
 * @since 1.5.0
 */
do_action( 'bp_before_directory_members_page' );

$menu_style = teamhost_get_theme_mod('menu_style');
?>
<div id="youzify">

    <div id="<?php echo apply_filters( 'youzify_members_template_id', 'youzify-bp' ); ?>" class="youzify <?php echo youzify_members_directory_class() ?>">

        <?php do_action( 'youzify_before_directory_members_main_content' ); ?>
        <?php do_action( 'bp_before_directory_members' ); ?>
        <?php do_action( 'bp_before_directory_members_content' ); ?>
        <?php do_action( 'bp_before_directory_members_tabs' ); ?>

        <?php if ( youzify_display_md_filter_bar() ) : ?>

            <div class="youzify-mobile-nav">
                <div id="directory-show-menu" class="youzify-mobile-nav-item"><div class="youzify-mobile-nav-container"><i class="fas fa-bars"></i><a><?php _e( 'Menu', 'teamhost' ); ?></a></div></div>
                <div id="directory-show-search" class="youzify-mobile-nav-item"><div class="youzify-mobile-nav-container"><i class="fas fa-search"></i><a><?php _e( 'Search', 'teamhost' ); ?></a></div></div>
                <div id="directory-show-filter" class="youzify-mobile-nav-item"><div class="youzify-mobile-nav-container"><i class="fas fa-sliders-h"></i><a><?php _e( 'Filter', 'teamhost' ); ?></a></div></div>
            </div>

            <div class="youzify-directory-filter">
                <div class="item-list-tabs" aria-label="<?php esc_attr_e( 'Members directory main navigation', 'teamhost' ); ?>" role="navigation">
                    <ul>
                        <li class="selected" id="members-all"><a href="<?php bp_members_directory_permalink(); ?>"><?php printf( __( 'All Members %s', 'teamhost' ), '<span>' . bp_get_total_member_count() . '</span>' ); ?></a></li>

                        <?php if ( is_user_logged_in() && bp_is_active( 'friends' ) && bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>
                            <li id="members-personal"><a href="<?php echo esc_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/my-friends/' ); ?>"><?php printf( __( 'My Friends %s', 'teamhost' ), '<span>' . bp_get_total_friend_count( bp_loggedin_user_id() ) . '</span>' ); ?></a></li>
                        <?php endif; ?>

                        <?php

                        /**
                         * Fires inside the members directory member types.
                         *
                         * @since 1.2.0
                         */
                        do_action( 'bp_members_directory_member_types' ); ?>

                    </ul>
                </div><!-- .item-list-tabs -->

                <div class="item-list-tabs" id="subnav" aria-label="<?php esc_attr_e( 'Members directory secondary navigation', 'teamhost' ); ?>" role="navigation">
                    <ul>
                        <?php

                        /**
                         * Fires inside the members directory member sub-types.
                         *
                         * @since 1.5.0
                         */
                        do_action( 'bp_members_directory_member_sub_types' ); ?>

                        <li id="members-order-select" class="last filter">
                            <label for="members-order-by"><?php _e( 'Order By:', 'teamhost' ); ?></label>
                            <select id="members-order-by">
                                <option value="active"><?php _e( 'Last Active', 'teamhost' ); ?></option>
                                <option value="newest"><?php _e( 'Newest Registered', 'teamhost' ); ?></option>

                                <?php if ( bp_is_active( 'xprofile' ) ) : ?>
                                    <option value="alphabetical"><?php _e( 'Alphabetical', 'teamhost' ); ?></option>
                                <?php endif; ?>

                                <?php

                                /**
                                 * Fires inside the members directory member order options.
                                 *
                                 * @since 1.2.0
                                 */
                                do_action( 'bp_members_directory_order_options' ); ?>
                            </select>
                        </li>
                        <?php if ( apply_filters( 'youzify_display_members_directory_search_bar', true ) ) : ?>
                            <li id="youzify-directory-search-box">
                                <div id="members-dir-search" class="dir-search" role="search">
                                    <?php bp_directory_members_search_form(); ?>
                                </div><!-- #members-dir-search -->
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div id="members-dir-list" class="uk-grid uk-grid-small uk-child-width-1-5@l uk-child-width-1-3@m uk-child-width-1-2@s members dir-list">

            <?php bp_get_template_part( 'members/members-loop' ); ?>

        </div>

    </div>
    <?php if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_two'){?>
        <div class="fl-copy"> <?php
            $footer_copy_allowed_html = array(
                'a' => array(
                    'href'  => true,
                    'title' => true,
                ),
                'b'     => array(),
                'span' => array(),
            );
            echo wp_kses(teamhost_get_theme_mod('footer_copyrights'), $footer_copy_allowed_html);?>
        </div>
    <?php } ?>
</div>
<?php if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_two'){?>
    <div class="fl-copy-second"> <?php
        $footer_copy_allowed_html = array(
            'a' => array(
                'href'  => true,
                'title' => true,
            ),
            'b'     => array(),
            'span' => array(),
        );
        echo wp_kses(teamhost_get_theme_mod('footer_copyrights'), $footer_copy_allowed_html);?>
    </div>
<?php } ?>
<?php

/**
 * Fires at the bottom of the members directory template file.
 *
 * @since 1.5.0
 */
do_action( 'bp_after_directory_members_page' );