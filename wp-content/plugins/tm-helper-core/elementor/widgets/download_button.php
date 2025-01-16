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
class TM_Download extends Widget_Base {

    public function get_name() {
        return 'tm-download';
    }

    public function get_title() {
        return esc_html__( 'Download', 'tm-helper-core' );
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

        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'tm-helper-core' ),
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


        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'download', 'role', 'download' );
        $settings = $this->get_settings_for_display();
        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'download', $settings['link'] );
        }
        ?>

        <div class="download-app__links">
            <?php if (isset($settings['img']['id']) && $settings['img']['id'] != ''){?>
                <a class="download-link" <?php echo $this->get_render_attribute_string('download');?> target="_blank">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($settings['img']['id'], 'teamhost_size_40x40_crop'))?>" alt="appstore">
                </a>
            <?php } ?>
        </div>



        <?php

    }
}