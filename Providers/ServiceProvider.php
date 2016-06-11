<?php

namespace Wazoomie\Support\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// helper functions
		require_once(dirname(__DIR__) . '/functions.php');
	}

	/**
	 * @return void
	 */
	public function register()
	{

	}
}