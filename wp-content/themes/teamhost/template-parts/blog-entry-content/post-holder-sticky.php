<?php


$author_ID =  get_the_author_meta('ID');
$user = get_user_by('ID', $author_ID);
$permalink = get_site_url() . '/members/' . $user->user_login;
$user_avatar = get_avatar_url($author_ID);
if($user_avatar != ''){
    $avatar_img = '<img src="' .esc_url($user_avatar) . '" alt="' . esc_attr($user->user_login) . '" class="fl-post-avatar" width="100" height="100">';
} else {
    $avatar_img = '';
}


$blog_archive_style = teamhost_get_theme_mod('blog_archive_style');
if(isset($blog_archive_style) && $blog_archive_style == 'default'){
    $image_size = 'teamhost_size_1170x558_crop';

} elseif(isset($blog_archive_style) && $blog_archive_style == 'grid'){
    $image_size = 'teamhost_size_571x272_crop';

}
?>
<?php if(isset($blog_archive_style) && $blog_archive_style == 'default'){?>
    <?php if (has_post_thumbnail()) { ?>
        <div class="entry-media">
            <span class="decore-lt"></span>
            <span class="decore-rt"></span>
            <span class="decore-rb"></span>
            <a href="<?php esc_url(the_permalink()); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
            </a>
            <div class="entry-meta">
                <span class="entry-meta__item">
                    <a class="entry-meta__link" href="<?php echo esc_url($permalink)?>">
                        <?php echo teamhost_wp_kses($avatar_img);?>
                    </a>
                </span>
                <span class="entry-meta__item"><?php echo esc_html(get_the_date());?></span>
                <span class="entry-meta__item">
                    <a class="entry-meta__link" href="<?php esc_url(the_permalink()); ?>"><i class="ic icon-speech"></i><?php echo get_comments_number(get_the_ID());?></a>
                </span>
            </div>
        </div>
    <?php } ?>

<?php } elseif(isset($blog_archive_style) && $blog_archive_style == 'grid'){ ?>
    <?php if (has_post_thumbnail()) { ?>

        <div class="entry-media">
            <span class="decore-lt"></span>
            <span class="decore-rt"></span>
            <span class="decore-rb"></span>
            <a href="<?php esc_url(the_permalink()); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
            </a>
            <div class="entry-meta">
                <?php if('' != get_the_title()){?>
                    <h2 class="entry-title">
                        <a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a>
                    </h2>
                <?php } ?>

                <span class="entry-meta__item"><?php echo esc_html(get_the_date());?></span>
                <span class="entry-meta__item">
                    <a class="entry-meta__link" href="<?php esc_url(the_permalink()); ?>"><i class="ic icon-speech"></i><?php echo get_comments_number(get_the_ID());?></a>
                </span>
            </div>
        </div>

    <?php } ?>
<?php } ?>
