<?php
if (!defined('ABSPATH')) {
    exit();
}
function searchpopup_html_card_cpt($args, $post, $icon_calendar){     
    ob_start();
    ?>
    <div class="swiper-slide">
        <div class="searchpopup-card-item">		
			<?php // thumbnail
				if(!in_array('thumbnail', $args['itens'])) { ?>
					<a href="<?php echo esc_url($post['post_link']); ?>">
					    <span class="image-card" style="background-image: url('<?php echo esc_url($post['thumbnail_url']); ?> ')"></spn>
					</a>
			<?php   } ?>              				
			<?php // Category
				if(!in_array('category', $args['itens'])) {
					if (!empty($post['post_category'])) {
						$category = implode(', ', $post['post_category']); // Pega a primeira categoria
                        ?>
						<div class="post-category"><?php echo esc_html($category); ?></div>					
            <?php 
                        } 
                    }
            ?>
			<?php // Title
				if(!in_array('title', $args['itens'])) {
                    ?>
					<h3 class="post-title"><a href="' . esc_url($post['post_link']) . '"><?php echo esc_html($post['post_title']); ?></a></h3>
			<?php	}  ?>
            <?php // Date
				if(!in_array('date', $args['itens'])) {
            ?>
					<div class="post-date"><?php echo $icon_calendar.' '. esc_html($post['post_date']); ?></div>
			<?php }	?>
            <?php  // Resume
				if(!in_array('resume', $args['itens'])) {
                    ?>
					<div class="post-excerpt"><?php echo esc_html($post['post_excerpt']); ?></div>
			<?php	}  ?>
			<?php // Price
				if(!in_array('price', $args['itens'])) {
					if( $args['cpt'] === 'product') {
                        ?>
						<div class="product-price">
						<?php if(!empty($post['price_offer'])) { ?>
							<span class="regular-old"><?php echo esc_html($post['price_regular']); ?></span>
							<span class="offer"><?php echo esc_html($post['price_offer']); ?></span>
						<?php } else { ?>
							<span class="regular"><?php echo esc_html($post['price_regular']); ?></span>
						<?php }	?>
						</div>
            <?php 
                        } 
                    }
            ?>				
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