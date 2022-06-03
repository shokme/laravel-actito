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

        $this->app->singleton('actito-profile', function ($app) {
            return (new Actito())->profile;
        });

        $this->app->singleton('actito-table', function ($app) {
            return (new Actito())->table;
        });

        $this->app->singleton('actito-email', function ($app) {
            return (new Actito())->email;
        });

        $this->app->singleton('actito-webhook', function ($app) {
            return (new Actito())->webhook;
        });

        $this->app->singleton('actito-action', function ($app) {
            return (new Actito())->action;
        });

        $this->app->singleton('actito-import', function ($app) {
            return (new Actito())->import;
        });

        $this->app->singleton('actito-form', function ($app) {
            return (new Actito())->form;
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
