<?php
teamhost_Options::add_section('footer_setting', array(
    'title'             => esc_attr__( 'Footer', 'teamhost' ),
    'priority'          => 11,
    'panel'             => '',
    'icon'              => 'fa fa-copyright'
));


if(class_exists('MC4WP_Container')){
    teamhost_Options::add_field( array(
        'type'              => 'select',
        'settings'          => 'footer_mailchimp',
        'label'             => esc_attr__( 'Footer Newsletter', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => 'disable',
        'priority'          => 1,
        'multiple'          => 1,
        'choices' => array(
            'disable'              => esc_attr__('Disable','teamhost'),
            'enable'             => esc_attr__('Enable','teamhost'),
        ),
    ) );
    teamhost_Options::add_field( array(
        'type'              => 'textarea',
        'settings'          => 'footer_mailchimp_title',
        'label'             => esc_attr__( 'Form Title', 'teamhost' ),
        'description'       => esc_attr__( 'Insert the Title text.', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => 'Newsletter<br> Subscription',
        'priority'          => 2,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );

    $form_args = array(
        'post_type' => 'mc4wp-form',
        'status'    => 'publish',
        'posts_per_page'            => -1,
    );
    $mc4wp_form = get_posts($form_args);
    $form_arr = array();
    $default_form = 'disable';
    foreach ($mc4wp_form as $form){
        if ($form->post_name == 'Subscribe'){
            $default_form = $form->ID;
        }
        $form_arr[$form->ID] = $form->post_name;
    }

    teamhost_Options::add_field( array(
        'type'              => 'select',
        'settings'          => 'footer_mailchimp_form',
        'label'             => esc_attr__( 'Footer Mailchimp Form', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => $default_form,
        'priority'          => 1,
        'multiple'          => 1,
        'choices' => $form_arr,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );


    teamhost_Options::add_field( array(
        'type'              => 'textarea',
        'settings'          => 'footer_download_title',
        'label'             => esc_attr__( 'Download App box Title', 'teamhost' ),
        'description'       => esc_attr__( 'Insert the Title text.', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => 'Download Our App',
        'priority'          => 2,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );
    teamhost_Options::add_field( array(
        'type'              => 'textarea',
        'settings'          => 'footer_download_text',
        'label'             => esc_attr__( 'Download App box Text', 'teamhost' ),
        'description'       => esc_attr__( 'Insert the text.', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => 'Get Apps For Faster Booking',
        'priority'          => 2,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );


    teamhost_Options::add_field( array(
        'type'              => 'textarea',
        'settings'          => 'footer_download_app_link_one',
        'label'             => esc_attr__( 'Footer Download App Link one', 'teamhost' ),
        'description'       => esc_attr__( 'Insert the link.', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => 'https://www.apple.com/ua/app-store/',
        'priority'          => 2,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );
    teamhost_Options::add_field( array(
        'type'              => 'image',
        'settings'          => 'footer_download_app_img_one',
        'label'             => esc_attr__( 'Footer Download App Logo one', 'teamhost' ),
        'description'       => esc_attr__('Upload image', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => '',
        'priority'          => 2,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );
    teamhost_Options::add_field( array(
        'type'              => 'textarea',
        'settings'          => 'footer_download_app_link_two',
        'label'             => esc_attr__( 'Footer Download App Link two', 'teamhost' ),
        'description'       => esc_attr__( 'Insert the link.', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => 'https://play.google.com/',
        'priority'          => 2,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );
    teamhost_Options::add_field( array(
        'type'              => 'image',
        'settings'          => 'footer_download_app_img_two',
        'label'             => esc_attr__( 'Footer Download App Logo two', 'teamhost' ),
        'description'       => esc_attr__('Upload image', 'teamhost' ),
        'section'           => 'footer_setting',
        'default'           => '',
        'priority'          => 2,
        'active_callback' => array(
            array(
                'setting'           => 'footer_mailchimp',
                'operator'          => '==',
                'value'             => 'enable',
            ),
        ),
    ) );
}

teamhost_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'footer_enable',
    'label'             => esc_attr__( 'Footer Enable/Disable', 'teamhost' ),
    'section'           => 'footer_setting',
    'default'           => 'enable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'disable'                   => esc_attr__('Disable','teamhost'),
        'enable'                    => esc_attr__('Enable','teamhost'),
    ),
) );




teamhost_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'footer_logo_image',
    'label'             => esc_attr__( 'Footer Logotype', 'teamhost' ),
    'description'       => esc_attr__('Upload image', 'teamhost' ),
    'section'           => 'footer_setting',
    'default'           => '',
    'priority'          => 2,
    'active_callback' => array(
        array(
            'setting'                   => 'footer_enable',
            'operator'                  => '==',
            'value'                     => 'enable',
        ),
    ),


) );
teamhost_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'footer_logo_text',
    'label'             => esc_attr__( 'Footer Logo Text', 'teamhost' ),
    'description'       => esc_attr__( 'Insert Footer Logo Text.', 'teamhost' ),
    'section'           => 'footer_setting',
    'default'           => 'Dorem ipsum dolor sit amet consec adipisicing elit sed do eiusmod por incidiut labore et loreLorem ipsum kelly amieo dolorey',
    'priority'          => 10,
    'active_callback' => array(
        array(
            'setting'                   => 'footer_enable',
            'operator'                  => '==',
            'value'                     => 'enable',
        ),
    ),
) );
teamhost_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'footer_copyrights',
    'label'             => esc_attr__( 'Copyrights', 'teamhost' ),
    'description'       => esc_attr__( 'Insert the Copyrights text.', 'teamhost' ),
    'section'           => 'footer_setting',
    'default'           => 'Copyrights © 2023 Teamhost. All rights reserved.',
    'priority'          => 10,
    'active_callback' => array(
        array(
            'setting'                   => 'footer_enable',
            'operator'                  => '==',
            'value'                     => 'enable',
        ),
    ),
) );