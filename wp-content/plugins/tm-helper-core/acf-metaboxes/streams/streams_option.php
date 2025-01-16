<?php
if( function_exists('acf_add_local_field_group') ):
    //Related
    acf_add_local_field_group(array(
        'key' => 'group_6123425dasww34424asjdn98',
        'title' => 'Link to Stream',
        'fields' => array(
            array(
                'key' => 'field_601b481sdasdasdd60c42',
                'label' => esc_attr__('YouTube/Twitch','teamhost'),
                'name' => 'stream_type',
                'type' => 'select',
                'instructions' => esc_attr__('Select whstream type','teamhost'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'twitch' => esc_attr__('Twitch','teamhost'),
                    'youtube' => esc_attr__('Youtube','teamhost'),
                ),
                'default_value' => array(
                    'twitch'
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_63525d3de135s2a96',
                'label' => __('Twitch Account', 'tm-helper-core'),
                'name' => 'twitch_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'conditional_logic' => array (
                    array (
                        'field'                             => 'field_601b481sdasdasdd60c42',
                        'operator'                          => '==',
                        'value'                             => 'twitch',
                    ),
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),

            array(
                'key' => 'field_601b6481vvasdasddsv74dasdadasdd60c42',
                'label' => esc_attr__('WWW','teamhost'),
                'name' => 'stream_www',
                'type' => 'select',
                'instructions' => esc_attr__('Select WWW type(change if twitch doesn"t work)','teamhost'),
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'enable' => esc_attr__('Enable','teamhost'),
                    'disable' => esc_attr__('Disable','teamhost'),
                ),
                'conditional_logic' => array (
                    array (
                        'field'                             => 'field_601b481sdasdasdd60c42',
                        'operator'                          => '==',
                        'value'                             => 'twitch',
                    ),
                ),
                'default_value' =>'disable',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),

            array(
                'key' => 'field_63525dffsaedasdasd6',
                'label' => __('Link to Youtube Stream', 'tm-helper-core'),
                'name' => 'youtube_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'conditional_logic' => array (
                    array (
                        'field'                             => 'field_601b481sdasdasdd60c42',
                        'operator'                          => '==',
                        'value'                             => 'youtube',
                    ),
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_63525dasd3333asd6',
                'label' => __('Youtube Account', 'tm-helper-core'),
                'name' => 'youtube_acc',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'conditional_logic' => array (
                    array (
                        'field'                             => 'field_601b481sdasdasdd60c42',
                        'operator'                          => '==',
                        'value'                             => 'youtube',
                    ),
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'streams',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
endif;
?>