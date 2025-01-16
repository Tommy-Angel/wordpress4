<?php
/*
 * Add custom spacing (margin and padding) controls to Elementor's Column_Element and Section_Element
 * This hook means "run this function before you add the control section named 'section_advanced' on 
 * the element 'column' or 'section'.
 */
add_action( 'elementor/element/column/section_advanced/before_section_start', 'add_custom_spacing_controls' ); 

/**
 * Callback for the above action hook, is passed the instance of an Elementor Element
 * (which extends \Elementor\Element_Base) for whose section you
 * want to add additional controls.
 */
function add_custom_spacing_controls( \Elementor\Element_Base $element) {
	// Create our own custom control section
	$element->start_controls_section(
		'section_spacing',
		[
			'label' => __( 'Sticky Column', 'tm-helper-core' ),
			// Place our section in the Style Tab
			'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
		]
	);

	/*
	 * Since there must be at least one item of a Repeater control (you can't delete the last 
	 * item according to how the Elementor UI is set up), this control allows you to say that 
	 * you don't want the Sectino or Column to have any spacing properties.
	 */
	$element->add_control(
		'spacing_items_override',
		[
			'label' => __( 'Enable Sticky', 'tm-helper-core' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
			'description' => __( 'Check for Enable Sticky Sidebar.', 'tm-helper-core' ),
			'label_on' => '',
			'label_off' => '',
			'return_value' => 'yes',
        ]
	);


    $element->add_control(
        'mld_spacing_items',
        [
            'label' => __( 'Spacing Items', 'mld' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default' => '',
            'fields' => [
                [
                    'name' => 'property',
                    'label' => __( 'Property', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'margin',
                    'options' => [
                        'margin'  => __( 'Margin', 'mld' ),
                        'padding'  => __( 'Padding', 'mld' ),
                    ],
                ],
                [
                    'name' => 'direction',
                    'label' => __( 'Direction', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'bottom',
                    'options' => [
                        'top'  => __( 'Top', 'mld' ),
                        'bottom'  => __( 'Bottom', 'mld' ),
                    ],
                ],
                [
                    'name' => 'heading_level',
                    'label' => __( 'Heading Level', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'h2',
                    'options' => [
                        'h1'  => __( 'H1', 'mld' ),
                        'h2'  => __( 'H2', 'mld' ),
                        'h3'  => __( 'H3', 'mld' ),
                        'h4'  => __( 'H4', 'mld' ),
                    ],
                ],
                [
                    'label' => __( 'Zero Spacing on Checked Screen Sizes', 'mld' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ],
                [
                    'name' => 'zero_xs',
                    'label' => __( 'XS Screens (575px and below)', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => '',
                    'label_off' => '',
                    'return_value' => 'yes',
                ],
                [
                    'name' => 'zero_sm',
                    'label' => __( 'SM Screens (576 - 767px)', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => '',
                    'label_off' => '',
                    'return_value' => 'yes',
                ],
                [
                    'name' => 'zero_md',
                    'label' => __( 'MD Screens (768 - 991px)', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => '',
                    'label_off' => '',
                    'return_value' => 'yes',
                ],
                [
                    'name' => 'zero_lg',
                    'label' => __( 'LG Screens (992 - 1199px)', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => '',
                    'label_off' => '',
                    'return_value' => 'yes',
                ],
                [
                    'name' => 'zero_xl',
                    'label' => __( 'XL Screens (1200px and up)', 'mld' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'label_on' => '',
                    'label_off' => '',
                    'return_value' => 'yes',
                ],
            ],
            /*
             * When the repeater field is collapsed, show the class that will be applied to the section
             * or column element, which is essentially a concatenation of all the different subfields
             * of the repeater field.
             */
            'title_field' => '{{{ property + "-" + direction + "-" + heading_level }}}',
        ]
    );


	// Add a Repeater control, which allows us to add any number of vertical
	// spacing classes that we want to each element

	$element->end_controls_section();
};