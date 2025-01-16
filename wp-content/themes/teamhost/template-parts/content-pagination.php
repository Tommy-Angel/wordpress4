<?php


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if(teamhost_show_posts_nav()) { ?>
    <div class="uk-pagination uk-flex-center uk-margin-large-top>">
        <?php teamhost_page_links(); ?>
    </div>
<?php } ?>

