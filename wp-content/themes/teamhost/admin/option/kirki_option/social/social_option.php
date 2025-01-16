<?php
teamhost_Options::add_section('social_profiles', array(
    'title'             => esc_attr__( 'Footer Social Profile', 'teamhost' ),
    'priority'          => 10,
    'panel'             => '',
    'icon'              => 'fa fa-facebook'
));



teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'linkedin',
    'label'             => esc_attr__( 'Linkedin', 'teamhost' ),
    'description'       => esc_attr__( 'Your Linkedin profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '#',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'vime',
    'label'             => esc_attr__( 'Vimeo', 'teamhost' ),
    'description'       => esc_attr__( 'Your Vimeo profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'yt',
    'label'             => esc_attr__( 'YouTube', 'teamhost' ),
    'description'       => esc_attr__( 'Your YouTube profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'twi',
    'label'             => esc_attr__( 'Twitter', 'teamhost' ),
    'description'       => esc_attr__( 'Your twitter profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '#',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'fb',
    'label'             => esc_attr__( 'Facebook', 'teamhost' ),
    'description'       => esc_attr__( 'Your Facebook profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '#',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'pin',
    'label'             => esc_attr__( 'Pinterest', 'teamhost' ),
    'description'       => esc_attr__( 'Your Pinterest profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '#',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'gpl',
    'label'             => esc_attr__( 'Google Plus+', 'teamhost' ),
    'description'       => esc_attr__( 'Your Google Plus+ profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '#',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'insta',
    'label'             => esc_attr__( 'Instagram', 'teamhost' ),
    'description'       => esc_attr__( 'Your Instagram profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '#',
    'priority'          => 10,
) );

teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'beh',
    'label'             => esc_attr__( 'Behance', 'teamhost' ),
    'description'       => esc_attr__( 'Your Behance profile URL.', 'teamhost' ),
    'section'           => 'social_profiles',
    'default'           => '#',
    'priority'          => 10,
) );