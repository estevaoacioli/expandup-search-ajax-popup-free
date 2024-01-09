<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_loop_cpt_latest($cpt, $categories, $qty) {	
    $qty = intval($qty);
    $posts_per_page = 30;	
    $args = array(
        'post_type' => $cpt,			
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
        } elseif ( $cpt === 'product' ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' =>  explode(',', $categories),
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

            if ($cpt === 'product') {
                $product = wc_get_product($item_id);
                if ($product) {
                    $product_categories = wc_get_product_terms($product->get_id(), 'product_cat');
                    if (!empty($product_categories)) {
                        $post_category[] = $product_categories[0]->name;
                    }
            
                    if ($product->is_type('simple')) {
                        $product_regular_price = wc_price($product->get_regular_price());
                        $product_sale_price = $product->get_sale_price();
                    
                        if (empty($product_sale_price)) {
                            $product_sale_price = null;
                        } else {
                            $product_sale_price = wc_price($product_sale_price);
                        }
                        
                    } elseif ($product->is_type('variable')) {
                        $variations = $product->get_available_variations();
                        
                        $min_price = null;
                        $max_price = null;
                    
                        foreach ($variations as $variation) {
                            $variation_product = wc_get_product($variation['variation_id']);
                            $variation_regular_price = $variation_product->get_regular_price(); 
                            $variation_sale_price = $variation_product->get_sale_price();
                    
                            if (!is_null($variation_regular_price)) {
                                if (is_null($min_price) || $variation_regular_price < $min_price) {
                                    $min_price = $variation_regular_price;
                                }
                                if (is_null($max_price) || $variation_regular_price > $max_price) {
                                    $max_price = $variation_regular_price;
                                }
                            }
                        }
                    
                        // Agora você pode criar a faixa de preços, mesmo que não haja variações
                        $price_range = wc_price($min_price) . ' - ' . wc_price($max_price);
                        $product_sale_price = null;
                        $product_regular_price = $price_range;
                    }					
                    
                }
            }
            
            else {
                $categories = get_the_category();
                if (!empty($categories)) {
                    $post_category[] = $categories[0]->name;
                }
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