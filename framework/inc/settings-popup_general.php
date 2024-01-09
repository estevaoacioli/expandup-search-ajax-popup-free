<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_popup_general_page(){
	ob_start();	
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php echo expandup_searchpopup_help_links(); ?>
			<?php settings_errors(); ?>
			<?php				
				$searchpopup_activate = get_option('searchpopup_activate', false);
				$searchpopup_where_to_use = get_option('searchpopup_where_to_use', false);				
				$searchpopup_preloader_icon_color = get_option('searchpopup_preloader_icon_color', false);
				$searchpopup_popup_background = get_option('searchpopup_popup_background', false);				
				$searchpopup_popup_transparency = get_option('searchpopup_popup_transparency', false);	
				$searchpopup_popup_colors_style = get_option('searchpopup_popup_colors_style', false);	
				$searchpopup_popup_smart_images_settings = get_option('searchpopup_popup_smart_images_settings', false);
				$searchpopup_popup_card_image_size = get_option('searchpopup_popup_card_image_size', false);
			?>	
			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'searchpopup_textdomain'); ?><span class="plugin-version">Version: <?php echo EXPANDUP_SEARCHPOPUP_VERSION; ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('General', 'searchpopup_textdomain'); ?></h3>
			<form id="opt-page" method="post" action="options.php" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Activate this plugin', 'searchpopup_textdomain'); ?></h3>
						<p><label for="searchpopup_activate" class="label"><?php esc_html_e('Do you want to activate this plugin?', 'searchpopup_textdomain'); ?></label></p>
					</td>
					<td>
						<select name="searchpopup_activate" id="searchpopup_activate">
							<option value="0" <?php selected( $searchpopup_activate, 0 ); ?>><?php esc_html_e('No', 'searchpopup_textdomain'); ?></option>
							<option value="1" <?php selected( $searchpopup_activate, 1 ); ?>><?php esc_html_e('Yes', 'searchpopup_textdomain'); ?></option>													
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Where to use?', 'searchpopup_textdomain'); ?></h3>
						<p><label for="searchpopup_where_to_use" class="label"><?php esc_html_e('Enter the ids or class of your search forms', 'searchpopup_textdomain'); ?></label><p>
					</td>
					<td>
					<textarea id="searchpopup_where_to_use" name="searchpopup_where_to_use" rows="6" cols="50" class="input-text-100"><?php echo $searchpopup_where_to_use; ?></textarea>
					<p><?php esc_html_e("It's important to separate multiple forms with commas when identifying them. You can use the form's ID or a unique class associated with it. You can also combine ID and class for more precise targeting. Here are some examples:", 'searchpopup_textdomain'); ?></p>
					<p>
						<b>#form-header</b><br>
						<b>.form-header</b><br>
						<b>#form-mobile .form-search-mobile</b><br>
						<b>#header form</b><br>
					</p>
					<p><?php esc_html_e("However, please note that these are just examples, and the structure may vary depending on your theme. If you have any doubts, it's advisable to seek assistance from your developer or contact our support team.", 'searchpopup_textdomain'); ?></p>
					<p><?php esc_html_e('Furthermore, please be aware that the plugin script only works with search forms. Therefore, make sure the form contains a <b>type="search"</b> field and <b>name="s"</b>. Regular forms that do not meet these requirements will not be accepted.', 'searchpopup_textdomain'); ?></p>
					
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Popup Colors Style', 'searchpopup_textdomain'); ?></h3>
						<p><?php esc_html_e('Choose colors to customize your popup and form', 'searchpopup_textdomain'); ?></p>
					</td>
					<td>							
							<div class="control-colors">
								<p><?php esc_html_e('Activate custom colors?', 'searchpopup_textdomain'); ?></p>
								<input type="hidden" value="off" name="searchpopup_popup_colors_style">
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Disabled', 'searchpopup_textdomain'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" name="searchpopup_popup_colors_style" value="on"  <?php if ($searchpopup_popup_colors_style === 'on'){echo 'checked="checked"';}?>>
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Activated', 'searchpopup_textdomain'); ?></p>
									</li>	
								</ul>
							</div>
							<p>
                                <label for="searchpopup_preloader_icon_color"><?php esc_html_e('Preloader icon color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_preloader_icon_color" name="searchpopup_preloader_icon_color" value="<?php echo $searchpopup_preloader_icon_color; ?>">
                            </p>
							<p>
                                <label for="searchpopup_popup_background"><?php esc_html_e('Popup background color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_popup_background" name="searchpopup_popup_background" value="<?php echo $searchpopup_popup_background; ?>">
                            </p>                            
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Configure transparency in the popup background?', 'searchpopup_textdomain'); ?></h3>
						<p><?php esc_html_e('You can choose values between 0 and 1, we recommend values greater than 0.8', 'searchpopup_textdomain'); ?></p>
					</td>
					<td>
							<p>
								<label for="searchpopup_popup_transparency"><?php esc_html_e('Transparency:', 'searchpopup_textdomain'); ?></label>
								<input type="number" id="searchpopup_popup_transparency" name="searchpopup_popup_transparency" min="0" max="1" step="0.01" value="<?php echo $searchpopup_popup_transparency; ?>">
                            </p>
							
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php esc_html_e('Enable Smart Size', 'searchpopup_textdomain'); ?></h3>
						<p><?php esc_html_e('Enable plugin custom image size', 'searchpopup_textdomain'); ?></p>
					</td>
					<td>
							<p><strong><?php esc_html_e('Observation', 'searchpopup_textdomain'); ?></strong><br>
							<?php esc_html_e('By enabling this feature the plugin will create 1 custom image size to be used in your carousels. This way you can have better results in your presentations.', 'searchpopup_textdomain'); ?>
							</p>
                            <p><?php esc_html_e('We highly recommend using the plugin Regenerate Thumbnails to update your images, otherwise the old images will not have the new sizes.','searchpopup_textdomain'); ?></p>
                            <p><?php esc_html_e('To regenerate your thumbnails we recommend this plugin: ','searchpopup_textdomain'); ?><a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a></p>
							<select id="searchpopup_popup_smart_images_settings" name="searchpopup_popup_smart_images_settings" >
								<option value="0" <?php selected( $searchpopup_popup_smart_images_settings, 0 ); ?>><?php esc_html_e('No', 'searchpopup_textdomain'); ?></option>
								<option value="1" <?php selected( $searchpopup_popup_smart_images_settings, 1 ); ?>><?php esc_html_e('Yes', 'searchpopup_textdomain'); ?></option>	
                        	</select>
							
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Images Settings', 'searchpopup_textdomain'); ?></h3>
						<p><?php esc_html_e('Choose the image size, giving preference to images that have a square appearance, this way you avoid cropping your images.', 'searchpopup_textdomain'); ?></p>
					</td>
					<td>
							<p><strong><?php esc_html_e('Observation', 'searchpopup_textdomain'); ?></strong><br>
							<?php esc_html_e("If the 'Smart Size' feature is enabled, the image created by it will be used as the preferred option. In case it is not available, it will be automatically replaced by the selected image below. In the last case the thumbnail will be used", 'searchpopup_textdomain'); ?>
							</p>
							<p><?php esc_html_e('If the post does not have a featured image, a default image will be displayed', 'searchpopup_textdomain'); ?></p>  							
							<select id="searchpopup_popup_card_image_size" name="searchpopup_popup_card_image_size">
								<?php
								$registered_image_sizes = get_intermediate_image_sizes(); 

								if (!empty($registered_image_sizes)) {
									foreach ($registered_image_sizes as $size) {
										// Obtém as dimensões do tamanho da imagem
										$dimensions = image_get_intermediate_size($size);

										// Se as dimensões estiverem disponíveis, concatene-as com o nome do tamanho
										$size_label = $dimensions ? $size . ' (' . $dimensions['width'] . 'x' . $dimensions['height'] . ')' : $size;

										echo '<option value="' . $size . '" ' . selected($searchpopup_popup_card_image_size, $size) . ' >' . $size_label . '</option>';
									}
								}
								?>
							</select>							
					</td>
				</tr>		
			</table>
			<?php // The fields are sanitized in the expandup_searchpopup_register_settings function within the class ?>					
				<?php settings_fields('expandup_searchpopup_opt_general'); ?>
				<?php do_settings_sections('expandup_searchpopup_opt_general'); ?>				
				<div class="options-footer-settings">
				<?php 
					$label = esc_html__('Save Settings', 'searchpopup_textdomain');
					$class = 'button-primary big-size';
					submit_button($label, $class); 
				?>
				</div>
			</form>
			<?php echo expandup_searchpopup_help_links(); ?>
		</div>	
</div>
<?php 
		$object = ob_get_contents();
		// Clean buffer
		ob_end_clean();
		// Return the content
		return $object;
	} 
?>