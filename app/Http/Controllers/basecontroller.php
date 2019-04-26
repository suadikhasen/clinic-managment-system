<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctors;

class basecontroller extends Controller
{
    function index(){
    	return Doctors::all();
    }

    function insert(Request $Request){
    	$doctors = new Doctors();
    	$doctors->full_name=$Request['full_name'];
    	$doctors->email=$Request['email'];
    	$doctors->username=$Request['username'];
    	$doctors->password=$Request['password'];
    	if($doctors->save()){
    		return "The Data Has been Inserted";
    	}

    }
}
