<?php
add_theme_support( 'post-thumbnails', 'streams' );


add_action( 'init', 'tmhelper__transports_init' );
add_action( 'after_setup_theme', 'tmhelper__transports_init' );

if( !function_exists('tmhelper__transports_init') ){
    function tmhelper__transports_init() {

        $labels = array(
            'name'                  => esc_html__( 'Streams', 'tm-helper-core' ),
            'singular_name'         => esc_html__( 'Stream', 'tm-helper-core' ),
            'add_new'               => esc_html__( 'Add New Stream', 'tm-helper-core' ),
            'add_new_item'          => esc_html__( 'Add New Stream', 'tm-helper-core' ),
            'edit_item'             => esc_html__( 'Edit Stream', 'tm-helper-core' ),
            'new_item'              => esc_html__( 'Add New Stream', 'tm-helper-core' ),
            'view_item'             => esc_html__( 'View Stream', 'tm-helper-core' ),
            'search_items'          => esc_html__( 'Search Streams', 'tm-helper-core' ),
            'not_found'             => esc_html__( 'No Streams found', 'tm-helper-core' ),
            'not_found_in_trash'    => esc_html__( 'No Streams found in trash', 'tm-helper-core' )
        );

        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'author', 'comments'), //'revisions'),
            'capability_type'       => 'post',
            'menu_position'         => 5,
            'has_archive'           => true,
            'rewrite'             => true,
            'menu_icon'             => 'dashicons-twitch',
        );

        $args = apply_filters('tmhelper__args', $args);

        register_post_type('streams', $args);
        flush_rewrite_rules();


        /**
         * Register a taxonomy for streams Categories
         * http://codex.wordpress.org/Function_Reference/register_taxonomy
         */
        //Custom Categories for Streams
        $taxonomy_category_labels = array(
            'name'                          => esc_html__( 'Categories', 'tm-helper-core' ),
            'singular_name'                 => esc_html__( 'Category', 'tm-helper-core' ),
            'search_items'                  => esc_html__( 'Search Categories', 'tm-helper-core' ),
            'popular_items'                 => esc_html__( 'Popular Categories', 'tm-helper-core' ),
            'all_items'                     => esc_html__( 'All Categories', 'tm-helper-core' ),
            'parent_item'                   => esc_html__( 'Parent Category', 'tm-helper-core' ),
            'parent_item_colon'             => esc_html__( 'Parent Category:', 'tm-helper-core' ),
            'edit_item'                     => esc_html__( 'Edit Category', 'tm-helper-core' ),
            'update_item'                   => esc_html__( 'Update Category', 'tm-helper-core' ),
            'add_new_item'                  => esc_html__( 'Add New Category', 'tm-helper-core' ),
            'new_item_name'                 => esc_html__( 'New Category Name', 'tm-helper-core' ),
            'separate_items_with_commas'    => esc_html__( 'Separate categories with commas', 'tm-helper-core' ),
            'add_or_remove_items'           => esc_html__( 'Add or remove categories', 'tm-helper-core' ),
            'choose_from_most_used'         => esc_html__( 'Choose from the most used categories', 'tm-helper-core' ),
            'menu_name'                     => esc_html__( 'Categories', 'tm-helper-core' ),
        );

        $taxonomy_category_args = array(
            'labels'            => $taxonomy_category_labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_tagcloud'     => true,
            'hierarchical'      => true,
            'query_var'         => true,
            'rewrite'           => false,
        );
        register_taxonomy( 'streams-category', array( 'streams' ), $taxonomy_category_args );

    }
}


add_filter( 'manage_posts_columns', 'tmhelper__add_thumbnail_column', 10, 1 );

if( !function_exists('tmhelper__add_thumbnail_column') ){
    function tmhelper__add_thumbnail_column( $columns ) {

        $column_thumbnail = array( 'thumbnail' => esc_html__('Thumbnail','tm-helper-core' ) );
        $columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
        return $columns;
    }
}



add_action( 'manage_posts_custom_column', 'tmhelper__display_thumbnail', 10, 1 );

if( !function_exists('tmhelper__display_thumbnail') ){
    function tmhelper__display_thumbnail( $column ) {
        global $post;
        switch ( $column ) {
            case 'thumbnail':
                echo get_the_post_thumbnail( $post->ID, array(50, 50) );
                break;
        }
    }
}

