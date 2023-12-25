<?php
if (!defined('ABSPATH')) {
    exit();
}
function searchpopup_cpt_msap_loop() {   
    $args = array(
        'post_type' => 'msap',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => 'searchpopup_section_activate',
                'value' => '1', // Check for the meta value '1'
                'compare' => '=',
                'type' => 'NUMERIC',
            ),
        ),
        'meta_key' => 'searchpopup_section_position', // Meta key to use for sorting
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
            $searchpopup_section_activate = get_post_meta($post_id, 'searchpopup_section_activate', true);

            // Section Position
            $searchpopup_section_position = get_post_meta($post_id, 'searchpopup_section_position', true);
        
            // Section CPT
            $searchpopup_section_cpt = get_post_meta($post_id, 'searchpopup_section_cpt', true);
        
            // Section Categories
            $searchpopup_section_categories = get_post_meta($post_id, 'searchpopup_section_categories', true);
        
            // Section CPT Not Found
            $searchpopup_section_cpt_not_found = get_post_meta($post_id, 'searchpopup_section_cpt_not_found', true);
        
            // Section Quantity
            $searchpopup_section_qty = get_post_meta($post_id, 'searchpopup_section_qty', true);
        
            // Section Show More
            $searchpopup_section_show_more = get_post_meta($post_id, 'searchpopup_section_show_more', true);

            $searchpopup_see_all_results_text = get_post_meta($post_id, 'searchpopup_see_all_results_text', true);
        
            // Section Title
            $searchpopup_section_title = get_post_meta($post_id, 'searchpopup_section_title', true);
        
            // Section Button Text
            $searchpopup_section_btn_text = get_post_meta($post_id, 'searchpopup_section_btn_text', true);
        
            // Section Button Link
            $searchpopup_section_btn_link = get_post_meta($post_id, 'searchpopup_section_btn_link', true);
        
            // Layout Components - Hide Items
            $searchpopup_section_layout_hide_items = get_post_meta($post_id, 'searchpopup_section_layout_hide_items', true);
        
            // Slider Components - Hide Items
            $searchpopup_section_layout_slider_hide_items = get_post_meta($post_id, 'searchpopup_section_layout_slider_hide_items', true);	
            
            $slider_options[$i] = array(
                'slider' => 'slider-'.$post_id, 
                'slider_name' => get_the_title($post_id),
                'position' => $searchpopup_section_position,               
                'cpt' => $searchpopup_section_cpt,
                'not_found' => $searchpopup_section_cpt_not_found,
                'categories' => $searchpopup_section_categories,
                'qty' => $searchpopup_section_qty,
                'itens' => $searchpopup_section_layout_hide_items,
                'title' => $searchpopup_section_title,
                'btn_link' => $searchpopup_section_btn_link,
                'btn_text' => $searchpopup_section_btn_text,
                'btn_more' => intval($searchpopup_section_show_more),
                'btn_more_text' => $searchpopup_see_all_results_text,
                'layout_slider_hide_items' => $searchpopup_section_layout_slider_hide_items,     
            );
            $i++;

        }
        
    }
    wp_reset_postdata();   
		
    return $slider_options;

}