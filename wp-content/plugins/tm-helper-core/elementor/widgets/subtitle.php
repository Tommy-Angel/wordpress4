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
class TM_Subtitle extends Widget_Base {

    public function get_name() {
        return 'tm-subtitle';
    }

    public function get_title() {
        return esc_html__( 'Subtitle', 'tm-helper-core' );
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
            'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your subtitle', 'tm-helper-core' ),
                'default' => 'Get the best rental service that is more cost effective, efficient and Safest.',
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


        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'tm-helper-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .s-hero__subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'title', 'role', 'subttitle' );
        $settings = $this->get_settings_for_display();
        ?>

        <div class="s-hero__subtitle">
            <?php if(isset($settings['subtitle']) && $settings['subtitle'] != ''){?>
                <?php echo esc_html($settings['subtitle']);?>
            <?php } ?>
        </div>


        <?php

    }
}