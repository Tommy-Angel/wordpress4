<?php
// Streams Tab
function tm_theme_helper_profile_tab_streams() {
    global $bp;
    bp_core_new_nav_item( array(
        'name' => 'Streams',
        'slug' => 'streams',
        'screen_function' => 'tm_theme_helper_streams_screen',
        'position' => 40,
        'parent_url'      => bp_loggedin_user_domain() . '/streams/',
        'parent_slug'     => $bp->profile->slug,
        'default_subnav_slug' => 'streams'
    ) );
}
add_action( 'bp_setup_nav', 'tm_theme_helper_profile_tab_streams' );
function tm_theme_helper_streams_screen() {
    add_action( 'bp_template_title', 'tm_theme_helper_streams_title' );
    add_action( 'bp_template_content', 'tm_theme_helper_streams_content' );
    bp_core_load_template( 'buddypress/members/single/plugins' );
}
function tm_theme_helper_streams_title() {
    $return_title = '';
    $return_title .= '
                        <div class="item-list-tabs youzify-default-subnav no-ajax" id="subnav" aria-label="Member secondary navigation" role="navigation">
                            <ul>
                                <li id="posts-all-personal-li" class="current selected"><a id="all" href="#"><i class="fas fa-globe"></i>'.__("Streams", "tm-helper-core").'</a></li>
                            </ul>
                        </div>
                        ';
    echo $return_title;
}
function tm_theme_helper_streams_content() {
    global $wp_query;

    $author_ID =  bp_displayed_user_id();
    $author_level = false;
    if(class_exists('MemberOrder')){
        $author_level = pmpro_getMembershipLevelForUser($author_ID);
        tm_theme_helper_membership_draft_posts($author_ID);
    }

    if(isset($_GET['hide']) && $_GET['hide'] == 'false' && isset($_GET['stream_id']) && $_GET['stream_id'] != ''){
        wp_update_post(array(
            'ID'    =>  $_GET['stream_id'],
            'post_status'   =>  'publish'
        ));
    } elseif(isset($_GET['hide']) && $_GET['hide'] == 'true' && isset($_GET['stream_id']) && $_GET['stream_id'] != ''){
        wp_update_post(array(
            'ID'    =>  $_GET['stream_id'],
            'post_status'   =>  'draft'
        ));
    }

    $return_content = '<div class="youzify_streams_page_cont">';

    $message_car_add = '';
    if (!empty($_GET['add']) && 'ok' === $_GET['add']) {
        $message_car_add = '<span class="uk-alert-success">' . esc_attr__('Your request has been submitted and once approved your place will be available for show .', 'tm-helper-core') . '</span>';
    }

    if (isset($message_car_add)) {
        $return_content .= wp_specialchars_decode($message_car_add);
    }

    //Pending, draft
    $args_youzify_pending = array(
        'post_type'  => 'streams',
        'post_status' => array('pending', 'draft', 'publish'),
        'author'    =>  $author_ID,
    );
    $streams = get_posts($args_youzify_pending);

    $terms_html = '';
    $streams_html = '';
    $terms_arr = array();
    $terms_html .= '<li class="uk-active" data-uk-filter-control><a href="#">' . __('All', 'tm-helper-core') . '</a></li>';

    foreach ($streams as $steam){
        $terms = get_the_terms($steam->ID, 'streams-category');
        foreach ($terms as $term){
            if(!in_array( $term->slug, $terms_arr )){
                $terms_html .= '<li data-uk-filter-control="[data-type=\'' . $term->slug .'\']"><a href="#">' . $term->name .'</a></li>';
                $terms_arr[] = $term->slug;
            }

        }

        $streams_html .= '<li data-type="' . $term->slug .'">';

        $streams_html .= '<div class="stream-item">';




        $streams_html .= '<div class="stream-item__box">';
        $streams_html .= '<div class="stream-item__media" data-uk-lightbox="video-autoplay: true">';
        $protocols = array('https://', 'https://www.', 'http://', 'http://www.', 'www.');
        $link_site = str_replace($protocols, '', get_bloginfo('wpurl'));
        $link_site = strstr($link_site, '/', true);
        if('twitch' == tm_helper_get_metabox('stream_type', $steam->ID)){
            $acc_nickname = tm_helper_get_metabox('twitch_link', $steam->ID);
            $link = 'https://player.twitch.tv/?channel=' . tm_helper_get_metabox('twitch_link', $steam->ID) . '&parent=' . $link_site;
            $type = 'iframe';

            if(class_exists('TP_Twitch_Stream')){
                $streams = tp_twitch_get_streams( array('streamer' => $acc_nickname));
                foreach ($streams as $str){
                    $status = $str->stream['type'];
                    $views = $str->get_viewer( true );
                    $thumb_url = $str->get_thumbnail_url(283, 206);
                    $alt = $str->get_thumbnail_alt();
                }
            }
        } else {
            $acc_nickname = tm_helper_get_metabox('youtube_acc', $steam->ID);
            $link = tm_helper_get_metabox('youtube_link', $steam->ID);
            $type = 'youtube';
        }

        $streams_html .= '<a href="'. $link .'" data-type="' . $type . '" data-attrs="width: 1280; height: 720;" data-caption="' . $steam->post_title . '">';
        if(isset($thumb_url) && $thumb_url != ''){
            $streams_html .= '<img src="' . $thumb_url . '" alt="' . $alt . '" />';
        } elseif(has_post_thumbnail($steam->ID)){
            $streams_html .= '<img src="' . get_the_post_thumbnail_url($steam->ID) . '" alt="' . $steam->post_title . '" />';
        } else {
            $streams_html .= '<img src="' . TM_HELPER_CORE_PREVIEW_IMAGE . '/no_image.jpg" alt="' . $steam->post_title . '" />';
        }

        $streams_html .= '</a>';
        $streams_html .= '<div class="stream-item__info">';
        if(isset($status) && $status != ''){
            $streams_html .= ' <div class="stream-item__status ' . $status .'">' .$status . '</div>';
        }

        if(isset($views) && $views != ''){
            $streams_html .= '<div class="stream-item__count">' . $views . '</div>';
        }
        $streams_html .= '</div>';
        $streams_html .= '</div>';
        $streams_html .= '<div class="stream-item__body">
                                                    <a class="stream-item__title" href="' . get_permalink($steam->ID) . '">' . $steam->post_title .'</a>
                                                    <div class="stream-item__nicname">' . $acc_nickname . '</div>
                                                    <div class="stream-item__time"><i class="icon-calendar"></i>' . tm_altered_post_time_ago_function($steam->ID) . '</div>';



        $streams_html .= '</div>';


        //Edit btns
        if( is_user_logged_in() ):
            $author_ID =  bp_displayed_user_id();
            $user = get_user_by('ID', $author_ID);
            $streams_html .= '<div class="tm_edit_btns_contain">';
            if( $author_ID == get_current_user_id()){
                $streams_html .= '<a class="tm-autos-top-edit-button" href="' . esc_url(get_site_url().'/members/') . $user->user_login . '/add_streams?stream_id=' . $steam->ID .'"><span>' . __('Edit', 'tm-helper-core') . '</span></a>';
                if($steam->post_status == 'draft'){
                    $streams_html .= '<a class="tm-autos-top-draft-button" href="' . esc_url(get_site_url().'/members/') . $user->user_login . '/streams?hide=false&stream_id=' . $steam->ID . '">';
                    $streams_html .= '<span>' . __('Show', 'templines-helper-core') . '</span>';
                    $streams_html .= '</a>';
                } elseif ($steam->post_status == 'publish'){
                    $streams_html .= '<a class="tm-autos-top-draft-button" href="' . esc_url(get_site_url().'/members/') . $user->user_login . '/streams?hide=true&stream_id=' . $steam->ID . '">';
                    $streams_html .= '<span>' . __('Hide', 'tm-helper-core') . '</span>';
                    $streams_html .= '</a>';
                }
            }
            $streams_html .= '</div>';
        endif;



        $streams_html .= '</div>';
        $streams_html .= '</div>';

        $streams_html .= '</li>';

    }








    /*
    if(isset($terms_html) && $terms_html != ''){
        $return_content .= '<div class="fl-subnav">
                    <ul class=" uk-subnav uk-subnav-pill">';
        $return_content .= $terms_html;
        $return_content .= '</ul>
                </div>';
    }*/
    if(isset($streams_html) && $streams_html != ''){
        $return_content .= '<ul class="js-filter uk-grid-small uk-child-width-1-1 uk-child-width-1-5@xl uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid>';
            $return_content .= $streams_html;
        $return_content .= '</ul>';
    }



    $return_content .= '</div>';
    echo $return_content;

}

