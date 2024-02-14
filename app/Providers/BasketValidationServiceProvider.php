<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\BasketValidationServices;

class BasketValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\BasketValidationServices', function ($app) {
            return new BasketValidationServices();
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
