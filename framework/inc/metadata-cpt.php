<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_cpt_msap_metas() {
    add_meta_box('item-msap-fields', esc_html__('Slider Options', 'expandup-search-ajax-popup-free'), 'expmsap_cpt_msap_metas_display', 'msap', 'normal', 'default');
}
add_action('admin_init', 'expmsap_cpt_msap_metas');

function expmsap_cpt_msap_metas_display(){
    global $post;
    $post_id = $post->ID;
    wp_nonce_field('expmsap_cpt_msap_nonce', 'expmsap_cpt_msap_nonce');	
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
     
    
?>
    <table class="styled-table">
		<tr>
			<td>
				<h3><?php esc_html_e('Activate this section', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><label for="expmsap_section_activate" class="label"><?php esc_html_e('Do you want to activate this section?', 'expandup-search-ajax-popup-free'); ?></label>
			</td>
			<td>
				<select name="expmsap_section_activate" id="expmsap_section_activate" required>
					<option value="0" <?php selected( $expmsap_section_activate, 0 ); ?>><?php esc_html_e('No', 'expandup-search-ajax-popup-free'); ?></option>
					<option value="1" <?php selected( $expmsap_section_activate, 1 ); ?>><?php esc_html_e('Yes', 'expandup-search-ajax-popup-free'); ?></option>							
				</select>
			</td>
		</tr>	
        <tr>
			<td>
				<h3><?php esc_html_e('Section position', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><label for="expmsap_section_position" class="label"><?php esc_html_e('Select a number for the position of this section in the popup, the order of the sections is ascending', 'expandup-search-ajax-popup-free'); ?></label>
			</td>
			<td>
                <input type="number" id="expmsap_section_position" name="expmsap_section_position" min="0" max="999" step="1" value="<?php echo esc_html($expmsap_section_position); ?>" required>
			</td>
		</tr>							
		<tr>
			<td>
				<h3><?php esc_html_e('Search for', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><?php esc_html_e('What type of content do you want to display in this search? Choose an option.', 'expandup-search-ajax-popup-free'); ?></p>
				<p><span style="color: #ff0000;">Attention: The Woocommerce product type is only available in the PRO version</span><p>
			</td>
		    <td>
                <select name="expmsap_section_cpt" required>
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
							echo '<option value="' . esc_attr($cpt_key) . '" ' . selected( esc_attr($expmsap_section_cpt), esc_attr($cpt_key), false ) . '>' . esc_html($labels->singular_name) . '</option>';
							
                        }
                    }
                    ?>
                </select>
                <p><?php esc_html_e('If you want to search in a specific category, just paste its slug in the field below, leave it blank to search in all. You can also paste several slugs, separated by commas', 'expandup-search-ajax-popup-free'); ?><br>
                <input id="expmsap_section_categories" name="expmsap_section_categories" style="width: 100%;" type="text" class="input-text" value="<?php echo esc_html($expmsap_section_categories); ?>">
                </p>
            </td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Search not found', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><label for="expmsap_section_cpt_not_found" class="label"><?php esc_html_e("What do you want to do if your search doesn't find anything?", 'expandup-search-ajax-popup-free'); ?></label>
			</td>
			<td>						
				<select name="expmsap_section_cpt_not_found" id="expmsap_section_cpt_not_found" required>						
				<?php
					$search_opts = array(
									0 => esc_html__('Show only the text: Nothing found in this search.', 'expandup-search-ajax-popup-free'),
									1 => esc_html__('Show the latest posts from this CPT', 'expandup-search-ajax-popup-free'),
									2 => esc_html__('Completely hide the section', 'expandup-search-ajax-popup-free')
					);
					foreach ($search_opts as $key => $label) {		
						echo '<option value="' . esc_attr($key) . '" ' . selected( esc_attr($expmsap_section_cpt_not_found), esc_attr($cpt_key), false ) . '>' . esc_html($label) . '</option>';							
					}
					?>							
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Quantity of items to display', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><label for="expmsap_section_qty" class="label"><?php esc_html_e('How many items do you want to display for this search? Please keep in mind that very high values can slow down the server response.', 'expandup-search-ajax-popup-free'); ?></label>
			</td>
			<td>
				<select name="expmsap_section_qty" id="expmsap_section_qty" required>
					<?php
						for ($i = 3; $i <= 21; $i += 3) {							
							echo '<option value="' . esc_attr($i) . '" ' . selected($expmsap_section_qty, absint($i), false) . '>' . esc_html( absint($i) ) . '</option>';							
						}															
					?>							
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Show more results', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><label for="expmsap_section_show_more" class="label"><?php esc_html_e('Show link to view all results?', 'expandup-search-ajax-popup-free'); ?></label>
			</td>
			<td>
				<p style="color: red;"><?php esc_html_e('Attention, this feature is experimental', 'expandup-search-ajax-popup-free'); ?></p>
				<select name="expmsap_section_show_more" id="expmsap_section_show_more" required>
					<option value="0" <?php selected( $expmsap_section_show_more, 0 ); ?>><?php esc_html_e('No', 'expandup-search-ajax-popup-free'); ?></option>
					<option value="1" <?php selected( $expmsap_section_show_more, 1 ); ?>><?php esc_html_e('Yes', 'expandup-search-ajax-popup-free'); ?></option>							
				</select>
				<p><label for="expmsap_see_all_results_text" class="label"><?php esc_html_e('Enter text for the see all results button if left blank the default text will be displayed "See all results"', 'expandup-search-ajax-popup-free'); ?></label>
				<input id="expmsap_see_all_results_text" name="expmsap_see_all_results_text" style="width: 100%;" type="text" class="input-text" value="<?php echo esc_html($expmsap_see_all_results_text); ?>" >
			    
			</td>
		</tr>					
		<tr>
			<td>
				<h3><?php esc_html_e('Section title', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><label for="expmsap_section_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expandup-search-ajax-popup-free'); ?></label>
			</td>
			<td>
				<input id="expmsap_section_title" name="expmsap_section_title" style="width: 100%;" type="text" class="input-text" value="<?php echo esc_html($expmsap_section_title); ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Section Link', 'expandup-search-ajax-popup-free'); ?></h3>	
                <p><?php esc_html_e('This link appears next to the section title, you can use it to add a link to a category, or results page for example', 'expandup-search-ajax-popup-free'); ?></p>						
			</td>
			<td>
                <p><label for="expmsap_section_btn_text" class="label"><?php esc_html_e('Enter text for the section link, if left blank the link will not be shown', 'expandup-search-ajax-popup-free'); ?></label>
				<input id="expmsap_section_btn_text" name="expmsap_section_btn_text" style="width: 100%;" type="text" class="input-text" value="<?php echo esc_html($expmsap_section_btn_text); ?>" >
                <p><label for="expmsap_section_btn_link" class="label"><?php esc_html_e('Enter the link for the button.', 'expandup-search-ajax-popup-free'); ?></label>
                <input id="expmsap_section_btn_link" name="expmsap_section_btn_link" style="width: 100%;" type="text" class="input-text" value="<?php echo esc_url($expmsap_section_btn_link); ?>" >
			</td>
		</tr>								
	    <tr>
			<td>
				<h3><?php esc_html_e('Layout components', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><?php esc_html_e('Mark the elements you want to hide in the searched items', 'expandup-search-ajax-popup-free'); ?></p>
				<p><?php esc_html_e('The price item only works for woocommerce products', 'expandup-search-ajax-popup-free'); ?></p>
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
										if ($expmsap_section_layout_hide_items !== false && is_array($expmsap_section_layout_hide_items) && in_array($key, $expmsap_section_layout_hide_items)) {
											$check = 'checked';
										} else {
											$check = '';
										}
										echo '<input type="checkbox" name="expmsap_section_layout_hide_items[]" value="' . esc_attr($key) . '" id="' . esc_attr($key) . '" ' . esc_attr($check) . '>';
										echo '<label for="' . esc_attr($key) . '">' . esc_html($label) . '</label><br>';
						}
					?>
                </p>
				<p style="color: red;"><?php esc_html_e('Attention, the price item only works for woocommerce products', 'expandup-search-ajax-popup-free'); ?></p>
				<p style="color: red;"><?php esc_html_e('Attention, the category item only works for woocommerce products and posts', 'expandup-search-ajax-popup-free'); ?></p>								
			</td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Slider Components', 'expandup-search-ajax-popup-free'); ?></h3>
				<p><?php esc_html_e('Mark the elements you want to hide', 'expandup-search-ajax-popup-free'); ?></p>						
			</td>
            <td>	
			<p>
				<?php  
				$items = array(
					'navigation' => esc_html__('Hide Navigation', 'expandup-search-ajax-popup-free'),
					'pagination' => esc_html__('Hide Pagination', 'expandup-search-ajax-popup-free')										
				);

				foreach ($items as $key => $label) {
					$check = '';
					if ($expmsap_section_layout_slider_hide_items !== false && is_array($expmsap_section_layout_slider_hide_items) && in_array($key, $expmsap_section_layout_slider_hide_items)) {
						$check = 'checked';
					}

					echo '<input type="checkbox" name="expmsap_section_layout_slider_hide_items[]" value="' . esc_attr($key) . '" id="' . esc_attr($key) . '" ' . esc_attr($check) . '>';
					echo '<label for="' . esc_attr($key) . '">' . esc_html($label) . '</label><br>';
				}
				?>
			</p>								
            </td>
		</tr>				
	</table>	
 <?php
}

function expmsap_cpt_msap_meta_save($post_id) {
    global $post;

    // Checks save status
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);  
	$is_valid_nonce = (
		isset($_POST['expmsap_cpt_msap_nonce']) &&
		wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['expmsap_cpt_msap_nonce'])), basename(__FILE__))
	) ? 'true' : 'false';
    // Exits script depending on save status
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }

    // Sanitizes and saves the input data

    // Section Activate
    $expmsap_section_activate = isset($_POST['expmsap_section_activate']) ? sanitize_text_field($_POST['expmsap_section_activate']) : '0';
    update_post_meta($post_id, 'expmsap_section_activate', $expmsap_section_activate);
    
	// Section Position
	$expmsap_section_position = isset($_POST['expmsap_section_position']) ? absint(sanitize_text_field($_POST['expmsap_section_position'])) : 0;
	update_post_meta($post_id, 'expmsap_section_position', $expmsap_section_position);


    // Section CPT
    $expmsap_section_cpt = isset($_POST['expmsap_section_cpt']) ? sanitize_text_field($_POST['expmsap_section_cpt']) : '';
    update_post_meta($post_id, 'expmsap_section_cpt', $expmsap_section_cpt);

    // Section Categories
    $expmsap_section_categories = isset($_POST['expmsap_section_categories']) ? sanitize_text_field($_POST['expmsap_section_categories']) : '';
    update_post_meta($post_id, 'expmsap_section_categories', $expmsap_section_categories);

    // Section CPT Not Found
    $expmsap_section_cpt_not_found = isset($_POST['expmsap_section_cpt_not_found']) ? sanitize_text_field($_POST['expmsap_section_cpt_not_found']) : '0';
    update_post_meta($post_id, 'expmsap_section_cpt_not_found', $expmsap_section_cpt_not_found);

    // Section Quantity
    $expmsap_section_qty = isset($_POST['expmsap_section_qty']) ? absint(sanitize_text_field($_POST['expmsap_section_qty'])) : 3;
    update_post_meta($post_id, 'expmsap_section_qty', $expmsap_section_qty);

    // Section Show More
    $expmsap_section_show_more = isset($_POST['expmsap_section_show_more']) ? sanitize_text_field($_POST['expmsap_section_show_more']) : '0';
    update_post_meta($post_id, 'expmsap_section_show_more', $expmsap_section_show_more);

	$expmsap_see_all_results_text = isset($_POST['expmsap_see_all_results_text']) ? sanitize_text_field($_POST['expmsap_see_all_results_text']) : '';
    update_post_meta($post_id, 'expmsap_see_all_results_text', $expmsap_see_all_results_text);	

    // Section Title
    $expmsap_section_title = isset($_POST['expmsap_section_title']) ? sanitize_text_field($_POST['expmsap_section_title']) : '';
    update_post_meta($post_id, 'expmsap_section_title', $expmsap_section_title);

    // Section Button Text
    $expmsap_section_btn_text = isset($_POST['expmsap_section_btn_text']) ? sanitize_text_field($_POST['expmsap_section_btn_text']) : '';
    update_post_meta($post_id, 'expmsap_section_btn_text', $expmsap_section_btn_text);

	// Section Button Link
	$expmsap_section_btn_link = isset($_POST['expmsap_section_btn_link']) ? sanitize_text_field($_POST['expmsap_section_btn_link']) : '';
    update_post_meta($post_id, 'expmsap_section_btn_link', $expmsap_section_btn_link);

    // Layout Components - Hide Items
    $expmsap_section_layout_hide_items = isset($_POST['expmsap_section_layout_hide_items']) ? array_map('sanitize_text_field', $_POST['expmsap_section_layout_hide_items']) : array();
    update_post_meta($post_id, 'expmsap_section_layout_hide_items', $expmsap_section_layout_hide_items);

    // Slider Components - Hide Items
    $expmsap_section_layout_slider_hide_items = isset($_POST['expmsap_section_layout_slider_hide_items']) ? array_map('sanitize_text_field', $_POST['expmsap_section_layout_slider_hide_items']) : array();
    update_post_meta($post_id, 'expmsap_section_layout_slider_hide_items', $expmsap_section_layout_slider_hide_items);
}

add_action('save_post', 'expmsap_cpt_msap_meta_save');
