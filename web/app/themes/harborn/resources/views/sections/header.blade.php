<header class="banner">
  <div class="container">
    <a class="logo" href="{{ home_url('/') }}">
      <img src="{{ get_theme_file_uri('resources/images/logo-light.svg') }}" alt="{{ $siteName }} logo">
    </a>

    <button class="hamburger-toggle d-desktop-none" aria-label="Open menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary__list', 'echo' => false]) !!}
    </nav>

    <div class="header-actions">
      <div class="search-bar">
        {!! get_search_form(false) !!}
      </div>

      {{-- Include the language switcher partial --}}
      @include('partials.language-switcher')
    </div>
  </div>
</header>

@include('partials.header-mega-menu')
@include('partials.header-sticky')