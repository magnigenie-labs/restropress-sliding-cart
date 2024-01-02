
<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://restropress.com/
 * @since      1.0.0
 *
 * @package    Restropress_Sliding_Cart
 * @subpackage Restropress_Sliding_Cart/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Restropress_Sliding_Cart
 * @subpackage Restropress_Sliding_Cart/admin
 */
class Restropress_Sliding_Cart_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		// Register admin hooks
        add_filter( 'rpress_settings_general', array( $this, 'add_sliding_cart_settings' ), 10, 1 );
        add_filter( 'rpress_settings_sections_general', array( $this, 'add_sliding_cart_settings_section' ) );
        
        // add_action('wp_enqueue_scripts', 'enqueue_font_awesome');
        // add_action('wp_footer', array($restropress_sliding_cart_admin, 'add_floating_cart'));
		// add_action( 'wp_footer', array( $this, 'add_floating_cart' ) );

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/restropress-sliding-cart-admin.css', array(), $this->version, 'all' );
		
		// Enqueue Bootstrap CDN
		// wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );

	}
    
    
    // add_action('wp_enqueue_scripts', 'enqueue_font_awesome');
    

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/restropress-sliding-cart-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function add_sliding_cart_settings( $general_settings ) {
        // Add a new section for Sliding Cart settings
        $general_settings['sliding_cart_settings'] = array(
            'section_title' => __( 'Sliding Cart Settings', 'rp-sliding-cart' ),
            'section_desc'  => '',
            'section_id'    => 'sliding_cart_settings',
            'section_order' => 100, // Adjust the order as needed
        );
        // Enable Sliding Cart Checkbox
        $general_settings['sliding_cart_settings']['sliding_cart_enable'] = array(
            'id'    => 'sliding_cart_enable',
            'name'  => __( 'Enable Sliding Cart', 'rp-sliding-cart' ),
            'desc'  => __( 'Enable or disable the Sliding Cart feature.', 'rp-sliding-cart' ),
            'type'  => 'checkbox',
        );
        
        // Slider Cart Window Width
        $general_settings['sliding_cart_settings']['sliding_cart_width'] = array(
            'id'   => 'sliding_cart_width',
            'name' => __( 'Slider Cart Window Width', 'rp-sliding-cart' ),
            'desc' => __( 'Specify the width of the Sliding Cart window.', 'rp-sliding-cart' ),
            'type' => 'text',
        );
        // Total Items Badge Color
        $general_settings['sliding_cart_settings']['sliding_cart_badge_color'] = array(
            'id'    => 'sliding_cart_badge_color',
            'name'  => __( 'Total Items Badge Color', 'rp-sliding-cart' ),
            'desc'  => __( 'Choose the color of the total items badge.', 'rp-sliding-cart' ),
            'type'  => 'color',
        );
        
        // Add more Sliding Cart settings fields here following the same pattern
        return $general_settings;
    }
    public function add_sliding_cart_settings_section( $sections ) {
        $sections['sliding_cart_settings'] = __( 'Sliding Cart Settings', 'rp-sliding-cart' );
        return $sections;
    }
    
}