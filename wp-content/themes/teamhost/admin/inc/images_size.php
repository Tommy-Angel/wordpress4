<?php

/**
 * Initialize Theme Support Features
 */
function teamhost_init_theme_support() {
    if (function_exists('teamhost_get_images_sizes')) {
        foreach (teamhost_get_images_sizes() as $post_type => $sizes) {
            foreach ($sizes as $config) {
                teamhost_add_image_size($post_type, $config);
            }
        }
    }
}
add_action('init', 'teamhost_init_theme_support');

/**
 * Add custom image size wrapper
 * @param string $post_type
 * @param array $config
 */
function teamhost_add_image_size($post_type, $config) {
    add_image_size($config['name'], $config['width'], $config['height'], $config['crop']);
}



// THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function teamhost_insert_feed_image($content) {
    global $post;

    if ( has_post_thumbnail( $post->ID ) ){
        $content = ' ' . get_the_post_thumbnail( $post->ID, 'medium' ) . " " . $content;
    }
    return $content;
}

add_filter('the_excerpt_rss', 'teamhost_insert_feed_image');
add_filter('the_content_rss', 'teamhost_insert_feed_image');