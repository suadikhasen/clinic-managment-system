<?php

namespace App\Http\Controllers\Doctors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctors;
class LogOutController extends Controller
{
    public function LogOut(){
        $active=Doctors::find(Auth::guard('Doctors')->user()->username);
        $active->active=0;
        $active->save();
    	Auth::guard('Doctors')->logout();
    	return redirect('/')->with('Success','Sign Out Successfully');
    }
}
