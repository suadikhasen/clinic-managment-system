<?php

namespace App\Http\Controllers\Common;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registerar;

class ChangeProfileController extends Controller
{
    public function Index($id){
      $Data=Registerar::find($id); 
      return view('Registerar.ChangeProfile',['Data'=>$Data]);

    }
    

    public function UpdateProfile(request $request, $id){
    	$request->validate([
        'username'=>'required|string',
        'email'=>'required|email',
        'full_name'=>'required|string',
        'age'=>'integer',
        'graduated_area'=>'string',
        'graduated_status'=>'string',
        'graduated_college_university'=>'string'
    	]);

    	$find=Registerar::find($id);
    	$find->email=$request['email'];
    	$find->username=$request['username'];
    	$find->full_name=$request['full_name'];
    	$find->age=$request['age'];
    	$find->graduated_area=$request['graduated_area'];
    	$find->graduated_status=$request['graduated_status'];
    	$find->graduated_college_university=$request['graduated_college_university'];
    	$save=$find->save();
    	if ($save) {
    		return redirect()->route('Registerar.ChangeProfile',['id'=>$find->username])->with('message_success','Updated Or The Same thing remain The Same');
    	}

    	else{
    		return redirect()->route('Registerar.ChangeProfile',['id'=>$find->username])->with('message_warning','Updated Or The Same thing remain The Same');
    	}

        
    }


    public function Show_Update_plate($id){
      return view('Registerar.UpdateImage',['id'=>$id]);
    }
    

    public function ImageUpdated(request $request,$id){
      $request->validate(['photo'=>'required|mimes:jpeg,bmp,png,jpg,']);
      $find=Registerar::find($id);
      if($find){
        $path=$request->file('photo')->store('/Registerar','public');
        $find->photo=$path;
        $find->save();
        return redirect()->route('Registerar.ChangeProfile',['id'=>$id])->with('message_success','Updated Successfully');
      }

      else{
          return redirect()->route('Registerar.ChangeProfile')->with('message_warning','There is Some error');
      }


    }


    public function Show_Password_Template($id){
    	if(Auth::guard('Registerar')->check())
    	  return view('Registerar.ChangePassword',['id'=>$id]);
    }
     
    public function ChangePassword(request $request,$id){
         $request->validate([
         	'current_password'=>'required|string',
            'new_password'=>'required|string',
            'confrim_password'=>'required|string'
         	,]);
         $current_password=$request['current_password'];
         $new_password=$request['new_password'];
         $confrim_password=$request['confrim_password'];
    	if(Auth::guard('Registerar')->check()){
          $find=Registerar::find($id);
          $password=$find->password;
          if(Hash::check($current_password, $password)){
          	if($new_password==$confrim_password){
          		$find->password=Hash::make($new_password);
          		$find->save();
          		return  redirect()->route('Registerar.Show_Password_Template',['id'=>$find->username])->with('message_success','password Changed Successfully');
          	}
             

          	else{
          		return  redirect()->route('Registerar.Show_Password_Template',['id'=>$find->username])->with('message_warning','new password must mach with confrim password');
          	}


          }

          else{
          	return  redirect()->route('Registerar.Show_Password_Template',['id'=>$find->username])->with('message_warning','Invalid password');
          }
    	}
    }


}
