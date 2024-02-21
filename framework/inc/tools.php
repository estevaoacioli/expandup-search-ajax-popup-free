<?php
if (!defined('ABSPATH')) {
    exit();
}
// Function to convert rgb and hex colors to rgba
function expmsap_convertColorToRGBA($color, $alpha) {
    // Checks if $color is in RGB format (example, "rgb(255, 0, 0)")
    if (preg_match('/^rgb\((\d+), (\d+), (\d+)\)$/', $color, $rgbMatches)) {
        $red = $rgbMatches[1];
        $green = $rgbMatches[2];
        $blue = $rgbMatches[3];
    }
    
    // Checks if $color is in hexadecimal format (e.g. "#FF0000" or "FF0000")
    elseif (preg_match('/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i', $color, $hexMatches)) {
        $red = hexdec($hexMatches[1]);
        $green = hexdec($hexMatches[2]);
        $blue = hexdec($hexMatches[3]);
    } else {
        // Returns the original color if it is not in the correct format
        return $color;
    }

    // Checks if $alpha is between 0 and 1
    $alpha = max(0, min(1, $alpha));

    // Creates the color in RGBA format
    $rgba = "rgba($red, $green, $blue, $alpha)";

    return $rgba;
}

function expmsap_menu_items_to_list($menu_id) {
    
    if (!is_int($menu_id) && !ctype_digit($menu_id)) {
        return ''; 
    }

    $menu_id = (int) $menu_id;

    $menu_items = wp_get_nav_menu_items($menu_id);
    
    if ($menu_items) {
        $menu_list = '<ul>';
        foreach ($menu_items as $menu_item) {
            $menu_list .= '<li><a href="' . esc_url($menu_item->url) . '">' . esc_html($menu_item->title) . '</a></li>';
        }
        $menu_list .= '</ul>';
    } else {
        $menu_list = '<p style="display: none;">Menu not found!</p>';
    }

    return $menu_list;
}


function expmsap_help_links() {    ?>
    <div class="help-links">
    <a href="https://expandupwp.com/" target="_blank" >Expand UP WP</a> | <a href="https://expandupwp.com/support/" target="_blank" >Support</a> | <a href="https://expandupwp.com/products/" target="_blank" >Other Products</a>';
    | <a href="https://expandupwp.com/exp-product/multiple-search-ajax-popup/" target="_blank" >Product Page</a> | <a href="https://documentation.expandupwp.com/multiple-search-ajax-popup/" target="_blank" >Documentation</a>
    </div>
    <?php
}
