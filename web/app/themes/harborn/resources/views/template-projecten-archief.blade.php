{{--
  Template Name: Projects archive
--}}
@extends('layouts.app')

@section('content')
  <div class="project-archive-wrapper">
    <div class="project-archive__container">
      <h1 class="project-archive__title">{{ get_the_archive_title() }}</h1>
      <form class="project-archive__filters">
        <input class="project-archive__search" type="search" name="s" placeholder="Hinted search text" value="{{ get_search_query() }}">
        <select class="project-archive__select" name="project_cat">
          <option value="">Tech</option>
        </select>
        <select class="project-archive__select" name="type">
          <option value="">All types</option>
        </select>
        <button class="project-archive__filter-btn" type="submit">Filter</button>
      </form>
      @if (have_posts())
        <div class="project-archive__grid">
          @while (have_posts())
            @php(the_post())
            @include('partials.content-project')
          @endwhile
        </div>
        <div class="project-archive__pagination">
          {!! get_the_posts_navigation([ 'prev_text' => __('&larr; Vorige', 'sage'), 'next_text' => __('Volgende &rarr;', 'sage') ]) !!}
        </div>
      @else
        <p class="project-archive__empty">{{ __('No projects found.', 'sage') }}</p>
      @endif
    </div>
  </div>
@endsection