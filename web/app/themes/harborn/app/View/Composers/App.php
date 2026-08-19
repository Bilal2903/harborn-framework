<?php
/**
 * App View Composer
 *
 * @package Harborn
 */

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * Class App
 *
 * Provides data to all Blade views.
 */
class App extends Composer {
	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = array(
		'*',
	);

	/**
	 * Retrieve the site name.
	 *
	 * @return string
	 */
	public function siteName(): string {
		return get_bloginfo( 'name', 'display' );
	}
}
