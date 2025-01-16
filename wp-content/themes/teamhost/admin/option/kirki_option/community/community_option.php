<?php
teamhost_Options::add_section('community_setting', array(
    'title'                 => esc_attr__( 'Community Settings', 'teamhost' ),
    'description'           => esc_attr__( 'Setting Community Pages', 'teamhost' ),
    'priority'              => 10,
    'icon'                  => 'fa fa-cart-plus'
));

teamhost_Options::add_field( array(
    'type'                  => 'select',
    'settings'              => 'com_group_btn',
    'label'                 => esc_attr__( 'Use a button link to the group page', 'teamhost' ),
    'section'               => 'community_setting',
    'default'               => 'enable',
    'priority'              => 1,
    'multiple'              => 1,
    'choices'   => array(
        'enable'                                => esc_attr__('Yes','teamhost'),
        'disable'                               => esc_attr__('No','teamhost'),
    ),
) );

teamhost_Options::add_field( array(
    'type'              => 'textfield',
    'settings'          => 'com_group_btn_text',
    'label'             => esc_attr__( 'Group Link text', 'teamhost' ),
    'section'           => 'community_setting',
    'default'           => esc_attr__( 'Read More', 'teamhost' ),
    'priority'          => 3,
    'active_callback' => array(
        array(
            'setting'                   => 'com_group_btn',
            'operator'                  => '==',
            'value'                     => 'enable',
        ),
    ),
) );