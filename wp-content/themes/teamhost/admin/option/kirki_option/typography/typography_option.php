<?php
teamhost_Options::add_section('typography_setting', array(
    'title'             => esc_attr__( 'Typography', 'teamhost' ),
    'priority'          => 8,
    'panel'             => '',
    'icon'              => 'fa fa-font'
));

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'body_typography',
    'label'             => esc_attr__( 'Body', 'teamhost' ),
    'section'           => 'typography_setting',
    'default'     => array(
        'font-family'                       => 'Inter',
        'variant'                           => '400',
        'font-size'                         => '15px',
        'line-height'                       => '24px',
        'letter-spacing'                    => '',
        'color'                             => '#353535',
        'text-transform'                    => 'none',
        'text-align'                        => 'left',
    ),
    'priority'    => 1,
    'output'      => array(
        array(
            'element'                           => 'body',
        ),
    ),
) );

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'header_typography',
    'label'             => esc_attr__( 'Header Titles', 'teamhost' ),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'default' => array(
        'font-family'                       => 'Marcellus',
        'variant'                           => '600',
        'font-size'                         => '28px',
        'line-height'                       => '37px',
        'subsets'                           => false,
    ),
    'output'    => array(
        array(
            'element' => ' .entry-content .h1,  .entry-content .h2,  .entry-content .h3,
         .entry-content .h4,  .entry-content .h5,  .entry-content .h6, .fl-text-title-style, .youzify-hdr-v2 .youzify-name h2 , .docspress-single-content .entry-header .entry-title , .page-title , .article-intro .entry-title a , #activity-stream  .youzify-embed-name  , html .youzify-membership-form .form-title h2 , .uk-modal-title',
        ),
    ),
) ); 


teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'header_typography',
    'label'             => esc_attr__( 'Header Titles', 'teamhost' ),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'default' => array(
        'font-family'                       => 'Marcellus',
    ),
    'output'    => array(
        array(
            'element' => 'html .youzify-name h2,html .woocommerce-order h2',
        ),
    ),
) );





teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_regular',
    'label'             => esc_attr__('Font Style Regular Style One', 'teamhost'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Inter',
        'variant'                           => 'regular',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-regular , html  .youzify-widget .youzify-widget-main-content .youzify-widget-title , #sitewide-notice, #youzify div textarea, .widget.buddypress, .widget_bp_core_members_widget .item-options a, .widget_bp_core_sitewide_messages .bp-site-wide-message button, .widget_bp_groups_widget .item-options a, .youzify a, .youzify a.button, .youzify input, .youzify p, .youzify select, .youzify textarea, .youzify-dialog, .youzify-dialog-desc, .youzify-items-list-widget, .youzify-modal-actions a, .youzify-modal-actions button, .youzify-my-account-widget, .youzify-tool-btn .youzify-tool-name, .youzify-tooltip:after, .youzify-wp-widget, [data-youzify-tooltip]:after , body #youzify input, body .youzify, body .youzify button, body .youzify h3, body .youzify input '
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_regular_two',
    'label'             => esc_attr__('Font Style Regular Style Two', 'teamhost'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Inter',
        'variant'                           => 'regular',
    ),
    'output' => array(
        array(
            'element'                       => '.fl-font-style-regular-two , .lb-data .lb-caption, .lb-data .lb-number, .pagination .page-numbers, .youzify .youzify-link-content p, .youzify-aboutme-description, .youzify-aboutme-name, .youzify-box-404 h2, .youzify-box-404 p, .youzify-box-head .youzify-box-title, .youzify-form .youzify-form-message p, .youzify-info-msg p, .youzify-info-msg p strong, .youzify-infos-content ul li p, .youzify-infos-content ul li strong, .youzify-item-title, .youzify-post-content .youzify-post-title a, .youzify-post-plus4imgs .youzify-post-imgs-nbr, .youzify-post-type, .youzify-profile-login, .youzify-profile-navmenu .youzify-navbar-item a, .youzify-project-content .youzify-project-title, .youzify-project-type, .youzify-quote-content blockquote, .youzify-quote-owner, .youzify-recent-posts .youzify-post-head .youzify-post-title a, .youzify-recent-posts .youzify-post-meta ul li, .youzify-skill-bar-percent, .youzify-skillbar-title, .youzify-tab-comment .youzify-comment-excerpt p, .youzify-tab-comment .youzify-comment-fullname, .youzify-tab-comment .youzify-comment-title, .youzify-tab-post .youzify-post-meta ul li, .youzify-tab-post .youzify-post-text p, .youzify-tab-post .youzify-post-title a, .youzify-video-head .youzify-video-desc, .youzify-video-head .youzify-video-title, .youzify-wg-networks.youzify-icons-full-width li a, .youzify-widget .youzify-widget-title, .youzify_msg span, .youzify-user-balance-box .youzify-user-level-title , .my-friends.youzify-lightblue-scheme #friend-list .action a.accept, .youzify-lightblue-scheme #bbpress-forums #bbp-search-form #bbp_search_submit, .youzify-lightblue-scheme #bbpress-forums .bbp-search-form #bbp_search_submit, .youzify-lightblue-scheme #bbpress-forums li.bbp-footer, .youzify-lightblue-scheme #bbpress-forums li.bbp-header, .youzify-lightblue-scheme #group-create-tabs li.current, .youzify-lightblue-scheme #group-settings-form input[type=submit], .youzify-lightblue-scheme #message-recipients .highlight-icon i, .youzify-lightblue-scheme #search-members-form #members_search_submit, .youzify-lightblue-scheme #send-invite-form .submit input, .youzify-lightblue-scheme #send-reply #send_reply_button, .youzify-lightblue-scheme #send_message_form .submit #send, .youzify-lightblue-scheme #youzify-directory-search-box form input[type=submit], .youzify-lightblue-scheme #youzify-group-body h1:before, .youzify-lightblue-scheme #youzify-group-buttons .group-button a.join-group, .youzify-lightblue-scheme #youzify-groups-list .action .group-button .accept-invite, .youzify-lightblue-scheme #youzify-groups-list .action .group-button .join-group, .youzify-lightblue-scheme #youzify-groups-list .action .group-button .membership-requested, .youzify-lightblue-scheme #youzify-groups-list .action .group-button .request-membership, .youzify-lightblue-scheme #youzify-members-list .youzify-user-actions .friendship-button .requested, .youzify-lightblue-scheme #youzify-members-list .youzify-user-actions .friendship-button a, .youzify-lightblue-scheme #youzify-wall-nav .item-list-tabs li#activity-filter-select label, .youzify-lightblue-scheme .bbp-pagination .page-numbers.current, .youzify-lightblue-scheme .button.accept, .youzify-lightblue-scheme .group-button.accept-invite, .youzify-lightblue-scheme .group-button.join-group, .youzify-lightblue-scheme .group-button.request-membership, .youzify-lightblue-scheme .group-request-list .action .accept a, .youzify-lightblue-scheme .invitations .invitation-actions a.resend span, .youzify-lightblue-scheme .item-list-tabs #search-message-form #messages_search_submit, .youzify-lightblue-scheme .messages-notices .thread-options .read span, .youzify-lightblue-scheme .messages-options-nav #messages-bulk-manage, .youzify-lightblue-scheme .notifications .notification-actions .mark-read span, .youzify-lightblue-scheme .notifications-options-nav #notification-bulk-manage, .youzify-lightblue-scheme .pagination .current, .youzify-lightblue-scheme .sitewide-notices .thread-options .activate-notice, .youzify-lightblue-scheme .widget_display_forums li a:before, .youzify-lightblue-scheme .widget_display_search #bbp_search_submit, .youzify-lightblue-scheme .widget_display_topics li:before, .youzify-lightblue-scheme .widget_display_views li .bbp-view-title:before, .youzify-lightblue-scheme .youzify .checkout_coupon, .youzify-lightblue-scheme .youzify .wc-proceed-to-checkout a.checkout-button, .youzify-lightblue-scheme .youzify .wc-proceed-to-checkout a.checkout-button:hover, .youzify-lightblue-scheme .youzify .woocommerce-customer-details h2, .youzify-lightblue-scheme .youzify .youzify-attachment-file-icon, .youzify-lightblue-scheme .youzify .youzify-wc-box-title h3, .youzify-lightblue-scheme .youzify .youzify-wc-main-content #payment #place_order, .youzify-lightblue-scheme .youzify .youzify-wc-main-content .track_order .form-row button, .youzify-lightblue-scheme .youzify .youzify-wc-main-content .woocommerce-checkout-review-order table.shop_table tfoot .order-total, .youzify-lightblue-scheme .youzify .youzify-wc-main-content .woocommerce-checkout-review-order table.shop_table thead, .youzify-lightblue-scheme .youzify .youzify-wc-main-content button[type=submit], .youzify-lightblue-scheme .youzify .youzify-wc-main-content h3, .youzify-lightblue-scheme .youzify .youzify-wc-main-content table.shop_table td a.view:before, .youzify-lightblue-scheme .youzify .youzify-wc-main-content table.shop_table td a.woocommerce-MyAccount-downloads-file:before, .youzify-lightblue-scheme .youzify .youzify-wc-main-content table.shop_table td.actions .coupon button, .youzify-lightblue-scheme .youzify .youzify-wc-main-content table.shop_table td.woocommerce-orders-table__cell-order-number a, .youzify-lightblue-scheme .youzify .youzify-wc-main-content table.shop_table thead, .youzify-lightblue-scheme .youzify div.item-list-tabs li.youzify-activity-show-search .youzify-activity-show-search-form i, .youzify-lightblue-scheme .youzify table tfoot tr, .youzify-lightblue-scheme .youzify table thead tr, .youzify-lightblue-scheme .youzify table.shop_table.order_details tfoot tr:last-child, .youzify-lightblue-scheme .youzify-author .youzify-account-settings, .youzify-lightblue-scheme .youzify-author .youzify-login, .youzify-lightblue-scheme .youzify-community-hashtags .youzify-hashtag-item:hover, .youzify-lightblue-scheme .youzify-current-bg-color, .youzify-lightblue-scheme .youzify-current-checked-bg-color:checked, .youzify-lightblue-scheme .youzify-forums-forum-item .youzify-forums-forum-icon i, .youzify-lightblue-scheme .youzify-forums-topic-item .youzify-forums-topic-icon i, .youzify-lightblue-scheme .youzify-group-manage-members-search #members_search_submit, .youzify-lightblue-scheme .youzify-group-settings-tab input[type=submit], .youzify-lightblue-scheme .youzify-items-list-widget .youzify-list-item .youzify-item-action .youzify-add-button i, .youzify-lightblue-scheme .youzify-loading .youzify_msg, .youzify-lightblue-scheme .youzify-media-filter .youzify-filter-item .youzify-current-filter, .youzify-lightblue-scheme .youzify-nav-effect .youzify-menu-border, .youzify-lightblue-scheme .youzify-pagination .page-numbers.current, .youzify-lightblue-scheme .youzify-post .youzify-read-more, .youzify-lightblue-scheme .youzify-post-content .youzify-post-type, .youzify-lightblue-scheme .youzify-product-actions .youzify-addtocart, .youzify-lightblue-scheme .youzify-project-content .youzify-project-type, .youzify-lightblue-scheme .youzify-scrolltotop i:hover, .youzify-lightblue-scheme .youzify-service-icon i:hover, .youzify-lightblue-scheme .youzify-social-buttons .friendship-button a, .youzify-lightblue-scheme .youzify-social-buttons .friendship-button a.requested, .youzify-lightblue-scheme .youzify-tab-post .youzify-read-more, .youzify-lightblue-scheme .youzify-tab-title-box, .youzify-lightblue-scheme .youzify-user-actions .friendship-button a, .youzify-lightblue-scheme .youzify-user-actions .friendship-button a.requested, .youzify-lightblue-scheme .youzify-view-order .youzify-wc-main-content>p mark.order-status, .youzify-lightblue-scheme .youzify-wall-actions .youzify-wall-post, .youzify-lightblue-scheme .youzify-wall-embed .youzify-embed-action .friendship-button a, .youzify-lightblue-scheme .youzify-wall-embed .youzify-embed-action .friendship-button a.requested, .youzify-lightblue-scheme .youzify-wall-embed .youzify-embed-action .group-button a, .youzify-lightblue-scheme .youzify-wall-file-post, .youzify-lightblue-scheme .youzify-wall-new-post .youzify-post-more-button, .youzify-lightblue-scheme .youzify-widget .youzify-user-tags .youzify-utag-values .youzify-utag-value-item, .youzify-lightblue-scheme div.bbp-submit-wrapper button, .youzify-lightblue-scheme input[type=submit]'
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_bolt',
    'label'             => esc_attr__('Font Style Bolt Style One', 'teamhost'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Inter',
        'variant'                           => '700',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-bolt,.fl-vc-tabs .tabs-entry-content .nav-tabs li:before , body .youzify button, body .youzify h3, body .youzify input , html #youzify .fl-transports-archives .rental-item .rental-item__desc .rental-item__title,#youzify .youzify-directory-filter .item-list-tabs li select, #youzify-directory-search-box form input[type=submit], #youzify-directory-search-box form input[type=text], #youzify-groups-list .action a, #youzify-groups-list .item .item-meta span, #youzify-groups-list .item .item-title a, #youzify-members-list .youzify-fullname, #youzify-members-list .youzify-meta-item, #youzify-members-list .youzify-user-actions a '
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_bolt_three',
    'label'             => esc_attr__('Font Style Bolt Style Two', 'teamhost'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Inter',
        'variant'                           => '700',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-bolt-two'
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_lighter_than_two',
    'label'             => esc_attr__('Font Style Lighter Than', 'teamhost'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Inter',
        'variant'                           => '500',
    ),

));

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_semi_bolt',
    'label'             => esc_attr__('Font Style Semi Bolt Than', 'teamhost'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Inter',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-semi-bolt,.sidebar .widget_rss ul li .rsswidget,.sidebar .widget_calendar .calendar_wrap #wp-calendar caption,.transport-details .wrap-nav-table-content ul li span,.post-inner-pagination .pagination-text, .page-inner-pagination .pagination-text'
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_testimonial_regular',
    'label'             => esc_attr__('Font Style Testimonial Regular', 'teamhost'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Inter',
        'variant'                           => 'italic',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-regular-testimonial,.fl-vc-testimonial-slider-wrapper .testimonial-slider.testimonial-style-one .testimonial-slide .top-slider-content,.fl-vc-testimonial-slider-wrapper .testimonial-slider.testimonial-style-two .slide-content .top-slider-content'
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'slider',
    'settings'          => 'h1_size_typography',
    'label'             => esc_attr__('H1 Size', 'teamhost'),
    'section'           => 'typography_setting',
    'default'           => 48,
    'priority'          => 10,
    'choices' => array(
        'min'                               => '15',
        'max'                               => '75',
        'step'                              => '1',
    ),
    'output'      => array(
        array(
            'element'                           => 'h1, .h1',
            'property'                          => 'font-size',
            'units'                             => 'px',
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'slider',
    'settings'          => 'h2_size_typography',
    'label'             => esc_attr__('H2 Size', 'teamhost'),
    'section'           => 'typography_setting',
    'default'           => 32,
    'priority'          => 10,
    'choices' => array(
        'min'                               => '15',
        'max'                               => '75',
        'step'                              => '1',
    ),
    'output'      => array(
        array(
            'element'                           => 'h2, .h2',
            'property'                          => 'font-size',
            'units'                             => 'px',
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'slider',
    'settings'          => 'h3_size_typography',
    'label'             => esc_attr__('H3 Size', 'teamhost'),
    'section'           => 'typography_setting',
    'default'           => 28,
    'priority'          => 10,
    'choices' => array(
        'min'                               => '15',
        'max'                               => '75',
        'step'                              => '1',
    ),
    'output'      => array(
        array(
            'element'                           => 'h3, .h3',
            'property'                          => 'font-size',
            'units'                             => 'px',
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'slider',
    'settings'          => 'h4_size_typography',
    'label'             => esc_attr__('H4 Size', 'teamhost'),
    'section'           => 'typography_setting',
    'default'           => 24,
    'priority'          => 10,
    'choices' => array(
        'min'                               => '15',
        'max'                               => '75',
        'step'                              => '1',
    ),
    'output'      => array(
        array(
            'element'                           => 'h4, .h4',
            'property'                          => 'font-size',
            'units'                             => 'px',
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'slider',
    'settings'          => 'h5_size_typography',
    'label'             => esc_attr__('H5 Size', 'teamhost'),
    'section'           => 'typography_setting',
    'default'           => 20,
    'priority'          => 10,
    'choices' => array(
        'min'                               => '15',
        'max'                               => '75',
        'step'                              => '1',
    ),
    'output'      => array(
        array(
            'element'                           => 'h5, .h5',
            'property'                          => 'font-size',
            'units'                             => 'px',
        ),
    ),
));

teamhost_Options::add_field( array(
    'type'              => 'slider',
    'settings'          => 'h6_size_typography',
    'label'             => esc_attr__('H6 Size', 'teamhost'),
    'section'           => 'typography_setting',
    'default'           => 16,
    'priority'          => 10,
    'choices' => array(
        'min'                               => '15',
        'max'                               => '75',
        'step'                              => '1',
    ),
    'output'      => array(
        array(
            'element'                           => 'h6, .h6',
            'property'                          => 'font-size',
            'units'                             => 'px',
        ),
    ),
));
