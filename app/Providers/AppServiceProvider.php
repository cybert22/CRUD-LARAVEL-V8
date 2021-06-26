<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator; //importamos para paginar con bootstrap
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
        //habilitando bootstrap
        Paginator::useBootstrap();
    }
}