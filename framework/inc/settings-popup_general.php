<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_popup_general_page(){
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php expmsap_help_links(); ?>
			<?php settings_errors(); ?>
			<?php				
				$expmsap_activate = get_option('expmsap_activate', false);
				$expmsap_where_to_use = get_option('expmsap_where_to_use', false);				
				$expmsap_preloader_icon_color = get_option('expmsap_preloader_icon_color', false);
				$expmsap_popup_background = get_option('expmsap_popup_background', false);				
				$expmsap_popup_transparency = get_option('expmsap_popup_transparency', false);	
				$expmsap_popup_colors_style = get_option('expmsap_popup_colors_style', false);	
				$expmsap_popup_smart_images_settings = get_option('expmsap_popup_smart_images_settings', false);
				$expmsap_popup_card_image_size = get_option('expmsap_popup_card_image_size', false);
				$expmsap_popup_click_on_close = get_option('expmsap_popup_click_on_close', false);
				$expmsap_click_out_popup = get_option('expmsap_click_out_popup', false);							
			?>	
			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'expandup-search-ajax-popup-free'); ?><span class="plugin-version">Version: <?php echo esc_html(EXPMSAP_VERSION); ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('General', 'expandup-search-ajax-popup-free'); ?></h3>
			<form id="opt-page" method="post" action="options.php" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Activate this plugin', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><label for="expmsap_activate" class="label"><?php esc_html_e('Do you want to activate this plugin?', 'expandup-search-ajax-popup-free'); ?></label></p>
					</td>
					<td>
						<select name="expmsap_activate" id="expmsap_activate">
							<option value="0" <?php selected( $expmsap_activate, 0 ); ?>><?php esc_html_e('No', 'expandup-search-ajax-popup-free'); ?></option>
							<option value="1" <?php selected( $expmsap_activate, 1 ); ?>><?php esc_html_e('Yes', 'expandup-search-ajax-popup-free'); ?></option>													
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Where to use?', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><label for="expmsap_where_to_use" class="label"><?php esc_html_e('Enter the ids or class of your search forms', 'expandup-search-ajax-popup-free'); ?></label><p>
					</td>
					<td>
					<textarea id="expmsap_where_to_use" name="expmsap_where_to_use" rows="6" cols="50" class="input-text-100"><?php echo esc_html($expmsap_where_to_use); ?></textarea>
					<p><?php esc_html_e("It's important to separate multiple forms with commas when identifying them. You can use the form's ID or a unique class associated with it. You can also combine ID and class for more precise targeting. Here are some examples:", 'expandup-search-ajax-popup-free'); ?></p>
					<p>
						<b>#form-header</b><br>
						<b>.form-header</b><br>
						<b>#form-mobile .form-search-mobile</b><br>
						<b>#header form</b><br>
					</p>
					<p><?php esc_html_e("However, please note that these are just examples, and the structure may vary depending on your theme. If you have any doubts, it's advisable to seek assistance from your developer or contact our support team.", 'expandup-search-ajax-popup-free'); ?></p>
					<p><?php esc_html_e('Furthermore, please be aware that the plugin script only works with search forms. Therefore, make sure the form contains a <b>type="search"</b> field and <b>name="s"</b>. Regular forms that do not meet these requirements will not be accepted.', 'expandup-search-ajax-popup-free'); ?></p>
					
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Popup Colors Style', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Choose colors to customize your popup and form', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>							
							<div class="control-colors">
								<p><?php esc_html_e('Activate custom colors?', 'expandup-search-ajax-popup-free'); ?></p>
								<input type="hidden" value="off" name="expmsap_popup_colors_style">
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Disabled', 'expandup-search-ajax-popup-free'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" name="expmsap_popup_colors_style" value="on"  <?php if ($expmsap_popup_colors_style === 'on'){echo esc_html('checked="checked"');}?>>
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Activated', 'expandup-search-ajax-popup-free'); ?></p>
									</li>	
								</ul>
							</div>
							<p>
                                <label for="expmsap_preloader_icon_color"><?php esc_html_e('Preloader icon color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_preloader_icon_color" name="expmsap_preloader_icon_color" value="<?php echo esc_html($expmsap_preloader_icon_color); ?>">
                            </p>
							<p>
                                <label for="expmsap_popup_background"><?php esc_html_e('Popup background color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_popup_background" name="expmsap_popup_background" value="<?php echo esc_html($expmsap_popup_background); ?>">
                            </p>                            
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Configure transparency in the popup background?', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('You can choose values between 0 and 1, we recommend values greater than 0.8', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>
							<p>
								<label for="expmsap_popup_transparency"><?php esc_html_e('Transparency:', 'expandup-search-ajax-popup-free'); ?></label>
								<input type="number" id="expmsap_popup_transparency" name="expmsap_popup_transparency" min="0" max="1" step="0.01" value="<?php echo esc_html($expmsap_popup_transparency); ?>">
                            </p>
							
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php esc_html_e('Enable Smart Size', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Enable plugin custom image size', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>
							<p><strong><?php esc_html_e('Observation', 'expandup-search-ajax-popup-free'); ?></strong><br>
							<?php esc_html_e('By enabling this feature the plugin will create 1 custom image size to be used in your carousels. This way you can have better results in your presentations.', 'expandup-search-ajax-popup-free'); ?>
							</p>
                            <p><?php esc_html_e('We highly recommend using the plugin Regenerate Thumbnails to update your images, otherwise the old images will not have the new sizes.','expandup-search-ajax-popup-free'); ?></p>
                            <p><?php esc_html_e('To regenerate your thumbnails we recommend this plugin: ','expandup-search-ajax-popup-free'); ?><a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank"><?php esc_html_e('Regenerate Thumbnails'); ?></a></p>
							<select id="expmsap_popup_smart_images_settings" name="expmsap_popup_smart_images_settings" >
								<option value="0" <?php selected( $expmsap_popup_smart_images_settings, 0 ); ?>><?php esc_html_e('No', 'expandup-search-ajax-popup-free'); ?></option>
								<option value="1" <?php selected( $expmsap_popup_smart_images_settings, 1 ); ?>><?php esc_html_e('Yes', 'expandup-search-ajax-popup-free'); ?></option>	
                        	</select>
							
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Images Settings', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Choose the image size, giving preference to images that have a square appearance, this way you avoid cropping your images.', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>
							<p><strong><?php esc_html_e('Observation', 'expandup-search-ajax-popup-free'); ?></strong><br>
							<?php esc_html_e("If the 'Smart Size' feature is enabled, the image created by it will be used as the preferred option. In case it is not available, it will be automatically replaced by the selected image below. In the last case the thumbnail will be used", 'expandup-search-ajax-popup-free'); ?>
							</p>
							<p><?php esc_html_e('If the post does not have a featured image, a default image will be displayed', 'expandup-search-ajax-popup-free'); ?></p>  							
							<select id="expmsap_popup_card_image_size" name="expmsap_popup_card_image_size">
								<?php
								$registered_image_sizes = get_intermediate_image_sizes(); 

								if (!empty($registered_image_sizes)) {
									foreach ($registered_image_sizes as $size) {
										
										$dimensions = image_get_intermediate_size($size);										
										$size_label = $dimensions ? $size . ' (' . $dimensions['width'] . 'x' . $dimensions['height'] . ')' : $size;
										
										$selected_attr = selected($expmsap_popup_card_image_size, $size, false);

										echo '<option value="' . esc_attr($size) . '" ' . esc_attr($selected_attr) . ' >' . esc_html($size_label) . '</option>';
									}
								}
								?>
							</select>							
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Click on close', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Here you can choose what happens after the close icon is clicked.', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>
							<p>
							<input type="radio" id="click_on_close_01" name="expmsap_popup_click_on_close[]" value="1" <?php checked( '1', $expmsap_popup_click_on_close, true ); ?> >
							<label for="click_on_close_01"><?php esc_html_e('Close the popup', 'expandup-search-ajax-popup-free'); ?></label><br>
							<input type="radio" id="click_on_close_02" name="expmsap_popup_click_on_close[]" value="2" <?php checked( '2', $expmsap_popup_click_on_close, true ); ?> >
							<label for="click_on_close_02"><?php esc_html_e('Close the popup and reload the page', 'expandup-search-ajax-popup-free'); ?></label>
                            </p>	
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Click outside the popup', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Here you can choose what happens when the user clicks away from the popup', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>
							<p>
							<input type="radio" id="click_out_popup_01" name="expmsap_click_out_popup[]" value="1" <?php checked( '1', $expmsap_click_out_popup, true ); ?> >
							<label for="click_out_popup_01"><?php esc_html_e('Do not do anything', 'expandup-search-ajax-popup-free'); ?></label><br>
							<input type="radio" id="click_out_popup_02" name="expmsap_click_out_popup[]" value="2" <?php checked( '2', $expmsap_click_out_popup, true ); ?> >
							<label for="click_out_popup_02"><?php esc_html_e('Close the popup', 'expandup-search-ajax-popup-free'); ?></label></br>
							<input type="radio" id="click_out_popup_03" name="expmsap_click_out_popup[]" value="3" <?php checked( '3', $expmsap_click_out_popup, true ); ?> >
							<label for="click_out_popup_03"><?php esc_html_e('Close the popup and reload the page', 'expandup-search-ajax-popup-free'); ?></label>
                            </p>	
					</td>
				</tr>	
			</table>
			<?php // The fields are sanitized in the expmsap_register_settings function within the class ?>					
				<?php settings_fields('expmsap_opt_general'); ?>
				<?php do_settings_sections('expmsap_opt_general'); ?>				
				<div class="options-footer-settings">
				<?php 
					$label = esc_html__('Save Settings', 'expandup-search-ajax-popup-free');
					$class = 'button-primary big-size';
					submit_button($label, $class); 
				?>
				</div>
			</form>
			<?php expmsap_help_links(); ?>
		</div>	
</div>
<?php 
	} 
?>