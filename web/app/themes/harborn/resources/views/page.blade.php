@extends('layouts.app')

@section('hero')
    @include('sections.hero', [
        'hero_title' => get_the_title(),
        'hero_description' => 'Drive digital forward.',
        'hero_image_url' => asset('images/hero.jpg')
    ])
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
@endsection
