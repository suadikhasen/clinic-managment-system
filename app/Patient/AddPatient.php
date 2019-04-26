<?php

namespace App\Patient;

use Illuminate\Database\Eloquent\Model;

class AddPatient extends Model
{
    public $table='patient__data';
    public $primaryKey='clinic_id';
    public $keyType='string';
    public $incrementing=false;
    
    protected $guarded=[];
    
    


    
}
