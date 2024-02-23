<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_shortcode_page(){
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php expmsap_help_links(); ?>
			<?php settings_errors(); ?>

			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'expmsap_textdomain'); ?><span class="plugin-version">Version: <?php echo esc_html(EXPMSAP_VERSION); ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('Shortcode for forms', 'expmsap_textdomain'); ?></h3>			
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Shortcodes', 'expmsap_textdomain'); ?></h3>
						<p>
							<?php esc_html_e('You can choose to use one of our form templates, just use one of the codes below', 'expmsap_textdomain'); ?>
						</p>	
					</td>
				</tr>
				<tr>	
					<td>
						<h3>Model 1</h3>
						<label for="model01" style="display: block;">Shortcode:</label>
  						<input type="text" id="model01" value='[expmsap_form model="1"]' readonly onclick="expmsapCopyThisValue(this)">
						<div class="response-copy"></div>						
					</td>
					<td>
						<div class="form-preview"><img width="641" height="92" src="<?php echo esc_url(EXPMSAP_URL) .'assets/images/form-01.png'; ?>" ></div>
					</td>
				</tr>
				<tr>	
					<td>
						<h3>Model 2</h3>
						<label for="model02" style="display: block;">Shortcode:</label>
  						<input type="text" id="model02" value='[expmsap_form model="2"]' readonly onclick="expmsapCopyThisValue(this)">
						<div class="response-copy"></div>						
					</td>
					<td>
						<div class="form-preview"><img width="453" height="88" src="<?php echo esc_url(EXPMSAP_URL) .'assets/images/form-02.png'; ?>" ></div>
					</td>
				</tr>
				<tr>	
					<td>
						<h3>Model 3</h3>
						<label for="model03" style="display: block;">Shortcode:</label>
  						<input type="text" id="model03" value='[expmsap_form model="3"]' readonly onclick="expmsapCopyThisValue(this)">
						<div class="response-copy"></div>					
					</td>
					<td>
						<div class="form-preview"><img width="453" height="88" src="<?php echo esc_url(EXPMSAP_URL) .'assets/images/form-03.png'; ?>" ></div>
					</td>
				</tr>				
			</table>
			<script>
				function expmsapCopyThisValue(element) {    
					element.select();    
					document.execCommand('copy');  
					element.blur();

					var responseCopyDiv = element.nextElementSibling;
					responseCopyDiv.innerHTML = 'Copied code!';
					
					setTimeout(function() {
						responseCopyDiv.innerHTML = '';
					}, 3000);
				}
			</script>
			
			<?php expmsap_help_links(); ?>
		</div>	
</div>
<?php 		
	} 
?>