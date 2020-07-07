<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WishlistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Contract\WishlistServiceInterface::class,
            \App\Services\WishlistService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
