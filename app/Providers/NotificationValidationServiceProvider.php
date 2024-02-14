<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\NotificationValidationServices;

class NotificationValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\NotificationValidationServices', function ($app) {
            return new NotificationValidationServices();
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
