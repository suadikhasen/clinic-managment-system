<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function LoginControl(request $request){
    	$request->validate([
    		'username'=>'required|max:255',
    		'password'=>'required|max:255'
    	]);
    	$user=$request->only('username','password');

    	if(Auth::guard('Registerar')->attempt($user)){
    		return redirect()->route('Home');
    	}
        elseif (Auth::guard('Doctors')->attempt($user)) {

            return redirect()->route('Home');
        }

        elseif (Auth::guard('Phermacy')->attempt($user)) {
           return redirect()->route('Home');
            
        }

        elseif (Auth::guard('Labratory')->attempt($user)) {
            return redirect()->route('Home');
        }

    	return back()->with('Invalid','Invalid Username Or password');


    }
}
