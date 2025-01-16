<?php
acf_add_local_field_group(array(
    'key'                           => 'group_page_udasdLw34134qwrqrhCx',
    'title'                         => esc_attr__('Login Page Options','teamhost'),
    'fields' => array(
        array(
            'key'                   => 'field_Zukdasdasaesage',
            'label'                 => esc_attr__('Background Image','teamhost'),
            'name'                  => 'login_page_img',
            'type'                  => 'image',
            'instructions'          => '',
            'required'              => 0,
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


    ),

    'location' => array(
        array(
            array(
                'param'                 => 'page_template',
                'operator'              => '==',
                'value'                 => 'template-login.php',
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