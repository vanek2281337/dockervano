<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\PurchasesHistoryValidationServices;

class PurchasesHistoryValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\PurchasesHistoryValidationServices', function ($app) {
            return new PurchasesHistoryValidationServices();
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
