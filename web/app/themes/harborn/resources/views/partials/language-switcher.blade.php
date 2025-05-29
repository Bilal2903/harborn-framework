<div class="language-switcher">
    @if (function_exists('pll_the_languages'))
        <ul class="language-switcher__list">
            @php
                $languages = pll_the_languages(['raw' => 1]);
                $current_lang = pll_current_language('slug');
                // We'll also pass 'other_languages' if we are in the main header context
                // For mega menu, we just list all
                $other_languages = isset($is_mega_menu) && $is_mega_menu === true
                                   ? [] // No dropdown for mega menu, just list all
                                   : array_filter($languages, function($lang) use ($current_lang) {
                                       return $lang['slug'] !== $current_lang;
                                   });
            @endphp

            {{-- Main language display for header --}}
            @if (!isset($is_mega_menu) || $is_mega_menu === false)
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
            @else {{-- For mega menu, just list all languages without dropdown logic --}}
                @foreach ($languages as $lang)
                    <li class="language-switcher__item @if ($lang['slug'] === $current_lang) language-switcher__item--current @endif">
                        <a href="{{ $lang['url'] }}" class="language-switcher__link">
                            {{ strtoupper($lang['slug']) }}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    @endif
</div>