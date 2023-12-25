<?php
if (!defined('ABSPATH')) {
    exit();
}
function searchpopup_cpt_msap_metas() {
    add_meta_box('item-msap-fields', __('Slider Options', 'searchpopup_textdomain'), 'searchpopup_cpt_msap_metas_display', 'msap', 'normal', 'default');
}
add_action('admin_init', 'searchpopup_cpt_msap_metas');

function searchpopup_cpt_msap_metas_display(){
    global $post;
    $post_id = $post->ID;
    wp_nonce_field('searchpopup_cpt_msap_nonce', 'searchpopup_cpt_msap_nonce');	
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
     
    
?>
    <table class="styled-table">
		<tr>
			<td>
				<h3><?php _e('Activate this section', 'searchpopup_textdomain'); ?></h3>
				<p><label for="searchpopup_section_activate" class="label"><?php _e('Do you want to activate this section?', 'searchpopup_textdomain'); ?></label>
			</td>
			<td>
				<select name="searchpopup_section_activate" id="searchpopup_section_activate" required>
					<option value="0" <?php selected( $searchpopup_section_activate, 0 ); ?>><?php _e('No', 'searchpopup_textdomain'); ?></option>
					<option value="1" <?php selected( $searchpopup_section_activate, 1 ); ?>><?php _e('Yes', 'searchpopup_textdomain'); ?></option>							
				</select>
			</td>
		</tr>	
        <tr>
			<td>
				<h3><?php _e('Section position', 'searchpopup_textdomain'); ?></h3>
				<p><label for="searchpopup_section_position" class="label"><?php _e('Select a number for the position of this section in the popup, the order of the sections is ascending', 'searchpopup_textdomain'); ?></label>
			</td>
			<td>
                <input type="number" id="searchpopup_section_position" name="searchpopup_section_position" min="0" max="999" step="1" value="<?php echo $searchpopup_section_position; ?>" required>
			</td>
		</tr>							
		<tr>
			<td>
				<h3><?php _e('Search for', 'searchpopup_textdomain'); ?></h3>
				<p><?php _e('What type of content do you want to display in this search? Choose an option.', 'searchpopup_textdomain'); ?></p>
				<p><span style="color: #ff0000;">Attention: The Woocommerce product type is only available in the PRO version</span><p>
			</td>
		    <td>
                <select name="searchpopup_section_cpt" required>
                    <?php
                    $args = array(
                        'public'   => true,
                        '_builtin' => false
                    );
                    $cpts = get_post_types($args, 'objects');
                    $cpts['page'] = 'page'; // Add 'page'
                    $cpts['post'] = 'post'; // Add 'post'
                    
                    $remove_itens = array('e-landing-page', 'elementor_library', 'oceanwp_library', 'product');
                    
                    foreach ($cpts as $cpt_key => $cpt_label) {
                        $labels = get_post_type_labels(get_post_type_object($cpt_key)); // Obtenha as etiquetas corretas
                        if (!in_array($cpt_key, $remove_itens)) {
                            $selected = ($searchpopup_section_cpt === $cpt_key) ? 'selected' : '';
                            echo '<option value="' . $cpt_key . '" ' . $selected . '>' . $labels->singular_name . '</option>';
                        }
                    }
                    ?>
                </select>
                <p><?php _e('If you want to search in a specific category, just paste its slug in the field below, leave it blank to search in all. You can also paste several slugs, separated by commas', 'searchpopup_textdomain'); ?><br>
                <input id="searchpopup_section_categories" name="searchpopup_section_categories" style="width: 100%;" type="text" class="input-text" value="<?php echo $searchpopup_section_categories; ?>">
                </p>
            </td>
		</tr>
		<tr>
			<td>
				<h3><?php _e('Search not found', 'searchpopup_textdomain'); ?></h3>
				<p><label for="searchpopup_section_cpt_not_found" class="label"><?php _e("What do you want to do if your search doesn't find anything?", 'searchpopup_textdomain'); ?></label>
			</td>
			<td>						
				<select name="searchpopup_section_cpt_not_found" id="searchpopup_section_cpt_not_found" required>						
				<?php
					$search_opts = array(
									0 => __('Show only the text: Nothing found in this search.', 'searchpopup_textdomain'),
									1 => __('Show the latest posts from this CPT', 'searchpopup_textdomain'),
									2 => __('Completely hide the section', 'searchpopup_textdomain')
					);
					foreach ($search_opts as $key => $label) {																
						echo '<option value="' . $key . '" '.selected( $searchpopup_section_cpt_not_found, $key ).'>' . $label . '</option>';							
					}
					?>							
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php _e('Quantity of items to display', 'searchpopup_textdomain'); ?></h3>
				<p><label for="searchpopup_section_qty" class="label"><?php _e('How many items do you want to display for this search? Please keep in mind that very high values can slow down the server response.', 'searchpopup_textdomain'); ?></label>
			</td>
			<td>
				<select name="searchpopup_section_qty" id="searchpopup_section_qty" required>
					<?php
						for ($i = 3; $i <= 21; $i += 3) {
								echo '<option value="' . $i . '" '.selected( $searchpopup_section_qty, $i ).'>' . $i . '</option>';
						}															
					?>							
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php _e('Show more results', 'searchpopup_textdomain'); ?></h3>
				<p><label for="searchpopup_section_show_more" class="label"><?php _e('Show link to view all results?', 'searchpopup_textdomain'); ?></label>
			</td>
			<td>
				<p style="color: red;"><?php _e('Attention, this feature is experimental', 'searchpopup_textdomain'); ?></p>
				<select name="searchpopup_section_show_more" id="searchpopup_section_show_more" required>
					<option value="0" <?php selected( $searchpopup_section_show_more, 0 ); ?>><?php _e('No', 'searchpopup_textdomain'); ?></option>
					<option value="1" <?php selected( $searchpopup_section_show_more, 1 ); ?>><?php _e('Yes', 'searchpopup_textdomain'); ?></option>							
				</select>
				<p><label for="searchpopup_see_all_results_text" class="label"><?php _e('Enter text for the see all results button if left blank the default text will be displayed "See all results"', 'searchpopup_textdomain'); ?></label>
				<input id="searchpopup_see_all_results_text" name="searchpopup_see_all_results_text" style="width: 100%;" type="text" class="input-text" value="<?php echo $searchpopup_see_all_results_text; ?>" >
			    
			</td>
		</tr>					
		<tr>
			<td>
				<h3><?php _e('Section title', 'searchpopup_textdomain'); ?></h3>
				<p><label for="searchpopup_section_title" class="label"><?php _e('Enter a title for this section. If left blank, nothing will be shown', 'searchpopup_textdomain'); ?></label>
			</td>
			<td>
				<input id="searchpopup_section_title" name="searchpopup_section_title" style="width: 100%;" type="text" class="input-text" value="<?php echo $searchpopup_section_title; ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php _e('Section Link', 'searchpopup_textdomain'); ?></h3>	
                <p><?php _e('This link appears next to the section title, you can use it to add a link to a category, or results page for example', 'searchpopup_textdomain'); ?></p>						
			</td>
			<td>
                <p><label for="searchpopup_section_btn_text" class="label"><?php _e('Enter text for the section link, if left blank the link will not be shown', 'searchpopup_textdomain'); ?></label>
				<input id="searchpopup_section_btn_text" name="searchpopup_section_btn_text" style="width: 100%;" type="text" class="input-text" value="<?php echo $searchpopup_section_btn_text; ?>" >
                <p><label for="searchpopup_section_btn_link" class="label"><?php _e('Enter the link for the button.', 'searchpopup_textdomain'); ?></label>
                <input id="searchpopup_section_btn_link" name="searchpopup_section_btn_link" style="width: 100%;" type="text" class="input-text" value="<?php echo $searchpopup_section_btn_link; ?>" >
			</td>
		</tr>								
	    <tr>
			<td>
				<h3><?php _e('Layout components', 'searchpopup_textdomain'); ?></h3>
				<p><?php _e('Mark the elements you want to hide in the searched items', 'searchpopup_textdomain'); ?></p>
				<p><?php _e('The price item only works for woocommerce products', 'searchpopup_textdomain'); ?></p>
			</td>
			<td>	
				<p>                                
                    <?php								
						$items = array(
										'thumbnail' => 'Thumbnail',
										'title' => 'Title',
										'resume' => 'Resume',
										'price' => 'Price',
										'category' => 'Category',
										'date' => 'Date'
						);
						foreach ($items as $key => $label) {
										if ($searchpopup_section_layout_hide_items !== false && is_array($searchpopup_section_layout_hide_items) && in_array($key, $searchpopup_section_layout_hide_items)) {
											$check = 'checked';
										} else {
											$check = '';
										}										
										echo '<input type="checkbox" name="searchpopup_section_layout_hide_items[]" value="' . $key . '" id="' . $key . '" '.$check.'>';
										echo '<label for="' . $key . '">' . $label . '</label><br>';
						}
					?>
                </p>
				<p style="color: red;"><?php _e('Attention, the price item only works for woocommerce products', 'searchpopup_textdomain'); ?></p>
				<p style="color: red;"><?php _e('Attention, the category item only works for woocommerce products and posts', 'searchpopup_textdomain'); ?></p>								
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php _e('Slider Components', 'searchpopup_textdomain'); ?></h3>
				<p><?php _e('Mark the elements you want to hide', 'searchpopup_textdomain'); ?></p>						
			</td>
            <td>	
                <p>                                
                    <?php  
                        $items = array(
                                            'navigation' => __('Hide Navigation', 'searchpopup_textdomain'),
                                            'pagination' => __('Hide Pagination', 'searchpopup_textdomain')										
                        );
                        foreach ($items as $key => $label) {
                            if ($searchpopup_section_layout_slider_hide_items !== false && is_array($searchpopup_section_layout_slider_hide_items) && in_array($key, $searchpopup_section_layout_slider_hide_items)) {
                                    $check = 'checked';
                            } else {
                                    $check = '';
                        }										
                        echo '<input type="checkbox" name="searchpopup_section_layout_slider_hide_items[]" value="' . $key . '" id="' . $key . '" '.$check.'>';
                                            echo '<label for="' . $key . '">' . $label . '</label><br>';
                                }
                        ?>
                    </p>								
            </td>
		</tr>				
	</table>	
 <?php
}

