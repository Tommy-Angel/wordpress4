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
class TM_Reasons extends Widget_Base {

    public function get_name() {
        return 'tm-reasons';
    }

    public function get_title() {
        return esc_html__( 'Reasons', 'tm-helper-core' );
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
        //Icon
        $this->add_control(
            'slider_enable',
            [
                'label'   => __( 'Slider Enable/Disable', 'templines-helper-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'slider_enable',
                'options' => [
                    'slider_enable'              =>         esc_attr__('Enable','templines-helper-core'),
                    'slider_disable'              =>         esc_attr__('Disable','templines-helper-core'),
                ],
            ]
        );

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
                'default' => 'The industry standard sit amest elits sed tempor eiusmod.',
            ]
        );

        $this->add_control(
            'reasons_list',
            [
                'label'       => '',
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __( 'Content Color', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .reason-item__desc .reason-item__title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .reason-item__desc .reason-item__text' => 'color: {{VALUE}}',
                ],
                'default' => '#222'
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'reasons', 'role', 'reasons' );
        $settings = $this->get_settings_for_display();
        ?>
        <?php if($settings['slider_enable'] == 'slider_enable'){?>
            <div data-uk-slider class="tm_reasons_slider">
                <div class="uk-position-relative" tabindex="-1">
                    <ul class="uk-slider-items uk-grid uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-2@l">
                        <?php foreach ($settings['reasons_list'] as $item){?>
                            <li>
                                <div class="reason-item">
                                    <img class="reason-item__img" src="<?php echo esc_url(wp_get_attachment_image_url($item['img']['id'], 'teamhost_size_368x239_crop'))?>" alt="reason">
                                    <div class="reason-item__body">
                                        <div class="reason-item__desc">
                                            <?php if(isset($item['title']) && $item['title'] != ''){?>
                                                <h4 class="reason-item__title"><?php echo esc_html($item['title']);?></h4>
                                            <?php } ?>
                                            <?php if(isset($item['text']) && $item['text'] != ''){?>
                                                <p class="reason-item__text"><?php echo esc_html($item['text']);?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
            </div>

        <?php } elseif($settings['slider_enable'] == 'slider_disable'){?>
            <div class="uk-grid uk-grid-small uk-child-width-1-2@s" data-uk-grid>
                <?php foreach ($settings['reasons_list'] as $item){?>
                    <div class="reason-item">
                        <img class="reason-item__img" src="<?php echo esc_url(wp_get_attachment_image_url($item['img']['id'], 'teamhost_size_368x239_crop'))?>" alt="reason">
                        <div class="reason-item__body">
                            <div class="reason-item__desc">
                                <?php if(isset($item['title']) && $item['title'] != ''){?>
                                    <h4 class="reason-item__title"><?php echo esc_html($item['title']);?></h4>
                                <?php } ?>
                                <?php if(isset($item['text']) && $item['text'] != ''){?>
                                    <p class="reason-item__text"><?php echo esc_html($item['text']);?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <?php

    }
}