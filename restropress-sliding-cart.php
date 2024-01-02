<?php
/**
 * Plugin Name:       Restropress - Sliding Cart
 * Description:       Through this plugin you can able to add a Sliding Cart For RestroPress.
 * Version:           1.0.0
 * Author:            magnigenie
 * Author URI:        https://restropress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rp-sliding-cart
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'RESTROPRESS_SLIDING_CART_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-restropress-sliding-cart-activator.php
 */
function activate_restropress_sliding_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-restropress-sliding-cart-activator.php';
	Restropress_Sliding_Cart_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-restropress-sliding-cart-deactivator.php
 */
function deactivate_restropress_sliding_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-restropress-sliding-cart-deactivator.php';
	Restropress_Sliding_Cart_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_restropress_sliding_cart' );
register_deactivation_hook( __FILE__, 'deactivate_restropress_sliding_cart' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-restropress-sliding-cart.php';
// include_once(plugin_dir_path(__FILE__) . 'admin/restropress-sliding-cart-setting.php');




/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_restropress_sliding_cart() {

	$plugin = new Restropress_Sliding_Cart();
	$plugin->run();

}
run_restropress_sliding_cart();

// Add admin settings


