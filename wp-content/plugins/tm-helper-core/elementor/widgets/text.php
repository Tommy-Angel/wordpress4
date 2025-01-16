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
class TM_Text extends Widget_Base {

    public function get_name() {
        return 'tm-text';
    }

    public function get_title() {
        return esc_html__( 'Text', 'tm-helper-core' );
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

        //Content
        $this->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'Lorem ipsum dolor tempor amety consecteur adipisicing elits do eiusmod tempor incididunt aliqua.',
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
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Text Typography', 'plugin-domain' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .section-content p',
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'tm-helper-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'text_margin_option',
            [
                'label' => __( 'Text Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'title', 'role', 'title' );
        $settings = $this->get_settings_for_display();
        ?>

        <div class="section-content">
            <?php if(isset($settings['text']) && $settings['text'] != ''){?>
                <p><?php echo esc_html($settings['text']);?></p>
            <?php } ?>
        </div>


        <?php

    }
}