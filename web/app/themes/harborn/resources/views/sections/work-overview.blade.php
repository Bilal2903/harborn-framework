<section class="section-work-overview">
    <div class="container mx-auto px-4">
        <div class="work-header flex justify-between items-center mb-8">
            <h2 class="text-4xl font-bold">Werk</h2>
            @if($more_work_link)
                <a href="{{ $more_work_link }}" class="more-work-link text-xl flex items-center">
                    more work
                    <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            @endif
        </div>
        @if($projects)
            <div class="swiper project-swiper">
                <div class="swiper-wrapper">
                    @foreach($projects as $project)
                        <div class="swiper-slide">
                            @include('components.project-card', ['project' => $project])
                        </div>
                    @endforeach
                </div>
                <!-- Swiper Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Swiper Navigation -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        @else
            <p>No projects found.</p>
        @endif
    </div>
</section>
