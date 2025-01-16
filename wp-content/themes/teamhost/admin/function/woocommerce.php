<?php
/**
 * Create a woo img container hover style
 */
if ( class_exists('WooCommerce') ) {

    // Other Functions
    get_template_part('admin/function/woo-function/other_woo_functions');
    // Single Product Function
    get_template_part('admin/function/woo-function/archive_function');
    // Archive Product Function
    get_template_part('admin/function/woo-function/single_function');


    //Declare WooCommerce support
    add_action( 'after_setup_theme', 'teamhost_woocommerce_support' );
    function teamhost_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }


    //Up sells Products columns based on options columns
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

    if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
        function woocommerce_output_upsells() {
            $teamhost_column = 3;

            switch ( $teamhost_column ) {
                case 'one' :
                    woocommerce_upsell_display( 1, 1 );
                    break;
                case 'two' :
                    woocommerce_upsell_display( 2, 2 );
                    break;
                case 'three' :
                    woocommerce_upsell_display( 3, 3 );
                    break;
                case 'four' :
                    woocommerce_upsell_display( 4, 4 );
                    break;
                case 'five' :
                    woocommerce_upsell_display( 5, 5 );
                    break;
            }
        }
    }


    add_action( 'init', 'teamhost_remove_wc_breadcrumbs' );
    function teamhost_remove_wc_breadcrumbs() {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }

    //Load Custom Select JS and CSS
    function teamhost_woo_enqueue_styles() {
        wp_enqueue_style( 'teamhost-woo-style', get_template_directory_uri() .'/woocommerce/css/scss/woocommerce.css', array(), '1.0');
        wp_enqueue_script( 'teamhost-woo-script', get_template_directory_uri() . '/assets/js/woo-scripts.js', array( 'jquery' ), '4.0', true );
   }

    add_action( 'wp_enqueue_scripts', 'teamhost_woo_enqueue_styles',45 );


    add_filter( 'woocommerce_product_get_dimensions', '__return_false' );
    remove_action( 'woocommerce_product_additional_information', 'wc_display_product_attributes', 10 );

    add_filter( 'woocommerce_product_tabs', 'teamhost_remove_product_tabs', 98 );
    function teamhost_remove_product_tabs( $tabs ) {
        unset( $tabs['additional_information'] );
        return $tabs;
    }
    /**
     * ------------------------------------------------------------------------------------------------
     *  Products per page based on theme options
     * ------------------------------------------------------------------------------------------------
     */
    if(teamhost_get_theme_mod('products_per_page')){
        function teamhost_loop_shop_per_page( $cols ) {
            $cols = teamhost_get_theme_mod('products_per_page');
            return $cols;
        }
        add_filter( 'loop_shop_per_page', 'teamhost_loop_shop_per_page', 20 );
    }


    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    if(!function_exists('teamhost_woocommerce_custom_sales_price')) {
        /*
         * WooCommerce products Sale price filter
         */
        function teamhost_woocommerce_custom_sales_price($text, $post, $product ) {
            $percentage = '';
            if(!is_null($product->get_regular_price()) && $product->get_regular_price() != 0 && $product->get_regular_price() != '0' && $product->get_regular_price() != '') {
                $percentage = '-'.round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 ) . '%';
            }
            return sprintf( '<span class="onsale fl-font-style-medium">' . esc_html__( 'Sale %s', 'teamhost' ) . '</span>', $percentage );
        }
    }
    add_filter( 'woocommerce_sale_flash', 'teamhost_woocommerce_custom_sales_price', 10, 3 );

}