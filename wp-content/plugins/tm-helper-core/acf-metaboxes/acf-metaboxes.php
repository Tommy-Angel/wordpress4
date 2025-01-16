<?php

if (!function_exists('tm_helper_get_theme_mod')) {
    function tm_helper_get_theme_mod($name = null, $use_acf = null, $postId = null, $acf_name = null)
    {
        $value = null;

        // try get value from meta box
        if ($use_acf) {
            $value = tm_helper_get_metabox($acf_name ? $acf_name : $name, $postId);
        }

        // get value from options
        if (($value === null || $value === 'default')) {
            if (class_exists('TM_Helper_Options')) {
                $value = TM_Helper_Options::get_option($name);
            }
        }

        $value = apply_filters('tm_helper_filter_get_theme_mod', $value, $name);
        return $value;
    }
}


// get metabox
if (!function_exists( 'tm_helper_get_metabox' )):
    function tm_helper_get_metabox($name = null, $postId = null)
    {
        $value = null;

        // try get value from meta box
        if (function_exists('get_field')) {
            if ($postId == null) {
                $postId = get_the_ID();
            }
            $value = get_field($name, $postId);
        }

        return $value;
    }
endif;


