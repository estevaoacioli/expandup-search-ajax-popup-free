<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_cpt_msap_loop() {   
    $args = array(
        'post_type' => 'msap',
        'posts_per_page' => 10,
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => 'expmsap_section_activate',
                'value' => '1', // Check for the meta value '1'
                'compare' => '=',
                'type' => 'NUMERIC',
            ),
        ),
        'meta_key' => 'expmsap_section_position', // Meta key to use for sorting
        'orderby' => 'meta_value_num', // Sort by the numeric meta value
        'order' => 'ASC', // Sort in ascending order
    );
    $query = new WP_Query($args);    		
    $slider_options = array();	
    $i = 0;		
    if ($query->have_posts()) {		
        while ($query->have_posts()) {

            $query->the_post();
            $post_id = get_the_ID();    

            // Section Activate
            $expmsap_section_activate = get_post_meta($post_id, 'expmsap_section_activate', true);

            // Section Position
            $expmsap_section_position = get_post_meta($post_id, 'expmsap_section_position', true);
        
            // Section CPT
            $expmsap_section_cpt = get_post_meta($post_id, 'expmsap_section_cpt', true);
        
            // Section Categories
            $expmsap_section_categories = get_post_meta($post_id, 'expmsap_section_categories', true);
        
            // Section CPT Not Found
            $expmsap_section_cpt_not_found = get_post_meta($post_id, 'expmsap_section_cpt_not_found', true);
        
            // Section Quantity
            $expmsap_section_qty = get_post_meta($post_id, 'expmsap_section_qty', true);
        
            // Section Show More
            $expmsap_section_show_more = get_post_meta($post_id, 'expmsap_section_show_more', true);

            $expmsap_see_all_results_text = get_post_meta($post_id, 'expmsap_see_all_results_text', true);
        
            // Section Title
            $expmsap_section_title = get_post_meta($post_id, 'expmsap_section_title', true);
        
            // Section Button Text
            $expmsap_section_btn_text = get_post_meta($post_id, 'expmsap_section_btn_text', true);
        
            // Section Button Link
            $expmsap_section_btn_link = get_post_meta($post_id, 'expmsap_section_btn_link', true);
        
            // Layout Components - Hide Items
            $expmsap_section_layout_hide_items = get_post_meta($post_id, 'expmsap_section_layout_hide_items', true);
        
            // Slider Components - Hide Items
            $expmsap_section_layout_slider_hide_items = get_post_meta($post_id, 'expmsap_section_layout_slider_hide_items', true);	
            
            $slider_options[$i] = array(
                'slider' => 'slider-'.$post_id, 
                'slider_name' => get_the_title($post_id),
                'position' => $expmsap_section_position,               
                'cpt' => $expmsap_section_cpt,
                'not_found' => $expmsap_section_cpt_not_found,
                'categories' => $expmsap_section_categories,
                'qty' => $expmsap_section_qty,
                'itens' => $expmsap_section_layout_hide_items,
                'title' => $expmsap_section_title,
                'btn_link' => $expmsap_section_btn_link,
                'btn_text' => $expmsap_section_btn_text,
                'btn_more' => intval($expmsap_section_show_more),
                'btn_more_text' => $expmsap_see_all_results_text,
                'layout_slider_hide_items' => $expmsap_section_layout_slider_hide_items,     
            );
            $i++;

        }
        
    }
    wp_reset_postdata();   
		
    return $slider_options;

}