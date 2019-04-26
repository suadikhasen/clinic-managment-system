<?php

namespace App\Http\Controllers\Phermacy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Phermacy;

class LogoutController extends Controller
{
    public function LogOut(){
    	$username=Auth::guard('Phermacy')->user()->username;
    	Auth::guard('Phermacy')->logout();
    	
    	$find=Phermacy::find($username);
    	$find->active=0;
    	$find->save();

    	return redirect('/')->with('Success','Sign Out Successfully');
    }
}
