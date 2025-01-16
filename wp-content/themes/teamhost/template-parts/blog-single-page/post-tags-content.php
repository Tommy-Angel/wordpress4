<?php if(get_the_tags() or get_the_category()){?>
    <div class="tm_teamhost_post_tags_cats">
        <?php if(get_the_tags()){?>
            <div class="article-full__bottom">
                <div class="article-full__tags">
                    <h6><i class="icon-tag"></i><?php echo __('Tags: ','teamhost') ?></h6>
                    <div class="tags-list">
                        <?php the_tags('', '', '') ;?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if(get_the_category()){?>
            <div class="article-full__bottom">
                <div class="article-full__tags">
                    <h6><i class="icon-notebook"></i><?php echo __('Categories: ','teamhost') ?></h6>
                    <div class="tags-list">
                        <?php the_category('', '', '') ;?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
