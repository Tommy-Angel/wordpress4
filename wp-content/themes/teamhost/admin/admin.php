<?php

if(!class_exists('teamhost_Admin')):
class teamhost_Admin {
    /**
     * The single class instance.
     *
     * @since 1.0.0
     * @access private
     *
     * @var object
     */
    private static $_instance = null;

    /**
    * Main Instance
    * Ensures only one instance of this class exists in memory at any one time.
    *
    */
    public static function instance () {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
            self::$_instance->init_globals();
            self::$_instance->init_includes();
            self::$_instance->init_actions();
        }
        return self::$_instance;
    }

    private function __construct () {
        /* We do nothing here! */
        $this->admin_path = get_template_directory() . '/admin';

        // get theme data
        $theme_data = wp_get_theme();
        $theme_parent = $theme_data->parent();
        if(!empty($theme_parent)) {
            $theme_data = $theme_parent;
        }

        $this->theme_slug = $theme_data->get_stylesheet();
        $this->theme_name = $theme_data['Name'];
        $this->theme_version = $theme_data['Version'];
        $this->theme_uri = $theme_data->get('ThemeURI');
        $this->theme_is_child = !empty($theme_parent);
    }

    /**
     * Init Global variables
     */
    private function init_globals () {
        $extra_headers = get_file_data(get_template_directory() . '/style.css', array(
            'Theme ID' => 'Theme ID'
        ), 'fL_theme');
        $this->theme_id = $extra_headers['Theme ID'];
    }

    /**
     * Init Included Files
     */
    private function init_includes () {
        require $this->admin_path . '/option/options-setting.php';
        require $this->admin_path . '/option/kirki-options.php';
        require $this->admin_path . '/option/acf-metaboxes.php';
    }

    /**
     * Setup the hooks, actions and filters.
     */
    private function init_actions () {
        add_action('wp_enqueue_scripts', array($this, 'teamhost_enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'teamhost_enqueue_styles'));

        if (is_admin()) {
            add_action('admin_print_styles', array($this, 'admin_print_styles'));
        }
    }

    /**
     * Print Styles
     */
    public function admin_print_styles () {
        wp_enqueue_media();
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/libs/font-awesome.css', array(), '4.7');
        wp_enqueue_style('teamhost-custom-fonts', get_template_directory_uri() . '/assets/css/custom-icon.css', array(), '1.0');
        wp_enqueue_style('teamhost-simple-line-icons', get_template_directory_uri() . '/assets/css/libs/simple-line-icons.css', array(), '1.0');
        wp_enqueue_style('teamhost-theme-admin-style', get_template_directory_uri() . '/admin/assets/css/style.css', array(), '1.0');
        if(class_exists('Kirki')){
            wp_enqueue_style('teamhost-customize-icon-admin-style', get_template_directory_uri() . '/admin/assets/css/customize-icon-style.css', array(), '1.0');
        }
        wp_enqueue_script('teamhost-admin-script', get_template_directory_uri() . '/admin/assets/js/admin-scripts.js', '', '', true);
        //Icon Picker
        wp_enqueue_script('fonticonpicker', get_template_directory_uri() . '/admin/assets/js/libs/fonticonpicker.js', '', '', true);
        wp_enqueue_style('icon-piker', get_template_directory_uri() . '/admin/assets/css/libs/icon-piker.css', array(), '1.0');

        wp_register_script( 'teamhost-custom-wp-admin-script', get_template_directory_uri() . '/admin/assets/js/custom-admin.js', array( 'jquery' ) );
        wp_localize_script( 'teamhost-custom-wp-admin-script', 'meta_image',
            array(
                'title' => esc_html__( 'Choose or Upload an Image', 'teamhost' ),
                'button' => esc_html__( 'Use this image', 'teamhost' ),
            )
        );

        wp_enqueue_script( 'teamhost-custom-wp-admin-script' );

    }

    public function teamhost_save_google_fonts_url() {

        $fonts_url = '//fonts.googleapis.com/css2?';

        $fonts = 'family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap';

        $fonts_url .= $fonts;
        return $fonts_url;

    }
    public function teamhost_save_google_fonts_url_second() {

        $fonts_url = '//fonts.googleapis.com/css2?';

        $fonts = 'family=Marcellus&display=swap';


        $fonts_url .= $fonts;
        return $fonts_url;

    }

    public function teamhost_enqueue_styles() {

        wp_enqueue_style( 'teamhost-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
        wp_enqueue_style( 'teamhost-libs', get_template_directory_uri() . '/assets/css/libs.min.css', array(), '1.8.6');

        //CSS Libs
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/libs/bootstrap.css', array(), '4.0');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/libs/font-awesome.css', array(), '4.7');
        wp_enqueue_style( 'teamhost-custom-icon-font', get_template_directory_uri() . '/assets/css/libs/fl-custom-font.css', array(), '1.0');
        wp_enqueue_style( 'teamhost-icon-font', get_template_directory_uri() . '/assets/css/libs/fl-custom-icon-font.css', array(), '1.0');
        wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/libs/simple-line-icons.css', array(), '1.0');
        wp_enqueue_style( 'modal-box', get_template_directory_uri() . '/assets/css/libs/modal-box.css', array(), '1.1.0');
        wp_enqueue_style( 'venobox', get_template_directory_uri() . '/assets/css/libs/venobox.css', array(), '1.8.6');
        wp_enqueue_style( 'teamhost-general', get_template_directory_uri() . '/assets/css/sass/general.css', array(), '1.8.6');
        wp_enqueue_style( 'teamhost-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0');
        wp_enqueue_style('fontawesome-6', get_template_directory_uri() . '/assets/css/libs/fontawesome.css', array(), '6.2.1');


        // General css
        wp_enqueue_style( 'teamhost-vc-page-builder-style', get_template_directory_uri() . '/assets/css/vc-page-builder-style.css', array(), '1.0');

        // Kirki Save if plugin not active

        wp_enqueue_style( 'teamhost-save-google-fonts', $this->teamhost_save_google_fonts_url(), false, '1.0' );
        wp_enqueue_style( 'teamhost-save-google-fonts-second', $this->teamhost_save_google_fonts_url_second(), false, '1.0' );
        if ( !class_exists( 'Kirki' ) ) {
            wp_enqueue_style( 'teamhost-save-kirki-customizer', get_template_directory_uri() .'/assets/css/kirki-save.css', array(), '1.0');
        }
    }



    public function teamhost_enqueue_scripts() {

        $api_key = teamhost_get_theme_mod('google_api_key');

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script( 'range-slider', get_template_directory_uri() . '/assets/js/vendors-libs/range-slider.js', array( 'jquery' ), '1.19.0', true );
        wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/vendors-libs/swiper.js', array( 'jquery' ), '7.2.0', true );
        wp_enqueue_script( 'uikit', get_template_directory_uri() . '/assets/js/vendors-libs/uikit.js', array( 'jquery' ), '3.7.6', true );
        wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/assets/js/vendors-libs/inputmask.js', array( 'jquery' ), '5.0.6', true );
        wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/vendors-libs/NiceSelect.js', array( 'jquery' ), '1.1.0', true );
        wp_enqueue_script( 'dynamic-adapt', get_template_directory_uri() . '/assets/js/vendors-libs/dynamic-adapt.js', array( 'jquery' ), '1', true );


        wp_enqueue_script( 'easy-number-animate', get_template_directory_uri() . '/assets/js/vendors-libs/jquery.easy_number_animate.js', array( 'jquery' ), '1.1', true );


        // Plugin Custom Js
        wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/vendors-libs/bootstrap-bundle.js', array( 'jquery' ), '4.0', true );
        wp_enqueue_script( 'slick', get_template_directory_uri()  . '/assets/js/vendors-libs/slick.js', array( 'jquery' ), '1.8.0', true );
        wp_enqueue_script( 'jelect', get_template_directory_uri() . '/assets/js/vendors-libs/jelect.js', array( 'jquery' ), '1.1', true );

        wp_enqueue_script( 'image-loading', get_template_directory_uri() . '/assets/js/vendors-libs/loadedimages.min.js', array( 'jquery' ), $this->theme_version, true );



        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/vendors-libs/isotope.js', array( 'jquery' ), '3.0.6', true );
        wp_enqueue_script( 'cookie', get_template_directory_uri() . '/assets/js/vendors-libs/cookie.js', array( 'jquery' ), '1.4.1', true );
        wp_enqueue_script( 'count-to', get_template_directory_uri() . '/assets/js/vendors-libs/count-to.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/vendors-libs/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/vendors-libs/waypoints.js', array( 'jquery' ), '4.0.1', true );
        wp_enqueue_script( 'mega-menu', get_template_directory_uri() . '/assets/js/vendors-libs/mega-menu.js', array( 'jquery' ), '1.1', true );
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/vendors-libs/theia-sticky-sidebar.js', array( 'jquery' ), '1.7.0', true );
        wp_enqueue_script( 'tween-max', get_template_directory_uri() . '/assets/js/vendors-libs/TweenMax.js', array( 'jquery' ), '2.0.2', true );
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendors-libs/modernizr.custom.js', array( 'jquery' ), '2.6.2', true );
        wp_enqueue_script( 'velocity', get_template_directory_uri() . '/assets/js/vendors-libs/velocity.js', array( 'jquery' ), '1.5.0', true );
        wp_enqueue_script( 'velocity-pack', get_template_directory_uri() . '/assets/js/vendors-libs/velocity-ui-pack.js', array( 'jquery' ), '5.0.4', true );
        wp_enqueue_script( 'nouislider', get_template_directory_uri() . '/assets/js/vendors-libs/nouislider.js', array( 'jquery' ), '8.5.1', true );
        wp_enqueue_script( 'w-numb', get_template_directory_uri() . '/assets/js/vendors-libs/w-numb.js', array( 'jquery' ), '1.2', true );
        wp_enqueue_script( 'venobox', get_template_directory_uri() . '/assets/js/vendors-libs/venobox.js', array( 'jquery' ), '1.1', true );



        //Mega Menu
        wp_enqueue_script( 'mega-menu-start', get_template_directory_uri() . '/assets/js/vendors-libs/mega-menu/mega-menu-start.js', array( 'jquery' ),'1.1', true );

        // Preloader
        if(teamhost_get_theme_mod('preloader_page_show') == 'true') {
            wp_enqueue_script( 'teamhost-page-loader', get_template_directory_uri() . '/assets/js/vendors-libs/teamhost-page-loader.js', array( 'jquery' ), '1.1', true );
        }

        // Google Maps
        wp_register_script( 'gmap3', get_template_directory_uri() . '/assets/js/vendors-libs/gmap3.js', array( 'jquery' ), '', true );

        wp_enqueue_script( 'hotspot', get_template_directory_uri() . '/assets/js/vendors-libs/hotspot.js', array( 'jquery' ), '1.1', true );

        // Theme Js Custom File
        wp_enqueue_script( 'teamhost-custom-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.1', true );

        // Google Api Key
        if ($api_key !=''){
            wp_enqueue_script( 'google-maps-api', '//maps.googleapis.com/maps/api/js?key='.esc_attr($api_key) );
        }

        if ( class_exists('WooCommerce') ) {
            // Woo JS
            wp_enqueue_script( 'teamhost-woo-custom',get_template_directory_uri() . '/assets/js/woo-scripts.js',array( 'jquery' ),('1.1'),true );
        }


    }


    /**
     * Returns the login form
     */

    public static function teamhost_login_form() {
    $args = array(
        'redirect'                      =>  esc_url( wp_login_url( get_permalink() ) ),
        'form_id'                       => 'loginform-custom',
        'label_username'                => '',
        'label_password'                => '',
    );

    if (class_exists('Fl_Login_Form_Widget')) {
        $args = array(
            'label_log_in'              => esc_html__('Sign in', 'teamhost'),
            'label_lost_password'       => esc_html__('Forgot password', 'teamhost').'?',
        );

        $teamhost_login_widget = new Fl_Login_Form_Widget();

        $teamhost_login_widget->wp_login_form($args);
    } else {
        wp_login_form($args);
    }

    }



}
endif;
if ( ! function_exists( 'teamhost_admin' ) ) :
function teamhost_admin() {
	return teamhost_Admin::instance();
}
endif;

teamhost_admin();





function teamhost_google_map_url() {
    $map_key = teamhost_get_theme_mod('google_api_key');
    $map_url = '//maps.googleapis.com/maps/api/js?key='.$map_key.'&callback=initMap';
    return esc_url_raw( $map_url );
}



//Remove ID in navigation menu
add_filter('nav_menu_item_id', '__return_false');




add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );




