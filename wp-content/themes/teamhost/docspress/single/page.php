<?php
/**
 * Single docs page template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/page.php.
 *
 * @author  nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$menu_style = teamhost_get_theme_mod('menu_style');

while ( have_posts() ) :
    the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'docspress-single' . ( docspress()->get_option( 'ajax', 'docspress_single', true ) ? ' docspress-single-ajax' : '' ) ); ?>>

        <?php docspress()->get_template_part( 'single/sidebar' ); ?>

        <div class="docspress-single-content">
            <?php
            docspress()->get_template_part( 'single/content-breadcrumbs' );

            docspress()->get_template_part( 'single/content-title' );
            ?>

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'teamhost' ),
                        'after'  => '</div>',
                    )
                );

                docspress()->get_template_part( 'single/content-articles' );
                ?>
            </div><!-- .entry-content -->

            <?php

            docspress()->get_template_part( 'single/footer' );

            docspress()->get_template_part( 'single/adjacent-links' );

            docspress()->get_template_part( 'single/feedback' );

            docspress()->get_template_part( 'single/feedback-suggestion' );

            if ( docspress()->get_option( 'show_comments', 'docspress_single', true ) ) {
                docspress()->get_template_part( 'single/comments' );
            }

            ?>
        </div><!-- .docspress-single-content -->
    </article><!-- #post-## -->
    <?php

endwhile;


// Navigation
$menu_style = teamhost_get_theme_mod('menu_style');
if (is_page()) {
    if (teamhost_get_theme_mod('page_navigator', true) == 'custom') {
        $menu_style = teamhost_get_theme_mod('menu_style', 'true');
    }
}
if (is_single()) {
    if (teamhost_get_theme_mod('post_navigator', true) == 'custom') {
        $menu_style = teamhost_get_theme_mod('post_menu_style', 'true');
    }
}
$footer_enable = teamhost_get_theme_mod('footer_enable');

//Page
if (is_page()) {
    if (teamhost_get_theme_mod('page_footer_custom_style', true) == 'custom') {
        $footer_enable = teamhost_get_theme_mod('page_footer_enable', true);
    }
}

//Post
if (is_single()) {
    if (teamhost_get_theme_mod('post_footer_custom_style', true) == 'custom') {
        $footer_enable = teamhost_get_theme_mod('post_footer_enable', true);
    }
}

if (isset($footer_enable) && $footer_enable == 'enable' && $menu_style == 'style_two') {
    get_template_part('template-parts/footer/footer-style', 'footer-four-column');
}


if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_two'){ ?>
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