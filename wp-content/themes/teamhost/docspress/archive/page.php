<?php
/**
 * Docs archive main page template
 *
 * This template can be overridden by copying it to yourtheme/docspress/archive/page.php.
 *
 * @author  nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$menu_style = teamhost_get_theme_mod('menu_style');

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <?php docspress()->get_template_part( 'archive/description' ); ?>

        <div class="docspress-archive">
            <ul class="docspress-archive-list">
                <?php
                // phpcs:ignore
                $current_term = false;

                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();

                        // phpcs:ignore
                        $terms = wp_get_post_terms( get_the_ID(), 'docs_category' );
                        if (
                            $terms &&
                            ! empty( $terms ) &&
                            isset( $terms[0]->name ) &&
                            $current_term !== $terms[0]->name
                        ) {
                            // phpcs:ignore
                            $current_term = $terms[0]->name;
                            ?>
                            <li class="docspress-archive-list-category">
                                <?php echo esc_html( $terms[0]->name ); ?>
                            </li>
                            <?php
                        }

                        ?>
                        <li class="docspress-archive-list-item">
                            <?php docspress()->get_template_part( 'archive/loop-title' ); ?>
                            <?php docspress()->get_template_part( 'archive/loop-articles' ); ?>
                        </li>
                        <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </div>

        <?php
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'teamhost' ),
                    'after'  => '</div>',
                )
            );
            ?>
    </div>
</article>
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