// Add Streams Tab
function tm_theme_helper_profile_tab_add_streams() {
    global $bp;
    bp_core_new_nav_item( array(
        'name' => 'Add Stream',
        'slug' => 'add_streams',
        'screen_function' => 'tm_theme_helper_add_streams_screen',
        'position' => 40,
        'parent_url'      => bp_loggedin_user_domain() . '/add_streams/',
        'parent_slug'     => $bp->profile->slug,
        'default_subnav_slug' => 'add_streams'
    ) );

}
add_action( 'bp_setup_nav', 'tm_theme_helper_profile_tab_add_streams' );
function tm_theme_helper_add_streams_screen() {
    add_action( 'bp_template_title', 'tm_theme_helper_add_streams_title' );
    add_action( 'bp_template_content', 'tm_theme_helper_add_streams_content' );
    bp_core_load_template( 'buddypress/members/single/plugins' );
}
function tm_theme_helper_add_streams_title() {
    $return_title = '';

    if (isset($_GET['stream_id']) && $_GET['stream_id'] != ''){
        $return_title .= '
                        <div class="item-list-tabs youzify-default-subnav no-ajax" id="subnav" aria-label="Member secondary navigation" role="navigation">
                            <ul>
                                <li id="posts-all-personal-li" class="current selected"><a id="all" href="#"><i class="fas fa-edit"></i>'.__("Edit Stream", "tm-helper-core").'</a></li>
                            </ul>
                        </div>
                        ';
    } else {
        $return_title .= '
                        <div class="item-list-tabs youzify-default-subnav no-ajax" id="subnav" aria-label="Member secondary navigation" role="navigation">
                            <ul>
                                <li id="posts-all-personal-li" class="current selected"><a id="all" href="#"><i class="fas fa-plus-square"></i>'.__("Add Stream", "tm-helper-core").'</a></li>
                            </ul>
                        </div>
                        ';
    }


    echo $return_title;
}
function tm_theme_helper_add_streams_content() {

    $author_ID =  bp_displayed_user_id();
    $user = get_user_by('ID', $author_ID);
    $author_level = true;
    $notice = '';
    if(function_exists('pmpro_getMembershipLevelForUser')){
        $author_level = pmpro_getMembershipLevelForUser($user->ID);
    }


    if(class_exists('WeDevs_Dokan')){
        $vendor = dokan()->vendor->get( $author_ID );
        if ($vendor->data->user_nicename != ''){
            $redirect_url = home_url() . '/members/'. $vendor->data->user_nicename .'/streams/?add=ok';
        } else {
            $redirect_url = home_url() . '/members/'. $user->user_login .'/streams/?add=ok';
        }
    } else {
        $redirect_url = home_url() . '/members/'. $user->user_login .'/streams/?add=ok';
    }



    if(is_user_logged_in()){
        acf_form_head();
        if (isset($_GET['stream_id']) && $_GET['stream_id'] != ''){
            if($author_level != false){
                acf_form(array(
                    'post_id'       => $_GET['stream_id'],
                    'post_title'    => true,
                    'post_content'  => true,
                    'fields' => array(
                        "field_601b481sdasdasdd60c42",
                        "field_63525d3de135s2a96",
                        "field_63525dffsaedasdasd6",
                        "field_63525dasd3333asd6",
                    ),
                    'submit_value'  => __('Update meta')
                ));
            } else {
                echo $notice;
            }

        } else {
            if($author_level != false){
                acf_form(array(
                        'post_id' => 'new_post',
                        'new_post'	=> array(
                            'post_type'	=> 'streams',
                            'post_status'=> 'pending', // Post Content ACF field key
                        ),
                        'fields' => array(
                            "field_601b481sdasdasdd60c42",
                            "field_63525d3de135s2a96",
                            "field_63525dffsaedasdasd6",
                            "field_63525dasd3333asd6",
                        ),
                        'id' => 'form_draft',
                        'html_after_fields' => '<input type="hidden" id="hiddenId" name="acf[current_step]" value="1"/>',
                        'return' => $redirect_url,
                        'post_title' => true,
                        'post_content' => true,
                        'submit_value' => __('Add Stream', 'tm-helper-core')
                    )
                );
            } else {
                echo $notice;
            }
        }

    } else {
        //echo do_shortcode('[youzify_login]');
        acf_form_head();
        if (isset($_GET['stream_id']) && $_GET['stream_id'] != ''){
            if($author_level != false) {
                acf_form(array(
                    'post_id' => $_GET['stream_id'],
                    'post_title' => true,
                    'post_content' => true,
                    'fields' => array(
                        "field_601b481sdasdasdd60c42",
                        "field_63525d3de135s2a96",
                        "field_63525dffsaedasdasd6",
                        "field_63525dasd3333asd6",
                    ),
                    'submit_value' => __('Update meta')
                ));
            } else {
                echo $notice;
            }
        } else {
            if($author_level != false) {
                acf_form(array(
                        'post_id' => 'new_post',
                        'new_post' => array(
                            'post_type' => 'streams',
                            'post_status' => 'pending', // Post Content ACF field key
                        ),
                        'fields' => array(
                            "field_601b481sdasdasdd60c42",
                            "field_63525d3de135s2a96",
                            "field_63525dffsaedasdasd6",
                            "field_63525dasd3333asd6",

                        ),
                        'id' => 'form_draft_disabled',
                        'html_after_fields' => '<input type="hidden" id="hiddenId" name="acf[current_step]" value="1"/>',
                        'post_title' => true,
                        'return' => $redirect_url,
                        'post_content' => true,
                        'submit_value' => __('Add Stream', 'tm-helper-core')
                    )
                );
            } else {
                echo $notice;
            }
        }
    }
}


