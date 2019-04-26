<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Servants\Daily_Servant;
use App\Doctors;
use App\Phermacy;
use App\Labratory;
class RoomController extends Controller
{
    public function SelectRoom(request $request){
      if(Auth::guard('Doctors')->check())
      { $username=Auth::guard('Doctors')->user()->username;
      	$daily_servant_table=Daily_Servant::create([
        'servant_id'=>$username,
        'daily_room'=>$request['room'],
      	]

      	);
        
        $doctor=Doctors::find($username);
        $doctor->active=1;
        $doctor->save();
        return redirect()->route('Home');

      }

      else if (Auth::guard('Phermacy')->check()) {
        $username=Auth::guard('Phermacy')->user()->username;
        $daily_servant_table=Daily_Servant::create([
        'servant_id'=>$username,
        'daily_room'=>$request['room'],
        ]

        );
        
        $Phermacy=Phermacy::find($username);
        $Phermacy->active=1;
        $Phermacy->save();
        return redirect()->route('Home');
      }

      
      else if (Auth::guard('Labratory')->check()) {
        $username=Auth::guard('Labratory')->user()->username;
        $create_in_daily_servant_table=Daily_Servant::create([
        'servant_id'=>$username,
        'daily_room'=>$request['room'],
        ]

        );
        
        $Labratory=Labratory::find($username);
        $Labratory->active=1;
        $Labratory->save();
        return redirect()->route('Home');
      }



    }
}
