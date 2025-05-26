<?php
/**
 * Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Generate a unique ID for the block for SCSS/JS purposes
$id = 'carousel-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Generate classes for the block
$className = 'carousel-block section-work-overview';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1,        
    'post_status'    => 'publish', 
);
$projects_query = new WP_Query( $args );

if ( $projects_query->have_posts() ) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="carousel-block__header">
            <h2 class="carousel-block__title">Werk</h2>
            <a href="/projecten" class="more-work-link">
                meer werk <svg class="arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z" fill="currentColor"/></svg>
            </a>
        </div>
        <div class="carousel-block__container">
            <swiper-container class="mySwiper" watch-slides-progress="true" slides-per-view="3">
                <?php while ( $projects_query->have_posts() ) : $projects_query->the_post();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $excerpt = get_the_excerpt();
                    $title = get_the_title();
                    $permalink = get_permalink();
                ?>
                    <swiper-slide>
                        <div class="project-card">
                            <?php if ($image_url): ?>
                                <div class="project-card__image" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
                            <?php endif; ?>
                            <div class="project-card__overlay"></div>
                            <div class="project-card__content">
                                <h3 class="project-card__title"><?php echo esc_html($title); ?></h3>
                                <?php if ($excerpt): ?>
                                    <p class="project-card__excerpt"><?php echo esc_html($excerpt); ?></p>
                                <?php endif; ?>
                            </div>
                         </div>
                    </swiper-slide>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </swiper-container>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    </div>
<?php
endif;
if ( ! $projects_query->have_posts() && is_user_logged_in() && $is_preview ) {
    echo '<p style="text-align: center; padding: 20px;">Er zijn nog geen projecten gevonden. Maak nieuwe projecten aan om ze hier te tonen.</p>';
}
?>