<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

global $post, $product;

$unique_id = uniqid('woo-single-image-');


$attachment_ids = array();
if(method_exists($product, 'get_gallery_image_ids')) {
    $attachment_ids = $product->get_gallery_image_ids();
} elseif(method_exists($product, 'get_gallery_attachment_ids')) {
    $attachment_ids = $product->get_gallery_attachment_ids();
}



$gallery = teamhost_get_theme_mod('gallery', true);


?>

<?php if ( count($attachment_ids) > 1 ) { ?>
    <div class="gallery">
        <div class="js-gallery-big gallery-big">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    if(isset($gallery) && !empty($gallery)) {
                        foreach ($gallery as $gal) {
                            if (isset($gal['video']) && $gal['video'] != '') {
                                $vowels_rep = array(
                                    "https://youtu.be/",
                                    "https://www.youtube.com/watch?v=",
                                    "https://www.youtube.com/embed/"
                                );
                                $video_id = str_replace($vowels_rep, "", $gal['video']);
                                $video_link = "https://www.youtube.com/embed/" . $video_id;
                                ?>
                                <div class="swiper-slide">
                                    <iframe width="1027" height="494" src="<?php echo esc_url($video_link); ?>"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                </div>
                            <?php }
                        }
                    }
                    // Product Thumbnails
                    if ( count($attachment_ids) > 1 ) {

                        foreach ( $attachment_ids as $attachment_id ) {

                            $classes = array( 'single-product-thumbnail' );

                            $image_url   = wp_get_attachment_url($attachment_id);
                            $image_class = esc_attr( implode( ' ', $classes ) );
                            $image_title = esc_attr( get_the_title( $attachment_id ) );

                            $image_size = wc_get_image_size('shop_single');

                            $img_url = '';

                            if(!$img_url) {
                                $img_url = $image_url;
                            }

                            $image = '<div class="swiper-slide"><img src ="'.esc_url($img_url).'" alt="'.esc_url($img_url).' " /></div>';

                            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html',
                                sprintf(
                                    $image,
                                    $image_class,
                                    $image_title,
                                    $image_url,
                                    $image
                                ),
                                $attachment_id,
                                $post->ID,
                                $image_class
                            );
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
        <div class="js-gallery-small gallery-small">
            <div class="swiper">
                <div class="swiper-wrapper">

                    <?php if(isset($gallery) && !empty($gallery)) {
                        foreach ($gallery as $gal) {
                            if (isset($gal['video']) && $gal['video'] != '') {
                                $vowels_rep = array(
                                    "https://youtu.be/",
                                    "https://www.youtube.com/watch?v=",
                                    "https://www.youtube.com/embed/"
                                );
                                $video_id = str_replace($vowels_rep, "", $gal['video']);
                                $thumb_image = 'https://img.youtube.com/vi/' .  $video_id  . '/maxresdefault.jpg';?>
                                <div class="swiper-slide"><i class="ico_play-circle"></i><img src="<?php echo esc_url($thumb_image)?>"></div>
                            <?php }
                        }
                    } ?>


                    <?php

                    // Product Thumbnails
                    if ( count($attachment_ids) > 1 ) {

                        foreach ( $attachment_ids as $attachment_id ) {

                            $classes = array( 'single-product-thumbnail' );

                            $image_url   = wp_get_attachment_url($attachment_id);
                            $image_class = esc_attr( implode( ' ', $classes ) );
                            $image_title = esc_attr( get_the_title( $attachment_id ) );

                            $image_size = wc_get_image_size('shop_single');

                            $img_url = '';

                            if(!$img_url) {
                                $img_url = $image_url;
                            }

                            $image = '<div class="swiper-slide"><img src ="'.esc_url($img_url).'" alt="'.esc_url($img_url).' " /></div>';

                            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html',
                                sprintf(
                                    $image,
                                    $image_class,
                                    $image_title,
                                    $image_url,
                                    $image
                                ),
                                $attachment_id,
                                $post->ID,
                                $image_class
                            );
                        }
                    }  ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php do_action( 'woocommerce_after_single_product_summary' ); ?>

<meta itemprop="url" content="<?php the_permalink(); ?>" />


