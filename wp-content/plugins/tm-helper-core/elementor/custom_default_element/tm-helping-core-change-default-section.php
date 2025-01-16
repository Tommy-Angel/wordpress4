<?php

/**
 * Class description
 *
 * @author    TM
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Background;

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'TM_Helper_Core_Elements_Section' ) ) {

	/**
	 * Define TM_Helper_Core_Elements_Ext_Section class
	 */
	class TM_Helper_Core_Elements_Section{

		/**
		 * [$parallax_sections description]
		 * @var array
		 */
		public $parallax_sections = array();

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * Init Handler
		 */
		public function init() {
            add_action('elementor/element/section/section_layout/after_section_end', array($this, 'register_controls'), 10);
            add_action('elementor/widget/before_render_content', array($this, 'before_render'));
        }


		public function register_controls( $element ) {
            $element->start_controls_section(
                'section_custom_background_clip_part',
                [
                    'label' => esc_html__( 'Section Settings', 'tm-helper-core' ),
                    'tab'   => Elementor\Controls_Manager::TAB_ADVANCED,
                ]
            );

            $element->add_responsive_control(
                'container',
                [
                    'label' => __( 'Bootstrap Container', 'tm-helper-core' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'container'             =>          esc_attr__('On','tm-helper-core'),
                        'off'              =>          esc_attr__('Off','tm-helper-core'),
                    ],
                    'default' => 'off',
                    'prefix_class' => '',
                ]
            );



            $element->add_responsive_control(
                'parallax',
                [
                    'label'             => __( 'Parallax', 'tm-helper-core' ),
                    'type'              => Controls_Manager::SELECT,
                    'options' => [
                        'disable'  => __( 'Disable', 'tm-helper-core' ),
                        'section'  => __( 'Enable', 'tm-helper-core' ),
                        //'fl_custom'  => __( 'Custom Figure', 'tm-helper-core' ),
                    ],
                    'prefix_class' => 'pp-',
                ]
            );

            $element->add_responsive_control(
                'parallax_color',
                [
                    'label'             => __( 'Parallax Color', 'tm-helper-core' ),
                    'type'              => Controls_Manager::SELECT,
                    'options' => [
                        'light'    => __( 'Light', 'tm-helper-core' ),
                        'dark'     => __( 'Dark', 'tm-helper-core' ),
                        //'fl_custom'  => __( 'Custom Figure', 'tm-helper-core' ),
                    ],
                    'prefix_class' => '',
                ]
            );


            $element->add_control(
                'aos_animation',
                [
                    'label' => __( 'Aos Animation', 'tm-helper-core' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'disable'                   =>'Disable',
                        'fade'                      =>'fade',
                        'fade-up'                   =>'fade-up',
                        'fade-down'                 =>'fade-down',
                        'fade-left'                 =>'fade-left',
                        'fade-right'                =>'fade-right',
                        'fade-up-right'             =>'fade-up-right',
                        'fade-up-left'              =>'fade-up-left',
                        'fade-down-right'           =>'fade-down-right' ,
                        'fade-down-left'            =>'fade-down-left',
                        'flip-up'                   =>'flip-up',
                        'flip-down'                 =>'flip-down',
                        'flip-left'                 =>'flip-left',
                        'flip-right'                =>'flip-right',
                        'slide-up'                  =>'slide-up',
                        'slide-down'                =>'slide-down',
                        'slide-left'                =>'slide-left',
                        'slide-right'               =>'slide-right',
                        'zoom-in'                   =>'zoom-in',
                        'zoom-in-up'                =>'zoom-in-up',
                        'zoom-in-down'              =>'zoom-in-down',
                        'zoom-in-left'              =>'zoom-in-left',
                        'zoom-in-right'             =>'zoom-in-right',
                        'zoom-out'                  =>'zoom-out',
                        'zoom-out-up'               =>'zoom-out-up',
                        'zoom-out-down'             =>'zoom-out-down',
                        'zoom-out-left'             =>'zoom-out-left',
                        'zoom-out-right'            =>'zoom-out-right'
                    ],
                    'default' => 'disable',
                ]
            );

            $element->add_control(
                'aos_animation_delay',
                [
                    'label' => __( 'Aos Animation Delay', 'tm-helper-core' ),
                    'type' => Controls_Manager::NUMBER,
                ]
            );


            $element->end_controls_section();
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

        public function before_render($element)
        {
            if ($element->get_settings('parallax') != 'disable') {
                $element->add_render_attribute('_wrapper', [
                    'class' => 'pp_section',
                ]);
            }


        }

	}
}

/**
 * Returns instance of TM_Helper_Core_Elements_Ext_Section
 *
 * @return object
 */
function tm_helper_core_elements_section() {
	return TM_Helper_Core_Elements_Section::get_instance();
}
