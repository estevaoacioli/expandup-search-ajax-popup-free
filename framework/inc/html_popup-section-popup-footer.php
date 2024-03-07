<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_html_popup_footer(){   
    $expmsap_popup_footer_menu01 =  get_option('expmsap_popup_footer_menu01', false); 
    $expmsap_popup_footer_menu02 =  get_option('expmsap_popup_footer_menu02', false);
    $expmsap_popup_footer_menu03 =  get_option('expmsap_popup_footer_menu03', false);
    $expmsap_popup_footer_title =  get_option('expmsap_popup_footer_title', false);
    $expmsap_popup_footer_background =  get_option('expmsap_popup_footer_background', false);
    $expmsap_popup_footer_text_color =  get_option('expmsap_popup_footer_text_color', false);
    $expmsap_popup_footer_menu01_title = get_option('expmsap_popup_footer_menu01_title', false);
    $expmsap_popup_footer_menu02_title = get_option('expmsap_popup_footer_menu02_title', false);
    $expmsap_popup_footer_menu03_title = get_option('expmsap_popup_footer_menu03_title', false);

    $html = '<div id="row-section_popup_footer" class="row row-section_popup_footer">';
    $html .= '<div class="expmsap-popup-content">';

    // Validate and sanitize options
    $expmsap_popup_footer_title = esc_html($expmsap_popup_footer_title);
    $expmsap_popup_footer_menu01_title = esc_html($expmsap_popup_footer_menu01_title);
    $expmsap_popup_footer_menu02_title = esc_html($expmsap_popup_footer_menu02_title);
    $expmsap_popup_footer_menu03_title = esc_html($expmsap_popup_footer_menu03_title);

    if (!empty($expmsap_popup_footer_title)){
        $html .= sprintf('<div class="expmsap-popup-content-header"><h3>%s</h3></div>', $expmsap_popup_footer_title); 
    }

    $html .= '<div class="expmsap-popup-footer">';

    // Menu 01
    $html .= '<div class="popup-footer-item popup-footer-menu_01">';
    if (!empty($expmsap_popup_footer_menu01_title)) {
        $html .= sprintf('<h4 class="popup-footer-subtitles">%s</h4>', $expmsap_popup_footer_menu01_title);
    }
    $html .= expmsap_menu_items_to_list($expmsap_popup_footer_menu01);
    $html .= '</div>'; // end popup-footer-menu_01

    // Menu 02
    $html .= '<div class="popup-footer-item popup-footer-menu_02">';
    if (!empty($expmsap_popup_footer_menu02_title)) {
        $html .= sprintf('<h4 class="popup-footer-subtitles">%s</h4>', $expmsap_popup_footer_menu02_title);
    }
    $html .= expmsap_menu_items_to_list($expmsap_popup_footer_menu02);
    $html .= '</div>'; // end popup-footer-menu_02

    // Menu 03
    $html .= '<div class="popup-footer-item popup-footer-menu_03">';
    if (!empty($expmsap_popup_footer_menu03_title)) {
        $html .= sprintf('<h4 class="popup-footer-subtitles">%s</h4>', $expmsap_popup_footer_menu03_title);
    }
    $html .= expmsap_menu_items_to_list($expmsap_popup_footer_menu03);
    $html .= '</div>'; // end popup-footer-menu_03  

    $html .= '</div>'; // end expmsap-popup-footer
    $html .= '</div>'; // end expmsap-popup-content
    $html .= '</div>'; // end row

    return $html;   
}
