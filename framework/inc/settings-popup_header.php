<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_popup_header_page(){
	ob_start();
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php echo expandup_searchpopup_help_links(); ?>
			<?php settings_errors(); ?>
			<?php
				$searchpopup_close_icon_color = false;
				$searchpopup_close_icon_background = false;
				$searchpopup_header_background = false;	
				$searchpopup_header_colors_style = false;
			?>	
			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'searchpopup_textdomain'); ?><span class="plugin-version">Version: <?php echo EXPANDUP_SEARCHPOPUP_VERSION; ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('Popup Header', 'searchpopup_textdomain'); ?></h3>
			<form id="opt-page" method="post" action="options.php" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Popup Header Colors Style', 'searchpopup_textdomain'); ?></h3>
						<p><?php esc_html_e('Choose colors to customize your popup and form', 'searchpopup_textdomain'); ?></p>
					</td>
					<td>
							<div class="control-colors">
								<p><?php esc_html_e('Activate custom colors?', 'searchpopup_textdomain'); ?> <span style="color: #ff0000;">(Pro Version)</span></p>
								<input type="hidden" value="off" name="searchpopup_header_colors_style">
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Disabled', 'searchpopup_textdomain'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" name="searchpopup_header_colors_style" value="on"  <?php if ($searchpopup_header_colors_style === 'on'){echo 'checked="checked"';}?>>
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Activated', 'searchpopup_textdomain'); ?></p>
									</li>	
								</ul>
							</div>
							<p>
                                <label for="searchpopup_close_icon_color"><?php esc_html_e('Close icon color:', 'searchpopup_textdomain'); ?> <span style="color: #ff0000;">(Pro Version)</span></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_close_icon_color" name="searchpopup_close_icon_color" value="<?php echo $searchpopup_close_icon_color; ?>">
                            </p>
							<p>
                                <label for="searchpopup_close_icon_background"><?php esc_html_e('Popup background color:', 'searchpopup_textdomain'); ?> <span style="color: #ff0000;">(Pro Version)</span></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_close_icon_background" name="searchpopup_close_icon_background" value="<?php echo $searchpopup_close_icon_background; ?>">
                            </p>    
							<p>
                                <label for="searchpopup_header_background"><?php esc_html_e('Popup background color:', 'searchpopup_textdomain'); ?> <span style="color: #ff0000;">(Pro Version)</span></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_header_background" name="searchpopup_header_background" value="<?php echo $searchpopup_header_background; ?>">
                            </p>    							
							                         
					</td>
				</tr>	
				
						
			</table>
			<?php // The fields are sanitized in the expandup_searchpopup_register_settings function within the class ?>					
							
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
		// Clean buffer
		ob_end_clean();
		// Return the content
		return $object;
	} 
?>