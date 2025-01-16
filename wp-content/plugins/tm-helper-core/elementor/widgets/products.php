<?php
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor activities widget.
 *
 * Elementor widget that displays a bullet list with any chosen icons and texts.
 *
 * @since 1.0.0
 */
class TM_Products extends Widget_Base {

    public function get_name() {
        return 'tm-products';
    }

    public function get_title() {
        return esc_html__( 'Products', 'tm-helper-core' );
    }

    public function get_icon() {
        return 'fab fa-font tm-icon';
    }

    public function get_categories() {
        return array('tm-helper-core-elements');
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_elementor_text_editor_general_style',
            [
                'label' => __( 'General Styles', 'tm-helper-core' ),
            ]
        );


        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__( 'Posts per Page', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your posts per page', 'tm-helper-core' ),
                'default' => 3,
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'products', 'role', 'products' );
        $settings = $this->get_settings_for_display();
        $args = array(
            'post_type'                 => 'product',
            'post_status'               => 'publish',
           // 'posts_per_page'            => $settings['posts_per_page'],
        );
        $products = new WP_Query( $args );


        ?>

        <div class="js-store">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($products->posts as $p){ ?>
                        <?php $stock = get_post_meta( $p->ID, '_stock_status', true );?>
                        <?php if($stock == 'instock'){ ?>
                            <div class="swiper-slide">
                                <div class="game-card">
                                    <div class="game-card__box">
                                        <div class="game-card__media">
                                            <a href="<?php echo esc_url(get_permalink($p->ID));?>">
                                                <?php echo get_the_post_thumbnail($p->ID, 'teamhost_size_300x300_crop');?>
                                            </a>
                                        </div>
                                        <div class="game-card__info">
                                            <a class="game-card__title" href="<?php echo esc_url(get_permalink($p->ID));?>"><h2><?php echo esc_html($p->post_title);?></h2></a>
                                            <?php
                                            $terms = get_the_terms ( $p->ID, 'product_cat' );
                                            $product = wc_get_product( $p->ID );
                                            if (isset($terms) && !empty($terms)){
                                                foreach ( $terms as $term ) {
                                                    $cat_name = $term->name;
                                                }
                                            }
                                            ?>
                                            <?php if (isset($cat_name) && $cat_name != ''){ ?>
                                                <div class="game-card__genre"><?php echo esc_attr($cat_name);?></div>
                                            <?php } ?>
                                            <div class="game-card__rating-and-price">
                                                <?php $average = get_post_meta($p->ID, '_wc_average_rating', true);?>
                                                <?php if(isset($average) && $average != '' || $average != 0 || $average != '0'){ ?>
                                                    <div class="game-card__rating"><span><?php echo esc_html($average);?></span><i class="ico_star"></i></div>
                                                <?php } ?>
                                                <div class="game-card__price"><span><?php echo $product->get_price_html();?></span></div>
                                            </div>
                                            <div class="game-card__bottom">
                                                <?php  $platforms = woocommerce_get_product_terms($p->ID, 'pa_enplatform', 'names');


                                                if(isset($platforms) && !empty($platforms)){ ?>
                                                    <div class="game-card__platform">
                                                        <?php foreach ($platforms as $ps){ ?>
                                                            <?php if($ps == "Windows"){ ?>
                                                                <i class="ico_windows"></i>
                                                            <?php } elseif ($ps == "Apple"){ ?>
                                                                <i class="ico_apple"></i>
                                                            <?php } elseif ($ps == "Android"){ ?>
                                                                <i class="fa-brands fa-android"></i>
                                                            <?php } elseif ($ps == "Linux"){ ?>
                                                                <i class="fa-brands fa-linux"></i>
                                                            <?php } elseif ($ps == "Playstation"){ ?>
                                                                <i class="fa-brands fa-playstation"></i>
                                                            <?php } elseif ($ps == "Xbox"){ ?>
                                                                <i class="fa-brands fa-xbox"></i>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="game-card__users">
                                                    <ul class="users-list">
                                                        <?php
                                                        $comments = get_comments(array( 'post_id' => $p->ID, 'type' => 'review' ));
                                                        foreach ($comments as $c){
                                                            $comment = get_comment( $c->comment_ID );
                                                            $comment_author_id = $comment->user_id;
                                                            $img_url = get_avatar_url($comment_author_id);
                                                            ?>
                                                            <li><img src="<?php echo esc_url($img_url);?>" alt="user" /></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <?php

    }
}