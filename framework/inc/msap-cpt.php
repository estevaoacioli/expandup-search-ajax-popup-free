<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_register_msap_cpt() {
   
    $labels = array(
        'name'                => _x( 'Multiple Search Ajax Popup - Section', 'Post Type General Name', 'searchpopup_textdomain' ),
        'singular_name'       => _x( 'Multiple Search Ajax Popup - Section', 'Post Type Singular Name', 'searchpopup_textdomain' ),
        'menu_name'           => __( 'Multiple Search Ajax Popup', 'searchpopup_textdomain' ),
        'name_admin_bar'      => __( 'Multiple Search Ajax Popup', 'searchpopup_textdomain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'searchpopup_textdomain' ),
        'all_items'           => __( 'All Sections', 'searchpopup_textdomain' ),
        'add_new_item'        => __( 'Add New Section', 'searchpopup_textdomain' ),
        'add_new'             => __( 'Add New', 'searchpopup_textdomain' ),
        'new_item'            => __( 'New Section', 'searchpopup_textdomain' ),
        'edit_item'           => __( 'Edit Section', 'searchpopup_textdomain' ),
        'update_item'         => __( 'Update Section', 'searchpopup_textdomain' ),
        'view_item'           => __( 'View Section', 'searchpopup_textdomain' ),
        'search_items'        => __( 'Search Section', 'searchpopup_textdomain' ),
        'not_found'           => __( 'Not found', 'searchpopup_textdomain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'searchpopup_textdomain' ),
    );

    $args = array(
        'label' => 'MSAP',
        'public' => false, 
        'show_ui' => current_user_can('manage_options'),
        'labels' => $labels,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-search'						
    );

    register_post_type('msap', $args);
}

function add_custom_columns_to_msap_list($columns) {
    $columns['searchpopup_section_activate'] = _x('Activated', 'searchpopup_textdomain');
    $columns['searchpopup_section_position'] = _x('Position', 'searchpopup_textdomain');
    $columns['searchpopup_section_cpt'] = 'CPT';
    return $columns;
}
add_filter('manage_msap_posts_columns', 'add_custom_columns_to_msap_list');

function populate_custom_columns_for_msap_list($column, $post_id) {
    switch ($column) {
        case 'searchpopup_section_activate':
            $searchpopup_section_activate = intval(get_post_meta($post_id, 'searchpopup_section_activate', true));
            if($searchpopup_section_activate === 1){
                esc_html_e('Yes', 'searchpopup_textdomain');
            } else {
                esc_html_e('No', 'searchpopup_textdomain');
            }            
            break;

        case 'searchpopup_section_position':
            $searchpopup_section_position = get_post_meta($post_id, 'searchpopup_section_position', true);
            echo esc_html($searchpopup_section_position);
            break;

        case 'searchpopup_section_cpt':
            $searchpopup_section_cpt = get_post_meta($post_id, 'searchpopup_section_cpt', true);
            echo esc_html($searchpopup_section_cpt);
            break;
    }
}
add_action('manage_msap_posts_custom_column', 'populate_custom_columns_for_msap_list', 10, 2);

