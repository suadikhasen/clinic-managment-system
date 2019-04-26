<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Controllers\Clinic\RoomController',function($app,$guard){
           return new  \App\Http\Controllers\Clinic\RoomController($guard);
        });
        
        $this->app->bind('App\Http\Controllers\Clinic\PatientListController',function($app,$guard){
            return new \App\Http\Controllers\Clinic\PatientListController($guard);

        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

    }
}
