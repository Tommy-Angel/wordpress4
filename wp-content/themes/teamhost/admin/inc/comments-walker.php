<?php

if ( ! function_exists( 'teamhost_comment_text' ) ) :
    function teamhost_comment_text($text = null) {
        if($text == null) {
            $text = get_comment_text();
        }
        return teamhost_return_text( $text );
    }
endif;

add_filter( 'comment_form_fields', 'teamhost_move_comment_field_to_bottom' );
if (!function_exists('teamhost_move_comment_field_to_bottom')):
    function teamhost_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }
endif;

/** COMMENTS WALKER */
class teamhost_walker_comment extends Walker_Comment
{

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array('parent' => 'comment_parent', 'id' => 'comment_ID');

    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct()
    { ?>

        <!--<ul class="comments-list">-->

    <?php }

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        <!--<ul class="child-comment">-->

    <?php }

    /** END_LVL
     * Ends the children list of after the elements are added. */
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        <!-- /.children -->

    <?php }

    /** START_EL */
    function start_el(&$output, $comment, $depth = 0, $args = Array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = (empty($args['has_children']) ? '' : 'parent'); ?>

        <article <?php comment_class($parent_class . ' uk-comment uk-visible-toggle'); ?> id="uk-comment-<?php comment_ID() ?>">

            <header class="uk-comment-header uk-position-relative">
                <div class="uk-grid-medium uk-flex-top" uk-grid>
                    <div class="uk-width-auto">
                        <?php echo(teamhost_return_text($args['avatar_size'] != 0 ? get_avatar($comment, $args['avatar_size']) : '')); ?>
                    </div>
                    <div class="uk-width-expand">
                        <?php
                        $author_id = get_post_field( 'post_author', get_the_ID() );
                        $author_name = get_the_author_meta('display_name', $author_id);
                        $user = get_user_by('ID', $author_id);
                        $permalink = get_site_url() . '/members/' . $user->user_login;

                        ?>
                        <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="<?php echo esc_url($permalink)?>"><?php echo esc_html($author_name); ?></a></h4>
                        <p class="uk-comment-meta uk-margin-remove-top">
                            <a class="uk-link-reset" href="<?php echo esc_url($permalink)?>">
                                <?php echo teamhost_altered_comment_time_ago_function();?>
                            </a>
                        </p>
                        <div class="uk-comment-body">
                            <p>
                                <?php if (!$comment->comment_approved) : ?>
                                    <em class="comment-awaiting-moderation"><?php echo esc_html__("Your comment is awaiting moderation.", 'teamhost');?></em>
                                <?php else:
                                    echo teamhost_comment_text();
                                    ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="uk-position-top-right uk-position-small uk-hidden-hover">

                    <?php comment_reply_link(array_merge($args, array(
                        'add_below' => 'uk-comment',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => sprintf(esc_html__('%s Reply', 'teamhost'), '') . '<i uk-icon="reply"></i>',

                    )), $comment->comment_ID);?>

                </div>
            </header>


    <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array())
    { ?>

        </article>

    <?php }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    function __destruct()
    { ?>

        <!-- /#comment-list -->

    <?php }
}
