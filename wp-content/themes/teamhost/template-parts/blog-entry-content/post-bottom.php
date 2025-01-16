<div class="entry-main">
    <div class="entry-content">
        <?php if('' != get_the_title()){?>
            <h2 class="entry-title">
                <a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
            </h2>
        <?php } ?>
        <p><?php echo teamhost_limit_excerpt(intval(teamhost_get_theme_mod('custom_blog_excerpt_count'))); ?>
            <a class="more_post" href="<?php esc_url(the_permalink()); ?>"><i class="ico_more"></i></a>
        </p>
    </div>
</div>
