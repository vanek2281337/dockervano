<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\PushUserSessionServices;

class PushUserSessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\PushUserSessionServices', function ($app) {
            return new PushUserSessionServices();
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
