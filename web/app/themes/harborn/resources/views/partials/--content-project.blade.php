<article class="project-archive-card">
    <div class="project-archive-card__image">
        @if (has_post_thumbnail())
        <a href="{{ get_permalink() }}">{!! get_the_post_thumbnail(null, 'large', ['class' => 'project-archive-card__img']) !!}</a>
        @else
        <div class="project-archive-card__img project-archive-card__img--placeholder"></div>
        @endif
    </div>
    <div class="project-archive-card__body">
        <h2 class="project-archive-card__title">
        <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
        </h2>
        <div class="project-archive-card__meta">
      
        <span class="project-archive-card__type">project</span>
        <span class="project-archive-card__date">{{ get_the_date('d M Y') }}</span>
        <span class="project-archive-card__readtime">3 min readtime</span>
        </div>

        <div class="project-archive-card__excerpt">
        {!! get_the_excerpt() !!}
        </div>
    </div>
</article>