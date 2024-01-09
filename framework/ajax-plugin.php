<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_content() {  
    $status= 'error';
    $msg = 'Error 404';
    $html = '';  
    if (isset($_POST['s'])) {
        $s = sanitize_text_field($_POST['s']);        
        $icons = expandup_searchpopup_svgs();
        $icon_calendar =  $icons['calendar'];
        $icon_search =  $icons['search'];
        $site_url = site_url(); 
        $searchpopup_popup_footer_activate = intval(get_option('searchpopup_popup_footer_activate', false));

        if(!empty($s)){  
            $expandUpSearchPopup = new ExpandUpSearchPopup();  
            
            // Popup Header
            $html .= expandup_searchpopup_html_popup_section_top($s, $site_url, $icon_search);  
            
            $slider_options = expandup_searchpopup_cpt_msap_loop();

            foreach($slider_options as $key => $value) {     
                $html .= $expandUpSearchPopup->expandup_searchpopup_cpt_website_html($value, $s);
            }            

            // Popup Footer            
            if( $searchpopup_popup_footer_activate === 1 ){
                $html .= expandup_searchpopup_html_popup_footer();
            }       
            
            $status= 'success';
            $msg = 'OK';
        }

    }
	
    $retornar['status'] = $status;
    $retornar['msg'] = $msg;
    $retornar['html'] = $html;
    
    header('Content-type: application/json');
    echo wp_json_encode($retornar);
    exit();
} 

add_action('wp_ajax_expandup_searchpopup_content', 'expandup_searchpopup_content'); // for logged in user
add_action('wp_ajax_nopriv_expandup_searchpopup_content', 'expandup_searchpopup_content'); // if user not logged in

// Register the AJAX action for adding a product to the cart
add_action('wp_ajax_searchpopup_add_product_to_cart', 'searchpopup_add_product_to_cart');
add_action('wp_ajax_nopriv_searchpopup_add_product_to_cart', 'searchpopup_add_product_to_cart');


function expandup_searchpopup_add_product_to_cart() {   
    
    // Verify nonce for security
    if (isset($_POST['nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'searchpopup_add_to_cart_nonce')) {
       
        $searchpopup_add_to_cart_action = intval(get_option('searchpopup_add_to_cart_action', false));
        $searchpopup_add_cart_success_text = get_option('searchpopup_add_cart_success_text', 'Product added to cart successfully');
        $searchpopup_add_cart_success_text = empty($searchpopup_add_cart_success_text) ? 'Product added to cart successfully' : $searchpopup_add_cart_success_text;

        $checkout_url = wc_get_checkout_url();
        $cart_url = wc_get_cart_url();

        switch ($searchpopup_add_to_cart_action) {
            case "0": // 
                $actions = 'null';
                $page = '';
              break;
            case "1":
                $actions = 'close';
                $page = '';
              break;
            case "2":
                $actions = 'close-reload';
                $page = '';
              break;
            case "3":
                $actions = 'redirect';
                $page = $cart_url;
              break;
            case "4":
                $actions = 'redirect';
                $page = $checkout_url;
              break;
            default:
                $actions = 'null';
                $page = '';
          }

        $product_id = intval($_POST['product_id']);
        $quantity = 1; // You can customize this if you want to allow adding multiple items at once

        // Add the product to the cart
        WC()->cart->add_to_cart($product_id, $quantity);

        // Return a response (optional)
        $response = array(
            'message' => $searchpopup_add_cart_success_text,
            'status' => 'success',
            'actions' => $actions,
            'page' => $page
        );
    } else {
        // Nonce verification failed
        $response = array(
            'message' => 'Nonce verification failed',
            'status' => 'error',
        );
    }

    echo wp_json_encode($response);

    // Always exit to prevent further output
    exit();
}


