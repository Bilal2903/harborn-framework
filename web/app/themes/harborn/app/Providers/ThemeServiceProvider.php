<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;
use App\Providers\ProjectPostTypeServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\WorkSection;

class ThemeServiceProvider extends SageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
        $this->app->register(ProjectPostTypeServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // Debug: check of ProjectPostTypeServiceProvider geladen wordt
        error_log('ThemeServiceProvider booted!');
        // Registreer de View Composer voor de carrousel
        View::composer('sections.work-overview', WorkSection::class);
    }
}
