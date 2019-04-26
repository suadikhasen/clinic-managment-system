<?php

namespace App\Http\Controllers\Doctors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Clinic\RoomController;
use App\Http\Controllers\Clinic\Patient_data_controller;
use App\Patient\SendPatient;
use App\Patient\AddPatient;
use App\CommonModel\Daily_Phermacy;
use App\CommonModel\Daily_labratory;
use App\Http\Controllers\Clinic\AdditionalController;
use Illuminate\Support\Carbon;
use App\Doctors;
class PatientTaskController extends Controller
{   

   

    public function Show_Patient_List(){
     $Patient=app('App\Http\Controllers\Clinic\PatientListController',['Doctors']);
     $patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
     $patient_number=$patient_number->number_of_patient;
     $Patient_List=$Patient->Patient_List;
     return view('Doctors.PatientList',['Patient_List'=>$Patient_List,'patient_number'=>$patient_number]);

    }

    public function View_Patient_Data($id1,$id2){
        
    	$patient_info=AddPatient::find($id2);
    	$doctor_info=Doctors::find($id1);
	    $patient_data=SendPatient::where('patient_id',$id2)->whereNotNull('patient_result')->get();
        

		$patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
	    $patient_number=$patient_number->number_of_patient;
        
    	return view('Doctors.ShowPatientData',['patient_number'=>$patient_number,'patient_data'=>$patient_data,'patient_info'=>$patient_info,'doctor_info'=>$doctor_info]);
    }

    public function Add_Patient_result($username,$clinic_id){
     $Patient=app('App\Http\Controllers\Clinic\PatientListController',['Doctors']);
     $patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
     $patient_number=$patient_number->number_of_patient;
     $Patient_List=$Patient->Patient_List;
       return view('Doctors.Add_Patient_result',['username'=>$username,'clinic_id'=>$clinic_id,'patient_number'=>$patient_number]);
       
    }

    public function Submit_Result(request $request,$username,$clinic_id){
    	$request->validate([
    		'Patient_Data'=>'required|string',
    	]);
        $save=SendPatient::create([
        'patient_id'=>$clinic_id,
        'doctor_id'=>$username,
        'patient_result'=>$request['Patient_Data']

        ]);

    	

    	if($save){
    		return redirect()->route('Doctors.Show_Patient_List')->with('Message_Success','Patient data  Added Successfully');
    	}
    	else {
    		return back()->with('Message_Warning','There is Data Base Error');
    	}


    }


    public function Show_Medicine_Paper($id){
        $patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
        $patient_number=$patient_number->number_of_patient;

        return view('Doctors.Show_Medicine_Paper',['patient_number'=>$patient_number,'clinic_id'=>$id]);
    }

    public function Send_To_phermacy(request $request,$doctor_id,$clinic_id){
        $count=Daily_Phermacy::where('clinic_id',$clinic_id)->whereDate('created_at',Carbon::today())->whereNull('mark')->whereNotNull('ins_fr_do_to_pher')->count();
        if ($count>0) {
            return redirect()->route('Doctors.Show_Patient_List')->with('Message_Warning','The Patient Is Already Send You Can Not Sent');
        }


        $request->validate(['medical_instruction'=>'required|string']);
        $patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
        $patient_number=$patient_number->number_of_patient;
        $age=AddPatient::find($clinic_id)->age;
        $room_value;
        if($age<15){
            $room_value=AdditionalController::Give_Phermacy_Room('children');
        }

        else{
            $room_value=AdditionalController::Give_Phermacy_Room('adult');
        }

        $save=Daily_Phermacy::create(['clinic_id'=>$clinic_id,'doctor_id'=>$doctor_id,'phermacy_room'=>$room_value,'ins_fr_do_to_pher'=>$request['medical_instruction']]);
        if($save)
         return redirect()->route('Doctors.Show_Patient_List')->with('Message_Success',"Sended To ".'  '.$room_value);
        else
        {
            return redirect()->route('Doctors.Show_Patient_List')->with('Message_Warning','There is Data base error');
        }
        


    }


    public function Labratory_Paper($clinic_id){
        
        $count=Daily_labratory::where('clinic_id',$clinic_id)->whereDate('created_at',Carbon::today())->whereNull('labratorist_mark')->whereNotNull('ins_fr_do_lab')->count();
        if ($count>0) {
            return redirect()->route('Doctors.Show_Patient_List')->with('Message_Warning','The Patient Is Already Send You Can Not Sent');
        }


        $patient_number=app('App\Http\Controllers\Clinic\RoomController',['Doctors']);
        $patient_number=$patient_number->number_of_patient;
        return view('Doctors.Labratory_Paper',['clinic_id'=>$clinic_id,'patient_number'=>$patient_number]);

    }


    public function Send_To_Labratory(request $request,$doctor_id,$clinic_id){
        $request->validate(['Labratory_Instruction'=>'required|string']);
        $age=AddPatient::find($clinic_id)->age;
        $room_value;
        if ($age<15) {
            $room_value=AdditionalController::Give_Labratory_Room('children');
        }


        else{
            $room_value=AdditionalController::Give_Labratory_Room('adult');
        }


        $save=Daily_labratory::create(['doctor_id'=>$doctor_id,'clinic_id'=>$clinic_id,'labratory_room'=>$room_value,'ins_fr_do_lab'=>$request['Labratory_Instruction']]);

        if($save){
            return redirect()->route('Doctors.Show_Patient_List')->with('Message_Success','Sended To '.$room_value);

         }

        else
          {
            return redirect()->route('Doctors.Show_Patient_List')->with('Message_Warning','There is Data base error');
          }

    }

    public function Finish_Result($clinic_id){
        $find=SendPatient::where('patient_id',$clinic_id)->whereDate('created_at',Carbon::today())->orderBy('id','desc')->whereNull('mark')->first();

        $find->mark=1;
        $save=$find->save();
        if($save){
            return redirect()->route('Doctors.Show_Patient_List')->with('Message_Success','Patient Task finished In This Room');
        }

        else{
            return redirect()->route('Doctors.Show_Patient_List')->with('Message_Warning','There Is Database Error');
        }

    }

    public function Submit_To_Labratory($clinic_id){
        
    }
}