//BuddyPress
function teamhost_edit_friendship_buttons_text( $button ) {
    switch ( $button['id'] ) {
        case 'is_friend' :
            $button['link_text'] = '<span class="teamhost_friend_button_mod">' . __( 'Unfriend', 'teamhost' ) . '</span>';
            break;
        case 'awaiting_response':
            $button['link_text'] = '<span class="teamhost_friend_button_mod">' . __( 'Friendship Requested', 'teamhost' ) . '</span>';
            break;
        case 'pending' :
            $button['link_text'] = '<span class="teamhost_friend_button_mod">' . __( 'Cancel', 'teamhost' ) . '</span>';
            break;
        default:
            $button['link_text'] = '<span class="teamhost_friend_button_mod">' . __( 'Add Friend', 'teamhost' ) . '</span>';
            break;
    }
    return $button;
}
add_filter( 'bp_get_add_friend_button', 'teamhost_edit_friendship_buttons_text', 9 );



function teamhost_get_group_last_active( $group = false, $args = array() ) {
    $group = bp_get_group( $group );

    if ( empty( $group->id ) ) {
        return '';
    }

    $r = bp_parse_args(
        $args,
        array(
            'relative' => true,
        ),
        'group_last_active'
    );

    $last_active = $group->last_activity;
    if ( ! $last_active ) {
        $last_active = groups_get_groupmeta( $group->id, 'last_activity' );
    }

    if ( ! $r['relative'] ) {
        return esc_attr( $last_active );
    }

    if ( empty( $last_active ) ) {
        return __( 'not yet active', 'teamhost' );
    } else {

        $today = new DateTime(date("Y-m-d H:i:s"));
        $last_active_date = new DateTime($last_active);
        $interval = $today->diff($last_active_date);
        return apply_filters( 'bp_get_group_last_active', bp_core_time_since( $last_active ), $group );
    }
}





