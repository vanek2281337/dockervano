<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\IngridientBasketServices;

class IngridientBasketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\IngridientBasketServices', function ($app) {
            return new IngridientBasketServices();
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
