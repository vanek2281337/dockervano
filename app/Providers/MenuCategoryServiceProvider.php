<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\MenuCategoryServices;


class MenuCategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\MenuCategoryServices', function ($app) {
            return new MenuCategoryServices();
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