function teamhost_altered_comment_time_ago_function() {
    $days = round((date('U') - get_comment_date('U')) / (60*60*24));
    if ($days == 0) {
        return esc_html__("Published Today", 'teamhost');
    } elseif ($days == 1) {
        $text = $days . " day ago";
        return esc_html($text);
    } else {
        if ($days > 365){
            $start_date = new DateTime(date("Y/m/d"));
            $end_date = new DateTime(date("Y/m/d",strtotime("+$days days")));
            $dd = date_diff($start_date,$end_date);
            $year = $dd->y;
            if($year == 1){
                $text = $year . " year ago";
                return esc_html( $text);
            } else {
                $text = $year . " years ago";
                return esc_html( $text);
            }
        } elseif($days < 365 && $days > 30) {
            $start_date = new DateTime(date("Y/m/d"));
            $end_date = new DateTime(date("Y/m/d",strtotime("+$days days")));
            $dd = date_diff($start_date,$end_date);
            $month = $dd->m;
            if($month == 1){
                $text = $month . " month ago";
                return esc_html( $text);
            } else {
                $text = $month . " months ago";
                return esc_html( $text);
            }
        } else {
            $text = $days . " days ago";
            return esc_html( $text);
        }

    }
}




add_action('check_admin_referer', 'teamhost_logout_without_confirm', 10, 2);
function teamhost_logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : 'url-you-want-to-redirect';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}


function teamhost_wp_body_classes( $classes ) {
    $menu_style = teamhost_get_theme_mod('menu_style');
    $classes[] = 'body_' . $menu_style;

    if(teamhost_get_theme_mod('dark_theme_switcher') == 'enable' ){
        $classes[] = 'toogle_dark_theme_btn';
    }
    $dark_default = teamhost_get_theme_mod('dark_theme_default');
    if($dark_default == 'dark') {
        $classes[] = 'dark-theme';
    }

    return $classes;
}
add_filter( 'body_class','teamhost_wp_body_classes' );



