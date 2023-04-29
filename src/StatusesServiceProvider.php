<?php

Namespace Wame\Statuses;

use Closure;
use Illuminate\Support\ServiceProvider;

class StatusesServiceProvider extends ServiceProvider
{

    public function boot()
    {
       // $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/2014_04_17_071145_create_statuses_table.php');
       // $this->mergeConfigFrom(__DIR__ . '/../config/tab-translatable.php', 'reviews');

        if ($this->app->runningInConsole()) {
            //export migration
            $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')],'migrations');
            //export seeder
            $this->publishes([__DIR__.'/../database/seeders' => database_path('seeders')],'seeders');
            //export config
            $this->publishes([__DIR__.'/../config' => config_path('')], 'config');
            // Export Model
            $this->publishes([__DIR__.'/../app/Models/Status.php' => app_path('Models/Status.php')], 'models');
             //Export Nova resource
            $this->publishes([__DIR__ . '/../app/Nova' => app_path('Nova')], ['nova', 'statuses']);
            // Export lang
            $this->publishes([__DIR__ . '/../resources/lang' => resource_path('lang')], ['language', 'statuses']);
            // Export css
            $this->publishes([__DIR__ . '/../resources/css' => resource_path('css')], ['css', 'statuses']);
            // Export Utils
            //$this->publishes([__DIR__ . '/../app/Utils/Helpers/StatusFields.php' => app_path('Utils/Helpers/StatusFields.php')], ['utils', 'statuses']);
            //$this->publishes([__DIR__ . '/../app/Utils/Models' => app_path('Utils/Models')], ['utils', 'statuses']);
        }

    }

    public function register()
    {

    }

}
