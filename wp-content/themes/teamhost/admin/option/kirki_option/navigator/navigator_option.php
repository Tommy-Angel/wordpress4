<?php
teamhost_Options::add_section('navigator_section', array(
    'title'         => esc_attr__('Navigation Setting', 'teamhost'),
    'priority'      => 8,
    'icon'          => 'fa fa-bars'
));



//Navigation
teamhost_Options::add_field( array(
    'type'                  => 'select',
    'settings'              => 'menu_style',
    'label'                 => esc_attr__( 'Menu Style', 'teamhost' ),
    'section'               => 'navigator_section',
    'default'               => 'style_one',
    'priority'              => 1,
    'multiple'              => 1,
    'choices'  => array(
        'style_one'                                => esc_attr__('Style Default','teamhost'),
        'style_two'                               => esc_attr__('Style Left Menu','teamhost'),
    ),
) );
teamhost_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'search_icon',
    'label'             => esc_attr__( 'Search in Header', 'teamhost' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'choices'     => [
        'enable'          => esc_html__( 'Enable', 'teamhost' ),
        'disable'         => esc_html__( 'Disable', 'teamhost' ),
    ],
    'default'           => 1,
    'active_callback' => array(
        array(
            'setting'                   => 'menu_style',
            'operator'                  => '==',
            'value'                     => 'style_two',
        ),
    ),
) );
teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_login_link',
    'label'             => esc_html__( 'Header Login Link','teamhost'),
    'section'           => 'navigator_section',
    'default'           => esc_url( ''),
    'priority'          => 10,
));
teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_notlog_text',
    'label'             => esc_html__( 'Header Not logged Login Text','teamhost'),
    'section'           => 'navigator_section',
    'default'           => __('Hi, User', 'teamhost'),
    'priority'          => 10,
));

teamhost_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'nav_user',
    'label'             => esc_attr__( 'Navigation User', 'teamhost' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'choices'     => [
        1          => esc_html__( 'Enable', 'teamhost' ),
        0          => esc_html__( 'Disable', 'teamhost' ),
    ],
    'default'           => 1,
) );

teamhost_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'language',
    'label'             => esc_attr__( 'Languages Section', 'teamhost' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'choices'     => [
        1          => esc_html__( 'Enable', 'teamhost' ),
        0          => esc_html__( 'Disable', 'teamhost' ),
    ],
    'default'           => 0,
) );


teamhost_Options::add_field( array(
    'type'              => 'repeater',
    'settings'          => 'languages',
    'label'             => esc_attr__( 'Languages', 'teamhost' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'fields'   => [
        'link_text'   => [
            'type'        => 'text',
            'label'       => esc_html__( 'Language Title', 'teamhost' ),
            'description' => esc_html__( 'Description', 'teamhost' ),
            'default'     => 'English',
        ],
        'link_url'    => [
            'type'        => 'text',
            'label'       => esc_html__( 'Language Link URL', 'teamhost' ),
            'description' => esc_html__( 'Description', 'teamhost' ),
            'default'     => '#',
        ],
        'link_id'    => [
            'type'        => 'text',
            'label'       => esc_html__( 'Language ID', 'teamhost' ),
            'description' => esc_html__( 'Id', 'teamhost' ),
            'default'     => 'en',
        ],
        'link_image' => [
            'type'              => 'image',
            'settings'          => 'lang_image',
            'label'             => esc_attr__( 'Language Image', 'teamhost' ),
            'description'       => esc_attr__('Upload Language Image.', 'teamhost' ),
            'default'           => '',
        ],
    ],
    'default'           => 1,
) );


//Typography
teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'navigation_typography',
    'label'             => esc_attr__( 'Navigation Typography', 'teamhost' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Inter',
        'font-size'                     => '13px',
        'variant'                       => '400',
        'subsets'                       => array( 'latin-ext' ),
        'text-transform'                => 'none',
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.page-header__mainmenu .uk-navbar-nav > li > a',
        ),
    ),
) );
teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Sub Menu Typography', 'teamhost' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Inter',
        'variant'                       => '400',
        'font-size'                     => '12px',
        'subsets'                       => array( 'latin-ext' ),
        'text-transform'                => 'none',
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.page-header__mainmenu .uk-navbar-nav .uk-navbar-dropdown .uk-navbar-dropdown-nav a',
        ),
    ),
) );
teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Menu Typography', 'teamhost' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Inter',
        'variant'                       => '300',
        'font-size'                     => '12px',
        'subsets'                       => array( 'latin-ext' ),
        'text-transform'                => 'none',
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.uk-offcanvas .uk-nav li>a',
        ),
    ),
) );
teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Sub Menu Typography', 'teamhost' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Inter',
        'variant'                       => '300',
        'font-size'                     => '12px',
        'text-transform'                => 'none',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.uk-offcanvas .uk-offcanvas-bar .uk-nav-default .uk-nav-sub a',
        ),
    ),
) );


//Btn
teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_btn_text',
    'label'             => esc_html__( 'Header Button Text','teamhost'),
    'section'           => 'navigator_section',
    'default'           => esc_html__( 'Sell','teamhost'),
    'priority'          => 10,
    'active_callback' => array(
        array(
            'setting'           => 'menu_style',
            'operator'          => '==',
            'value'             => 'style_two',
        ),
    ),
));
