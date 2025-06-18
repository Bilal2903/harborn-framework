<?php
/**
 * Theme setup.
 *
 * @package Harborn
 */

namespace App;

use Illuminate\Support\Facades\Vite;

add_filter( 'doing_it_wrong_trigger_error', '__return_false' );

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter(
	'block_editor_settings_all',
	function ( $settings ) {
		$style = Vite::asset( 'resources/css/editor.css' );

		$settings['styles'][] = array(
			'css' => "@import url('{$style}')",
		);

		return $settings;
	}
);

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter(
	'admin_head',
	function () {
		if ( ! get_current_screen()?->is_block_editor() ) {
			return;
		}
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Vite output is trusted HTML.
		echo Vite::withEntryPoints(
			array(
				'resources/js/editor.js',
			)
		)->toHtml();
	}
);

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter(
	'theme_file_path',
	function ( $path, $file ) {
		return ( 'theme.json' === $file )
			? public_path( 'build/assets/theme.json' )
			: $path;
	},
	10,
	2
);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action(
	'after_setup_theme',
	function () {
		/**
		 * Disable full-site editing support.
		 *
		 * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
		 */
		remove_theme_support( 'block-templates' );

		/**
		 * Register the navigation menus.
		 *
		 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
		 */
		register_nav_menus(
			array(
				'primary_navigation' => __( 'Primary Navigation', 'sage' ),
			)
		);

		/**
		 * Disable the default block patterns.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
		 */
		remove_theme_support( 'core-block-patterns' );

		/**
		 * Enable plugins to manage the document title.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable post thumbnail support.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Enable responsive embed support.
		 *
		 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
		 */
		add_theme_support( 'responsive-embeds' );

		/**
		 * Enable HTML5 markup support.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
		 */
		add_theme_support(
			'html5',
			array(
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'search-form',
				'script',
				'style',
			)
		);

		/**
		 * Enable selective refresh for widgets in customizer.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );
	},
	20
);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action(
	'widgets_init',
	function () {
		$config = array(
			'before_widget' => '<section class="widget %1$s %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		);

		register_sidebar(
			array(
				'name' => __( 'Primary', 'sage' ),
				'id'   => 'sidebar-primary',
			) + $config
		);

		register_sidebar(
			array(
				'name' => __( 'Footer', 'sage' ),
				'id'   => 'sidebar-footer',
			) + $config
		);
	}
);

add_action('init', function () {
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
});

/** This is for debugging purpose, because Acorn fails to load custom archive template */
add_filter('template_include', function ($template) {
    if (is_post_type_archive('projects')) {
        $custom_template_path = get_stylesheet_directory() . '/resources/views/archive-projects.blade.php';

        if (!file_exists($custom_template_path)) {
            error_log('Debug: archive-projects.blade.php not found at: ' . $custom_template_path);
            return $template;
        }

        return $custom_template_path;
    }

    return $template;
}, 99);

/**
 * Add 'projects' post type to the main query for search results.
 *
 * This function modifies the main query on search results pages to include
 * the 'projects' post type, allowing it to be searchable alongside posts and pages.
 *
 * @param WP_Query $query The current WP_Query object.
 */
add_action('pre_get_posts', function ($query) {
    if ($query->is_search() && $query->is_main_query() && !is_admin()) {
        $post_types = $query->get('post_type');
        if (empty($post_types)) {
            $post_types = array('post', 'page');
        }
        if (is_string($post_types)) {
            $post_types = array($post_types);
        }
        if (!in_array('projects', $post_types, true)) {
            $post_types[] = 'projects';
        }
        $query->set('post_type', $post_types);
    }
});