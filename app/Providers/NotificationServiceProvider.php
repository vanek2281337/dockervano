<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\NotificationServices;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\NotificationServices', function ($app) {
            return new NotificationServices();
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
