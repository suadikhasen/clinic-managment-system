<?php

namespace App\Http\Controllers\Registerar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProfileController extends Controller
{
    public function ShowProfile(){
    	return view('Registerar/Profile');
    }
}
