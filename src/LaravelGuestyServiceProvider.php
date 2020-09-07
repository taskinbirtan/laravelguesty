<?php

namespace TaskinBirtan\LaravelGuesty;

use Illuminate\Support\ServiceProvider;

class LaravelGuestyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GuestyApi', function() {
            return new GuestyApi();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
