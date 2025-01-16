<?php
if ( function_exists('register_sidebar') ) {
   $sidebar_logo='';
   $logotype_sidebar = teamhost_get_theme_mod('site_sidebar_logo');

   if($logotype_sidebar !=''){
      $sidebar_logo = '<img src="'.teamhost_get_theme_mod('site_sidebar_logo').'" class="sidebar-logotype" alt="'.esc_attr__('Sidebar Logo','teamhost').'">';
   }

    register_sidebar(array(
        'name'              => 'Main Sidebar',
        'id'                => 'main-sidebar',
        'description'       => 'Appears as the left sidebar on pages',
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
        'after_title'       => '</h5>',
    ));

    register_sidebar(array(
        'name'              => 'News Sidebar',
        'id'                => 'news-sidebar',
        'description'       => 'Appears as the left sidebar on Blog pages',
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
        'after_title'       => '</h5>',
    ));


    register_sidebar(array(
        'name'              => 'News Sidebar Single Left',
        'id'                => 'sidebar-single-left',
        'description'       => 'Appears as the left sidebar on Single Post pages',
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
        'after_title'       => '</h5>',
    ));

    register_sidebar(array(
        'name'              => 'News Sidebar Stream Left',
        'id'                => 'sidebar-stream-left',
        'description'       => 'Appears as the left sidebar on Single Stream pages',
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
        'after_title'       => '</h5>',
    ));

    register_sidebar(array(
        'name'              => 'News Sidebar Single Right',
        'id'                => 'sidebar-single-right',
        'description'       => 'Appears as the left sidebar on Single Post pages',
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
        'after_title'       => '</h5>',
    ));

    if ( class_exists('WooCommerce')) {

        register_sidebar(array(
            'name'              => 'WooCommerce Archive Search',
            'id'                => 'woo-sidebar-search',
            'description'       => 'Appears as the right sidebar on WooCommerce Products Search archive page',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
            'after_title'       => '</h5>',
        ));

        register_sidebar(array(
            'name'              => 'WooCommerce Archive Sidebar',
            'id'                => 'woo-sidebar',
            'description'       => 'Appears as the right sidebar on WooCommerce Products archive page',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
            'after_title'       => '</h5>',
        ));

    }



    if ( class_exists('TM_Helper_Core_Addons')) {

        register_sidebar(array(
            'name'              => 'Single Stream Sidebar Right',
            'id'                => 'sidebar-stream-right',
            'description'       => 'Appears as the right sidebar on Single Stream pages',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
            'after_title'       => '</h5>',
        ));

    }

    //if ( class_exists('TM_Helper_Core_Addons')) {

        // Left Menu Sidebar
        register_sidebar(array(
            'name' => 'Left Menu Sidebar First',
            'id' => 'leftmenu-sidebar-1',
            'description' => 'Appears as the sidebar on Left Menu.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<i class="uk-nav-devider"></i><h5 class="widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Left Menu Sidebar Second',
            'id' => 'leftmenu-sidebar-2',
            'description' => 'Appears as the sidebar on Left Menu.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<i class="uk-nav-devider"></i><h5 class="widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Left Menu Sidebar Third',
            'id' => 'leftmenu-sidebar-3',
            'description' => 'Appears as the sidebar on Left Menu.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<i class="uk-nav-devider"></i><h5 class="widget--title">',
            'after_title' => '</h5>',
        ));





        // Footer Sidebar
        register_sidebar(array(
            'name' => 'Footer Sidebar First Column',
            'id' => 'footer-sidebar-1',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Footer Sidebar Second Column',
            'id' => 'footer-sidebar-2',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Footer Sidebar Third Column',
            'id' => 'footer-sidebar-3',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));


    //}

}




function teamhost_categories_post_count_filter ($variable) {
    $variable = str_replace('(', '<span class="fl-categories-post-count fl-font-style-regular">', $variable);
    $variable = str_replace(')', '</span>', $variable);
    return $variable;
}



function teamhost_archive_post_count_filter ($variable) {
    $variable = str_replace ('(', '<span class="fl-archive-post-count fl-font-style-regular">', $variable);
    $variable = str_replace (')', '</span>', $variable);
    return $variable;
}



add_filter ('get_archives_link', 'teamhost_archive_post_count_filter');
add_filter('wp_list_categories','teamhost_categories_post_count_filter');





/**
 * Register Theme Widgets
 */
function teamhost_init_widgets() {

}

add_action('widgets_init', 'teamhost_init_widgets');


