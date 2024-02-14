<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\UserServices;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Domain\Services\UserServices', function ($app) {
            return new UserServices();
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
