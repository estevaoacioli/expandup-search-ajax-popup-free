<?php
/*
Plugin Name: Expand UP - Multiple Search Ajax Popup FREE
Plugin URI: https://expandupwp.com/exp-product/multiple-search-ajax-popup/
Description: Plugin for conducting AJAX searches and displaying results in a popup; the results are displayed in a segmented manner
Author: Expand UP WP
Version: 1.0.0
Author URI: https://expandupwp.com/
Text Domain: expmsap_textdomain
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html    
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Load translations
add_action('plugins_loaded', 'expmsap_load_textdomain');
function expmsap_load_textdomain() {
    load_plugin_textdomain('expmsap_textdomain', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

// Define Constants
define('EXPMSAP_PATH', plugin_dir_path(__FILE__));
define('EXPMSAP_URL', plugin_dir_url(__FILE__));
define('EXPMSAP_SITE_URL', get_home_url());
define('EXPMSAP_PRODUCT_NAME', 'Multiple Search Ajax Popup');
define('EXPMSAP_VERSION', '1.0.0');
define('EXPMSAP_ACTIVE', intval(get_option('expmsap_activate')));

// Main Files
require_once( 'framework/inc/plugin-options.php' );
require_once( 'framework/inc/plugin-sanitize.php' );
require_once( 'framework/inc/tools.php' );
require_once( 'framework/inc/loop-cpt.php' );
require_once( 'framework/inc/loop-cpt-latest.php' );
require_once( 'framework/inc/msap_loop.php' );
require_once( 'framework/inc/msap-cpt.php' );
require_once( 'framework/inc/metadata-cpt.php' );

require_once( 'framework/ajax-plugin.php' );
require_once( 'framework/inc/settings-popup_general.php' );
require_once( 'framework/inc/settings-popup_header.php' );
require_once( 'framework/inc/settings-popup_footer.php' );
require_once( 'framework/inc/settings-woocommerce.php' );

// Main HTMl Files
require_once( 'framework/inc/html_footer.php' );
require_once( 'framework/inc/html_card_cpt.php' );
require_once( 'framework/inc/html_popup-section-top.php' );
require_once( 'framework/inc/html_popup-section-popup-footer.php' );

require_once( 'class.php' );
