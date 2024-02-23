<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_form_shortcode($atts) {
     // Attributes
     extract(shortcode_atts(
        array(            
            'model' => '1'                        
        ), $atts)
    );  
    ob_start();  
    if( $model == 1 && EXPMSAP_ACTIVE === 1){  
    ?>
    <form id="expmsap_form_model_01" role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">        
        <label class="search-label">
            <span class="screen-reader-text"><?php esc_html_e('Search for:', 'expandup-search-ajax-popup-free'); ?></span>
            <input type="search" class="search-field" aria-label="Search input" autocomplete="off" placeholder="<?php esc_attr_e('Search...', 'expandup-search-ajax-popup-free'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </label>
        <input type="submit" class="search-submit" value="<?php esc_attr_e('Search', 'expandup-search-ajax-popup-free'); ?>" />
    </form>
    <?php }  elseif ( $model == 2 ) { ?>

    <form id="expmsap_form_model_02" action="<?php echo home_url('/'); ?>" method="get" role="search">        
        <div class="form__container">
            <span class="icon-search"><img src="<?php echo esc_url(EXPMSAP_URL); ?>/assets/images/search-icon.svg" alt="icon" width="18" height="18" /></span>
            <input id="search-form__input" placeholder="<?php esc_attr_e('Search...', 'expandup-search-ajax-popup-free'); ?>" type="search" name="s" value="<?php echo get_search_query(); ?>">
        </div>
    </form>
    <?php }  elseif ( $model == 3 ) { ?>
    <form id="expmsap_form_model_03" action="<?php echo home_url('/'); ?>" method="get" role="search">        
        <div class="form__container">            
            <input id="search-form__input" placeholder="<?php esc_attr_e('Search...', 'expandup-search-ajax-popup-free'); ?>" type="search" name="s" value="<?php echo get_search_query(); ?>">
            <span class="icon-search"><img src="<?php echo esc_url(EXPMSAP_URL); ?>/assets/images/search-icon.svg" alt="icon" width="18" height="18" /></span>
        </div>
    </form>
    <?php } else {
        esc_html_e('Form template not found!', 'expandup-search-ajax-popup-free'); 
    }?>    

    <?php
    $object = ob_get_contents();
    /* Clean buffer */
    ob_end_clean();
    /* Return the content */
    return $object;
}
add_shortcode('expmsap_form', 'expmsap_form_shortcode');
