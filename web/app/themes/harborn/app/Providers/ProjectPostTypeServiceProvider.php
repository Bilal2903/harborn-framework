<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectPostTypeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        add_action('init', [$this, 'registerProjectPostType']);
    }

    /**
     * Register the 'Project' custom post type.
     *
     * @return void
     */
    public function registerProjectPostType()
    {
        $labels = [
            'name'                  => _x('Projects', 'Post Type General Name', 'your-text-domain'),
            'singular_name'         => _x('Project', 'Post Type Singular Name', 'your-text-domain'),
            'menu_name'             => __('Projects', 'your-text-domain'),
            'name_admin_bar'        => __('Project', 'your-text-domain'),
            'archives'              => __('Project Archives', 'your-text-domain'),
            'attributes'            => __('Project Attributes', 'your-text-domain'),
            'parent_item_colon'     => __('Parent Project:', 'your-text-domain'),
            'all_items'             => __('All Projects', 'your-text-domain'),
            'add_new_item'          => __('Add New Project', 'your-text-domain'),
            'add_new'               => __('Add New', 'your-text-domain'),
            'edit_item'             => __('Edit Project', 'your-text-domain'),
            'update_item'           => __('Update Project', 'your-text-domain'),
            'view_item'             => __('View Project', 'your-text-domain'),
            'view_items'            => __('View Projects', 'your-text-domain'),
            'search_items'          => __('Search Project', 'your-text-domain'),
            'not_found'             => __('Not found', 'your-text-domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'your-text-domain'),
            'featured_image'        => __('Featured Image', 'your-text-domain'),
            'set_featured_image'    => __('Set featured image', 'your-text-domain'),
            'remove_featured_image' => __('Remove featured image', 'your-text-domain'),
            'use_featured_image'    => __('Use as featured image', 'your-text-domain'),
            'insert_into_item'      => __('Insert into project', 'your-text-domain'),
            'uploaded_to_this_item' => __('Uploaded to this project', 'your-text-domain'),
            'items_list'            => __('Projects list', 'your-text-domain'),
            'items_list_navigation' => __('Projects list navigation', 'your-text-domain'),
            'filter_items_list'     => __('Filter projects list', 'your-text-domain'),
        ];
        $args = [
            'label'                 => __('Project', 'your-text-domain'),
            'description'           => __('Portfolio items', 'your-text-domain'),
            'labels'                => $labels,
            'supports'              => ['title', 'editor', 'thumbnail', 'excerpt'],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        ];
        register_post_type('project', $args);
    }
}