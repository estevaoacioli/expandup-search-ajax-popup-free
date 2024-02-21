<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_html_popup_section_top($s, $site_url, $icon_search){
    $html = '';   
    $html .= '<div id="row-header-popup" class="row row-top">';
    $html .= '<div class="expmsap-popup-content">';
    $html .= '<span class="expmsap-close"><span class="rotate-x">×</span></span>';
    // form
    $html .= '<div id="content-expmsap">';
    $html .= '<form id="expmsapsearch-form" action="'.$site_url.'" method="get" role="search">';
    $html .= '<div class="expmsapsearch-search-form__container">';
    $html .= '<span class="icon-search">'. $icon_search. '</span>';
    $html .= '<input id="expmsapsearch-search-form__input" placeholder="' . esc_attr(__('Search...', 'expmsap_textdomain')) . '" type="search" name="s" value="' . esc_attr($s) . '">';
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    // end form
    $html .= '</div>'; // expmsap-popup-content
    $html .= '</div>'; // row

    return $html;
}
