
<div class="article-intro__info">
    <div class="article-intro__date">
        <span data-uk-icon="calendar"></span>
        <span><?php echo get_the_date('F j, Y');?></span>
    </div>
    <div class="article-intro__author">
        <?php
        $author_id = get_post_field( 'post_author', get_the_ID() );
        $author_name = get_the_author_meta('display_name', $author_id);
        ?>
        <span data-uk-icon="user"></span>
        <span><?php echo __('By', 'teamhost');?></span>
        <a href="<?php echo  esc_url(get_author_posts_url($author_id))?>"><?php echo esc_html($author_name);?></a>
    </div>
    <div class="article-intro__comments">
        <span data-uk-icon="comments"></span>
        <a href="<?php esc_url(the_permalink().'#article-reviews'); ?>" data-uk-scroll="offset: 120">
            <?php echo get_comments_number(get_the_ID());?><?php echo __(' Comments', 'teamhost')?>
        </a>
    </div>
</div>



