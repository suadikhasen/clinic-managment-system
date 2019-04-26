<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AddRoom extends Model
{
    protected $table='room';
    protected $primaryKey='room_name';
    public $incrementing=false;

    public function Patient_Number_In_Room(){
    	$value=$this->hasMany('App\Patient\SendPatient','patient_room','room_name');
    	return $value;
    }

    public function phermacy_patient_in_room(){
    	$value=$this->hasMany('App\CommonModel\Daily_Phermacy','phermacy_room','room_name');
    	return $value;
    }

    public function labratory_patient_in_room(){
        $value=$this->hasMany('App\CommonModel\Daily_labratory','labratory_room','room_name');
        return $value;
    }

}
