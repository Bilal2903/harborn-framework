SINGLE PROJECT PARTIAL TEST
<article @php(post_class())>
  <header>
    <h1>
        <a href="{{ get_permalink() }}">
            {!! $title !!}
        </a>
    </h1>

    <h3>{{ get_field('subheading') }}</h3>

    <div class="breadcrumbs">
      <a href="{{ esc_url(home_url('/')) }}">Home</a> &gt;
      <a href="{{ esc_url(get_permalink(get_page_by_path('insights'))) }}">Insights</a> &gt;
      <a href="{{ esc_url(get_permalink(get_page_by_path('blog'))) }}">Blog</a> &gt;
      <span class="current-post">{!! get_the_title() !!}</span>
    </div>

    @include('partials.entry-meta')
  </header>

  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages([
      'echo' => 0,
      'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'),
      'after' => '</p></nav>'
    ]) !!}
  </footer>

  @php(comments_template())
</article>
