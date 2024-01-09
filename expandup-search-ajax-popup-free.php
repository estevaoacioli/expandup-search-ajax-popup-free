<?php
/*
Plugin Name: Expand UP - Multiple Search Ajax Popup FREE
Plugin URI: https://expandup.tech/
Description: Plugin for conducting AJAX searches and displaying results in a popup; the results are displayed in a segmented manner
Author: Expand UP
Version: 1.0.0
Author URI: https://expandup.tech/
Text Domain: searchpopup_textdomain
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html    
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Load translations
add_action('plugins_loaded', 'expandup_searchpopup_load_textdomain');
function expandup_searchpopup_load_textdomain() {
    load_plugin_textdomain('searchpopup_textdomain', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

// Define Constants
define('EXPANDUP_SEARCHPOPUP_PATH', plugin_dir_path(__FILE__));
define('EXPANDUP_SEARCHPOPUP_URL', plugin_dir_url(__FILE__));
define('EXPANDUP_SEARCHPOPUP_SITE_URL', get_home_url());
define('EXPANDUP_SEARCHPOPUP_PRODUCT_NAME', 'Multiple Search Ajax Popup');
define('EXPANDUP_SEARCHPOPUP_PRODUCT_SKU', 'P-01');
define('EXPANDUP_SEARCHPOPUP_VERSION', '1.0.0');
define('SEARCH_POPUP_ACTIVE', intval(get_option('searchpopup_activate')));

// Main Files
require_once( 'framework/inc/plugin-options.php' );
require_once( 'framework/inc/plugin-sanitize.php' );
require_once( 'framework/inc/tools.php' );
require_once( 'framework/inc/loop-cpt.php' );
require_once( 'framework/inc/loop-cpt-latest.php' );
require_once( 'framework/inc/msap_loop.php' );
require_once( 'framework/inc/msap-cpt.php' );
require_once( 'framework/inc/metadata-cpt.php' );
require_once( 'class.php' );

require_once( 'framework/ajax-plugin.php' );
require_once( 'framework/inc/settings-popup_general.php' );
require_once( 'framework/inc/settings-popup_header.php' );
require_once( 'framework/inc/settings-popup_footer.php' );
require_once( 'framework/inc/settings-woocommerce.php' );

// Main HTMl Files
require_once( 'framework/inc/svgs.php' );
require_once( 'framework/inc/html_footer.php' );
require_once( 'framework/inc/html_card_cpt.php' );
require_once( 'framework/inc/html_popup-section-top.php' );
require_once( 'framework/inc/html_popup-section-popup-footer.php' );
