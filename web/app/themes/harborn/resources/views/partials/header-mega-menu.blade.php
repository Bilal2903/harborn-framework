<div class="mega-menu-overlay" id="megaMenuOverlay">
    {{-- Close button moved here to be positioned relative to the overlay --}}
    <button class="mega-menu-close" aria-label="close menu">×</button>
    
    <div class="mega-menu-content">
        <div class="mega-menu-grid">
            <div class="mega-menu-column-1">
                <h3 class="mega-menu-heading-menu">Menu</h3>
                <nav class="mega-menu-nav">
                    @if (has_nav_menu('mega_menu_navigation'))
                        {!! wp_nav_menu([
                            'theme_location' => 'mega_menu_navigation',
                            'menu_class' => 'mega-nav-list',
                            'container' => false,
                            // 'walker' => new App\Walkers\MegaMenuWalker() // If you create a custom walker
                        ]) !!}
                    @endif
                </nav>

                <div class="mega-menu-search-wrapper">
                    <h3 class="mega-menu-heading-menu">Search</h3>
                    <div class="search-bar mega-menu-search-bar">
                        {!! get_search_form(false) !!}
                    </div>
                </div>
            </div>

            <div class="mega-menu-column-2">
            </div>

            <div class="mega-menu-column-3">
                <div class="mega-menu-socials-wrapper">
                    <h3 class="mega-menu-heading-menu">Socials</h3>
                    <ul class="social-links__list">
                        <li class="social-links__item">
                            <a href="https://www.instagram.com/harborn.digital/?utm_source=ig_web_button_share_sheet" class="social-links__link" aria-label="Instagram">
                                Instagram
                            </a>
                        </li>
                        <li class="social-links__item">
                            <a href="https://nl.linkedin.com/company/harborn" class="social-links__link" aria-label="LinkedIn">
                                LinkedIn
                            </a>
                        </li>
                        <li class="social-links__item">
                            <a href="http://www.youtube.com/@harborn.digital" class="social-links__link" aria-label="YouTube">
                                YouTube
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mega-menu-language-selector">
                    <h3 class="mega-menu-heading-menu">Taal</h3>
                    <div class="language-switcher">
                        @if (function_exists('pll_the_languages'))
                            <ul class="language-switcher__list">
                                @php
                                    $languages = pll_the_languages(['raw' => 1]);
                                    $current_lang = pll_current_language('slug');
                                @endphp

                                @foreach ($languages as $lang)
                                    <li class="language-switcher__item @if ($lang['slug'] === $current_lang) language-switcher__item--current @endif">
                                        <a href="{{ $lang['url'] }}" class="language-switcher__link">
                                            {{ strtoupper($lang['slug']) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sticky-header" id="stickyHeader">
    <div class="sticky-header-content">
        <div class="logo-sticky">
            <a href="{{ home_url('/') }}">
                @if (has_custom_logo())
                    {!! the_custom_logo() !!}
                @else
                    <img src="{{ get_theme_file_uri('resources/images/logo-dark.svg') }}" alt="{{ get_bloginfo('name', 'display') }}">
                @endif
            </a>
        </div>

        <div class="search-bar">
            {!! get_search_form(false) !!}
        </div>

        <button class="hamburger-toggle" aria-label="Open menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</div>