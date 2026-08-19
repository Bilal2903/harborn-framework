@extends('layouts.app')
@section('content')
  <div class="projects-archive">
    <h1>{{ __('Projects', 'harborn') }}</h1>
    @if (have_posts())
      <div class="projects-list">
        @while (have_posts())
          @php(the_post())
          <article class="project-item">
            <h2 class="project-title">
              <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
            </h2>
            @if (has_post_thumbnail())
              <div class="project-thumbnail">
                <a href="{{ get_permalink() }}">
                  {!! get_the_post_thumbnail(null, 'medium') !!}
                </a>
              </div>
            @endif
            <div class="project-excerpt">
              {{ get_the_excerpt() }}
            </div>
          </article>
        @endwhile
      </div>
      {!! get_the_posts_navigation() !!}
    @else
      <p>{{ __('No projects found.', 'harborn') }}</p>
    @endif
  </div>
@endsection