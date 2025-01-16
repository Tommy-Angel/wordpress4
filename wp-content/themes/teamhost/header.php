<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>




<?php
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
} ?>

<?php if(teamhost_get_theme_mod('dark_theme_switcher') == 'enable' ){ ?>
    <input id="toggle" type="checkbox">
    <script type="text/javascript">
        document.getElementById("toggle").addEventListener("click", function() {
            document.getElementsByTagName('body')[0].classList.toggle("dark-theme");
        });
    </script>
<?php } ?>
<input type="hidden" id="dark_default" value="<?php echo esc_attr(teamhost_get_theme_mod('dark_theme_default'))?>">

<?php
$css_classes[] = 'page-wrapper tm-main-holder-wrapper page-wrapper';
if (!class_exists('TM_Helper_Core_Addons')){
    $css_classes[] = 'tm-helping-plugin-not-found';
}


// Fixed Nav Bar
$padding_fixed_navbar = '';
$fixed_nav_bar = teamhost_get_theme_mod('fixed_nav');
$menu_style = teamhost_get_theme_mod('menu_style');

if($fixed_nav_bar == 'true'){

    if($menu_style == 'style_two'){
        $padding_fixed_navbar .= ' fixed-navbar-two';
    } else {
        $padding_fixed_navbar = 'padding-fixed-navbar';
    }

} else {
    $padding_fixed_navbar = '';
}

$css_classes[] = 'nav_'.$menu_style;

if(teamhost_get_theme_mod('page_navigator', true) == 'custom'){
    $menu_style = teamhost_get_theme_mod('menu_style', 'true');
}

$page_template = get_page_template_slug(get_the_ID());
if(is_search()){
    $page_template = '';
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
?>
<?php if($page_template != 'template-login.php'){ ?>
    <?php get_template_part('template-parts/preloader/preloader'); ?>
<?php } ?>


<!-- Main holder -->
<?php
if($page_template != 'template-login.php'){ ?>
    <div id="tm-main-holder" class="<?php echo esc_attr(trim($css_class)); ?> <?php echo esc_attr($padding_fixed_navbar)?>">
    <?php get_template_part('template-parts/navigation/navigator_content'); ?>
<?php } ?>