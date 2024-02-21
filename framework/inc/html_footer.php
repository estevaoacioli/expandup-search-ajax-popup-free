<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_html_footer() {
    $html = '';
    $version = esc_attr(EXPMSAP_VERSION);
    $html .= '<div id="expmsap-popup" style="display: none;" data-v="' . $version . '">Search popup content</div>';
    return $html;
}