<section class="hero-section" style="background-image: url({{ $hero_image_url ?? asset('images/hero.jpg') }});">
    <div class="container">
        @isset($hero_title)
            <h1 class="hero-title">{{ $hero_title }}</h1>
        @endisset

        @isset($hero_description)
            <p class="hero-description">{{ $hero_description }}</p>
        @endisset
    </div>
</section>