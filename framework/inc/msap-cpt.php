<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_register_msap_cpt() {
   
    $labels = array(
        'name'                => esc_html(_x( 'Multiple Search Ajax Popup - Section', 'Post Type General Name', 'expmsap_textdomain' )),
        'singular_name'       => esc_html(_x( 'Multiple Search Ajax Popup - Section', 'Post Type Singular Name', 'expmsap_textdomain' )),
        'menu_name'           => esc_html__( 'Multiple Search Ajax Popup', 'expmsap_textdomain' ),
        'name_admin_bar'      => esc_html__( 'Multiple Search Ajax Popup', 'expmsap_textdomain' ),
        'parent_item_colon'   => esc_html__( 'Parent Item:', 'expmsap_textdomain' ),
        'all_items'           => esc_html__( 'All Sections', 'expmsap_textdomain' ),
        'add_new_item'        => esc_html__( 'Add New Section', 'expmsap_textdomain' ),
        'add_new'             => esc_html__( 'Add New', 'expmsap_textdomain' ),
        'new_item'            => esc_html__( 'New Section', 'expmsap_textdomain' ),
        'edit_item'           => esc_html__( 'Edit Section', 'expmsap_textdomain' ),
        'update_item'         => esc_html__( 'Update Section', 'expmsap_textdomain' ),
        'view_item'           => esc_html__( 'View Section', 'expmsap_textdomain' ),
        'search_items'        => esc_html__( 'Search Section', 'expmsap_textdomain' ),
        'not_found'           => esc_html__( 'Not found', 'expmsap_textdomain' ),
        'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'expmsap_textdomain' ),
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

function expmsap_custom_columns_to_msap_list($columns) {
    $columns['expmsap_section_activate'] = esc_html(_x('Activated', 'expmsap_textdomain'));
    $columns['expmsap_section_position'] = esc_html(_x('Position', 'expmsap_textdomain'));
    $columns['expmsap_section_cpt'] = 'CPT';
    return $columns;
}
add_filter('manage_msap_posts_columns', 'expmsap_custom_columns_to_msap_list');

function expmsap_populate_custom_columns_for_msap_list($column, $post_id) {
    switch ($column) {
        case 'expmsap_section_activate':
            $expmsap_section_activate = intval(get_post_meta($post_id, 'expmsap_section_activate', true));
            if($expmsap_section_activate === 1){
                esc_html_e('Yes', 'expmsap_textdomain');
            } else {
                esc_html_e('No', 'expmsap_textdomain');
            }            
            break;

        case 'expmsap_section_position':
            $expmsap_section_position = get_post_meta($post_id, 'expmsap_section_position', true);
            echo esc_html($expmsap_section_position);
            break;

        case 'expmsap_section_cpt':
            $expmsap_section_cpt = get_post_meta($post_id, 'expmsap_section_cpt', true);
            echo esc_html($expmsap_section_cpt);
            break;
    }
}
add_action('manage_msap_posts_custom_column', 'expmsap_populate_custom_columns_for_msap_list', 10, 2);

