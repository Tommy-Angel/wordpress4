<?php
if( function_exists('acf_add_local_field_group') ):
    // Gallery Function
    acf_add_local_field_group(array(
        'key' => 'group_5d0esasas1d8',
        'title' => esc_attr__('Product Meta','teamhost'),
        'fields' => array(
            array(
                'key' => 'field_6353rrasrsas15566556aaf799',
                'label' => 'Release Date',
                'name' => 'game_release_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'F j, Y',
                'return_format' => 'F j, Y',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_63caasas3423423sc17bb7d3fb',
                'label' => 'Developer',
                'name' => 'game_developer',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),



            array(
                'key' => 'field_63d63768cbdd0',
                'label' => 'Videos to Gallery',
                'name' => 'gallery',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_63d637f7cbdd3',
                        'label' => 'Youtube Video url',
                        'placeholder' => 'https://youtu.be/hlfTtiyiSqU',
                        'name' => 'video',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_63d63781cbdd1',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'width' => '',
                        'height' => '',
                    ),
                ),
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
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


    acf_add_local_field_group(array(
        'key' => 'group_5d0esassdsfdfsdfas1d8',
        'title' => esc_attr__('Category Meta','teamhost'),
        'fields' => array(
            array(
                'key' => 'field_6asfasfasfasfsd17bb7d3fb',
                'label' => 'Category Description',
                'name' => 'desc_cat',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
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
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'product_cat',
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