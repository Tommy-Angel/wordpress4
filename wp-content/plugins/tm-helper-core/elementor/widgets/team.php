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
class TM_Team extends Widget_Base {

    public function get_name() {
        return 'tm-team';
    }

    public function get_title() {
        return esc_html__( 'Team', 'tm-helper-core' );
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
        $repeater->add_control(
            'name',
            [
                'label' => esc_html__( 'Name', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'Sheggy O’Brain',
            ]
        );

        $repeater->add_control(
            'position',
            [
                'label' => esc_html__( 'Position', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your text', 'tm-helper-core' ),
                'default' => 'Senior Member',
            ]
        );


        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_control(
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
            'team_list',
            [
                'label'       => '',
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'team', 'role', 'team' );
        $settings = $this->get_settings_for_display();
        ?>

        <div class="js-team-slider tm_team">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['team_list'] as $item){?>
                        <div class="swiper-slide">
                            <div class="team-user">
                                <div class="team-user__photo">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url($item['img']['id'], 'teamhost_size_size_260x248_crop'))?>" alt="team">
                                </div>
                                <div class="team-user__body">
                                    <?php if(isset($item['name']) && $item['name'] != ''){?>
                                        <div class="team-user__name"><?php echo esc_html($item['name'])?></div>
                                    <?php } ?>
                                    <?php if(isset($item['position']) && $item['position'] != ''){?>
                                        <div class="team-user__position"><?php echo esc_html($item['position'])?></div>
                                    <?php } ?>
                                    <div class="team-user__social">
                                        <ul class="social">
                                            <?php if(isset($item['fb']) && $item['fb'] != ''){?>
                                                <li class="social__item"><a class="social__link" href="<?php echo esc_url($item['fb'])?>" target="_blank"><span data-uk-icon="facebook"></span></a></li>
                                            <?php } ?>
                                            <?php if(isset($item['tw']) && $item['tw'] != ''){?>
                                                <li class="social__item"><a class="social__link" href="<?php echo esc_url($item['tw'])?>" target="_blank"><span data-uk-icon="twitter"></span></a></li>
                                            <?php } ?>

                                            <?php if(isset($item['ln']) && $item['ln'] != ''){?>
                                                <li class="social__item"><a class="social__link" href="<?php echo esc_url($item['ln'])?>" target="_blank"><span data-uk-icon="linkedin"></span></a></li>
                                            <?php } ?>

                                            <?php if(isset($item['in']) && $item['in'] != ''){?>
                                                <li class="social__item"><a class="social__link" href="<?php echo esc_url($item['in'])?>" target="_blank"><span data-uk-icon="instagram"></span></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php

    }
}