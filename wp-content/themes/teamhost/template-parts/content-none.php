<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package teamhost
 */

?>

<div class="not-found-container page-404 cf">
    <div class="fl--404-page-wrapper text-center cf">
        <div class="fl-404-text-wrapper cf">
            <div class="fl-404-text-left-content">
                <i class="fl-custom-icon-broken"></i>
            </div>
            <div class="fl-404-text-right-content text-left">
                <h5 class="fl--error-page-title"><?php echo esc_html__( 'Nothing was found', 'teamhost' ); ?></h5>
                <p class="fl--errorp-text"><?php echo esc_html__( 'Sorry, we can\'t find the page you are looking for.', 'teamhost' ); ?></p>
            </div>
        </div>
        <div class="fl-404-page-search-form">
            <form class="search fl--search-form-404" role="search" method="get" id="searchform" action="<?php echo site_url()?>">
                <div class="fl--input-wrapper" data-text="">
                    <input type="text" placeholder="<?php echo esc_attr__('Search...', 'teamhost')?>" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="search-form" />
                </div>
                <div class="searchsubmit">
                    <button type="submit" id="searchsubmit-global" class="fl-button primary-button"><?php echo esc_attr__('Search', 'teamhost')?></button>
                </div>
            </form>
        </div>
    </div>
</div>