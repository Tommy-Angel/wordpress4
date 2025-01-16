<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package teamhost
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
if( !class_exists('Fl_Helping_Addons')){
    $comment_html_class = 'comment-without-back';
} else {
    $comment_html_class = '';
}


?>

    <?php
    // You can start editing here -- including this comment!

    if (have_comments()) : ?>
        <div class="section-article-reviews comments_form <?php echo esc_attr($comment_html_class);?>" id="article-reviews" data-coment-content="<?php esc_attr(bloginfo('title'));?>">


            <div class="section-content">
            <?php
            wp_list_comments(array(
                'walker' => new teamhost_walker_comment(),
                'short_ping' => true,
                'avatar_size' => 90
            ));
            ?>
         </div>
            <!-- .comment-list -->

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>

                <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                    <h2 class="sr-only"><?php esc_html_e('Comment navigation', 'teamhost'); ?></h2>
                    <?php
                    $page = get_query_var('cpage');
                    ?>
                    <?php if (isset($page)): ?>
                        <div class="fl-comment-pagination cf">
                            <?php previous_comments_link('<i class="fa fa-angle-left"></i>'.esc_html__('Older Comments', 'teamhost'));?>
                            <?php next_comments_link(esc_html__('Newer Comments', 'teamhost').'<i class="fa fa-angle-right"></i>');?>
                        </div><!-- .nav-links -->
                    <?php endif; ?>
                </nav><!-- #comment-nav-below -->
                <?php
            endif; // Check for comment navigation.?>
        </div>

    <?php endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>

        <p class="no-comments"><?php esc_html_e('Comments are closed', 'teamhost'); ?></p>
        <?php
    endif;
    $commenter = wp_get_current_commenter();
    ?>

<?php if (comments_open() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="fl-form">
    <?php
    comment_form(array(
        'title_reply' =>  esc_html__('Post a Reply', 'teamhost'),
        'comment_notes_before' => '',
        'fields' => array('<div class="section-content">',
            'author' => '<div class="uk-width-1-2 uk-inline uk-first-column">
                                <span class="uk-form-icon" uk-icon="icon: user"></span> 
                                <input type="text" class="uk-input required" name="author" value="' . esc_attr($commenter['comment_author']) .'">
				             </div>',
            'cookies' => '<p class="comment-form-cookies-consent">'.
                sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', '' ) .'
                                 <label for="wp-comment-cookies-consent">'. __( 'Save my name, email, and website in this browser for the next time I comment.', 'teamhost' ) .'</label>
                            </p>',
            'email' => '<div class="uk-width-1-2 uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input type="email" class="uk-input required"  name="email" value="' . esc_attr($commenter['comment_author_email']) .'">
                            </div>',
            '</div>'),
        'class_submit'  => 'hidden button',
        'class_form'    => 'fl-comment-form',
        'comment_field' => '<div class="author-comment">         
                                    <textarea class="required uk-textarea"  name="comment" rows="5" aria-required="true"></textarea>
                                </div>',
        'comment_notes_after' => '<div class="uk-width-1-1 uk-inline uk-grid-margin uk-first-column">
                                    <button class="uk-button  uk-button-default uk-width-1-1 uk-margin-small-bottom">'. __( "Send Comment", "teamhost") . '</button>
                                </div>'
    ));
    ?>
</div>
<?php endif; ?>
<!-- #comments -->

