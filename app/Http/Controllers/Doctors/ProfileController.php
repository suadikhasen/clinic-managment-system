<?php

namespace App\Http\Controllers\Doctors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Clinic\RoomController;
class ProfileController extends Controller
{
	
    public function ShowProfile(){
    	$username=Auth::guard('Doctors')->user()->username;
        $patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
        $patient_number=$patient_number->number_of_patient;
    	return view('Doctors/Profile',['patient_number'=>$patient_number]);
    }
}
