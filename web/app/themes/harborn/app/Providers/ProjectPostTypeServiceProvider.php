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
		register_post_type(
			'projects',
			array(
				'labels'             => array(
					'name'                     => __( 'Projects', 'harborn' ),
					'singular_name'            => __( 'Project', 'harborn' ),
					'menu_name'                => __( 'Projects', 'harborn' ),
					'all_items'                => __( 'All Projects', 'harborn' ),
					'edit_item'                => __( 'Edit Project', 'harborn' ),
					'view_item'                => __( 'View Project', 'harborn' ),
					'view_items'               => __( 'View Projects', 'harborn' ),
					'add_new_item'             => __( 'Add New Project', 'harborn' ),
					'add_new'                  => __( 'Add New Project', 'harborn' ),
					'new_item'                 => __( 'New Project', 'harborn' ),
					'parent_item_colon'        => __( 'Parent Project:', 'harborn' ),
					'search_items'             => __( 'Search Projects', 'harborn' ),
					'not_found'                => __( 'No Projects found', 'harborn' ),
					'not_found_in_trash'       => __( 'No Projects found in Trash', 'harborn' ),
					'archives'                 => __( 'Project Archives', 'harborn' ),
					'attributes'               => __( 'Project Attributes', 'harborn' ),
					'insert_into_item'         => __( 'Insert into Project', 'harborn' ),
					'uploaded_to_this_item'    => __( 'Uploaded to this Project', 'harborn' ),
					'filter_items_list'        => __( 'Filter Projects list', 'harborn' ),
					'filter_by_date'           => __( 'Filter Projects by date', 'harborn' ),
					'items_list_navigation'    => __( 'Projects list navigation', 'harborn' ),
					'items_list'               => __( 'Projects list', 'harborn' ),
					'item_published'           => __( 'Project published.', 'harborn' ),
					'item_published_privately' => __( 'Project published privately.', 'harborn' ),
					'item_reverted_to_draft'   => __( 'Project reverted to draft.', 'harborn' ),
					'item_scheduled'           => __( 'Project scheduled.', 'harborn' ),
					'item_updated'             => __( 'Project updated.', 'harborn' ),
					'item_link'                => __( 'Project Link', 'harborn' ),
					'item_link_description'    => __( 'A link to a Project.', 'harborn' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'projects' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			)
		);
	}
}
