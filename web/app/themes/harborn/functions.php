<?php
/**
 * Theme functions and definitions
 *
 * @package Harborn
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	wp_die( esc_html__( 'Error locating autoloader. Please run <code>composer install</code>.', 'sage' ) );
}

require __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Acorn theme bootstrapper
|--------------------------------------------------------------------------
|
| @package Harborn
*/

if ( ! function_exists( 'Roots\bootloader' ) ) {
	wp_die(
		esc_html__( 'You need to install Roots/Acorn to use this theme.', 'harborn' ),
		'',
		array(
			'back_link' => true,
		),
	);
}

Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect( array( 'setup', 'filters' ) )
	->each(
		function ( $file ) {
			$file = "app/{$file}.php";
			if ( ! locate_template( $file, true, true ) ) {
				wp_die(
					/* translators: %s is replaced with the relative file path */
					esc_html( sprintf( esc_html__( 'Error locating <code>%s</code> for inclusion.', 'sage' ), $file ) )
				);
			}
		}
	);

/**
 * Register all ACF Blocks
 */
function my_acf_blocks_init() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type(
			array(
				'name'            => 'hero-block',
				'title'           => __( 'Hero Block' ),
				'description'     => __( 'A customizable section for the top of your page.' ),
				'render_template' => 'blocks/hero-block/hero-block.php',
				'category'        => 'layout',
				'icon'            => 'align-wide',
				'keywords'        => array( 'hero', 'banner', 'introduction' ),
				'supports'        => array(
					'align' => true,
					'mode'  => false,
					'jsx'   => true,
				),
			)
		);
		acf_register_block_type(
			array(
				'name'            => 'carousel',
				'title'           => __( 'Carousel' ),
				'description'     => __( 'A carousel with images or content.' ),
				'render_template' => 'blocks/carousel/carousel.php',
				'category'        => 'formatting',
				'icon'            => 'images-alt2',
				'keywords'        => array( 'carousel', 'slider', 'images' ),
				'supports'        => array(
					'align' => true,
					'mode'  => false,
					'jsx'   => true,
				),
			)
		);
	}
}
add_action( 'acf/init', 'my_acf_blocks_init' );

add_action(
	'after_setup_theme',
	function () {
		app()->register( \App\Providers\ProjectPostTypeServiceProvider::class );
		app()->register( \App\Providers\Projectposttypeserviceprovider::class );
	}
);

/**
 * Enqueue GSAP and custom scripts
 */
function theme_gsap_script() {
	wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), '3.13.0', true );
	wp_enqueue_script( 'gsap-custom', get_template_directory_uri() . '/resources/js/carousel/carousel.js', array( 'gsap-js' ), '1.0.0', true );
	wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js', array(), '11.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );

/**
 * Mega Menu navigation location registration.
 */
add_action(
	'after_setup_theme',
	function () {
		register_nav_menu( 'mega_menu_navigation', esc_html__( 'Mega Menu Navigation', 'harborn' ) );
	}
);
