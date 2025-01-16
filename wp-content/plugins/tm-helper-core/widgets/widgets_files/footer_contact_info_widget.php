<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FL_THEME_HELPER_Contact_Info extends TM_THEME_HELPER_WP_Widget {
	protected $widget_base_id = 'FL_THEME_HELPER_Contact_Info';
	protected $widget_name = 'Custom : Footer Contact Info';
	
	protected $options;

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
		$this->options = array(
            array(
                'address', 'text', '35 Oakridge Lane, NJ 08102',
                'label'		=> esc_html__('Address', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),
            array(
                'address_map', 'text', 'https://goo.gl/maps/XdgZbYX9V62UpBwc7',
                'label'		=> esc_html__('Address Map Url', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),



            array(
                'phone', 'text', '+1 (236) 799 5500 / 6600',
                'label'		=> esc_html__('Phone', 'fl-themes-helper'),
                'input'		=> 'text',
                'on_update'	=> 'esc_attr'
            ),

            array(
                'email', 'text', 'equipments@domain.net',
                'label'		=> esc_html__('Email', 'fl-themes-helper'),
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
		$el_class = '';
		
        extract( $args );
		$this->setInstances($instance, 'filter');

        $address = $this->getInstance('address');
        $address_map = $this->getInstance('address_map');
        if($address_map == ''){
            $address_map = '#';
        }
        $phone = $this->getInstance('phone');
        $email = $this->getInstance('email');

		/*HTML*/
        ?>
        <ul class="contacts-list">
            <?php if(isset($address) && $address != ''){?>
                <li>
                    <a href="<?php echo esc_url($address_map);?>" target="_blank">
                        <span data-uk-icon="location"></span>
                        <span><?php echo esc_html($address);?></span>
                    </a>
                </li>
            <?php } ?>

            <?php if(isset($phone) && $phone != ''){?>
                <li>
                    <a href="<?php echo esc_url('tel:' . $phone)?>">
                        <span data-uk-icon="receiver"></span>
                        <span><?php echo esc_html($phone);?></span>
                    </a>
                </li>
            <?php } ?>
            <?php if(isset($email) && $email != ''){?>
                <li>
                    <a href="<?php echo esc_url('mailto:'. $email);?>">
                        <span data-uk-icon="mail"></span>
                        <span><?php echo esc_html($email);?></span>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <?php

    }
}