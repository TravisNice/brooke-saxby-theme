<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

<?php get_template_part( 'template-parts/menu', 'left' ); ?>

<div class="right-side col span-12 span-12mf span-10lf marg-2lf left"> <!-- Close before the body tag in the footer -->

<header class="header clearfix">
<div class="col span-12 align-center pad-12 fuscia-front grey-back shadow-bottom left remove-margin no-underline bottom-16">
<div class="col span-12 align-right">
<?php global $woocommerce; ?><a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
</div>
<h1 class="cursive xx-large"><a href="/"><?php bloginfo( 'name '); ?></a></h1>
<h3 class="large"><?php bloginfo( 'description' ); ?></h3>
<span onclick="open_nav()" class="xx-large hide-large no-underline-ever"><a href="#">&#9776;</a></span>
</div>

</header>

