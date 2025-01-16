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
class TM_Testimonials extends Widget_Base {

    public function get_name() {
        return 'tm-testimonials';
    }

    public function get_title() {
        return esc_html__( 'Testimonials', 'tm-helper-core' );
    }

    public function get_icon() {
        return 'fab fa-font tm-icon';
    }

    public function get_categories() {
        return array('tm-helper-core-elements');
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_elementor_text_editor_general_style',
            [
                'label' => __( 'General Styles', 'tm-helper-core' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your title', 'tm-helper-core' ),
                'default' => 'Out Class Performance',
            ]
        );
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'At dolore magna aliqua umt enim ad mini veniam quis ulamco aliquip com da consequat duis aute irue derit vol ptate cillum dolore afugiat.',
            ]
        );


        $repeater->add_control(
            'img',
            [
                'label'             => __( 'Avatar', 'templines-helper-core' ),
                'type'              => Controls_Manager::MEDIA,
                'label_block'       => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'name',
            [
                'label' => esc_html__( 'Name', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'Sheggy O’Brain',
            ]
        );
        $repeater->add_control(
            'position',
            [
                'label' => esc_html__( 'Position', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'Rental Customer',
            ]
        );
        $repeater->add_control(
            'stars',
            [
                'label' => esc_html__( 'Rating', 'templines-helper-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5,
                'step' => 1,
                'default' => 4
            ]
        );


        $this->add_control(
            'testimonials_list',
            [
                'label'       => '',
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );



        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'testimonials', 'role', 'testimonials' );
        $settings = $this->get_settings_for_display();
        ?>


        <div class="js-reviews-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['testimonials_list'] as $item){?>
                        <div class="swiper-slide">
                            <div class="review-item">
                                <div class="review-item__box">
                                    <div class="review-item__desc">
                                        <div class="review-item__icon">
                                            <span data-uk-icon="quote-right"></span>
                                        </div>
                                        <?php if(isset($item['title']) && $item['title'] != ''){?>
                                            <h4 class="review-item__title"><?php echo esc_html($item['title']);?></h4>
                                        <?php } ?>
                                        <?php if(isset($item['text']) && $item['text'] != ''){?>
                                            <p class="review-item__text"><?php echo esc_html($item['text']);?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="review-item__user">
                                        <div class="user">
                                            <div class="user__avatar">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url($item['img']['id'], 'teamhost_size_size_50x50_crop'))?>" alt="avatar">
                                            </div>
                                            <div class="user__info">
                                                <?php if(isset($item['name']) && $item['name'] != ''){?>
                                                    <div class="user__name"><?php echo esc_html($item['name']);?></div>
                                                <?php } ?>
                                                <?php if(isset($item['position']) && $item['position'] != ''){?>
                                                    <div class="user__position"><?php echo esc_html($item['position']);?></div>
                                                <?php } ?>
                                                <div class="user__rating">
                                                    <ul class="rating-list">
                                                        <?php if($item['stars'] == 1){?>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                        <?php } elseif($item['stars'] == 2){?>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                        <?php } elseif($item['stars'] == 3){?>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                        <?php } elseif($item['stars'] == 4){?>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li data-uk-icon="star"></li>
                                                        <?php } elseif($item['stars'] == 5){?>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                            <li class="active" data-uk-icon="star"></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="slider-nav uk-margin-large-top">
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"></div>
            </div>
        </div>
        <?php

    }
}