<?php
if (!defined('ABSPATH')) {
    exit();
}
class ExpandUpSearchPopup{

	private $options;	
	
	public function __construct() { 
		add_action('init', 'expandup_searchpopup_register_msap_cpt');
		if( SEARCH_POPUP_ACTIVE === 1 ) {			
			add_action('admin_menu', array($this, 'expandup_searchpopup_admin_menu'), 9999);
			add_action('wp_footer', array($this, 'add_popup_html_to_footer'));
			add_action('wp_enqueue_scripts', array($this, 'expand_up_searchpopup_front_scripts'));	
		}
		
		add_action('admin_init', array($this, 'expandup_searchpopup_register_settings'));
		$searchpopup_popup_smart_images_settings = intval(get_option( 'searchpopup_popup_smart_images_settings', false ));
		if($searchpopup_popup_smart_images_settings === 1){
			add_image_size('searchpopup_thumb', 360, 360, true);
		}		
		
		add_action('admin_enqueue_scripts', array($this, 'expand_up_searchpopup_admin_scripts'));
		
	}	
	
	// Add Pages admin
    public function expandup_searchpopup_admin_menu() {  
		add_submenu_page( 'edit.php?post_type=msap', 'Popup General', 'Popup General', 'manage_options', 'expandup_searchpopup_popup_general', array( $this, 'expandup_searchpopup_popup_general' ) );
		add_submenu_page( 'edit.php?post_type=msap', 'Popup Header', 'Popup Header', 'manage_options', 'expandup_searchpopup_popup_header', array( $this, 'expandup_searchpopup_popup_header' ) );
		add_submenu_page( 'edit.php?post_type=msap', 'Popup Footer', 'Popup Footer', 'manage_options', 'expandup_searchpopup_popup_footer', array( $this, 'expandup_searchpopup_popup_footer' ) );
		add_submenu_page( 'edit.php?post_type=msap', 'Popup WooCommerce', 'Popup WooCommerce', 'manage_options', 'expandup_searchpopup_woocommerce', array( $this, 'expandup_searchpopup_woocommerce' ) );		
    }

	public function expandup_searchpopup_popup_general() {
		echo expandup_searchpopup_popup_general_page(); 
	}
	public function expandup_searchpopup_popup_header() {
		echo expandup_searchpopup_popup_header_page(); 
	}
	
	public function expandup_searchpopup_popup_footer() {
		echo expandup_searchpopup_popup_footer_page(); 
	}

	public function expandup_searchpopup_woocommerce() {
		echo expandup_searchpopup_woocommerce_page(); 
	}

	// Register general settings
	public function expandup_searchpopup_register_settings() {
		expandup_searchpopup_settings();		
	}

