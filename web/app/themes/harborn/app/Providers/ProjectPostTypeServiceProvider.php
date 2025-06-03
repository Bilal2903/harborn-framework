<?php
/**
 * Project Post Type Service Provider
 *
 * @package Harborn
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ProjectPostTypeServiceProvider
 *
 * Registers the custom post type 'Project'.
 */
class ProjectPostTypeServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		add_action( 'init', array( $this, 'registerProjectPostType' ) );
	}

	/**
	 * Register the 'Project' custom post type.
	 *
	 * @return void
	 */
	public function registerProjectPostType() {
		$labels = array(
			'name'              => _x( 'Projects', 'Post Type General Name', 'your-text-domain' ),
			'singular_name'     => _x( 'Project', 'Post Type Singular Name', 'your-text-domain' ),
			'menu_name'         => __( 'Projects', 'your-text-domain' ),
			'name_admin_bar'    => __( 'Project', 'your-text-domain' ),
			'archives'          => __( 'Project Archives', 'your-text-domain' ),
			'attributes'        => __( 'Project Attributes', 'your-text-domain' ),
			'parent_item_colon' => __( 'Parent Project:', 'your-text-domain' ),
			'all_items'         => __( 'All Projects', 'your-text-domain' ),
			// ...existing code...
		);
		// ...existing code...
	}
}
