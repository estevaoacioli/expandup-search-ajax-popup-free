<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_woocommerce_page(){
	ob_start();
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php echo expandup_searchpopup_help_links(); ?>
			<?php settings_errors(); ?>
			<?php
			$searchpopup_add_to_cart_activate = false;
			$searchpopup_add_to_cart_modelo = false;
			$searchpopup_add_to_cart_text = false;
			$searchpopup_add_to_cart_action = false;
			$searchpopup_view_cart_action = false;
			$searchpopup_view_cart_text = false;
			$searchpopup_add_cart_success_text = false;
			$searchpopup_add_to_cart_text_color = false;
			$searchpopup_add_to_cart_background = false;
			$searchpopup_add_to_cart_border = false;
			$searchpopup_add_to_cart_text_color_hover = false;
			$searchpopup_add_to_cart_background_hover = false;
			$searchpopup_add_to_cart_border_hover = false;
			$searchpopup_add_to_cart_colors_style = false;				
			?>
			<h1 class="adm-page-title"><?php _e('Expand UP - Multiple Search Ajax Popup', 'searchpopup_textdomain'); ?><span class="plugin-version">Version: <?php echo EXPANDUP_SEARCHPOPUP_VERSION; ?></span></h1>
			<h3 class="adm-page-subtitle"><?php _e('Woocommerce Settings', 'searchpopup_textdomain'); ?></h3>
			<form id="opt-page" method="post" action="options.php" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php _e('Activate "Add to cart"', 'searchpopup_textdomain'); ?></h3>
						<p>
							<label for="searchpopup_add_to_cart_activate" class="label"><?php _e('Do you want to display the buy button on woocommerece product cards in the popup?', 'searchpopup_textdomain'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select name="searchpopup_add_to_cart_activate" id="searchpopup_add_to_cart_activate">
							<option value="0" <?php selected( $searchpopup_add_to_cart_activate, 0 ); ?>><?php _e('No', 'searchpopup_textdomain'); ?></option>
							<option value="1" <?php selected( $searchpopup_add_to_cart_activate, 1 ); ?>><?php _e('Yes', 'searchpopup_textdomain'); ?></option>							
						</select>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php _e('Template to Add to Cart"', 'searchpopup_textdomain'); ?></h3>
						<p>
							<label for="searchpopup_add_to_cart_modelo" class="label"><?php _e('Choose a template to display the add to cart button', 'searchpopup_textdomain'); ?></label>
						</p>
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select name="searchpopup_add_to_cart_modelo" id="searchpopup_add_to_cart_modelo">
							<option value="0" <?php selected( $searchpopup_add_to_cart_modelo, 0 ); ?>><?php _e('Standard button', 'searchpopup_textdomain'); ?></option>
							<?php /*<option value="1" <?php selected( $searchpopup_add_to_cart_modelo, 1 ); ?>><?php _e('Button displayed on hover', 'searchpopup_textdomain'); ?></option>*/ ?>
						</select>
						<p><?php _e('We will soon have other options', 'searchpopup_textdomain'); ?></p>
					</td>
				</tr>				
				<tr>
					<td>
						<h3><?php _e('Action for Add to Cart"', 'searchpopup_textdomain'); ?></h3>
						<p>
							<label for="searchpopup_add_to_cart_action" class="label"><?php _e('What should happen if the product is successfully added to the cart?', 'searchpopup_textdomain'); ?></label>
						</p>
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select name="searchpopup_add_to_cart_action" id="searchpopup_add_to_cart_action">
							<option value="0" <?php selected( $searchpopup_add_to_cart_action, 0 ); ?>><?php _e('Add to cart via ajax and keep the popup open', 'searchpopup_textdomain'); ?></option>
							<option value="1" <?php selected( $searchpopup_add_to_cart_action, 1 ); ?>><?php _e('Add to cart via ajax and close the popup', 'searchpopup_textdomain'); ?></option>
							<option value="2" <?php selected( $searchpopup_add_to_cart_action, 2 ); ?>><?php _e('Add to cart via ajax and close the popup and reload page', 'searchpopup_textdomain'); ?></option>														
							<option value="3" <?php selected( $searchpopup_add_to_cart_action, 3 ); ?>><?php _e('Redirect to cart page', 'searchpopup_textdomain'); ?></option>							
							<option value="4" <?php selected( $searchpopup_add_to_cart_action, 4 ); ?>><?php _e('Redirect to checkout page', 'searchpopup_textdomain'); ?></option>							
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Text for the add to cart button', 'searchpopup_textdomain'); ?></h3>
						<p>
							<label for="searchpopup_add_to_cart_text" class="label"><?php _e('Enter the text for the add to cart button, if left blank the default text "Add to cart" will be shownn', 'searchpopup_textdomain'); ?></label>
						</p>
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<input id="searchpopup_add_to_cart_text" name="searchpopup_add_to_cart_text" type="text" class="input-text-100" value="<?php echo $searchpopup_add_to_cart_text; ?>" >
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Action for view cart link"', 'searchpopup_textdomain'); ?></h3>
						<p>
							<label for="searchpopup_view_cart_action" class="label"><?php _e('Where do you want to redirect to when clicking the view cart link?', 'searchpopup_textdomain'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select name="searchpopup_view_cart_action" id="searchpopup_view_cart_action">
							<option value="0" <?php selected( $searchpopup_view_cart_action, 0 ); ?>><?php _e('Go to cart', 'searchpopup_textdomain'); ?></option>
							<option value="1" <?php selected( $searchpopup_view_cart_action, 1 ); ?>><?php _e('Go to checkout', 'searchpopup_textdomain'); ?></option>							
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Text for the view cart button', 'searchpopup_textdomain'); ?></h3>
						<p>
							<label for="searchpopup_view_cart_text" class="label"><?php _e('Enter the text for the view cart button, if left blank the default text "View cart" will be shownn', 'searchpopup_textdomain'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<input id="searchpopup_view_cart_text" name="searchpopup_view_cart_text" type="text" class="input-text-100" value="<?php echo $searchpopup_view_cart_text; ?>" >
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Text to display after the product is successfully added to the cart', 'searchpopup_textdomain'); ?></h3>
						<p>
							<label for="searchpopup_add_cart_success_text" class="label"><?php _e('Enter a text to display after the product is successfully added to the cart, if left blank the default text will be displayed "Product added to cart successfully"', 'searchpopup_textdomain'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<input id="searchpopup_add_cart_success_text" name="searchpopup_add_cart_success_text" type="text" class="input-text-100" value="<?php echo $searchpopup_add_cart_success_text; ?>" >
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Colors Style', 'searchpopup_textdomain'); ?></h3>
						<p><?php _e('Choose colors to customize this button', 'searchpopup_textdomain'); ?></p>
					</td>
					<td>	
							<div class="control-colors">
								<p><?php _e('Activate custom colors?', 'searchpopup_textdomain'); ?><span style="color: #ff0000;">(Pro Version)</span></p>
								<input type="hidden" value="off" name="searchpopup_add_to_cart_colors_style">
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php _e('Disabled', 'searchpopup_textdomain'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" name="searchpopup_add_to_cart_colors_style" value="on"  <?php if ($searchpopup_add_to_cart_colors_style === 'on'){echo 'checked="checked"';}?>>
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php _e('Activated', 'searchpopup_textdomain'); ?></p>
									</li>	
								</ul>
							</div>						
							<p><strong>Normal</strong></p>
							<p>
                                <label for="searchpopup_add_to_cart_text_color"><?php _e('Button text color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_add_to_cart_text_color" name="searchpopup_add_to_cart_text_color" value="<?php echo $searchpopup_add_to_cart_text_color; ?>">
                            </p>
							<p>
                                <label for="searchpopup_add_to_cart_background"><?php _e('Button background color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_add_to_cart_background" name="searchpopup_add_to_cart_background" value="<?php echo $searchpopup_add_to_cart_background; ?>">
                            </p>
							<p>
                                <label for="searchpopup_add_to_cart_border"><?php _e('Button background color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_add_to_cart_border" name="searchpopup_add_to_cart_border" value="<?php echo $searchpopup_add_to_cart_border; ?>">
                            </p>
															
							<p><strong>Hover</strong></p>
							<p>
                                <label for="searchpopup_add_to_cart_text_color_hover"><?php _e('Button text color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_add_to_cart_text_color_hover" name="searchpopup_add_to_cart_text_color_hover" value="<?php echo $searchpopup_add_to_cart_text_color_hover; ?>">
                            </p>
							<p>
                                <label for="searchpopup_add_to_cart_background_hover"><?php _e('Button background color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_add_to_cart_background_hover" name="searchpopup_add_to_cart_background_hover" value="<?php echo $searchpopup_add_to_cart_background_hover; ?>">
                            </p>
							<p>
                                <label for="searchpopup_add_to_cart_border_hover"><?php _e('Button background color:', 'searchpopup_textdomain'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_add_to_cart_border_hover" name="searchpopup_add_to_cart_border_hover" value="<?php echo $searchpopup_add_to_cart_border_hover; ?>">
                            </p>
															
					</td>
				</tr>		
			</table>	
			<?php // The fields are sanitized in the expandup_searchpopup_register_settings function within the class ?>				
				<?php settings_fields('expandup_searchpopup_opt_popup_woo'); ?>
				<?php do_settings_sections('expandup_searchpopup_opt_popup_woo'); ?>				
				<div class="options-footer-settings">
				<?php 
					$label = __('Save Settings', 'searchpopup_textdomain');
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
		/* Clean buffer */
		ob_end_clean();
		/* Return the content */
		return $object;
	} 
?>