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
