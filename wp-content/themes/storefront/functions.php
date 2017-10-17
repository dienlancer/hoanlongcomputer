<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
add_action('init', 'zendvn_theme_register_menus');
function zendvn_theme_register_menus(){
	register_nav_menus(
		array(						
			'menu-top' 				=> __('MenuTop'),			
		)
	);
}
add_action('wp_footer', 'zendvn_theme_script_code');
function zendvn_theme_script_code(){
	echo '<script type=\'text/javascript\'>
	var wpexLocalize = {
		"mobileMenuOpen" : "Browse Categories",
		"mobileMenuClosed" : "Close navigation",
		"homeSlideshow" : "false",
		"homeSlideshowSpeed" : "7000",
		"UsernamePlaceholder" : "Username",
		"PasswordPlaceholder" : "Password",
		"enableFitvids" : "true"
	};	
	</script>';
}
add_action('wp_enqueue_scripts', 'zendvn_theme_register_js');
function zendvn_theme_register_js(){	
	wp_register_script('mootools', get_template_directory_uri() . '/assets/ja_moomenu/mootools.js',array(),"1.0",false);
	wp_enqueue_script('mootools');
	wp_register_script('ja_moomenu', get_template_directory_uri() . '/assets/ja_moomenu/ja.moomenu.js',array(),"1.0",false);
	wp_enqueue_script('ja_moomenu');	
}
add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');
function zendvn_theme_register_style(){	
	wp_register_style('jamoomenu', get_template_directory_uri() . '/assets/ja_moomenu/ja.moomenu.css',array(),"1.0","all");
	wp_enqueue_style('jamoomenu');	
	wp_register_style('template',get_template_directory_uri() . '/assets/css/template.css',array(),"1.0","all");
	wp_enqueue_style('template');	
}