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
class TM_Title extends Widget_Base {

    public function get_name() {
        return 'tm-title';
    }

    public function get_title() {
        return esc_html__( 'Title', 'tm-helper-core' );
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
            'title',
            [
                'label' => esc_html__( 'Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your title', 'tm-helper-core' ),
                'default' => 'Helping the Industry with 10k+ Equipments available for Rentals Anytime',
            ]
        );
        $this->add_responsive_control(
            'align_common',
            [
                'label' => __( 'Text Alignment', 'tm-helper-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'tm-helper-core' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'tm-helper-core' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'tm-helper-core' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'tm-helper-core' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
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
                'name' => 'Title_typography',
                'label' => __( 'Title Typography', 'plugin-domain' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .section-title h3',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'tm-helper-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin_option',
            [
                'label' => __( 'Title Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section-title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'title', 'role', 'title' );
        $settings = $this->get_settings_for_display();
        ?>
        <?php if(isset($settings['title']) && $settings['title'] != ''){?>
            <h1 class="uk-text-lead"><?php echo esc_html($settings['title']);?></h1>
        <?php } ?>


        <?php

    }
}