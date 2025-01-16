<?php
teamhost_Options::add_section('style_setting', array(
    'title'         => esc_attr__('Theme Style', 'teamhost'),
    'priority'      => 8,
    'icon'          => 'fa fa-paint-brush'
));

teamhost_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'primary_color_setting',
    'label'         => esc_attr__( 'Primary Color Setting', 'teamhost' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#F46119',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(

        array(
            'element'               => '.page-header__mainmenu .uk-navbar-nav > li.current-menu-item > a, .page-header__mainmenu .uk-navbar-nav > li > a:hover, .contacts-block i::before, 
                                        .uk-card-body a.more span.uk-icon, .solution-item__link a.more span.uk-icon, .review-item__icon, .rating-list li.active, .new-item__date,
                                        .widget_nav_menu ul li a:hover, .widget_nav_menu ul li a:focus, .widget_nav_menu ul li a:active, .widget_nav_menu ul li a.nice-select.open,
                                        .news-list-item__date, .widget a:hover, .page-footer__copy a:hover, .tmtransports-transports-popular-wrap .equipment-item__title a:hover, 
                                        .offer-price span, .rental-item__specifications ul li::before, .equipment-item__title a:hover, .uk-button .uk-icon, .equipment-detail__location .uk-icon,
                                        .widget_categories ul li a:hover, .widget_categories ul li a:focus, .widget_categories ul li a:active, .widget_categories ul li a.nice-select.open,
                                        .list-articles-item__date .uk-icon,
                                        .widget_archive ul li a:hover, .widget_archive ul li a:focus, .widget_archive ul li a:active, .widget_archive ul li a.nice-select.open, 
                                        .widget_recent_entries ul li a:hover, .widget_recent_entries ul li a:focus, .widget_recent_entries ul li a:active, .widget_recent_entries ul li a.nice-select.open,
                                        .article-full__info > * i, .article-full__info > * svg, .article-intro__info > * i, .article-intro__info > * svg, 
                                        .article-full__author a:hover, .article-full__author a:focus, .article-full__author a:active, .article-full__author a.nice-select.open, 
                                        .article-intro__author a:hover, .article-intro__author a:focus, .article-intro__author a:active, .article-intro__author a.nice-select.open,
                                        .article-full__comments a:hover, .article-full__comments a:focus, .article-full__comments a:active, .article-full__comments a.nice-select.open,
                                        .article-intro__comments a:hover, .article-intro__comments a:focus, .article-intro__comments a:active, .article-intro__comments a.nice-select.open,
                                        .article-full__title a:hover, .article-intro__title a:hover, .contacts-list li span.label, .rental-item__links a, .equipment-item__links a,html a:hover, html .sidebar-box .widget.widget_nav_menu ul li.current-menu-item a span, .sidebar-box .uk-nav li.current-menu-item a i, html .youzify-directory-filter .item-list-tabs li.selected  a:before, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i,.bpbm-empty-icon svg , html .gamipress-points .gamipress-user-points-description .gamipress-user-points-amount , html  .gamipress-points .gamipress-user-points-description .gamipress-user-points-label, html .gamipress-points .gamipress-user-points-description .gamipress-user-points-amount:after , .theme-teamhost #message-recipients .highlight .highlight-meta a, .theme-teamhost .thread-sender .thread-from .from .thread-count, .theme-teamhost .widget_display_replies li a.bbp-author-name, .theme-teamhost .widget_display_topics li .topic-author a.bbp-author-name, .theme-teamhost .youzify-bbp-topic-head-meta .youzify-bbp-head-meta-last-updated a:not(.bbp-author-name), .theme-teamhost .youzify-group-navmenu li a:hover, .theme-teamhost .youzify-group-settings-tab fieldset legend, .theme-teamhost .youzify-link-main-content .youzify-link-url:hover, .theme-teamhost .youzify-post-content .youzify-post-title a:hover, .theme-teamhost .youzify-post-tags .youzify-tag-symbole, .theme-teamhost .youzify-product-price .youzify-product-new-price, .theme-teamhost .youzify-product-price ins .amount, .theme-teamhost .youzify-product-price.youzify-variable-price, .theme-teamhost .youzify-profile-navmenu .youzify-navbar-item a:hover, .theme-teamhost .youzify-profile-navmenu .youzify-navbar-item a:hover i, .theme-teamhost .youzify-project-tags .youzify-tag-symbole, .theme-teamhost .youzify-recent-posts .youzify-post-title a:hover, .theme-teamhost .youzify-tab-post .youzify-post-title a:hover, .theme-teamhost .youzify-wall-link-data .youzify-wall-link-url, .theme-teamhost .youzify-wall-new-post .youzify-post-title a:hover  , .youzify div.item-list-tabs li.current.selected a i , .youzify div.item-list-tabs li.selected a, html .youzify-user-balance-box .youzify-box-head i , html .group-button a.join-group:before ,  html .theme-teamhost #youzify-group-buttons .group-button a.join-group , html .youzify-group-navmenu a:hover:before ,html  .docspress-nav-list a:hover , html .docspress-archive .docspress-archive-list > .docspress-archive-list-item .docspress-archive-list-item-title > span:before ,  #youzify .activity-meta i,html .youzify .activity-header .activity-head p a + a:hover,  html .woocommerce-Price-amount.amount , .dokan-settings-area a, html .store-cat-stack-dokan.cat-drop-stack li:before , .widget.widget_archive ul li:before, .widget.widget_categories ul li:before, .widget.widget_pages ul li:before, .widget.widget_nav_menu ul li:before, .widget.widget_recent_entries ul li:before , .dokan-single-store .profile-frame .profile-info-box .profile-info-summery-wrapper .profile-info-summery .profile-info i,html , html .uk-button-read-more , .sidebar-box .uk-nav li a:hover, .sidebar-box .uk-nav li a:focus, .sidebar-box .uk-nav li a:active, .sidebar-box .uk-nav li a.nice-select.open, .sidebar-box .uk-nav li a:hover [class*="ico_"], .sidebar-box .uk-nav li a:focus [class*="ico_"], .sidebar-box .uk-nav li a:active [class*="ico_"], .sidebar-box .uk-nav li a.nice-select.open [class*="ico_"],html .sidebar-box .widget.widget_nav_menu ul li a:hover, html .uk-button-theme-color:hover,html .uk-button-theme-color:focus,html .uk-button-theme-color:active, html .game-card__rating [class*="ico_"], html .article-intro .entry-title:hover a, html .widget_product_categories ul li:before,html .docspress-archive .docspress-archive-list > .docspress-archive-list-item > ul li:hover a,.yith-wcwl-wishlistaddedbrowse .feedback,html .youzify .youzify-wc-main-content .woocommerce .shop_table td .amount',
            'property'              => 'color',
            'suffix'                => '',
        ),


        array(
            'element'               => 'html .youzify div.item-list-tabs li.current.selected a i:before , .youzify-horizontal-layout .youzify-group-navmenu .current.selected a   ,  html .youzify-profile-list-widget .youzify-more-items a:hover , html body .gamipress-points .gamipress-user-points-description .gamipress-user-points-amount , .youzify #youzify-members-list .youzify-user-actions .follow-button a , .youzify #youzify-members-list .youzify-user-actions a.youzify-send-message , .widget .widget-title:before , html body div.widget.buddypress.widget_bp_core_members_widget div.item-options a.selected , .wpcf7-submit , .form-help-links a , .wpcf7 ul li:hover a , .wpcf7 ul li:hover i , .youzify-tools-full-btns .youzify-tool-btn .youzify-tool-icon i , .widget_product_categories ul li i , .list-articles-item__link:hover .list-articles-item__title , .widget_product_categories .product-categories li a:hover , .widget .wp-block-latest-comments li a:hover, .widget.widget_recent_comments ul li a:hover, .article-full__bottom i,html .woocommerce table.shop_table tbody tr td.product-name a:hover,body.dark-theme .sidebar-box .uk-nav li.current-menu-item a,html .woocommerce-MyAccount-navigation ul li:before, html .woocommerce-MyAccount-navigation ul li.is-active a,html .stream-item__title:hover,.sidebar-box .uk-nav li.current-menu-item a, .sidebar-box .uk-nav li.current-menu-item a [class*="ico_"],.game-card__rating, .comments_form .comment-reply-link:hover , .yith-wcwl-add-to-wishlist a,.swiper-button-prev:hover::before, .swiper-rtl .swiper-button-next:hover::before,.swiper-button-next:hover::before, .swiper-rtl .swiper-button-prev:hover::before, .action-btn:hover',
            'property'              => 'color',
            'suffix'                => '!important',
        ),





        array(
            'element'               => '.search .uk-radio:checked, .wpcf7-form .tm_home_contacts button:hover, .newsletter, .social li a:hover, .page-footer__menu .widget h5:after,
                                        .page-footer__news .widget h5:after, .page-header.--two-line .page-header__social .social__link:hover, .page-header.--two-line .page-header__contacts,
                                        .uk-button-danger, .equipment-item__list ul li::before, .tmtransports-transports-popular-wrap .uk-dotnav > .uk-active > *, .page-head__breadcrumb,
                                        .feature-item .uk-card .uk-nav li a:hover, .equipment-booking .rental-item__price-btn form.booking_form .book_now_btn, .equipment-booking .equipment-item__btn form.booking_form .book_now_btn,
                                        .uk-button-default:hover, .equipment-detail__gallery label.tmbooking_discount, 
                                        .widget_tag_cloud .tagcloud a:hover, .widget_tag_cloud .wp-block-tag-cloud a:hover, .widget_tag_cloud .tagcloud a:focus, .widget_tag_cloud .wp-block-tag-cloud a:focus, 
                                        .widget_tag_cloud .tagcloud a:active, .widget_tag_cloud .wp-block-tag-cloud a:active, .widget_tag_cloud .tagcloud a.nice-select.open, .widget_tag_cloud .wp-block-tag-cloud a.nice-select.open,
                                        .tags-list a:hover, .tags-list a:focus, .tags-list a:active, .tags-list a.nice-select.open,#buddypress.youzify div.generic-button a:hover,  .youzify-user-actions a:hover,html .fl-view-profile:hover,#buddypress.youzify div.generic-button a:hover,
.buddypress .youzify div.generic-button a:hover,
.youzify-user-actions a:hover , html .youzify .editfield .checkbox-options input:checked , .youzify .editfield .clear-value, .youzify .editfield .field-visibility-settings .field-visibility-settings-close, .youzify .editfield .field-visibility-settings-notoggle .visibility-toggle-link, .youzify .editfield .field-visibility-settings-toggle .visibility-toggle-link , .my-friends.theme-teamhost #friend-list .action a.accept, .theme-teamhost #bbpress-forums #bbp-search-form #bbp_search_submit, .theme-teamhost #bbpress-forums .bbp-search-form #bbp_search_submit, .theme-teamhost #bbpress-forums li.bbp-footer, .theme-teamhost #bbpress-forums li.bbp-header, .theme-teamhost #group-create-tabs li.current, .theme-teamhost #group-settings-form input[type=submit], .theme-teamhost #message-recipients .highlight-icon i, .theme-teamhost #search-members-form #members_search_submit, .theme-teamhost #send-invite-form .submit input, .theme-teamhost #send-reply #send_reply_button, .theme-teamhost #send_message_form .submit #send, .theme-teamhost #youzify-directory-search-box form input[type=submit], .theme-teamhost #youzify-group-body h1:before, .theme-teamhost #youzify-group-buttons .group-button a.join-group, .theme-teamhost #youzify-groups-list .action .group-button .accept-invite, .theme-teamhost #youzify-groups-list .action .group-button .join-group, .theme-teamhost #youzify-groups-list .action .group-button .membership-requested, .theme-teamhost #youzify-groups-list .action .group-button .request-membership, .theme-teamhost .group-button.accept-invite, .theme-teamhost .group-button.join-group, .theme-teamhost .group-button.request-membership, .theme-teamhost .group-request-list .action .accept a, .theme-teamhost .invitations .invitation-actions a.resend span, .theme-teamhost .item-list-tabs #search-message-form #messages_search_submit, .theme-teamhost .messages-notices .thread-options .read span, .theme-teamhost .messages-options-nav #messages-bulk-manage, .theme-teamhost .notifications .notification-actions .mark-read span, .theme-teamhost .notifications-options-nav #notification-bulk-manage, .theme-teamhost .pagination .current, .theme-teamhost .sitewide-notices .thread-options .activate-notice, .theme-teamhost .widget_display_forums li a:before, .theme-teamhost .widget_display_search #bbp_search_submit, .theme-teamhost .widget_display_topics li:before, .theme-teamhost .widget_display_views li .bbp-view-title:before, .theme-teamhost .youzify .checkout_coupon, .theme-teamhost .youzify .wc-proceed-to-checkout a.checkout-button, .theme-teamhost .youzify .wc-proceed-to-checkout a.checkout-button:hover, .theme-teamhost .youzify .woocommerce-customer-details h2, .theme-teamhost .youzify .youzify-attachment-file-icon, .theme-teamhost .youzify .youzify-wc-main-content #payment #place_order, .theme-teamhost .youzify .youzify-wc-main-content .track_order .form-row button, .theme-teamhost .youzify .youzify-wc-main-content .woocommerce-checkout-review-order table.shop_table tfoot .order-total, .theme-teamhost .youzify .youzify-wc-main-content .woocommerce-checkout-review-order table.shop_table thead, .theme-teamhost .youzify .youzify-wc-main-content button[type=submit], .theme-teamhost .youzify .youzify-wc-main-content table.shop_table td a.view:before, .theme-teamhost .youzify .youzify-wc-main-content table.shop_table td a.woocommerce-MyAccount-downloads-file:before, .theme-teamhost .youzify .youzify-wc-main-content table.shop_table td.actions .coupon button, .theme-teamhost .youzify .youzify-wc-main-content table.shop_table td.woocommerce-orders-table__cell-order-number a, .theme-teamhost .youzify .youzify-wc-main-content table.shop_table thead, .theme-teamhost .youzify div.item-list-tabs li.youzify-activity-show-search .youzify-activity-show-search-form i, .theme-teamhost .youzify table tfoot tr, .theme-teamhost .youzify table thead tr, .theme-teamhost .youzify table.shop_table.order_details tfoot tr:last-child, .theme-teamhost .youzify-author .youzify-account-settings, .theme-teamhost .youzify-author .youzify-login, .theme-teamhost .youzify-community-hashtags .youzify-hashtag-item:hover, .theme-teamhost .youzify-current-bg-color, .theme-teamhost .youzify-current-checked-bg-color:checked, .theme-teamhost .youzify-forums-forum-item .youzify-forums-forum-icon i, .theme-teamhost .youzify-forums-topic-item .youzify-forums-topic-icon i, .theme-teamhost .youzify-group-manage-members-search #members_search_submit, .theme-teamhost .youzify-group-settings-tab input[type=submit], .theme-teamhost .youzify-items-list-widget .youzify-list-item .youzify-item-action .youzify-add-button i, .theme-teamhost .youzify-loading .youzify_msg, .theme-teamhost .youzify-media-filter .youzify-filter-item .youzify-current-filter, .theme-teamhost .youzify-nav-effect .youzify-menu-border, .theme-teamhost .youzify-pagination .page-numbers.current, .theme-teamhost .youzify-post .youzify-read-more, .theme-teamhost .youzify-post-content .youzify-post-type, .theme-teamhost .youzify-product-actions .youzify-addtocart, .theme-teamhost .youzify-project-content .youzify-project-type, .theme-teamhost .youzify-scrolltotop i:hover, .theme-teamhost .youzify-service-icon i:hover, .theme-teamhost .youzify-social-buttons .friendship-button a, .theme-teamhost .youzify-social-buttons .friendship-button a.requested, .theme-teamhost .youzify-tab-post .youzify-read-more, .theme-teamhost .youzify-tab-title-box, .theme-teamhost .youzify-user-actions .friendship-button a, .theme-teamhost .youzify-user-actions .friendship-button a.requested, .theme-teamhost .youzify-view-order .youzify-wc-main-content>p mark.order-status, .theme-teamhost .youzify-wall-actions .youzify-wall-post, .theme-teamhost .youzify-wall-embed .youzify-embed-action .friendship-button a, .theme-teamhost .youzify-wall-embed .youzify-embed-action .friendship-button a.requested, .theme-teamhost .youzify-wall-embed .youzify-embed-action .group-button a, .theme-teamhost .youzify-wall-file-post, .theme-teamhost .youzify-wall-new-post .youzify-post-more-button, .theme-teamhost .youzify-widget .youzify-user-tags .youzify-utag-values .youzify-utag-value-item, .theme-teamhost div.bbp-submit-wrapper button, .theme-teamhost input[type=submit] ,html   .theme-teamhost .youzify-current-bg-color , html .docspress-btn:hover, html .docspress-btn.hover , html  .youzify .activity-list li.load-more a , html .youzify-tool-btn , html .youzify-tabs-list-colorful #directory-show-filter a:before, html .youzify-tabs-list-colorful .youzify-default-subnav li:nth-child(9) a i  , html .l-sidebar form.mc4wp-form .mc4wp-form-fields input[type=submit] , .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button ,html  .elementor-widget-tm-image-slider .js-recommend .swiper-pagination-bullet-active, html .elementor-widget-tm-blog .js-trending .swiper-pagination-bullet-active,html #toggle , html .fl-gp-button a , .search-btn, .search-btn:hover, .swiper-pagination-horizontal .swiper-pagination-bullet-active, .uk-button-danger:hover, .uk-button-danger:focus, .uk-button-danger:active, .uk-button-danger.nice-select.open, .equipment-booking .rental-item__price-btn form.booking_form .book_now_btn:hover, .equipment-booking .equipment-item__btn form.booking_form .book_now_btn:hover, html .youzify #bp-browse-button, html body .fl-gp-button a:hover,.elementor-widget-tm-groups .js-popular .swiper-pagination-bullet-active, .elementor-widget-tm-popular-groups .js-popular2 .swiper-pagination-bullet-active , html .elementor-widget-tm-products .js-store .swiper-pagination-bullet-active, html #members-dir-list .fl-gp-box .fl-gp-footer .fl-gp-cells .fl-gp-cell-left .friendship-button:hover:before , .youzify-tabs-list-colorful #subnav a#membership-requests:before',
            'property'              => 'background-color',
            'suffix'                => '',
        ),

        array(
            'element'               => 'html .theme-teamhost #youzify-group-buttons .group-button a.join-group:hover , .wpcf7-submit:hover , .wc-tab#tab-reviews form.comment-form .submit-btn-container button:hover , input[type="submit"].dokan-btn-info:hover, a.dokan-btn-info:hover, .dokan-btn-info:hover, input[type="submit"].dokan-btn-info:focus, a.dokan-btn-info:focus, .dokan-btn-info:focus, input[type="submit"].dokan-btn-info:active, a.dokan-btn-info:active, .dokan-btn-info:active, input[type="submit"].dokan-btn-info.active, a.dokan-btn-info.active, .dokan-btn-info.active, .open .dropdown-toggleinput[type="submit"].dokan-btn-info, .open .dropdown-togglea.dokan-btn-info, .open .dropdown-toggle.dokan-btn-info,.sidebar-box .uk-nav li a::before,html #fl-page--preloader .fl-top-progress .fl-loader_left,html #fl-page--preloader .fl-top-progress .fl-loader_right, html #fl-page--preloader .fl--preloader-progress-bar span,.fl_main_product .widjet.--filters .widjet__body .widget.widget_text .wpfMainWrapper .wpfFilterWrapper[data-slug="price"] .wpfFilterContent #wpfSliderRange .ui-slider-handle,html  .uk-button-buy,html .page-main.nav_style_two .sidebar.is-show::-webkit-scrollbar-thumb,html .sidebar.is-show + .fl_main::-webkit-scrollbar-thumb,html .sidebar.is-hide + .fl_main::-webkit-scrollbar-thumb',
            'property'              => 'background-color',
            'suffix'                => '!important',
        ),


        array(
            'element'               => '.js-solution-slider .slider-nav .swiper-button-prev, .js-solution-slider .slider-nav .swiper-button-next, .fl--404-page-wrapper .fl-404-page-search-form .fl--search-form-404 .searchsubmit button , .uk-button-theme-color:hover, .uk-button-theme-color:focus, .uk-button-theme-color:active,.fl-button:before, .fl-button:after',
            'property'              => 'background',
            'suffix'                => '', 
        ),
        array(
            'element'               => '.newsletter',
            'property'              => 'background',
            'suffix'                => '',
        ),
        array(
            'element'               => '.js-solution-slider .slider-nav .swiper-button-prev, .js-solution-slider .slider-nav .swiper-button-next, .wpcf7-form .tm_home_contacts button:hover,
                                        .feature-item:hover .feature-item__box, .uk-button-default:hover,
                                        .widget_tag_cloud .tagcloud a:hover, .widget_tag_cloud .wp-block-tag-cloud a:hover, .widget_tag_cloud .tagcloud a:focus, .widget_tag_cloud .wp-block-tag-cloud a:focus, 
                                        .widget_tag_cloud .tagcloud a:active, .widget_tag_cloud .wp-block-tag-cloud a:active, .widget_tag_cloud .tagcloud a.nice-select.open, 
                                        .widget_tag_cloud .wp-block-tag-cloud a.nice-select.open, .tags-list a:hover, .tags-list a:focus, .tags-list a:active, .tags-list a.nice-select.open,
                                        #youzify-group-buttons a.leave-group:hover, #youzify-group-buttons a.membership-requested:hover ,  html body .youzify-group-navmenu .current.selected a:before , .youzify #youzify-members-list .youzify-user-actions a.youzify-send-message , .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt , .dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li ul.navigation-submenu li:hover:before, .dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li ul.navigation-submenu li.current:before,html blockquote',
            'property'              => 'border-color',
            'suffix'                => '',
        ),
        array(
            'element'               => '.stat-item',
            'property'              => 'border-right',
            'suffix'                => ' 2px solid',
        ),
        array(
            'element'               => '.equipment-order, blockquote',
            'property'              => 'border-left',
            'suffix'                => ' 5px solid',
        ),
        array(
            'element'               => '.uk-card-body a.more:hover span , html  .youzify-group-navmenu .current.selected a:before , #youzify-group-buttons a.leave-group:hover, #youzify-group-buttons a.membership-requested:hover, html .youzify-group-navmenu a.join-group:hover:before , .group-button a.request-membership:before, html .woocommerce .woocommerce-order-details .woocommerce-Price-amount.amount, html .youzify-widget .youzify-widget-main-content .youzify-widget-title i',
            'property'              => 'color',
            'suffix'                => '!important',
        ),

        array(
            'element'               => 'html .group-button a.leave-group:hover:before , html .docspress-btn:hover, html .docspress-btn.hover , html body div.widget.buddypress.widget_bp_core_members_widget div.item-options a.selected:before,.elementor-widget-tm-streams .fl-subnav ul li.uk-active a,.wc-tab#tab-reviews form.comment-form .submit-btn-container button:hover, html .dokan-settings-content .dokan-settings-area .dokan-banner,.youzify-blue-scheme .youzify .youzify-wc-main-content address .youzify-bullet, .youzify-blue-scheme .youzify ul.woocommerce-thankyou-order-details+p, .youzify-blue-scheme .youzify-bbp-topic-head, .youzify-blue-scheme .youzify-group-navmenu ul li.current, .youzify-blue-scheme .youzify-profile-navmenu .youzify-navbar-item.youzify-active-menu, .youzify-blue-scheme .youzify-view-order .youzify-wc-main-content>p',
            'property'              => 'border-color',
            'suffix'                => '!important',
        ),





    ),
) );



