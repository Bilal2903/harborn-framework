<?php
/**
 * Hero Block Template.
 *
 * @param   array
 * @param   string
 * @param   bool
 * @param   (int|string)
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

// Generate a unique ID for the block for SCSS/JS purposes
$id = 'hero-block-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Generate classes for the block
$className = 'hero-block';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

// Get the ACF fields
$heading          = get_field( 'hero_heading' );
$subheading       = get_field( 'hero_subheading' );
$background_image = get_field( 'hero_background_image' );
$button_text      = get_field( 'hero_button_text' );
$button_link      = get_field( 'hero_button_link' );
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<?php if ( $background_image ) { ?>
		<div class="hero-block__background" style="background-image: url('<?php echo esc_url( $background_image['url'] ); ?>');"></div>
	<?php } ?>
	<div class="hero-block__inner-content">
		<div class="hero-block__text-content">
			<?php if ( $heading ) { ?>
				<h1 class="hero-block__heading">
					<?php echo str_replace( 'digital', '<span class="hero-block__highlight-word">digital</span>', esc_html( $heading ) ); ?>
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