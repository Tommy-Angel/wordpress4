<?php
/**
 * Plugin Name: TM Helper Core
 * Plugin URI:: https://themeforest.net/user/tm_colors
 * Description: Helper plugin for TM themes. Don't delete this plugin.
 * Version: 0.4
 * Author:TM_Colors
 * Author URI: https://themeforest.net/user/tm_colors
 * License: GPL v2
 */

/**====================================================================
==  Make sure we don't expose any info if called directly
====================================================================*/
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/**====================================================================
==  Load Text domain
====================================================================*/
add_action('plugins_loaded', 'tm_helper_core_load_textdomain');
function tm_helper_core_load_textdomain() {
    load_plugin_textdomain( 'tm-helper-core', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

define('TM_HELPER_CORE_PLUGIN_PATH',plugin_dir_path(__FILE__));
define('TM_HELPER_CORE_PLUGIN_URL',plugins_url() . '/tm-helper-core');

defined('TM_HELPER_CORE_PLUGIN_VERSION' )   or define( 'TM_HELPER_CORE_PLUGIN_VERSION', '1.0');
defined('FL_THEME_HELPER_ROOT_DIR' )    or define( 'FL_THEME_HELPER_ROOT_DIR', plugins_url() . '/tm-helper-core');
defined('TM_HELPER_CORE_PREVIEW_IMAGE')     or define('TM_HELPER_CORE_PREVIEW_IMAGE', plugin_dir_url(__FILE__) . '/assets/images/presentation-images');
defined('FL_THEME_HELPER_URL' )         or define( 'FL_THEME_HELPER_URL', plugin_dir_url( __FILE__ ));
defined('TM_HELPER_CORE_PREVIEW_IMAGE_ELEMENTOR')     or define('TM_HELPER_CORE_PREVIEW_IMAGE_ELEMENTOR', plugin_dir_url(__FILE__) . '/elementor/custom-controle/image-selector/preview_image');


/**====================================================================
==  Require TM Helper Core Addons
====================================================================*/
if( !class_exists('TM_Helper_Core_Addons') ) {

    class TM_Helper_Core_Addons {

        public static $instance;
        // Construct
        public function __construct() {
            $this->addSocial();
            $this->addLike();
            $this->addCustomFunction();
            $this->addCustomTaxonomyServices();
            $this->addWidgets();
            $this->addYouzify();

            // Version 5 ACF PRO
            add_action('acf/include_field_types',  array($this, 'include_field_types'));
        }

        /** Add Custom Taxonomy Transports*/
        public function addCustomTaxonomyServices() {

            require_once(TM_HELPER_CORE_PLUGIN_PATH.'custom_taxonomy/streams.php');
            require_once('acf-metaboxes/acf-metaboxes.php');
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'acf-metaboxes/streams/streams_option.php');
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'custom_taxonomy/taxonomy-meta/taxonomy_option.php');
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'acf-metaboxes/streams/posts_option.php');

        }
        /**
         * Check if theme has elementor
         *
         * @return boolean
         */
        public function has_elementor() {
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'function/social-share/social.php');
        }

        /** Add Youzify*/
        public function addYouzify() {
            if(class_exists('BuddyPress')){
                require_once(TM_HELPER_CORE_PLUGIN_PATH.'youzify/youzify.php');
            }
        }
        /**
         * Returns allowed order by fields for options
         *
         * @return array
         */
        public function orderby_arr() {
            return array(
                'none'          => esc_html__( 'None', 'tm-helper-core' ),
                'ID'            => esc_html__( 'ID', 'tm-helper-core' ),
                'author'        => esc_html__( 'Author', 'tm-helper-core' ),
                'title'         => esc_html__( 'Title', 'tm-helper-core' ),
                'name'          => esc_html__( 'Name (slug)', 'tm-helper-core' ),
                'date'          => esc_html__( 'Date', 'tm-helper-core' ),
                'modified'      => esc_html__( 'Modified', 'tm-helper-core' ),
                'rand'          => esc_html__( 'Rand', 'tm-helper-core' ),
                'comment_count' => esc_html__( 'Comment Count', 'tm-helper-core' ),
                'menu_order'    => esc_html__( 'Menu Order', 'tm-helper-core' ),
            );
        }


        function include_field_types( $version ) {
            include_once('afc_custom_fields/icon_picker/acf-fonticonpicker-v5.php');
            include_once('afc_custom_fields/image_selector/acf-image_select-v5.php');
        }

        /** Add Social Share Function*/
        public function addSocial() {
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'function/social-share/social.php');
        }

        /** Add Like Function*/
        public function addLike() {
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'function/like/post-like.php');
        }

        /** Add Custom Function*/
        public function addCustomFunction() {
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'function/custom_function.php');
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'function/public_function.php');
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'function/load-more.php');
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'function/reviews-walker.php');
        }

        /** Add Custom Widgets*/
        public function addWidgets() {
            require_once(TM_HELPER_CORE_PLUGIN_PATH.'widgets/widgets.php');
        }

        public static function getInstance() {
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof TM_Helper_Core_Addons ) ) {
                self::$instance = new TM_Helper_Core_Addons();
            }

            return self::$instance;
        }


    } // end of class

} // end of class_exists
/**
 * Returns instance of Jet_Elements_Tools
 *
 * @return TM_Helper_Core_Addons
 */
if ( ! function_exists( 'tm_helper_core_addons' ) ) {
    function tm_helper_core_addons()
    {
        return TM_Helper_Core_Addons::getInstance();
    }
}

tm_helper_core_addons();

// Custom Elementor Option
require_once(TM_HELPER_CORE_PLUGIN_PATH. '/elementor/elementor.php' );
function TM_Helper_Core_Elementor() {
    $instance = TM_Helper_Core_Elementor::instance( __FILE__, TM_HELPER_CORE_PLUGIN_VERSION );

    return $instance;
}

TM_Helper_Core_Elementor();


add_action( 'wp_enqueue_scripts', 'tm_equeue_scripts');
function tm_equeue_scripts(){
    wp_enqueue_script   ('tm__custom_admin_js',  plugin_dir_url( __FILE__ ) .  '/assets/js/scripts.js', '', '', true);
}


?>
