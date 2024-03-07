<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_popup_footer_page(){	
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php expmsap_help_links(); ?>
			<?php settings_errors(); ?>
			<?php
				$expmsap_popup_footer_activate = get_option('expmsap_popup_footer_activate', false);
				$expmsap_popup_footer_menu01 = get_option('expmsap_popup_footer_menu01', false);
				$expmsap_popup_footer_menu02 = get_option('expmsap_popup_footer_menu02', false);
				$expmsap_popup_footer_menu03 = get_option('expmsap_popup_footer_menu03', false);
				$expmsap_popup_footer_title = get_option('expmsap_popup_footer_title', false);				
				$expmsap_popup_footer_menu01_title = get_option('expmsap_popup_footer_menu01_title', false);
				$expmsap_popup_footer_menu02_title = get_option('expmsap_popup_footer_menu02_title', false);
				$expmsap_popup_footer_menu03_title = get_option('expmsap_popup_footer_menu03_title', false);
			?>
			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'expandup-search-ajax-popup-free'); ?><span class="plugin-version">Version: <?php echo esc_html(EXPMSAP_VERSION); ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('Popup Footer', 'expandup-search-ajax-popup-free'); ?></h3>
			<form id="opt-page" method="post" action="options.php" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Activate this section', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><label for="expmsap_popup_footer_activate" class="label"><?php esc_html_e('Do you want to activate this section?', 'expandup-search-ajax-popup-free'); ?></label></p>
					</td>
					<td>
						<select name="expmsap_popup_footer_activate" id="expmsap_popup_footer_activate">
							<option value="0" <?php selected( $expmsap_popup_footer_activate, 0 ); ?>><?php esc_html_e('No', 'expandup-search-ajax-popup-free'); ?></option>
							<option value="1" <?php selected( $expmsap_popup_footer_activate, 1 ); ?>><?php esc_html_e('Yes', 'expandup-search-ajax-popup-free'); ?></option>							
						</select>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php esc_html_e('Menu 01', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><label for="expmsap_popup_footer_menu01" class="label"><?php esc_html_e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'expandup-search-ajax-popup-free'); ?></label></p>
					</td>
					<td>
					<p>
						<label for="expmsap_popup_footer_menu01_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expandup-search-ajax-popup-free'); ?></label>
						<br><input id="expmsap_popup_footer_menu01_title" name="expmsap_popup_footer_menu01_title" type="text" class="input-text" value="<?php echo esc_attr($expmsap_popup_footer_menu01_title); ?>" >
					</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="expmsap_popup_footer_menu01">';
								echo '<option value="">'. esc_html__('Choose a menu', 'expandup-search-ajax-popup-free') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $expmsap_popup_footer_menu01, $val );
									echo '<option value="' . esc_attr($val) . '" ' . esc_attr($check) . '>' . esc_html($name) . '</option>';
								}
								echo '</select>';								
							} else {
								esc_html_e('No menu found.', 'expandup-search-ajax-popup-free');
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Menu 02', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><label for="expmsap_popup_footer_menu02" class="label"><?php esc_html_e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'expandup-search-ajax-popup-free'); ?></label></p>
					</td>
					<td>
						<p>
							<label for="expmsap_popup_footer_menu02_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expandup-search-ajax-popup-free'); ?></label>
							<br><input id="expmsap_popup_footer_menu02_title" name="expmsap_popup_footer_menu02_title" type="text" class="input-text" value="<?php echo esc_html($expmsap_popup_footer_menu02_title); ?>" >
						</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="expmsap_popup_footer_menu02">';
								echo '<option value="">'. esc_html__('Choose a menu', 'expandup-search-ajax-popup-free') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $expmsap_popup_footer_menu02, $val );
									echo '<option value="' . esc_attr($val) . '" ' . esc_attr($check) . '>' . esc_html($name) . '</option>';
								}
								echo '</select>';								
							} else {
								esc_html_e('No menu found.', 'expandup-search-ajax-popup-free');
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Menu 03', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><label for="expmsap_popup_footer_menu03" class="label"><?php esc_html_e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'expandup-search-ajax-popup-free'); ?></label></p>
					</td>
					<td>
						<p>
							<label for="expmsap_popup_footer_menu03_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expandup-search-ajax-popup-free'); ?></label>
							<br><input id="expmsap_popup_footer_menu03_title" name="expmsap_popup_footer_menu03_title" type="text" class="input-text" value="<?php echo esc_html($expmsap_popup_footer_menu03_title); ?>" >
						</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="expmsap_popup_footer_menu03">';
								echo '<option value="">'. esc_html__('Choose a menu', 'expandup-search-ajax-popup-free') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $expmsap_popup_footer_menu03, $val );
									echo '<option value="' . esc_attr($val) . '" ' . esc_attr($check) . '>' . esc_html($name) . '</option>';									
								}
								echo '</select>';								
							} else {
								esc_html_e('No menu found.', 'expandup-search-ajax-popup-free');
							}
						?>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php esc_html_e('Section title', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><label for="expmsap_popup_footer_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expandup-search-ajax-popup-free'); ?></label></p>
					</td>
					<td>
						<input id="expmsap_popup_footer_title" name="expmsap_popup_footer_title" type="text" class="input-text-100" value="<?php echo esc_html($expmsap_popup_footer_title); ?>" >
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Section Colors Style', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Choose colors to customize this section', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>	
							<div class="control-colors">
								<p><?php esc_html_e('Activate custom colors?', 'expandup-search-ajax-popup-free'); ?> <span style="color: #ff0000;">(Pro Version)</span></p>
								<input type="hidden" value="off">
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Disabled', 'expandup-search-ajax-popup-free'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" value="on" >
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Activated', 'expandup-search-ajax-popup-free'); ?></p>
									</li>	
								</ul>
							</div>						
							<p>
                                <label for="expmsap_popup_footer_background"><?php esc_html_e('Section background color:', 'expandup-search-ajax-popup-free'); ?></label> <span style="color: #ff0000;">(Pro Version)</span><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_popup_footer_background" value="">
                            </p>
							<p>
                                <label for="expmsap_popup_footer_text_color"><?php esc_html_e('Section text color:', 'expandup-search-ajax-popup-free'); ?></label> <span style="color: #ff0000;">(Pro Version)</span><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_popup_footer_text_color" value="">
                            </p>								
					</td>
				</tr>		
			</table>	
			<?php // The fields are sanitized in the expmsap_register_settings function within the class ?>				
				<?php settings_fields('expmsap_opt_popup_footer'); ?>
				<?php do_settings_sections('expmsap_opt_popup_footer'); ?>				
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