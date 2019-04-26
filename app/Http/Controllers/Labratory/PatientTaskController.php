<?php

namespace App\Http\Controllers\Labratory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Labratory\Labratory_PatientInfo;
use App\CommonModel\Daily_labratory;
use Illuminate\Support\Carbon;

class PatientTaskController extends Controller
{   
    

    public function Show_Patient_List(){
    	$patient_number=Labratory_PatientInfo::Patient_Number();
        $Patient_List=Labratory_PatientInfo::Show_Labratory_Patient_List();
        return view('Labratory.Show_Labratory_Patient_List',['patient_number'=>$patient_number,'Patient_List'=>$Patient_List]);
    }



    public function Show_Patient_Data($labratorist_id,$clinic_id){
       $patient_number=Labratory_PatientInfo::Patient_Number();
       $show_data=Daily_labratory::where('clinic_id',$clinic_id)->latest()->first();
       return view('Labratory.Show_Patient_Data',['show_data'=>$show_data,'patient_number'=>$patient_number]);


    }


    public function Finish($Labratory_id,$clinic_id){
    	$mark=Daily_labratory::where('clinic_id',$clinic_id)->latest()->first();
    	$mark->labratorist_mark=1;
    	$mark->labratorist_id=$Labratory_id;
    	$save=$mark->save();

    	if ($save) {
    		return redirect()->route('Labratory.Show_Patient_List')->with('message_success','Patient Finish Task In This Room');
    	}

    	else{
    		return redirect()->route('Labratory.Show_Patient_List')->with('message_warning','There Is Database Error');
    	}

    }

    public function Add_Patient_Result($Labratorist_id,$clinic_id){
    	$patient_number=Labratory_PatientInfo::Patient_Number();
        return view('Labratory.Add_Patient_Result',['Labratorist_id'=>$Labratorist_id,'clinic_id'=>$clinic_id,'patient_number'=>$patient_number]);

    }



    public function Submit_Result(request $request,$Labratorist_id,$clinic_id){

        
        $request->validate(['result'=>'required']);
    	$save=Daily_labratory::where('clinic_id',$clinic_id)->whereDate('created_at',Carbon::today())->whereNULL('labratorist_mark')->update(['labratorist_id'=>$Labratorist_id,'resp_fr_lab_to_doc'=>$request['result']]);
        
    	

    	if ($save) {
    		return redirect()->route('Labratory.Show_Patient_List')->with('message_success','Result Added Successfully');
    	}

    	else
    	{
    	 	return redirect()->route('Labratory.Show_Patient_List')->with('message_warning','Database Error');
    	}


    }
}
