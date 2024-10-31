<?php
/**
 * Plugin Name: SecureLogin
 * Plugin URI:  https://securelogin.nu/
 * Description: Login form for SecureLogin
 * Version: 1.4.1
 * Author: SecureLogin
 * Author URI: https://securelogin.nu/
 * License: GPL2
 */
require_once("Bootstrap.php");

$bootstrap = new \Bootstrap();
register_activation_hook(__FILE__, array($bootstrap, 'activate'));
register_deactivation_hook(__FILE__, array($bootstrap, 'deactivate'));
$bootstrap->run();