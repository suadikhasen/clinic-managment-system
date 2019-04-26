<?php

namespace App\Http\Controllers\Phermacy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servants\Daily_Servant;
use Illuminate\Support\Facades\Auth;
use App\CommonModel\Daily_Phermacy;
use Illuminate\Support\Carbon;
use App\room;

class PatientInfo extends Controller
{   
    
    public static function Number_Of_Patient(){
      $username=Auth::guard('Phermacy')->user()->username;
      $servant=Daily_Servant::find($username)->orderBy('id','desc')->first();
      $servant_room=$servant->daily_room;
      $patient_number=Daily_Phermacy::where('phermacy_room',$servant_room)->whereDate('created_at',Carbon::today())->whereNull('mark')->count();
      return $patient_number;
    }



    public static function Phermacy_Patient_List(){
    	$username=Auth::guard('Phermacy')->user()->username;
    	$phermacy=Daily_Servant::where('servant_id',$username)->orderBy('id','desc')->first();

    	$phermacy_room=$phermacy->daily_room;
    	$patient_list=room::find($phermacy_room)->Phermacy_Patient_List()->whereNull('daily_phermacy.mark')->whereDate('daily_phermacy.created_at',Carbon::today())->paginate(2);
    	

    	
    	return $patient_list;
    }
}
