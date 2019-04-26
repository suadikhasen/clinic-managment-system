<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class room extends Model
{
    protected $table='room';
    protected $primaryKey='room_name';
    public    $incrementing =false;
    public    $keyType='string';
    protected $guarded=[];

    public function SearchPatient(){
    	return $this->hasManyThrough('App\Patient\AddPatient','App\Patient\SendPatient','patient_room','clinic_id','room_name','patient_id')->whereDate('daily_patient_room_data.created_at',Carbon::today())->whereNull('daily_patient_room_data.mark');

    }

    public function Phermacy_Patient_List(){
    	return $this->hasManyThrough('App\Patient\AddPatient','App\CommonModel\Daily_Phermacy','phermacy_room','clinic_id','room_name','clinic_id');
    }

    public function Labratory_Patient_List(){
        return $this->hasManyThrough('App\Patient\AddPatient','App\CommonModel\Daily_labratory','labratory_room','clinic_id','room_name','clinic_id');
    }

    
}
