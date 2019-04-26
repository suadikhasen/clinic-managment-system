<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Servants\Daily_Servant;
use App\Patient\SendPatient;
use App\User;
use App\room;

class PatientListController extends Controller
{
    public $Patient_List;
   
    public function __construct($guard){
    	$username=Auth::guard($guard['0'])->user()->username;
    	$user=Daily_Servant::find($username)->orderBy('id','desc')->first();
    	$user_room=$user->daily_room;
        // fetch todays patient that belongs to thier room for clinic servants
    	$Patient_List=room::find($user_room)->SearchPatient()->paginate(6);
    	$this->Patient_List=$Patient_List;
        
      


    }
}
