<?php

/**
 * Class description
 *
 * @author    TM
 * @license   GPL-2.0+
 */
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

if ( ! class_exists( 'TM_Helper_Core_Default_Item_Option' ) ) {

	/**
	 * Define TM_Helper_Core_Elements_Ext_Section class
	 */
	class TM_Helper_Core_Default_Item_Option {

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

            add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls'], 10);
            add_action('elementor/widget/before_render_content', array($this, 'before_render'));

		}


		public function register_controls( $element ) {

            $element->start_controls_section(
                'section_custom_animation',
                [
                    'label' => esc_html__( 'Aos Animation', 'tm-helper-core' ),
                    'tab'   => Elementor\Controls_Manager::TAB_ADVANCED,
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


        public function before_render($element)
        {

            if ($element->get_settings('aos_animation') != 'disable') {
                $element->add_render_attribute('_wrapper', [
                    'data-aos' => $element->get_settings('aos_animation'),
                    'class' => 'aos-init',
                ]);
            }
            if ($element->get_settings('aos_animation') != 'disable' && $element->get_settings('aos_animation_delay') != '') {
                $element->add_render_attribute('_wrapper', [
                    'data-aos-delay' => $element->get_settings('aos_animation_delay'),
                ]);
            }


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
	}
}

/**
 * Returns instance of TM_Helper_Core_Default_Item_Option
 *
 * @return object
 */
function tm_helper_core_default_item_option() {
	return TM_Helper_Core_Default_Item_Option::get_instance();
}
