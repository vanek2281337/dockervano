<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\IngridientValidationService;

class IngridientValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\IngridientValidationService', function ($app) {
            return new IngridientValidationService();
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
