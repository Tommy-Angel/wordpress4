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
class TM_Contacts extends Widget_Base {

    public function get_name() {
        return 'tm-contacts';
    }

    public function get_title() {
        return esc_html__( 'Contacts', 'tm-helper-core' );
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
            'style',
            [
                'label'   => __( 'Slider Enable/Disable', 'templines-helper-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style_one',
                'options' => [
                    'style_one'              =>         esc_attr__('Style One','templines-helper-core'),
                    'style_two'              =>         esc_attr__('Style Two','templines-helper-core'),
                ],
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
                'condition' => [
                    'style' => 'style_one',
                ],
            ]
        );
        //Content
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Phone Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your phone title', 'tm-helper-core' ),
                'default' => 'Need Help? Call Us',
            ]
        );
        $this->add_control(
            'phone',
            [
                'label' => esc_html__( 'Phone', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your phone', 'tm-helper-core' ),
                'default' => '(+1) 788-123-9911',
            ]
        );


        $this->add_control(
            'address_title',
            [
                'label' => esc_html__( 'Address Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your address title', 'tm-helper-core' ),
                'default' => 'Need Help? Call Us',
                'condition' => [
                    'style' => 'style_two',
                ],
            ]
        );
        $this->add_control(
            'address',
            [
                'label' => esc_html__( 'Address', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your address', 'tm-helper-core' ),
                'default' => '35 Oakridge Lane, NJ 08102',
                'condition' => [
                    'style' => 'style_two',
                ],
            ]
        );
        $this->add_control(
            'address_link',
            [
                'label' => esc_html__( 'Address Link', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your address link', 'tm-helper-core' ),
                'default' => 'https://goo.gl/maps/RwFh5b8Po1pdxBS19',
                'condition' => [
                    'style' => 'style_two',
                ],
            ]
        );


        $this->add_control(
            'work_hours_title',
            [
                'label' => esc_html__( 'Work hours Title', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your work hours title', 'tm-helper-core' ),
                'default' => 'Work Time',
                'condition' => [
                    'style' => 'style_two',
                ],
            ]
        );
        $this->add_control(
            'work_hours',
            [
                'label' => esc_html__( 'Work Time', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your Work Time', 'tm-helper-core' ),
                'default' => 'Monday to Saturday: 9am to 7pm <br> Sunday: Closed',
                'condition' => [
                    'style' => 'style_two',
                ],
            ]
        );
        $this->add_control(
            'work_hours_link',
            [
                'label' => esc_html__( 'Work Time Link', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'Enter your address link', 'tm-helper-core' ),
                'default' => 'https://goo.gl/maps/RwFh5b8Po1pdxBS19',
                'condition' => [
                    'style' => 'style_two',
                ],
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {

        $this->add_render_attribute( 'contacts', 'role', 'contacts' );
        $settings = $this->get_settings_for_display();
        ?>
        <?php if($settings['style'] == 'style_one'){?>
            <div class="contacts-box">
                <?php if(isset($settings['img']['id']) && $settings['img']['id'] != ''){?>
                    <div class="contacts-box__img">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($settings['img']['id'], 'teamhost_size_960x635_crop'))?>" alt="image">
                    </div>
                <?php } ?>
                <div class="contacts-box__desc">
                    <?php if(isset($settings['title']) && $settings['title'] != ''){?>
                        <div class="contacts-box__label"><?php echo esc_html($settings['title'])?></div>
                    <?php } ?>
                    <?php if(isset($settings['phone']) && $settings['phone'] != ''){?>
                        <a class="contacts-box__phone" href="<?php echo esc_url('tel:' . $settings['phone'])?>"><?php echo esc_html($settings['phone'])?></a>
                    <?php } ?>
                </div>
            </div>
        <?php } elseif($settings['style'] == 'style_two'){?>
            <?php
            if(isset($settings['address_link']) && $settings['address_link'] != ''){
                $adress_link = $settings['address_link'];
            } else {
                $adress_link = '#';
            }
            ?>
            <ul class="tm_contacts_list contacts-list">
                <?php if(isset($settings['address']) && $settings['address'] != ''){?>
                    <li>
                        <a href="<?php echo esc_url($adress_link)?>" target="_blank">
                            <span data-uk-icon="location"></span>
                            <div>
                                <?php if(isset($settings['address_title']) && $settings['address_title'] != ''){?>
                                    <span class="label"><?php echo esc_html($settings['address_title'])?></span>
                                <?php } ?>
                                <span><?php echo esc_html($settings['address'])?></span>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isset($settings['phone']) && $settings['phone'] != ''){?>
                    <li>
                        <a href="<?php echo esc_url('tel:' . $settings['phone'])?>">
                            <span data-uk-icon="receiver"></span>
                            <div>
                                <?php if(isset($settings['title']) && $settings['title'] != ''){?>
                                    <span class="label"><?php echo esc_html($settings['title'])?></span>
                                <?php } ?>
                                <span><?php echo esc_html($settings['phone'])?></span>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                <?php if(isset($settings['work_hours']) && $settings['work_hours'] != ''){?>
                    <li>
                        <a href="mailto:equipments@domain.net">
                            <span data-uk-icon="clock"></span>
                            <div>
                                <?php if(isset($settings['work_hours_title']) && $settings['work_hours_title'] != ''){?>
                                    <span class="label"><?php echo esc_html($settings['work_hours_title'])?></span>
                                <?php } ?>
                                <span>
                                    <?php  $allowed_html = array( 'br' => array(), );
                                    echo wp_kses($settings['work_hours'], $allowed_html)?>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
        <?php

    }
}