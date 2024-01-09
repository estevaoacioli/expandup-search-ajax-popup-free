<?php
if (!defined('ABSPATH')) {
    exit();
}
// Options plugin
function expandup_searchpopup_settings(){

	// ################### Popup General  #################

	register_setting('expandup_searchpopup_opt_general', 'searchpopup_activate', array(
		'type' => 'integer',
		'sanitize_callback' => 'expandup_searchpopup_option_activate', 
		'default' => NULL,
	));		
	register_setting('expandup_searchpopup_opt_general', 'searchpopup_where_to_use', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_input_text',
		'default' => NULL,
	));	
	register_setting('expandup_searchpopup_opt_general', 'searchpopup_popup_colors_style', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_input_text',
		'default' => NULL, 
	));	
	register_setting('expandup_searchpopup_opt_general', 'searchpopup_preloader_icon_color', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_color',
		'default' => NULL, 
	));
	register_setting('expandup_searchpopup_opt_general', 'searchpopup_popup_background', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_color',
		'default' => NULL, 
	));		
	register_setting('expandup_searchpopup_opt_general', 'searchpopup_popup_transparency', array(
		'type' => 'number',
		'sanitize_callback' => 'sanitize_searchpopup_transparency',
		'default' => 1, 
	));	
	register_setting('expandup_searchpopup_opt_general', 'searchpopup_popup_smart_images_settings', array(
		'type' => 'integer',
		'sanitize_callback' => 'expandup_searchpopup_option_activate',
		'default' => NULL,
	));	
	register_setting('expandup_searchpopup_opt_general', 'searchpopup_popup_card_image_size', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_input_text',
		'default' => NULL,
	));
	
	// ################### Popup Header #################
				
	// (Pro Version)
	
	// ################ Popup Footer ####################################	
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_activate', array(
		'type' => 'integer',
		'sanitize_callback' => 'expandup_searchpopup_option_activate', 
		'default' => NULL,
	));		
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_menu01', array(
		'type' => 'integer',
		'sanitize_callback' => 'sanitize_searchpopup_integer',
		'default' => NULL,
	));		
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_menu02', array(
		'type' => 'integer',
		'sanitize_callback' => 'sanitize_searchpopup_integer',
		'default' => NULL,
	));		
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_menu03', array(
		'type' => 'integer',
		'sanitize_callback' => 'sanitize_searchpopup_integer',
		'default' => NULL,
	));		
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_title', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_input_text',
		'default' => NULL,
	));	
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_menu01_title', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_input_text',
		'default' => NULL,
	));	
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_menu02_title', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_input_text',
		'default' => NULL,
	));
	register_setting('expandup_searchpopup_opt_popup_footer', 'searchpopup_popup_footer_menu03_title', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_searchpopup_input_text',
		'default' => NULL,
	));

	
}

?>