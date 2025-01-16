<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
	<ul>
        <?php if(class_exists('WeDevs_Dokan')){
            $dukan_dash = get_option('dokan_pages', true);
            $dukan_dash_permalink = get_permalink($dukan_dash['dashboard']);
            if(isset($dukan_dash_permalink) && $dukan_dash_permalink != ''){
                ?>
                <li><a href="<?php echo esc_url($dukan_dash_permalink); ?>"><?php echo __('Vendor Shop', 'teamhost');?></a></li>
            <?php } ?>
        <?php } ?>
        <?php if(class_exists('BuddyPress') && class_exists('Youzify')) { ?>
            <?php
            $author_ID =  get_current_user_id();
            $user = get_user_by('ID', $author_ID);
            if(class_exists('WeDevs_Dokan')){
                $vendor = dokan()->vendor->get( $author_ID );
                if ($vendor->data->user_nicename != ''){
                    $permalink = get_site_url() . '/members/' . $vendor->data->user_nicename;
                    $permalink_password = get_site_url() . '/members/' . $vendor->data->user_nicename . '/settings/';
                } else {
                    $permalink = get_site_url() . '/members/' . $user->user_login;
                    $permalink_password = get_site_url() . '/members/' . $user->user_login . '/settings/';
                }
            } else {
                $permalink = get_site_url() . '/members/' . $user->user_login;
                $permalink_password = get_site_url() . '/members/' . $user->user_login . '/settings/';
            }
            ?>
            <li><a href="<?php echo esc_url($permalink)?>"><?php echo __('My profile', 'teamhost');?></a></li>
        <?php } ?>

        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
