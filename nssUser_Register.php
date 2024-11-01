<?php
/**
 * Plugin Name: Wp NssUser Register
 * Plugin URI: https://wordpress.org/plugins/wp-nssuser-register/
 * Description: This plugin is uesd to create a new users to enter the wordpress dashboard. 
 * Version: 1.0.0
 * Author: nssTheme
 * Author URI: https://www.linkedin.com/in/saiful5721/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: nssuser-reg
 */

// if accessed directly
if (!defined('ABSPATH'))
    exit;

//define
define('NSS_UR_PLUGIN_URL', plugin_dir_url(__FILE__));

//required files
include_once 'nssUser_docs/nss-dashboard-settings.php';
require_once 'nssUser_docs/nssUser_form.php';
require_once 'nssUser_docs/nssUser_style.php';

//Attached in ajax
add_action( 'wp_ajax_nssTheme_registration_form', 'nssTheme_ajax_regfrom' );
add_action( 'wp_ajax_nopriv_nssTheme_registration_form', 'nssTheme_ajax_regfrom' );
require_once 'nssUser_docs/nssUser_formProcess.php';
