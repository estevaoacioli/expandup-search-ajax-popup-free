<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_loop_cpt($s, $cpt, $categories, $qty) {	
    $qty = intval($qty);
    $posts_per_page = 30;	

    $args = array(
        'post_type' => $cpt,
        's' => $s,
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',			
    );
            
    if (!empty($categories)) {			
        if ( $cpt === 'post' ) {				
            $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => explode(',', $categories),
                    )
                );
        } 
    }

    $query = new WP_Query($args);
    $total_results = $query->found_posts;			
    $posts = array();		
    $i = 1;		
    if ($query->have_posts()) {			
        $posts['total'] = $total_results;
        while ($query->have_posts()) {
            $query->the_post();	

            $post_link = get_permalink();
            $searchpopup_popup_smart_images_settings = intval(get_option( 'searchpopup_popup_smart_images_settings', false ));
            $searchpopup_popup_card_image_size = get_option('searchpopup_popup_card_image_size', false);
            
            if( $searchpopup_popup_smart_images_settings === 1 ) {
                $custom_size = 'searchpopup_thumb';
            } elseif( $searchpopup_popup_smart_images_settings === 0 && !empty($searchpopup_popup_card_image_size) ) {
                $custom_size = $searchpopup_popup_card_image_size;
            } else {
                $custom_size = 'thumbnail';
            }
            
            $item_id = get_the_ID();
            $thumbnail_url = get_the_post_thumbnail_url($item_id, $custom_size);
            

            if (!$thumbnail_url) {					
                $thumbnail_url = EXPANDUP_SEARCHPOPUP_URL.'assets/images/image-default.png';
            }						
            $post_title = get_the_title(); 
            
            $post_category = array();

           
                $categories = get_the_category();
                if (!empty($categories)) {
                    $post_category[] = $categories[0]->name;
                }
            				
            $post_excerpt = get_the_excerpt();
            $max_words = 15;
            $post_excerpt = wp_trim_words($post_excerpt, $max_words);
            $post_date = get_the_date();

            if ($thumbnail_url && $i <= $qty) {
                $posts['itens'][$i] = array(
                    'item' => $i,						
                    'item_id' => $item_id,
                    'post_type' => $cpt,
                    'post_link' => $post_link,
                    'thumbnail_url' => $thumbnail_url,
                    'post_title' => $post_title,
                    'post_category' => $post_category,
                    'post_excerpt' => $post_excerpt,
                    'post_date' => $post_date,
                    'price_regular' => isset($product_regular_price) ? $product_regular_price : '',
                    'price_offer' => isset($product_sale_price) ? $product_sale_price : '',						
                );
            }
            $i++;
        }
        wp_reset_postdata();
    }		
    return $posts;
}