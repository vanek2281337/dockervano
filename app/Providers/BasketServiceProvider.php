<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\BasketServices;

class BasketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\BasketServices', function ($app) {
            return new BasketServices();
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
