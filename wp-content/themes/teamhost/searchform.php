
<div class="widget-inner">
    <form class="form-sidebar" id="search-global-form" action="<?php echo site_url()?>">
        <input class="form-sidebar__input form-control" name="s" type="search" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__('keyword', 'teamhost')?>">
        <button class="form-sidebar__btn"><i class="ic icon-magnifier"></i></button>
    </form>
</div>