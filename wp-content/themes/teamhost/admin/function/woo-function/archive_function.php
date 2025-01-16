<?php

// Item Inner
add_action( 'woocommerce_before_shop_loop_item',  'teamhost_item_woo_inner_wrapper_start', 1);
function teamhost_item_woo_inner_wrapper_start() {
    echo '<div class="game-card"><div class="game-card__box">';
}
add_action( 'woocommerce_after_shop_loop_item',  'teamhost_item_woo_inner_wrapper_end', 99);

function teamhost_item_woo_inner_wrapper_end() {
    echo '</div></div>';
}




// Top Content
add_action( 'woocommerce_before_shop_loop_item_title',  'teamhost_item_top_item_wrapper_start', 1);
function teamhost_item_top_item_wrapper_start() {

    echo '<div class="game-card__media">';
}

add_action( 'woocommerce_before_shop_loop_item_title',  'teamhost_item_top_item_wrapper_end', 12);
function teamhost_item_top_item_wrapper_end() {

    echo '</div>';
}




function teamhost_display_archive_new_item() {
    global $product;
    if ( get_post_meta( $product->get_id(), 'new_item', true ) ) {
        echo '<span class="new_item fl-primary-bg">'.esc_html__( 'New', 'teamhost' ).'</span>';
    }
}


/**
 * ------------------------------------------------------------------------------------------------
 * WishList button
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'woodmart_wishlist_btn' ) ) {
    function teamhost_wishlist_btn() {

        if( class_exists('YITH_WCWL_Shortcode')) echo YITH_WCWL_Shortcode::add_to_wishlist(array());

    }
}



// Top Content
add_action( 'woocommerce_before_shop_loop_item_title',  'teamhost_item_bottom_item_wrapper_start', 99);
function teamhost_item_bottom_item_wrapper_start() {
    echo '<div class="game-card__info">';

}

add_action( 'woocommerce_after_shop_loop_item',  'teamhost_item_bottom_item_wrapper_end', 99);
function teamhost_item_bottom_item_wrapper_end() {
    echo '</div>';
}

/**
 * ------------------------------------------------------------------------------------------------
 *  Woo Category
 * ------------------------------------------------------------------------------------------------
 */
function woocommerce_template_loop_product_title() {

    $title = get_the_title();

    echo  '<a class="game-card__title" href="' . esc_url(get_permalink()) . '" title="' . esc_attr($title) . '">' . $title . '</a>';
    $terms = get_the_terms ( get_the_ID(), 'product_cat' );
    $product = wc_get_product( get_the_ID() );
    if (isset($terms) && !empty($terms)){
        foreach ( $terms as $term ) {
            $cat_name = $term->name;
        }
    }
    if (isset($cat_name) && $cat_name != ''){
        echo '<div class="game-card__genre">' . esc_attr($cat_name) . '</div>';
    }

    echo ' <div class="game-card__rating-and-price">';
    $average = get_post_meta(get_the_ID(), '_wc_average_rating', true);
    if(isset($average) && $average != '' && $average != '0'){
        echo '<div class="game-card__rating"><span>' . esc_html($average) . '</span><i class="ico_star"></i></div>';
    }

    echo '<div class="game-card__price"><span>';
    woocommerce_template_loop_price();
    echo '</span></div>';

    echo '</div>';


    echo '<div class="game-card__bottom">';
    $attributes = $product->get_attributes();
    if(isset($attributes) && !empty($attributes)){
        echo '<div class="fl-attribute">';
        $z = 1; foreach ($attributes as $attribute){
            $atrs = wc_get_product_terms(get_the_ID(), $attribute['name'], 'names');
            $p = 1; foreach ($atrs as $ps){
                if(isset($atrs) && !empty($atrs)){
                    $icon_attr = get_term_meta($ps->term_id, 'cat_icon', true);
                    if(isset($icon_attr) && $icon_attr != ''){
                        echo wp_get_attachment_image($icon_attr);
                    }
                }
                $p++; $z++; }
        }
        echo  '</div>';

    }

    echo '<div class="game-card__users">';

        echo '<ul class="users-list">';
            $comments = get_comments(array( 'post_id' => get_the_ID(), 'type' => 'review' ));
            foreach ($comments as $c){
                $comment = get_comment( $c->comment_ID );
                $comment_author_id = $comment->user_id;
                $img_url = get_avatar_url($comment_author_id);
                echo '<li><img src="' . esc_url($img_url) . '" alt="' . esc_attr__("user", "teamhost") . '" /></li>';
            }
        echo '<ul>';

    echo '</div>';

    echo  '</div>';







}


/**
 * ------------------------------------------------------------------------------------------------
 *  Price
 * ------------------------------------------------------------------------------------------------
 */
if(!function_exists('teamhost_woocommerce_template_loop_price')) {
    function teamhost_woocommerce_template_loop_price() {

    }
}




/**
 * ------------------------------------------------------------------------------------------------
 * Add to Card Button List
 * ------------------------------------------------------------------------------------------------
 */
    if(!function_exists('teamhost_add_to_cart_button')) {
        function teamhost_add_to_cart_button() {

            echo '<div class="fl--woo-add-to-cart-wrap">';
            if(function_exists('woocommerce_template_loop_add_to_cart')) {
                echo '<div class="fl--add-to-cart-btn fl-font-style-medium">';
                    woocommerce_template_loop_add_to_cart();
                echo '</div>';
            }



            echo '</div>';
        }
    }






if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

    /**
     * Get the product thumbnail for the loop.
     */
    function woocommerce_template_loop_product_thumbnail() {


        $title = get_the_title();


        echo '<a href="' . esc_url(get_permalink()) . '" title="' . esc_attr($title) . '">';

        echo woocommerce_get_product_thumbnail();

        echo '</a>';
    }
}

//Archive Function

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action( 'woocommerce_before_shop_loop_item_title',  'teamhost_display_archive_new_item', 1);
