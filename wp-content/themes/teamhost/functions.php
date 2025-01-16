<?php
/****************************************************************
 * DO NOT DELETE
 ****************************************************************/

// include system functions
if (!isset($content_width)) $content_width = 1140;



/****************************************************************
 * Define Constants
 ****************************************************************/

define("teamhost_THEME_URL", get_template_directory_uri());

/****************************************************************
 * Require Needed Files & Libraries
 ****************************************************************/
/**
 * Admin References & CSS and JS files register
 */
require  get_template_directory() .'/admin/admin.php';
/**
 * General
 */
require get_template_directory() .'/admin/etc/general.php';


/**
 * Register Sidebar
 */
require get_template_directory() .'/admin/option/sidebar.php';
/**
 * Load More
 */
require get_template_directory() .'/admin/etc/load_more_function.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() .'/admin/inc/extras.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() .'/admin/inc/jetpack.php';
/**
 * Comments walker
 */
require get_template_directory() .'/admin/inc/comments-walker.php';
/**
 * Mega Menu
 */
require get_template_directory() .'/admin/menu/menu.php';





include_once(get_template_directory() . '/admin/option/activation.php');


if(teamhost_check_is_activated()) {
    /**
     * TGM Plugin
     */
    require get_template_directory() . '/admin/tgm/class-tgm-plugin-activation.php';
}


require get_template_directory() .'/admin/theme-dashboard/dashboard.php';
if(class_exists('WooCommerce')) {
    /**
     * Woocommerce register plugin
     */
    require get_template_directory() . '/admin/function/woocommerce.php';
}
/**
 * Custom Css Option
 */
require get_template_directory() .'/admin/etc/custom_css_option.php';




