<?php
if (!defined('ABSPATH')) {
    exit();
}
function searchpopup_html_popup_section_top($s, $site_url, $icon_search){
    $html = '';   
    $html .= '<div id="row-header-popup" class="row row-top">';
    $html .= '<div class="searchpopup-popup-content">';
    $html .= '<span class="searchpopup-close"><span class="rotate-x">×</span></span>';
    // form
    $html .= '<div id="content-searchpopup">';
    $html .= '<form id="searchpopupsearch-form" action="'.$site_url.'" method="get" role="search">';
    $html .= '<div class="searchpopupsearch-search-form__container">';
    $html .= '<span class="icon-search">'. $icon_search. '</span>';
    $html .= '<input id="searchpopupsearch-search-form__input" placeholder="' . esc_attr(__('Search...', 'searchpopup_textdomain')) . '" type="search" name="s" value="' . esc_attr($s) . '">';
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    // end form
    $html .= '</div>'; // searchpopup-popup-content
    $html .= '</div>'; // row

    return $html;
}
