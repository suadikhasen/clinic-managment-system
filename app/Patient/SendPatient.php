<?php

namespace App\Patient;

use Illuminate\Database\Eloquent\Model;

class SendPatient extends Model
{
    public $table='daily_patient_room_data';
    public $primaryKey='patient_id';
    public $keyType='string';
    public $incrementing=false;
    public $guarded=[];

    public function AddPatients(){
    	return $this->hasMany('App\Patient\AddPatient','clinic_id','patient_id');
    }


    

    
}
