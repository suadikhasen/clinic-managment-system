<?php

namespace App\Http\Controllers\Registerar;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogOutController extends Controller
{
    

    public function LogOut(){
    	Auth::guard('Registerar')->logout();
    	return redirect('/')->with('Success','Sign Out Successfully');
    }

}
