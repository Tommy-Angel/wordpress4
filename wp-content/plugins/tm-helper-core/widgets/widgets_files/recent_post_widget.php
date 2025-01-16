<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Recent_Post extends TM_THEME_HELPER_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Recent_Post';
	protected $widget_name = 'Custom : Recent News';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
			array(
				'title', 'text', 'LATEST NEWS',
				'label'		=> esc_html__('Title', 'fl-themes-helper'),
				'input'		=> 'text',
				'filters'	=> 'widget_title',
				'on_update'	=> 'esc_attr'
			),
            array(
                'post_per_page', 'int', 2,
                'label'		=> esc_html__('Limit', 'tm-helper-core'),
                'input'		=> 'select',
                'values'	=> array('range', 'from'=>1, 'to'=>6),
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
        $post_per_page = $this->getInstance('post_per_page');

		echo (!empty($title)) ? $before_title . $title . $after_title : '';

        $query = new WP_Query(array(
            'posts_per_page'		=> $post_per_page,
            'ignore_sticky_posts'	=> 1,
            'orderby'               => 'date',
            'order'                 => 'DESC'
        ));
        $query->set('suppress_filters', 'false');
        $query->set('orderby', 'post_views');
        $query->set('order', 'DESC');

        $image_size = 'teamhost_size_size_95x88_crop';
        ?>
        <ul class="list-articles">
            <?php global $post; if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
                <li class="list-articles-item">
                    <a class="list-articles-item__link" href="<?php the_permalink(); ?>">
                        <div class="list-articles-item__img">
                            <?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
                        </div>
                        <div class="list-articles-item__info">
                            <?php $title = get_the_title( $query->ID ); ?>
                            <div class="list-articles-item__title"><?php echo esc_attr(tm_japanworm_shorten_title($title, 23), 'tm-helper-core'); ?></div>
                            <div class="list-articles-item__date"><span data-uk-icon="calendar"></span><span><?php echo get_the_date('F j, Y');?></span></div>
                        </div>
                    </a>
                </li>


            <?php endwhile; endif; wp_reset_query();?>
        </ul>
        <?php
        echo wp_kses($after_widget, array(
				'div' => array('id' => array(), 'class' => array()),
				'section' => array('id' => array(), 'class' => array())
			));
    }
}