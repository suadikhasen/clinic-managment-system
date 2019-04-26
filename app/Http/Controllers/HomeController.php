<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Clinic\RoomController;
use App\Http\Controllers\Clinic\AdditionalTophermacyController;
use App\Http\Controllers\Phermacy\PatientInfo;
use App\Http\Controllers\Labratory\Labratory_PatientInfo;
use App\Events\Doctors;
use App\room;
class HomeController extends Controller
{
    public function Home(){
    	if(Auth::guard('Registerar')->check()){
    		return view('Registerar.Home');
    	}

    	elseif (Auth::guard('Doctors')->check()) {
            if(Auth::guard('Doctors')->user()->active==1){
                $patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
                $patient_number=$patient_number->number_of_patient;
                
    		   return view('Doctors.Home')->with('patient_number',$patient_number);
            }
            else
            {
                $room=room::all();
                return view('Doctors.SelectRoom',['room'=>$room]);
            }
    		
    	}

    	elseif (Auth::guard('Phermacy')->check()) {
            if (Auth::guard('Phermacy')->user()->active==1) {
                $patient_number = PatientInfo::Number_Of_Patient();
                return view('Phermacy.Home',['patient_number'=>$patient_number]);
            }
             else{
                $room=room::all();
                return view('Phermacy.SelectRoom',['room'=>$room]);
             }
    		
    	}
    	elseif (Auth::guard('Labratory')->check()) {
            if(Auth::guard("Labratory")->user()->active==1){
                $patient_number=Labratory_PatientInfo::Patient_Number();
                return view('Labratory.Home',['patient_number'=>$patient_number]);
            }
    		
            $room=room::all();
            return view('Labratory.SelectRoom',['room'=>$room]);
    	}
    	
    	return view('welcome');

    }
}
