<?php

use Roots\Acorn\Application;

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

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Acorn theme bootstrapper
|--------------------------------------------------------------------------
|
| @package Harborn
*/

if (!function_exists('Roots\bootloader')) {
    wp_die(
        __('You need to install Roots/Acorn to use this theme.', 'harborn'),
        '',
        [
            'back_link' => true,
        ]
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

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/**
 * Register all ACF Blocks
 */
function my_acf_blocks_init() {
    if ( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type( array(
            'name'              => 'hero-block',
            'title'             => __( 'Hero Block' ),
            'description'       => __( 'A customizable section for the top of your page.' ),
            'render_template'   => 'blocks/hero-block/hero-block.php',
            'category'          => 'layout',
            'icon'              => 'align-wide',
            'keywords'          => array( 'hero', 'banner', 'introduction' ),
            'supports'          => array(
                'align'         => true,
                'mode'          => false,
                'jsx'           => true,
            ),
        ) );
        acf_register_block_type( array(
            'name'              => 'carousel',
            'title'             => __( 'Carousel' ),
            'description'       => __( 'Een carousel met afbeeldingen of content.' ),
            'render_template'   => 'blocks/carousel/carousel.php',
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'carousel', 'slider', 'afbeeldingen' ),
            'supports'          => array(
                'align'         => true,
                'mode'          => false,
                'jsx'           => true,
            ),
        ) );
    }
}
add_action( 'acf/init', 'my_acf_blocks_init' );

add_action('after_setup_theme', function () {
    app()->register(\App\Providers\ProjectPostTypeServiceProvider::class);
});

/**
 * Enqueue GSAP and custom scripts
 */
function theme_gsap_script(){
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true );
    wp_enqueue_script( 'gsap-custom', get_template_directory_uri() . '/resources/js/carousel/carousel.js', array('gsap-js'), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );

// Mega Menu navigation location registration
add_action('after_setup_theme', function () {
    register_nav_menu('mega_menu_navigation', __('Mega Menu Navigation', 'harborn'));
});
?>