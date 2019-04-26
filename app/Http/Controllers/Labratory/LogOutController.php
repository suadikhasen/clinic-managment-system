<?php

namespace App\Http\Controllers\Labratory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Labratory;

class LogOutController extends Controller
{
    public function LogOut(){
    	$username=Auth::guard("Labratory")->user()->username;
        $user_data=Labratory::find($username);
        $user_data->active=0;
        $user_data->save();
        Auth::guard('Labratory')->LogOut();
    	return redirect('/')->with('Success','Sign Out Successfully');
    }
}
