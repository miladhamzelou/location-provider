<?php
/**
 * Created by PhpStorm.
 * User: milad
 * Date: 11/24/15
 * Time: 9:44 AM
 */

namespace geo\src;


use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('location', function () {
            return new Location();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('location');
    }

}
