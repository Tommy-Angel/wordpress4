<?php
acf_add_local_field_group(array(
    'key'                           => 'group_page_upvGGSaL4ghCx',
    'title'                         => esc_attr__('Page Options','teamhost'),
    'fields' => array(

        /*-------------------------------------------------------------------
       ==  Navigator
       -------------------------------------------------------------------*/

        array(
            'key'                   => 'field_yg2ktml7hy9wv',
            'label'                 => '<span class="dashicons dashicons-menu"></span> Navigator',
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_wkbraxkhlfi29cpage',
            'label'                 => 'Navigator Style',
            'name'                  => 'page_navigator',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'default'                           => esc_attr__('Default Navigator','teamhost'),
                'custom'                            => esc_attr__('Custom Navigator Style','teamhost'),
            ),
            'default_value'         => array(),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_wkddas3er42i29cp32age',
            'label'                 => 'Menu Style',
            'name'                  => 'menu_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_wkbraxkhlfi29cpage',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'disable'                           => esc_attr__('Disable','teamhost'),
                'style_one'                           => esc_attr__('Style One','teamhost'),
                'style_two'                            => esc_attr__('Style Two','teamhost'),
            ),
            'default_value'         => array(),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',

        ),

        /*-------------------------------------------------------------------
        ==  Header
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_ksJukLyKEZuUz',
            'label'                 => '<i class="fa fa-header" aria-hidden="true"></i> '.esc_attr__('Header','teamhost'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'         => '',
                'class'         => '',
                'id'            => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_vvPA09dYwcmHM',
            'label'                 => esc_attr__('Custom','teamhost'),
            'name'                  => 'page_header_custom_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'standard'                                 => esc_attr__('Default Header','teamhost'),
                'custom'                                   => esc_attr__('Custom Header','teamhost'),
            ),
            'default_value' => array(
                0                                       => 'false',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_YepuwtJZo8j7Gcpage',
            'label'                 => esc_attr__('Custom Header','teamhost'),
            'name'                  => 'page_header',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_vvPA09dYwcmHM',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'custom'                                => esc_attr__('Enable Header','teamhost'),
                'disable'                               => esc_attr__('Disable Header','teamhost'),
            ),
            'default_value'         => array(),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        array(
            'key'                   => 'field_wtUSajd9AIV0v',
            'label'                 => esc_attr__('Title Header Enable Disable Function','teamhost'),
            'name'                  => 'page_header_title_enable_function',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'disable'                                 => esc_attr__('Disable','teamhost'),
                'enable'                                  => esc_attr__('Enable','teamhost'),
            ),
            'default_value' => array(
                0                                       => 'enable',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_JzIMUeRq6lN2b',
            'label'                 => esc_attr__('Custom Title','teamhost'),
            'name'                  => 'page_custom_title',
            'type'                  => 'textarea',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_wtUSajd9AIV0v',
                        'operator'                               => '==',
                        'value'                                  => 'enable',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices'               => array(),
            'default_value'         => '',
            'layout'                => 'vertical',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_Zukae6WF0AoBjpage',
            'label'                 => esc_attr__('Background Image','teamhost'),
            'name'                  => 'page_header_img',
            'type'                  => 'image',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'return_format'         => 'url',
            'preview_size'          => 'full',
            'library'               => 'all',
            'min_width'             => '',
            'min_height'            => '',
            'min_size'              => '',
            'max_width'             => '',
            'max_height'            => '',
            'max_size'              => '',
            'mime_types'            => '',
        ),






        /*-------------------------------------------------------------------
        ==  Footer
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_ksJukLydasdsdaUz',
            'label'                 => '<i class="fa fa-footer" aria-hidden="true"></i> '.esc_attr__('Footer','teamhost'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'         => '',
                'class'         => '',
                'id'            => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_vvPA09dadet24mHM',
            'label'                 => esc_attr__('Custom','teamhost'),
            'name'                  => 'page_footer_custom_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'standard'                                 => esc_attr__('Default Footer','teamhost'),
                'custom'                                   => esc_attr__('Custom Footer','teamhost'),
            ),
            'default_value' => array(
                0                                       => 'false',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_YepuwtfaJZ35f2322page',
            'label'                 => esc_attr__('Custom Footer','teamhost'),
            'name'                  => 'page_footer_enable',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_vvPA09dadet24mHM',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'enable'                                => esc_attr__('Enable Footer','teamhost'),
                'disable'                               => esc_attr__('Disable Footer','teamhost'),
            ),
            'default_value'         => array(),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

    ),

    'location' => array(
        array(
            array(
                'param'                 => 'page_template',
                'operator'              => '==',
                'value'                 => 'default',
            ),
        ),
        array(
            array(
                'param'                 => 'post_template',
                'operator'              => '==',
                'value'                 => 'template-blog.php',
            ),
        ),
    ),
    'menu_order'                    => 0,
    'position'                      => 'normal',
    'style'                         => 'default',
    'label_placement'               => 'top',
    'instruction_placement'         => 'label',
    'hide_on_screen'                => '',
    'active'                        => true,
    'description'                   => '',
));