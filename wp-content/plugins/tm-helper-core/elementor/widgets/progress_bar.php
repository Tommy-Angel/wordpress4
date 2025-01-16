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
class TM_Progress_Bar extends Widget_Base {

    public function get_name() {
        return 'tm-progress-bar';
    }

    public function get_title() {
        return esc_html__( 'Progress Bar', 'tm-helper-core' );
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
            'text',
            [
                'label' => __( 'Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Machinery Help', 'tm-helper-core' ),
                'placeholder' => __( 'Enter your text', 'tm-helper-core' ),
                'description' => __( 'Enter your text', 'tm-helper-core' ),
                'separator' => 'before',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__( 'Percent', 'templines-helper-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 86
            ]
        );


        $this->end_controls_section();


        //Style
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Style', 'tm-helper-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title
        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'tm-helper-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progress-item h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Percent
        $this->add_control(
            'percent_color',
            [
                'label' => __( 'Percent Color', 'tm-helper-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progress-item .fl-animated-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'tm-helper-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fl-progress-bar .fl-tracking-progress-bar' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bar_color',
            [
                'label' => __( 'Bar Color', 'tm-helper-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fl-progress-bar .fl-tracking-progress-bar .fl-tracking-progress-bar__item' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'progress-bar', 'role', 'progress-bar' );
        $settings = $this->get_settings_for_display();
        ?>

        <div class="fl-progress-bar cf info-card__progress" data-duration="1000" data-progress-width="<?php echo esc_attr($settings['number']);?>%">
            <div class="fl-progress-wrapper progress-item">
                <?php if(isset($settings['text']) && $settings['text'] != ''){?>
                    <h6><?php echo esc_html($settings['text']);?></h6>
                <?php } ?>
                <div class="fl-tracking-progress-bar">
                    <div class="fl-tracking-progress-bar__item uk-progress"></div>
                </div>
                <span class="fl-progress-bar__number">
                    <span class="fl-animated-number"><?php echo esc_html('0%');?></span>
                </span>
            </div>
        </div>





        <?php

    }
}