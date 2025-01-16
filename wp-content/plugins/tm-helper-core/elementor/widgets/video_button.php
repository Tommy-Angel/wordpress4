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
class TM_Video_Button extends Widget_Base {

    public function get_name() {
        return 'tm-video-button';
    }

    public function get_title() {
        return esc_html__( 'Video Button', 'tm-helper-core' );
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
            'link',
            [
                'label' => __( 'Video Link', 'tm-helper-core' ),
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
            'caption_text',
            [
                'label' => __( 'Caption Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'YouTube', 'tm-helper-core' ),
                'placeholder' => __( 'Caption Text', 'tm-helper-core' ),
                'description' => __( 'Caption Text', 'tm-helper-core' ),
                'separator' => 'before',
                'label_block' => true,
            ]
        );

       /*
        * Custom
        */

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
                    '{{WRAPPER}} .s-video__link' => 'background-color: {{VALUE}}',
                ],
                'default' => '#efb007'
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
                    '{{WRAPPER}} .s-video__link:hover' => 'background-color: {{VALUE}}',
                ],
                'default' => '#efb007'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

      
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['button_css_id'] ) ) {
            $this->add_render_attribute( 'video-button', 'id', $settings['button_css_id'] );
        }
        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'video-button', $settings['link'] );
        }
        ?>


        <div class="s-video__img" data-uk-lightbox="video-autoplay: true">
            <a class="s-video__link" <?php echo $this->get_render_attribute_string('video-button');?> data-attrs="width: 1280; height: 720;" data-caption="<?php echo esc_attr($settings['caption_text'])?>">
                <img src="<?php echo plugin_dir_url(__FILE__) . '/img/ico-play.png';?>" alt="image">
            </a>
        </div>


        <?php

    }
}