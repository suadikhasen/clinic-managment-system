<?php

namespace App\Servants;

use Illuminate\Database\Eloquent\Model;

class Daily_Servant extends Model
{
    protected $table='daily_servant';
    protected $primaryKey='servant_id';
    public    $incrementing=false;
    public    $keyType='string';
    protected $guarded=[];
    
    public function SendPatients(){
    	return $this->belongsToMany('App\Patient\SendPatient','patient__data','clinic_id','first_name','daily_room','patient_room');
    }
     
}
