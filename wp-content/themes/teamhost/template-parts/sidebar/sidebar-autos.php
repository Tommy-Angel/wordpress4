<?php
$sidebar_position = $sticky_sidebar = $page_sidebar_sticky =$style_sidebar ="";
if(teamhost_get_theme_mod('car_sidebar_position')!= 'disable'){
    $sidebar_position   = teamhost_get_theme_mod('car_sidebar_position');
    $sticky_sidebar     = teamhost_get_theme_mod('car_sticky_sidebar');
}
$style_sidebar = teamhost_get_theme_mod('car_sidebar_title_style');
if($sidebar_position == 'left'){
    $page_sidebar_position = 'sidebar_left col-md-3';
}else if($sidebar_position== 'right') {
    $page_sidebar_position = 'sidebar_right col-md-3';
}
if($sticky_sidebar == 'sticky'){
    $page_sidebar_sticky = 'sidebar-sticky';
}

?>



<?php if ( is_active_sidebar( 'woo-sidebar' ) ) { ?>
 <div class="sidebar-container <?php echo esc_attr($page_sidebar_position); ?> <?php echo esc_attr($page_sidebar_sticky); ?>">
     <?php if($style_sidebar == 'with_title' and teamhost_get_theme_mod('car_sidebar_title') !=''){?>
         <div class="sidebar-car-title">
             <div class="sidebar-title-content fl-font-style-bolt"><?php echo esc_attr(teamhost_get_theme_mod('car_sidebar_title')) ;?></div>
         </div>
     <?php } ?>
    <aside class="sidebar cars-sidebar cf">
        <div class="sidebar_container">
            <?php dynamic_sidebar( 'woo-sidebar' ); ?>
        </div>
    </aside>
 </div>
<?php } ?>


