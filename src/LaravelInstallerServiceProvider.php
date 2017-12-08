<?php

namespace EmilianoTisato\LaravelInstaller;

use Illuminate\Support\ServiceProvider;

class LaravelInstallerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
        __DIR__ . '/../config/laravel-installer.php' => config_path('laravel-installer.php'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('app-installer', function () {
            return new LaravelInstaller();
        });
    }
}
