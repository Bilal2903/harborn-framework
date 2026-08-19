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
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>

    <div class="header-actions">
      <div class="search-bar">
        <form role="search" method="get" class="search-form" action="{{ home_url('/') }}">
          <label>
            <button type="submit" class="search-submit"></button>
            <input type="search" class="search-field" placeholder="Search…" value="{{ get_search_query() }}" name="s" />
          </label>
        </form>
      </div>

      <div class="language-changer">
        <a href="#" class="current-lang">NL</a>
        <ul class="language-options">
          <li><a href="?lang=en">EN</a></li>
          <li><a href="?lang=de">DE</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>

@include('partials.header-mega-menu')
@include('partials.header-sticky')