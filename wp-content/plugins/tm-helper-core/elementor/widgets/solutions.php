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
class TM_Solutions extends Widget_Base {

    public function get_name() {
        return 'tm-solutions';
    }

    public function get_title() {
        return esc_html__( 'Solutions', 'tm-helper-core' );
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
        $this->add_control(
            'style',
            [
                'label'   => __( 'Style', 'templines-helper-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style_one',
                'options' => [
                    'style_one'              =>         esc_attr__('Style One','templines-helper-core'),
                    'style_two'              =>         esc_attr__('Style Two','templines-helper-core'),
                ],
            ]
        );
        //Single Solution
        $repeater = new Repeater();
        $repeater->add_control(
            'img',
            [
                'label'             => __( 'Image', 'templines-helper-core' ),
                'type'              => Controls_Manager::MEDIA,
                'label_block'       => true,
                'description'       => 'Only for Style One',
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'icon_svg',
            [
                'label'            => __( 'Icon', 'tm-helper-core' ),
                'type'             => Controls_Manager::ICONS,
                'label_block'      => true,
                'description'       => 'Only for Style Two',
                'default'          => [
                    'value'   => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
                'fa4compatibility' => 'icon',
            ]
        );

        //Content
        $repeater->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your sub-title', 'tm-helper-core' ),
                'default' => 'For Any Power Needs',
                'description'       => 'Only for Style One',
                'condition' => [
                    'style' => 'style_one',
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
                'default' => 'Power Generation',
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
                'placeholder' => esc_html__( 'Enter your title', 'tm-helper-core' ),
                'default' => 'Tempor incidident sed dolore ipsum maga enim aud temp minis sed veniam quis nost exercitation ullamco laboris',
            ]
        );

        //Button
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'learn more', 'tm-helper-core' ),
                'placeholder' => __( 'Enter your button text', 'tm-helper-core' ),
                'description' => __( 'Only for Style One', 'tm-helper-core' ),
                'separator' => 'before',
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => __( 'Button Link', 'tm-helper-core' ),
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

        $repeater->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tm-feature-items .feature-item__w .feature-item__icon i' => 'color: {{VALUE}}',
                    //'{{WRAPPER}} .tm-feature-items .feature-item__w .feature-item__icon svg' => 'fill: {{VALUE}}',
                ],
                'default' => '#efb007',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_responsive_control(
            'iconsize',
            [
                'label' => __( 'Icon Size', 'tm-helper-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tm-feature-items .feature-item__w .feature-item__icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .tm-feature-items .feature-item__w .feature-item__icon img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .tm-feature-items .feature-item__w .feature-item__icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );



        $this->add_control(
            'solutions_list',
            [
                'label'       => '',
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'solutions', 'role', 'solutions' );

        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'solutions', $settings['link'] );
        }

        $settings = $this->get_settings_for_display();
        ?>
        <div class="section-content">
            <?php if(isset($settings['solutions_list']) && !empty($settings['solutions_list'] )){?>
                <?php if(isset($settings['style']) && $settings['style'] == 'style_one'){?>
                    <div class="js-solution-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($settings['solutions_list'] as $item){?>
                                    <div class="swiper-slide">
                                        <div class="solution-item">
                                            <div class="solution-item__box uk-inline">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url($item['img']['id'], 'teamhost_size_460x600_crop'))?>" alt="solution-item">
                                                <div class="uk-overlay uk-light uk-position-bottom">
                                                    <div class="solution-item__title">
                                                        <?php if(isset($item['sub_title']) && $item['sub_title'] != ''){ ?>
                                                            <span><?php echo esc_html('[' . $item['sub_title'] . ']');?></span>
                                                        <?php } ?>
                                                        <?php if(isset($item['title']) && $item['title'] != ''){ ?>
                                                            <h3><?php echo esc_html($item['title']);?></h3>
                                                        <?php } ?>
                                                    </div>
                                                    <?php if(isset($item['text']) && $item['text'] != ''){ ?>
                                                        <div class="solution-item__intro">
                                                            <p><?php echo esc_html($item['text']);?></p>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if(isset($item['button_text']) && $item['button_text'] != ''){ ?>
                                                        <div class="solution-item__link">
                                                            <a class="more" href="<?php echo esc_url($item['link']['url'])?>">
                                                                <span data-uk-icon="arrow-right"></span>
                                                                <span><?php echo esc_html($item['button_text']);?></span>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="slider-nav uk-margin-large-top">
                            <div class="swiper-button-prev"><i class="ico_arrow-left"></i></div>
                            <div class="swiper-button-next"><i class="ico_arrow-right"></i></div>
                        </div>
                    </div>
                <?php } elseif(isset($settings['style']) && $settings['style'] == 'style_two'){?>
                    <div class="tm-feature-items">
                        <div data-uk-slider>
                            <div class="uk-position-relative" tabindex="-1">
                                <ul class="uk-grid uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@l">
                                    <?php foreach ($settings['solutions_list'] as $item){?>
                                        <li>
                                            <div class="feature-item">
                                                <div class="feature-item__box">
                                                    <div class="feature-item__w">
                                                        <div class="feature-item__icon">
                                                            <?php if(isset($item['icon_svg']['value']['url'])){?>
                                                                <?php
                                                                $arrContextOptions=array(
                                                                    "ssl"=>array(
                                                                        "verify_peer"=>false,
                                                                        "verify_peer_name"=>false,
                                                                    ),
                                                                );
                                                                echo file_get_contents( $item['icon_svg']['value']['url'], false, stream_context_create($arrContextOptions) );?>
                                                            <?php } else { ?>
                                                                <i class="<?php echo esc_attr($item['icon_svg']['value'])?>"></i>
                                                            <?php } ?>
                                                        </div>
                                                        <?php if(isset($item['title']) && $item['title'] != ''){ ?>
                                                            <button class="feature-item__title">

                                                                <?php  $allowed_html = array( 'br' => array(), );
                                                                echo wp_kses($item['title'], $allowed_html)?>

                                                            </button>
                                                        <?php } ?>
                                                    </div>
                                                    <?php if(isset($item['text']) && $item['text'] != ''){ ?>
                                                        <div class="feature-item__text">
                                                            <?php echo esc_html($item['text']);?>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="feature-item__more">
                                                        <a href="<?php echo esc_url($item['link']['url'])?>"><span data-uk-icon="arrow-right"></span></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <?php

    }
}