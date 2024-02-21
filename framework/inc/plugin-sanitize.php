<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
// ######### Sanitizes options ###########
function expmsap_option_activate($input) {
	$sanitized_value = (int) $input;
	if ($sanitized_value !== 0 && $sanitized_value !== 1) {
			$sanitized_value = 0; 
	}
	return $sanitized_value;	
}
function expmsap_sanitize_input_text($input) {		
	$sanitized_value = sanitize_text_field($input);	
	return $sanitized_value;
}
function expmsap_sanitize_color($input) {		
	if (preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{8})$/', $input)) {			
			return $input;
	} else {			
			return NULL;
	}
}
function expmsap_sanitize_transparency($input) {		
	$sanitized_value = floatval($input);		
	$sanitized_value = max(0, min(1, $sanitized_value));	
	return $sanitized_value;
}
function expmsap_sanitize_integer($input) {		
	$sanitized_value = intval($input);	
	return $sanitized_value;
}
function expmsap_sanitize_layout_items($input) {		
	if (is_array($input)) {			
		$allowed_keys = array('thumbnail', 'title', 'resume', 'price', 'category', 'date');	
		$sanitized_value = array_filter($input, function ($item) use ($allowed_keys) {
		return in_array($item, $allowed_keys);
		});
	} else {
		$sanitized_value = array();
	}	
	return $sanitized_value;
}
function expmsap_sanitize_layout_slider_hide_items($input) {	
	if (is_array($input)) {	
		$allowed_keys = array('navigation', 'pagination');
		$sanitized_value = array_filter($input, function ($item) use ($allowed_keys) {
		return in_array($item, $allowed_keys);
	});
	} else {
			$sanitized_value = array();
	}
	return $sanitized_value;
}	
function expmsap_sanitize_cpt($input) {	
	if (is_array($input) && count($input) === 1) {
		$cpt = reset($input); 
		$sanitized_value = $cpt;			
	} else {
		$sanitized_value = NULL; 
	}	
	return $sanitized_value;
}