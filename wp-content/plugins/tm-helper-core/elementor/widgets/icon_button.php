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
class TM_Icon_Button extends Widget_Base {

    public function get_name() {
        return 'tm-icon-button';
    }

    public function get_title() {
        return esc_html__( 'Icon Button', 'tm-helper-core' );
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
            'icon_svg',
            [
                'label'            => __( 'Icon', 'tm-helper-core' ),
                'type'             => Controls_Manager::ICONS,
                'label_block'      => true,
                'default'          => [
                    'value'   => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
                'fa4compatibility' => 'icon'
            ]
        );


        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'tm-helper-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Our Mission', 'tm-helper-core' ),
                'placeholder' => __( 'Enter your button text', 'tm-helper-core' ),
                'description' => __( 'Enter your button text', 'tm-helper-core' ),
                'separator' => 'before',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_text_pos',
            [
                'label' => __( 'Button Text Position', 'tm-helper-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'top'                    =>         esc_attr__('Top','tm-helper-core'),
                    'right'              =>         esc_attr__('Right','tm-helper-core'),
                    'bottom'              =>         esc_attr__('Bottom','tm-helper-core'),
                    'left'              =>         esc_attr__('Left','tm-helper-core'),
                ],
                'default' => 'bottom',

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
        //Color
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
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button svg' => 'fill: {{VALUE}}',
                ],
                'default' => '#222'
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
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button:hover svg' => 'fill: {{VALUE}}',
                ],
                'default' => '#efb007'
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
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button' => 'background-color: {{VALUE}}',
                ],
                'default' => '#eee'
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
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button:hover' => 'background-color: {{VALUE}}',
                ],
                'default' => '#fff'
            ]
        );

        $this->add_responsive_control(
            'iconsize',
            [
                'label' => __( 'Icon Size', 'tm-helper-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button i' => 'font-size: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .s-about__btns a.tm_icon_button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );



        $this->end_controls_section();
    }

    protected function render() {

        $this->add_render_attribute( 'icon_button', 'role', 'icon_button' );
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['button_css_id'] ) ) {
            $this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
        }
        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'button', $settings['link'] );
        }
        ?>

            <div class="s-about__btns" data-uk-margin>
                <a class="uk-icon-button tm_icon_button" <?php echo $this->get_render_attribute_string('button');?> data-uk-tooltip="title: <?php echo esc_attr($settings['button_text']);?>; pos: <?php echo esc_attr($settings['button_text_pos']);?>">
                    <?php if(isset($settings['icon_svg']['value']['url'])){?>
                        <?php
                        $arrContextOptions=array(
                            "ssl"=>array(
                                "verify_peer"=>false,
                                "verify_peer_name"=>false,
                            ),
                        );
                        echo file_get_contents( $settings['icon_svg']['value']['url'], false, stream_context_create($arrContextOptions) );?>
                    <?php } else { ?>
                        <i class="<?php echo esc_attr($settings['icon_svg']['value'])?>"></i>
                    <?php } ?>

                </a>
            </div>


        <?php



    }
}