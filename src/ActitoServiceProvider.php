<?php

namespace Shokme\Actito;

use Illuminate\Support\ServiceProvider;

class ActitoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'actito');

        $this->app->singleton('actito', function ($app) {
            return new Actito();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('actito.php'),
            ], 'config');
        }
    }
}
