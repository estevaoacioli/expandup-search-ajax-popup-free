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
			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'expmsap_textdomain'); ?><span class="plugin-version">Version: <?php echo esc_html(EXPMSAP_VERSION); ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('Popup Footer', 'expmsap_textdomain'); ?></h3>
			<form id="opt-page" method="post" action="options.php" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Activate this section', 'expmsap_textdomain'); ?></h3>
						<p><label for="expmsap_popup_footer_activate" class="label"><?php esc_html_e('Do you want to activate this section?', 'expmsap_textdomain'); ?></label></p>
					</td>
					<td>
						<select name="expmsap_popup_footer_activate" id="expmsap_popup_footer_activate">
							<option value="0" <?php selected( $expmsap_popup_footer_activate, 0 ); ?>><?php esc_html_e('No', 'expmsap_textdomain'); ?></option>
							<option value="1" <?php selected( $expmsap_popup_footer_activate, 1 ); ?>><?php esc_html_e('Yes', 'expmsap_textdomain'); ?></option>							
						</select>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php esc_html_e('Menu 01', 'expmsap_textdomain'); ?></h3>
						<p><label for="expmsap_popup_footer_menu01" class="label"><?php esc_html_e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'expmsap_textdomain'); ?></label></p>
					</td>
					<td>
					<p>
						<label for="expmsap_popup_footer_menu01_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expmsap_textdomain'); ?></label>
						<br><input id="expmsap_popup_footer_menu01_title" name="expmsap_popup_footer_menu01_title" type="text" class="input-text" value="<?php echo $expmsap_popup_footer_menu01_title; ?>" >
					</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="expmsap_popup_footer_menu01">';
								echo '<option value="">'. esc_html__('Choose a menu', 'expmsap_textdomain') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $expmsap_popup_footer_menu01, $val );
									echo '<option value="' . esc_attr($val) . '" ' . $check . '>' . esc_html($name) . '</option>';
								}
								echo '</select>';								
							} else {
								esc_html_e('No menu found.', 'expmsap_textdomain');
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Menu 02', 'expmsap_textdomain'); ?></h3>
						<p><label for="expmsap_popup_footer_menu02" class="label"><?php esc_html_e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'expmsap_textdomain'); ?></label></p>
					</td>
					<td>
						<p>
							<label for="expmsap_popup_footer_menu02_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expmsap_textdomain'); ?></label>
							<br><input id="expmsap_popup_footer_menu02_title" name="expmsap_popup_footer_menu02_title" type="text" class="input-text" value="<?php echo esc_html($expmsap_popup_footer_menu02_title); ?>" >
						</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="expmsap_popup_footer_menu02">';
								echo '<option value="">'. esc_html__('Choose a menu', 'expmsap_textdomain') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $expmsap_popup_footer_menu02, $val );
									echo '<option value="' . esc_attr($val) . '" ' . $check . '>' . esc_html($name) . '</option>';
								}
								echo '</select>';								
							} else {
								esc_html_e('No menu found.', 'expmsap_textdomain');
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Menu 03', 'expmsap_textdomain'); ?></h3>
						<p><label for="expmsap_popup_footer_menu03" class="label"><?php esc_html_e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'expmsap_textdomain'); ?></label></p>
					</td>
					<td>
						<p>
							<label for="expmsap_popup_footer_menu03_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expmsap_textdomain'); ?></label>
							<br><input id="expmsap_popup_footer_menu03_title" name="expmsap_popup_footer_menu03_title" type="text" class="input-text" value="<?php echo esc_html($expmsap_popup_footer_menu03_title); ?>" >
						</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="expmsap_popup_footer_menu03">';
								echo '<option value="">'. esc_html__('Choose a menu', 'expmsap_textdomain') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $expmsap_popup_footer_menu03, $val );
									echo '<option value="' . esc_attr($val) . '" ' . $check . '>' . esc_html($name) . '</option>';									
								}
								echo '</select>';								
							} else {
								esc_html_e('No menu found.', 'expmsap_textdomain');
							}
						?>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php esc_html_e('Section title', 'expmsap_textdomain'); ?></h3>
						<p><label for="expmsap_popup_footer_title" class="label"><?php esc_html_e('Enter a title for this section. If left blank, nothing will be shown', 'expmsap_textdomain'); ?></label></p>
					</td>
					<td>
						<input id="expmsap_popup_footer_title" name="expmsap_popup_footer_title" type="text" class="input-text-100" value="<?php echo esc_html($expmsap_popup_footer_title); ?>" >
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Section Colors Style', 'expmsap_textdomain'); ?></h3>
						<p><?php esc_html_e('Choose colors to customize this section', 'expmsap_textdomain'); ?></p>
					</td>
					<td>	
							<div class="control-colors">
								<p><?php esc_html_e('Activate custom colors?', 'expmsap_textdomain'); ?> <span style="color: #ff0000;">(Pro Version)</span></p>
								<input type="hidden" value="off">
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Disabled', 'expmsap_textdomain'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" value="on" >
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Activated', 'expmsap_textdomain'); ?></p>
									</li>	
								</ul>
							</div>						
							<p>
                                <label for="expmsap_popup_footer_background"><?php esc_html_e('Section background color:', 'expmsap_textdomain'); ?></label> <span style="color: #ff0000;">(Pro Version)</span><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_popup_footer_background" value="">
                            </p>
							<p>
                                <label for="expmsap_popup_footer_text_color"><?php esc_html_e('Section text color:', 'expmsap_textdomain'); ?></label> <span style="color: #ff0000;">(Pro Version)</span><br>
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
					$label = esc_html__('Save Settings', 'expmsap_textdomain');
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