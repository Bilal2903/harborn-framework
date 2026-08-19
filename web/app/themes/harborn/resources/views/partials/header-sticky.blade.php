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