//Profile Widget
function tm_theme_helper_profile_shortcode() {

    $user_id = bp_displayed_user_id();

    $user = get_user_by('ID', $user_id);
    $permalink = get_site_url() . '/members/' . $user->user_login;
    if ($user->first_name != '') {
        $show_name = $user->first_name;
    } else {
        $show_name = $user->display_name;
    }
    $user_avatar = get_avatar_url($user_id);
    if ($user_avatar != '') {
        $avatar_img = '<img src="' . esc_url($user_avatar) . '" alt="Profile Photo" class="avatar" width="100" height="100">';
    } else {
        $avatar_img = '';
    }
    $count_user_posts = count_user_posts($user_id);


    $return_html = '';
    $return_html .= '<div class="fl-gp-box fl-gp-box-single">
                        <div class="fl-cover-single">
                            <div class="fl-gp-info">
                                <div class="fl-gp-avatar">
                                    <a href="' . esc_url($permalink) . '" class="item-avatar">
                                        ' . teamhost_wp_kses($avatar_img) . '
                                    </a>
                                </div>
                                <div class="fl-gp-title">
                                    <a href="' . esc_url($permalink) . '" class="bp-gp-home-link season-of-the-witch-home-link">' .  esc_html($show_name) . '</a>
                                </div>
                                <div class="fl-gp-meta">
                                    <div class="group-status">' . esc_html($user->user_nicename) . '</div>
                                </div>
                            </div>
                        </div>
    
                        <div class="fl-gp-footer">
                            <div class="fl-gp-cells">';

    $return_html .= '<div class="fl-gp-cell-left">
                                        <strong>24</strong>
                                        <span>Followers</span>
                                    </div>';

    if(isset($count_user_posts) && $count_user_posts != '') {
        $return_html .= '<div class="fl-gp-cell-right">
                                    <strong>' . esc_html($count_user_posts) . '</strong>
                                    <span>' . __("Posts", "tm-helper-core"). '</span>
                                </div>';
    }

    $return_html .= '</div>
    
                            <div class="fl-gp-action">
                                <a class="fl-view-profile" rel="profile" href="' . esc_url($permalink) .'">' . __("View my profile", "tm-helper-core") . '</a>
                            </div>
                        </div>
                    </div>';
    return $return_html;

}
add_shortcode('tm_theme_helper_profile', 'tm_theme_helper_profile_shortcode');


