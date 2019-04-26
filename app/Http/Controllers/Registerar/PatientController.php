<?php

namespace App\Http\Controllers\Registerar;
use App\Http\Controllers\Clinic\AdditionalController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Patient\AddPatient;
use App\Patient\SendPatient;
use App\Admin\AddRoom;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    public function Add(request $request){
       $request->validate([
         'first_name'=>'required|string',
         'last_name'=>'required|string',
         'age'=>'required|integer',
         'sex'=>'required',
    	]);



       $id_extension=AddPatient::all()->count();
       $clinic_id='ASC_'.$id_extension.'_'.now()->year;
       
       $Patient=AddPatient::create([
       	'clinic_id'=>$clinic_id,
       	'last_name'=>$request['last_name'],
       	'first_name'=>$request['first_name'],
       	'age'=>$request['age'],
       	'sex'=>$request['sex'],
       	'grand_name'=>$request['grand_name'],
       	'photo_path'=>'/storage/profilepicture.jpg']
       );
       
       $request->Session()->flash('message_success',$Patient->first_name.' Added Successfully');
    
       if($Patient){

       	         return view('Registerar.Home')->with('Patient',$Patient);
       	}


       else
       {
       	return redirect()->route('Home')->with('message_warning','there is file or database error');
       }

    }

    public function Search_Patient(request $request){
    	$request->validate(['search'=>'required|string']);
    	$search=$request['search'];
    	if($Patient=AddPatient::find($search)){
    		return view('Registerar.Home',['Patient'=>$Patient]);
    	}

    	else{
    		return redirect()->route('Home')->with('message_warning','Patient Not Found');
    	}
    }

    /*send patient to docors room */

    public function Send_Patient($id1,$id2){
      $check=SendPatient::where('patient_id',$id2)->whereDate('created_at',Carbon::today())->whereNull('mark')->count();
      if(($check>0)){
        return redirect()->route('Home')->with('message_warning','Resending to patient_room is Aborted');
      }

      $age=AddPatient::find($id2)->age;
      $room_value;
      if($age<15){
      	$room_value=AdditionalController::Children_And_Adult_Number_In_Room('children');
      }

      else{
        $room_value=AdditionalController::Children_And_Adult_Number_In_Room('adult');
      }
      // sending patient to room
      $data=new SendPatient();
      $data->patient_id=$id2;
      $data->registerar_id=$id1;
      $data->patient_room=$room_value;
      $save=$data->save();

      //update the updated_at 

      $update=AddPatient::find($id2);
      $update->updated_at=now();
      $save2=$update->save();

      if($save && $save2){
      	return redirect()->route('Home')->with('message_success','Sended to '.$room_value);
      }

      else{
      	 return redirect()->route('Home')->with('message_warning','Database Error');

      }


    }

}
