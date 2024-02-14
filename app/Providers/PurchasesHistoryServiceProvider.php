<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\PurchasesHistoryServices;

class PurchasesHistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\PurchasesHistoryServices', function ($app) {
            return new PurchasesHistoryServices();
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
