<?php
/**
 * Hero Block Template.
 *
 * @package Harborn
 *
 * @param array $block Block settings and attributes.
 * @param string $content Block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

add_filter(
	'body_class',
	function ( $classes ) {
		$background_image = get_field( 'hero_background_image' );
		if ( $background_image ) {
			$classes[] = 'has-hero-header-overlay';
		}
		return $classes;
	}
);

// Generate a unique ID for the block for SCSS/JS purposes.
$hero_block_id = 'hero-block-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$hero_block_id = $block['anchor'];
}

// Generate classes for the block.
$hero_block_class = 'hero-block';
if ( ! empty( $block['className'] ) ) {
	$hero_block_class .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$hero_block_class .= ' align' . $block['align'];
}

// Get the ACF fields.
$heading          = get_field( 'hero_heading' );
$subheading       = get_field( 'hero_subheading' );
$background_image = get_field( 'hero_background_image' );
$button_text      = get_field( 'hero_button_text' );
$button_link      = get_field( 'hero_button_link' );
?>

<section id="<?php echo esc_attr( $hero_block_id ); ?>" class="<?php echo esc_attr( $hero_block_class ); ?>">
	<?php if ( $background_image ) { ?>
		<div class="hero-block__background" style="background-image: url('<?php echo esc_url( $background_image['url'] ); ?>');"></div>
	<?php } ?>
	<div class="hero-block__inner-content">
		<div class="hero-block__text-content">
			<?php if ( $heading ) { ?>
				<h1 class="hero-block__heading">
					<?php echo wp_kses_post( str_replace( 'digital', '<span class="hero-block__highlight-word">digital</span>', esc_html( $heading ) ) ); ?>
				</h1>
			<?php } ?>

			<?php if ( $subheading ) { ?>
				<p class="hero-block__subheading"><?php echo esc_html( $subheading ); ?></p>
			<?php } ?>
		</div>
		<?php if ( $button_text && $button_link ) { ?>
			<div class="hero-block__button-wrapper">
				<a href="<?php echo esc_url( $button_link ); ?>" class="hero-block__button">
					<?php echo esc_html( $button_text ); ?>
				</a>
			</div>
		<?php } ?>
	</div>
</section>