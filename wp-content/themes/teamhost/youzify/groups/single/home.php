<?php
$menu_style = teamhost_get_theme_mod('menu_style');


if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

<?php do_action( 'youzify_group_before_group' ); ?>
<div id="youzify">

    <div id="<?php echo apply_filters( 'youzify_group_template_id', 'youzify-bp' ); ?>" class="youzify <?php echo youzify_group_page_class(); ?>">

	<?php do_action( 'youzify_group_before_content' ); ?>

	<div class="youzify-content">

		<header id="youzify-group-header" class="<?php echo youzify_headers()->get_class( 'group' ); ?>">

			<?php do_action( 'youzify_group_header' ); ?>

		</header>

		<div class="youzify-group-content">

			<div class="youzify-inner-content">

				<?php do_action( 'youzify_group_navbar' ); ?>

				<main class="youzify-page-main-content">

					<?php do_action( 'youzify_group_main_content' ); ?>

				</main>

			</div>

		</div>

	</div>

	<?php do_action( 'youzify_group_after_content' ); ?>

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
<?php do_action( 'youzify_group_after_group' ); ?>

<?php endwhile; endif; ?>