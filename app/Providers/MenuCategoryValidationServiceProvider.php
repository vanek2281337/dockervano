<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\MenuCategoryValidationServices;


class MenuCategoryValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\MenuCategoryValidationServices', function ($app) {
            return new MenuCategoryValidationServices();
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
