<a href="{{ get_permalink($project->ID) }}" class="project-card">
    <div class="project-card__image" style="background-image: url('{{ get_the_post_thumbnail_url($project->ID, 'large') }}');">
        <div class="project-card__overlay"></div>
    </div>
    <div class="project-card__content">
        <h3 class="project-card__title">{{ $project->post_title }}</h3>
        @if($project->post_excerpt)
            <p class="project-card__excerpt">{{ $project->post_excerpt }}</p>
        @endif
    </div>
</a>