//Friends Widget
function tm_theme_helper_friends_shortcode() {


    $user_friends = apply_filters( 'youzify_friends_get_friend_user_ids', friends_get_friend_user_ids( bp_displayed_user_id() ) );
    $friends_nbr = friends_get_total_friend_count( bp_displayed_user_id() );
    if ( $friends_nbr <= 0 ) {
        return;
    }
    $max_friends = youzify_option( 'youzify_wg_max_friends_items', 5 );

    $return_html = '<section class="widget section-sidebar bg-light">
                                    <div class="widget-content">
                                        <div class="widget-inner">';

    $j = 1;

    foreach ($user_friends as $friend_id){
        if($j <= 3){
            $return_html .= '<section class="post-widget clearfix">
                                                <div class="post-widget__media">
                                                    <a href="' . bp_core_get_user_domain( $friend_id ) . '">
                                                        ' . bp_core_fetch_avatar( array( 'item_id' => $friend_id, 'type' => 'full', 'width' => '60px', 'height' => '60px' ) ) . '
                                                    </a>
                                                </div>
                                                <div class="post-widget__inner">
                                                    <h2 class="post-widget__title"><a href="' . bp_core_get_user_domain( $friend_id ) . '">' . bp_core_get_user_displayname( $friend_id ) .'</a></h2>
                                                    <div class="post-widget__date">
                                                        <time datetime="2020-10-27 15:20">Dec 15, 2020</time>
                                                    </div>
                                                </div>
                                            </section>';
        }
        $j++;
    }



    if ( $friends_nbr > $max_friends ) :
        $return_html .= '<button class="uk-button  uk-button-theme-color uk-width-1-1 uk-margin-small-bottom ">' . __('View All', 'tm-helper-core') . '</button>
                                        </div>
                                    </div>
                                </section>';
    endif;


    return $return_html;

}
add_shortcode('tm_theme_helper_friends', 'tm_theme_helper_friends_shortcode');


