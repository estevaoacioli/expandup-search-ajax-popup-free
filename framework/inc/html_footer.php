<?php
if (!defined('ABSPATH')) {
    exit();
}
function searchpopup_html_footer(){     
    $html = ''; 
    $html .= '<div id="searchpopup-popup" style="display: none;" data-v="'.EXPANDUP_SEARCHPOPUP_VERSION.'" >Search popup content</div>';
    return $html; 
}