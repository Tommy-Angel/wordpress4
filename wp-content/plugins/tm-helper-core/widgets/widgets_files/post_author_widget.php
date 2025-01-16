<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Author_Box extends TM_THEME_HELPER_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Author_Box';
	protected $widget_name = 'Custom : Author Box';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
			array(
				'title', 'text', 'Author Box',
				'label'		=> esc_html__('Title', 'fl-themes-helper'),
				'input'		=> 'text',
				'filters'	=> 'widget_title',
				'on_update'	=> 'esc_attr'
			),
		);
		
        parent::__construct();
    }
	
    /**
     * Display widget
     */
    function widget( $args, $instance ) {

		
        extract( $args );
		$this->setInstances($instance, 'filter');
		
        echo wp_kses($before_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
		
		$title = $this->getInstance('title');

		echo (!empty($title)) ? $before_title . $title . $after_title : '';


        ?>
        <?php
        $author_id = get_post_field( 'post_author', get_the_ID() );
        $user = get_user_by('ID', $author_id);
        $permalink = get_site_url() . '/members/' . $user->user_login;

        if(class_exists('WeDevs_Dokan')){
            $vendor = dokan()->vendor->get( $author_id );
            if ($vendor->data->user_nicename != ''){
                $permalink = get_site_url() . '/members/' . $vendor->data->user_nicename;
            } else {
                $permalink = get_site_url() . '/members/' . $user->user_login;
            }
        } else {
            $permalink = get_site_url() . '/members/' . $user->user_login;
        }


        if($user->first_name != ''){
            $show_name = $user->first_name;
        } else {
            $show_name = $user->display_name;
        }
        $user_avatar = get_avatar_url($author_id);
        if($user_avatar != ''){
            $avatar_img = '<img src="' .esc_url($user_avatar) . '" alt="Profile Photo" class="avatar" width="100" height="100">';
        } else {
            $avatar_img = '';
        }
        $count_user_posts = count_user_posts($author_id);
        ?>
        <aside class="l-sidebar">
                <div class="fl-gp-box fl-gp-box-single">
                    <div class="fl-cover-single">
                        <div class="fl-gp-info">
                            <div class="fl-gp-avatar">
                                <a href="<?php echo esc_url($permalink);?>" class="item-avatar">
                                    <?php echo teamhost_wp_kses($avatar_img);?>
                                </a>
                            </div>
                            <div class="fl-gp-title">
                                <a href="<?php echo esc_url($permalink);?>" class="bp-gp-home-link season-of-the-witch-home-link"><?php echo esc_html($show_name);?></a>
                            </div>
                            <div class="fl-gp-meta">
                                <div class="group-status"><?php echo esc_html($user->user_nicename);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="fl-gp-footer">
                        <div class="fl-gp-cells">
                            <div class="fl-gp-cell-left">
                                <strong>24</strong>
                                <span><?php echo __('Followers', 'teamhost');?></span>
                            </div>
                            <?php if(isset($count_user_posts) && $count_user_posts != ''){?>
                                <div class="fl-gp-cell-right">
                                    <strong><?php echo esc_html($count_user_posts);?></strong>
                                    <span><?php echo __('Posts', 'teamhost');?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="fl-gp-action">
                            <a class="fl-view-profile" rel="profile" href="<?php echo esc_url($permalink);?>"><?php echo __("View my profile", "teamhost")?></a>
                        </div>
                    </div>
                </div>
            </aside>
        <?php
        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}