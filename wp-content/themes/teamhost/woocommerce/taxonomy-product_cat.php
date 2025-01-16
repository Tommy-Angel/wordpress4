<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

$shop_style = teamhost_get_theme_mod('shop_style');
$menu_style = teamhost_get_theme_mod('menu_style');

$filter_style_option = teamhost_get_theme_mod('filter_style');

// Get Style Shop and Filter
if (isset($_GET["filter_style"]) && $_GET["filter_style"] == "style_two") {
    $filter_style_option = 'style_two';
}

if (isset($_GET["shop_style"]) && $_GET["shop_style"] == "style_one") {
    $shop_style= 'style_one';
}
if (isset($_GET["shop_style"]) && $_GET["shop_style"] == "style_two") {
    $shop_style= 'style_two';
}
if (isset($_GET["shop_style"]) && $_GET["shop_style"] == "style_three") {
    $shop_style= 'style_three';
}

//Container
$container_class = 'container';

//Container custom
if($shop_style== 'style_three'){
    $container_class = 'container-fluid';
}



//Sidebar position
$fl_sidebar ='no';
$fl_sidebar_position = '';
if ( is_active_sidebar( 'woocommerce-sidebar' ) and $shop_style != 'style_two' ) {
    $fl_sidebar_position = 'position_sidebar_left col-md-9 woo-sidebar-position';
} else {
    $fl_sidebar_position = 'col-md-12';
}

// Filter Style
$filter_style = $filter_style_option == 'style_two' ? 'fl-filter-style-two cf' : 'fl-filter-style-one cf';


$title = teamhost_get_theme_mod('woo_header_title');
$pre_title = teamhost_get_theme_mod('woo_header_pre_title');

$bg_img = teamhost_get_theme_mod('woo_background_img');
// Header background image css
if (isset($bg_img) && $bg_img != '') {
    $header_bg = 'data-src=' . $bg_img;
} else {
    $header_bg = '';
}
?>

<div class="uk-grid fl_main fl_main_post fl_main_product uk-grid-stack">
    <div class="widjet --filters">
        <div class="uk-page-heading uk-height-medium uk-height-max-medium uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-background-cover uk-light" <?php echo esc_attr($header_bg);?> uk-img uk-parallax="bgy: -70">
            <div class="fl-hd-cover">
                <span class="decore-lt"></span>
                <span class="decore-lb"></span>
                <span class="decore-rt"></span>
                <span class="decore-rb"></span>
            </div>
            <h2 class="uk-page-heading-h"><?php echo esc_html($title)?></h2>
            <?php if(isset($pre_title) && $pre_title != ''){?>
                <p class="uk-heading-text"><?php echo esc_html($pre_title)?></p>
            <?php } ?>
        </div>


        <div class="widjet__body">
            <div class="uk-grid uk-child-width-1-5@xl uk-child-width-1-3@l uk-child-width-1-2@s uk-grid-small" data-uk-grid>
                <?php if( is_active_sidebar( 'woo-sidebar-search' )) { ?>
                    <div class="uk-width-1-1">
                        <?php dynamic_sidebar( 'woo-sidebar-search' ); ?>
                    </div>
                <?php } ?>
                <?php
                $order_class = '';
                if ( !have_posts() && ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ){ ?>
                    <?php $order_class = 'no_products';?>
                <?php } ?>

                <div class="tm_order_product <?php echo esc_attr($order_class)?>">
                    <?php do_action( 'woocommerce_before_shop_loop' );?>
                </div>

                <?php if( is_active_sidebar( 'woo-sidebar' )) { ?>
                    <?php dynamic_sidebar( 'woo-sidebar' ); ?>
                <?php } ?>

                <div class="uk-text-right tm_products_count">
                    <a href="#!">
                        <?php
                        $totalproducts = wc_get_loop_prop( 'total' );
                        $per_page = teamhost_get_theme_mod('products_per_page');
                        if ( $totalproducts <= $per_page || -1 === $per_page ) {
                            printf( _n( '1 item', '%d items', $totalproducts, 'teamhost' ), $totalproducts );
                        }
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php if ( have_posts() ) : ?>

        <?php woocommerce_product_loop_start(); ?>

        <?php woocommerce_product_subcategories(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php $term = get_the_terms( get_the_ID(), 'product_cat' )?>

        <?php endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

        <?php
        /**
         * woocommerce_after_shop_loop hook.
         *
         * @hooked woocommerce_pagination - 10
         */
        do_action( 'woocommerce_after_shop_loop' );
        ?>

    <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

        <?php wc_get_template( 'loop/no-products-found.php' ); ?>

    <?php endif; ?>
    <?php

    $description = get_term_meta($term[0]->term_id, 'desc_cat', true);
    if(isset($description) && $description != ''){ ?>
        <div class="tm_category_desc">
            <?php echo teamhost_wp_kses($description);?>
        </div>
    <?php } ?>



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

    <?php if(teamhost_get_theme_mod('footer_copyrights') && $menu_style == 'style_two'){ ?>
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


<?php get_footer(); ?>
