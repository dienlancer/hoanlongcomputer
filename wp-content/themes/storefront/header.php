<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="container slot">
	<div class="menu">
		<?php     
                                $args = array( 
                                        'menu'              => '', 
                                        'container'         => '', 
                                        'container_class'   => '', 
                                        'container_id'      => '', 
                                        'menu_class'        => 'menutop', 
                                        'menu_id'           => 'ja-cssmenu', 
                                        'echo'              => true, 
                                        'fallback_cb'       => 'wp_page_menu', 
                                        'before'            => '', 
                                        'after'             => '', 
                                        'link_before'       => '', 
                                        'link_after'        => '', 
                                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
                                        'depth'             => 3, 
                                        'walker'            => '', 
                                        'theme_location'    => 'menu-top' 
                                    );
                                wp_nav_menu($args);
                    ?> 
                    <div class="clr"></div>
	</div>
	<?php 
		do_action( 'storefront_before_header' ); 
		do_action( 'storefront_header' );
		do_action( 'storefront_before_content' );
	?>	
	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );
