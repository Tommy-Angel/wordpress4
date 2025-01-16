<?php
/**
 * Register Required Plugins
 */
add_action( 'tgmpa_register', 'teamhost_register_required_plugins' );
if ( ! function_exists( 'teamhost_register_required_plugins' ) ) :
    function teamhost_register_required_plugins() {

        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $str_plugin_url = 'http://support.templines.com/plugins-load/';

        if(function_exists('teamhost_theme_code_info')){
            $theme_code = teamhost_theme_code_info();
            $get_params = array(
                'edd_action'        => 'plugins_activation',
                'license_key'       => $theme_code['envato_code'],
                'theme'             => $theme_code['theme'],
                'theme_id'          => $theme_code['theme_id'],
                'url'               => esc_url(home_url())
            );
            $str_get_params = '';
            if(!empty($theme_code['envato_code']) && !empty($theme_code['theme_id']) && !empty($theme_code['theme']) ){
                $str_get_params = '?' . http_build_query($get_params);
            }
            $str_plugin_url .= $str_get_params;

        }


        $plugins = array(
            // Kirki
            array(
                'name'                  => 'Kirki',
                'slug'                  => 'kirki',
                'required'              => true,
            ),

            // Demo Import
            array(
                'name'                  => 'One Click Demo Import',
                'slug'                  => 'one-click-demo-import',
                'required'              => false,
            ),

            // Mail Chimp
            array(
                'name'                  => 'Mailchimp for Wordpress',
                'slug'                  => 'mailchimp-for-wp',
                'required'              => false,
            ),

            // Contact Form 7
            array(
                'name'                  => 'Contact Form 7',
                'slug'                  => 'contact-form-7',
                'required'              => false,
            ),

            // WooCommerce
            array(
                'name'                  => 'WooCommerce',
                'slug'                  => 'woocommerce',
                'required'              => true,
            ),
            
            
            array(
                'name'                  => 'Dokan',
                'slug'                  => 'dokan-lite',
                'required'              => true,
            ),

            // WooCommerce Ajax Filters
            array(
                'name'                  => 'Woocommerce Ajax Filters',
                'slug'                  => 'woocommerce-ajax-filters',
                'required'              => true,
            ),
            
            
             array(
                'name'                  => 'GamiPress',
                'slug'                  => 'gamipress',
                'required'              => true,
            ),
            
            

            array(
                'name'                  => 'Woo product filter',
                'slug'                  => 'woo-product-filter',
                'required'              => true,
            ),

            // yith-woocommerce-wishlist
            array(
                'name'                  => 'Yith Woocommerce wishlist',
                'slug'                  => 'yith-woocommerce-wishlist',
                'required'              => true,
            ),

        
            // Theme plugin from our library
            // ACF PRO Plugin
            array(
                'name'                  => 'Advanced Custom Fields',
                'slug'                  => 'advanced-custom-fields',
                'required'              => true,
                'source'                => 'http://assets.templines.com/plugins/advanced-custom-fields-pro.zip',
            ),
            // BuddyPress
            array(
                'name'                  => 'BuddyPress',
                'slug'                  => 'buddypress',
                'required'              => true,
            ),
            
            
                     array(
                'name'                  => 'Better Messages',
                'slug'                  => 'bp-better-messages',
                'required'              => true,
            ),
            
            
             array(
                'name'                  => 'DocsPress – Online Documentation',
                'slug'                  => 'docspress',
                'required'              => true,
            ),
            
            
             

            // Elementor
            array(
                'name'                  => 'Elementor',
                'slug'                  => 'elementor',
                'required'              => true,
            ),


            // Youzify
            array(
                'name'                  => 'Youzify',
                'slug'                  => 'youzify',
                'required'              => true,
                'source'                => 'https://assets.templines.com/plugins/youzify.zip',
            ),

            // Twitch to WordPress
            array(
                'name'                  => 'Twitch to WordPress',
                'slug'                  => 'tomparisde-twitchtv-widget',
                'required'              => true,
                'source'                => 'https://assets.templines.com/plugins/tomparisde-twitchtv-widget.zip',
            ),

                // Rev Slider Plugin
                array(
                'name' => 'Slider Revolution',
                'slug' => 'revslider',
                'required' => false,
                'source' => 'http://assets.templines.com/plugins/revslider.zip',
                ),
       
            array(
            'name' => 'TM Helper Core',
            'slug' => 'tm-helper-core',
            'required' => true,
            'source' => 'https://assets.templines.com/plugins/theme/teamhost/G4iqbFDe%25HUqlLplq3sF%26G4iqbFDe%25HUqlLplq3sF%2695ZBdY%40BVTgyO%40fl95ZBdY%40BVTgyO%40fl/tm-helper-core.zip', // The plugin source

            ),

        );



        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '', // Default absolute path to pre-packaged plugins.
            'has_notices' => true, // Show admin notices or not.
            'dismissable' => true, // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false, // Automatically activate plugins after installation or not.
            'message' => '', // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
endif;



// Revolution Slider as theme
if(function_exists( 'teamhost_rev_setastheme' )) {
    add_action( 'init', 'teamhost_rev_setastheme' );
    function teamhost_rev_setastheme() {
        set_revslider_as_theme();
    }
}