//Widgets
//Membership Levels
function tm_theme_helper_paid_membership_level_shortcode() {

    if(class_exists('MemberOrder')) {



        if (is_user_logged_in()) {
            $html = '';
            $author_ID = bp_displayed_user_id();
            $current_user_id = get_current_user_id();
            $author_level = pmpro_getMembershipLevelForUser($current_user_id);

            if ($author_level == false) {
                $html .= '<div class="fl_themes_form_notice_wrap"><span>' . __('Please select a ', 'tm-helper-core') . '
                        <a href="' . esc_url(home_url("/membership-account/membership-levels/")) . '">' . __('plan',
                        'tm-helper-core') . '</a>
                        ' . __(' to add a vehicle. ', 'tm-helper-core') . '
                    </span></div>';
            }

            if ($current_user_id == $author_ID) {
                if ($author_level->name != '') {
                    $html .= '<div class="tm_theme_helper_your_level">' . __('Your Level: ',
                            'tm-helper-core') . $author_level->name . '</div>';
                }
                if ($author_level->startdate != 0 && $author_level->startdate != '') {
                    $html .= '<div class="tm_theme_helper_your_level_start">' . __('Start: ',
                            'tm-helper-core') . date("d F, Y", $author_level->startdate) . '</div>';
                }
                if ($author_level->enddate != 0 && $author_level->enddate != '') {
                    $html .= '<div class="tm_theme_helper_your_level_end">' . __('End: ', 'tm-helper-core') . date("d F, Y",
                            $author_level->enddate) . '</div>';
                }
                if ($author_level->description != '') {
                    $html .= '<div class="tm_theme_helper_your_description">' . $author_level->description . '</div>';
                }
                $html .= '<div class="tm_theme_helper_show_levels">' . '<a class="tm_theme_helper_show_levels_btn" href="' . esc_url(home_url("/membership-account/membership-levels/")) . '">' . __("All Levels",
                        "tm-helper-core") . '</a>' . '</div>';


            }




            return $html;
        }
    }

}
add_shortcode('tm_theme_helper_level', 'tm_theme_helper_paid_membership_level_shortcode');


