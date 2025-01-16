<?php
teamhost_Options::add_section('woo_setting', array(
    'title'                 => esc_attr__( 'WooCommerce Archive Setting', 'teamhost' ),
    'description'           => esc_attr__( 'Setting Wooccomerce Archive Page', 'teamhost' ),
    'priority'              => 10,
    'icon'                  => 'fa fa-cart-plus'
));



teamhost_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'woo_background_img',
    'label'       => esc_attr__( 'WooCommerce ACrhive Heading Image', 'teamhost' ),
    'section'     => 'woo_setting',
    'default'     => '',
    'priority'    => 1,
) );
teamhost_Options::add_field(array(
    'type'                  => 'text',
    'settings'              => 'woo_header_pre_title',
    'label'                 => esc_attr__('WooCommerce Pre Title', 'teamhost'),
    'description'           => esc_attr__('Specify the pre title for WooCommerce Pages', 'teamhost'),
    'section'               => 'woo_setting',
    'default'               => 'Search members from all around the world!',
    'priority'              => 1,
));

teamhost_Options::add_field(array(
    'type'                  => 'text',
    'settings'              => 'woo_header_title',
    'label'                 => esc_attr__('WooCommerce Page Title', 'teamhost'),
    'description'           => esc_attr__('Specify the title for WooCommerce pages', 'teamhost'),
    'section'               => 'woo_setting',
    'default'               => 'Our Store',
    'priority'              => 1,
));

teamhost_Options::add_field(array(
    'type'                  => 'text',
    'settings'              => 'products_per_page',
    'label'                 => esc_attr__('Products per page', 'teamhost'),
    'description'           => esc_attr__('Specify the products per page count. by default it is 9', 'teamhost'),
    'section'               => 'woo_setting',
    'default'               => '9',
    'priority'              => 1,
));


