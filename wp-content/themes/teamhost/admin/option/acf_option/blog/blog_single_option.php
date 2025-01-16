<?php
acf_add_local_field_group(array(
    'key'                           => 'group_page_6y12l25e0958f',
    'title'                         => esc_attr__('Page Options','teamhost'),
    'fields' => array(

        /*-------------------------------------------------------------------
            ==  Navigator
            -------------------------------------------------------------------*/

        array(
            'key'                   => 'field_yg2kaasdml7hy9wv',
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
            'key'                   => 'field_wkbraxkhlfieewt29cpage',
            'label'                 => 'Navigator Style',
            'name'                  => 'post_navigator',
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
            'key'                   => 'field_wkddas3er4dasda2i29cp32age',
            'label'                 => 'Menu Style',
            'name'                  => 'post_menu_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_wkbraxkhlfieewt29cpage',
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
            'key'                   => 'field_4oN1Ql1Z0ATq27',
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
            'key'                   => 'field_j5u8G8Nc3fXERQ',
            'label'                 => esc_attr__( 'Custom','teamhost'),
            'name'                  => 'post_single_header_custom_style',
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
            'key'                   => 'field_x9sSoBmIcXWc4t',
            'label'                 => esc_attr__('Custom Header','teamhost'),
            'name'                  => 'post_single_header',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_j5u8G8Nc3fXERQ',
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
            'key'                   => 'field_PManUGGkk90IR2',
            'label'                 => esc_attr__('Pre title','teamhost'),
            'name'                  => 'post_single_header_pre_title',
            'type'                  => 'text',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
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
            'choices'               => array(),
            'default_value'         => '',
            'layout'                => 'vertical',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_IhWu6ZNhWQ3CpO',
            'label'                 => esc_attr__('Title Header Enable Disable Function','teamhost'),
            'name'                  => 'post_single_header_title_enable_function',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
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
            'key'                   => 'field_9ankMuIoW7UwKN',
            'label'                 => esc_attr__('Custom Title','teamhost'),
            'name'                  => 'post_single_custom_title',
            'type'                  => 'textarea',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_IhWu6ZNhWQ3CpO',
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
            'key'                   => 'field_72NexDs7qVPdOL',
            'label'                 => esc_attr__('Background Image','teamhost'),
            'name'                  => 'post_single_header_img',
            'type'                  => 'image',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_j5u8G8Nc3fXERQ',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_x9sSoBmIcXWc4t',
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
         ==  Sidebar
         -------------------------------------------------------------------*/
        array(
            'key'               => 'field_gqHqBZmS3S9etp',
            'label'             => '<i class="fa fa-indent" aria-hidden="true"></i> '.esc_attr__('Sidebar','teamhost'),
            'name'              => '',
            'type'              => 'tab',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'placement'         => 'left',
            'endpoint'          => 0,
        ),
        array(
            'key'               => 'field_iiuctzk7linzucpage',
            'label'             => esc_attr__('Sidebar Position','teamhost'),
            'name'              => 'post_sidebar_position',
            'type'              => 'button_group',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                               => 'field_q9s0pym4uxknr',
                        'operator'                            => '==',
                        'value'                               => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'no'                                => esc_attr__('No Sidebar','teamhost'),
                'left'                              => esc_attr__('Left Sidebar','teamhost'),
                'right'                             => esc_attr__('Right Sidebar','teamhost'),
            ),
            'default_value' => array(
                0                                   => 'no',
            ),
            'layout'            => 'horizontal',
            'toggle'            => 0,
            'return_format'     => 'value',
        ),


        /*-------------------------------------------------------------------
        ==  Footer
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_ksJukL4234yssdsdaUz',
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
            'key'                   => 'field_vvPA0sadwt24mHM',
            'label'                 => esc_attr__('Custom','teamhost'),
            'name'                  => 'post_footer_custom_style',
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
            'key'                   => 'field_YvvaJZ3aapage',
            'label'                 => esc_attr__('Custom Footer','teamhost'),
            'name'                  => 'post_footer_enable',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_vvPA0sadwt24mHM',
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
                'param'                                     => 'post_type',
                'operator'                                  => '==',
                'value'                                     => 'post',
            ),
        ),
    ),
    'menu_order'                => 0,
    'position'                  => 'normal',
    'style'                     => 'default',
    'label_placement'           => 'top',
    'instruction_placement'     => 'label',
    'hide_on_screen'            => '',
    'active'                    => 1,
    'description'               => '',
));




/*-------------------------------------------------------------------
==  POST TYPE = Start POST FORMATE LINK
-------------------------------------------------------------------*/
acf_add_local_field_group(array(
    'key' => 'group_57fb5ae192bb4',
    'title' => 'Link Content',
    'fields' => array(
        array(
            'key'                   => 'field_sThfZiQfigIYL',
            'label'                 =>  esc_attr__('Link','teamhost'),
            'name'                  => 'link_format',
            'type'                  => 'link',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'         => '',
                'class'         => '',
                'id'            => '',
            ),
            'default_value'         => '',
            'placeholder'           => '',
            'prepend'               => '',
            'append'                => '',
            'maxlength'             => '',
        ),

    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
            array(
                'param' => 'post_format',
                'operator' => '==',
                'value' => 'link',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));
/*-------------------------------------------------------------------
==  POST TYPE = Start POST FORMATE GALERRY
-------------------------------------------------------------------*/
acf_add_local_field_group(array(
    'key'           => 'group_57fb5339af84asd1',
    'title'         => 'Gallery Content Slider',
    'fields' => array(
        array(
            'key'               => 'field_57fb5354ce8fasde',
            'label'             => esc_attr__('Images','teamhost'),
            'name'              => 'post_gallery_images',
            'type'              => 'gallery',
            'instructions'      => esc_attr__('Add two or more photos','teamhost'),
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width'             => '',
                'class'             => '',
                'id'                => '',
            ),
            'min'               => 0,
            'max'               => '',
            'insert'            => 'append',
            'library'           => 'all',
            'min_width'         => '',
            'min_height'        => '',
            'min_size'          => '',
            'max_width'         => '',
            'max_height'        => '',
            'max_size'          => '',
            'mime_types'        => '',
        ),

    ),
    'location' => array(
        array(
            array(
                'param'         => 'post_type',
                'operator'      => '==',
                'value'         => 'post',
            ),
            array(
                'param'         => 'post_format',
                'operator'      => '==',
                'value'         => 'gallery',
            ),
        ),
    ),
    'menu_order'                => 0,
    'position'                  => 'acf_after_title',
    'style'                     => 'default',
    'label_placement'           => 'top',
    'instruction_placement'     => 'label',
    'hide_on_screen'            => '',
    'active'                    => 1,
    'description'               => '',
));
/*-------------------------------------------------------------------
==  POST TYPE = POST FORMATE Video
-------------------------------------------------------------------*/
acf_add_local_field_group(array(
    'key' => 'group_57f7a57b1a6b1',
    'title' => 'Video Content',
    'fields' => array(
        array(
            'key' => 'field_57f7a6039be07',
            'label' => esc_attr__('Video Link','teamhost'),
            'name' => 'content_post_video',
            'type' => 'url',
            'instructions' => esc_attr__('Supported YouTube and Vimeo links','teamhost'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
            array(
                'param' => 'post_format',
                'operator' => '==',
                'value' => 'video',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));