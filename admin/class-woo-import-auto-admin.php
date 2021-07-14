<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://otho.dev
 * @since      1.0.0
 *
 * @package    Woo_Import_Auto
 * @subpackage Woo_Import_Auto/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Import_Auto
 * @subpackage Woo_Import_Auto/admin
 * @author     Otho DuBoise <okd@otho.dev>
 */
class Woo_Import_Auto_Admin {

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

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woo-import-auto-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woo-import-auto-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Create admin menu page and item using Wordpress.
	 * 
	 * @since 1.0.0
	 */
	public function admin_menu() {
		add_menu_page( 
			"Woo Import Automation Admin",
			"Woo Importer", 
			"manage_options", 
			"woo-import-auto", 
			array($this,'admin_menu_page')
		);
	}

	/**
	 * Include admin display view for admin menu page, acts as callable function
	 * 
	 * @since 1.0.0
	 */
	public function admin_menu_page() {
		include(plugin_dir_path( __FILE__ ) . "partials/woo-import-auto-admin-display.php");
	}

}
