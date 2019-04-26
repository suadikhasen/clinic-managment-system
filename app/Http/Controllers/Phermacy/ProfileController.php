<?php

namespace App\Http\Controllers\Phermacy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function ShowProfile(){
    	return view('Phermacy.Profile');
    }
}