//Woo Orders
function tm_theme_helper_woo_orders_shortcode() {

    if(class_exists('WooCommerce')) {
        if(class_exists('TMBooking__Helping_Addons')){
            if (is_user_logged_in()) {
                global $wpdb;
                $html = '';
                $author_ID = bp_displayed_user_id();
                $current_user_id = get_current_user_id();
                $html .= '<div class="tm_theme_helper_orders">';
                if($author_ID == $current_user_id){
                    $args = array(
                        'author'    =>  $author_ID,
                        'numberposts'      => -1,
                        'post_type'        => 'streams',
                        'suppress_filters' => true,
                        'fields'        => 'ids'
                    );
                    $streams = get_posts($args);
                    $orders_count = 0;

                    $html .= '<div class="orders_count">';
                    $html .= __('Orders', 'tm-helper-core');

                    foreach ($streams as $t){
                        $sql_order_id = $wpdb->prepare( "SELECT order_id FROM {$wpdb->prefix}tmbooking_order WHERE stream_id=%d", $t );
                        $order_id = $wpdb->get_var( $sql_order_id );
                        if($order_id != '' && $order_id != NULL){
                            $order = wc_get_order( $order_id );
                            $orders_count++;

                        }
                    }

                    $html .= '<span>' . $orders_count . '</span>';
                    $html .= '</div>';
                }

                $html .= '</div>';



                return $html;
            }
        }
    }

}
add_shortcode('tm_theme_helper_orders', 'tm_theme_helper_woo_orders_shortcode');


//Woo Sales
function tm_theme_helper_woo_sales_shortcode() {

    if(class_exists('WooCommerce')) {
        if(class_exists('TMBooking__Helping_Addons')){
            if (is_user_logged_in()) {
                global $wpdb;
                $html = '';
                $author_ID = bp_displayed_user_id();
                $current_user_id = get_current_user_id();
                $html .= '<div class="tm_theme_helper_sales">';
                if($author_ID == $current_user_id){

                    $html .= '<div class="sales_container">';
                    $html .= '<span>' . tmbooking_get_price_with_currency(wc_get_customer_total_spent($current_user_id)) . '</span>';
                    $html .= '</div>';

                }

                $html .= '</div>';



                return $html;
            }
        }
    }

}
add_shortcode('tm_theme_helper_sales', 'tm_theme_helper_woo_sales_shortcode');