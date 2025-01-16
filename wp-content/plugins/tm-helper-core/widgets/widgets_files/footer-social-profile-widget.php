<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class TM_THEME_HELPER_Social_Profiles extends TM_THEME_HELPER_WP_Widget {
	protected $widget_base_id = 'TM_THEME_HELPER_Social_Profiles';
	protected $widget_name = 'Custom : Footer Social';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
            array(
                'fb', 'text', '#',
                'label'		=> esc_html__('Facebook Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'tw', 'text', '#',
                'label'		=> esc_html__('Twitter Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'in', 'text', '#',
                'label'		=> esc_html__('Instagram Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'linkedin', 'text','',
                'label'		=> esc_html__('Linkedin Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'you', 'text', '#',
                'label'		=> esc_html__('YouTube Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'c_l_1_i', 'text', '',
                'label'		=> esc_html__('Custom Icon 1 HTML Class:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'c_l_1', 'text', '',
                'label'		=> esc_html__('Custom Icon 1 Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'c_l_2_i', 'text', '',
                'label'		=> esc_html__('Custom Icon 2 HTML Class:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'c_l_2', 'text', '',
                'label'		=> esc_html__('Custom Icon 2 Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'c_l_3_i', 'text', '',
                'label'		=> esc_html__('Custom Icon 3 HTML Class:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'c_l_3', 'text', '',
                'label'		=> esc_html__('Custom Icon 3 Link:', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
		);
		
        parent::__construct();
    }
	
    /**
     * Display widget
     */
    function widget( $args, $instance ) {
        $result = '';
		
        extract( $args );
		$this->setInstances($instance, 'filter');

        $fb = $this->getInstance('fb');
        $tw = $this->getInstance('tw');
        $in = $this->getInstance('in');
        $linkedin = $this->getInstance('linkedin');
        $you = $this->getInstance('you');
        $c_l_1_i = $this->getInstance('c_l_1_i');
        $c_l_1 = $this->getInstance('c_l_1');
        $c_l_2_i = $this->getInstance('c_l_2_i');
        $c_l_2 = $this->getInstance('c_l_2');
        $c_l_3_i = $this->getInstance('c_l_3_i');
        $c_l_3 = $this->getInstance('c_l_3');

		/*HTML*/


            $result .='<ul class="social">';
                if(!empty($fb)){
                    $result .='<li>
                                    <a href="'.$fb.'"  target="_blank">
                                        <span data-uk-icon="facebook"></span>
                                    </a>
                                </li>';
                }
                if(!empty($tw)){
                    $result .='<li>
                                    <a href="'.$tw.'" target="_blank">
                                        <span data-uk-icon="twitter"></span>
                                    </a>
                                </li>';
                }
                if(!empty($in)){
                    $result .='<li>
                                    <a href="'.$in.'"  target="_blank">
                                        <span data-uk-icon="instagram"></span>
                                    </a>
                                </li>';
                }
                if(!empty($linkedin)){
                    $result .='<li>
                                    <a href="'.$linkedin.'"  target="_blank">
                                        <span data-uk-icon="linkedin"></span>
                                    </a>
                                </li>';
                }
                if(!empty($you)){
                    $result .='<li>
                                    <a href="'.$you.'"  target="_blank">
                                        <span data-uk-icon="youtube"></span>
                                    </a>
                                </li>';
                }

                if(!empty($c_l_1_i) and !empty($c_l_1)){
                    $result .='<li><a href="'.$c_l_1.'"  target="_blank"><i class="'.$c_l_1_i.'"></i></a></li>';
                }
                if(!empty($c_l_2_i) and !empty($c_l_2)){
                    $result .='<li><a href="'.$c_l_2.'"  target="_blank"><i class="'.$c_l_2_i.'"></i></a></li>';
                }
                if(!empty($c_l_3_i) and !empty($c_l_3)){
                    $result .='<li><a href="'.$c_l_3.'"  target="_blank"><i class="'.$c_l_3_i.'"></i></a></li>';
                }
            $result .='</ul>';



        echo !empty($result) ? $result : '';

    }
}