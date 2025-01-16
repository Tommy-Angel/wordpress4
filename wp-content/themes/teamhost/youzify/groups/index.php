<?php
/**
 * BuddyPress - Groups
 */

/**
 * Fires at the top of the groups directory template file.
 *
 * @since 1.5.0
 */
do_action( 'bp_before_directory_groups_page' );

$menu_style = teamhost_get_theme_mod('menu_style');

?>

<?php $icons_style = youzify_option( 'youzify_tabs_list_icons_style', 'youzify-tabs-list-gradient' ); ?>

<div id="youzify">

    <div id="<?php echo apply_filters( 'youzify_group_template_id', 'youzify-bp' ); ?>" class="youzify <?php echo youzify_groups_directory_class(); ?>">
        <?php do_action( 'youzify_before_directory_groups_main_content' ); ?>
        <?php do_action( 'bp_before_directory_groups' ); ?>
        <?php do_action( 'bp_before_directory_groups_content' ); ?>

        <?php if ( apply_filters( 'youzify_display_groups_directory_filter', true )  ) : ?>
            <div class="youzify-mobile-nav">
                <div id="directory-show-menu" class="youzify-mobile-nav-item"><div class="youzify-mobile-nav-container"><i class="fas fa-bars"></i><a><?php _e( 'Menu', 'teamhost' ); ?></a></div></div>
                <div id="directory-show-search" class="youzify-mobile-nav-item"><div class="youzify-mobile-nav-container"><i class="fas fa-search"></i><a><?php _e( 'Search', 'teamhost' ); ?></a></div></div>
                <div id="directory-show-filter" class="youzify-mobile-nav-item"><div class="youzify-mobile-nav-container"><i class="fas fa-sliders-h"></i><a><?php _e( 'Filter', 'teamhost' ); ?></a></div></div>
            </div>

            <div class="youzify-directory-filter">

                <div class="item-list-tabs" aria-label="<?php esc_attr_e( 'Groups directory main navigation', 'teamhost' ); ?>">
                    <ul>
                        <li class="selected" id="groups-all"><a href="<?php bp_groups_directory_permalink(); ?>"><?php printf( __( 'All Groups %s', 'teamhost' ), '<span>' . bp_get_total_group_count() . '</span>' ); ?></a></li>

                        <?php if ( is_user_logged_in() && bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>
                            <li id="groups-personal"><a href="<?php echo bp_loggedin_user_domain() . bp_get_groups_slug() . '/my-groups/'; ?>"><?php printf( __( 'My Groups %s', 'teamhost' ), '<span>' . bp_get_total_group_count_for_user( bp_loggedin_user_id() ) . '</span>' ); ?></a></li>
                        <?php endif; ?>

                        <?php

                        /**
                         * Fires inside the groups directory group filter input.
                         *
                         * @since 1.5.0
                         */
                        do_action( 'bp_groups_directory_group_filter' ); ?>

                    </ul>
                </div><!-- .item-list-tabs -->
                <div id="directory-show-search"><a><?php _e( 'Search', 'teamhost' ); ?></a></div>
                <div id="directory-show-filter"><a><?php _e( 'Filter', 'teamhost' ); ?></a></div>

                <div class="item-list-tabs" id="subnav" aria-label="<?php esc_attr_e( 'Groups directory secondary navigation', 'teamhost' ); ?>" role="navigation">
                    <ul>
                        <?php

                        /**
                         * Fires inside the groups directory group types.
                         *
                         * @since 1.2.0
                         */
                        do_action( 'bp_groups_directory_group_types' ); ?>

                        <li id="groups-order-select" class="last filter">

                            <label for="groups-order-by"><?php _e( 'Order By:', 'teamhost' ); ?></label>

                            <select id="groups-order-by">
                                <option value="active"><?php _e( 'Last Active', 'teamhost' ); ?></option>
                                <option value="popular"><?php _e( 'Most Members', 'teamhost' ); ?></option>
                                <option value="newest"><?php _e( 'Newly Created', 'teamhost' ); ?></option>
                                <option value="alphabetical"><?php _e( 'Alphabetical', 'teamhost' ); ?></option>

                                <?php

                                /**
                                 * Fires inside the groups directory group order options.
                                 *
                                 * @since 1.2.0
                                 */
                                do_action( 'bp_groups_directory_order_options' ); ?>
                            </select>
                        </li>
                        <li id="youzify-directory-search-box">
                            <?php /* Backward compatibility for inline search form. Use template part instead. */ ?>
                            <?php if ( has_filter( 'bp_directory_groups_search_form' ) ) : ?>

                                <div id="group-dir-search" class="dir-search" role="search">
                                    <?php bp_directory_groups_search_form(); ?>
                                </div><!-- #group-dir-search -->

                            <?php else: ?>

                                <?php bp_get_template_part( 'common/search/dir-search-form' ); ?>

                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>

        <?php endif; ?>

        <div id="groups-dir-list" class="uk-grid uk-grid-small uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s groups dir-list"  aria-live="assertive" aria-atomic="true" aria-relevant="all">
            <?php bp_get_template_part( 'groups/groups-loop' ); ?>
        </div>

    </div>
    <?php
    // Navigation
    $menu_style = teamhost_get_theme_mod('menu_style');
    if(is_page()){
        if(teamhost_get_theme_mod('page_navigator', true) == 'custom'){
            $menu_style = teamhost_get_theme_mod('menu_style', 'true');
        }
    }
    if(is_single()){
        if(teamhost_get_theme_mod('post_navigator', true) == 'custom'){
            $menu_style = teamhost_get_theme_mod('post_menu_style', 'true');
        }
    }
    $footer_enable = teamhost_get_theme_mod('footer_enable');

    //Page
    if(is_page()){
        if(teamhost_get_theme_mod('page_footer_custom_style',true ) == 'custom' ) {
            $footer_enable = teamhost_get_theme_mod('page_footer_enable', true);
        }
    }

    //Post
    if(is_single()){
        if(teamhost_get_theme_mod('post_footer_custom_style',true ) == 'custom' ) {
            $footer_enable = teamhost_get_theme_mod('post_footer_enable', true);
        }
    }

    if(isset($footer_enable) && $footer_enable == 'enable' && $menu_style == 'style_two'){
        get_template_part('template-parts/footer/footer-style', 'footer-four-column');
    } ?>

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
 * Fires at the bottom of the groups directory template file.
 *
 * @since 1.5.0
 */
do_action( 'bp_after_directory_groups_page' );
