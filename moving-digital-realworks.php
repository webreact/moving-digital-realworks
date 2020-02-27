<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.webreact.nl
 * @since             1.0.0
 * @package           Moving_Digital_Realworks
 *
 * @wordpress-plugin
 * Plugin Name:       Moving Digital - Realworks
 * Plugin URI:        https://www.webreact.nl
 * Description:       This plugin connects your WordPress website to Moving Digitals API. It's intended use is to pull data in from Realworks objects.
 * Version:           1.0.0
 * Author:            Webreact (Nils Ringersma)
 * Author URI:        https://www.webreact.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       moving-digital-realworks
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Composer autoload.
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MOVING_DIGITAL_REALWORKS_VERSION', '1.0.0' );
define( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-moving-digital-realworks-activator.php
 */
function activate_moving_digital_realworks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-moving-digital-realworks-activator.php';
	Moving_Digital_Realworks_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-moving-digital-realworks-deactivator.php
 */
function deactivate_moving_digital_realworks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-moving-digital-realworks-deactivator.php';
	Moving_Digital_Realworks_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_moving_digital_realworks' );
register_deactivation_hook( __FILE__, 'deactivate_moving_digital_realworks' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-moving-digital-realworks.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_moving_digital_realworks() {

	$plugin = new Moving_Digital_Realworks();
	$plugin->run();

}
run_moving_digital_realworks();

/**
 * Update the plugin through GitHub.
 *
 * @since    1.0.0
 */
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/webreact/moving-digital-realworks/',
    __FILE__,
    'moving-digital-realworks'
);