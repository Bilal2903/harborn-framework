<!-- {{-- resources/views/single-project.blade.php --}}
@extends('layouts.app') {{-- Dit is de basis layout van je Sage theme --}}

@section('content')
  @while(have_posts()) @php(the_post())
    {{-- Haal de featured image URL op --}}
    @php($header_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'))

    {{-- Haal de titel op --}}
    @php($project_title = get_the_title())

    {{-- Haal de excerpt op (als "subheading") --}}
    @php($project_excerpt = get_the_excerpt())

    {{-- Haal ACF velden op --}}
    @php($read_time = get_field('read_time'))
    @php($author_name = get_field('author_name'))

    {{-- Haal de permalink voor de 'Overzicht' (Projects Archive) pagina op --}}
    @php($projects_archive_link = get_post_type_archive_link('project'))

    <article @php(post_class())>
      <header class="entry-header">
        <div class="header-image-container" @if($header_image_url)style="background-image: url('{{ esc_url($header_image_url) }}');"@endif>
            <div class="header-overlay"></div>
            <div class="header-content">
                <h1 class="entry-title">{!! $project_title !!}</h1>
                @if($project_excerpt)
                    <p class="entry-subheading">{!! $project_excerpt !!}</p>
                @endif
                <div class="breadcrumbs">
                    <a href="{{ esc_url( home_url( '/' ) ) }}">Home</a> &gt;
                    <a href="{{ esc_url( get_permalink( get_page_by_path( 'insights' ) ) ) }}">Insights</a> &gt;
                    <a href="{{ esc_url( get_permalink( get_page_by_path( 'blog' ) ) ) }}">Blog</a> &gt;
                    <span class="current-post">{!! $project_title !!}</span>
                </div>
            </div>
        </div>
      </header><div class="entry-content">
        <div class="post-meta">
            <span class="meta-item overview-link">
                @if($projects_archive_link)
                    <a href="{{ esc_url( $projects_archive_link ) }}">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z" fill="currentColor"/></svg>
                        Overzicht
                    </a>
                @endif
            </span>
            <span class="meta-item">{{ get_the_date( 'd F Y' ) }}</span>
            @if($read_time)
                <span class="meta-item">{{ esc_html( $read_time ) }}</span>
            @endif
            @if($author_name)
                <span class="meta-item">door {{ esc_html( $author_name ) }}</span>
            @endif
        </div>

        <div class="post-content-sections">
            @if(have_rows('content_sections')) {{-- 'content_sections' is de ACF Flexible Content field name --}}
                @while(have_rows('content_sections')) @php(the_row())
                    @if(get_row_layout() == 'text_section') {{-- 'text_section' is de naam van je ACF Flexible Content layout --}}
                        <section class="content-block">
                            @if(get_sub_field('section_title'))
                                <h2>{!! get_sub_field('section_title') !!}</h2>
                            @endif

                            @if(get_sub_field('section_content'))
                                {!! get_sub_field('section_content') !!}
                            @endif

                            @if(get_sub_field('show_button') && get_sub_field('button_text') && get_sub_field('button_link'))
                                <a href="{!! get_sub_field('button_link') !!}" class="button">
                                    {!! get_sub_field('button_text') !!}
                                </a>
                            @endif
                        </section>
                    @endif
                    {{-- Voeg hier meer layout types toe --}}
                @endwhile
            @else
                {{-- Fallback: toon de standaard WordPress content als er geen ACF Flexible Content is --}}
                <div class="e-content"> {{-- Gebruik de 'e-content' class van je thema --}}
                    @php(the_content())
                </div>
            @endif

            <div class="back-to-top">
                <a href="#primary">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 16L9.41 14.59L3.83 9H16V7H3.83L9.41 1.41L8 0L0 8L8 16Z" fill="currentColor"/></svg>
                    Back to top
                </a>
            </div>
        </div></div></article>@endwhile
@endsection
 -->

@extends('layouts.app') {{-- Gaat uit van je hoofdlayout --}}

@section('content')
    @while(have_posts()) @php(the_post())
        <article @php(post_class())>
            <header>
                <h1 class="entry-title">
                    {!! get_the_title() !!}
                </h1>

                <h3>{{ get_field('subheading') }}</h3>
                <div class="breadcrumbs">
                    <a href="{{ esc_url(home_url('/')) }}">Home</a> &gt;
                    <a href="{{ esc_url(get_permalink(get_page_by_path('insights'))) }}">Insights</a> &gt;
                    <a href="{{ esc_url(get_permalink(get_page_by_path('blog'))) }}">Blog</a> &gt;
                    <span class="current-post">{!! get_the_title() !!}</span>
                </div>

                {{-- Optioneel: Voeg post meta toe zoals auteur en datum --}}
                @include('partials.entry-meta')
            </header>

            <div class="entry-content">
                @php(the_content())
            </div>

            <footer>
                {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
            </footer>

            {{-- Optioneel: Voeg commentaarsectie toe --}}
            @php(comments_template())
        </article>
    @endwhile
@endsection
