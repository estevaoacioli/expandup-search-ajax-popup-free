<?php
if (!defined('ABSPATH')) {
    exit();
}
function searchpopup_html_popup_popup_footer(){   
    $searchpopup_popup_footer_menu01 =  get_option('searchpopup_popup_footer_menu01', false);
    $searchpopup_popup_footer_menu02 =  get_option('searchpopup_popup_footer_menu02', false);
    $searchpopup_popup_footer_menu03 =  get_option('searchpopup_popup_footer_menu03', false);
    $searchpopup_popup_footer_title =  get_option('searchpopup_popup_footer_title', false);
    $searchpopup_popup_footer_background =  get_option('searchpopup_popup_footer_background', false);
    $searchpopup_popup_footer_text_color =  get_option('searchpopup_popup_footer_text_color', false);
    $searchpopup_popup_footer_menu01_title = get_option('searchpopup_popup_footer_menu01_title', false);
	$searchpopup_popup_footer_menu02_title = get_option('searchpopup_popup_footer_menu02_title', false);
	$searchpopup_popup_footer_menu03_title = get_option('searchpopup_popup_footer_menu03_title', false);

    $html = '';
    $html .= '<div id="row-section_popup_footer" class="row row-section_popup_footer">';
    $html .= '<div class="searchpopup-popup-content">';
    if(!empty($searchpopup_popup_footer_title)){
        $html .= '<div class="searchpopup-popup-content-header"><h3>'.$searchpopup_popup_footer_title.'</h3></div>'; 
    }           
    $html .= '<div class="searchpopup-popup-footer">';
    $html .= '<div class="popup-footer-item popup-footer-menu_01">';
    if( !empty($searchpopup_popup_footer_menu01_title) ){ $html .= '<h4 class="popup-footer-subtitles">'.$searchpopup_popup_footer_menu01_title.'</h4>'; }
    $html .= expandup_searchpopup_menu_items_to_list($searchpopup_popup_footer_menu01);
    $html .= '</div>'; // end popup-footer-menu_01
    $html .= '<div class="popup-footer-item popup-footer-menu_02">';
    if( !empty($searchpopup_popup_footer_menu02_title) ){ $html .= '<h4 class="popup-footer-subtitles">'.$searchpopup_popup_footer_menu02_title.'</h4>'; }
    $html .= expandup_searchpopup_menu_items_to_list($searchpopup_popup_footer_menu02);
    $html .= '</div>'; // end popup-footer-menu_02
    $html .= '<div class="popup-footer-item popup-footer-menu_03">';
    if( !empty($searchpopup_popup_footer_menu03_title) ){ $html .= '<h4 class="popup-footer-subtitles">'.$searchpopup_popup_footer_menu03_title.'</h4>'; }
    $html .= expandup_searchpopup_menu_items_to_list($searchpopup_popup_footer_menu03);
    $html .= '</div>'; // end popup-footer-menu_03  
    $html .= '</div>'; // end searchpopup-popup-footer
    $html .= '</div>';  // end searchpopup-popup-content
    $html .= '</div>';  // end row  
        
    return $html;   
} 
