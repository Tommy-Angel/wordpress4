<?php

teamhost_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'site_logo',
    'label'             => esc_attr__( 'Site Logo', 'teamhost' ),
    'description'       => esc_attr__('Upload site logo.', 'teamhost' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
) );


teamhost_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'site_mobile_logo',
    'label'             => esc_attr__( 'Site Mobile menu Logo', 'teamhost' ),
    'description'       => esc_attr__('Upload mobile menu logo.', 'teamhost' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
) );



teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'logo_wth',
    'label'             => esc_attr__('Max width Logotype', 'teamhost' ),
    'description'       => esc_attr__('Site logo width in px.', 'teamhost' ),
    'section'           => 'title_tagline',
    'default'           => '30',
    'priority'          => 2,
    'output'      => array(
        array(
            'element'               => '.page-header__logo a img',
            'property'              => 'max-width',
            'suffix'                => 'px',
        ),
    ),
) );

teamhost_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'google_api_key',
    'label'             => esc_attr__( 'Apikey', 'teamhost' ),
    'description'       => esc_attr__( 'Insert Google Maps Apikey.', 'teamhost' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 3,
) );



teamhost_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'dark_theme_switcher',
    'label'             => esc_attr__( 'Dark Theme Switcher', 'teamhost' ),
    'section'           => 'title_tagline',
    'default'           => 'disable',
    'priority'          => 4,
    'multiple'          => 1,
    'choices' => array(
        'disable'              => esc_attr__('Disable','teamhost'),
        'enable'              => esc_attr__('Enable','teamhost'),
    ),
) );

teamhost_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'dark_theme_default',
    'label'             => esc_attr__( 'Light/Dark Theme Default', 'teamhost' ),
    'section'           => 'title_tagline',
    'default'           => 'light',
    'priority'          => 4,
    'multiple'          => 1,
    'choices' => array(
        'dark'              => esc_attr__('Dark','teamhost'),
        'light'              => esc_attr__('Light','teamhost'),
    ),
) );
