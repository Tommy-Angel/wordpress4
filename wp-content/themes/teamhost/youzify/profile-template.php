<?php
/**
 * Template Name: Youzify Profile Template
 */

$menu_style = teamhost_get_theme_mod('menu_style');

?>

<div id="youzify">

    <?php do_action( 'youzify_profile_before_profile' ); ?>

    <div id="<?php echo apply_filters( 'youzify_profile_template_id', 'youzify-bp' ); ?>" class="youzify noLightbox youzify-page youzify-profile <?php echo youzify_get_profile_class(); ?>">

	<?php do_action( 'youzify_profile_before_content' ); ?>

	<div class="youzify-content">

		<?php do_action( 'youzify_profile_before_header' ); ?>

		<header id="youzify-profile-header" class="<?php echo youzify_headers()->get_class( 'user' ); ?>" <?php echo youzify_widgets()->get_loading_effect( youzify_option( 'youzify_hdr_load_effect', 'fadeIn' ) ); ?>><?php do_action( 'youzify_profile_header' ); ?></header>

				<?php do_action( 'youzify_profile_navbar' ); ?>

				<main class="youzify-page-main-content">

					<?php

					/**
					 * Fires before the display of member home content.
					 *
					 * @since 1.2.0
					 */
					do_action( 'bp_before_member_home_content' ); ?>

					<?php do_action( 'youzify_profile_main_content' ); ?>

					<?php

						/**
						 * Fires after the display of member home content.
						 *
						 * @since 1.2.0
						 */
						do_action( 'bp_after_member_home_content' );

					?>

				</main>

		<?php do_action( 'youzify_profile_sidebar' ); ?>

	</div>

	<?php do_action( 'youzify_profile_after_content' ); ?>

</div>

    <?php do_action( 'youzify_profile_after_profile' ); ?>
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