<?php
if (!defined('ABSPATH')) {
    exit();
}
// Options plugin
function expmsap_settings(){

	// ################### Popup General  #################
	register_setting('expmsap_opt_general', 'expmsap_activate', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_option_activate', 
		'default' => NULL,
	));		
	register_setting('expmsap_opt_general', 'expmsap_where_to_use', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_input_text',
		'default' => NULL,
	));	
	register_setting('expmsap_opt_general', 'expmsap_popup_colors_style', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_input_text',
		'default' => NULL, 
	));	
	register_setting('expmsap_opt_general', 'expmsap_preloader_icon_color', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_color',
		'default' => NULL, 
	));
	register_setting('expmsap_opt_general', 'expmsap_popup_background', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_color',
		'default' => NULL, 
	));		
	register_setting('expmsap_opt_general', 'expmsap_popup_transparency', array(
		'type' => 'number',
		'sanitize_callback' => 'expmsap_sanitize_transparency',
		'default' => 1, 
	));	
	register_setting('expmsap_opt_general', 'expmsap_popup_smart_images_settings', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_option_activate',
		'default' => NULL,
	));	
	register_setting('expmsap_opt_general', 'expmsap_popup_card_image_size', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_input_text',
		'default' => NULL,
	));
	register_setting('expmsap_opt_general', 'expmsap_popup_click_on_close', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_sanitize_radio',
		'default' => NULL,
	));
	register_setting('expmsap_opt_general', 'expmsap_click_out_popup', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_sanitize_radio',
		'default' => NULL,
	));	
	
	// ################### Popup Header #################
				
	// (Pro Version)
	
	// ################ Popup Footer ####################################	
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_activate', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_option_activate', 
		'default' => NULL,
	));		
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_menu01', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_sanitize_integer',
		'default' => NULL,
	));		
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_menu02', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_sanitize_integer',
		'default' => NULL,
	));		
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_menu03', array(
		'type' => 'integer',
		'sanitize_callback' => 'expmsap_sanitize_integer',
		'default' => NULL,
	));		
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_title', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_input_text',
		'default' => NULL,
	));	
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_menu01_title', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_input_text',
		'default' => NULL,
	));	
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_menu02_title', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_input_text',
		'default' => NULL,
	));
	register_setting('expmsap_opt_popup_footer', 'expmsap_popup_footer_menu03_title', array(
		'type' => 'string',
		'sanitize_callback' => 'expmsap_sanitize_input_text',
		'default' => NULL,
	));
	
}

?>