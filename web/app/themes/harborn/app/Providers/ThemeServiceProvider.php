<?php
/**
 * Theme Service Provider
 *
 * @package Harborn
 */

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;

/**
 * Class ThemeServiceProvider
 *
 * Registers theme-specific services.
 */
class ThemeServiceProvider extends SageServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		parent::register();
		$this->app->register( ProjectPostTypeServiceProvider::class );
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		parent::boot();
	}
}
