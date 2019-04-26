<?php

namespace App\Http\Controllers\Phermacy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Phermacy\PatientInfo;
use Illuminate\Support\Facades\Auth;
use App\CommonModel\Daily_Phermacy;
use Illuminate\Support\Carbon;
class PatientTaskController extends Controller
{    
    
    public function Show_Patient_List(){
    	$patient_number=PatientInfo::Number_Of_Patient();
    	$patient_list=PatientInfo::Phermacy_Patient_List();
    	return view('Phermacy.Show_Patient_List',['patient_list'=>$patient_list,'patient_number'=>$patient_number]);
    }

    public function Show_Medical_Instruction($clinic_id){
    	$patient_number=PatientInfo::Number_Of_Patient();
        $patient_data=Daily_Phermacy::where('clinic_id',$clinic_id)->whereNull('mark')->whereDate('created_at',Carbon::today())->orderBy('id','desc')->first();
    	return view('Phermacy.Show_Medical_Instruction',['patient_number'=>$patient_number,'patient_data'=>$patient_data]);
    }

    public function Finish_Patient($clinic_id){
    	$patient_data=Daily_Phermacy::where('clinic_id',$clinic_id)->whereNull('mark')->whereDate('created_at',Carbon::today())->orderBy('id','desc')->first();
    	$patient_data->mark=1;
    	$patient_data->phermacist_id=Auth::guard('Phermacy')->user()->username;
    	$patient_data->save();
    	return redirect()->route('Phermacy.Show_Patient_List')->with('message_success','finished Successfully');
    }


}
