<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     5.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<h1 class="uk-text-lead"><?php echo get_the_title();?></h1>

<div class="uk-grid uk-grid-small" data-uk-grid>
    <div class="uk-width-2-3@s">
        <?php do_action( 'woocommerce_before_single_product_summary' );?>
    </div>

    <div class="uk-width-1-3@s">

        <div class="product_single_sidebar">
            <div class="game-profile-card">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="game-profile-card__media"><img src="<?php echo esc_url(get_the_post_thumbnail_url())?>" alt="game-profile-card"></div>
                <?php } ?>

                <div class="game-profile-price">
                    <a class="uk-button uk-button-buy uk-width-1-1" type="button" href="<?php echo esc_url($product->add_to_cart_url());?>">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="tmwoo_buynow_btn_text">
                            <?php echo __('Buy Now', 'teamhost')?>
                        </span>
                        <div class="tmwoo_single_price_wrap">
                            <div class="game-profile-price__value"><?php echo teamhost_wp_kses($product->get_price_html());?></div>
                        </div>
                    </a>
                    <?php if(class_exists('YITH_WCWL_Wishlist_Data_Store')){ ?>
                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]')?>
                    <?php } ?>
                </div>


                <div class="game-profile-card__intro"><span><?php the_excerpt();?></span></div>
                <ul class="game-profile-card__list">
                    <?php $average = get_post_meta(get_the_ID(), '_wc_average_rating', true);
                    $comments = get_comments(array( 'post_id' => get_the_ID(), 'type' => 'review' )); ?>
                    <?php if(isset($average) && $average != '' && $average != 0){ ?>
                        <li>
                            <div><?php echo __('Reviews:', 'teamhost')?></div>
                            <div class="game-card__rating"><span><?php echo esc_html($average);?></span><i class="ico_star"></i>
                                <span class="rating-vote"><?php echo esc_html('(' . count($comments) . ')')?></span>
                            </div>
                        </li>
                    <?php } ?>
                    <?php $game_release_date = teamhost_get_theme_mod('game_release_date', true); ?>
                    <?php if(isset($game_release_date) && $game_release_date != ''){?>
                        <li>
                            <div><?php echo __('Release date:', 'teamhost')?></div>
                            <div><?php echo esc_html($game_release_date);?></div>
                        </li>
                    <?php } ?>

                    <?php $game_developer = teamhost_get_theme_mod('game_developer', true); ?>
                    <?php if(isset($game_developer) && $game_developer != ''){?>
                        <li>
                            <div><?php echo __('Developer:', 'teamhost')?></div>
                            <div><?php echo esc_html($game_developer);?></div>
                        </li>
                    <?php } ?>

                    <?php
                    $attributes = $product->get_attributes();
                    if(isset($attributes) && !empty($attributes)){
                        foreach ($attributes as $attribute){
                            $atrs = wc_get_product_terms(get_the_ID(), $attribute['name'], 'names');
                            $attribute_tax = wc_get_attribute( $attribute['id'] );
                            ?>
                            <?php if(isset($atrs) && !empty($atrs)){ ?>
                                <li>
                                    <div><?php echo esc_html($attribute_tax->name). ': '?></div>
                                    <div class="fl-attribute">
                                        <?php $p = 1; foreach ($atrs as $ps){ ?>



                                            <?php if($p == count($atrs)){ ?>
                                                <span><?php echo esc_html($ps->name);?></span>
                                            <?php } else { ?>
                                                <span><?php echo esc_html($ps->name . ', ');?></span>
                                            <?php } ?>


                                            <?php $p++; } ?>
                                    </div>
                                </li>
                            <?php  }
                        } ?>

                    <?php } ?>

                    <?php $all_categories = wp_get_object_terms( get_the_ID(), 'product_cat', array( 'fields' => 'ids' ) ); ?>
                    <?php if(isset($all_categories) && !empty($all_categories)){ ?>

                        <?php $e = 1; foreach ($all_categories as $category) { ?>
                            <?php $term_link = get_term_link( $category, 'product_cat');
                            $term_n = get_term_by( 'id', $category, 'product_cat');?>
                            <li>
                                <div><?php echo __('Category: ', 'teamhost');?></div>
                                <div class="fl-category">
                                    <?php if($e == count($all_categories)){ ?>
                                        <a href="<?php echo esc_url($term_link)?>"><?php echo esc_html($term_n->name)?></a>
                                    <?php } else { ?>
                                        <a href="<?php echo esc_url($term_link)?>"><?php echo esc_html($term_n->name. ', ')?></a>
                                    <?php } ?>
                                </div>
                            </li>
                            <?php $e++; } ?>
                    <?php } ?>
                </ul>

            </div>


        </div>


    </div>
</div>

