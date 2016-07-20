<?php
namespace App\Repositories\Density;

use Illuminate\Support\ServiceProvider;

class DensityServiceProvide extends ServiceProvider
{
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
        $this->app->bind('App\Repositories\Density\DensityInterface', 'App\Repositories\Density\DensityRepository');
    }
}