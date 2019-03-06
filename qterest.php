<?php
/*
 * Plugin Name: QTEREST
 * Description: QTEREST adds new endpoints for the Wordpress API
 * Version: 1.0.0
 * Author: QTE Development AB
 * Author URI: https://getqte.se/
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

define('QTEREST_VERSION', '1.0.0');

define('QTEREST_PLUGIN_DIR', plugin_dir_url(__FILE__));
define('QTEREST_PLUGIN_PATH', plugin_dir_path(__FILE__));

require_once QTEREST_PLUGIN_PATH . 'vendor/autoload.php';
require_once QTEREST_PLUGIN_PATH . 'includes/load.php';

$qterest_controller = new QTEREST\REST_Controller\REST_Controller;
$qterest_controller->hook_rest_server();