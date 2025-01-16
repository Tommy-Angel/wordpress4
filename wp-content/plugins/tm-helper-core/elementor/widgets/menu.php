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
class TM_Menu extends Widget_Base {

    public function get_name() {
        return 'tm-menu';
    }

    public function get_title() {
        return esc_html__( 'Menu', 'tm-helper-core' );
    }

    public function get_icon() {
        return 'fab fa-font tm-icon';
    }

    public function get_categories() {
        return array('tm-helper-core-elements');
    }
    public function get_menus() {
        $menus = get_terms( 'nav_menu' );
        $menus = array_combine( wp_list_pluck( $menus, 'term_id' ), wp_list_pluck( $menus, 'name' ) );
        return $menus;
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_elementor_text_editor_general_style',
            [
                'label' => __( 'General Styles', 'tm-helper-core' ),
            ]
        );
        $this->add_control(
            'menus',
            [
                'label'   => __( 'Select Menu to Show', 'templines-helper-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->get_menus(),
            ]
        );
        $this->add_control(
            'icon_disable',
            [
                'label'   => __( 'Icon Enable/Disable', 'templines-helper-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'disable',
                'options' => [
                    'enable'              =>         esc_attr__('Enable','templines-helper-core'),
                    'disable'              =>         esc_attr__('Disable','templines-helper-core'),
                ],
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .page-header__mainmenu' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        // Title
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => __( 'Typography', 'plugin-domain' ),
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
                'selector' => '{{WRAPPER}} .fl-mega-menu ul li',
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

        $this->add_render_attribute( 'menu', 'role', 'menu' );
        $settings = $this->get_settings_for_display();
        $class_diss = '';
        if(isset($settings['icon_disable']) && $settings['icon_disable'] == 'disable'){
            $class_diss = 'el_menu_icon_disable';
        }
        ?>

        <?php
            if(isset($settings['menus']) && $settings['menus'] != ''){ ?>

                <div class="page-header__mainmenu">
                    <nav class="fl-mega-menu nav-menu <?php echo esc_attr($class_diss);?>">
                        <?php wp_nav_menu(array(
                            'menu'              => $settings['menus'],
                            'menu_class'        => 'menu uk-nav uk-nav-default uk-nav-parent-icon',
                            'container'         => false,
                            'depth'             => 8,
                            'fallback_cb'       => 'teamhost_menu_fallback'
                        )); ?>
                    </nav>
                </div>
            <?php }
        ?>

        <?php

    }
}