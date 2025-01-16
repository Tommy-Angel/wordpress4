<?php
teamhost_Options::add_panel('header_option', array(
    'title'     => esc_attr__('Heading Setting', 'teamhost'),
    'priority'  => 9,
    'icon'      => 'fa fa-header',
));
// Page Header
teamhost_Options::add_section('page_heading_setting', array(
    'title'             => esc_attr__( 'Page Heading', 'teamhost' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
teamhost_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'page_background_img',
    'label'       => esc_attr__( 'Page Heading Image', 'teamhost' ),
    'section'     => 'page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );






// Blog Archive
teamhost_Options::add_section('blog_archive_page_heading_setting', array(
    'title'             => esc_attr__( 'Blog Archive Heading', 'teamhost' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
teamhost_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'blog_archive_page_background_img',
    'label'       => esc_attr__( 'Blog Archive Heading Image', 'teamhost' ),
    'section'     => 'blog_archive_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );



if(class_exists('Youzify') && class_exists('BuddyPress')){
    // YouziFy
    teamhost_Options::add_section('youzify_login_page_heading_setting', array(
        'title'             => esc_attr__( 'Youzify Login page Heading', 'teamhost' ),
        'priority'          => 9,
        'panel'             => 'header_option',
    ));
    teamhost_Options::add_field( array(
        'type'        => 'image',
        'settings'    => 'youzify_login_page_background_img',
        'label'       => esc_attr__( 'Blog Archive Heading Image', 'teamhost' ),
        'section'     => 'youzify_login_page_heading_setting',
        'default'     => '',
        'priority'    => 1,
    ) );
}


