<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Image;
use App\Observers\CategoryObserver;
use App\Observers\ImageObserver;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
               //\App\Models\Image::observe(\App\Observers\ImageObserver::class);
               Category::observe(CategoryObserver::class);
    }
}