	// Frontend styles and scripts
	public function expand_up_searchpopup_front_scripts() {	
		$searchpopup_add_to_cart_activate = intval(get_option('searchpopup_add_to_cart_activate', false));	
		// code CSS
		wp_enqueue_style( 'expandup-searchpopup-style', EXPANDUP_SEARCHPOPUP_URL.'assets/css/expandup-searchpopup.css', array(), EXPANDUP_SEARCHPOPUP_VERSION );
		wp_enqueue_style( 'expandup-swiper-style', EXPANDUP_SEARCHPOPUP_URL.'assets/css/swiper-bundle.min.css', array(), EXPANDUP_SEARCHPOPUP_VERSION );
		$custom_css = self::expand_up_searchpopup_inline_styles();	
		wp_add_inline_style('expandup-searchpopup-style', $custom_css);			
		
		// code JS
		wp_enqueue_script('jquery');		
		wp_enqueue_script( 'expandup-swiper', EXPANDUP_SEARCHPOPUP_URL.'assets/js/swiper-bundle.min.js', array(), EXPANDUP_SEARCHPOPUP_VERSION, true );	
		wp_enqueue_script( 'expandup-searchpopup', EXPANDUP_SEARCHPOPUP_URL.'assets/js/expandup-searchpopup.js', array(), EXPANDUP_SEARCHPOPUP_VERSION, true );			
		wp_localize_script( 'expandup-searchpopup', 'searchpopup_ajax', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		) );
		$searchpopup_where_to_use = get_option('searchpopup_where_to_use');			
		if(!empty( $searchpopup_where_to_use)) {			
			wp_localize_script('expandup-searchpopup', 'searchPopupWhereToUse', explode(",",$searchpopup_where_to_use));
		}
		if($searchpopup_add_to_cart_activate === 1) {			
			wp_localize_script('expandup-searchpopup', 'searchpopup_add_to_cart_vars', array('nonce' => wp_create_nonce('searchpopup_add_to_cart_nonce'),));
		}
		
		
	}

	// Frontend style inline 
	public function expand_up_searchpopup_inline_styles() {		
		$alpha = get_option('searchpopup_popup_transparency', '0.9');
		$alpha = empty($alpha) ? '0.9' : $alpha;
		$custom_css = '';
		
		// Popup General						
		$searchpopup_preloader_icon_color = get_option('searchpopup_preloader_icon_color', false);
		$searchpopup_popup_background = get_option('searchpopup_popup_background', false);			
			
		$searchpopup_popup_colors_style = get_option('searchpopup_popup_colors_style', false);	
		if($searchpopup_popup_colors_style === 'on') {
			$bg_color = expandup_searchpopup_convertColorToRGBA($searchpopup_popup_background, $alpha) ;
			$custom_css .= "			
			.sbl-circ-path { color: $searchpopup_preloader_icon_color; }
			#searchpopup-popup { background-color: $bg_color; }						
			";
		}		

		

		return $custom_css;
	}
	
	public function expand_up_searchpopup_admin_scripts() {
		global $pagenow;
		global $typenow;
		$currentScreen = get_current_screen();
		$var = $currentScreen->id;
		$pages = array(			
			'msap_page_expandup_searchpopup_popup_general',
			'msap_page_expandup_searchpopup_popup_header',
			'msap_page_expandup_searchpopup_popup_footer',
			'msap_page_expandup_searchpopup_woocommerce',
			'msap_page_expandup_searchpopup_popup_api_page'
	);
		if ( in_array( $var, $pages) || $typenow === 'msap') {
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style( 'expand_up_searchpopup-admin-style', EXPANDUP_SEARCHPOPUP_URL.'assets/css/exp-searchpopup-admin.css', array(), EXPANDUP_SEARCHPOPUP_VERSION );
			wp_enqueue_script('jquery');        
        	wp_enqueue_script('wp-color-picker');
			wp_enqueue_script( 'expand_up_searchpopup-admin-script', EXPANDUP_SEARCHPOPUP_URL . 'assets/js/exp-searchpopup-admin.js', array('jquery'), EXPANDUP_SEARCHPOPUP_VERSION, true );
		}						
	}
	
	public function add_popup_html_to_footer() {		
		echo searchpopup_html_footer();
	}	

	public function searchpopup_cpt_website_html($args, $s) {
		// variables
		$not_found = intval($args['not_found']);
		//var_dump($not_found);
		$layout_slider_hide_items = $args['layout_slider_hide_items'];
		$items = array(
			'thumbnail',
			'title',
			'resume',
			'price',
			'category',
			'date'
		);		
		$text_latest = false;
		$icons = searchpopup_svgs();
		$icon_calendar =  $icons['calendar'];
		$icon_search =  $icons['search'];
		$c = '';

		$posts_results = searchpopup_loop_cpt($s, $args['cpt'], $args['categories'], $args['qty']);		
		if (!empty($posts_results) && is_array($posts_results) && array_key_exists('itens', $posts_results) && array_key_exists('total', $posts_results)) {
			$posts = $posts_results['itens'];
			$total = $posts_results['total'];			
		} elseif(empty($posts_results) && $not_found === 1) {			
			$posts_itens = searchpopup_loop_cpt_latest($args['cpt'], $args['categories'], $args['qty']);
			$posts = $posts_itens['itens'];
			$total = $posts_itens['total'];
			$text_latest = esc_html__("We didn't find anything in this search, but the items below may interest you.", 'searchpopup_textdomain');
		} else {
			$posts = false;
			$total = false;
		}	
		if (empty($posts) && $not_found === 0) {  			
			
				$c .= '<div class="swiper-slide">';
				$c .= '<div class="searchpopup-card-item">';
				$c .= '<p class="s-error">'. esc_html__('Nothing found in this search', 'searchpopup_textdomain').'</p>';           
				$c .= '</div>';
				$c .= '</div>';
           
        } elseif(empty($posts) && $not_found === 2) {

				return false;

		} else {
            foreach ($posts as $post) {	
				if( $args['cpt'] === 'product') {
					$c .= searchpopup_html_card_woo($args, $post, $icon_calendar);
				} else {
					$c .= searchpopup_html_card_cpt($args, $post, $icon_calendar);
				}			
                
            }
        }

		// ************ HTML ***********************

		$html = ''; 

		$html .= '<div id="row-section_'.$args['slider'].'" class="row row-section_'.$args['slider'].' rom-slider">';
		$html .= '<div class="searchpopup-popup-content">';
				
		$html .= '<div class="searchpopup-popup-content-cpt">';
		$hide_div = '';
		if( empty($args['title']) && empty($args['btn_link']) ) {
			$hide_div = 'style="display: none;"';
		}
		$html .= '<div class="searchpopup-popup-content-header" '.$hide_div.'>';		
		if(!empty($args['title'])) {
			$html .= '<h3>'.$args['title'].'</h3>';
		}		
		if(!empty($args['btn_link'])) {
			$html .= '<a class="btn-more" href="'.$args['btn_link'].'">'.$args['btn_text'].'</a>';
		}		
		$html .= '</div>'; // end searchpopup-popup-content-header
		$html .= '<div class="results">';
		if($text_latest) {
			$html .= '<p class="alert-latest">'.$text_latest.'</p>';
		}
		$html .= '<div class="swiper-container" data-id="'.$args['slider'].'">';
		$html .= '<div class="swiper-wrapper">'.$c.'</div>';
		if (!empty($posts && !in_array('pagination', $layout_slider_hide_items))) {
			$html .= '<div class="swiper-pagination"></div>';
		}        
		$html .= '</div>'; // end swiper-container
		$html .= '</div>'; // end results  
		$html .= '</div>'; // end searchpopup-popup-content-cpt

		if (!empty($posts) && !in_array('navigation', $layout_slider_hide_items)) {	
			$html .= '<div class="swiper-button-prev swiper-button-prev-'.$args['slider'].'"></div><div class="swiper-button-next swiper-button-next-'.$args['slider'].'"></div>';			
		}	

		$html .= '</div>'; // end searchpopup-popup-content
			
		if ($total > $args['qty'] && $args['btn_more'] === 1) {
			// Exiba o link "Veja todos os resultados" com a URL da página de searchpopup
			$search_url = home_url("/?s=" . urlencode($s)).'&post_type='.$args['cpt']; // URL da página de searchpopup com a palavra searchpopupda
			$html .= '<div class="searchpopup-popup-content-header" style="text-align: center;">';	
			
			if( !empty($args['btn_more_text']) ){ $btn_more_text = $args['btn_more_text']; } else { $btn_more_text = 'See all results'; }
			$html .= '<a href="' . esc_url($search_url) . '" class="btn-more-posts">'.$btn_more_text.'</a>';
			$html .= '</div>';
		}

		$html .= '</div>'; // row
		
		return $html;
	}	
}
new ExpandUpSearchPopup();

