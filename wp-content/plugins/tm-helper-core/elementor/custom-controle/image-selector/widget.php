<?php

namespace ElementorWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor Custom Widget Test
 */
class Custom_Widget extends Widget_Base {

	public function get_name() {
		return 'test_addon';
	}

	public function get_title() {
		return __('Test Box', 'text-domain');
	}

	public function get_categories() {
		return ['general'];
	}

	/**
	 * Register the widget controls.
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'page_layout_section',
			[
				'label' => __('Page Layout', 'text-domain'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Image selector
		$this->add_control(
			'page_layout',
			[
				'label' => esc_html__('Layout', 'text-domain'),
				'type' => \Elementor\CustomControl\ImageSelector_Control::ImageSelector,
				'options' => [
					'left-sidebar' => [
						'title' => esc_html__('Left', 'text-domain'),
						'url' => 'http://localhost/test/wp-content/themes/test/assets/images/left-sidebar.png',
					],
					'right-sidebar' => [
						'title' => esc_html__('Right', 'text-domain'),
						'url' => 'http://localhost/test/wp-content/themes/test/assets/images/right-sidebar.png',
					],
					'no-sidebar' => [
						'title' => esc_html__('No Sidebar', 'text-domain'),
						'url' => 'http://localhost/test/wp-content/themes/test/assets/images/no-sidebar.png',
					],
				],
				'default' => 'right-sidebar',
			]
		);
		$this->end_controls_section();

	}
}