teamhost_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'primary_addi_color_setting',
    'label'         => esc_attr__( 'Primary Additional Color', 'teamhost' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => 'rgba(244, 97, 25, 0.05)',
    'choices'     => array(
        'alpha' => true,
    ),


    'output'      => array(

        array(
            'element'               => '.uk-card-body a.more:hover span  ',
            'property'              => 'color',
            'suffix'                => '!important',
        ),
        array(
            'element'               => ' html body  .youzify-group-navmenu .current.selected a:before , html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i,.youzify-directory-filter .item-list-tabs li.selected a span  , html .theme-teamhost #youzify-group-buttons .group-button a.join-group , html .youzify-group-navmenu a.join-group:before  , .theme-teamhost #youzify-group-buttons .group-button a.join-group , html .youzify-group-navmenu a:hover:before , html #youzify-profile-navmenu.youzify-group-navmenu .current.selected a span , .youzify #youzify-members-list .youzify-user-actions .follow-button a , .wpcf7-submit , .sidebar-box .uk-nav li.current-menu-item a , html blockquote , html .youzify-navbar-inline-icons .youzify-navbar-item a:hover i, #youzify .youzify .youzify-wc-main-content table.shop_table td a.woocommerce-MyAccount-downloads-file, , html #youzify .youzify .youzify-wc-main-content table.shop_table td a.view , .theme-teamhost .youzify .youzify-wc-main-content h3 ,  .theme-teamhost .youzify .youzify-wc-box-title h3 , .youzify-user-balance-box, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i, .youzify-directory-filter .item-list-tabs li.selected a span, .youzify-user-balance-box, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i,html  .youzify-directory-filter .item-list-tabs li.selected a span , html .youzify-user-balance-box, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i, html .youzify-directory-filter .item-list-tabs li.selected a span, html .youzify-user-balance-box, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i,html  .youzify-directory-filter .item-list-tabs li.selected a span',
            'property'              => 'background-color',
            'suffix'                => '!important',
        ),

        array(
            'element'               => 'html .uk-button-theme-color , html .sidebar-box .uk-nav li a:hover, .sidebar-box .uk-nav li a:focus, html .sidebar-box .uk-nav li a:active,html  .sidebar-box .uk-nav li a.nice-select.open,.yith-wcwl-add-to-wishlist',
            'property'              => 'background',
            'suffix'                => '',
        ),
        array(
            'element'               => '',
            'property'              => 'border',
            'suffix'                => ' 1px solid',
        ),
        array(
            'element'               => 'html .youzify-group-navmenu a:hover:before ',
            'property'              => 'border-color',
            'suffix'                => ' ',
        ),
    )
) );















