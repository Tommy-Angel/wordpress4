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
class TM_Button extends Widget_Base {

    public function get_name() {
        return 'tm-button';
    }

    public function get_title() {
        return esc_html__( 'Button', 'tm-helper-core' );
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
            'button_style',
            [
                'label' => __( 'Arrow', 'tm-helper-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_one'                    =>         esc_attr__('Right Arrow','tm-helper-core'),
                    'style_two'              =>         esc_attr__('Left Arrow','tm-helper-core'),
                ],
                'default' => 'style_one',

            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Get Started', 'tm-helper-core' ),
                'placeholder' => __( 'Enter your button text', 'tm-helper-core' ),
                'description' => __( 'Enter your button text', 'tm-helper-core' ),
                'separator' => 'before',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => __( 'Button Link', 'tm-helper-core' ),
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
            'button_css_id',
            [
                'label' => __( 'Button ID', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => '',
                'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'tm-helper-core' ),
                'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'tm-helper-core' ),
                'separator' => 'before',
            ]
        );


       /*
        * Custom
        */
        //Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Typography', 'tm-helper-core' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .s-about__btns a.tm_button',
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
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .s-about__btns' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        //Color
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .s-about__btns a.tm_button svg' => 'fill: {{VALUE}}; color: {{VALUE}}',
                ],
                'default' => '#ffffff'
            ]
        );
        $this->add_control(
            'icon_color_hv',
            [
                'label' => __( 'Icon Color Hover', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .s-about__btns a.tm_button:hover svg' => 'fill: {{VALUE}}; color: {{VALUE}}',
                ],
                'default' => '#ffffff'
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .s-about__btns a.tm_button' => 'color: {{VALUE}}',
                ],
                'default' => '#ffffff'
            ]
        );
        $this->add_control(
            'title_color_hv',
            [
                'label' => __( 'Color Hover', 'tm-helper-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .s-about__btns a.tm_button:hover' => 'color: {{VALUE}}',
                ],
                'default' => '#ffffff'
            ]
        );
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
                    '{{WRAPPER}} .s-about__btns a.tm_button' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .s-about__btns a.tm_button:hover' => 'background-color: {{VALUE}}',
                ],
                'default' => '#d69e06'
            ]
        );


        //Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'tm-helper-core' ),
                'selector' => '{{WRAPPER}} .s-about__btns a.tm_button',
                'default' => '#efb007'
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border_hv',
                'label' => __( 'Border Hover', 'tm-helper-core' ),
                'selector' => '{{WRAPPER}} .s-about__btns a.tm_button:hover',
                'default' => '#d69e06'
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'button', 'role', 'button' );
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['button_css_id'] ) ) {
            $this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
        }
        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'button', $settings['link'] );
        }
        ?>
        <?php if($settings['button_style'] == 'style_one'){ ?>
            <div class="s-about__btns" data-uk-margin>
                <a class="uk-button uk-button-danger uk-button-large tm_button" <?php echo $this->get_render_attribute_string('button');?> data-uk-icon="arrow-right">
                    <?php echo esc_html($settings['button_text']);?>
                </a>
            </div>
        <?php } else { ?>
            <div class="s-about__btns">
                <a class="more tm_button" <?php echo $this->get_render_attribute_string('button');?>>
                    <span data-uk-icon="arrow-right"></span>
                    <span><?php echo esc_html($settings['button_text']);?></span>
                </a>
            </div>
        <?php } ?>

        <?php



    }
}