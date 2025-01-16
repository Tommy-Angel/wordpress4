<?php
if( function_exists('acf_add_local_field_group') ):
    //Related
    acf_add_local_field_group(array(
        'key' => 'post_etwewef23ere5adasdasd8',
        'title' => 'Feature Image for Elementor widgets',
        'fields' => array(
            array(
                'key'                   => 'field_72Ne323fefed2344OL',
                'label'                 => esc_attr__('Image','teamhost'),
                'name'                  => 'post_single_el_img',
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
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
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



if( function_exists('acf_add_local_field_group') ):
    //Related
    acf_add_local_field_group(array(
        'key' => 'post_etwffasasewefdabbbbbbbbffadaffsdasd8',
        'title' => 'Taxonomy Icon',
        'fields' => array(
            array(
                'key' => 'field_6048bba4bgbgb5dff0995asdasdf',
                'label' => 'Icon for Listing Page',
                'name' => 'cat_icon',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'all',
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