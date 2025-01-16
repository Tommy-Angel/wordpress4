<?php

if(!class_exists('TM_Helping')):
    class TM_Helping {

        function get_all_attributes( $tag, $text ) {
            preg_match_all( '/' . get_shortcode_regex() . '/s', $text, $matches );
            $out               = array();
            $shortcode_content = array();
            if ( isset( $matches[5] ) ) {
                $shortcode_content = $matches[5];
            }

            if ( isset( $matches[2] ) ) {
                $i = 0;
                foreach ( (array) $matches[2] as $key => $value ) {
                    if ( $tag === $value ) {
                        $out[ $i ]            = shortcode_parse_atts( $matches[3][ $key ] );
                        $out[ $i ]['content'] = $matches[5][ $key ];
                    }
                    $i ++;
                }
            }

            return $out;
        }

        private static $_instance = null;

        public static function instance () {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
                self::$_instance->init_actions();
            }
            return self::$_instance;
        }

        private function __construct () {
            /* We do nothing here! */
        }

        private function init_actions () {
            if (is_admin()) {
                add_action('admin_print_styles', array($this, 'admin_print_styles'));
            }
        }

        public function admin_print_styles () {
                wp_enqueue_style    ( 'tm_custom_admin_css', plugin_dir_url( __FILE__ ) .  '../assets/css/admin.css');
                // Script
                wp_enqueue_script   ('tm_image_picker_admin_js', plugin_dir_url( __FILE__ ) . '../assets/params/js/image-picker.js', '', '', true);
                wp_enqueue_script   ('tm_custom_admin_js', plugin_dir_url( __FILE__ ) .  '../assets/js/scripts.js', '', '', true);

        }


    }
endif;
if ( ! function_exists( 'tm_helping' ) ) :
    function tm_helping() {
        return TM_Helping::instance();
    }
endif;

tm_helping();



