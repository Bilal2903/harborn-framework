<div class="mega-menu-overlay" id="megaMenuOverlay">
    {{-- Close button moved here to be positioned relative to the overlay --}}
    <button class="mega-menu-close" aria-label="close menu">×</button>
    
    <div class="mega-menu-content">
        <div class="mega-menu-grid">
            {{-- Column 1: White Background - Navigation and Search --}}
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
            </div>

            {{-- Column 2: Light Blue Background --}}
            <div class="mega-menu-column-2">
                {{-- Content for column 2 goes here if any, as per your request to remain unchanged --}}
            </div>

            {{-- Column 3: Dark Blue Background - Socials and Language Selector --}}
            <div class="mega-menu-column-3">
                {{-- Socials --}}
                <div class="mega-menu-socials-wrapper">
                    <h3 class="mega-menu-heading-menu">Socials</h3>
                    <ul class="social-links__list">
                        <li class="social-links__item">
                            <a href="https://www.instagram.com/harborn.digital/?utm_source=ig_web_button_share_sheet" class="social-links__link" aria-label="Instagram">
                                Instagram
                                <svg class="social-links__icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.8 2H16.2C19.4 2 22 4.6 22 7.8V16.2C22 19.4 19.4 22 16.2 22H7.8C4.6 22 2 19.4 2 16.2V7.8C2 4.6 4.6 2 7.8 2ZM12 15.6C10.2327 15.6 8.8 14.1673 8.8 12.4C8.8 10.6327 10.2327 9.2 12 9.2C13.7673 9.2 15.2 10.6327 15.2 12.4C15.2 14.1673 13.7673 15.6 12 15.6ZM17.2 7.8C17.2 7.1136 16.6545 6.56818 15.9682 6.56818C15.2818 6.56818 14.7364 7.1136 14.7364 7.8C14.7364 8.4864 15.2818 9.03182 15.9682 9.03182C16.6545 9.03182 17.2 8.4864 17.2 7.8Z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="social-links__item">
                            <a href="https://nl.linkedin.com/company/harborn" class="social-links__link" aria-label="LinkedIn">
                                LinkedIn
                                <svg class="social-links__icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.447 20.447H16.505V13.882C16.505 12.247 15.823 11.196 14.516 11.196C13.125 11.196 12.404 12.181 12.404 13.882V20.447H8.462V7.842H12.404V9.664C12.404 9.664 13.916 7.421 16.035 7.421C18.494 7.421 20.447 9.027 20.447 12.383V20.447ZM4.447 6.002C3.12 6.002 2 4.981 2 3.667C2 2.353 3.12 1.332 4.447 1.332C5.774 1.332 6.894 2.353 6.894 3.667C6.894 4.981 5.774 6.002 4.447 6.002ZM6.421 20.447H2.479V7.842H6.421V20.447Z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="social-links__item">
                            <a href="#" class="social-links__link" aria-label="TikTok">
                                TikTok
                                {{-- Placeholder SVG for TikTok --}}
                                <svg class="social-links__icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.525 2H10.916V13.437C10.916 14.673 11.758 15.717 12.871 15.717C13.984 15.717 14.826 14.673 14.826 13.437V7.172C14.826 6.837 15.111 6.574 15.467 6.574C15.823 6.574 16.108 6.837 16.108 7.172V12.98C16.108 16.335 13.344 19.006 10.015 19.006C6.687 19.006 3.922 16.335 3.922 12.98V7.172C3.922 6.837 4.207 6.574 4.563 6.574C4.919 6.574 5.204 6.837 5.204 7.172V12.98C5.204 14.673 6.275 16.035 7.616 16.035C8.956 16.035 10.027 14.673 10.027 12.98V2C10.027 1.665 9.742 1.402 9.386 1.402C9.03 1.402 8.745 1.665 8.745 2V12.98C8.745 14.07 7.915 14.935 6.862 14.935C5.81 14.935 4.979 14.07 4.979 12.98V7.172C4.979 6.837 5.264 6.574 5.62 6.574C5.976 6.574 6.261 6.837 6.261 7.172V12.98C6.261 14.673 7.332 16.035 8.673 16.035C10.013 16.035 11.084 14.673 11.084 12.98V2C11.084 1.665 10.801 1.402 10.445 1.402C10.09 1.402 9.805 1.665 9.805 2V12.98C9.805 14.07 8.975 14.935 7.922 14.935C6.87 14.935 6.039 14.07 6.039 12.98V7.172C6.039 6.837 6.324 6.574 6.68 6.574C7.036 6.574 7.321 6.837 7.321 7.172V12.98C7.321 14.673 8.392 16.035 9.733 16.035C11.073 16.035 12.144 14.673 12.144 12.98V2C12.144 1.665 11.861 1.402 11.505 1.402C11.15 1.402 10.865 1.665 10.865 2V12.98C10.865 14.07 10.034 14.935 8.982 14.935C7.93 14.935 7.099 14.07 7.099 12.98V7.172C7.099 6.837 7.384 6.574 7.74 6.574C8.096 6.574 8.381 6.837 8.381 7.172V12.98C8.381 14.673 9.452 16.035 10.793 16.035C12.133 16.035 13.204 14.673 13.204 12.98V2C13.204 1.665 12.921 1.402 12.565 1.402C12.21 1.402 11.925 1.665 11.925 2V12.98C11.925 14.07 11.094 14.935 10.042 14.935C8.99 14.935 8.159 14.07 8.159 12.98V7.172C8.159 6.837 8.444 6.574 8.801 6.574C9.157 6.574 9.442 6.837 9.442 7.172V12.98C9.442 14.673 10.513 16.035 11.854 16.035C13.194 16.035 14.265 14.673 14.265 12.98V2Z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="social-links__item">
                            <a href="http://www.youtube.com/@harborn.digital" class="social-links__link" aria-label="YouTube">
                                YouTube
                                <svg class="social-links__icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.996 7.502C21.846 6.842 21.579 6.239 21.193 5.733C20.807 5.228 20.311 4.821 19.742 4.542C19.173 4.264 18.544 4.125 17.892 4.125C16.942 4.125 12.001 4.125 12.001 4.125C12.001 4.125 7.061 4.125 6.109 4.125C5.457 4.125 4.828 4.264 4.259 4.542C3.691 4.821 3.195 5.228 2.809 5.733C2.423 6.239 2.156 6.842 2.006 7.502C1.729 8.718 1.729 12.001 1.729 12.001C1.729 12.001 1.729 15.284 2.006 16.499C2.156 17.159 2.423 17.762 2.809 18.268C3.195 18.773 3.691 19.18 4.259 19.458C4.828 19.736 5.457 19.875 6.109 19.875C7.061 19.875 12.001 19.875 12.001 19.875C12.001 19.875 16.942 19.875 17.892 19.875C18.544 19.875 19.173 19.736 19.742 19.458C20.311 19.18 20.807 18.773 21.193 18.268C21.579 17.762 21.846 17.159 21.996 16.499C22.273 15.284 22.273 12.001 22.273 12.001C22.273 12.001 22.273 8.718 21.996 7.502ZM9.704 15.001V8.999L15.304 12.001L9.704 15.001Z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- Language Selector --}}
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

                {{-- Search Bar (Moved to Column 3 as per image) --}}
                <div class="mega-menu-search-wrapper">
                    <h3 class="mega-menu-heading-menu">Search</h3>
                    <div class="search-bar mega-menu-search-bar">
                        {!! get_search_form(false) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- This sticky-header div should remain as is, as it's for the sticky header search bar --}}
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

        {{-- This search bar is for the sticky header --}}
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