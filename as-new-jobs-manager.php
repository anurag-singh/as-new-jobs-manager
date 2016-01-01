<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           AS_New_Jobs_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       AS New Jobs Manager
 * Plugin URI:        http://example.com/as-new-jobs-manager/
 * Description:       Add a new job opening management system
 * Plugin Type:       Piklist
 * Version:           1.0.0
 * Author:            Anurag Singh
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       as-new-jobs-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-as-new-jobs-manager-activator.php
 */
function activate_as_new_jobs_manager() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-new-jobs-manager-activator.php';
    AS_New_Jobs_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-as-new-jobs-manager-deactivator.php
 */
function deactivate_as_new_jobs_manager() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-new-jobs-manager-deactivator.php';
    AS_New_Jobs_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_as_new_jobs_manager' );
register_deactivation_hook( __FILE__, 'deactivate_as_new_jobs_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-as-new-jobs-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_as_new_jobs_manager() {

    $plugin = new AS_New_Jobs_Manager();
    $plugin->run();

}
run_as_new_jobs_manager();
