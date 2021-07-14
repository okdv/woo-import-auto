<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://otho.dev
 * @since             1.0.0
 * @package           Woo_Import_Auto
 *
 * @wordpress-plugin
 * Plugin Name:       Woo Import Automation
 * Plugin URI:        https://github.com/okdv/woo-import-auto
 * Description:       Easily and automatically import WooCommerce products
 * Version:           1.0.0
 * Author:            Otho DuBoise
 * Author URI:        https://otho.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-import-auto
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOO_IMPORT_AUTO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-import-auto-activator.php
 */
function activate_woo_import_auto() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-import-auto-activator.php';
	Woo_Import_Auto_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-import-auto-deactivator.php
 */
function deactivate_woo_import_auto() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-import-auto-deactivator.php';
	Woo_Import_Auto_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_import_auto' );
register_deactivation_hook( __FILE__, 'deactivate_woo_import_auto' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-import-auto.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_import_auto() {

	$plugin = new Woo_Import_Auto();
	$plugin->run();

}
run_woo_import_auto();
