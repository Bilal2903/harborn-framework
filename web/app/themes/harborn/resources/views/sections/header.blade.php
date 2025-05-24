<header class="banner">
  <div class="container">
    <a class="logo" href="{{ home_url('/') }}">
      <img src="{{ get_theme_file_uri('resources/images/logo-light.svg') }}" alt="{{ $siteName }} logo">
    </a>

    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary__list', 'echo' => false]) !!}
    </nav>

    <div class="header-actions">
      <div class="search-bar">
        {!! get_search_form(false) !!}
      </div>

      <div class="language-switcher">
        @if (function_exists('pll_the_languages'))
            <ul class="language-switcher__list">
                @php
                    $languages = pll_the_languages(['raw' => 1]);
                    $current_lang = pll_current_language('slug');

                    $other_languages = array_filter($languages, function($lang) use ($current_lang) {
                        return $lang['slug'] !== $current_lang;
                    });
                @endphp

                @if (!empty($current_lang))
                    <li class="language-switcher__item language-switcher__item--current">
                        <a href="#" class="language-switcher__link">
                            {{ strtoupper($current_lang) }}
                        </a>
          
                        @if (!empty($other_languages))
                            <ul class="language-switcher__dropdown">
                                @foreach ($other_languages as $lang)
                                    <li class="language-switcher__dropdown-item">
                                        <a href="{{ $lang['url'] }}" class="language-switcher__dropdown-link">
                                            {{ strtoupper($lang['slug']) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            </ul>
        @endif
     </div>
    </div>
  </div>
</header>