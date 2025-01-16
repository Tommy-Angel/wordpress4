<?php
//Custom Styles Option
function teamhost_custom_style() {
        $custom_css= '';
        // Custom CSS
        $sidebar_logo = teamhost_get_theme_mod('sidebar_logo');
        if (isset($sidebar_logo) && $sidebar_logo != ''){
            $custom_css .='.widget h2:before{background-image: url('.esc_url($sidebar_logo).');}';
            $custom_css .='.widget-title::before{background-image: url('.esc_url($sidebar_logo).');}';
            $custom_css .='.section-title span:before{background-image: url('.esc_url($sidebar_logo).');}';
            $custom_css .='#youzify .youzify-group-infos-widget .youzify-group-widget-title i:before, #youzify .youzify-sidebar .widget-content .widget-title i:before, #youzify .youzify-widget .youzify-widget-title i:before{background-image: url('.esc_url($sidebar_logo).');}';
            $custom_css .='.widget.widget_wpc_filters_widget .wpc-filters-widget-main-wrapper .wpc-filter-set-widget-title .widgettitle:before{background-image: url('.esc_url($sidebar_logo).');}';
            $custom_css .='.widget.widget_wpc_filters_widget .wpc-filters-widget-main-wrapper .wpc-filters-scroll-container .wpc-filter-price .wpc-filter-title:before, .widget.widget_wpc_filters_widget .wpc-filters-widget-main-wrapper .wpc-filters-scroll-container .wpc-filter-operating_weight .wpc-filter-title:before, .widget.widget_wpc_filters_widget .wpc-filters-widget-main-wrapper .wpc-filters-scroll-container .wpc-filter-digging_weight .wpc-filter-title:before, .widget.widget_wpc_filters_widget .wpc-filters-widget-main-wrapper .wpc-filters-scroll-container .wpc-filter-layout-range .wpc-filter-title:before, .widget.widget_wpc_filters_widget .wpc-filters-widget-main-wrapper .wpc-filters-scroll-container .wpc-filter-pickup_delivery .wpc-filter-title:before{background-image: url('.esc_url($sidebar_logo).');}';
        }

        //Youzify
        if(class_exists('Youzify') && class_exists('BuddyPress')) {
            $youzify_login_page_background_img = teamhost_get_theme_mod('youzify_login_page_background_img');
            $custom_css .= 'body.not-logged-in .youzify-membership{background-image: url('.esc_url($youzify_login_page_background_img).');background-size: cover;} ';
        }

        wp_add_inline_style( 'teamhost-general', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'teamhost_custom_style',15);


