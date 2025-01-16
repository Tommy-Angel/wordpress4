<?php

if ( ! function_exists( 'tm_helper_review_text' ) ) :
    function tm_helper_review_text($text = null) {
        if($text == null) {
            $text = comment_text();
        }
        return wp_kses_post( $text );
    }
endif;



add_filter( 'comment_form_fields', 'tm_helper_move_comment_field_to_bottom' );
if (!function_exists('tm_helper_move_comment_field_to_bottom')):
    function tm_helper_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }
endif;








/** COMMENTS WALKER */
class tmreviews_reviews_walker_comment extends Walker_Comment
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
    function start_lvl(&$output, $depth = 1, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth; ?>

        <!--<ul class="child-comment">-->

    <?php }

    /** END_LVL
     * Ends the children list of after the elements are added. */
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth; ?>

        <!-- /.children -->

    <?php }

    /** START_EL */
    function start_el(&$output, $comment, $depth = 1, $args = Array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = (empty($args['has_children']) ? '' : 'parent'); ?>

        <div <?php comment_class($parent_class . ' fl-comment'); ?> id="comment-<?php comment_ID() ?>">
            <div class="comment-container">
                <div class="comment-author-content">
                    <div class="comment-avatar">
                        <?php
                        $author_id = get_post_field( 'post_author', get_the_ID() );
                        $page_id = get_option('tmreviews_user_reviews_page_id', true);
                        if(isset($page_id) && !empty($page_id)){
                            $user_page_link = get_permalink($page_id);
                        }
                        ?>
                        <?php if(isset($page_id) && !empty($page_id)){ ?>
                            <a href="<?php echo esc_url($user_page_link); ?>?author=<?php echo $author_id;?>">
                                <?php echo(wp_kses_post($args['avatar_size'] != 0 ? get_avatar($comment, $args['avatar_size']) : '')); ?>
                            </a>
                        <?php } else { ?>
                            <?php echo(wp_kses_post($args['avatar_size'] != 0 ? get_avatar($comment, $args['avatar_size']) : '')); ?>
                        <?php } ?>
                    </div>
                    <div class="fl-comment-author-meta">
                        <div class="fl-comment-author-top">
                            <span class="comment-author-name sas fl-font-style-regular-two">
                                <?php echo wp_kses_post(get_comment_author());?>
                            </span>
                            <div class="comment-rating-show fl-text-bold-style">
                                <?php
                                echo tm_reviews_extend_comment_rating_single();
                                ?>
                            </div>
                        </div>
                        <span class="comment--time fl-text-regular-style">
                            <span class="fl-link-comment">
                                <?php echo tmreviews_altered_post_time_ago_function();?>
                            </span>
                            <?php //edit_comment_link( esc_html__( '(Edit)', 'tm-helper-core' ), '  ', '' );
                            ?>
                        </span>
                    </div>
                </div>



                <div class="comment-meta cf">
                    <div class="comment-moderation">
                        <?php if (!$comment->comment_approved) : ?>
                            <em class="comment-awaiting-moderation"><?php echo esc_html__("Your comment is awaiting moderation.", 'tm-helper-core');?></em>
                        <?php else:
                            echo '<span class="fl-review-content">'.tm_helper_review_text().'</span>';
                            ?>
                        <?php endif; ?>
                        <?php
                        $user = wp_get_current_user();
                        $user_role = $user->roles;
                        $post_id = $comment->comment_post_ID;
                        $author_id = get_post_field ('post_author', $post_id);
                       ?>
                    </div>
                </div>

            </div>
        <?php if(class_exists('MemberOrder')){ ?>
            <?php $tmreviews_place_membership_on = get_option('tmreviews_place_membership_on', true); ?>
            <?php $tmreviews_place_membership_link = get_option('tmreviews_place_membership_link', true); ?>
            <?php $levels = pmpro_getAllLevels();
            $levels_array = [];
            foreach ($levels as $l){
                $levels_array[] = $l->id;
            }
            ?>
            <?php if(isset($tmreviews_place_membership_on) && $tmreviews_place_membership_on == 'enable'){
                if(pmpro_hasMembershipLevel($levels_array)) { ?>
                    <div class="comment--reply-wrap fl-text-medium-style">
                        <div class="reply-link-wrap">
                            <?php
                            comment_reply_link(array_merge($args, array(
                                'add_below' => isset($args['add_below']) ? $args['add_below'] : 'comment',
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'reply_text' => ''.sprintf(esc_html__('%s Reply', 'tm-helper-core'), '')
                            )), $comment->comment_ID);?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="comment--reply-wrap fl-text-medium-style">
                        <div class="reply-link-wrap">
                            <?php if(isset($tmreviews_place_membership_link) && $tmreviews_place_membership_link != ''){ ?>
                                <a rel="nofollow" class="need-membership-to-reply" href="<?php echo esc_url($tmreviews_place_membership_link)?>">
                                    <?php echo esc_attr('Need membership to Reply', 'tm-helper-core'); ?>
                                </a>
                            <?php } else { ?>
                                <a rel="nofollow" class="need-membership-to-reply" href="#">
                                    <?php echo esc_attr('Need membership to Reply', 'tm-helper-core'); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="comment--reply-wrap fl-text-medium-style">
                    <div class="reply-link-wrap">
                        <?php
                        comment_reply_link(array_merge($args, array(
                            'add_below' => isset($args['add_below']) ? $args['add_below'] : 'comment',
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'reply_text' => ''.sprintf(esc_html__('%s Reply', 'tm-helper-core'), '')
                        )), $comment->comment_ID);?>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="comment--reply-wrap fl-text-medium-style">
                <div class="reply-link-wrap">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'add_below' => isset($args['add_below']) ? $args['add_below'] : 'comment',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => ''.sprintf(esc_html__('%s Reply', 'tm-helper-core'), '')
                    )), $comment->comment_ID);?>
                </div>
            </div>
        <?php } ?>
    <?php }

    function end_el(&$output, $comment, $depth = 1, $args = array())
    { ?>

        </div>

    <?php }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    function __destruct()
    { ?>

        <!-- /#comment-list -->

    <?php }
}
