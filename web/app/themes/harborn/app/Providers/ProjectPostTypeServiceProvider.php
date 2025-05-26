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
            'name'                  => _x('Projecten', 'Post Type General Name', 'your-text-domain'),
            'singular_name'         => _x('Project', 'Post Type Singular Name', 'your-text-domain'),
            'menu_name'             => __('Projecten', 'your-text-domain'),
            'name_admin_bar'        => __('Project', 'your-text-domain'),
            'archives'              => __('Project Archieven', 'your-text-domain'),
            'attributes'            => __('Project Attributen', 'your-text-domain'),
            'parent_item_colon'     => __('Ouder Project:', 'your-text-domain'),
            'all_items'             => __('Alle Projecten', 'your-text-domain'),
            'add_new_item'          => __('Nieuw Project Toevoegen', 'your-text-domain'),
            'add_new'               => __('Nieuw Toevoegen', 'your-text-domain'),
            'edit_item'             => __('Project Bewerken', 'your-text-domain'),
            'update_item'           => __('Project Bijwerken', 'your-text-domain'),
            'view_item'             => __('Bekijk Project', 'your-text-domain'),
            'view_items'            => __('Bekijk Projecten', 'your-text-domain'),
            'search_items'          => __('Zoek Project', 'your-text-domain'),
            'not_found'             => __('Niet gevonden', 'your-text-domain'),
            'not_found_in_trash'    => __('Niet gevonden in prullenbak', 'your-text-domain'),
            'featured_image'        => __('Uitgelichte Afbeelding', 'your-text-domain'),
            'set_featured_image'    => __('Stel uitgelichte afbeelding in', 'your-text-domain'),
            'remove_featured_image' => __('Verwijder uitgelichte afbeelding', 'your-text-domain'),
            'use_featured_image'    => __('Gebruik als uitgelichte afbeelding', 'your-text-domain'),
            'insert_into_item'      => __('Invoegen in project', 'your-text-domain'),
            'uploaded_to_this_item' => __('Geüpload naar dit project', 'your-text-domain'),
            'items_list'            => __('Projecten lijst', 'your-text-domain'),
            'items_list_navigation' => __('Projecten lijst navigatie', 'your-text-domain'),
            'filter_items_list'     => __('Filter projecten lijst', 'your-text-domain'),
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