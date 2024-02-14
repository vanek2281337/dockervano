<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\IngridientServices;

class IngridientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\IngridientServices', function ($app) {
            return new IngridientServices();
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
