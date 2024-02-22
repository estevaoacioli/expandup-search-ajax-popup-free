<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_html_card_cpt($args, $post) {     
    ob_start();
    ?>
    <div class="swiper-slide">
        <div class="expmsap-card-item">		
            <?php // Thumbnail
            if (!in_array('thumbnail', $args['itens'])) { ?>
                <a href="<?php echo esc_url($post['post_link']); ?>">
                    <span class="image-card" style="background-image: url('<?php echo esc_url($post['thumbnail_url']); ?>')"></span>
                </a>
            <?php } ?>              				
            <?php // Category
            if (!in_array('category', $args['itens'])) {
                if (!empty($post['post_category'])) {
                    $category = implode(', ', $post['post_category']); // Pega a primeira categoria
                    ?>
                    <div class="post-category"><?php echo esc_html($category); ?></div>					
            <?php } 
            } ?>
            <?php // Title
            if (!in_array('title', $args['itens'])) { ?>
                <h3 class="post-title"><a href="<?php echo esc_url($post['post_link']); ?>"><?php echo esc_html($post['post_title']); ?></a></h3>
            <?php } ?>
            <?php // Date
            if (!in_array('date', $args['itens'])) { ?>
                <div class="post-date"><span class="calendar"></span><?php echo esc_html($post['post_date']); ?></div>
            <?php } ?>
            <?php  // Resume
            if (!in_array('resume', $args['itens'])) { ?>
                <div class="post-excerpt"><?php echo esc_html($post['post_excerpt']); ?></div>
            <?php } ?>           		
        </div>
    </div>
    <?php 
    $object = ob_get_contents();
    /* Clean buffer */
    ob_end_clean();
    /* Return the content */
    return $object;
}
