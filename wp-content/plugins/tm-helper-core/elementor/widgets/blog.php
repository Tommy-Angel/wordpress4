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
class TM_Blog extends Widget_Base {

    public function get_name() {
        return 'tm-blog';
    }

    public function get_title() {
        return esc_html__( 'News Slider', 'tm-helper-core' );
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

        $this->add_render_attribute( 'blog', 'role', 'blog' );
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type'                 => 'post',
            'post_status'               => 'publish',
            'posts_per_page'            => $settings['posts_per_page'],
            'ignore_sticky_posts' => 1,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        );
        $posts = new WP_Query( $args );
        ?>

            <div class="js-trending">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if( $posts->have_posts() ) : while( $posts->have_posts() ) : $posts->the_post();?>
                        <div class="swiper-slide">
                            <div class="game-card --horizontal">
                                <div class="game-card__box">
                                    <?php if(has_post_thumbnail()){ ?>
                                        <div class="game-card__media">
                                            <?php
                                            $image = tm_helper_get_theme_mod('post_single_el_img', true);
                                            $css_bg = '';
                                            if(isset($image) && $image != ''){
                                                $css_bg = 'background-image: url(' . esc_url($image) . ')';
                                            } else {
                                                $css_bg = 'background-image: url(' . get_the_post_thumbnail_url(get_the_ID(), 'teamhost_size_564x780_crop') . ')';
                                            }
                                            ?>
                                            <a href="<?php esc_url(the_permalink()); ?>" class="card__media_link" style="<?php echo $css_bg;?>">

                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="game-card__info">
                                        <a class="game-card__title" href="<?php esc_url(the_permalink()); ?>">
                                            <?php $title = get_the_title(); ?>
                                            <h2><?php echo esc_attr(tm_japanworm_shorten_title($title, 45), 'tm-helper-core'); ?></h2>
                                        </a>
                                        <div class="game-card__genre">
                                            <?php echo tm_limit_excerpt(12);?>
                                        </div>
                                        <div class="game-card__bottom">
                                            <a class="uk-button-read-more" href="<?php esc_url(the_permalink()); ?>"><?php echo __("View More", 'tm-helper-core')?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile; endif;
                    wp_reset_query(); ?>
                </div>
                <div class="swipper-nav">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <?php

    }
}