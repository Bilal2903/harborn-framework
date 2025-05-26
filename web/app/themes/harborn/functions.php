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
    }
}
add_action( 'acf/init', 'my_acf_blocks_init' );

add_action('after_setup_theme', function () {
    app()->register(\App\Providers\ProjectPostTypeServiceProvider::class);
});
?>