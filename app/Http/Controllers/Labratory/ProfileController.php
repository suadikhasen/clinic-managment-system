<?php

namespace App\Http\Controllers\Labratory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function ShowProfile(){
    	return view('Labratory.Profile');
    }
}
