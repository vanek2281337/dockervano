<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\MenuServices;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\MenuServices', function ($app) {
            return new MenuServices();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
