<?php
teamhost_Options::add_panel('blog_panel_archive', array(
    'title'     => esc_attr__('Blog Archive Setting', 'teamhost'),
    'priority'  => 10,
    'icon'      => 'fa fa-newspaper-o'
));




//Blog Archive Post Setting
teamhost_Options::add_section('blog_archive_post_setting', array(
    'title'             => esc_attr__( 'Blog Post Setting', 'teamhost' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));
teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'archive_blog_title',
    'label'             => esc_attr__( 'Blog Archive Page Title', 'teamhost' ),
    'description'       => esc_attr__( 'Specify the title for Blog archive page', 'teamhost' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => esc_attr__( 'Latest News', 'teamhost' ),
    'priority'          => 1,
) );


teamhost_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'custom_blog_excerpt_count',
    'label'             => esc_attr__( 'Number of Words in Description', 'teamhost' ),
    'description'       => esc_attr__( 'Specify the Number of Words for Description blog per post.', 'teamhost' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => '25',
    'priority'          => 1,
) );


//Blog Archive Sidebar Setting
teamhost_Options::add_section('blog_archive_post_sidebar_setting', array(
    'title'             => esc_attr__( 'Blog Archive Setting', 'teamhost' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));

teamhost_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_archive_header',
    'label'             => esc_attr__( 'Blog Archive Header', 'teamhost' ),
    'section'           => 'blog_archive_post_sidebar_setting',
    'default'           => 'disable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'disable'              => esc_attr__('Disable','teamhost'),
        'enable'              => esc_attr__('Enable','teamhost'),
    ),
) );


teamhost_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_archive_style',
    'label'             => esc_attr__( 'Archive Style', 'teamhost' ),
    'section'           => 'blog_archive_post_sidebar_setting',
    'default'           => 'grid',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'default'              => esc_attr__('Default','teamhost'),
        'grid'             => esc_attr__('Grid','teamhost'),
    ),
) );

teamhost_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_archive_sidebar_position',
    'label'             => esc_attr__( 'Sidebar position', 'teamhost' ),
    'section'           => 'blog_archive_post_sidebar_setting',
    'default'           => 'right',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'left'              => esc_attr__('Left','teamhost'),
        'right'             => esc_attr__('Right','teamhost'),
        'disable'           => esc_attr__('Disable','teamhost'),
    ),
) );
