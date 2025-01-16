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
class TM_Offers extends Widget_Base {

    public function get_name() {
        return 'tm-offers';
    }

    public function get_title() {
        return esc_html__( 'Offers', 'tm-helper-core' );
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

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your title', 'tm-helper-core' ),
                'default' => 'Rent ForkLift At Lowest',
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
                'default' => 'Allamco laboris nisiut aliquip labore magna',
            ]
        );

        $repeater->add_control(
            'action',
            [
                'label' => esc_html__( 'Action text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'Starts <span>$45</span> / Day',
            ]
        );
        $repeater->add_control(
            'img',
            [
                'label'             => __( 'Avatar', 'templines-helper-core' ),
                'type'              => Controls_Manager::MEDIA,
                'label_block'       => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $this->add_control(
            'offers_list',
            [
                'label'       => '',
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );



        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'offers', 'role', 'offers' );
        $settings = $this->get_settings_for_display();
        ?>
        <div <?php echo $this->get_render_attribute_string('wrapper')?>>
            <div class="section-content">
                <div class="uk-grid uk-grid-small" data-uk-grid>
                    <div>
                        <div class="offer-box">
                            <?php foreach ($settings['offers_list'] as $item){?>
                                <div class="offer-item">
                                    <?php if($item['img']['id'] != ''){ ?>
                                        <div class="offer-media">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url($item['img']['id'], 'teamhost_size_100x80_crop'))?>" alt="<?php echo esc_attr($item['img']['alt'])?>">
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($item['title']) && $item['title'] != ''){?>
                                        <div class="offer-info">
                                            <div class="offer-title"><?php echo esc_html($item['title']);?></div>
                                            <?php if(isset($item['text']) && $item['text'] != ''){?>
                                                <div class="offer-intro"><?php echo esc_html($item['text']);?></div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($item['action']) && $item['action'] != ''){?>
                                        <?php  $allowed_html = array( 'span' => array(), );?>
                                        <div class="offer-price"><?php echo wp_kses($item['action'], $allowed_html)?></div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}