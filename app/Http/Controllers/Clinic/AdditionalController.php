<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient\AddPatient;
use App\Admin\AddRoom;
use App\Patient\SendPatient;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

class AdditionalController extends Controller
{
    
     

    public static function Children_And_Adult_Number_In_Room($type){
    	$Room_Info=array();
    	$Children_Patient_Room=AddRoom::where('room_for','doctors')->where('room_type',$type)->get();
    	
    	foreach ($Children_Patient_Room as $Room) {
    		$room_number=AddRoom::find($Room->room_name)->Patient_Number_In_Room()->whereDate('created_at',Carbon::today())->count();
    		$Room_Info[$Room->room_name]=$room_number;
            

    	}
    	
    	$Room_Info = Arr::sort($Room_Info);


    	[$key,$value]=arr::divide($Room_Info);

    	return head($key);

    } 

    public  static function Give_Phermacy_Room($type){
        $Room_Info=array();
        $Children_Patient_Room=AddRoom::where('room_for','phermacy')->where('room_type',$type)->get();
        
        foreach ($Children_Patient_Room as $Room) {
            $room_number=AddRoom::find($Room->room_name)->phermacy_patient_in_room()->whereDate('created_at',Carbon::today())->count();
            $Room_Info[$Room->room_name]=$room_number;
            

        }
        
        $Room_Info = Arr::sort($Room_Info);


        [$key,$value]=arr::divide($Room_Info);

        return head($key);
    }


    public static function Give_Labratory_Room($type){
        $Room_Info=array();
        $Children_Patient_Room=AddRoom::where('room_for','labratory')->where('room_type',$type)->get();
        
        foreach ($Children_Patient_Room as $Room) {
            $room_number=AddRoom::find($Room->room_name)->labratory_patient_in_room()->whereDate('created_at',Carbon::today())->count();
            $Room_Info[$Room->room_name]=$room_number;
            

        }
        
        $Room_Info = Arr::sort($Room_Info);


        [$key,$value]=arr::divide($Room_Info);

        return head($key);
      
    }

}