teamhost_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'secondary_color_setting',
    'label'         => esc_attr__( 'Secondary Color Setting', 'teamhost' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => 'rgba(222, 51, 51, 0.34)',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(

        array(
            'element'               => '.feature-item__box .feature-item__title:hover, .equipment-item__price-current, .rental-item__price-current,
                                        .rental-item__title:hover, .rental-item__links a:hover, .equipment-item__links a:hover',
            'property'              => 'color',
            'suffix'                => '',
        ),
        array(
            'element'               => '.search-btn, .search-btn:hover, .swiper-pagination-horizontal .swiper-pagination-bullet-active, 
                                        .uk-button-danger:hover, .uk-button-danger:focus, .uk-button-danger:active, .uk-button-danger.nice-select.open,
                                        .equipment-booking .rental-item__price-btn form.booking_form .book_now_btn:hover, 
                                        .equipment-booking .equipment-item__btn form.booking_form .book_now_btn:hover , html .youzify #bp-browse-button ,  html body .fl-gp-button a:hover ',
            'property'              => 'background-color',
            'suffix'                => '',
        ),


        array(
            'element'               => ' .theme-teamhost .group-button.join-group:hover, .group-button.request-membership:hover,.theme-teamhost .youzify-social-buttons .friendship-button a:hover,#youzify-wall-form .youzify-wall-actions .youzify-wall-post:hover , html .theme-teamhost #youzify-members-list .youzify-user-actions .friendship-button .requested, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.uk-button-buy:hover',
            'property'              => 'background-color',
            'suffix'                => '!important',
        ),

        array(
            'element'               => '.js-solution-slider .slider-nav .swiper-button-prev:hover, .js-solution-slider .slider-nav .swiper-button-next:hover, 
                                        .js-solution-slider .slider-nav .swiper-button-prev:active, .js-solution-slider .slider-nav .swiper-button-next:active, 
                                        .js-solution-slider .slider-nav .swiper-button-prev:focus, .js-solution-slider .slider-nav .swiper-button-next:focus, 
                                        .equipment-item .uk-button-default:hover, .uk-pagination .page-numbers.current, .uk-pagination .page-numbers:hover',
            'property'              => 'background',
            'suffix'                => '',
        ),
        array(
            'element'               => '.js-solution-slider .slider-nav .swiper-button-prev:hover, .js-solution-slider .slider-nav .swiper-button-next:hover, 
                                        .js-solution-slider .slider-nav .swiper-button-prev:active, .js-solution-slider .slider-nav .swiper-button-next:active, 
                                        .js-solution-slider .slider-nav .swiper-button-prev:focus, .js-solution-slider .slider-nav .swiper-button-next:focus',
            'property'              => 'border',
            'suffix'                => ' 1px solid',
        ),
        array(
            'element'               => '.equipment-item .uk-button-default:hover, .uk-pagination .page-numbers.current, .uk-pagination .page-numbers:hover',
            'property'              => 'border-color',
            'suffix'                => ' ',
        ),
    )
) );

