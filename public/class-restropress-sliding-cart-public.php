<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://restropress.com/
 * @since      1.0.0
 *
 * @package    Restropress_Sliding_Cart
 * @subpackage Restropress_Sliding_Cart/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Restropress_Sliding_Cart
 * @subpackage Restropress_Sliding_Cart/public
 */
class Restropress_Sliding_Cart_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Restropress_Sliding_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Restropress_Sliding_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/restropress-sliding-cart-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Restropress_Sliding_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Restropress_Sliding_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/restropress-sliding-cart-public.js', array( 'jquery' ), $this->version, false );
        wp_localize_script($this->plugin_name, 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	}
	public function get_cart_details() {
		$subtotal = rpress_get_cart_subtotal();
		$cart_details = count(rpress_get_cart_content_details());
		$enable = rpress_get_option( 'sliding_cart_enable' );
		$response = array(
			'subtotal' => $subtotal,
			'cart_details' => $cart_details,
			'set_enablle' => $enable
		);
		wp_send_json($response);
	}
	public function add_floating_cart() {

		$enable = rpress_get_option( 'sliding_cart_enable' );
		$cart_items = rpress_get_cart_contents();
		if ( !$enable ) return;
		$sliding_cart_width = rpress_get_option('sliding_cart_width', '');  // Adjust the default width as needed
        $sliding_cart_badge_color = rpress_get_option('sliding_cart_badge_color', '#ff0000'); // Adjust the default color as needed
		if ($enable) {
			echo '<div id="rpress-floating-cart-icon"  style="width:100% ' .$sliding_cart_width.'">';
			echo '<span class="rpress-badge" style="color: ' . $sliding_cart_badge_color . ';"><sup>0</sup></span>'; // Replace with the actual total items
			echo '<i class="rpress-icon-cart"></i>';
			echo '</div>';
			echo '<div id="sliding-cart-window">';
			    
    
            echo '</div>';
		}
	}
}

$restropress_sliding_cart_public = new Restropress_Sliding_Cart_Public( 'restropress-sliding-cart', '1.0.0' );