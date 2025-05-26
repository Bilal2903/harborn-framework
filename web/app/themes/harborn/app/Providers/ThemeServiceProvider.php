<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;
use App\Providers\ProjectPostTypeServiceProvider;
use Illuminate\Support\Facades\View;

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

    }
}
