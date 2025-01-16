<?php
/*------------------------------------------------------------------

            Preloader

-------------------------------------------------------------------*/
teamhost_Options::add_section('page_preloader', array(
    'title'          => esc_attr__( 'Page Preloader', 'teamhost' ),
    'description'    => esc_attr__( 'Page Preloader Seating', 'teamhost' ),
    'priority'       => 9,
    'panel'          => '',
    'icon'           => 'fa fa-spinner'
));


teamhost_Options::add_field( array(
    'type'          => 'toggle',
    'settings'      => 'preloader_page_show',
    'label'         => esc_attr__('Site Preloader', 'teamhost'),
    'section'       => 'page_preloader',
    'default'       => 'off',
    'priority'      => 199,
));





teamhost_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'site_preloader_body_style',
    'label'         => esc_attr__('Body Preloader color', 'teamhost'),
    'section'       => 'page_preloader',
    'default'       => '#fff',
    'priority'      => 201,
    'multiple'      => 0,
    'active_callback' => array(
        array(
            'setting'               => 'preloader_page_show',
            'operator'              => '==',
            'value'                 => true,
        ),
    ),
    'output' => array(
        array(
            'element'               => '#fl-page--preloader .fl-top-background-preloader,#fl-page--preloader .fl-bottom-background-preloader',
            'property'              => 'background-color',
        ),
    ),
));


teamhost_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'site_preloader_progress_bg',
    'label'         => esc_attr__('Preloader progress Background Color', 'teamhost'),
    'section'       => 'page_preloader',
    'default'       => '#F46119',
    'priority'      => 201,
    'multiple'      => 0,
    'active_callback' => array(
        array(
            'setting'               => 'preloader_page_show',
            'operator'              => '==',
            'value'                 => true,
        ),
    ),
    'output' => array(
        array(
            'element'               => '#fl-page--preloader .fl-top-progress .fl-loader_left, #fl-page--preloader .fl-top-progress .fl-loader_right,#fl-page--preloader .fl--preloader-progress-bar span',
            'property'              => 'background-color',
            'suffix'                => '!important',
        ),
    ),
));