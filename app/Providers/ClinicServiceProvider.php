<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Clinic\Authentication_user_data_provider;
use App\Patient\SendPatient;
use App\Patient\AddPatient;
use Illuminate\Support\Carbon;
use App\room;
class ClinicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      
        
      
    }
}
