<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Servants\Daily_Servant;
use App\Patient\SendPatient;
use Illuminate\Support\Carbon;

class RoomController extends Controller
{   public $number_of_patient;
    public  function __construct($guard){

      $username=Auth::guard($guard[0])->user()->username;
      $current_user=Daily_Servant::find($username)->orderBy('id','desc')->first();
      $room_name=$current_user->daily_room;
      
      $number_of_patient=SendPatient::where('created_at','>=',Carbon::today())->where('patient_room',$room_name)->whereNull('mark')->count();
      
      $this->number_of_patient=$number_of_patient;
     
    }

    
}
