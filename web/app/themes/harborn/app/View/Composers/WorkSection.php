<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class WorkSection extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.work-overview',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'projects' => $this->getProjects(),
            'more_work_link' => get_post_type_archive_link('project'),
        ];
    }

    /**
     * Get recent projects.
     *
     * @return array
     */
    protected function getProjects()
    {
        $args = [
            'post_type'      => 'project',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => 'publish',
        ];

        $query = new WP_Query($args);

        return $query->posts;
    }
}