function searchpopup_cpt_msap_meta_save($post_id) {
    global $post;

    // Checks save status
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = ( isset($_POST['searchpopup_cpt_msap_nonce']) && wp_verify_nonce($_POST['searchpopup_cpt_msap_nonce'], basename(__FILE__)) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }

    // Sanitizes and saves the input data

    // Section Activate
    $searchpopup_section_activate = isset($_POST['searchpopup_section_activate']) ? sanitize_text_field($_POST['searchpopup_section_activate']) : '0';
    update_post_meta($post_id, 'searchpopup_section_activate', $searchpopup_section_activate);

    // Section Position
    $searchpopup_section_position = isset($_POST['searchpopup_section_position']) ? absint($_POST['searchpopup_section_position']) : 0;
    update_post_meta($post_id, 'searchpopup_section_position', $searchpopup_section_position);

    // Section CPT
    $searchpopup_section_cpt = isset($_POST['searchpopup_section_cpt']) ? sanitize_text_field($_POST['searchpopup_section_cpt']) : '';
    update_post_meta($post_id, 'searchpopup_section_cpt', $searchpopup_section_cpt);

    // Section Categories
    $searchpopup_section_categories = isset($_POST['searchpopup_section_categories']) ? sanitize_text_field($_POST['searchpopup_section_categories']) : '';
    update_post_meta($post_id, 'searchpopup_section_categories', $searchpopup_section_categories);

    // Section CPT Not Found
    $searchpopup_section_cpt_not_found = isset($_POST['searchpopup_section_cpt_not_found']) ? sanitize_text_field($_POST['searchpopup_section_cpt_not_found']) : '0';
    update_post_meta($post_id, 'searchpopup_section_cpt_not_found', $searchpopup_section_cpt_not_found);

    // Section Quantity
    $searchpopup_section_qty = isset($_POST['searchpopup_section_qty']) ? absint($_POST['searchpopup_section_qty']) : 3;
    update_post_meta($post_id, 'searchpopup_section_qty', $searchpopup_section_qty);

    // Section Show More
    $searchpopup_section_show_more = isset($_POST['searchpopup_section_show_more']) ? sanitize_text_field($_POST['searchpopup_section_show_more']) : '0';
    update_post_meta($post_id, 'searchpopup_section_show_more', $searchpopup_section_show_more);

	$searchpopup_see_all_results_text = isset($_POST['searchpopup_see_all_results_text']) ? sanitize_text_field($_POST['searchpopup_see_all_results_text']) : '';
    update_post_meta($post_id, 'searchpopup_see_all_results_text', $searchpopup_see_all_results_text);
	

    // Section Title
    $searchpopup_section_title = isset($_POST['searchpopup_section_title']) ? sanitize_text_field($_POST['searchpopup_section_title']) : '';
    update_post_meta($post_id, 'searchpopup_section_title', $searchpopup_section_title);

    // Section Button Text
    $searchpopup_section_btn_text = isset($_POST['searchpopup_section_btn_text']) ? sanitize_text_field($_POST['searchpopup_section_btn_text']) : '';
    update_post_meta($post_id, 'searchpopup_section_btn_text', $searchpopup_section_btn_text);

    // Section Button Link
    $searchpopup_section_btn_link = isset($_POST['searchpopup_section_btn_link']) ? esc_url($_POST['searchpopup_section_btn_link']) : '';
    update_post_meta($post_id, 'searchpopup_section_btn_link', $searchpopup_section_btn_link);

    // Layout Components - Hide Items
    $searchpopup_section_layout_hide_items = isset($_POST['searchpopup_section_layout_hide_items']) ? array_map('sanitize_text_field', $_POST['searchpopup_section_layout_hide_items']) : array();
    update_post_meta($post_id, 'searchpopup_section_layout_hide_items', $searchpopup_section_layout_hide_items);

    // Slider Components - Hide Items
    $searchpopup_section_layout_slider_hide_items = isset($_POST['searchpopup_section_layout_slider_hide_items']) ? array_map('sanitize_text_field', $_POST['searchpopup_section_layout_slider_hide_items']) : array();
    update_post_meta($post_id, 'searchpopup_section_layout_slider_hide_items', $searchpopup_section_layout_slider_hide_items);
}

add_action('save_post', 'searchpopup_cpt_msap_meta_save');
