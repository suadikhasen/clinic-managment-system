<?php

namespace App\Http\Controllers\Labratory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servants\Daily_Servant;
use Illuminate\Support\Carbon;
use App\CommonModel\Daily_labratory;
use App\room;
class Labratory_PatientInfo extends Controller
{  
    public static function Patient_Number(){
    	$username=Auth::guard("Labratory")->user()->username;
    	$user_data=Daily_Servant::where('servant_id',$username)->latest()->first();
    	$user_room=$user_data->daily_room;
    	$Patient_Number=Daily_labratory::where('Labratory_room',$user_room)->whereDate('created_at',Carbon::today())->whereNull('labratorist_mark')->whereNotNull('ins_fr_do_lab')->count();
    	return $Patient_Number;


    }

    public static function Show_Labratory_Patient_List(){
    	$username=Auth::guard("Labratory")->user()->username;
    	$user_data=Daily_Servant::where('servant_id',$username)->latest()->first();
    	$user_room=$user_data->daily_room;

    	$Patient_List=room::find($user_room)->Labratory_Patient_List()->whereDate('daily_labratory.created_at',Carbon::today())->whereNull('daily_labratory.labratorist_mark')->whereNotNull('daily_labratory.ins_fr_do_lab')->orderBy('daily_labratory.id','asc')->where('daily_labratory.labratory_room',$user_room)->paginate(2);

    	return $Patient_List;

    }
}
