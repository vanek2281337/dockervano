<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\PushUserSessionValidationServices;

class PushUserSessionValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\PushUserSessionValidationServices', function ($app) {
            return new PushUserSessionValidationServices();
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
