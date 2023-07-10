<?php

namespace Bjbs\Coresdi;

use Illuminate\Support\ServiceProvider;

class CoreSdiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Bjbs\Coresdi\Http\Controllers\Dashboard\DashboardController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'coreSdi');

        $this->publishes([
            __DIR__.'/../resources/config/login.php' => config_path('login.php')
        ],'config');
        $this->publishes([
            __DIR__.'/../resources/views/'  => resource_path('views/vendor/coreSdi')
        ],'views');
        $this->publishes([
            __DIR__.'/../public/'  => public_path('/coreSdi')
        ],'public');
    }
}
