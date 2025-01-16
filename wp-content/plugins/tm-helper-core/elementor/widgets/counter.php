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
class TM_Counter extends Widget_Base {

    public function get_name() {
        return 'tm-counter';
    }

    public function get_title() {
        return esc_html__( 'Counter', 'tm-helper-core' );
    }

    public function get_icon() {
        return 'fa fa-hand-pointer-o tm-icon';
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
            'title',
            [
                'label' => esc_html__( 'Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your title', 'tm-helper-core' ),
                'default' => 'Rental Orders',
            ]
        );


        $this->add_control(
            'number',
            [
                'label' => esc_html__( 'Number', 'templines-helper-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100000,
                'step' => 1,
                'default' => 300
            ]
        );
        $this->add_control(
            'preffix',
            [
                'label' => esc_html__( 'Preffix', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your preffix', 'tm-helper-core' ),
                'default' => '+',
            ]
        );
        $this->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'Pioneer of the equipment rental industry.',
            ]
        );

        //Background
        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Background Color', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .stat-item' => 'background-color: {{VALUE}}',
                ],
                'default' => '#f8f8f8'
            ]
        );
        $this->add_control(
            'bg_color_hv',
            [
                'label' => __( 'Background Color Hover', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .stat-item:hover' => 'background-color: {{VALUE}}',
                ],
                'default' => '#222'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'counter', 'role', 'counter' );
        $settings = $this->get_settings_for_display();

        ?>

        <div class="stat-item">
            <div class="stat-item__box">
                <?php if(isset($settings['title']) && $settings['title'] != ''){?>
                    <h6 class="stat-item__title"><?php echo esc_html($settings['title']);?></h6>
                <?php } ?>

                <div class="stat-item_numbers">
                    <span class="__js_number stat-item__value" data-end-value="<?php echo esc_attr(str_replace(",","", $settings['number']));?>">
                   <?php echo esc_html($settings['number']); ?>
                </span>
                    <?php if(isset($settings['preffix']) && $settings['preffix'] != ''){?>
                        <span class="stat-item-pref"><?php echo esc_html($settings['preffix']);?></span>
                    <?php } ?>
                </div>


                <?php if(isset($settings['text']) && $settings['text'] != ''){?>
                    <p class="stat-item__text"><?php echo esc_html($settings['text']);?></p>
                <?php } ?>
            </div>
        </div>

        <?php

    }
}