teamhost_Options::add_field( array(
        'type'          => 'color',
        'settings'      => 'secondary_addi_color_setting',
        'label'         => esc_attr__( 'Secondary Additional Color', 'teamhost' ),
        'section'       => 'style_setting',
        'priority'      => 1,
        'default'       => 'rgba(0, 136, 255, 0.56)',
        'choices'     => array(
            'alpha' => true,
        ),
        'output'      => array(
            array(
                'element'               => '',
                'property'              => 'color',
                'suffix'                => '',
            ),
        ),
    )
);



teamhost_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'third_color_setting',
    'label'         => esc_attr__( 'Third Color Setting', 'teamhost' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#1f75c1',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(
        array(
            'element'               => ' ',
            'property'              => 'color',
            'suffix'                => '!important',
        ),
        array(
            'element'               => 'html .youzify-user-balance-box .youzify-box-head ,  html .youzify-user-balance-box .youzify-user-level-data , .theme-teamhost #youzify-members-list .youzify-user-actions .friendship-button a, .theme-teamhost #youzify-wall-nav .item-list-tabs li#activity-filter-select label, .theme-teamhost .bbp-pagination .page-numbers.current, .theme-teamhost .button.accept, html .theme-teamhost .youzify .youzify-wc-main-content table.shop_table td.actions .coupon button ',
            'property'              => 'background',
            'suffix'                => '',
        ),
    )
) );

teamhost_Options::add_field( array(
        'type'          => 'color',
        'settings'      => 'third_addi_color_setting',
        'label'         => esc_attr__( 'Third Additional Color', 'teamhost' ),
        'section'       => 'style_setting',
        'priority'      => 1,
        'default'       => 'rgba(31, 118, 194, 0.57)',
        'choices'     => array(
            'alpha' => true,
        ),
        'output'      => array(
            array(
                'element'               => '.youzify-user-balance-box, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i, .youzify-directory-filter .item-list-tabs li.selected a span , .youzify-user-balance-box, html body .youzify-navbar-inline-icons .youzify-navbar-item.youzify-active-menu a i, .youzify-directory-filter .item-list-tabs li.selected a span',
                'property'              => 'background',
                'suffix'                => '',
            ),
        ),
    )
);

 
