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
class TM_Image_Slider extends Widget_Base {

    public function get_name() {
        return 'tm-image-slider';
    }

    public function get_title() {
        return esc_html__( 'Image Slider', 'tm-helper-core' );
    }

    public function get_icon() {
        return 'fas fa-ad tm-icon';
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
        //Single Image
        $repeater = new Repeater();
        $repeater->add_control(
            'img',
            [
                'label'             => __( 'Image', 'templines-helper-core' ),
                'type'              => Controls_Manager::MEDIA,
                'label_block'       => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => __( 'Image Link', 'tm-helper-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'tm-helper-core' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        $this->add_control(
            'image_list',
            [
                'label'       => '',
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'image_slider', 'role', 'image_slider' );
        $settings = $this->get_settings_for_display();
        ?>

        <div class="js-recommend">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['image_list'] as $item) { ?>
                        <div class="swiper-slide">
                            <div class="recommend-slide">
                                <div class="tour-slide__box">
                                    <?php if(isset($item['img']['url']) && $item['img']['url'] != ''){ ?>
                                        <a href="<?php echo esc_url($item['link']['url'])?>"><img src="<?php echo esc_url(wp_get_attachment_image_url($item['img']['id'], 'teamhost_size_1080x413_crop'))?>" alt="banner"></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swipper-nav">
                    <div class="swiper-button-prev ico_arrow-circle-right"></div>
                    <div class="swiper-button-next ico_arrow-circle-left"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>


        <?php

    }
}