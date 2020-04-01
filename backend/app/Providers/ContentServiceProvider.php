<?php

namespace App\Providers;

use App\Services\Crud;
use App\Contracts\Content;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Content::class, function($app) {
            return new crud();
        });
    }
}
