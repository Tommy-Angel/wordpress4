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
class TM_Socials extends Widget_Base {

    public function get_name() {
        return 'tm-socials';
    }

    public function get_title() {
        return esc_html__( 'Socials', 'tm-helper-core' );
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
            'fb',
            [
                'label' => esc_html__( 'Facebook', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your Facebook', 'tm-helper-core' ),
                'default' => '#',
            ]
        );

        $this->add_control(
            'tw',
            [
                'label' => esc_html__( 'Twitter', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your Twitter', 'tm-helper-core' ),
                'default' => '#',
            ]
        );

        $this->add_control(
            'in',
            [
                'label' => esc_html__( 'Instagram', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your Instagram', 'tm-helper-core' ),
                'default' => '#',
            ]
        );

        $this->add_control(
            'ln',
            [
                'label' => esc_html__( 'Linkedin', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your Linkedin', 'tm-helper-core' ),
                'default' => '#',
            ]
        );

        $this->add_control(
            'yo',
            [
                'label' => esc_html__( 'Youtube', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your Youtube', 'tm-helper-core' ),
                'default' => '#',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'socials', 'role', 'socials' );
        $settings = $this->get_settings_for_display();
        ?>

        <ul class="tm_socials social">
            <?php if(isset($settings['fb']) && $settings['fb'] != ''){?>
                <li><a href="<?php echo esc_url($settings['fb'])?>" target="_blank"><span data-uk-icon="facebook"></span></a></li>
            <?php } ?>

            <?php if(isset($settings['tw']) && $settings['tw'] != ''){?>
                <li><a href="<?php echo esc_url($settings['tw'])?>" target="_blank"><span data-uk-icon="twitter"></span></a></li>
            <?php } ?>

            <?php if(isset($settings['in']) && $settings['in'] != ''){?>
                <li><a href="<?php echo esc_url($settings['in'])?>" target="_blank"><span data-uk-icon="instagram"></span></a></li>
            <?php } ?>

            <?php if(isset($settings['ln']) && $settings['ln'] != ''){?>
                <li><a href="<?php echo esc_url($settings['ln'])?>" target="_blank"><span data-uk-icon="linkedin"></span></a></li>
            <?php } ?>

            <?php if(isset($settings['yo']) && $settings['yo'] != ''){?>
                <li><a href="<?php echo esc_url($settings['yo'])?>" target="_blank"><span data-uk-icon="youtube"></span></a></li>
            <?php } ?>
        </ul>

        <?php

    }
}