<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_popup_header_page(){
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php expmsap_help_links(); ?>
			<?php settings_errors(); ?>			
			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'expandup-search-ajax-popup-free'); ?><span class="plugin-version">Version: <?php echo esc_html(EXPMSAP_VERSION); ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('Popup Header', 'expandup-search-ajax-popup-free'); ?></h3>
			<form id="opt-page" method="post" action="#" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Popup Header Colors Style', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Choose colors to customize your popup and form', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>
							<div class="control-colors">
								<p><?php esc_html_e('Activate custom colors?', 'expandup-search-ajax-popup-free'); ?> <span style="color: #ff0000;">(Pro Version)</span></p>
								<input type="hidden" value="off" >
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
                                <label for="expmsap_close_icon_color"><?php esc_html_e('Close icon color:', 'expandup-search-ajax-popup-free'); ?> <span style="color: #ff0000;">(Pro Version)</span></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_close_icon_color" name="expmsap_close_icon_color" value="">							
                            </p>
							<p>
                                <label for="expmsap_close_icon_background"><?php esc_html_e('Popup icon background color:', 'expandup-search-ajax-popup-free'); ?> <span style="color: #ff0000;">(Pro Version)</span></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_close_icon_background" value="">
                            </p>
							<p>
                                <label for="expmsap_header_background"><?php esc_html_e('Popup header background color:', 'expandup-search-ajax-popup-free'); ?> <span style="color: #ff0000;">(Pro Version)</span></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_header_background" value="">
                            </p>
					</td>
				</tr>	
				
						
			</table>
			<?php // The fields are sanitized in the expmsap_register_settings function within the class ?>					
							
				<div class="options-footer-settings">
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary big-size" value="Save Settings"></p>
				<p id="pro-vercion-only" style="display:none;color: red;font-size: 1.2em;">These options are only available in the pro version</p>
				</div>
			</form>
			<?php expmsap_help_links(); ?>
		</div>	
</div>
<script>
    jQuery(document).ready(function($) {
        $('#opt-page').submit(function(event) {            
            event.preventDefault();
            $('#pro-vercion-only').show();
        });
    });
</script>
<?php 		
	} 
?>