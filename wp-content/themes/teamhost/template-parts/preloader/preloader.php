<?php
if(teamhost_get_theme_mod('preloader_page_show') == 'true') {?>
    <div id="fl-page--preloader">
        <span class="fl-top-progress">
            <span class="fl-loader_right"></span>
            <span class="fl-loader_left"></span>
        </span>
        <div class="fl-top-background-preloader"></div>
        <div class="fl-bottom-background-preloader"></div>
        <div class="fl--preloader-progress-bar"><span></span></div>
        <div class="fl-preloader--text-percent">
            <p class="fl--preloader-percent fl-text-title-style"><?php echo esc_html('0%');?></p>
        </div>
    </div>
<?php } ?>


